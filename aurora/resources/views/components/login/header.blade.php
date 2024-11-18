<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} | {{ env('APP_NAME') }}</title>

    <link href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/login/login.css')}}" rel="stylesheet">
</head>
<body>

    {{$slot}}

    <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
</body>
</html>