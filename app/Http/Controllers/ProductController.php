<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    //view page sản phẩm, sản phẩm nào có trang thái là '1' thì hiện
    public function products(){

        // $products = Product::All()->where('status', 1);
        $products = Product::All();
        return view('admin.products')->with('products', $products);
    }
    public function addproduct(){
        // show toàn bộ danh mục
        // $categories = Category::All();
        $categories = Category::All()->pluck('category_name', 'category_name');
        return view('admin.addproduct')->with('categories', $categories);

    }
    public function saveproduct(Request $request){
        $this->validate($request , ['product_name' => 'required', 'product_price'=> 'required',
                                    'product_category' => 'required', 'product_image' => 'image|nullable|max:1999']);

        // print($request->input('product_category'));
        // điều kiện save với hình ảnh
        //lưu ảnh vào trong hệ thống, phải tạo strorage để lưu ảnh trước
        if($request->hasFile('product_image')){
            // Get fullname + đuôi mở rộng ???
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            // get name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get đuôi mở rộng (extension)
            $extension = $request->file('product_image')->getClientOriginalExtension();
            // lưu name
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload ảnh lên
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

        }else{
            $fileNameToStore= 'noimage.jpg';
        }
        $product = new Product();

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_image = $fileNameToStore;
        $product->status = 1;

        $product->save();

        return back()->with('status','Thêm sản phẩm thành công !');
    }
    public function edit_product($id){
        $product = Product::find($id);
        $categories = Category::All()->pluck('category_name', 'category_name');
        return view('admin.editproduct')->with('product', $product)->with('categories', $categories);
    }
    //cập nhật sản phẩm, copy từ saveproduct
    public function updateproduct(Request $request){
        $this->validate($request , ['product_name' => 'required', 'product_price'=> 'required',
                                    'product_category' => 'required', 'product_image' => 'image|nullable|max:1999']);
        $product = Product::find($request->input('id'));


        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        
        if($request->hasFile('product_image')){
            // Get fullname + đuôi mở rộng ???
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            // get name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get đuôi mở rộng (extension)
            $extension = $request->file('product_image')->getClientOriginalExtension();
            // lưu name
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload ảnh lên
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

            if($product->product_image != 'noimage.jpg'){
                Storage::delete('public/product_images/' .$product->product_image);
            }
            $product->product_image = $fileNameToStore;

        }

        $product->update();

        return redirect('/products')->with('status','Cập nhật sản phẩm thành công !');
    }
    //xoá sản phẩm 
    public function delete_product($id){
        $product = Product::find($id);
        if($product->product_image != 'noimage.jpg'){
            Storage::delete('public/product_images/' .$product->product_image);
        }
        $product->delete();
        return back()->with('status','Xoá sản phẩm thành công !');
    }

    //activate sản phẩm
    public function activate_product($id){
        $product = Product::find($id);

        $product->status = 1;
        $product->update();

        return back()->with('status','Activate sản phẩm thành công !');
    }
    //deactive sản phẩm, code 1->0
    public function unactivate_product($id){
        $product = Product::find($id);

        $product->status = 0;
        $product->update();

        return back()->with('status','Deactivate sản phẩm thành công !');
    }
    //show danh mục trong web
    public function view_product_by_category($category_name){
        $products = Product::All()->where('product_category', $category_name)->where('status', 1);
        $categories = Category::All();
        return view('client.shop')->with('products', $products)->with('categories', $categories);
        //cyka
    }
}
