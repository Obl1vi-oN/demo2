<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Вход</title>
</head>
<body>
<div class="form-wrapper">
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="login">Логин</label>
                <div class="input-group">
                    <input
                        id="login"
                        type="text"
                        name="login"
                        value="{{ old('login') }}"
                        required
                        autofocus
                        placeholder="ivanov"
                        min="6"
                        pattern="[A-Za-z0-9_]+"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="input-group">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                    >
                </div>
            </div>
            <button type="submit" class="btn">Войти</button>
            <div>
                <a href="/register">Нет аккаунта? Зарегистрироваться</a>
            </div>
        </form>
    </div>
</div>
<x-toast-messages />
</body>
</html>
