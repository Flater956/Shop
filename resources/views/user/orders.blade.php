@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card">
            <table class="table">
                <thead>
                <tr>
                    <th>Название </th>
                    <th>Количество </th>
                    <th>Цена </th>
                    <th>Стоимость </th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route('product',[$product->category->code,$product->id])}}">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" style="max-height: 100px">
                                {{$product->name}}
                            </a>
                        </td>
                        <td><span class="badge" style="background-color: crimson">{{$product->pivot->count}}</span> </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->getPrice()}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость</td>
                    <td>{{$order->getTotalPrice()}}</td>
                </tr>
                    <tr>
                        <td colspan="4"><div style="width: 100%;height: 10px; background-color: #00c851"></div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
