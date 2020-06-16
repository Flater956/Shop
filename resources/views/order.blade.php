@extends('layouts.master')
@section('content')
<section>


    <div class="container">
        <div class="card mt-2 mb-2">




                <div class="row wow">
                    <div class="col-lg-2 col-md-6">
                        <img class="card-img-top mt-4 ml-2 mb-2 img-thumbnail" src="">

                    </div>


                    <div class="col-lg-2 col-md-4 mt-5 mb-5 text-center d-flex align-items-center" >
                        <h3>Цена: {{$order->getTotalPrice()}}$</h3>
                    </div>
                </div>
                <hr class="black">





            <div class="container d-flex justify-content-center form-control" style="height: 250px;width: 400px">
                <form action="{{route('basket-confirm')}}" method="post">
                    Укажите ваше имя и номер телефона
                    <label>
                        <input type="text" name="name" placeholder="Введите имя">
                    </label>
                    <label>
                        <input style="height: 50px;width:250px" type="text" name="phone" placeholder="Введите ваш номер телефона">
                    </label>
                    <button type="submit" class="btn btn-success">Оформить заказ</button>
                    @csrf
                </form>
            </div>

        </div>
    </div>

</section>
@endsection
