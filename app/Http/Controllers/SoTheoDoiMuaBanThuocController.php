<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SoTheoDoiMuaBanThuocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('warehouses')
            ->join('stock','warehouses.stock_id','=','stock.id')
            ->join('lot_nos','warehouses.lotno_id','=','lot_nos.id')
            ->join('units','warehouses.unit_id','=','units.id')
            ->select('warehouses.*','warehouses.qty','warehouses.created_at','warehouses.type','lot_nos.lot_no','lot_nos.exp_date','units.unit','stock.reg_no','stock.ingredient','stock.manufacture','stock.made_in')
            ->groupBy('warehouses.id')
            ->get();
            // dd($data);
            if (request()->ajax()) {
                return datatables()->of($data)
                ->make(true);
            }
        return view('sotheodoimuabanthuoc');
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