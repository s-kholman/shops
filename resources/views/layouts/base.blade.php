<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') </title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">

</head>
<body>

<div class="container-fluid">
    <header class="blog-header py-3 ">
        <div class="row flex-nowrap justify-content-between align-items-center ">
            <div class="col-4 pt-1"></div>

            <div class="col-4 text-center">
                <label class="blog-header-logo text-dark">Тестовое задание</label>
                <a hidden class="blog-header-logo text-dark" href="#">Large</a>
            </div>
            @guest
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Вход/Регистрация</a>
            </div>
            @endguest
            @auth
                <div class="col-1 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                        {{ __('Выйти') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endauth

        </div>
    </header>
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                @yield('menu')

            </div>
        </div>
        <div class="col-7 py-3">
            @yield('info')
            @yield('content')
        </div>
        <div class="col-2 py-3">
            @yield('feature')
        </div>
    </div>
</div>

@yield('script')
<script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>
