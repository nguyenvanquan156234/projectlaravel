<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use Illuminate\Support\Str;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller

{
    public function getCate(){
        $data['catelist'] = Category::all();
        return view('backend.category',$data);
    }
    public function postCate(AddCateRequest $request){
        $category = new Category();
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return back();
    }
    public function getEditCate($id){
        $data['cate'] = Category::find($id);


        if (!$data['cate']) {
            // Xử lý trường hợp không tìm thấy danh mục
            return redirect()->route('admin.category')->with('error', 'Danh mục không tồn tại.');
        }

        return view('backend.editcategory',  $data);
    }
    public function postEditCate(EditCateRequest $request ,$id){
        $category =  Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return redirect()->intended('admin/category');



 }
 public function getDeleteCate($id){
    Category::destroy($id);
    return back();
 }
}
