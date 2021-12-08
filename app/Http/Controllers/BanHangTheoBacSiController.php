<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BanHangTheoBacSiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banhangtheobacsi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $datatable = DB::table('sell_import')
            ->join('warehouses', function ($join) {
                $join->on('sell_import.id', '=', 'warehouses.sell_id');
            })
            ->leftJoin('customer_import_customers', function ($join) {
                $join->on('customer_import_customers.id', '=', 'warehouses.customer_id');
            })
            ->where('checkbox', 1)
            ->select(
                'sell_import.*',
                \DB::raw('sum(sell_import.price_import) as totalMoney'),
                \DB::raw('sum(sell_import.price_import) as prices'),
                \DB::raw('sum(warehouses.discount) as discounts'),
                \DB::raw('sum(sell_import.sale) as sales'),
                \DB::raw('DATE(warehouses.created_at) as day'),
                \DB::raw('ifnull(sum(customer_import_customers.totalpaid), 0) as totalpaid'),
            )->orderBy('day', 'desc')->groupBy('sell_import.id')
            ->get();
        // dd($datatable);
        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->make(true);
        }
    }

    public function data_import(Request $request)
    {
        $datatable = DB::table('sell_import')
            ->join('warehouses', function ($join) {
                $join->on('sell_import.id', '=', 'warehouses.sell_id');
            })
            ->where('checkbox', 1)
            ->select(
                'sell_import.*',
                \DB::raw('sum(sell_import.price_import) as totalMoney'),
                \DB::raw('sum(sell_import.price_import) as prices'),
                \DB::raw('sum(sell_import.sale) as discounts'),
                \DB::raw('sum(sell_import.sale) as sales'),
                \DB::raw('DATE(warehouses.created_at) as day'),
            )->orderBy('day', 'desc')->groupBy('sell_import.id')
            ->get();
        // dd($datatable);
        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->make(true);
        }
    }

    public function data_import_commodity(Request $request)
    {
        $datatable = DB::table('sell_import')
            ->join('warehouses', function ($join) {
                $join->on('sell_import.id', '=', 'warehouses.sell_id');
            })
            ->join('lot_nos', function ($join) {
                $join->on('lot_nos.id', '=', 'warehouses.lotno_id');
            })
            ->join('units', function ($join) {
                $join->on('units.id', '=', 'warehouses.unit_id');
            })
            ->where('checkbox', 1)
            ->select('sell_import.*', 'warehouses.name as namesale', 'units.unit', 'lot_nos.lot_no as lotno_name', 'warehouses.dosage', 'warehouses.qty', 'warehouses.price_import', 'warehouses.discount', \DB::raw('sum(sell_import.price_import) as prices'), \DB::raw('sum(warehouses.discount) as discounts'), \DB::raw('sum(sell_import.sale) as sales'))->groupBy('sell_import.id')
            ->get();
        // dd($datatable);
        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->make(true);
        }
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
