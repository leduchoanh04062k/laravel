<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell_Import;
use App\Models\Stock;
use DB;
use App\Models\Unit;
use App\Models\UnitList;
use App\Models\LotNo;
use App\Models\Warehouse;

use App\Exports\HoadonExport;
use Maatwebsite\Excel\Facades\Excel;

class HoadonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datatable = DB::table('sell_import')
            ->join('warehouses', 'sell_import.id', '=', 'warehouses.sell_id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->select('sell_import.*', 'warehouses.sell_id', 'warehouses.name as stockName', 'warehouses.price', 'warehouses.discount', 'warehouses.VAT', 'warehouses.qty')
            ->where('type', 'sell');

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/hoadon')->with("id", $row->id);
                    } else {
                        return view('action/hoadoncancel')->with("id", $row->id);
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
        return view('hoadon');
    }


    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Sell_Import::where($where)->update(['status' => 0]);
        $stocks  = Warehouse::where('sell_id', $where)->update(['status' => 0]);


        return Response()->json($where);
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
    // public function edit(Request $request)
    // {
    //     $sell_id    = array('id' => $request->id);
    //     $customer  = Sell::where($sell_id)->first();

    //     return Response()->json($customer);
    // }

    // public function editstock(Request $request)
    // {
    //     $stock_id = array('sell_id' => $request->id);
    //     $stock  = Sell_Import::where($stock_id)->get();

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

    public function autosearchimage(Request $request)
    {
        $keyword = $request->input('keyword');
        $stock = Stock::orderby('name', 'asc')
            ->select('*')
            ->where([
                ['name', 'LIKE', "%$keyword%"],
                ['status', '1']
            ])->get();
        return response()->json($stock);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new HoadonExport, 'Danhsachhoadon-' . time() . '.xlsx');
    }
    public function updateHoaDon(Request $request){
        $data = $request->all();
        $updateData = Sell_Import::whereId($data["id"])->update(['note' => $data['note']]);
        return Response()->json($updateData);
    }
}
