@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('create-teacher') }}">Добавить преподавателя</a>
        </div>

        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">ФИО преподавателя</th>
                <th scope="col">Закрепленные за ним группы</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->full_name }}</td>
                    <td>
                        @foreach($teacher->groups as $group)
                            <div>{{ $group->name }}</div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('update-teacher', ['id' => $teacher->id]) }}">Редактировать</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
