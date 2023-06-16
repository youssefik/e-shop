<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
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

    public function viewCart(){


        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartItems'));
    }

    // public function deleteProductFromCart(Request $request)
    // {
    //     if (Auth::check()) {
    //         $prod_id = $request->prod_id;

    //         if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
    //             $cartItems = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
    //             $cartItems->delete();

    //             return response()->json(['status' => 'Product removed from cart.']);
    //         }
    //         else {
    //             return response()->json(['status' => 'Product not found in cart.']);
    //         }
    //     }
    //     else {
    //         return response()->json(['status' => 'Please login to continue.']);
    //     }
    // }

        public function deleteProductFromCart(Request $request)
        {
            if(Auth::check()){
                $prod_id = $request->input('prod_id');

                if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                    Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->delete();
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




        public function updateCart(Request $request)
        {
            $prod_id = $request->input('prod_id');
            $product_qty = $request->input('prod_qty');

            if(Auth::check()) {
                if(Cart::where(['prod_id'=> $prod_id,'user_id'=> Auth::id()])->exists())
                {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();

                    $cart->prod_qty = $product_qty;
                    $cart->save();
                    return response()->json(['status' => 'Product updated']);
                }
            }
            else {
                return response()->json(['status' =>'login to continue']);
            }
        }

        public function cartcount(){

            $cartcount = Cart::where('user_id',Auth::id())->count();
            return response()->json(['count' => $cartcount]);
        }





}
