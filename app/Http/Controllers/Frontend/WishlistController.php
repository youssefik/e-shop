<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
    }

    public function add(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => 'Product Added To Wishlist.']);
            }
            else
            {
            return response()->json(['status' => 'Product does not exist.']);
            }
        }
        else{
            return response()->json(['status' => 'Please login to continue.']);

        }
    }


    public function addToCart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()){

                $prod_check = Product::where('id',$product_id)->first();

                if($prod_check){
                    if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->count() > 0)
                        {
                            return response()->json(['status' => $prod_check->name.'already added to cart']);
                        }

                    else
                    {
                        $carItem = new Cart();
                        $carItem->user_id = Auth::id();
                        $carItem->prod_id = $product_id;
                        $carItem->prod_qty = $product_qty;
                        $carItem->save();
                        return response()->json(['status' => $prod_check->name.'added to cart']);

                    }
                }


        }
        else
        {
            return response()->json(['status' =>'login to continue']);
        }
    }
        public function deleteProducItem(Request $request)
        {
            if(Auth::check()){
                $prod_id = $request->input('prod_id');

                if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                    Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->delete();
                    return response()->json(['status' => 'deleted from cart']);
                }
                else{
                    return response()->json(['status' =>'product not found in cart']);
                }
            }
            else{
                return response()->json(['status' =>'login to continue']);
            }
        }

        public function wishlistcount(){

            $wishlistcount = Wishlist::where('user_id',Auth::id())->count();
            return response()->json(['count' => $wishlistcount]);
        }


}
