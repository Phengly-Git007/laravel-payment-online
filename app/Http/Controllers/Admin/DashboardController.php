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
        $all_orders = Order::all()->count();
        $total_quantity = Product::sum('quantity');
        $product_item = Product::all()->count();
        $total_price = Product::sum('selling_price');
        $data = [
            'users' => $users,
            'order_today' => $order_today,
            'week_orders' => $week_orders,
            'month_orders' => $month_orders,
            'year_orders' => $year_orders,
            'total_quantity' => $total_quantity,
            'all_orders' => $all_orders,
            'total_price' =>$total_price,
            'product_item' =>$product_item
        ];
        return view('admin.dashboard',$data);
    }

    public function users()
    {

    }

}
