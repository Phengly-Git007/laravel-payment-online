<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function($query) use ($request){
            $query->whereDate('created_at',$request->date);
        },function($query) use ($todayDate){
            $query->whereDate('created_at',$todayDate);
        })
        ->when($request->status != null, function($query) use ($request){
            $query->where('status',$request->status);
        })
        ->orderBy('id','desc')
        ->paginate(3);
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

    public function viewInvoice($order_id){

       $order = Order::findOrFail($order_id);
       return view('admin.orders.invoice',['order' => $order]);

    }

    public function generateInvoice($order_id){

    }

}
