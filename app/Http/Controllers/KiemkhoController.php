<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckInventory;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\UnitList;
use App\Models\LotNo;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;
use App\Exports\XuathuyExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;



class KiemkhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datatable = DB::table('check_inventory')
            ->join('warehouses', 'check_inventory.id', '=', 'warehouses.check_inventory_id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->select('check_inventory.*', 'warehouses.check_inventory_id', 'warehouses.price', 'warehouses.discount', 'warehouses.VAT')
            ->where('type', 'import_check_inventory');

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/kiemkho')->with("id", $row->id);
                    } else {
                        return view('action/kiemkhocancel')->with("id", $row->id);
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
        return view('kiemkho');
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
        $check_inventory_id = array('id' => $request->id);
        $supplier  = CheckInventory::where($check_inventory_id)->first();

        return Response()->json($supplier);
    }

    public function editstock(Request $request)
    {

        $stock_id = array('check_inventory_id' => $request->id);
        $stock = DB::table('warehouses')
            ->join('units', 'warehouses.unit_id', '=', 'units.id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->select('warehouses.*', 'units.unit', 'lot_nos.lot_no', 'lot_nos.exp_date', 'lot_nos.price_import',)
            ->where('type', 'import_check_inventory')
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
        $importSupplier = Warehouse::where('check_inventory_id', $request->id)->delete();

        $importStock = CheckInventory::where('id', $request->id)->delete();

        return Response()->json('success');
    }

    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = CheckInventory::where($where)->update(['status' => 0]);
        $stocks  = Warehouse::where('check_inventory_id', $where)->update(['status' => 0]);

        return Response()->json($company);
    }
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new XuathuyExport, 'Danhsachxuathuy-' . time() . '.xlsx');
    }


    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = Warehouse::where('check_inventory_id', $data[0]['idha'])->get()->toArray();
        $data_id = [];
        $stock_id = [];
        $delete_Id = [];

        foreach ($stocks as &$stock) {
            if ($stock['id']) {
                array_push($stock_id, $stock['id']);
            }
        }
        foreach ($data as &$item) {
            if ($item['id']) {
                array_push($data_id, $item['id']);
            }
        }

        $differenceArray1 = array_diff($data_id, $stock_id);
        $differenceArray2 = array_diff($stock_id, $data_id);

        $delete_Id = array_merge($differenceArray1, $differenceArray2);
        foreach ($delete_Id as &$del) {
            Warehouse::where('id', $del)->delete();
        }


        foreach ($data as &$item) {
            $warehouses[] = Warehouse::updateOrCreate(
                [
                    'id' => $item['id'],
                ],
                [
                    'user_id' => Auth::id(),
                    'check_inventory_id' => $item['idha'],
                    'stock_id' => $item['stock_id'],
                    'unit_id' => $item['unit_id'],
                    'lotno_id' => $item['lotno_id'],
                    'name' => $item['name'],
                    'qty' => $item['qty'],
                    'reality' => $item['reality'],
                    'reasons' => $item['reasons'],
                    'handling_measures' => $item['handling_measures'],
                    'note' => $item['note'],
                    'price' => $item['price'],
                    'type' => $item['type']

                ]
            );
        }
        return response()->json($warehouses);
    }

    public function submitkiemkho(Request $request)
    {
        $supplierId = $request->id;
        $supplier   =   CheckInventory::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'date' => $request->date,
                'hour' => $request->hour,
                'note' => $request->note
            ]
        );
        return response()->json($supplier);
    }
}
