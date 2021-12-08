<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DoanhThuBanHangTheoNVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('warehouses')
            ->leftjoin('users', 'users.id', '=', 'warehouses.user_id')
            ->leftjoin('sell_import', 'sell_import.id', '=', 'warehouses.sell_id')
            ->leftjoin('customer_import_customers', 'customer_import_customers.id', '=', 'warehouses.customer_id')
            ->where('sell_import.status', 1)
            ->OrWhere('customer_import_customers.status', 1)
            ->select(
                'warehouses.*',
                'sell_import.date as dateSell',
                'sell_import.name as nameSell',
                'sell_import.name as nameCustomer',
                'customer_import_customers.date as dateCustomer',
                \DB::raw('sum(sell_import.price_import) as totalMoney'),
                \DB::raw('sum(sell_import.sale) as sales'),
                \DB::raw('sum(warehouses.price) as prices'),
                \DB::raw('sum(warehouses.discount) as discounts'),
                'users.id as userId',
                'users.name as user_name',
                \DB::raw('DATE(warehouses.created_at) as day'),
                \DB::raw('ifnull(sum(customer_import_customers.totalpaid), 0) as totalpaid'),
            )
            ->where('type', '=', 'return_from_customer')
            ->orWhere('type', '=', 'sell')
            ->orderBy('day', 'desc')->groupBy('users.id', 'day')
            ->get();
        // dd($data);
        if (request()->ajax()) {
            return datatables()->of($data)
                ->make(true);
        }
        return view('doanhthubanhangtheonv');
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
            ->leftJoin('users', function ($join) {
                $join->on('users.id', '=', 'warehouses.user_id');
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
                'sell_import.price_import as Price_sell',
                'users.name as user_name',
                'sell_import.checkbox',
                \DB::raw('DATE(warehouses.created_at) as day'),
            )

            ->where('type', '=', 'return_from_customer')
            ->orWhere('type', '=', 'sell')
            ->orderBy('day', 'desc')
            ->get();
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
            ->leftjoin('users', 'users.id', '=', 'warehouses.user_id')
            ->leftJoin('sell_import', 'sell_import.id', '=', 'warehouses.sell_id')
            ->leftJoin('customer_import_customers', 'customer_import_customers.id', '=', 'warehouses.customer_id')
            ->leftJoin('lot_nos', 'lot_nos.id', '=', 'warehouses.lotno_id')
            ->leftJoin('units', 'units.id', '=', 'warehouses.unit_id')
            ->select(
                'warehouses.*',
                'lot_nos.lot_no',
                'lot_nos.price_import as totalPrice',
                'units.unit',
                'units.exchange',
                'sell_import.sale',
                'users.id as userId',
                'users.name as user_name',
            )
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
