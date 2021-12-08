<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use DataTables;
use App\Imports\CustomerImport;
use App\Exports\KhachhangExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;

class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('customer')
            ->leftJoin('sell_import', function ($join) {
                $join->on('customer.id', '=', 'sell_import.idcustomer');
            })
            ->leftJoin('customer_import_customers', function ($join) {
                $join->on('customer.id', '=', 'customer_import_customers.idcustomer');
            })
            ->leftJoin('warehouses', function ($join) {
                $join->on('customer_import_customers.id', '=', 'warehouses.customer_id')
                    ->groupBy('customer_import_customers.idcustomer');
            })
            ->leftJoin('payment_receipt', function ($join) {
                $join->on('customer.id', '=', 'payment_receipt.id_customer')
                    ->groupBy('payment_receipt.id_customer');
            })
            // ->leftJoin('payment_receipt', function ($join) {
            //     $join->on('customer.id', '=', 'payment_receipt.id_customer_chi');
            // })
            ->select(
                'customer.*',
                \DB::raw('customer.id as id'),
                'customer.name',
                'customer.debt',
                'customer.note',
                'customer.status',
                \DB::raw('sum(payment_receipt.money) as money'),
                \DB::raw('sum(sell_import.price_import) as price_imports'),
                \DB::raw('sum(warehouses.price) as prices'),
                \DB::raw('sum(warehouses.qty) as qtys'),
                \DB::raw('sum(warehouses.discount) as discounts'),
                \DB::raw('sum(warehouses.VAT) as VATs'),
            )
            ->groupBy('customer.id')
            ->get()->toArray();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/khachhangaction')->with("id", $row->id);
                    } else {
                        return view('action/khachhangactioncancel')->with("id", $row->id);
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
        return view('khachhang');
    }


    public function detailKhachHang(Request $request)
    {
        /*$where = array('idcustomer' => $request->id);
        $id_thu = array('id_customer' => $request->id);
        $id_chi = array('id_customer_chi' => $request->id);
        $data1 = DB::table('warehouses')
            ->join('customer_import_customers', 'warehouses.customer_id', '=', 'customer_import_customers.id')
            ->join('customer', 'customer_import_customers.idcustomer', '=', 'customer.id')
            ->select('warehouses.*', 'warehouses.created_at', 'warehouses.type', 'customer_import_customers.id as cusId')
            ->where($where)
            ->get()->toArray();
        $data2 = DB::table('warehouses')
            ->join('sell_import', 'warehouses.sell_id', '=', 'sell_import.id')
            ->join('customer', 'sell_import.idcustomer', '=', 'customer.id')
            ->select('warehouses.*', 'warehouses.created_at', 'warehouses.type','sell_import.paid','sell_import.id as sellId')
            ->where($where)
            ->get()->toArray();
        $data3 = DB::table('payment_receipt')
            ->select('payment_receipt.*', 'payment_receipt.id as payId')
            ->where($id_thu)
            ->orWhere($id_chi)
            ->get()->toArray();*/

        /*$data = array_merge($data1, $data2, $data3);*/

        $where = $request->id;
        $data = DB::table('warehouses')
            ->leftjoin('sell_import', 'warehouses.sell_id', '=', 'sell_import.id')
            ->leftjoin('customer_import_customers', 'warehouses.customer_id', '=', 'customer_import_customers.id')
            ->where('sell_import.idcustomer', 4)
            ->get();
        return Response()->json($data);
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
        $customerId = $request->id;
        $customer   =   Customer::updateOrCreate(
            [
                'id' => $customerId
            ],
            [
                'code' => $request->code,
                'name' => $request->name,
                'group_id' => $request->group_id,
                'customer_type' => $request->customer_type,
                'ID_code' => $request->ID_code,
                'age' => $request->age,
                'age_type' => $request->age_type,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'tax_number' => $request->tax_number,
                'phone' => $request->phone,
                'email' => $request->email,
                'company' => $request->company,
                'address' => $request->address,
                'note' => $request->note,
            ]
        );

        return Response()->json($customer);
    }


    public function insertDataExcel(Request $request)
    {
        $data = $request->all();
        foreach ($data as &$item) {
            $customers[] = DB::table('customer')->insert(
                [
                    'name' => $item['name'],
                    'dob' => $item['dob'],
                    'gender' => $item['gender'],
                    'tax_number' => $item['tax_number'],
                    'phone' => $item['phone'],
                    'email' => $item['email'],
                    'company' => $item['company'],
                    'address' => $item['address'],
                    'note' => $item['note'],
                ]
            );
        }
        return $customers;
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
        $company  = Customer::where($where)->first();

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
        $where = array('id' => $request->id);
        $company  = Customer::where($where)->first();

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
    {
        $customer = Customer::where('id', $request->id)->delete();

        return Response()->json($customer);
    }
    /* active khach hang*/
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Customer::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }
    public function unactive(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Customer::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new KhachhangExport, 'Danhsachkhachhang-' . time() . '.xlsx');
    }

    public function viewpdf()
    {
        $customers = Customer::latest()->paginate(5);
        return view('pdf.phieuthukhachhang', compact('customers'));
    }
    public function createpdf()
    {
        $customers = Customer::latest()->paginate(5);
        $pdf = PDF::loadView('pdf.phieuthukhachhang', compact('customers'));
        return $pdf->download('phieuthukhachhang.pdf');
    }
    public function import()
    {
        $request = request()->file('file');

        $import = new CustomerImport;
        $import->import($request);
        return Response()->json([
            'errors' => $import->failures(),
            'data' => $import->rows
        ]);
    }
}
