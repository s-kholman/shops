@extends('layouts.base')
@section('title', 'Главная')

@section('info')
    @guest
        <div class="container">
            <div class="bg-light border rounded-3 p-3">
                <h4>Добро пожаловать гость</h4>
                <p>Для продолжения работы на сайте вам необходимо зарегестрироваться или выполнить вход</p>
            </div>
        </div>

    @endguest
    @auth
            <div class="container">
                <div class=" bg-light border rounded-3 p-3">
                    <h4>Добро пожаловать</h4>
                    <p>Вы зарегистрировались на e-mail: {{\Illuminate\Support\Facades\Auth::user()->email}}. </p>
                </div>
            </div>

    @endauth
@endsection('info')
