@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 style="margin-top:50px;margin-bottom:50px;">
            Редактировать спот
        </h1>
        <div>
            {{ Form::model($model, ['url' => route('spots.update', ['spot' => $model, 'cameraId' => $cameraId]), 'method' => 'PATCH']) }}
                @csrf
                <div class="mb-3">
                    {{ Form::label('title', 'Название EN') }}
                    {{ Form::text('title', $model->title, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('title_ru', 'Название RU') }}
                    {{ Form::text('title_ru', $model->title_ru, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('lat', 'Lat') }}
                    {{ Form::text('lat', $model->lat, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('lon', 'Lon') }}
                    {{ Form::text('lon', $model->lon, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('region_id', 'Region Id') }}
                    {{ Form::text('region_id', $model->region_id, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                {{ Form::select('camera', $cameras, null, ['id'=>'cameras', 'class' => 'form-control', 'placeholder' => 'Select a Camera']) }}

                </div>
                <div class="mb-3">
                    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </main>
@endsection
