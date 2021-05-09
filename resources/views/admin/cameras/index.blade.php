@extends('admin.layouts.app')
@section('content')
    <div>
        <div class="mt-3 mb-3">
            <h3>Камеры</h3>
        </div>
        <div>
            <table class="table" style="max-width: 990px;">
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th style="max-width: 150px;">&nbsp;</th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td style="max-width: 150px;">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ url("/cameras/{$item->id}/edit") }}">edit</a>
                                </div>
                                <div class="col">
                                    {{ Form::model($item, ['url' => route('cameras.destroy', ['camera' => $item]), 'method' => 'POST']) }}
                                        @csrf
                                        @method("DELETE")
                                    {{ Form::submit('X', ['class' => 'btn btn-outline-secondary']) }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a class="btn btn-outline-success" href="{{ url("/cameras/create") }}">Добавить</a>

            {!! $items->links() !!}
        </div>
    </div>
@endsection

