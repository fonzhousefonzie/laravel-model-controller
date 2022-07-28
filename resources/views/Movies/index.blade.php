@extends('layout')

@section('title',"Movies Top 10")

@section('content')
    <div class="cards container">
        @foreach ($movies as $movie)
            <a class="card" href="{{$movie['id']}}">
                <h3>{{ $movie['title'] }}</h3>
                <p>{{ $movie['original_title'] }}</p>
                @for ($i = 0; $i < round(intval($movie['vote']) / 2); $i++)
                    <span class="iconify" data-icon="emojione-v1:star"></span>
                @endfor
                <div class="specs">
                    <ul>
                        <li><span class="iconify" data-icon="noto-v1:world-map"></span> {{ $movie['nationality'] }}</li>
                        <li><span class="iconify" data-icon="noto-v1:film-projector"></span>
                            {{ date('d/m/Y', strtotime($movie['date'])) }}</li>
                    </ul>
                </div>
            </a>
        @endforeach
    </div>
@endsection
