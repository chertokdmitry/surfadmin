@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($items as $item)
        <div class="col">
            <div class="card shadow-sm">
                @if(empty($cameras[$item->id]))
                <svg class="bd-placeholder-img card-img-top" width="100%" height="275" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Камера не работает</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">камера не работает</text>
                </svg>
                @else
                <img src="/webcams/{{ $cameras[$item->id] }}.jpg">
                @endif
                <div class="card-body">
                    <a href="/spot/{{ $item->id }}">
                    <h3>{{ $item->title_ru }}</h3>
                    </a>
                    <p class="card-text">
                    <table class="table table-striped">
                        @foreach ($weather[$item->id] as $hour)
                            <tr>
                                <td>{{ $hour['hour']}}:00</td>
                                <td>{{ $hour['temp']}} &#8451;</td>
                                <td>{{ $hour['speed']}} m/s, {{ $hour['deg']}}&#176;</td>
                            </tr>
                        @endforeach
                    </table>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/spot/{{ $item->id }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="margin-top:50px;">{!! $items->links() !!}</div>
</div>

@endsection
