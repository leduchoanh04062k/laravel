<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SoTheoDoiBenhNhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatable = DB::table('sell_import')
            ->join('warehouses', function ($join) {
                $join->on('sell_import.id', '=', 'warehouses.sell_id');
            })
            ->join('units', function ($join) {
                $join->on('units.id', '=', 'warehouses.unit_id');
            })
            ->join('lot_nos', function ($join) {
                $join->on('lot_nos.id', '=', 'warehouses.lotno_id');
            })
            ->join('stock', function ($join) {
                $join->on('stock.id', '=', 'warehouses.stock_id');
            })
            ->where('checkbox', 1)
            ->select('sell_import.*', 'units.unit', 'warehouses.name', 'warehouses.qty', 'lot_nos.lot_no', 'lot_nos.exp_date', 'stock.reg_no', 'stock.note', 'stock.content', 'stock.ingredient', 'stock.manufacture', 'stock.made_in',)->groupBy('sell_import.id')
            ->get();

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->make(true);
        }
        return view('sotheodoibenhnhan');
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
