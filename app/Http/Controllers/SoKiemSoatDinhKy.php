<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quality_import;
use App\Models\Quality;
use DB;

class SoKiemSoatDinhKy extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatable = DB::table('periodic_qulity')
            ->join('periodic_qulity_import', 'periodic_qulity.id', '=', 'periodic_qulity_import.quality_id')
            ->select('periodic_qulity.*');

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->addColumn('action', 'action/sokiemsoataction')
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('sokiemsoatdinhky');
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
    public function edit(Request $request)
    {
        $quality_id    = array('id' => $request->id);
        $customer  = Quality::where($quality_id)->first();

        return Response()->json($customer);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('quality_id' => $request->id);

        $stock = DB::table('periodic_qulity_import')
            ->join('units', 'periodic_qulity_import.unit_id', '=', 'units.id')
            ->join('lot_nos', 'periodic_qulity_import.lotno_id', '=', 'lot_nos.id')
            ->join('periodic_qulity', 'periodic_qulity_import.quality_id', '=', 'periodic_qulity.id')
            ->join('stock', 'periodic_qulity_import.stock_id', '=', 'stock.id')
            ->select('periodic_qulity_import.*', 'units.unit', 'lot_nos.lot_no', 'periodic_qulity.date', 'stock.reg_no', 'lot_nos.exp_date')
            ->where($stock_id)
            ->get();

        return Response()->json($stock);
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
        $importSupplier = Quality::where('id', $request->id)->delete();

        $importStock = Quality_import::where('id', $request->id)->delete();

        return Response()->json([$importStock, $importSupplier]);
    }

    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = Quality_import::where('quality_id', $data[0]['idha'])->get()->toArray();
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
            Quality_import::where('id', $del)->delete();
        }

        foreach ($data as &$item) {
            Quality_import::updateOrCreate(
                [
                    'id' => $item['id'],
                ],
                [
                    'quality_id' => $item['idha'],
                    'stock_id' => $item['stock_id'],
                    'unit_id' => $item['unit_id'],
                    'note' => $item['note'],
                    'lotno_id' => $item['lotno_id'],
                    'name' => $item['name'],
                    'quality' => $item['quality'],
                    'qty' => $item['qty'],
                    'remedial' => $item['remedial']
                ]
            );
        }
        return response()->json('success');
    }

    public function submitsokiemsoat(Request $request)
    {
        $supplierId = $request->id;
        $supplier   =   Quality::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'time' => $request->time,
                'date' => $request->date,
                'name' => $request->name,
                'note' => $request->note,
                'reason' => $request->reason,
            ]
        );
        return response()->json($supplier);
    }
}
