<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AddUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UserController extends Controller
{
    //
    public function getUser(){
        $data['userlist']=User::all();
      return view('backend.user',$data);
    }
    public function getAddUser(){
        return view('backend.create');
      
    }
    public function postAddUser(Request $request){
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->level=$request->level;
        $user->save();
        return redirect('admin/user');
    }
    public function getEditUser($id){
        $data['user'] = User::find($id);
        return view('backend.edituser',$data);
    }
    public function postEditUser(Request $request,$id){
        $user = new User;
        $arr['name'] =$request->name;
        $arr['email'] =$request->email;
        $arr['password'] =bcrypt($request->password);
        $arr['level']=$request->level;
        $user::where('id',$id)->update($arr);
        return redirect('admin/user');
    
    }
    public function getDeleteUser($id){
        User::destroy($id);
        return back();
          
    }
}
