@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-8">

                    <div class="card-header">Продукты</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Картинка</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->desc}}</td>
                                    <td><img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" style="max-height: 100px; max-width: 100px"></td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <form id="delete{{$product->id}}" action="{{route('products.destroy',$product->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{route('products.destroy',$product->id)}}"
                                               onclick="event.preventDefault();
                                                         document.getElementById('delete{{$product->id}}').submit();"
                                               style="width: 200px"  class="btn btn-danger">{{ __('Удалить') }}</a>
                                            <a href="{{route('products.show',$product->id)}}" style="width: 200px"  class="btn btn-success">Открыть</a>
                                            <a href="{{route('products.edit',$product->id)}}" style="width: 200px"  class="btn btn-warning">Редактировать</a>
                                            <button type="submit"  style="display: none"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{$products->links()}}
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
        <div class="justify-content-center"><a class="btn btn-success" style="display: block" href="{{route('products.create')}}">Добавить товар</a></div>
    </div>
@endsection
