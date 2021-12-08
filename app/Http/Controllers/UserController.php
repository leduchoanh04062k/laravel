<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
        ->join('model_has_roles','users.id','=','model_has_roles.model_id')
        ->join('roles','model_has_roles.role_id','=','roles.id')
        ->select('users.*','roles.name as roleName');

        if (request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('status', function ($row) {
                if ($row->status) {
                    return '<i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>Hoạt động';
                } else {
                    return '<em class="fa fa-times-circle circle_red pd-r-3 text-danger"></em>Ngừng hoạt động';
                }
            })
            ->addColumn('action', function ($row) {
                if ($row->status && ($row->id)==5) {
                    return view('action/nguoidungactionAdmin')->with("id", $row->id);
                }else if($row->status){
                    return view('action/nguoidungaction')->with("id", $row->id);
                }else{
                    return view('action/nguoidungactioncancel')->with("id", $row->id);
                }
            })
            ->rawColumns(["status", "action"])
            ->addIndexColumn()
            ->make(true);
        }
        return view('nguoidung');
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
        $data = $request->all();

        $check = $request->validate([
            'username' => 'required|min:5|unique:users',
        ]);

        $user = User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => $data['role_id'],
            'model_type' => 'App\Models\User',
            'model_id' => $user->id,
        ]);
        return Response()->json($user);
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
        $id = $request->all();
        $idAdmin = User::first()->id;

        $data = DB::table('users')
        ->join('model_has_roles','users.id','=','model_has_roles.model_id')
        ->join('roles','model_has_roles.role_id','=','roles.id')
        ->select('users.*','roles.name as roleName','roles.id as roleId')
        ->where('users.id',$id)->first();
        return Response()->json([$data,$idAdmin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $model_id = $data['model_id'];
        $role_id = $data['role_id'];
        $res = DB::table('model_has_roles')
        ->where('model_id',$model_id)
        ->update(['role_id' => $role_id]);

        $user = User::whereId($model_id)->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email']
        ]);

        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $data = $request->all();
       $user = User::whereId($data['id'])->delete();
       return Response()->json($user);
   }

   public function khoaTaiKhoan(Request $request){
    $data = $request->all();
    User::whereId($data['id'])->update(['status'=>'0']);
    return 'success';
}

public function moKhoaTaiKhoan(Request $request){
    $data = $request->all();
    User::whereId($data['id'])->update(['status'=>'1']);
    return 'success';
}

public function doiMatKhau(Request $request){
    $data = $request->all();
    $password = User::whereId($data['id'])->update(['password'=>Hash::make($data['newPassword'])]);
    return $password;
}
}