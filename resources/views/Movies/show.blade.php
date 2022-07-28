@extends('layout')

@php
$movieJson = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key=6fc530c8a4a5679024aea82b062cbd34&language=it&query=' . str_replace(' ', '+', $movie['original_title']));
$movieObj = json_decode($movieJson, true);
$movieImg = 'https://image.tmdb.org/t/p/w400/' . $movieObj['results'][0]['poster_path'];
$movieOverview = $movieObj['results'][0]['overview'];
$moviePop = $movieObj['results'][0]['popularity'];
@endphp

@section('title',"Movies Top 10:  #".$movie['id']." ".$movie['title'])

@section('content')
    <div class="movie container">
        <a href="{{route('movies.index')}}"><span class="iconify" data-icon="akar-icons:arrow-back-thick-fill"></span> INDIETRO</a>
        <h1>{{ $movie['title'] }}</h1>
        <h2>({{ $movie['original_title'] }})</h2>
        <div class="content">
            <div class="movie-content">
                <img src="{{ $movieImg }}" alt="">
                <div class="description">
                    <h2>Trama:</h2>
                    <h4>{{ $movieOverview }}</h4>
                    <div class="vote">
                        @for ($i = 0; $i < round(intval($movie['vote']) / 2); $i++)
                            <span class="iconify" data-icon="emojione-v1:star"></span>
                        @endfor
                    </div>
                    <div class="info">
                        <ul>
                            <li><span class="iconify" data-icon="bxs:heart"
                                    style="color: red;"></span><strong>Popolarità:</strong> {{ $moviePop }}%</li>
                            <li><span class="iconify" data-icon="noto-v1:film-projector"></span><strong>Data di
                                    rilascio:</strong> {{ date('d/m/Y', strtotime($movie['date'])) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pub">
                <h3>ADVERTISEMENT</h3>
                <a href="https://fonzhousefonzie.com">
                    <img src="{{asset('img/pub.jpg')}}" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection
