@extends('layouts.master')
@section('content')
    <div class="text-center mt-4" ><h1>Наш телефон +79392352934</h1></div>
   <div class="text-center mt-4" ><h1>Вы можете написать нам</h1></div>


    </header>
    <main>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="№" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><input type="text" class="form-control" name="name" placeholder="Имя"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><input type="text" class="form-control" name="email" placeholder="E-mail"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><textarea rows="5" class="form-control" name="text" placeholder="Сообщение"></textarea></p>
                        </div>
                    </div>


                </form>

            </div>



        </div>
    </div>
    <div class="row justify-content-center">
        <button class="btn btn-primary content ">Отправить </button>

    </div>
</main>
@endsection
