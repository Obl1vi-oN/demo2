@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')
    <h1>Панель администратора</h1>

    <form method="GET" action="{{ route('admin') }}" style="margin-bottom: 20px;" class="form-group">
        <label for="status">Фильтр по статусу заявки:</label>
        <select name="status" id="status" onchange="this.form.submit()">
            <option value="">Все</option>
            @foreach($statuses as $status)
                <option value="{{ $status->name }}" @if(request('status') == $status->name) selected @endif>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="admin-wrapper">
        <div class="card">
            @if($items->isEmpty())
                <p style="text-align: center;">Заявок нет</p>
            @else
                <table class="item-table">
                    <thead>
                    <tr>
                        <th>Курс</th>
                        <th>Способ оплаты</th>
                        <th>Дата начала</th>
                        <th>Статус</th>
                        <th>Отзыв</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td data-label="Курс">{{ $item->course->name }}</td>
                            <td data-label="Способ оплаты">{{ $item->pay_method->name }}</td>
                            <td data-label="Дата начала">{{ $item->date }}</td>
                            <td data-label="Статус">
                                <form action="{{ route('adminStatusUpdate', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_id" onchange="this.form.submit()">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" @selected($item->status_id == $status->id)>
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td data-label="Отзыв">{{ $item->review }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
