<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | {{ env('APP_NAME') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Estilos customizados -->
    <style>
        body {
            background: linear-gradient(to top, #FFF, #abaeb4);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="login-container text-center">
        <h3 class="mb-4">{{ env('APP_NAME') }} Nº 3551</h3>
        <!-- Logo -->
        <div class="logo">
            <img src="{{asset('storage/images/logo-circles.png')}}" alt="Logo {{ env('APP_NAME') }}">
        </div>

        <h3 class="mb-4">Login</h3>

        <!-- Formulário de Login -->
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

            <p class="mt-3">
                <a href="#">Esqueceu a senha?</a>
            </p>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
