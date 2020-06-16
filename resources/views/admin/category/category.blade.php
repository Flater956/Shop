@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категория {{$category->name}}</div>

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
                                    <td>{{$category->id}}</td>
                                </tr>
                                <tr>
                                    <td>code</td>
                                    <td>{{$category->code}}</td>
                                </tr>
                                <tr>
                                    <td>name</td>
                                    <td>{{$category->name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                Кол-во товаров: {{$category->products->count()}}
            </div>
        </div>
    </div>
@endsection
