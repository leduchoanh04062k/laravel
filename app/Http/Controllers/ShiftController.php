<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Shift::select('*'))
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/calamviec')->with("id", $row->id);
                    } else {
                        return view('action/calamvieccancel')->with("id", $row->id);
                    }
                })
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                    } else {
                        return '<em class="fa fa-times-circle circle_red pd-r-3 text-danger"></em>Ngừng h.động';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('calamviec');
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
        $shiftId = $request->id;
        $shift   =   Shift::updateOrCreate(
            [
                'id' => $shiftId
            ],
            [
                'name' => $request->name,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'note' => $request->note,

            ]
        );

        Response()->json($shift);

        return redirect('calamviec');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $where = array('id' => $request->id);
        $company  = Shift::where($where)->first();

        return Response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $shift = Shift::where('id', $request->id)->delete();

        return Response()->json($shift);
    }
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Shift::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }
    public function unactive(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Shift::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }
}
