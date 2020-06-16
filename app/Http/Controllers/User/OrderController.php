<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($userId){
        $orders=Order::where('user_id',$userId)->get();

       return view('user.orders',compact('orders'));
    }
}
