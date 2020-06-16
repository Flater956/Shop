<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders=Order::where('status',1)->paginate(8);
        return view('admin.home',compact('orders'));
    }
    public function order($orderId)
    {
        $order=Order::find($orderId);
        return view('admin.order.order',compact('order'));
    }
}
