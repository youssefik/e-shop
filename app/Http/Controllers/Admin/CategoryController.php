<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }


    public function add(){
        return view('category.add');
    }

    public function insert(Request $request){
        $category = new Category();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();

            $filename = time().'.' .$ext;

            $file->move('assets/uploads/category',$filename);

            $category->image = $filename;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;

        $category->status = $request->status == TRUE? '1' : '0';
        $category->popular = $request->popular == TRUE? '1' : '0';


        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();

        return redirect('dashboard')->with('status','category added successfuly');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $category = Category::findOrFail($id);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();

            $filename = time().'.' .$ext;

            $file->move('assets/uploads/category',$filename);

            $category->image = $filename;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;

        $category->status = $request->status == TRUE? '1' : '0';
        $category->popular = $request->popular == TRUE? '1' : '0';


        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();

        return redirect('categories')->with('status','category updated successfuly');
    }

    public function destroy($id){
        $category = Category::find($id);

        if($category->image){

            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status','category Deleted successfuly');
    }
}
