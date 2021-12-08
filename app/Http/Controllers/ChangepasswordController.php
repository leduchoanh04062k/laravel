<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;


class ChangepasswordController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request){
		
	}
	
	public function store(Request $request)
	{
		$user = \Auth::user();
		$data = $request->all();

		if(password_verify($data['currentPassword'],$user->password)){
			$user->password = Hash::make($data['newPassword']);
			$user->save();
			return 'success';
		}else{
			return 'error';
		}
	}
}
