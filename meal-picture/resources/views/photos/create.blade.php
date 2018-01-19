<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MealPhoto</title>
    </head>
    <body>
        <h1>Meal Photo</h1>
        @extends('layouts.default_photos')
        @section('title', 'ファイルアップロード機能')
        @section('content')

        @if (session ('status'))
        <div class="alert alert-success" role="alert" onclick="this.classList.add('hidden')">{{ session('status') }}
        </div>
        @endif

        {!! Form::open(['url' => 'photos/store', 'files' => true, 'method' => 'POST']) !!}
        {!! Form::label('fileName', 'アップロード') !!}
        {!! Form::file('fileName') !!}
        {!! Form::submit('アップロードする') !!}
        {!! Form::close() !!}

        <hr color="#000000" style="height:1px" />

        @foreach ($photos as $photo)
        <div class="panel panel-deafult">
            <div class="panel-heading">アップロードした日付：{{$photo->created_at}}
                  <!-- List group -->
                  <ul class="list-group">
                  <li class="list-group-item"><img src="{{$photo->path}}"></li>
                  </ul>
            </div>
        </div>
        @endforeach

        @endsection
    </body>
</html>
