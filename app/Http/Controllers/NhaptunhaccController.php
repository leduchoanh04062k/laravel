<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierImportSupplier;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\UnitList;
use App\Models\LotNo;
use App\Models\Warehouse;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NhapTuNhaCungCapImport;
use Datatables;
use DB;

class NhaptunhaccController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datatable = DB::table('supplier_import_suppliers')

        ->join('warehouses', 'supplier_import_suppliers.id', '=', 'warehouses.supplier_id')
        ->select('supplier_import_suppliers.*', 'warehouses.name as stockName', 'warehouses.supplier_id', 'warehouses.qty', 'warehouses.price', 'warehouses.discount', 'warehouses.VAT')
        ->where('type', 'import_from_supplier');

        if (request()->ajax()) {
            return datatables()->of($datatable)
            ->addColumn('action', function ($row) {
                if ($row->status) {
                    return view('action/nhaptunhacungcap')->with("id", $row->id);
                } else {
                    return view('action/nhaptunhacungcapcancel')->with("id", $row->id);
                }
            })
            ->addColumn('status', function ($row) {
                if ($row->status) {
                    return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoàn thành';
                } else {
                    return '<i class="fa fa-times-circle text-danger pd-r-3" aria-hidden="true"></i>Đã huỷ';
                }
            })
            ->rawColumns(['status', 'action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('nhaptunhacungcap');
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
        $supplier_id = array('id' => $request->id);
        $supplier  = SupplierImportSupplier::where($supplier_id)->first();

        return Response()->json($supplier);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('supplier_id' => $request->id);

        $stock = DB::table('warehouses')
        ->join('units', 'warehouses.unit_id', '=', 'units.id')
        ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
        ->select('warehouses.*', 'units.unit', 'lot_nos.lot_no', 'lot_nos.exp_date', 'lot_nos.price_import', 'units.unit')
        ->where('type', 'import_from_supplier')
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
        $importSupplier = Warehouse::where('supplier_id', $request->id)->delete();

        $importStock = SupplierImportSupplier::where('id', $request->id)->delete();

        return Response()->json('success');
    }
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = SupplierImportSupplier::where($where)->update(['status' => 0]);

        $stocks  = Warehouse::where('supplier_id', $where)->update(['status' => 0]);

        return Response()->json($company);
    }
    /*xuat file excel*/
    public function import()
    {
        $request = request()->file('file');

        $import = new NhapTuNhaCungCapImport;
        $import->import($request);
        return Response()->json([
            'errors' => $import->failures(),
            'data' => $import->rows
        ]);
    }
    public function checkNameStock(Request $request)
    {
        $name = $request->all();
        $id = DB::table('stock')->whereName($name)->pluck('id');
        $units = DB::table('units')->where('stock_id',$id)->select('id','unit')->get();
        $lotnos = DB::table('lot_nos')->where('stock_id',$id)->get();
        return Response()->json(['units'=>$units,'lotnos'=>$lotnos]);
    }

    public function autosearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $supplier = Supplier::select('*')
        ->where([
            ['name', 'LIKE', "%$keyword%"],
            ['status', '=', 1]
        ])->get();
        return response()->json($supplier);
    }

    public function autosearchimage(Request $request)
    {
        $keyword = $request->input('keyword');
        $stock = DB::table('units')
        ->join('stock', 'units.stock_id', '=', 'stock.id')
        ->select('stock.*', 'units.id as unit_id', 'units.unit', 'units.exchange', 'units.price_sell')
        ->where([
            ['name', 'LIKE', "%$keyword%"],
            ['status', '=', 1]
        ])->get();
        return response()->json($stock);
    }

    public function searchbystock(Request $request)
    {
        $keyword = $request->input('keyword');
        $stock = Stock::select('*')
        ->where([
            ['name', 'LIKE', "%$keyword%"],
            ['status', '=', 1]
        ])->get();
        return response()->json($stock);
    }

    public function autosearchtable(Request $request)
    {
        $search = $request->search;

        $autocomplete = DB::table('units')
        ->join('stock', 'units.stock_id', '=', 'stock.id')
        ->select('stock.*', 'units.id as unit_id', 'units.unit', 'units.exchange', 'units.price_sell', 'units.qty')
        ->where([
            ['name', 'like', '%' . $search . '%'],
            ['status', '=', 1]
        ])->get();

        $response = array();
        foreach ($autocomplete as $autocomplete) {
            $response[] = array(
                "id" => $autocomplete->id,
                "name" => $autocomplete->name,
                "prescription_drug" => $autocomplete->prescription_drug,
                "stock_type" => $autocomplete->stock_type,
                "reg_no" => $autocomplete->reg_no,
                "stock_group" => $autocomplete->stock_group,
                "ingredient" => $autocomplete->ingredient,
                "manufacture" => $autocomplete->manufacture,
                "content" => $autocomplete->content,
                "made_in" => $autocomplete->made_in,
                "packaging" => $autocomplete->packaging,
                "VAT_sell" => $autocomplete->VAT_sell,
                "note" => $autocomplete->note,
                "unit_id" => $autocomplete->unit_id,
                "unit" => $autocomplete->unit,
                "exchange" => $autocomplete->exchange,
                "price_sell" => $autocomplete->price_sell,
                "qty" => $autocomplete->qty
            );
        }
        echo json_encode($response);
        exit;
    }

    public function gethanghoa()
    {
        $datatable = DB::table('stock')
        ->join('units', 'stock.id', '=', 'units.stock_id')
        ->join('warehouses', 'stock.id', '=', 'warehouses.stock_id')
        ->select('stock.*', 'units.id as unit_id', 'units.unit', 'units.price_sell', 'warehouses.qty','warehouses.lotno_id');
        if (request()->ajax()) {
            return datatables()->of($datatable)
            ->make(true);
        }
    }

    public function submitlotno(Request $request)
    {
        $data = $request->all();
        foreach ($data as &$item) {
            $lotno[] = LotNo::updateOrCreate(
                [
                    'id' => $item['lotno_id']
                ],
                [
                    'lot_no' => $item['lot_no'],
                    'exp_date' => $item['exp_date'],
                    'price_import' => $item['price'],
                    'stock_id' => $item['stock_id']
                ]
            );
        }
        return response()->json($lotno);
    }
    public function submitnhacungcap(Request $request)
    {
        $supplierId = $request->id;
        $supplier   =   SupplierImportSupplier::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'idsupplier' => $request->idsupplier,
                'name' => $request->name,
                'totalpaid' => $request->totalpaid,
                'date' => $request->date,
                'hour' => $request->hour,
                'note' => $request->note,
            ]
        );
        return response()->json($supplier);
    }
    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = Warehouse::where('supplier_id', $data[0]['idha'])->get()->toArray();
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
                    'supplier_id' => $item['idha'],
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
        return Response()->json($warehouses);
    }

    public function getlistunit()
    {
        $unitlist = UnitList::select('id', 'name')->get();
        return response()->json($unitlist);
    }

    public function getlistunitwithid(Request $request)
    {
        $stock_id = $request->all();
        $unit  = Unit::where('stock_id', $stock_id)->get();

        return Response()->json($unit);
    }
    public function editinfostock(Request $request)
    {
        $stock_id = $request->all();
        $stock  = Stock::where('id', $stock_id)->get();

        return Response()->json($stock);
    }
    public function getlistlotno(Request $request)
    {
        $stock_id = $request->all();
        $lotno  = LotNo::where('stock_id', $stock_id)->get();

        return Response()->json($lotno);
    }
    public function editlotno(Request $request)
    {
        $stock_id = $request->all();
        $lotno  = DB::table('warehouses')
        ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
        ->select('warehouses.*', 'lot_nos.*')
        ->where([
            ['warehouses.stock_id', $stock_id],
            ['warehouses.status', '1']
        ])->get();
        return Response()->json($lotno);
    }
    public function selectlotno(Request $request)
    {
        $lotno_id = $request->all();
        $lotno  = DB::table('warehouses')
        ->leftjoin('supplier_import_suppliers', 'warehouses.supplier_id', '=', 'supplier_import_suppliers.id')
        ->leftjoin('customer_import_customers', 'warehouses.customer_id', '=', 'customer_import_customers.id')
        ->leftjoin('inventor_import_inventories', 'warehouses.inventory_id', '=', 'inventor_import_inventories.id')
        ->leftjoin('sell_import', 'warehouses.sell_id', '=', 'sell_import.id')
        ->select(
            'supplier_import_suppliers.id as idSupplier',
            'supplier_import_suppliers.name as nameSupplier',
            'supplier_import_suppliers.date as dateSupplier',
            'supplier_import_suppliers.hour as hourSupplier',
            'customer_import_customers.id as idCustomer',
            'customer_import_customers.name as nameCustomer',
            'customer_import_customers.date as dateCustomer',
            'customer_import_customers.hour as hourCustomer',
            'inventor_import_inventories.id as idIventor',
            'inventor_import_inventories.date as dateIventor',
            'inventor_import_inventories.hour as hourIventor',
            'sell_import.id as idSell',
            'sell_import.name as nameSell',
            'sell_import.date as dateSell',
            'sell_import.hour as hourSell',
            'warehouses.*')
        ->where([
            ['warehouses.lotno_id',$lotno_id],
            ['warehouses.status','1']
        ])
        ->get();

        return Response()->json($lotno);
    }
}
