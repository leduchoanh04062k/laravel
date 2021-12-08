<?php

namespace App\Http\Controllers;

use App\Models\SamplePrescription;
use App\Models\StockImport_sampleprescription;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\UnitList;
use App\Models\LotNo;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use DB;

class SamplePrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(SamplePrescription::select('*'))
                ->addColumn('action', 'action/donmauthuoc')
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/donmauthuoc')->with("id", $row->id);
                    } else {
                        return view('action/donmauthuoccancel')->with("id", $row->id);
                    }
                })
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                    } else {
                        return '<em class="fa fa-times-circle circle_red pd-r-3 text-danger"></em>Ngừng h.động';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('donthuocmau');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SamplePrescription  $samplePrescription
     * @return \Illuminate\Http\Response
     */
    public function show(SamplePrescription $samplePrescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SamplePrescription  $samplePrescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id_prescription = array('id' => $request->id);
        $supplier  = SamplePrescription::where($id_prescription)->first();

        return Response()->json($supplier);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('id_prescription' => $request->id);
        $stock = DB::table('stock_import_prescription')
            ->join('units', 'stock_import_prescription.unit_id', '=', 'units.id')
            ->join('lot_nos', 'stock_import_prescription.lotno_id', '=', 'lot_nos.id')
            ->join('stock', 'stock_import_prescription.stock_id', '=', 'stock.id')
            ->select('stock_import_prescription.*', 'stock_import_prescription.qty', 'units.unit', 'lot_nos.lot_no', 'stock.VAT_sell', 'lot_nos.exp_date', 'lot_nos.price_import')
            ->where($stock_id)
            ->get();

        // $stock  = StockImport_sampleprescription::where($stock_id)
        //     ->join('units', 'stock_import_prescription.unit_id', '=', 'units.id')
        //     ->join('lot_nos', 'stock.id', '=', 'lot_nos.stock_id')
        //     ->select('stock_import_prescription.*', 'lot_nos.id as lotno_id ', 'units.unit', 'lot_nos.lot_no', 'lot_nos.exp_date', 'lot_nos.price_import', 'lot_nos.qty')
        // ->get();

        return Response()->json($stock);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SamplePrescription  $samplePrescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SamplePrescription $samplePrescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SamplePrescription  $samplePrescription
     * @return \Illuminate\Http\Response
     */

    public function autosearchimage(Request $request)
    {
        $keyword = $request->input('keyword');
        $stock = DB::table('units')
            ->join('stock', 'units.stock_id', '=', 'stock.id')
            ->join('lot_nos', 'stock.id', '=', 'lot_nos.stock_id')
            ->select('stock.*', 'units.id as unit_id', 'lot_nos.id as lotno_id', 'lot_nos.price_import', 'units.unit', 'units.exchange', 'units.price_sell')
            ->where('name', 'LIKE', "%$keyword%")->get();

        return response()->json($stock);
    }

    public function destroy(Request $request)
    {
        $importSupplier = StockImport_sampleprescription::where('id_prescription', $request->id)->delete();

        $importStock = SamplePrescription::where('id', $request->id)->delete();

        return Response()->json('success');
    }

    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = SamplePrescription::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }

    public function unactive(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = SamplePrescription::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }


    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = StockImport_sampleprescription::where('id_prescription', $data[0]['idha'])->get()->toArray();
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
            StockImport_sampleprescription::where('id', $del)->delete();
        }

        foreach ($data as &$item) {
            StockImport_sampleprescription::updateOrCreate(
                [
                    'id' => $item['id'],
                ],
                [
                    'id_prescription' => $item['idha'],
                    'stock_id' => $item['stock_id'],
                    'unit_id' => $item['unit_id'],
                    'note' => $item['note'],
                    'lotno_id' => $item['lotno_id'],
                    'VAT' => $item['VAT'],
                    'name' => $item['name'],
                    'dose' => $item['dose'],
                    'qty' => $item['qty'],
                    'unit' => $item['unit']
                ]
            );
        }
        return response()->json('success');
    }

    public function submitdonthuocmau(Request $request)
    {
        $supplierId = $request->id;
        $supplier   =   SamplePrescription::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'name' => $request->name,
                'start_date' => $request->start_date,
                'status' => $request->status,
            ]
        );
        return response()->json($supplier);
    }

    public function getlistunit()
    {
        $unitlist = UnitList::select('name')->get();
        return response()->json($unitlist);
    }

    public function getlistunitwithid(Request $request)
    {
        $stock_id = $request->all();
        $unit  = Unit::where('stock_id', $stock_id)->get();

        return Response()->json($unit);
    }

    public function getlistlotnowithid(Request $request)
    {
        $stock_id = $request->all();
        $lotno  = LotNo::where('stock_id', $stock_id)->get();

        return Response()->json($lotno);
    }

    public function editinfostock(Request $request)
    {
        $stock_id = $request->all();
        $stock  = Stock::where('id', $stock_id)->get();

        return Response()->json($stock);
    }
    // public function editlotno(Request $request)
    // {
    //     $stock_id = $request->all();
    //     $lotno  = LotNo::where('stock_id', $stock_id)->get();

    //     return Response()->json($lotno);
    // }
}
