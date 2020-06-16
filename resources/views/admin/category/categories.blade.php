@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Код</th>
                                <th scope="col">Название</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->code}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                            <a href="{{route('categories.show',$category->id)}}" class="btn btn-success">Открыть</a>
                                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">Редактировать</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-content-center"><a class="btn btn-success" style="display: block" href="{{route('categories.create')}}">Добавить категорию </a></div>
    </div>
@endsection
