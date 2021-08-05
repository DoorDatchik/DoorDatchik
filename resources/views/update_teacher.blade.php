@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('update-teacher-post', ['id' => $teacher->id]) }}" id="updateForm" method="post">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <legend>Основные</legend>
            <label for="surname" class="col-3 control-label">Фамилия</label>
            <div class="col-9">
                <input type="text" id="surname" name="surname" placeholder="Фамилия" value="{{ $teacher->surname ?? old('surname') }}" class="form-control" autofocus>
            </div>
            @error('surname')
            <div class="col-12 alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="name" class="col-3 control-label">Имя</label>
            <div class="col-9">
                <input type="text" id="name" name="name" placeholder="Имя" value="{{ $teacher->name ?? old('name') }}" class="form-control" autofocus>
            </div>
            @error('name')
            <div class="col-12 alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="last_name" class="col-3 control-label">Отчество</label>
            <div class="col-9">
                <input type="text" id="last_name" name="last_name" placeholder="Отчество" value="{{ $teacher->last_name ?? old('last_name') }}" class="form-control" autofocus>
            </div>
            @error('last_name')
            <div class="col-12 alert alert-danger">{{ $message }}</div>
            @enderror

            <legend>Группы которые у преподавателя есть:</legend>
            <div class="row">
                <div class="form-group row">
                    @foreach($teacher->groups as $group)
                        <div class="col-9">
                            <div>{{ $group->name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <legend>Добавить группы</legend>
            <div class="row">
                <div class="form-group row">
                    <div class="col-9">
                        <select class="form-select" name="teacher_group[]" multiple>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <button type="submit" form="updateForm" class="btn btn-success float-right mb-5">Изменить</button>
    </div>
@endsection
