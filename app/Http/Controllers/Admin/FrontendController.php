<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use   App\Models\Product;
use   App\Models\Category;
use   App\Models\User;
use   App\Models\Order;


class FrontendController extends Controller
{
    public function index(){
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalAllUsers = User::count();
        $totalAdmin= User::where('role_as','1')->count();

        $todayDate = Carbon::now()->timezone('Africa/Casablanca');
        $thisMonth = Carbon::now()->format("m");
        $thisYear = Carbon::now()->format("Y");


        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at',$todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at',$thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at',$thisYear)->count();





        return view('admin.index',compact('totalProducts',
        'totalCategories',
        'totalAllUsers',
        'totalAdmin','totalOrder',
        'todayOrder','thisMonthOrder','thisYearOrder'));
    }
}
