<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BcDoanhThuBanHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('bcdoanhthubanhang');
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
            ->OrWhere('type', '=', 'return_from_customer')
            ->orWhere('type', '=', 'sell')
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
                \DB::raw('ifnull(sum(warehouses.discount), 0) as discounts'),
                \DB::raw('ifnull(sum(customer_import_customers.totalpaid), 0) as totalpaid'),
                // \DB::raw('sum(warehouses.price) as price'),
                // \DB::raw('sum(warehouses.discount) as discount'),
                // \DB::raw('sum(warehouses.qty) as qty'),
                // \DB::raw('sum(warehouses.VAT) as VAT'),
            )
            ->orderBy('day', 'desc')->groupBy('day')
            ->get()->toArray();
        if (request()->ajax()) {
            return datatables()->of($ReveneuMonth)
                ->make(true);
        }
    }

    public function promiss()
    {
        $promiss = DB::table('warehouses')
            ->leftjoin('sell_import', function ($join) {
                $join->on('sell_import.id', '=', 'warehouses.sell_id');
            })
            ->leftjoin('customer_import_customers', function ($join) {
                $join->on('customer_import_customers.id', '=', 'warehouses.customer_id');
            })
            ->select(
                'warehouses.*',
                'sell_import.date as dateSell',
                'sell_import.hour as hourSell',
                'sell_import.name as nameSell',
                'customer_import_customers.date as dateCustomer',
                'customer_import_customers.hour as hourCustomer',
                'customer_import_customers.name as nameCustomer',
                'customer_import_customers.totalpaid',
                'sell_import.id as sellId',
                'customer_import_customers.id as cusId',
                'sell_import.name',
                'sell_import.sale',
                'sell_import.price_import',
                'sell_import.checkbox',
                'warehouses.discount',
                'warehouses.price',
                'warehouses.VAT',
                'warehouses.qty',
                'warehouses.type',
                'warehouses.id',
                \DB::raw('DATE(warehouses.created_at) as day'),
            )
            ->where('type', '=', 'return_from_customer')
            //'sell_import.date','sell_import.hour',
            ->orWhere('type', '=', 'sell')
            ->orderBy('day', 'desc')
            ->get();
        // dd($promiss);
        if (request()->ajax()) {
            return datatables()->of($promiss)
                ->make(true);
        }
        // return response()->json($promiss);

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
