@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
                <div class="col">
                    <div class="card shadow-sm">
                        @if(empty($cameras[$item->id]))
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="275" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Камера не работает</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">камера не работает</text>
                            </svg>
                        @else
                            <img src="/webcams/{{ $cameras[$item->id] }}.jpg" width="600">
                        @endif
                        <div class="card-body">
                            <h3>{{ $item->title_ru }}</h3>
                            <p class="card-text">
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col">время</th>
                                    <th scope="col">температура</th>
                                    <th scope="col">влажность</th>
                                    <th scope="col">облачность</th>
                                    <th scope="col">ветер</th>
                                    <th scope="col">направление</th>
                                </tr>
                                @foreach ($weather[$item->id] as $hour)
                                    <tr>
                                        <td>{{ $hour['hour']}}:00</td>
                                        <td>{{ $hour['temp']}} &#8451;</td>
                                        <td>{{ $hour['humidity']}}%</td>
                                        <td>{{ $hour['clouds']}}%</td>
                                        <td>{{ $hour['speed']}} m/s</td>
                                        <td>{{ $hour['deg']}}&#176;</td>
                                    </tr>
                                @endforeach
                            </table>
                            </p>
                            <div class="d-grid gap-2">
                                <a href="/" class="btn btn-primary">Вернуться</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
