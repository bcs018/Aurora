<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | {{ env('APP_NAME') }}</title>

    <link href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/login/login.css')}}" rel="stylesheet">
</head>
<body>

    <div class="login-container ">
        <div class="text-center">
            <h3 class="mb-4">{{ env('APP_NAME') }} Nº 3551</h3>
            <div class="logo">
                <img src="{{asset('storage/images/logo-circles.png')}}" alt="Logo {{ env('APP_NAME') }}">
            </div>

            <h3 class="mb-4">Login</h3>
        </div>

        <form method="POST" action="{{route('login.logar')}}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="cim" name="cim" placeholder="Login" value="{{old('cim')}}">
                <label for="cim">CIM</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                <label for="senha">Senha</label>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-3" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-dark w-100">Entrar</button>

            <p class="mt-3 text-center">
                <a href="#">Esqueceu a senha?</a>
            </p>
        </form>
    </div>

    <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
</body>
</html>
