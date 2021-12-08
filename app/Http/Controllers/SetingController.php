<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;

class SetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('caidat');
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
        $editorId = $request->id;
        $editor  =   Setting::updateOrCreate(
            [
                'id' => $editorId
            ],
            [
                'trangthai' => $request->trangThai,
                'tenmauin' => $request->tenMauIn,
                'loaimauin' => $request->loaiMauIn,
                'loaikichthuoc' => $request->loaiKichThuoc,
                'chieurong' => $request->chieuRong,
                'chieudai' => $request->chieuDai,
                'content' => $request->setting__body,
            ]
        );
        return view('caidat');
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

    public function getdatamauin(Request $request){

        $id = $request->all();
        $company  = Setting::where($id)->first();
        
        return Response()->json($company);
    }

}