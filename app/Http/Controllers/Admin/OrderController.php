<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = new Order();
        if($request->start_date){
            $orders = $orders->where('created_at','>=',$request->start_date);
        }
        if($request->end_date){
            $orders = $orders->where('created_at','<=',$request->end_date);
        }
        $orders = $orders->when($request->status != null , function($query) use ($request){
            $query->where('status',$request->status);
        })->orderBy('id','desc')->paginate(15);
        return view('admin.orders.index',['orders' => $orders]);
    }


public function allOrder(Request $request){

    $total_orders = Order::when($request->status != null, function($query) use ($request){
        $query->where('status',$request->status);
    })->orderBy('id','desc')->paginate(15);
    return view('admin.orders.total-order',['total_orders' => $total_orders]);

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
        $order = Order::findOrFail($order_id);
        $pdf = Pdf::loadView('admin.orders.invoice',['order' => $order]);
        // return $pdf->download('eoPays '.$order->id.'.pdf');
        $todaydate = Carbon::now()->format('d-m-Y');
        return $pdf->download('eoPays '.$order->id.'-'.$todaydate.'.pdf');
    }

    public function deleteOrder($id){
        $order = Order::find($id);
        $order->delete();
        return redirect('orders')->with('status','Order deleted successfully');
    }
}
