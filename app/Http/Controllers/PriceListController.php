<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use App\Models\NationalMedicinesList;
use App\Models\Stock;
use App\Models\StockPrice;
use Illuminate\Http\Request;
use DB;
class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // if (request()->ajax()) {
        //     return datatables()->of(PriceList::select('*'))
        //     ->addColumn('action', 'action/banggia')
        //     ->rawColumns(['status', 'action'])
        //     ->addIndexColumn()
        //     ->make(true);
        // }
        $data = DB::table('price_list')->get();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/banggia')->with("id", $row->id);
                    } else {
                        return view('action/banggiacancel')->with("id", $row->id);
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
        return view('banggia');
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
     * @param  \App\Models\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function show(PriceList $priceList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $supplier_id = array('id' => $request->id);
        $supplier  = PriceList::where($supplier_id)->first();

        return Response()->json($supplier);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('price_id' => $request->id);
        $stock  = StockPrice::where($stock_id)->get();

        return Response()->json($stock);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceList $priceList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceList $priceList)
    {
        //
    }

    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = PriceList::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }

    public function unactive(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = PriceList::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }
    public function gethanghoa(){
        if (request()->ajax()) {
            return datatables()->of(Stock::select('*'))
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function submitphieunhap(Request $request){
        $data = $request->all();
        $stocks = StockPrice::where('price_id', $data[0]['idha'])->get()->toArray();
        $data_id=[];
        $stock_id=[];
        $delete_Id = [];

        foreach($stocks as &$stock){
            array_push($stock_id,$stock['id']);
        }
        foreach($data as &$item){
            array_push($data_id,$item['id']);
        }

        $differenceArray1 = array_diff($data_id, $stock_id);
        $differenceArray2 = array_diff($stock_id, $data_id);

        $delete_Id = array_merge($differenceArray1, $differenceArray2);
        foreach ($delete_Id as &$del){
            StockPrice::where('id', $del)->delete();
        }
        
        foreach ($data as &$item) {
            StockPrice::updateOrCreate (
                [
                    'id' => $item['id'],
                ],
                [
                    'price_id' => $item['idha'],
                    'stock_id' => $item['stock_id'],
                    'name' => $item['name'],                        
                    'unit' => $item['unit'],
                    'price_sell' => $item['price_sell'],
                    'price_new' => $item['price_new'],
                ]);
        }
        return response()->json('success');
    }

    public function submitbanggia(Request $request){
        $supplierId = $request->id;
        $supplier   =   PriceList::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'name' => $request->name,
                'apply_clinic' => $request->apply_clinic,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'note' => $request->note,
                'status' => $request->status
            ]
        );
        return response()->json($supplier);
    }
}
