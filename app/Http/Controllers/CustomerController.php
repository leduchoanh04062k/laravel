<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('khachhang');
    }
    public function store(Request $request)
    {
        Customer::create($request->all());

        return response()->json(['success' => true]);
    }
}

/*
$customer = new Customer;
		$customer->customer_id = $request->customer_id;
		$customer->name = $request->name;
		$customer->group_id = $request->group_id;
		$customer->customer_type = $request->customer_type;
		$customer->ID_code = $request->ID_code;
		$customer->age = $request->age;
		$customer->age_type = $request->age_type;
		$customer->dob = $request->dob;
		$customer->gender = $request->gender;
		$customer->tax_number = $request->tax_number;
		$customer->phone = $request->phone;
		$customer->email = $request->email;
		$customer->company = $request->company;
		$customer->address = $request->address;
		$customer->note = $request->note;

		$customer->save();
*/