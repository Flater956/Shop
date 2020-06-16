
@extends('layouts.master')
@section('title','Главная страница')
@section('content')
    @include('layouts.indexlayout')
<section id="product" class="text-center mb-4" >
    <h2 class="display-4 font-weight-bold black-text pt-5 mb-2">Продукты</h2>
    <div class="row wow fadeIn m-4 bt-3">
        @foreach($products as $product)
        @include('layouts.card')
        @endforeach
        <div style="margin: auto">
            {{$products->links()}}
        </div>
    </div>


</section>
@endsection


<!-- End your project here-->

<!-- jQuery -->
