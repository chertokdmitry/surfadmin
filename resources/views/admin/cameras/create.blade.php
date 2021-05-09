@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 style="margin-top:50px;margin-bottom:50px;">
            Добавить камеру
        </h1>
        <div>
            {!! Form::open(['action' => 'Cameras\CamerasController@store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}

            @csrf
            <div class="mb-3">
                {{ Form::label('title', 'Название') }}
                {{ Form::text('title', '', ['class' => 'form-control']) }}
            </div>
            <div class="mb-3">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </main>
@endsection
