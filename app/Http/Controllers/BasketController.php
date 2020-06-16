<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order_id = session('order_id');

        if (!is_null($order_id)) {
            $order = Order::findOrFail($order_id);
            $this->productInBasket($order);
            return view('basket', compact('order'));
        }
        return view('emptbasket');
    }

    public function order()
    {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('index');
        }
        if (!Auth::check()) {
            return view('notauth');
        }
        $order = Order::find($order_id);
        return view('order', compact('order'));
    }

    public function confirm(Request $request)
    {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('index');
        }
        $order = Order::find($order_id);

        $success = $order->saveOrder($request->name, $request->phone, Auth::user()->id);
        if ($success) {
            session()->flash('success', 'Ваш заказ принят');
        }
        return redirect()->route('index');
    }

    public function basketAdd($product_id)
    {
        $order_id = session('order_id');

        if (is_null($order_id)) {
            $order = Order::create();
            session(['order_id' => $order->id]);
        } else {
            $order = Order::find($order_id);
        }

        if ($order->products->contains($product_id)) {
            $pivotCount = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivotCount->count++;
            $pivotCount->update();
        } else {
            $order->products()->attach($product_id);
        }
        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }
        $product = Product::find($product_id);
        session()->flash('success', 'Вы добавили ' . $product->name . ' в корзину');
        return redirect()->route('basket');
    }

    public function basketRemove($productId)
    {
        $order_id = session('order_id');
        $order = Order::find($order_id);
        if ($order->products->contains($productId)) {
            $pivotCount = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotCount->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotCount->count--;
                $pivotCount->update();
            }
        }
        session()->flash('warning', 'Товар удален из корзины');
        return redirect()->route('basket');;
    }

    public function productInBasket($order)
    {
        $count = $order->products->count();
        $productInBasket = session('PIB');
        session(['PIB' => $count]);
    }
}
