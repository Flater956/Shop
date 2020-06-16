@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <p>Имя заказчика: {{$order->name}} </p>
            <p>Телефон заказчика: {{$order->phone}} </p>
            @if(!is_null($order->user_id))
                <p>User Id заказчика: {{$order->user_id}} </p>
            @endif
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
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route('products.show',$product->id)}}">
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
