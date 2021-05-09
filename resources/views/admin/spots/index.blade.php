@extends('admin.layouts.app')
@section('content')
    <div>
        <div class="mt-3 mb-3">
            <h3>Споты</h3>
        </div>
        <div>
            <table class="table" style="max-width: 990px;">
                <tr>
                    <th>id</th>
                    <th>Название En</th>
                    <th>Название Ru</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th>Регион</th>
                    <th>Камера</th>
                    <th style="max-width: 150px;">&nbsp;</th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->title_ru }}</td>
                        <td>{{ $item->lat }}</td>
                        <td>{{ $item->lon }}</td>
                        <td>{{ $item->region_id }}</td>
                        <td>
                            @foreach ($item->camera as $camera)
                                {{ $camera->title }}
                            @endforeach
                        </td>
                        <td style="max-width: 150px;">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-primary" href="{{ url("/spots/{$item->id}/edit") }}">edit</a>
                                </div>
                                <div class="col">
                                    {{ Form::model($item, ['url' => route('spots.destroy', ['spot' => $item]), 'method' => 'POST']) }}
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
            <a class="btn btn-outline-success" href="{{ url("/spots/create") }}">Добавить</a>

            {!! $items->links() !!}
        </div>
    </div>
@endsection

