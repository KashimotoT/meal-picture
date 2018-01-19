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

        {!! Form::open(['action' => 'ImagesController@store', 'method' => 'post', 'files' => true]) !!}
        {!! Form::label('fileName', 'アップロード') !!}
        {!! Form::file('fileName') !!}
        {!! Form::submit('アップロードする') !!}
        {!! Form::close() !!}
    </body>
</html>
