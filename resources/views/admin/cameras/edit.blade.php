@extends('admin.layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 style="margin-top:50px;margin-bottom:50px;">
            Редактировать камеру
        </h1>
        <div>
            {{ Form::model($model, ['url' => route('cameras.update', ['camera' => $model]), 'method' => 'PATCH']) }}

                @csrf
                <div class="mb-3">
                    {{ Form::label('title', 'Название') }}
                    {{ Form::text('title', $model->title, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </main>
@endsection
