@extends('layouts.master')
@section('content')
<main class="mt-3 pt-4">
    <div class="container dark-gray-text mt-5">
        <div class="row wow fadeIn">
            <div class="col-md-6 mb-4 mt-2">
                <img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}"
                     class="img-fluid">

            </div>
            <div class="col-md-6 mb-4">
                <p class="lead">
                    <span class="mr-1">
                            {{$product->price}}$
                        </span>
                </p>
                <p class="font-weight-bold">Описание</p>
                <p>
                    {{$product->desc}}
                </p>
                <form action="{{route('basket-add',$product->id)}}" method="post">
                    <button class="btn btn-primary btn-md my-0 p" type="submit"><a  class="white-text"> Добавить в корзину</a> <i class="fa fa-shopping-cart ml-2"></i></button>
                    @csrf
                </form>
            </div>
        </div>
    </div>


</main>
@endsection
