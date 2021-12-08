<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\InventorImportInventor;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\UnitList;
use App\Models\LotNo;
use App\Models\Warehouse;

use App\Exports\NhaptonExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class NhaptonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datatable = DB::table('inventor_import_inventories')
            ->join('warehouses', 'inventor_import_inventories.id', '=', 'warehouses.inventory_id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->select('inventor_import_inventories.*', 'warehouses.inventory_id', 'warehouses.qty', 'warehouses.price', 'warehouses.discount', 'warehouses.VAT')
            ->where('type', 'import_inventory');

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/nhapton')->with("id", $row->id);
                    } else {
                        return view('action/nhaptoncancel')->with("id", $row->id);
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
                ->make(true);
        }
        return view('nhapton');
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
        $inventory_id = array('id' => $request->id);
        $supplier  = InventorImportInventor::where($inventory_id)->first();

        return Response()->json($supplier);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('inventory_id' => $request->id);

        $stock = DB::table('warehouses')
            ->join('units', 'warehouses.unit_id', '=', 'units.id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->select('warehouses.*', 'units.unit', 'lot_nos.lot_no', 'lot_nos.exp_date', 'lot_nos.price_import')
            ->where('type', 'import_inventory')
            ->where($stock_id)
            ->get();

        return Response()->json($stock);
    }
    // public function editstockprice(Request $request)
    // {
    //     $stock_id = array('inventory_id' => $request->id);
    //     $stock  = StockImportInventory::where($stock_id)->first();

    //     return Response()->json($stock);
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
        $importSupplier = Warehouse::where('inventory_id', $request->id)->delete();

        $importStock = InventorImportInventor::where('id', $request->id)->delete();

        return Response()->json('success');
    }

    /* active khach hang*/
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = InventorImportInventor::where($where)->update(['status' => 0]);
        $stocks  = Warehouse::where('inventory_id', $where)->update(['status' => 0]);

        return Response()->json($company);
    }
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new NhaptonExport, 'Nhapton' . time() . '.xlsx');
    }

    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = Warehouse::where('inventory_id', $data[0]['idha'])->get()->toArray();
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
                    'inventory_id' => $item['idha'],
                    'stock_id' => $item['stock_id'],
                    'unit_id' => $item['unit_id'],
                    'lotno_id' => $item['lotno_id'],
                    'name' => $item['name'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'discount' => $item['discount'],
                    'VAT' => $item['VAT'],
                    'type' => $item['type']
                ]
            );
        }
        return response()->json($warehouses);
    }

    public function submitnhapton(Request $request)
    {
        $supplierId = $request->id;
        $supplier   =   InventorImportInventor::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'date' => $request->date,
                'hour' => $request->hour,
                'note' => $request->note,
            ]
        );
        return response()->json($supplier);
    }

    public function selectlotno(Request $request)
    {
        $lotno_id = $request->all();
        $lotno  = DB::table('inventor_import_inventories')
            ->join('warehouses', 'inventor_import_inventories.id', '=', 'warehouses.supplier_id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->select('inventor_import_inventories.*', 'warehouses.id as id', 'warehouses.*', 'inventor_import_inventories.name as name')
            ->where('lotno_id', $lotno_id)->get();

        return Response()->json($lotno);
    }
}
