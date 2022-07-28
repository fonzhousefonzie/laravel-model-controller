<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies Top #10</title>
    <link rel="stylesheet" href="css/app.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</head>

<body>
    <div class="cards-container">
        @foreach ($movies as $movie)
            <a class="card" href="https://www.themoviedb.org/search?query={{str_replace(" ","-",$movie['title'])}}">
                <h3>{{$movie['title']}}</h3>
                <p>{{$movie['original_title']}}</p>
                @for($i = 0; $i < round(intval($movie['vote'])/2); $i++)
                <span class="iconify" data-icon="emojione-v1:star"></span>
                @endfor
                <div class="specs">
                    <ul>
                        <li><span class="iconify" data-icon="noto-v1:world-map"></span> {{$movie['nationality']}}</li>
                        <li><span class="iconify" data-icon="noto-v1:film-projector"></span> {{date('d/m/Y',strtotime($movie['date']))}}</li>
                    </ul>
                </div>
            </a>
        @endforeach
        </div>
</body>

</html>