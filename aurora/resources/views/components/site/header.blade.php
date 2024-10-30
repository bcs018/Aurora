<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href=" {{asset('assets/css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/css/site/style.css')}} ">
</head>

<body style="padding-top: 55px;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.indexPage')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('historia.indexPage')}}">História</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('fotos.indexPage')}}">Fotos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('veneraveis.indexPage')}}">Veneráveis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('agenda.indexPage')}}">Agenda</a>
                    </li>
                    @if (Auth::user()->administrador == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="painel/home.html">Painel</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a style="color: #da5555 !important" class="nav-link" href="{{route('login.logout')}}">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}

    <!-- Footer -->
    <footer class="p-4">
        <p>&copy; {{date('Y')}} {{env('APP_NAME')}} N° 3551. Todos os direitos reservados.</p>
        <p>Desenvolvido por: <a href="https://www.linkedin.com/in/bruno-cesar-184b5b180/" target="_blank"
                class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Bruno
                Silva</a></p>
    </footer>

    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
</body>

</html>
