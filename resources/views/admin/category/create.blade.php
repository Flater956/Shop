@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @isset($category)
                        <div class="card-header">{{ __('Редактировать категорию ') }}<b>{{$category->name}}</b></div>
                    @else
                        <div class="card-header">{{ __('Добавить категорию') }}</div>
                    @endisset

                    <div class="card-body">
                        <form method="POST"
                              @isset($category)
                              action="{{ route('categories.update',$category->id) }}">
                                  @else
                              action="{{ route('categories.store') }}">
                                  @endisset
                            @isset($category)
                                @method('PUT')
                                      @endisset

                            @csrf

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Код категории') }}</label>
                                <div class="col-md-6">
                                    @error('code')
                                    <span class="invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror"  name="code"  value="{{old('code',isset($category)?$category->code:null)}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название категории') }}</label>
                                <div class="col-md-6">
                                  @error('name')
                                      <span class="invalid-feedback" style="display: block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{old('name',isset($category)?$category->name:null)}}" >
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @isset($category)
                                            {{ __('Редактировать категорию') }}
                                        @else
                                            {{ __('Добавить категорию') }}
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
