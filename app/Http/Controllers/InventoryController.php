<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TonkhoExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\LotNo;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\Warehouse;
use DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $datatable = DB::table('warehouses')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->join('units', 'warehouses.unit_id', '=', 'units.id')
            ->select('warehouses.*', 'lot_nos.lot_no', 'lot_nos.exp_date', 'lot_nos.price_import', 'units.unit')
            ->where('warehouses.status','1')->get();

            return datatables()->of($datatable)
            ->addIndexColumn()
            ->make(true);
        }

        return view('tonkho');
    }

    public function data()
    {
        // $data = DB::table('warehouses')
        //         ->leftjoin('lot_nos', function ($join) {
        //             $join->on('lot_nos.id', '=', 'warehouses.lotno_id');
        //         })
        //         ->leftjoin('units', function ($join) {
        //             $join->on('units.id', '=', 'warehouses.unit_id');
        //         })
        //         ->select('warehouses.*')
        //         ->get();
        // $data = DB::table('warehouses')
        //         ->leftjoin('lot_nos', function ($join) {
        //             $join->on('lot_nos.id', '=', 'warehouses.lotno_id');
        //         })
        //         ->leftjoin('units', function ($join) {
        //             $join->on('units.id', '=', 'warehouses.unit_id');
        //         })
        //         ->select('warehouses.*','lot_nos.lot_no',\DB::raw('ifNull(sum(warehouses.qty), 0) as qty'))
        //         ->groupBy('lotno_id')
        //         ->get();
        $data = DB::table('warehouses')
        ->leftjoin('lot_nos', function ($join) {
            $join->on('lot_nos.id', '=', 'warehouses.lotno_id');
        })
        ->leftjoin('units', function ($join) {
            $join->on('units.id', '=', 'warehouses.unit_id');
        })
        ->select('warehouses.*', 'lot_nos.lot_no', \DB::raw('ifNull(sum(warehouses.qty), 0) as qty'))
        ->where('type', '=', 'sell')
        ->orWhere('type', '=', 'return_from_customer')
        ->orWhere('type', '=', 'return_from_supplier')
        ->orWhere('type', '=', 'destruction_export')
        ->orWhere('type', '=', 'import_inventory')
        ->orWhere('type', '=', 'import_check_inventory')
        ->groupBy('lotno_id', 'unit_id', 'type')
        ->get();
        // $data2 = DB::table('warehouses')
        //         ->leftjoin('lot_nos', function ($join) {
        //             $join->on('lot_nos.id', '=', 'warehouses.lotno_id');
        //         })
        //         ->leftjoin('units', function ($join) {
        //             $join->on('units.id', '=', 'warehouses.unit_id');
        //         })
        //         ->select('warehouses.*','lot_nos.lot_no',\DB::raw('ifNull(sum(warehouses.qty), 0) as qty'))
        //         ->where('type','=','sell')
        //         ->groupBy('lotno_id')
        //         ->get();
        dd($data);
        return Response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $stock_id = array('id' => $request->id);
        $stock = Stock::where($stock_id)->first();
        $lot_no = LotNo::where('stock_id', $stock_id)->first();
        $unit_id = Unit::where('stock_id', $stock_id)->first();
        $qty = Warehouse::where('stock_id', $stock_id)->first();

        return Response()->json([$stock, $lot_no, $unit_id, $qty]);
    }
    public function editstock(Request $request)
    {
        $stock_id = $request->all();
        $lotno  = DB::table('warehouses')
        ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
        ->join('units', 'warehouses.unit_id', '=', 'units.id')
        ->leftjoin('supplier_import_suppliers', 'warehouses.supplier_id', '=', 'supplier_import_suppliers.id')
        ->leftjoin('customer_import_customers', 'warehouses.customer_id', '=', 'customer_import_customers.id')
        ->leftjoin('inventor_import_inventories', 'warehouses.inventory_id', '=', 'inventor_import_inventories.id')
        ->leftjoin('destructions', 'warehouses.destructions_id', '=', 'destructions.id')
        ->leftjoin('return_to_suppliers', 'warehouses.return_supplier_id', '=', 'return_to_suppliers.id')
        ->leftjoin('sell_import', 'warehouses.sell_id', '=', 'sell_import.id')
        ->select(
            'supplier_import_suppliers.date as dateSupplier',
            'supplier_import_suppliers.hour as hourSupplier',
            'supplier_import_suppliers.id as idSupplier',
                // 'units.unit as unitSupplier',

            'customer_import_customers.date as dateCustomer',
            'customer_import_customers.hour as hourCustomer',
            'customer_import_customers.id as idCustomer',
                // 'units.unit as unitSCustomer',

            'inventor_import_inventories.date as dateInventorier',
            'inventor_import_inventories.hour as hourInventorier',
            'inventor_import_inventories.id as idInventorier',
                // 'units.unit as unitInventorier',

            'destructions.date as dateDestruction',
            'destructions.hour as hourDestruction',
            'destructions.id as idDestruction',
                // 'units.unit as unitDestruction',

            'return_to_suppliers.date as dateSupplierReturn',
            'return_to_suppliers.hour as hourSupplierReturn',
            'return_to_suppliers.id as idSupplierReturn',
                // 'units.unit as unitSupplierReturn',

            'sell_import.date as dateSell',
            'sell_import.hour as hourSell',
            'sell_import.id as idSell',
                // 'units.unit as unitSell',

            'warehouses.*',
            \DB::raw('ifNull(sum(warehouses.qty), 0) as qty'),
            'warehouses.type',
            'lot_nos.*',
            'units.*',
        )
        ->where([
            ['warehouses.stock_id', $stock_id],
            ['warehouses.status', '1']
        ])
        ->get();
        // dd($lotno);
        return Response()->json($lotno);
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
    public function export()
    {
        return Excel::download(new TonkhoExport, 'Tonkho-' . time() . '.xlsx');
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
    public function destroy($id)
    {
        //
    }
}
