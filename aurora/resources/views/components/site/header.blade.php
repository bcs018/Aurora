<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href=" {{asset('assets/css/bootstrap/bootstrap.min.css')}}">
    <style>
        /* Estilização personalizada */
        body {
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #343a40;
        }

        .nav-link {
            color: #ddd !important;
        }

        .nav-link:hover {
            color: #fff !important;
        }

        #banner {
            height: 368px;
            background: url('img/banner.png') repeat;
            background-position: center;
            background-color: #33566e;
            /* Mantém o tamanho original da imagem */
            color: #33566e;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            font-size: 2rem;
        }

        #sobre {
            background-color: #ffffff;
            color: #212529;
            padding: 50px 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .album-card {
            transition: transform 0.3s;
        }

        .album-card:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: #06090c;
            color: white;
            padding: 15px 0;
            text-align: center;
            margin-top: 50px;
        }

        body {
            padding-top: 55px;
            /* Ajuste conforme necessário */
        }
    </style>
</head>

<body>

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
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre.html">História</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fotos.html">Fotos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="veneravel.html">Veneráveis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agenda.html">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="painel/home.html">Painel</a>
                    </li>
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
