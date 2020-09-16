<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $data['productlist'] = DB::table('vp_products')->join('vp_categories', 'vp_products.prod_cate', '=', 'vp_categories.cate_id')->orderBy('prod_id', 'desc')->get();
        return view('backend.product', $data);
    }
    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }
    public function postAddProduct(AddProductRequest $request)
    {
        $fillname = $request->img->getClientOriginalName();
        $product = new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = $request->name;
        $product->prod_img = $fillname;
        $product->prod_accessories = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_promotion = $request->promotion;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $product->save();
        $request->img->storeAs('avatar', $fillname);
        // return view('backend.product');
        return redirect('admin/product')->with('product', 'Bạn đã thêm sản phẩm thành công');
    }
    public function getEditProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['catelist'] = Category::all();
        return view('backend.editproduct', $data);
    }
    public function postEditProduct(EditProductRequest $request, $id)
    {
        $product = new Product;
        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] = $request->name;
        $arr['prod_accessories'] = $request->accessories;
        $arr['prod_price'] = $request->price;
        $arr['prod_promotion'] = $request->promotion;
        $arr['prod_condition'] = $request->condition;
        $arr['prod_status'] = $request->status;
        $arr['prod_description'] = $request->description;
        $arr['prod_cate'] = $request->cate;
        $arr['prod_featured'] = $request->featured;
        if ($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $arr['prod_img'] = $img;
            $request->img->storeAs('avatar', $img);
        }
        $product::where('prod_id', $id)->update($arr);
        return redirect('admin/product')->with('product', 'Bạn đã sửa sản phẩm thành công');

    }
    public function getDeleteProduct($id)
    {
        Product::destroy($id);
        return back()->with('product', 'Bạn đã xóa sản phẩm thành công');

    }
}