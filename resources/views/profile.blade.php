@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    <h1>Профиль</h1>
    <div class="profile-wrapper">
        <div class="card">
            @if($items->isEmpty())
                <p style="text-align: center;">У вас нет заявок</p>
            @endif
            <ul class="items-list">
                @foreach ($items as $item)
                    <li>
                        <div>
                            <h3 style="margin-bottom: 10px;">{{$item->course->name}}</h3>
                            <p>Способ оплаты: {{$item->pay_method->name}}</p>
                            <p>Дата начала обучения: {{$item->date}}</p>
                            <p><strong>{{$item->status->name}}</strong></p>
                        </div>
                        @if($item->review !== null)
                            <p><strong>Ваш отзыв:</strong> {{$item->review}}</p>
                        @else
                            <form action="{{route('review', $item->id)}}" name="review" class="form-group" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="review">
                                    @if($item->status_id === 3)
                                        Оцените курс
                                    @else
                                        Вы не можете оценить курс пока не пройдете его
                                    @endif
                                </label>
                                <textarea
                                    rows="3"
                                    name="review"
                                    minlength="1"
                                    maxlength="500"
                                    @if($item->status_id !== 3) disabled @endif
                                ></textarea>
                                <button class="btn" @if($item->status_id !== 3) disabled @endif>Отправить отзыв</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="profile">
            <p>Полное имя: {{$user->full_name}}</p>
            <p>Имя пользователя: {{$user->login}}</p>
            <p>Почта: {{$user->email}}</p>
            <p>Телефон: {{$user->phone}}</p>
        </div>
    </div>
@endsection
