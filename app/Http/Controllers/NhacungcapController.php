<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Exports\NhacungcapExport;
use App\Imports\SupplierImport;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class NhacungcapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datatable = DB::table('supplier')
            ->leftJoin('supplier_import_suppliers', function ($join) {
                $join->on('supplier.id', '=', 'supplier_import_suppliers.idsupplier');
            })
            ->leftJoin('return_to_suppliers', function ($join) {
                $join->on('supplier.id', '=', 'return_to_suppliers.idsupplier');
            })
            ->leftJoin('warehouses', function ($join) {
                $join->on('supplier_import_suppliers.id', '=', 'warehouses.supplier_id')
                    ->groupBy('supplier_import_suppliers.idsupplier');
            })
            ->leftJoin('payment_receipt', function ($join) {
                $join->on('supplier.id', '=', 'payment_receipt.id_supplier_chi')
                    ->groupBy('payment_receipt.id_supplier_chi');
            })
            ->select('supplier.*', \DB::raw('sum(payment_receipt.money) as money'), \DB::raw('sum(return_to_suppliers.pay_supplier) as pay_supplier'), 'warehouses.qty', 'warehouses.price', 'warehouses.discount', 'warehouses.VAT', 'warehouses.type')
            ->groupBy('supplier.id')
            ->get()->toArray();



        // $datatable1 = DB::table('supplier')
        //     ->leftJoin('supplier_import_suppliers', function ($join) {
        //         $join->on('supplier.id', '=', 'supplier_import_suppliers.idsupplier');
        //     })
        //     ->leftJoin('return_to_suppliers', function ($join) {
        //         $join->on('supplier.id', '=', 'return_to_suppliers.idsupplier');
        //     })
        //     // ->leftJoin('warehouses', function ($join) {
        //     //     $join->on('supplier_import_suppliers.id', '=', 'warehouses.supplier_id')
        //     //         ->groupBy('supplier_import_suppliers.idsupplier');
        //     // })
        //     ->leftJoin('warehouses', function ($join) {
        //         $join->on('return_to_suppliers.id', '=', 'warehouses.return_supplier_id')
        //             ->groupBy('return_to_suppliers.idsupplier');
        //     })
        //     ->select('supplier.*', 'warehouses.qty', 'warehouses.price', 'warehouses.discount', 'warehouses.VAT', 'warehouses.type')
        //     ->groupBy('supplier.id')
        //     // ->where('warehouses.type', '=', 'import_from_supplier')
        //     ->get()->toArray();
        // $data = array_merge($datatable, $datatable1);
        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/nhacungcapaction')->with("id", $row->id);
                    } else {
                        return view('action/nhacungcapactioncancel')->with("id", $row->id);
                    }
                })
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                    } else {
                        return '<i class="fa fa-check-circle text-danger pd-r-3" aria-hidden="true"></i>Ngừng h.động';
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
        return view('nhacungcap');
    }

    //     $datatable = DB::table('supplier')
    //     ->join('supplier_import_suppliers', 'supplier_import_suppliers.idsupplier', '=', 'supplier.id')
    //     ->join('warehouses', 'supplier_import_suppliers.id', '=', 'warehouses.supplier_id')
    //     ->select('warehouses.id', 'supplier.status_supplier', 'supplier.name', 'warehouses.price')
    //     // ->where($stock_id)
    // ;

    // if (request()->ajax()) {
    //     return datatables()->of($datatable)
    //         ->addColumn('action', 'action/nhacungcapaction')
    //         ->rawColumns(['status_supplier', 'action'])
    //         ->addIndexColumn()
    //         ->addColumn('status_supplier', function ($row) {
    //             if ($row->status_supplier) {
    //                 return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
    //             } else {
    //                 return '<i class="fa fa-check-circle text-danger pd-r-3" aria-hidden="true"></i>Ngừng h.động';
    //             }
    //         })
    //         ->filter(function ($instance) use ($request) {
    //             if ($request->get('status_supplier') == '0' || $request->get('status_supplier') == '1') {
    //                 $instance->where('status_supplier', $request->get('status_supplier'));
    //             }
    //             if (!empty($request->get('search'))) {
    //                 $instance->where(function ($w) use ($request) {
    //                     $search = $request->get('search');
    //                     $w->orWhere('name', 'LIKE', "%$search%");
    //                 });
    //             }
    //         })
    //         ->make(true);
    // }
    // return view('nhacungcap');
    // }

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
        $supplierId = $request->id;
        $supplier   =   Supplier::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'supplier_id' => $request->supplier_id,
                'name' => $request->name,
                'tax_number' => $request->tax_number,
                'group_id' => $request->group_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'website' => $request->website,
                'address' => $request->address,
                'note' => $request->note,
                // 'status' => $request->status
            ]
        );

        Response()->json($supplier);

        return redirect('nhacungcap');
    }

    public function insertDataExcel(Request $request)
    {
        $data = $request->all();
        foreach ($data as &$item) {
            $supplier[] = DB::table('supplier')->insert(
                [
                    'name' => $item['name'],
                    'note' => $item['note'],
                ]
            );
        }
        return $supplier;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function detailNhaCungCap(Request $request)
    {
        $where = array('idsupplier' => $request->id);
        $id_thu = array('id_supplier' => $request->id);
        $id_chi = array('id_supplier_chi' => $request->id);
        $data1 = DB::table('warehouses')
            ->join('supplier_import_suppliers', 'warehouses.supplier_id', '=', 'supplier_import_suppliers.id')
            ->join('supplier', 'supplier_import_suppliers.idsupplier', '=', 'supplier.id')
            ->select('warehouses.*', 'warehouses.created_at', 'warehouses.type', 'supplier_import_suppliers.id as cusId')
            ->where($where)
            ->get()->toArray();
        $data2 = DB::table('warehouses')
            ->join('return_to_suppliers', 'warehouses.return_supplier_id', '=', 'return_to_suppliers.id')
            ->join('supplier', 'return_to_suppliers.idsupplier', '=', 'supplier.id')
            ->select('warehouses.*', 'warehouses.created_at', 'warehouses.type', 'return_to_suppliers.id as sellId')
            ->where($where)
            ->get()->toArray();
        $data3 = DB::table('payment_receipt')
            ->select('payment_receipt.*', 'payment_receipt.id as payId')
            ->where($id_thu)
            ->orWhere($id_chi)
            ->get()->toArray();
        // dd($data3);
        $data = array_merge($data1, $data2, $data3);
        // dd($data);
        return Response()->json($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $idsupplier = $request->all();
        $company  = Supplier::where($idsupplier)->first();

        return Response()->json($company);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('idsupplier' => $request->id);

        $stock = DB::table('warehouses')
            ->join('supplier_import_suppliers', 'warehouses.supplier_id', '=', 'supplier_import_suppliers.id')
            ->join('supplier', 'supplier_import_suppliers.idsupplier', '=', 'supplier.id')
            ->select('warehouses.*', 'warehouses.created_at', 'warehouses.type')
            ->where($stock_id)
            ->get();

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
        $where = array('id' => $request->id);
        $company  = Supplier::where($where)->first();

        if ($request->debt != '' && $company->debt != '') {
            $company->debt = $request->debt;
            $company->save();
        }
        return Response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    { {
            $supplier = Supplier::where('id', $request->id)->delete();

            return Response()->json($supplier);
        }
    }
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Supplier::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }

    public function active1(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Supplier::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new NhacungcapExport, 'Danhsachnhacuncap-' . time() . '.xlsx');
    }

    public function import()
    {
        $request = request()->file('file');

        $import = new SupplierImport;
        $import->import($request);
        return Response()->json([
            'errors' => $import->failures(),
            'data' => $import->rows
        ]);
    }
}
