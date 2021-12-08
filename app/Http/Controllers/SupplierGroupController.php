<?php

namespace App\Http\Controllers;

use App\Models\SupplierGroup;
use App\Exports\NhomNhaCungCapExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\SupplierGroupImport;
use DB;

class SupplierGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(SupplierGroup::select('*'))
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/nhomnhacungcapaction')->with("id", $row->id);
                    } else {
                        return view('action/nhomnhacungcapactioncancel')->with("id", $row->id);
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

        return view('nhomnhacungcap');
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
        $customer   =   SupplierGroup::updateOrCreate(
            [
                'id' => $customerId
            ],
            [
                'code' => $request->code,
                'name' => $request->name,
                'note' => $request->note,
                // 'status' =>$request->status,

            ]
        );

        Response()->json($customer);

        return redirect('nhomnhacungcap');
    }

    public function insertDataExcel(Request $request)
    {
        $data = $request->all();
        foreach ($data as &$item) {
            $supplier_group[] = DB::table('supplier_group')->insert(
                [
                    'name' => $item['name'],
                    'note' => $item['note']
                ]
            );
        }
        return $supplier_group;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplierGroup  $supplierGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierGroup $supplierGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierGroup  $supplierGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $where = array('id' => $request->id);
        $company  = SupplierGroup::where($where)->first();

        return Response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupplierGroup  $supplierGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierGroup $supplierGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierGroup  $supplierGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $sp_group = SupplierGroup::where('id', $request->id)->delete();
        return Response()->json($sp_group);
    }

    /* active khach hang*/
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = SupplierGroup::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }

    public function unactive(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = SupplierGroup::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }
    //xuat excel
    public function export()
    {
        return Excel::download(new NhomNhaCungCapExport, 'Nhomnhacungcap-' . time() . '.xlsx');
    }

    public function import()
    {
        $request = request()->file('file');

        $import = new SupplierGroupImport;
        $import->import($request);
        return Response()->json([
            'errors' => $import->failures(),
            'data' => $import->rows
        ]);
    }
}
