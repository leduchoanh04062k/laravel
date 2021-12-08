<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SoTheoDoiTheoDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donthuoc = DB::table('sell_import')

            ->join('warehouses', 'sell_import.id', '=', 'warehouses.sell_id')
            ->join('stock', 'stock.id', '=', 'warehouses.stock_id')
            ->join('units', 'warehouses.unit_id', '=', 'units.id')
            ->where('sell_import.checkbox', 1)
            ->where('sell_import.status', 1)
            // ->select('sell_import.id','sell_import.date','sell_import.hour','sell_import.created_at','sell_import.patient','sell_import.doctor','sell_import.medical_facility','sell_import.note','sell.qty','stock.name','stock.ingredient','stock.manufacture')
            ->select('sell_import.*', 'warehouses.qty', 'stock.name', 'stock.ingredient', 'stock.manufacture', 'units.unit')
            ->get();

        // dd($donthuoc);
        if (request()->ajax()) {
            return datatables()->of($donthuoc)
                ->make(true);
        }
        return view('sotheodoitheodon');
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
