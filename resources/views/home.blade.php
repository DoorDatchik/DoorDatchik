@extends('layouts.app')

@section('content')
<div class="container">
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
                <td><a href="{{ $lesson->link }}">тут ссылка</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
