<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug_book;
use DB;

class TheoDoiThuHoiThuocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(Drug_book::select('*'))

                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/sotheodoithuhoithuoc')->with("id", $row->id);
                    } else {
                        return view('action/sotheodoithuhoithuoc')->with("id", $row->id);
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
        return view('theodoithuhoithuoc');
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
        $customer   =   Drug_book::updateOrCreate(
            [
                'id' => $Drug_bookId
            ],
            [
                'date' => $request->date,
                'recall' => $request->recall,
                'location' => $request->location,
                'name' => $request->name,
                'ingredient' => $request->ingredient,
                'made_in' => $request->made_in,
                'lot_no' => $request->lot_no,
                'qty_th' => $request->qty_th,
                'unit_th' => $request->unit_th,
                'qty_br' => $request->qty_br,
                'unit_br' => $request->unit_br,
                'spplier' => $request->spplier,
                'address' => $request->address,
                'phone' => $request->phone,
                'fax' => $request->fax,
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
        $company  = Drug_book::where($where)->first();

        return Response()->json($company);
    }

    // public function detail(Request $request)
    // {
    //     $doctor = array('iddoctor' => $request->id);
    //     $data = DB::table('warehouses')
    //         ->join('sell_import', 'sell_import.id', '=', 'warehouses.sell_id')
    //         ->join('doctor', 'doctor.id', '=', 'sell_import.iddoctor')
    //         ->select('warehouses.id', 'sell_import.price_import', 'sell_import.date', 'sell_import.name', 'sell_import.patient', 'sell_import.medical_facility')
    //         ->where($doctor)
    //         ->get();
    //     return Response()->json($data);
    // }
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
        $doctor = Drug_book::where('id', $request->id)->delete();

        return Response()->json($doctor);
    }
}
