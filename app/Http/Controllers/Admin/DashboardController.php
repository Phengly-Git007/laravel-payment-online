<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = User::where('role','0')->count();
        $todayDate = Carbon::now()->format('Y-m-d');
        $last_order     = date('Y-m-d', strtotime("-7 days"));
        $order_today = Order::whereDate('created_at',$todayDate)->count();
        $week_orders    = Order::where('created_at', '>=' ,$last_order )->count();
        $month_orders = Order::whereMonth('created_at', date('m'))->count();
        $year_orders = Order::whereYear('created_at', date('Y'))->count();
        $all_categories = Category::all()->count();
        $all_products = Product::all()->count();
        $all_orders = Order::all()->count();
        $data = [
            'users' => $users,
            'order_today' => $order_today,
            'week_orders' => $week_orders,
            'month_orders' => $month_orders,
            'year_orders' => $year_orders,
            'all_categories' => $all_categories,
            'all_products' => $all_products,
            'all_orders' => $all_orders
        ];
        return view('admin.dashboard',$data);
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index',['users' => $users]);
    }

}
