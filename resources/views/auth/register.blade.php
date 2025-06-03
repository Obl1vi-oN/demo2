<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Регистрация</title>
</head>
<body>
<div class="form-wrapper">
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="full_name">ФИО</label>
                <div class="input-group">
                    <input
                        id="full_name"
                        type="text"
                        name="full_name"
                        value="{{ old('full_name') }}"
                        required
                        autofocus
                        placeholder="Иванов Иван Иванович"
                        pattern="[А-Яа-яЁё ]+"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="login">Логин</label>
                <div class="input-group">
                    <input
                        id="login"
                        type="text"
                        name="login"
                        value="{{ old('login') }}"
                        required
                        placeholder="ivanov"
                        min="6"
                        pattern="[A-Za-z0-9_]+"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <div class="input-group">
                    <input
                        id="phone"
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        required
                        placeholder="+7(999)-999-99-99"
                        pattern="^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$"
                        min="10"
                        max="17"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <div class="input-group">
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder="ivanov@example.ru"
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
            <div class="form-group">
                <label for="password_confirmation">Подтвердите пароль</label>
                <div class="input-group">
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                    />
                </div>
            </div>
            <button type="submit" class="btn">Зарегистрироваться</button>
            <div>
                <a href="/login">Есть аккаунт? Войти</a>
            </div>
        </form>
    </div>
</div>
<x-toast-messages />
</body>
</html>
