@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 style="margin-top:50px;margin-bottom:50px;">
            Добавить спот
        </h1>
        <div>
            {!! Form::open(['action' => 'Spots\SpotsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}

            @csrf
            <div class="mb-3">
                {{ Form::label('title', 'Название En') }}
                {{ Form::text('title', '', ['class' => 'form-control']) }}
            </div>
            <div class="mb-3">
                {{ Form::label('title_ru', 'Название Ru') }}
                {{ Form::text('title_ru', '', ['class' => 'form-control']) }}
            </div>
            <div class="mb-3">
                {{ Form::label('lat', 'Lat') }}
                {{ Form::text('lat','', ['class' => 'form-control']) }}
            </div>
            <div class="mb-3">
                {{ Form::label('lon', 'Lon') }}
                {{ Form::text('lon', '', ['class' => 'form-control']) }}
            </div>
            <div class="mb-3">
                {{ Form::label('region_id', 'Region Id') }}
                {{ Form::text('region_id', '', ['class' => 'form-control']) }}
            </div>
            <div class="mb-3">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </main>
@endsection
