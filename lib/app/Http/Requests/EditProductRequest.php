<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'required|max:25|min:5|unique:vp_products,prod_name',
            'accessories'=>'required|:vp_products,prod_accessories',
            'price'=>'required|:vp_products,prod_price',
            'promotion'=>'required|:vp_products,prod_promotion',
            'condition'=>'required|:vp_products,prod_condition',
            'description'=>'required|max:305|min:15|:vp_products,prod_description',
             'img'=>'image'
        ];
    }
    public function messages(){
        return[
            'required'=>':attribute không được để trống',
            'name.unique'=>'Tên sản phẩm đã tồn tại!',
            'name.max'=>'tên không được để quá 25 kí tự',
            'name.min'=>'tên không được để nhỏ hơn 5 kí tự',
            'description.min'=>'miêu tả không được nhỏ hơn 15 kí tự',
            'description.max'=>'miêu tả không được lớn hơn 305 kí tự',
        ];
    }
    public function attributes(){
            return[
            'name'=>'Tên sản phẩm',
            'accessories'=>'Phụ kiện',
            'price'=>'Giá sản phẩm',
            'promotion'=>'Giá Khuyến mãi',
            'condition'=>'Tình trạng',
            'status'=>'Mời bạn chọn trạng thái ',
            'description'=>"Miêu tả"
            ];
        }
}
