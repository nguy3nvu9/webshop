<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function addslider(){
        return view('admin.addslider');
    }
    public function sliders(){
        $sliders = Slider::All();
        return view('admin.sliders')->with('sliders', $sliders);
    }
    public function saveslider(Request $request){
        $this->validate($request ,['description1' => 'required', 'description2'=> 'required', 'slider_image' => 'image|nullable|max:1999|required']);

        // print($request->input('product_category'));
        // điều kiện save với hình ảnh
        //lưu ảnh vào trong hệ thống, phải tạo strorage để lưu ảnh trước
        
            // Get fullname + đuôi mở rộng ???
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            // get name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get đuôi mở rộng (extension)
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            // lưu name
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload ảnh lên
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

        $slider = new Slider();

        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->slider_image = $fileNameToStore;
        $slider->status = 1;
        $slider->save();

        return back()->with('status','Lưu thành công !');
    }
    public function edit_slider($id){
        $slider = Slider::find($id);
        return view('admin.edit_slider')->with('slider', $slider);
    }

    public function updateslider(Request $request){
        $this->validate($request ,['description1' => 'required', 'description2'=> 'required', 'slider_image' => 'image|nullable|max:1999']);
        $slider = Slider::find($request->input('id'));


        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        
        if($request->hasFile('slider_image')){
            // Get fullname + đuôi mở rộng ???
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            // get name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get đuôi mở rộng (extension)
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            // lưu name
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload ảnh lên
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);

            Storage::delete('public/slider_images/' .$slider->slider_image);
            $slider->slider_image = $fileNameToStore;

        }

        $slider->update();

        return redirect('/sliders')->with('status','Cập nhật banner thành công !');
    }
    //xoá slider
    public function delete_slider($id){
        $slider = Slider::find($id);
        
        Storage::delete('public/slider_images/' .$slider->slider_image);
        $slider->delete();
        return back()->with('status','Xoá banner thành công !');
    }
    public function activate_slider($id){
        $slider = Slider::find($id);

        $slider->status = 1;
        $slider->update();

        return back()->with('status','Đã kích hoạt slider !');
    }
    public function unactivate_slider($id){
        $slider = Slider::find($id);

        $slider->status = 0;
        $slider->update();

        return back()->with('status','Đã ngừng kích hoạt slider !');
    }
}
