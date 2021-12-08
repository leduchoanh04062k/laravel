<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReturnSupplier;
use App\Models\SupplierImportSupplier;
use App\Models\Warehouse;
use App\Exports\XuattranhaccExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class XuattranhaccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datatable = DB::table('return_to_suppliers')
        ->join('warehouses', 'return_to_suppliers.id', '=', 'warehouses.return_supplier_id')
        ->select('return_to_suppliers.*','warehouses.supplier_id','warehouses.price','warehouses.discount','warehouses.VAT','warehouses.qty')
        ->where('type','return_from_supplier')
        ->get();
        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->addColumn('action', function ($row) {
                if ($row->status) {
                    return view('action/xuattranhacungcap')->with("id", $row->id);
                } else {
                    return view('action/xuattranhacungcapcancel')->with("id", $row->id);
                }
                })
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                    } else {
                        return '<em class="fa fa-times-circle circle_red pd-r-3 text-danger"></em>Đã hủy';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('xuattranhacungcap');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $returnSupplierId = $request->id;
        $returnSupplier   =   ReturnSupplier::updateOrCreate(
            [
                'id' => $returnSupplierId
            ],
            [
                'return_to_supplier_id' => $request->return_to_supplier_id,
                'date' => $request->date,

            ]
        );

        Response()->json($returnSupplier);

        return redirect('khachhang');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $supplier_id = array('id' => $request->id);
        $company  = ReturnSupplier::where($supplier_id)->first();

        return Response()->json($company);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('return_supplier_id'=>$request->id);
        $stock = DB::table('warehouses')
                ->join('units','warehouses.unit_id','=', 'units.id')
                ->join('lot_nos','warehouses.lotno_id', '=','lot_nos.id')
                ->select('warehouses.*','units.unit','lot_nos.lot_no','lot_nos.exp_date','lot_nos.price_import','warehouses.qty')
                ->where('type','return_from_supplier')
                ->where($stock_id)
                ->get();
        return Response()->json($stock);
    }

    //     public function edit(Request $request)
    // {
    //     $supplier_id = array('id' => $request->id);
    //     $supplier  = ReturnSupplier::where($supplier_id)->first();

    //     return Response()->json($supplier);
    // }

    // public function editstock(Request $request)
    // {
    //     $stock_id = array('supplier_id' => $request->id);
    //     $stock  = Warehouse::where($stock_id)->get();

    //     return Response()->json($stock);
    // }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $returnSupplier = ReturnSupplier::where('id', $request->id)->delete();

        return Response()->json($returnSupplier);
    }
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = ReturnSupplier::where($where)->update(['status' => 0]);
        $stocks  = Warehouse::where('return_supplier_id', $where)->update(['status' => 0]);

        return Response()->json($company);
    }
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new XuattranhaccExport, 'Xuattranhacungcap-' . time() . '.xlsx');
    }

    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = Warehouse::where('return_supplier_id', $data[0]['idha'])->get()->toArray();
        $data_id=[];
        $stock_id=[];
        $delete_Id = [];

        foreach($stocks as &$stock){
            if($stock['id']){
                array_push($stock_id,$stock['id']);
            }
        }
        foreach($data as &$item){
            if($item['id']){
                array_push($data_id,$item['id']);
            }
        }

        $differenceArray1 = array_diff($data_id, $stock_id);
        $differenceArray2 = array_diff($stock_id, $data_id);

        $delete_Id = array_merge($differenceArray1, $differenceArray2);
        foreach ($delete_Id as &$del){
            Warehouse::where('id', $del)->delete();
        }
        
        foreach ($data as &$item) {
            $warehouses[] = Warehouse::updateOrCreate (
                [
                    'id' => $item['id'],
                ],
                [
                    'user_id' => Auth::id(),
                    'return_supplier_id' => $item['idha'],
                    'stock_id' => $item['stock_id'],
                    'unit_id' => $item['unit_id'],
                    'lotno_id' => $item['lotno_id'],
                    'name' => $item['name'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'discount' => $item['discount'],
                    'VAT' => $item['VAT'],
                    'type' => $item['type']
                ]);
        }
        return response()->json($warehouses);
    }

    public function submitnhacungcap(Request $request){
        $supplierId = $request->id;
        $supplier   =   ReturnSupplier::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'idsupplier' => $request->idsupplier,
                'name' => $request->name,
                'date' => $request->date,
                'hour' => $request->hour,
                'pay_supplier' => $request['pay_supplier'],                    

                                      

            ]
        );
        return response()->json($supplier);
    }

    public function autosearchimage(){
        $data = DB::table('warehouses')
            ->where('type','return_from_supplier')
            ->join('stock','warehouses.stock_id','=','stock.id')
            ->join('lot_nos','lot_nos.id','=','warehouses.lotno_id')
            ->join('units','units.id','=','warehouses.unit_id')
            ->select('warehouses.name','warehouses.discount','warehouses.VAT','warehouses.unit_id','lot_nos.lot_no','lot_nos.exp_date', 'warehouses.qty','units.unit','warehouses.price','stock.id','stock.reg_no','stock.ingredient',
                'stock.packaging','stock.made_in')
            ->groupBy('warehouses.id')
            ->get();
            // dd($data);
        return Response()->json($data); 
    }
}