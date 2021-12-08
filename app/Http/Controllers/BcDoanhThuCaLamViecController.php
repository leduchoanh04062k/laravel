<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BcDoanhThuCaLamViecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bcdoanhthucalamviec');
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
    public function money(Request $request)
    {
        $ReveneuMonth = DB::table('warehouses')
            ->leftJoin('sell_import', function ($join) {
                $join->on('sell_import.id', '=', 'warehouses.sell_id');
            })
            ->leftJoin('customer_import_customers', function ($join) {
                $join->on('customer_import_customers.id', '=', 'warehouses.customer_id');
            })

            ->leftJoin('lot_nos', function ($join) {
                $join->on('lot_nos.id', '=', 'warehouses.lotno_id');
            })
            ->where('sell_import.status', 1)
            ->OrWhere('customer_import_customers.status', 1)
            ->select(
                'warehouses.*',
                'sell_import.date as dateSell',
                'sell_import.hour as hourSell',
                'sell_import.name as nameSell',
                'customer_import_customers.date as dateCustomer',
                'customer_import_customers.hour as hourCustomer',
                'customer_import_customers.name as nameCustomer',
                \DB::raw('sum(sell_import.price_import) as totalMoney'),
                \DB::raw('DATE(warehouses.created_at) as day'),
                \DB::raw('ifNull(sum(sell_import.sale), 0) as sales'),
                \DB::raw('COALESCE(sum(warehouses.price), 0) as prices'),
                \DB::raw('COALESCE(sum(warehouses.qty), 0) as qtys'),
                \DB::raw('ifnull(sum(warehouses.discount), 0) as discounts'),
                \DB::raw('ifnull(sum(customer_import_customers.totalpaid), 0) as totalpaid'),
            )
            ->orderBy('day', 'desc')->groupBy('day')
            ->get()->toArray();
        if (request()->ajax()) {
            return datatables()->of($ReveneuMonth)
                ->make(true);
        }

        // return response()->json($ReveneuMonth);
    }

    public function promiss()
    {
        $promiss = DB::table('warehouses')
            ->leftJoin('sell_import', function ($join) {
                $join->on('sell_import.id', '=', 'warehouses.sell_id')
                    ->where('sell_import.status', '=', 1);
            })
            ->leftJoin('customer_import_customers', function ($join) {
                $join->on('customer_import_customers.id', '=', 'warehouses.customer_id')
                    ->where('customer_import_customers.status', '=', 1);
            })
            ->leftJoin('lot_nos', function ($join) {
                $join->on('lot_nos.id', '=', 'warehouses.lotno_id');
            })
            ->select(
                'warehouses.*',
                'sell_import.date as dateSell',
                'sell_import.hour as hourSell',
                'sell_import.name as nameSell',
                'customer_import_customers.date as dateCustomer',
                'customer_import_customers.hour as hourCustomer',
                'customer_import_customers.name as nameCustomer',
                'sell_import.id as sellId',
                'customer_import_customers.id as cusId',
                'sell_import.sale',
                'sell_import.price_import as Price_import',
                'lot_nos.price_import as Lotno_price',
                'sell_import.checkbox',
                \DB::raw('DATE(warehouses.created_at) as day'),
                'customer_import_customers.totalpaid',
            )
            ->where('type', '=', 'return_from_customer')
            ->orWhere('type', '=', 'sell')
            ->orderBy('day', 'desc')
            ->get();
        if (request()->ajax()) {
            return datatables()->of($promiss)
                ->make(true);
        }
    }

    public function bill()
    {
        $data = DB::table('warehouses')
            ->leftJoin('stock', 'stock.id', '=', 'warehouses.stock_id')
            ->leftJoin('sell_import', 'sell_import.id', '=', 'warehouses.sell_id')
            ->leftJoin('customer_import_customers', 'customer_import_customers.id', '=', 'warehouses.customer_id')
            ->leftJoin('lot_nos', 'lot_nos.id', '=', 'warehouses.lotno_id')
            ->leftJoin('units', 'units.id', '=', 'warehouses.unit_id')
            ->select('warehouses.*', 'lot_nos.lot_no', 'lot_nos.price_import as totalPrice', 'units.unit', 'units.exchange', 'sell_import.sale')
            ->where('type', '=', 'sell')
            ->orWhere('type', '=', 'return_from_customer')
            ->get();
        // dd($data);
        if (request()->ajax()) {
            return datatables()->of($data)
                ->make(true);
        }

        // $data = DB::table('warehouses')
        //     ->join('stock', 'stock.id', '=', 'warehouses.stock_id')
        //     ->join('lot_nos', 'lot_nos.id', '=', 'warehouses.lotno_id')
        //     ->join('units', 'units.id', '=', 'warehouses.unit_id')
        //     // ->join('sell_import', 'sell_import.id', '=', 'warehouses.sell_id')
        //     ->join('customer_import_customers', 'customer_import_customers.id', '=', 'warehouses.customer_id')
        //     ->select('warehouses.*', 'lot_nos.lot_no', 'lot_nos.price_import as totalPrice', 'units.unit', 'units.exchange')
        //     ->where('type', '=', 'sell')
        //     ->orWhere('type', '=', 'return_from_customer')
        //     ->get();
        // // dd($data);
        // if (request()->ajax()) {
        //     return datatables()->of($data)
        //         ->make(true);
        // }
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
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
