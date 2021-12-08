<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Sell_Import;
use App\Models\Unit;
use App\Models\UnitList;
use App\Models\LotNo;
use App\Models\Warehouse;
use App\Models\Doctors;
use App\Models\PriceList;
use Datatables;
use DB;


class BanhangController extends Controller
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
            ->select('sell_import.*', 'warehouses.sell_id', 'sell_import.price_import', 'warehouses.discount', 'warehouses.VAT')
            ->where('type', 'sell');

        if (request()->ajax()) {
            return datatables()->of($datatable)
                ->addColumn('action', 'action/banhang')
                ->addColumn('action_kh', 'action/banhang_hd')
                ->rawColumns(['status', 'checkbox', 'action', 'action_kh'])
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<button class="form-control" style="color: #fff;background-color: #36c6d3;width:50%;text-transform: uppercase;padding: 2px 6px 4px 6px;
                    font-size: 10px;">Hoàn thành</button>';
                    } else {
                        return '<button class="form-control" style="color: #fff;background-color: red;width:50%;text-transform: uppercase;padding: 2px 6px 4px 6px;
                    font-size: 10px;">Đã hủy</button>';
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
                ->addColumn('checkbox', function ($row) {
                    if ($row->checkbox) {
                        return '<div style="text-align:-webkit-center"><button class="form-control p-1" style="color: #fff;background-color: #36c6d3;height:15px;width:10px"><i class="fas fa-check" style="font-size:10px"></i></button></div>';
                    } else {
                        return '<div style="text-align:-webkit-center"> <button class="form-control p-1 btn-danger" style="color: #fff;height:15px;width:10px"><i style="font-size:10px" class="fas fa-times"></i></button></div>';
                    }
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('checkbox') == '0' || $request->get('checkbox') == '1') {
                        $instance->where('checkbox', $request->get('checkbox'));
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
        return view('banhang');
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
    public function edit(Request $request)
    {
        $sell_id     = array('id' => $request->id);
        $supplier  = Sell_Import::where($sell_id)->first();

        return Response()->json($supplier);
    }

    public function editstock(Request $request)
    {
        $stock_id = array('sell_id' => $request->id);
        $stock = DB::table('warehouses')
            ->join('units', 'warehouses.unit_id', '=', 'units.id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->join('sell_import', 'warehouses.sell_id', '=', 'sell_import.id')
            ->join('stock', 'warehouses.stock_id', '=', 'stock.id')
            ->join('users', 'warehouses.user_id', '=', 'users.id')
            ->select(
                'users.username',
                'warehouses.*',
                'units.unit',
                'lot_nos.lot_no',
                'stock.VAT_sell',
                'lot_nos.exp_date',
                'warehouses.price',
                'warehouses.qty',
                'sell_import.sale',
                'sell_import.note',
                'sell_import.paid',
                'sell_import.doctor as doctor',
                'sell_import.medical_facility as medical_facility',
                'sell_import.patient as patient',
                'sell_import.address as address',
            )
            ->where('type', 'sell')
            ->where($stock_id)
            ->get();
        return Response()->json($stock);
    }


    public function destroy(Request $request)
    {
        $importSupplier = Warehouse::where('sell_id', $request->id)->delete();

        $importStock = Sell_Import::where('id', $request->id)->delete();

        return Response()->json('success');
    }


    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Sell_Import::where($where)->update(['status' => 0]);
        $stocks  = Warehouse::where('sell_id', $where)->update(['status' => 0]);

        return Response()->json($company);
    }
    public function updateNote(Request $request, $id)
    {
        $where = array('id' => $request->id);
        $company  = Sell_Import::where($where)->first();

        if ($request->note != '' && $company->note != '') {
            $company->note = $request->note;
            $company->save();
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function autosearchdoctor(Request $request)
    {
        $keyword = $request->input('keyword');
        $supplier = Doctors::select('*')
            ->where([
                ['name', 'LIKE', "%$keyword%"],
                ['status', '=', 1]
            ])->get();
        return response()->json($supplier);
    }

    public function submitbanhang(Request $request)
    {
        $supplierId = $request->id;
        $supplier   =   Sell_Import::updateOrCreate(
            [
                'id' => $supplierId
            ],
            [
                'idcustomer' => $request->idcustomer,
                'iddoctor' => $request->iddoctor,
                'date' => $request->date,
                'hour' => $request->hour,
                'name' => $request->name,
                'price_import' => $request->price_import,
                'note' => $request->note,
                'sale' => $request->sale,
                'paid' => $request->paid,
                'thanhtien' => $request->thanhtien,
                'doctor' => $request->doctor,
                'medical_facility' => $request->medical_facility,
                'patient' => $request->patient,
                'diagnostic' => $request->diagnostic,
                'male_female' => $request->male_female,
                'weight' => $request->weight,
                'year_old' => $request->year_old,
                'species' => $request->species,
                'CMND' => $request->CMND,
                'phone' => $request->phone,
                'BHYT' => $request->BHYT,
                'address' => $request->address,
                'guardian' => $request->guardian,
                'checkbox' => $request->checkbox,
                'onlineSelling' => $request->onlineSelling,

            ]
        );
        return response()->json($supplier);
    }


    public function submitphieunhap(Request $request)
    {
        $data = $request->all();
        $stocks = Warehouse::where('sell_id', $data[0]['idha'])->get()->toArray();
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
            $sell[]  = Warehouse::updateOrCreate(
                [
                    'id' => $item['id'],
                ],
                [
                    'user_id' => Auth::id(),
                    'sell_id' => $item['idha'],
                    'name' => $item['name'],
                    'dosage' => $item['dosage'],
                    'stock_id' => $item['stock_id'],
                    'unit_id' => $item['unit_id'],
                    'lotno_id' => $item['lotno_id'],
                    'note' => $item['note'],
                    'discount' => $item['discount'],
                    'VAT' => $item['VAT_sell'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'type' => $item['type']
                ]
            );
        }
        return response()->json($sell);
    }


    public function autosearchimage(Request $request)
    {
        $keyword = $request->input('keyword');
        $stock = DB::table('warehouses')
            ->join('units', 'warehouses.unit_id', '=', 'units.id')
            ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
            ->join('stock', 'warehouses.stock_id', '=', 'stock.id')
            ->where('warehouses.status', '1')
            ->select('stock.*', 'units.id as unit_id', 'units.unit', 'units.price_sell as price_import', 'units.price_sell as price_sell', 'lot_nos.id as lotno_id', 'lot_nos.lot_no', 'lot_nos.exp_date', 'warehouses.status', 'warehouses.qty', 'warehouses.type')
            ->where('stock.name', 'LIKE', "%$keyword%")->get();
        return response()->json($stock);
    }

    public function inhoadon()
    {
        $id = Sell_Import::latest()->first()->id;
        return Response()->json($id);
    }
    public function getpricelist()
    {
        $pricelist = PriceList::all();
        return Response()->json($pricelist);
    }

    public function baoCaoBanHang(Request $request)
    {
        $data = $request->all();
        $fromDate = date($data['fromDate']);
        $toDate = date($data['toDate']);
        $datatable = DB::table('sell_import')
            ->where('sell_import.status', '1')
            ->whereDate('sell_import.created_at', '>=', $fromDate)
            ->whereDate('sell_import.created_at', '<=', $toDate)
            ->select(
                'sell_import.*',
                \DB::raw('sum(price_import) as total'),
                \DB::raw('sum(sale) as totalSale'),
                \DB::raw('DATE(created_at) as day')
            )
            ->groupBy('day')
            ->orderBy('created_at', 'DESC')
            ->get();
        return Response()->json($datatable);
    }
}
