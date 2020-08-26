<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
        return view('backend/page/order/index',compact('orders'));
    }

    public function view($id)
    {
        $order=Order::find($id);
        $order->is_seen_by_admin=1;
        $order->save();
        return view('backend/page/order/show',compact('order'));
    }

    public function completed($id)
    {
        $order=Order::find($id);
        if ($order->is_completed){
            $order->is_completed=0;

        }else{
            $order->is_completed=1;
        }
        $order->save();
        return back()->with('success','Order Update');
    }
    public function paid($id)
    {
        $order=Order::find($id);
        if ($order->is_paid){
            $order->is_paid=0;

        }else{
            $order->is_paid=1;
        }
        $order->save();
        return back()->with('success','Order Update');
    }

    public function delete($id)
    {
        $order=Order::find($id);
        if (!is_null($order)){
            $order->delete();
        }else{
            return back();
        }

        return back()->with('success','This Order Successfully Deleted');
    }
}
