<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BanThuocKhongTheoDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatable = DB::table('sell_import')
            ->join('warehouses', 'sell_import.id', '=', 'warehouses.sell_id')
            ->join('stock', 'warehouses.stock_id', '=', 'stock.id')
            ->join('units', 'warehouses.unit_id', '=', 'units.id')
            ->where('checkbox', 0)
            ->select('sell_import.id', 'units.unit', 'sell_import.date', 'sell_import.hour', 'stock.name', 'stock.ingredient', 'stock.content', 'warehouses.qty', 'warehouses.note')
            ->get();

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->make(true);
        }
        return view('banthuockhongtheodon');
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
