<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Mail;

class CartController extends Controller
{
    //
    public function getAddCart($id)
    {
        $product = Product::find($id);
        Cart::add(['id' => '$id', 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'weight' => 550, 'options' => ['img' => $product->prod_img]]);
        return redirect('cart/show');
    }
    public function getShowCart()
    {
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        return view('frontend.cart', $data);

    }
    public function getDeleteCart($id)
    {
        if ($id == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);

    }
    public function postComplete(Request $request)
    {
        $data['infor'] = $request->all();
        $email = $request->email;
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        // dd($data);
        Mail::send('frontend.email', $data, function ($message) use ($email) {
            $message->from('lehoanhtro@gmail.com', 'DucHoanh');
            $message->to($email, $email);
            $message->cc('hoanhldph08751@fpt.edu.vn', 'Lê Đức Hoành');
            $message->subject('Xác nhận hóa đơn mua hàng tại shop điện thoại');

        });
        return redirect('complete');

    }
    public function getComplete()
    {
        return view('frontend.complete');
    }
}