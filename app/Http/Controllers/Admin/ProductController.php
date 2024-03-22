<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $data['productlist'] = DB::table('vp_products')
            ->join('vp_categories', 'vp_products.cate', '=', 'vp_categories.id')
            ->orderBy('prod_id', 'asc')
            ->paginate(4);

        return view('backend.product', $data);
    }


    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = Str::slug($request->name);
        $product->prod_img = $filename;
        $product->prod_phukien = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_baohanh = $request->warranty;
        $product->prod_khuyenmai = $request->promotion;
        $product->prod_tinhtrang = $request->condition;
        $product->prod_trangthai = $request->status;
        $product->prod_mieuta = $request->description;
        $product->cate = $request->cate;
        $product->prod_dacbiet = $request->featured;
        $product->save();

        // Move the uploaded file to public/assets
        $path = public_path('assets');
        $request->img->move($path, $filename);
        return redirect('admin/product');
    }

    public function getEditProduct($id)
    {
        $data['catelist'] = Category::all();
        $data['product'] = Product::find($id);
        return view('backend.editproduct', $data);
    }

    public function postEditProduct(Request $request, $id)
    {
        $product = new Product;
        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] = Str::slug($request->name);
        $arr['prod_phukien'] = $request->accessories;
        $arr['prod_price'] = $request->price;
        $arr['prod_baohanh'] = $request->warranty;
        $arr['prod_khuyenmai'] = $request->promotion;
        $arr['prod_tinhtrang'] = $request->condition;
        $arr['prod_trangthai'] = $request->status;
        $arr['prod_mieuta'] = $request->description;
        $arr['cate'] = $request->cate;
        $arr['prod_dacbiet'] = $request->featured;
        if ($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $arr['prod_img'] = $img;
            $path = public_path('assets');
            $request->img->move($path, $img);
        }
        $product::where('prod_id', $id)->update($arr);
        return redirect('admin/product');
    }

    public function getDeleteProduct($id)
    {
        Product::destroy($id);
        return back();
    }
}
