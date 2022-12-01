<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function addcategory(){

        return view('admin.addcategory');
    }
    // chức năng lưu danh mục
    public function savecategory(Request $request){

        $this->validate($request,['category_name'=> 'required|unique:categories']);

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->save();

        return back()->with('status','Lưu Category thành công !');
    }
    public function categories(){

        $categories = Category::All();

        return view('admin.categories')->with('categories', $categories);
    }
    public function edit_category($id){

        $category = Category::find($id);
        return view('admin.edit_category')->with('category', $category);
    }
    // chức năng sửa danh mục, validate để lấy dữ liệu form
    public function updatecategory(Request $request){
        // print('mã danh mục : ' .$request->id. ' tên sản phẩm là : '.$request->category_name);  test có post được form không
        $this->validate($request,['category_name'=> 'required']);
        $category = Category::find($request->input('id'));
        $category->category_name = $request->input('category_name');
        $category->update();

        //thông báo khi success
        return redirect('/categories')->with('status','Tên danh mục đã cập nhật thành công !');
    }
    // chức năng xoá danh mục
    public function delete_category($id){
        // print($id); test xem có show được không (Form::...)
        $category = Category::find($id);
        $category->delete();

        return back()->with('status','Xoá danh mục thành công !');
    }

}
