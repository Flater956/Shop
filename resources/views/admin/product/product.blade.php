@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Продукт {{$product->name}}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Поле</th>
                                <th scope="col">Значение</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <td>Категория</td>
                                <td>{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <td>ID Категории</td>
                                <td>{{$product->category_id}}</td>
                            </tr>
                            <tr>
                                <td>Описание</td>
                                <td>{{$product->desc}}</td>
                            </tr>
                            <tr>
                                <td>Картинка</td>
                                <td><img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" style="max-width: 200px;max-height: 200px"></td>
                            </tr>
                            <tr>
                                <td>Цена</td>
                                <td>{{$product->price}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
