@extends('layouts.master')
@section('content')
<div class="container">

    <table class="table">
        <thead>
        <h1 class="text-center">Корзина</h1>
        </thead>
        <tbody>
        @foreach($order->products as $product)
            <tr>
                <th scope="row">{{$product->name}}</th>
                <td>{{$product->price}}</td>
                <td><img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}"
                         class="img-fluid" style="max-height: 100px">
                </td>
                <td>

                        <div style="display:inline-block;width: 30px;height: 30px;background-color: #00c851">
                            <a href="{{route('basket-add',$product)}}"
                               onclick="event.preventDefault();
                                                     document.getElementById('add{{$product->id}}').submit();"><h4 class="text-center" >+</h4></a>
                        </div>
                        <div style="display:inline-block;width: 30px;height: 30px;background-color:crimson">
                            <a href="{{route('basket-remove',$product)}}"
                               onclick="event.preventDefault();
                                                     document.getElementById('delete{{$product->id}}').submit();"><h4 class="text-center" style="margin-bottom: 10px">-</h4></a>
                        </div>
                        <form id="delete{{$product->id}}" action="{{route('basket-remove',$product)}}" method="post" style="display: none">
                            @csrf
                        </form>
                        <form id="add{{$product->id}}"action="{{route('basket-add',$product)}}" method="post" style="display: none">
                            @csrf
                        </form>
                </td>
                <td>
                    <p class="text-center">
                    Количество:{{$product->pivot->count}}
                    </p>
                </td>
                <td>
                  Цена:  {{$product->getPrice()}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <hr>
        <p>Цена Всего:{{$order->getTotalPrice()}} </p>
        <p>Оформить заказ : <a href="{{route('basket-order')}}"> оформить </a></p>

</div>
@endsection
