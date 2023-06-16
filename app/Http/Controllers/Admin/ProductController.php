<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Category;
use Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('admin.product.index',compact('products'));
    }


    public function add(){
        $categories = Category::all();

        return view('admin.product.add',compact('categories'));
    }

    public function insert(Request $request){
            $product = new Product();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();

            $filename = time().'.' .$ext;

            $file->move('assets/uploads/products',$filename);

            $product->image = $filename;
        }

        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->qty= $request->qty;
        $product->tax = $request->tax;
        $product->status = $request->status == TRUE? '1' : '0';;
        $product->trending= $request->trending == TRUE? '1' : '0';;
        $product->meta_title= $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        $product->save();

        return redirect('products');
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit',compact('product','categories'));
    }
    public function update(Request $request,$id){
        $product = product::findOrFail($id);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();

            $filename = time().'.' .$ext;

            $file->move('assets/uploads/products',$filename);

            $product->image = $filename;
        }


        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->qty= $request->qty;
        $product->tax = $request->tax;
        $product->status = $request->status == TRUE? '1' : '0';;
        $product->trending= $request->trending == TRUE? '1' : '0';;
        $product->meta_title= $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        $product->save();

        return redirect('products')->with('status','category updated successfuly');
    }

    public function destroy($id){
        $product = Product::find($id);

        if($product->image){

            $path = 'assets/uploads/products/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('products')->with('status','product Deleted successfuly');
    }
}
