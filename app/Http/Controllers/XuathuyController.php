<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DestructionExport;
use App\Models\Warehouse;
use App\Models\Destruction;
use App\Exports\XuathuyExport;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use DB;
class XuathuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('destructions')
        ->join('warehouses','destructions.id','=', 'warehouses.destructions_id')
        ->select('destructions.*', 'warehouses.destructions_id', 'warehouses.price','warehouses.qty')
        ->where('type','destruction_export');
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($row) {
                if ($row->status) {
                    return view('action/xuathuy')->with("id", $row->id);
                } else {
                    return view('action/xuathuycancel')->with("id", $row->id);
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
        return view('xuathuy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $customer_id    = array('id' => $request->id);
        $customer  = Destruction::where($customer_id)->first();

        return Response()->json($customer);
    }

    public function editstock(Request $request)
    {
        $destructions_id = array('destructions_id' => $request->id);
        $stock  = DB::table('warehouses')
                ->join('units','warehouses.unit_id','=', 'units.id')
                ->join('lot_nos','warehouses.lotno_id', '=','lot_nos.id')
                ->select('warehouses.*','units.unit','lot_nos.lot_no','lot_nos.exp_date','lot_nos.price_import')
                ->where('type','destruction_export')
                ->where($destructions_id)
                ->get();

        return Response()->json($stock);
    }
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
        $destructionExport = DestructionExport::where('id', $request->id)->delete();

        return Response()->json($destructionExport);
    }
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Destruction::where($where)->update(['status' => 0]);
        $stocks  = Warehouse::where('destructions_id', $where)->update(['status' => 0]);

        return Response()->json($company);
    }
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new XuathuyExport, 'Phieuxuathuy-' . time() . '.xlsx');
    }

    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = Warehouse::where('destructions_id', $data[0]['idha'])->get()->toArray();
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
            Warehouse::updateOrCreate (
                [
                    'id' => $item['id'],
                ],
                [
                    'user_id' => Auth::id(),
                    'destructions_id' => $item['idha'],
                    'stock_id' => $item['stock_id'],
                    'unit_id' => $item['unit_id'],
                    'lotno_id' => $item['lotno_id'],
                    'name' => $item['name'],                        
                    'qty' => $item['qty'],                     
                    'reasons' => $item['reasons'],
                    'handling_measures' => $item['handling_measures'],
                    'note' => $item['note'],
                    'price' => $item['price'],
                    'type' => $item['type']
                ]);
        }
        return response()->json('success');
    }


    public function submitxuathuy(Request $request){
        $supplierId = $request->id;
        $supplier   =   Destruction::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'date' => $request->date,
                'hour' => $request->hour,
                'note' => $request->note,
            ]
        );
        return response()->json($supplier);
    }
}