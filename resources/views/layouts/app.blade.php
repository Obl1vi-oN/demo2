<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Корочки.есть - @yield('title')</title>
</head>
<body>
<header>
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="/">
                        <img src="{{ asset('images/КОРОЧКИесть.svg') }}" alt="Logo" class="logo">
                    </a>
                </li>
            </ul>
            <ul class="header-menu">

                @auth
                    <li>
                        <a href="/create" class="btn create-btn">Создать заявку</a>
                    </li>
                    @if(auth()->user()->role_id == 2)
                    <li>
                        <a href="/admin">
                            <img src="{{asset('images/profile.svg')}}" alt="Profile" class="icon">
                        </a>
                    </li>
                    @else
                        <li>
                            <a href="/profile">
                                <img src="{{asset('images/profile.svg')}}" alt="Profile" class="icon">
                            </a>
                        </li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="logout">
                            @csrf
                            <button type="submit">
                                <img src="{{asset('images/logout.svg') }}" alt="Logout" class="icon">
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="btn">Войти</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="btn">Регистрация</a>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
<div class="container fade-in">
    @yield('content')
</div>
<x-toast-messages />
</body>
</html>
