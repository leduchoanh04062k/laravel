<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerImportCustomer;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\UnitList;
use App\Models\LotNo;
use App\Models\Warehouse;

use App\Exports\KhachhangtlExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class KhachhangtlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datatable = DB::table('customer_import_customers')
            ->join('warehouses', 'customer_import_customers.id', '=', 'warehouses.customer_id')
            ->select('customer_import_customers.*', 'warehouses.customer_id', 'warehouses.price', 'warehouses.discount', 'warehouses.VAT', 'warehouses.qty')
            ->where('type', 'return_from_customer');

        if (request()->ajax()) {
            return datatables()->of($datatable)

                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/khachhangtralai')->with("id", $row->id);
                    } else {
                        return view('action/khachhangtralaicancel')->with("id", $row->id);
                    }
                })
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoàn thành';
                    } else {
                        return '<i class="fa fa-check-circle text-danger pd-r-3" aria-hidden="true"></i>Đã hủy';
                    }
                })
                ->make(true);
        }
        return view('khachhangtralai');
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
        $customer_id    = array('id' => $request->id);
        $customer  = CustomerImportCustomer::where($customer_id)->first();

        return Response()->json($customer);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('customer_id' => $request->id);

        $stock = DB::table('warehouses')
            ->join('units', 'warehouses.unit_id', '=', 'units.id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->select('warehouses.*', 'units.unit', 'lot_nos.lot_no', 'lot_nos.exp_date', 'lot_nos.price_import',)
            ->where('type', 'return_from_customer')
            ->where($stock_id)
            ->get();
        // $stock  = StockImportCustomer::where($stock_id)->get();

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
        $importSupplier = Warehouse::where('customer_id', $request->id)->delete();

        $importStock = CustomerImportCustomer::where('id', $request->id)->delete();

        return Response()->json('success');
    }
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = CustomerImportCustomer::where($where)->update(['status' => 0]);
        $stocks  = Warehouse::where('customer_id', $where)->update(['status' => 0]);

        return Response()->json($company);
    }
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new KhachhangtlExport, 'Khachhangtralai-' . time() . '.xlsx');
    }
    public function autosearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $supplier = Customer::select('*')
            ->where([
                ['name', 'LIKE', "%$keyword%"],
                ['status', '=', 1]
            ])->get();
        return response()->json($supplier);
    }

    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = Warehouse::where('customer_id', $data[0]['idha'])->get()->toArray();
        $data_id = [];
        $stock_id = [];
        $delete_Id = [];

        foreach ($stocks as &$stock) {
            if ($stock['id']) {
                array_push($stock_id, $stock['id']);
            }
        }
        foreach ($data as &$item) {
            if ($item['id']) {
                array_push($data_id, $item['id']);
            }
        }

        $differenceArray1 = array_diff($data_id, $stock_id);
        $differenceArray2 = array_diff($stock_id, $data_id);

        $delete_Id = array_merge($differenceArray1, $differenceArray2);
        foreach ($delete_Id as &$del) {
            Warehouse::where('id', $del)->delete();
        }


        foreach ($data as &$item) {
            $warehouses[] = Warehouse::updateOrCreate(
                [
                    'id' => $item['id'],
                ],
                [
                    'user_id' => Auth::id(),
                    'customer_id' => $item['idha'],
                    'stock_id' => $item['stock_id'],
                    'unit_id' => $item['unit_id'],
                    'lotno_id' => $item['lotno_id'],
                    'name' => $item['name'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'discount' => $item['discount'],
                    'VAT' => $item['VAT'],
                    'type' => $item['type'],
                    'note' => $item['note'],
                ]
            );
        }
        return response()->json($warehouses);
    }

    public function submitkhachhang(Request $request)
    {
        $supplierId = $request->id;
        $supplier   =   CustomerImportCustomer::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'idcustomer' => $request->idcustomer,
                'totalpaid' => $request->totalpaid,
                'name' => $request->name,
                'date' => $request->date,
                'hour' => $request->hour,
                'note' => $request->note,
            ]
        );
        return response()->json($supplier);
    }
    public function autosearchimage(Request $request)
    {
        $keyword = $request->input('keyword');
        $stock = DB::table('stock')
            ->join('units', 'stock.id', '=', 'units.stock_id')
            ->join('lot_nos', 'stock.id', '=', 'lot_nos.stock_id')
            ->select('stock.*', 'units.id as unit_id', 'units.unit', 'units.price_sell as price_import', 'units.price_sell as price_sell', 'lot_nos.id as lotno_id', 'lot_nos.lot_no', 'lot_nos.exp_date')
            ->where('stock.name', 'LIKE', "%$keyword%")->get();
        return response()->json($stock);
    }
}
