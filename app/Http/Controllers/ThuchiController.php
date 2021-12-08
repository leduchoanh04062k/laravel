<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymenReceipt;
use App\Exports\SoQuyExport;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ThuchiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dstn = PaymenReceipt::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('type', 'receipt')->sum('money');
        $dstc = PaymenReceipt::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('type', 'payment')->sum('money');
        $viewData = [
            'dstn' => $dstn,
            'dstc' => $dstc,
        ];
        if (request()->ajax()) {
            return datatables()->of(PaymenReceipt::select('*'))

                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/soquyaction')->with("id", $row->id);
                    } else {
                        return view('action/soquyactioncancel')->with("id", $row->id);
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
        return view('soquy', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymenReceiptId = $request->id;
        $paymenReceipt   =   PaymenReceipt::updateOrCreate(
            [
                'id' => $paymenReceiptId
            ],
            [
                'id_customer' => $request->id_customer,
                'id_supplier' => $request->id_supplier,
                'id_supplier_chi' => $request->id_supplier_chi,
                'id_customer_chi' => $request->id_customer_chi,
                'date' => $request->date,
                'name' => $request->name,
                'payment_receipt_type' => $request->payment_receipt_type,
                'payment_type' => $request->payment_type,
                'receipt_type' => $request->receipt_type,
                'receiver' => $request->receiver,
                'payer' => $request->payer,
                'note' => $request->note,
                'money' => $request->money,
                'pre_collected' => $request->pre_collected,
                'type' => $request->type,
            ]
        );

        Response()->json($paymenReceipt);
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
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = PaymenReceipt::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = array('id' => $request->id);
        $supplier  = PaymenReceipt::where($id)->first();

        return Response()->json($supplier);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('id' => $request->id);
        $stock  = PaymenReceipt::where($stock_id)->get();
        return Response()->json($stock);
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
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new SoQuyExport, 'SoQuy-' . time() . '.xlsx');
    }

    // public function export()
    // {
    //     return Excel::download(new SoQuyExport, 'PhieuThuChi.xlsx');
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
