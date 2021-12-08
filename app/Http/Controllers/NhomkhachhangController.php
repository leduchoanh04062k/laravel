<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerGroup;
use App\Exports\NhomKhachhangExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerGroupImport;
use DB;

class NhomkhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(CustomerGroup::select('*'))
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/nhomkhachhangaction')->with("id", $row->id);
                    } else {
                        return view('action/nhomkhachhangactioncancel')->with("id", $row->id);
                    }
                })

                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                    } else {
                        return '<em class="fa fa-times-circle circle_red pd-r-3 text-danger"></em>Ngừng h.động';
                    }
                })
                // ->filter(function ($instance) use ($request) {
                //     if ($request->get('status') == '0' || $request->get('status') == '1') {
                //         $instance->where('status', $request->get('status'));
                //     }
                //     if (!empty($request->get('search'))) {
                //         $instance->where(function ($w) use ($request) {
                //             $search = $request->get('search');
                //             $w->orWhere('name', 'LIKE', "%$search%");
                //         });
                //     }
                // })
                ->rawColumns(["status", "action"])
                ->addIndexColumn()
                ->make(true);
        }

        return view('nhomkhachhang');
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
        $customer   =   CustomerGroup::updateOrCreate(
            [
                'id' => $customerId
            ],
            [
                'group_type' => $request->group_type,
                'name' => $request->name,
                'note' => $request->note,

            ]
        );

        Response()->json($customer);

        return redirect('nhomkhachhang');
    }

    public function insertDataExcel(Request $request)
    {
        $data = $request->all();
        foreach ($data as &$item) {
            $customer_group[] = DB::table('customer_group')->insert(
                [
                    // 'group_type' => $item['group_type'],
                    'name' => $item['name'],
                    'note' => $item['note']
                ]
            );
        }
        return $customer_group;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $where = array('id' => $request->id);
        $company  = CustomerGroup::where($where)->first();

        return Response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = CustomerGroup::where('id', $request->id)->delete();

        return Response()->json($customer);
    }

    /* active khach hang*/
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = CustomerGroup::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }

    public function unactive(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = CustomerGroup::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }
    //xuat tu file excel
    public function export()
    {
        return Excel::download(new NhomKhachHangExport, 'danhsachnhomKH-' . time() . '.xlsx');
    }

    public function import()
    {
        $request = request()->file('file');

        $import = new CustomerGroupImport;
        $import->import($request);
        return Response()->json([
            'errors' => $import->failures(),
            'data' => $import->rows
        ]);
    }
}
