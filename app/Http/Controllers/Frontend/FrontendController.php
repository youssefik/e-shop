<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Slider;


use Auth;


class FrontendController extends Controller
{
    public function index(){
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular','1')->take(15)->get();

        $sliders = Slider::where('status','0')->get();
        return view('frontend.index',compact('featured_products','trending_category','sliders'));
    }
    public function category(){
        $categories = Category::where('status','0')->get();
        return view('frontend.category',compact('categories'));
    }
    public function viewcategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $products = Product::where(['cate_id' => $category->id,'status'=>'0'])->get();
            return view('frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('status','slug does not exist');
        }

    }

    public function detailsproduct($cate_slug,$prod_slug){
        if(Category::where('slug',$cate_slug)->exists()){
            if(Product::where('slug',$prod_slug)->exists()){
                $product = Product::where('slug' ,$prod_slug)->first();
                $rating = Rating::where('prod_id',$product->id)->get();
                $rating_sum = Rating::where('prod_id',$product->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
                $reviews = Review::where('prod_id',$product->id)->get();

                if($rating->count() > 0){
                    $rating_value = $rating_sum/$rating->count();
                }else
                {
                    $rating_value = 0;
                }

                return view('frontend.products.view',compact('product','rating','rating_value','user_rating','reviews'));
            }else{
                return redirect('/')->with('status','the link was broken');
            }
        }
        else{
            return redirect('/')->with('status','the link was broken');
        }

    }


    public function productlistAjax()
    {
        $products = Product::select('name')->where('status','0')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }


    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;
        if($searched_product != "")
        {
            $product = Product::where('name','LIKE',"%$searched_product%")->first();
            if ($product)
            {
                    return redirect('category/'.$product->category->slug.'/'.$product->slug)->withInput();
            } else {
                return redirect()->back()->with("status","no product matched your search");
            }

        }
        else
        {
            return redirect()->back();
        }
    }





}
// $category = Category::where('slug',$slug)->first();
//             $products = Product::where(['cate_id' => $category->id,'status'=>'0'])->get
