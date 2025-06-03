@extends('layouts.app')

@section('title', 'Создание заявки')

@section('content')
    <form action="{{route('store')}}" method="POST" class="create-form">
        @csrf
        <div class="form-group">
            <label for="course">Курс</label>
            <select name="course_id" id="course">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" name="date" id="date" required>
            <script>
                document.getElementById('date').valueAsDate = new Date();
                document.getElementById('date').min = new Date().toISOString().split("T")[0];
            </script>
        </div>
        <div class="form-group">
            <label for="pay_method">Способ оплаты</label>
            <select name="pay_method_id" id="pay_method">" id="course">
                @foreach($pay_methods as $pay_method)
                    <option value="{{ $pay_method->id }}">{{ $pay_method->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn">Создать</button>
    </form>
@endsection
