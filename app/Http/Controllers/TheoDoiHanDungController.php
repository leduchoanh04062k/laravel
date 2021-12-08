<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TheoDoiHanDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatable = DB::table('stock')
            ->join('units', 'stock.id', '=', 'units.stock_id')
            ->join('lot_nos', 'stock.id', '=', 'lot_nos.stock_id')
            ->select('stock.*', 'lot_nos.exp_date', 'units.unit', 'units.price_sell', 'stock.id as STOCKID', 'units.id as UNITID');

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->make(true);
        }
        return view('theodoihandung');
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
