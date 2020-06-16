@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @isset($product)
                        <div class="card-header">{{ __('Редактировать продукт ') }}<b>{{$product->name}}</b></div>
                    @else
                        <div class="card-header">{{ __('Добавить продукт') }}</div>
                    @endisset

                    <div class="card-body">
                        <form method="POST"
                              @isset($product)
                              action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                            @else
                                action="{{ route('products.store') }}" enctype="multipart/form-data" >
                            @endisset
                            @isset($product)
                                @method('PUT')
                            @endisset

                            @csrf

                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right">{{ __('Имя продукта') }}</label>
                                    <div class="col-md-6">
                                        @error('name')
                                            <span class="invalid-feedback" style="display: block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input  type="text" class="form-control @error('name') is-invalid @enderror"  name="name"  value="{{old('name',isset($product)?$product->name:null)}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right">{{ __('Категория') }}</label>
                                    <div class="col-md-6">
                                       <select name="category_id" class="form-control">
                                           @foreach($categories as $category)
                                               <option value="{{$category->id}}"
                                               @isset($product)
                                                  @if($category->id==$product->category_id)
                                                      selected
                                                       @endif
                                                   @endisset
                                               >{{$category->name}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
                                     <div class="col-md-6">
                                         @error('desc')
                                         <span class="invalid-feedback" style="display: block" role="alert">
                                                <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                         <input  type="text" class="form-control @error('desc') is-invalid @enderror " name="desc"  value="{{old('desc',isset($product)?$product->desc:null)}}" >
                                     </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Цена') }}</label>
                                    <div class="col-md-6">
                                        @error('price')
                                        <span class="invalid-feedback" style="display: block" role="alert">
                                                <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                        <input  type="text" class="form-control @error('price') is-invalid @enderror" name="price"  value="{{old('price',isset($product)?$product->price:null)}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Картинка') }}</label>
                                    <div class="col-md-6">
                                        @error('img')
                                        <span class="invalid-feedback" style="display: block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input class="@error('img') is-invalid @enderror" type="file" name="img" >
                                    </div>
                                </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @isset($product)
                                            {{ __('Редактировать продукт') }}
                                        @else
                                            {{ __('Добавить продукт') }}
                                        @endisset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
