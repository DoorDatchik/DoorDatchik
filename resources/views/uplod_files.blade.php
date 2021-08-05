@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('upload-files-post') }}" id="uploadForm" name="uploadForm" enctype="multipart/form-data" method="post">
            @csrf

            <section>
                <fieldset class="upload_data" name="0">
                    <div class="form-group row">
                        <div class="col-4">
                            <select name="students" id="students" class="form-control">
                                @foreach($students as $student)
                                    <option value="">{{ $student->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="groups" id="groups" class="form-control">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="file" name="files">
                        </div>
                    </div>
                </fieldset>
                <button type="button" class="btn btn-primary click">Добавить фотографию студента</button>
            </section>
        </form>
        <button type="submit" form="uploadForm" class="btn btn-success float-right mb-5">Сохранить</button>
    </div>
@endsection
