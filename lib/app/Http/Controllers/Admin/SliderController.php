<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSliderRequest;
use App\Models\Slider;
use DB;
class SliderController extends Controller
{
    //
    public function getSlider(){
        $data['sliderlist']=Slider::all();
      return view('backend.slider',$data);
    }
    public function getAddSlider(){
        return view('backend.addslider');
      
    }
    public function postAddSlider(AddSliderRequest $request){
        $fillname = $request->img->getClientOriginalName();
        $slider = new Slider;
        $slider->img = $fillname;
        $slider->status=$request->status;
        $slider->save();
        $request->img->storeAs('avatar',$fillname);
        return redirect('admin/slider');
    }
    public function getEditSlider($id){
        $data['slider'] = Slider::find($id);
        return view('backend.editslider',$data);
    }
    public function postEditSlider(Request $request,$id){
        $slider = new Slider;
        $arr['status'] =$request->status;
        if($request->hasFile('img')){
            $img =$request->img->getClientOriginalName();
            $arr['img']=$img;
            $request->img->storeAs('avatar',$img);
        }
        // $img = $request->img->getClientOriginalName();
        // $arr['prod_img'] = $img;
        // $request->img->storeAs('avatar',$img);
        $slider::where('id',$id)->update($arr);
        return redirect('admin/slider');
    
    }
    public function getDeleteSlider($id){
        Slider::destroy($id);
        return back();
          
    }
    // public function UnActive($id){
    //     DB::table('vp_sliders')->where('id',$id)->update(['status'=>1]);
    //     Session::put('message','không kích hoạt sản phẩm thành công');
    //     return  Redirect::to('admin/slider/');
    // }
    // public function Active($id){
    //     DB::table('vp_sliders')->where('id',$id)->update(['status'=>0]);
    //     Session::put('message','kích hoạt sản phẩm thành công');
    //     return  Redirect::to('admin/slider/');
    // }
}
