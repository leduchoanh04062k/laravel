<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BcNhapHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('bcnhaphang');
    }
    //
    public function supplier()
    {
        $banhang = DB::table('warehouses')
            ->leftJoin('supplier_import_suppliers', function ($join) {
                $join->on('supplier_import_suppliers.id', '=', 'warehouses.supplier_id');
            })
            ->select('warehouses.*', 'supplier_import_suppliers.name as supplier_name', 'supplier_import_suppliers.status', 'supplier_import_suppliers.date', 'supplier_import_suppliers.hour')
            ->where('supplier_import_suppliers.status', '=', 1)
            // ->
            ->get();
        if (request()->ajax()) {
            return datatables()->of($banhang)
                ->make(true);
        }
    }
    public function import()
    {
        $import = DB::table('warehouses')
            ->leftJoin('inventor_import_inventories', function ($join) {
                $join->on('inventor_import_inventories.id', '=', 'warehouses.inventory_id');
            })
            ->select('warehouses.*', 'inventor_import_inventories.status', 'inventor_import_inventories.date', 'inventor_import_inventories.hour')
            ->where('inventor_import_inventories.status', '=', 1)
            // ->
            ->get();
        // dd($banhang);
        if (request()->ajax()) {
            return datatables()->of($import)
                ->make(true);
        }
    }

    public function customers()
    {
        $import = DB::table('warehouses')

            ->leftJoin('sell_import', function ($join) {
                $join->on('sell_import.id', '=', 'warehouses.sell_id')
                    ->where('sell_import.status', '=', 1);
            })
            ->leftJoin('customer_import_customers', function ($join) {
                $join->on('customer_import_customers.id', '=', 'warehouses.customer_id')
                    ->where('customer_import_customers.status', '=', 1);
            })
            ->select(
                'warehouses.*',
                'customer_import_customers.status',
                'customer_import_customers.date as dateCustomer',
                'customer_import_customers.hour as hourCustomer',
                'sell_import.date as dateSell',
                'sell_import.hour as hourSell',
                'customer_import_customers.name',
                'sell_import.status as sellstatus',
                'sell_import.name as sellname',
            )
            ->where('type', '=', 'return_from_customer')
            ->orWhere('type', '=', 'sell')
            ->get();
        // dd($import);
        if (request()->ajax()) {
            return datatables()->of($import)
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
