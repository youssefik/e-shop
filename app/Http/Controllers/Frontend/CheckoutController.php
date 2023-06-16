<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
class CheckoutController extends Controller
{
    public function index(){
        $old_cartItems = Cart::where('user_id',Auth::id())->get();

        foreach ($old_cartItems as $item) {
            # code...
            if(!Product::where('id', $item->prod_id)->where('qty',">=",$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();

        $total= 0;
        foreach ($cartItems as $item) {

            $total += $item->products->selling_price * $item->prod_qty;
            # code...
        }

        return view('frontend.checkout',compact('cartItems','total'));
    }


    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->adress1 = $request->adress1;
        $order->adress2 = $request->adress2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pincode = $request->pincode;

        $order->payment_mode = $request->payment_mode;
            $order->payment_id = $request->payment_id;
         //calculate price totale
        $total = 0;
        $cartItems_total = Cart::where('user_id',Auth::id())->get();

                foreach ($cartItems_total as $prod) {
                    $total += $prod->products->selling_price;
                }

        $order->total_price = $total;



        $order->tracking_no = 'inrh100' .rand(1111,9999);

        $order->save();


        $cartItems = Cart::where('user_id',Auth::id())->get();


                foreach ($cartItems as $item)
                {
                    OrderItem::create([
                        'order_id'=> $order->id,
                        'prod_id'=> $item->prod_id,
                        'qty'=> $item->prod_qty,
                        'price'=>$item->products->selling_price
                    ]);

                    $prod =  Product::where('id',$item->prod_id)->first();
                    $prod->qty = $prod->qty - $item->prod_qty;
                    $prod->update();
                }

                if(Auth::user()->adress1 == null){
                    $user = User::find(Auth::id());
                    $user->name = $request->fname;
                    $user->lname = $request->lname;
                    $user->phone = $request->phone;
                    $user->adress1 = $request->adress1;
                    $user->adress2 = $request->adress2;
                    $user->city = $request->city;
                    $user->state = $request->state;
                    $user->country = $request->country;
                    $user->pincode = $request->pincode;





                    $user->update();
                }



        $cartItems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItems);

        // if($request->payment_mode == "Paid by Razorpay"){

        // }

                if($request->payment_mode == "paid with paypal")
                {
                    return response()->json(['status',"Ordered placed Successfully"]);
                }
                        return redirect('/')->with('status',"Ordered placed Successfull");

    }


    // public function razorpaycheck(Request $request){

    //     $cartItems = Cart::where('user_id',Auth::id())->get();
    //     $total_price = 0;
    //     foreach ($cartItems as $item) {

    //         $total_price += $item->products->selling_price * $item->prod_qty;
    //         # code...
    //     }

    //     $firstname = $request->input('firstname');
    //     $lastname = $request->input('lastname');
    //     $email = $request->input('email');
    //     $phone = $request->input('phone');
    //     $adress1 = $request->input('adress1');
    //     $adress2 = $request->input('adress2');
    //     $city = $request->input('city');
    //     $state = $request->input('state');
    //     $country = $request->input('country');
    //     $pincode = $request->input('pincode');

    //     return response()->json([
    //             'firstname' => $firstname,
    //             'lastname' => $lastname,
    //             'email' => $email,
    //             'phone' => $phone,
    //             'adress1' => $adress1,
    //             'adress2' => $adress2,
    //             'city' => $city,
    //             'state' => $state,
    //             'country' => $country,
    //             'pincode' => $pincode,
    //             'total_price' => $total_price
    //     ]);

    // }
}
