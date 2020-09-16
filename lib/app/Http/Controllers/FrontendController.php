<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getHome()
    {
        $data['featured'] = Product::where('prod_featured', 1)->orderBy('prod_id', 'desc')->take(8)->get();
        //    $data['status'] = Slider::where('status',1)->orderBy('id','desc')->take(5)->get();
        $data['news'] = Product::orderBy('prod_id', 'desc')->take(8)->get();
        return view('frontend.home', $data);

    }
    public function getDetail($id)
    {
        $data['item'] = Product::find($id);
        return view('frontend.details', $data);
    }
    public function getCategory($id)
    {
        $data['items'] = Product::where('prod_cate', $id)->orderBy('prod_id', 'desc')->paginate(8);
        return view('frontend.category', $data);

    }
//     public function getSliders(){
    //          $data['status'] = Slider::where('status',1)->orderBy('id','desc')->take(5)->get();
    //          return view('frontend.home',$data);
    //     }
    public function getSearch(Request $request)
    {
        $result = $request->result;
        $data['keyword'] = $result;
        $result = str_replace('', '%', $result);
        $data['items'] = Product::where('prod_name', 'like', '%' . $result . '%')->get();
        return view('frontend.search', $data);

    }
}