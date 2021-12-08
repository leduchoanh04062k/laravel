<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use DB;

class TheoDoiSuLyKhieuNaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(Complain::select('*'))

                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/theodoisulykhieunai')->with("id", $row->id);
                    } else {
                        return view('action/theodoisulykhieunai')->with("id", $row->id);
                    }
                })
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoàn thành';
                    } else {
                        return '<i class="fa fa-check-circle text-danger pd-r-3" aria-hidden="true"></i>Đã hủy';
                    }
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                        $instance->where('status', $request->get('status'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('name', 'LIKE', "%$search%");
                        });
                    }
                })
                ->make(true);
        }
        return view('theodoisulykhieunai');
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
        $Drug_bookId = $request->id;
        $customer   =   Complain::updateOrCreate(
            [
                'id' => $Drug_bookId
            ],
            [
                'date' => $request->date,
                'name_tt' => $request->name_tt,
                'idcustomer' => $request->idcustomer,
                'name' => $request->name,
                'address' => $request->address,
                'fax' => $request->fax,
                'email' => $request->email,
                'patient' => $request->patient,
                'reg_no' => $request->reg_no,
                'ingredient' => $request->ingredient,
                'content' => $request->content,
                'manufacture' => $request->manufacture,
                'made_in' => $request->made_in,
                'packaging' => $request->packaging,
                'lotno' => $request->lotno,
                'exp_date' => $request->exp_date,
                'qty' => $request->qty,
                'unit' => $request->unit,
                'reason' => $request->reason,
                'reason_xl' => $request->reason_xl,
                'note' => $request->note,
            ]
        );

        return Response()->json($customer);
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
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Complain::where($where)->first();

        return Response()->json($company);
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
    public function destroy(Request $request)
    {
        $doctor = Complain::where('id', $request->id)->delete();

        return Response()->json($doctor);
    }
}
