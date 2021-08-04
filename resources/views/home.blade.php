@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('home') }}">
        <div class="row justify-content-start mb-3">
            <div class="col-2">
                <input type="text" name="lesson" class="form-control" value="{{ $params['lesson'] ?? '' }}" placeholder="Введите занятие">
            </div>
            <div class="col-2">
                <input type="text" name="group" class="form-control" value="{{ $params['group'] ?? '' }}" placeholder="Введите группу">
            </div>
            <div class="col-3">
                <input type="text" name="full_name_teacher" class="form-control" value="{{ $params['full_name_teacher'] ?? '' }}" placeholder="Введите ФИО преподователя">
            </div>
            <label for="date_start">От</label>
            <div class="col-2">
                <input type="datetime-local" name="date_start" value="{{ $params['date_start'] ?? '' }}" class="form-control">
            </div>
            <label for="date_start">До</label>
            <div class="col-2">
                <input type="datetime-local" name="date_end" value="{{ $params['date_end'] ?? '' }}" class="form-control">
            </div>
            <div class="col-2">
                <button class="w-100 btn btn-primary mt-2" type="submit">Поиск</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название предмета</th>
            <th>Группа</th>
            <th scope="col">ФИО преподавателя</th>
            <th scope="col">Начало занятия</th>
            <th scope="col">Конец занятия</th>
            <th scope="col">Ссылка</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lesson)
            <tr>
                <td>{{ $lesson->name }}</td>
                <td>{{ $lesson->groupp }}</td>
                <td>{{ $lesson->full_name }}</td>
                <td>{{ $lesson->start_time }}</td>
                <td>{{ $lesson->finish_time }}</td>
                <td><a href="{{ $lesson->link }}">Подключение к лекции</a></td>
                @if(Auth::check() && Auth::user()->isAdmin())
                    <td>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
