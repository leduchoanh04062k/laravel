<?php

namespace App\Http\Controllers;

use App\Models\StockGroup;
use App\Exports\NhomHangHoaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\StockGroupImport;
use DB;

class StockGroupController extends Controller
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
            return datatables()->of(StockGroup::select('*'))
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/nhomhanghoaaction')->with("id", $row->id);
                    } else {
                        return view('action/nhomhanghoaactioncancel')->with("id", $row->id);
                    }
                })
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                    } else {
                        return '<em class="fa fa-times-circle circle_red pd-r-3 text-danger"></em>Ngừng h.động';
                    }
                })
                ->rawColumns(["status", "action"])
                ->addIndexColumn()
                ->make(true);
        }
        return view('nhomhanghoa');
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
        $customerId = $request->id;
        $customer   =   StockGroup::updateOrCreate(
            [
                'id' => $customerId
            ],
            [
                'name' => $request->name,
                'code' => $request->code,
                'note' => $request->note,

            ]
        );


        Response()->json($customer);

        return redirect('nhomhanghoa');
    }



    public function insertDataExcel(Request $request)
    {
        $data = $request->all();
        foreach ($data as &$item) {
            $stock_group[] = DB::table('stock_group')->insert(
                [
                    // 'group_type' => $item['group_type'],
                    'name' => $item['name'],
                    'note' => $item['note']
                ]
            );
        }
        return $stock_group;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockGroup  $stockGroup
     * @return \Illuminate\Http\Response
     */
    public function show(StockGroup $stockGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockGroup  $stockGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $where = array('id' => $request->id);
        $company  = StockGroup::where($where)->first();

        return Response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockGroup  $stockGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockGroup $stockGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockGroup  $stockGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $s_group = StockGroup::where('id', $request->id)->delete();

        return Response()->json($s_group);
    }
    /* active khach hang*/
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = StockGroup::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }
    public function unactive(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = StockGroup::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }
    //export execl
    public function export()
    {
        return Excel::download(new NhomHangHoaExport, 'nhomhanghoa-' . time() . '.xlsx');
    }

    public function import()
    {
        $request = request()->file('file');

        $import = new StockGroupImport;
        $import->import($request);
        return Response()->json([
            'errors' => $import->failures(),
            'data' => $import->rows
        ]);
    }
}
