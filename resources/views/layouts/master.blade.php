<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.11.2/css/all.css')}}">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

<!-- Start your project here-->
<!-- Menu -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: rgb(15, 170, 110);">


        <a class="navbar-brand waves-effect"  href="/"> <strong> Shop</strong></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @activepage('index')">
                    <a class="nav-link"  href="{{route('index')}}">Главная </a>
                </li>
                <li class="nav-item dropdown @activepage('categor*')">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Категории
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        @foreach(\App\Category::get() as $categor)
                            <a class="dropdown-item" href="{{ route('category',$categor->code) }}">{{$categor->name}}</a>
                        @endforeach
                    </div>

                </li>
                <li class="nav-item @activepage('about')">
                    <a class="nav-link" href="{{route('about')}}">О нас</a>
                </li>
                <li class="nav-item @activepage('contact')">
                    <a class="nav-link"  href="{{route('contact')}}">Контакты</a>
                </li>
                <li class="nav-item @activepage('basket')">
                    <a class="nav-link"  href="{{route('basket')}}">Корзина</a>
                </li>
            </ul>
                @guest
            <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
            </ul>
                    @endif
                @else
                    <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Ваш профиль <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('user.orders',\Illuminate\Support\Facades\Auth::user()->id)}}">Заказы</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <a class="dropdown-item" href="{{route('home')}}">
                                    Админ панель
                                </a>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    </ul>
                @endguest
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="{{route('basket')}}">
                        <span class="badge red  mt-2 " >@if(session('PIB')){{session('PIB')}}@else 0 @endif</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="{{route('basket')}}">

                        <i class="fa fa-shopping-cart mt-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://github.com/Flater956">

                        <i class="fab fa-github mt-2" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#">
                        <i class="fab fa-facebook mt-2" aria-hidden="true"></i>
                    </a>
                </li>

            </ul>
        </ul>
    </nav>

    <!-- End Menu -->
    @if(session()->has('success'))
<div style="background-color: #00e25b;height: 50px;width: 100%;text-align: center">
    <p>{{session()->get('success')}}</p>
</div>
    @endif
    @if(session()->has('warning'))
        <div style="background-color:coral ;height: 50px;width: 100%;text-align: center">
            <p>{{session()->get('warning')}}</p>
        </div>
    @endif
</header>
<div class="container" style="max-width: 1280px">
    <div class="card">
@yield('content')
</div>
</div>
<blockquote class="blockquote text-center" style="background-color: rgb(20, 87, 87);"  >
    <p class="white-text" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
</blockquote>
<!-- End your project here-->
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>
</html>
