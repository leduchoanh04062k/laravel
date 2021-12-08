<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockGroup;
use App\Models\Unit;
use App\Models\LotNo;
use App\Models\NationalMedicinesList;
use App\Models\LuuLichSuInMaVach;
use App\Models\Warehouse;
use Illuminate\Http\Request;

use App\Exports\HangHoaExport;
use App\Imports\StockImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datatable = DB::table('stock')
            ->join('units', 'stock.id', '=', 'units.stock_id')
            ->select('stock.*', 'units.unit', 'units.price_sell', 'stock.id as STOCKID', 'units.id as UNITID');

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->addColumn('action', 'action/hanghoaaction')
                ->rawColumns(['status', 'action'])
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                    } else {
                        return '<i class="fa fa-check-circle text-danger pd-r-3" aria-hidden="true"></i>Ngừng hoạt động';
                    }
                })
                ->make(true);
        }
        return view('hanghoa');
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
        $stockId = $request->stock_id;
        $stock   = Stock::updateOrCreate(
            [
                'id' => $stockId,
            ],
            [
                'name' => $request->name,
                'prescription_drug' => $request->prescription_drug,
                'stock_type' => $request->stock_type,
                'reg_no' => $request->reg_no,
                'stock_group' => $request->stock_group,
                'ingredient' => $request->ingredient,
                'manufacture' => $request->manufacture,
                'content' => $request->content,
                'made_in' => $request->made_in,
                'packaging' => $request->packaging,
                'VAT_sell' => $request->VAT_sell,
                'note' => $request->note
            ]
        );

        return Response()->json($stock);
    }

    public function insertDataExcel(Request $request)
    {
        $data = $request->all();
        foreach ($data as &$item) {
            $stock[] = DB::table('stock')->insert(
                [
                    'name' => $item['name'],
                    'stock_type' => $item['stock_type'],
                    'reg_no' => $item['reg_no'],
                    'stock_group' => $item['stock_group'],
                    'ingredient' => $item['ingredient'],
                    'manufacture' => $item['manufacture'],
                    'content' => $item['content'],
                    'made_in' => $item['made_in'],
                    'packaging' => $item['packaging'],
                    'VAT_sell' => $item['VAT_sell'],
                    'note' => $item['note']
                ]
            );
        }
        return $stock;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $stock_id = array('id' => $request->id);
        $stock = Stock::where($stock_id)->first();

        return Response()->json($stock);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sock = Stock::where('id', $request->id)->delete();
        return Response()->json($sock);
    }

    public function active(Request $request)
    {
        /*$where = array('id' => $request->id);
        $company  = Stock::where($where)->update(['status' => 0]);*/

        return Response()->json("error");
    }
    //export ecxel

    public function export()
    {
        return Excel::download(new HangHoaExport, 'hanghoa-' . time() . '.xslx');
    }
    public function import()
    {
        $request = request()->file('file');

        $import = new StockImport;
        $import->import($request);
        return Response()->json([
            'errors' => $import->failures(),
            'data' => $import->rows
        ]);
    }

    public function submitunit(Request $request)
    {
        $data = $request->all();
        $units = Unit::where('stock_id', $data[0]['stock_id'])->get()->toArray();
        $data_id = [];
        $unit_id = [];
        $delete_Id = [];

        foreach ($units as &$unit) {
            if ($unit['id']) {
                array_push($unit_id, $unit['id']);
            }
        }
        foreach ($data as &$item) {
            if ($item['id']) {
                array_push($data_id, $item['id']);
            }
        }

        $differenceArray1 = array_diff($data_id, $unit_id);
        $differenceArray2 = array_diff($unit_id, $data_id);

        $delete_Id = array_merge($differenceArray1, $differenceArray2);
        foreach ($delete_Id as &$del) {
            Unit::where('id', $del)->delete();
        }

        foreach ($data as &$item) {
            $unit[] = Unit::updateOrCreate(
                [
                    'id' => $item['id'],
                ],
                [
                    'stock_id' => $item['stock_id'],
                    'unit' => $item['unit'],
                    'exchange' => $item['exchange'],
                    'price_sell' => $item['price_sell'],
                    'barcode' => $item['barcode'],
                    'useforsale' => $item['useforsale'],
                    'outofstock' => $item['outofstock'],
                    'qty' => $item['qty']
                ]
            );
        }
        return Response()->json($unit);
    }
    public function luuLichSuInMaVach(Request $request){
        $data = $request->all();

        $unit = LuuLichSuInMaVach::updateOrCreate(
            [
                'stock_id' => $data['stock_id'],
                'unit' => $data['unit'],
            ],
            [
                'name' => $data['name'],
                'price_sell' => $data['price_sell'],
                'stock_type' => $data['stock_type'],
                'reg_no' => $data['reg_no'],
                'packaging' => $data['packaging'],
            ]
    );
        return Response()->json($unit);
    }
    public function dataTableInMaVach(){
        $data = DB::table('luu_lich_su_in_ma_vaches')->orderBy('id','desc');
        return datatables()->of($data)
        ->make(true);
    }

    public function autosearchtable(Request $request)
    {
        $search = $request->search;

        $autocomplete = NationalMedicinesList::select('*')
            ->where('name', 'like', '%' . $search . '%')->take(100)->get();

        $response = array();
        foreach ($autocomplete as $autocomplete) {
            $response[] = array(
                "name" => $autocomplete->name,
                "reg_no" => $autocomplete->reg_no,
                "manufacture" => $autocomplete->manufacture,
                "made_in" => $autocomplete->made_in,
                "content" => $autocomplete->content,
                "unit" => $autocomplete->unit,
                "packaging" => $autocomplete->packaging,
                "main_ingredient" => $autocomplete->main_ingredient
            );
        }
        echo json_encode($response);
        exit;
    }

    public function getdatawarehouse()
    {
        $warehouses = DB::table('warehouses')->where('status', '1')->get();
        return Response()->json($warehouses);
    }
    public function getdatalotno()
    {
        $lotno  = DB::table('warehouses')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->select('warehouses.*', 'lot_nos.*')
            ->where('status', '1')
            ->get();
        return Response()->json($lotno);
    }
}
