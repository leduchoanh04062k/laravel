<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors;
use App\Imports\DoctorImport;
use App\Exports\BacsiExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class BacsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(Doctors::select('*'))
                ->addColumn('action', function ($row) {
                    if ($row->status) {
                        return view('action/bacsi')->with("id", $row->id);
                    } else {
                        return view('action/bacsicancel')->with("id", $row->id);
                    }
                })
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                    } else {
                        return '<i class="fa fa-check-circle text-danger pd-r-3" aria-hidden="true"></i>Ngừng h.động';
                    }
                })
                ->make(true);
        }
        return view('bacsi');
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
        $doctorsId = $request->id;
        $doctors   =   Doctors::updateOrCreate(
            [
                'id' => $doctorsId
            ],
            [
                'name' => $request->name,
                'workplace' => $request->workplace,
                'clinic' => $request->clinic,
                'specialist' => $request->specialist,
                'standard' => $request->standard,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'note' => $request->note,
            ]
        );

        Response()->json($doctors);
        return redirect('bacsi');
    }

    public function insertDataExcel(Request $request)
    {
        $data = $request->all();
        foreach ($data as &$item) {
            $doctor[] = DB::table('doctor')->insert(
                [
                    'name' => $item['name'],
                    'workplace' => $item['workplace'],
                    'specialist' => $item['specialist'],
                    'standard' => $item['standard'],
                    // 'phone' => $item['phone'],
                    // 'email' => $item['email'],
                    // 'address' => $item['address'],
                    'note' => $item['note'],
                ]
            );
        }
        return $doctor;
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
        $where = array('id' => $request->id);
        $company  = Doctors::where($where)->first();

        return Response()->json($company);
    }

    public function detail(Request $request)
    {
        $doctor = array('iddoctor' => $request->id);
        $data = DB::table('warehouses')
            ->join('sell_import', 'sell_import.id', '=', 'warehouses.sell_id')
            ->join('doctor', 'doctor.id', '=', 'sell_import.iddoctor')
            ->select('warehouses.id', 'sell_import.price_import', 'sell_import.date', 'sell_import.name', 'sell_import.patient', 'sell_import.medical_facility')
            ->where($doctor)
            ->get();
        return Response()->json($data);
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
        $doctor = Doctors::where('id', $request->id)->delete();

        return Response()->json($doctor);
    }
    public function active(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Doctors::where($where)->update(['status' => 0]);

        return Response()->json($company);
    }

    public function active1(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Doctors::where($where)->update(['status' => 1]);

        return Response()->json($company);
    }

    /*xuat file excel*/
    public function export()
    {
        return Excel::download(new BacsiExport, 'Danhsachbacsi-' . time() . '.xlsx');
    }

    public function import()
    {
        $request = request()->file('file');

        $import = new DoctorImport;
        $import->import($request);
        return Response()->json([
            'errors' => $import->failures(),
            'data' => $import->rows
        ]);
    }
}
