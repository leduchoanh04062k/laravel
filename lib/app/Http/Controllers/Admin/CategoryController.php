<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function getCate()
    {
        $data['catelist'] = Category::all();
        return view('backend.category', $data);
    }
    public function postCate(AddCateRequest $request)
    {
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = $request->name;
        $category->save();
        return back()->with('category', 'Bạn đã thêm danh mục thành công');
    }
    public function getEditCate($id)
    {
        $data['cate'] = Category::find($id);
        return view('backend.editcategory', $data);
    }
    public function postEditCate(EditCateRequest $request, $id)
    {
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = $request->name;
        $category->save();
        return redirect()->intended('admin/category')->with('category', 'Bạn đã sửa thành công danh mục');
    }
    public function getDeleteCate($id)
    {
        Category::destroy($id);
        return back()->with('category', "Bạn đã xóa thành công danh mục");

    }
}