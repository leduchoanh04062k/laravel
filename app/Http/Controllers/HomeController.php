<?php

namespace App\Http\Controllers;

use App\Models\Sell_Import;
use App\Helpers\Date;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $daynow = Carbon::now()->startOfMonth()->subMonth(1);
        $dateE = Carbon::now()->startOfMonth(); 
        $dayt = Carbon::now()->startOfMonth()->addMonth(1);
        $dayte = Carbon::now()->endOfMonth()->addMonth(1);

        $daynew = Carbon::now()->endOfMonth();

        $hoadon = Sell_Import::whereDate('created_at', Carbon::today())->where('status',1)->count('id');
        $hoadonh = Sell_Import::whereDate('created_at', Carbon::today())->where('status',0)->count('id');
        $hoadon1 = Sell_Import::whereDate('created_at', Carbon::today())->where([
            ['status',1],
            ['onlineSelling',0]
        ])->sum('price_import');
        $hoadontt = Sell_Import::whereBetween('created_at', [$daynow,$dateE])->where('status',1)->count('id');
        $hoadonhtt = Sell_Import::whereBetween('created_at', [$daynow,$dateE])->where('status',0)->count('id');
        $hoadontn = Sell_Import::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('status',1)->count('id');
        $hoadonhtn = Sell_Import::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('status',0)->count('id');
        $dstt = Sell_Import::whereBetween('created_at', [$daynow,$dateE])->where('status',1)->sum('price_import');
        $dstn = Sell_Import::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('status',1)->sum('price_import');
        $viewData= [
            'hoadon'=>$hoadon,
            'hoadonh'=>$hoadonh,
            'hoadon1'=>$hoadon1,
            'hoadontt'=>$hoadontt,
            'hoadonhtt'=>$hoadonhtt,
            'hoadontn'=>$hoadontn,
            'hoadonhtn'=>$hoadonhtn,
            'dstt'=>$dstt,
            'dstn'=>$dstn,
        ];
        return view('tongquan',$viewData);
    }

    public function dayChart(Request $request){
        $salesPerDay = Date::getListDayMonth();
        $ReveneuMonth = DB::table('sell_import')
        ->where('status', 1)
        ->whereMonth('created_at',date('m'))
        ->select(\DB::raw('sum(price_import) as totalMoney'),\DB::raw('DATE(created_at) as day'))->groupBy('day')
        ->get()->toArray();
        /*dd($ReveneuMonth);*/
        $arrReveneuMonth = [];
        foreach ($salesPerDay as $day){
            $total = 0;
            foreach ($ReveneuMonth as $key =>$reveneu){
                if ($reveneu->day == $day) {
                    $total = $reveneu->totalMoney;
                    // dd($reveneu['totalMoney']);
                    break;
                }
            }
            $arrReveneuMonth[]=$total;
        }
        return Response()->json($arrReveneuMonth);
    }
    public function lastDayChart(Request $request){
        $salesPerDay = Date::getLastDayMonth();
        // dd($salesPerDay);
        $ReveneuMonth = DB::table('sell_import')
        ->where('status', 1)
        ->whereMonth('created_at',date('m',strtotime('-1 month')))
        ->select(\DB::raw('sum(price_import) as totalMoney'),\DB::raw('DATE(created_at) as day'))->groupBy('day')
        ->get()->toArray();

        $arrReveneuMonth = [];
        foreach ($salesPerDay as $day){
            $total = 0;
            foreach ($ReveneuMonth as $key =>$reveneu){
                if ($reveneu->day == $day) {
                    $total = $reveneu->totalMoney;
                    break;
                }
            }
            $arrReveneuMonth[]=$total;
        }
        return Response()->json($arrReveneuMonth);
    }
    public function sell_product(){
        $data = DB::table('stock')
        ->join('warehouses', 'warehouses.stock_id', '=','stock.id' )
        ->where('type','sell')
        ->where('warehouses.status','1')
        ->select( 'warehouses.status','stock.id','stock.name',\DB::raw('SUM(warehouses.qty) AS qtys'))
        ->groupBy('id')
        ->orderBy('qtys','desc')
        ->limit(10)
        ->get();
        return Response()->json($data);
    }

    public function expired(){
        $daynow = Carbon::now()->today();
        // $date = date('d/m/Y', strtotime($daynow));
        // dd();

        $expired = DB::table('warehouses')
        ->join('lot_nos','lot_nos.id', 'warehouses.lotno_id')
        ->select('warehouses.stock_id','warehouses.name','warehouses.qty','lot_nos.exp_date','lot_nos.lot_no')
        ->where('exp_date','<',$daynow)
        ->where('type','!=',['return_from_supplier','destruction_export','sell'])
        ->get();
        if (request()->ajax()) {
            return datatables()->of($expired)
            ->make(true);
        }

    }

    public function aboutExpired(){
        $dayt = Carbon::now()->format('d/m/Y');
        $dayte = Carbon::now()->endOfMonth()->addMonth(2)->format('d/m/Y');
        $expired = DB::table('warehouses')
        ->join('lot_nos','lot_nos.id', 'warehouses.lotno_id')
        ->select('warehouses.*','lot_nos.exp_date','lot_nos.lot_no','warehouses.qty')
        ->whereBetween('lot_nos.exp_date',[$dayt,$dayte])//-> bug call string where dayt ,dayte kieu du lieu date (DB)
        // ->whereBetween('lot_nos.exp_date',array('01/01/2015', '01/01/2022'))
        // ->select('lot_nos.exp_date')
        ->get();
        dd($dayt,$dayte,$expired);
        // return Response()->json($expired);
        if (request()->ajax()) {
            return datatables()->of($expired)
            ->make(true);
        }
    }

    public function qtyend(){
        // $data = DB::table('warehouses')
        //         ->join('lot_nos','lot_nos.id','=','warehouses.lotno_id')
        //         ->select('warehouses.stock_id','warehouses.name','warehouses.qty','lot_nos.id','warehouses.type','warehouses.lotno_id')
        //         // ->where('type','=','sell')
        //         ->where('type','=','import_from_supplier')
        //         // ->orWhere('type','=','import_inventory')
        //         ->get();
        $data1 = DB::table('warehouses')
        ->join('lot_nos','lot_nos.id','=','warehouses.lotno_id')
        ->select('warehouses.stock_id','warehouses.name',DB::raw('SUM(warehouses.qty) AS qty'),'lot_nos.id','warehouses.type','warehouses.lotno_id')
        // ->where('type','=','sell')
        ->where('type','=','import_from_supplier')
        // ->orWhere('type','=','import_inventory')
        ->groupBy(['stock_id','lotno_id','type'])
        ->get()->toArray();
        $data2 = DB::table('warehouses')
        ->join('lot_nos','lot_nos.id','=','warehouses.lotno_id')
        ->select('warehouses.stock_id','warehouses.name',DB::raw('SUM(warehouses.qty) AS qty2'),'lot_nos.id','warehouses.type','warehouses.lotno_id')
        ->where('type','=','sell')
        
        // ->where('type','=','import_from_supplier')
        // ->orWhere('type','=','import_inventory')
        ->groupBy(['stock_id','lotno_id','type'])
        ->get()->toArray();
        $data3 = DB::table('warehouses')
        ->join('lot_nos','lot_nos.id','=','warehouses.lotno_id')
        ->select('warehouses.stock_id','warehouses.name',DB::raw('SUM(warehouses.qty) AS qty3'),'lot_nos.id','warehouses.type','warehouses.lotno_id')
        // ->where('type','=','sell')
        // ->where('type','=','import_from_supplier')
        ->where('type','=','import_inventory')
        ->groupBy(['stock_id','lotno_id'])
        ->get()->toArray();
        // dd($data4);
        // $arrayName = array('a' => 'aa','a1' => 'aa','a2' => 'aa','a3' => 'aa' );
        // $arrayName2 = array('b' => 'aa','b1' => 'aa','b2' => 'aa','b3' => 'aa' );
        $data = array_merge($data1,$data2,$data3);
        // $data= $data2->union($data1);
        // $data4=$data3->union($data2);
        // var_dump($data['qty']+$data['qty2']+$data['qty3']);
        dd($data);
        foreach($data as $datas){
            if ($datas->qty-$data->qtys<=10) {
                // $data = 
            }
        }
    }

    public function getdatalotno(){
        $lotno  = DB::table('warehouses')
        ->join('lot_nos', 'warehouses.lotno_id', '=', 'lot_nos.id')
        ->select('warehouses.*', 'lot_nos.*')
        ->where('status','1')
        ->get();
        return Response()->json($lotno);
    }
    public function hoatDongGanDay(){
        $data  = DB::table('warehouses')
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
        ->where('warehouses.status','1')
        ->latest()->take(2)->get();
        return Response()->json($data);
    }
}
