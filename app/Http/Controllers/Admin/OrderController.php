<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('admin.orders.index',['orders' => $orders]);
    }

    public function orderDetails($id)
    {
        $orders = Order::where('id',$id)->first();
      return view('admin.orders.details',['orders' => $orders]);
    }

    public function updateOrder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('status');
        $orders->update();
        return redirect('orders')->with('status','Order updated successfully');
    }

}
