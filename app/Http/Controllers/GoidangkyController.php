<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack_data;
use App\Models\Register_package;
use DB;

class GoidangkyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $datatable = DB::table('register_package')
            ->join('pack_data', 'register_package.data_id', '=', 'pack_data.id')
            ->select('register_package.*', 'pack_data.price', 'pack_data.name', 'pack_data.time', 'pack_data.account', 'register_package.time as Time', 'register_package.total as total')->get(3);
        // dd($datatable);
        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->rawColumns(['status',])
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Thành công';
                    } else {
                        return '<i class="fa fa-check-circle text-danger pd-r-3" aria-hidden="true"></i>Đã hủy';
                    }
                })
                ->make(true);
        }
        return view('goidangky');
    }

    public function getHome()
    {
        $data['news'] = Pack_data::orderBy('id')->get();
        return view('goidangky', $data);
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

    public function submitdangky(Request $request)
    {
        $supplierId = $request->id;
        $supplier   =   Register_package::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'id_user' => $request->id_user,
                'qty' => $request->qty,
                'data_id' => $request->data_id,
                'time' => $request->time,
                'total' => $request->total,
            ]
        );
        return response()->json($supplier);
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
