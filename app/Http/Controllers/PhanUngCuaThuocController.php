<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug_reaction;

class PhanUngCuaThuocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(Drug_reaction::select('*'))

                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/phanungcuathuoc')->with("id", $row->id);
                    } else {
                        return view('action/phanungcuathuoc')->with("id", $row->id);
                    }
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
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
        return view('phanungcuathuoc');
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
        $customer   =   Drug_reaction::updateOrCreate(
            [
                'id' => $Drug_bookId
            ],
            [
                'name_dv' => $request->name_dv,
                'code_dv' => $request->code_dv,
                'code_tt' => $request->code_tt,
                'name_bn' => $request->name_bn,
                'nation' => $request->nation,
                'weight' => $request->weight,
                'height' => $request->height,
                'age' => $request->age,
                'gender' => $request->gender,
                'start_date' => $request->start_date,
                'note_pu' => $request->note_pu,
                'name_thuoc' => $request->name_thuoc,
                'content' => $request->content,
                'dosage' => $request->dosage,
                'time' => $request->time,
                'route' => $request->route,
                'begin' => $request->begin,
                'finish' => $request->finish,
                'production' => $request->production,
                'name_sx' => $request->name_sx,
                'nam_cd' => $request->nam_cd,
                'nam_tsd' => $request->nam_tsd,
                'trieuchng' => $request->trieuchng,
                'begin' => $request->begin,
                'name_dt' => $request->name_dt,
                'benhkhac' => $request->benhkhac,
                'ngung_sd' => $request->ngung_sd,
                'other_drug' => $request->other_drug,
                'going_well' => $request->going_well,
                'continue_one' => $request->continue_one,
                'other_drug1' => $request->other_drug1,
                'tientrien' => $request->tientrien,
                'phaitt' => $request->phaitt,
                'kdichung' => $request->kdichung,
                'ADR' => $request->ADR,
                'comment' => $request->comment,
                'certain' => $request->certain,
                'certain_cg' => $request->certain_cg,
                'comment_cg' => $request->comment_cg,
                'name_bc' => $request->name_bc,
                'position_bc' => $request->position_bc,
                'email_bc' => $request->email_bc,
                'date_bc' => $request->date_bc,
                'name_cv' => $request->name_cv,
                'fax_bc' => $request->fax_bc,
                'first' => $request->first,
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
        $company  = Drug_reaction::where($where)->first();

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
        $drug = Drug_reaction::where('id', $request->id)->delete();

        return Response()->json($drug);
    }
}
