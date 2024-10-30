<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel | A.R.L.S. AURORA GUAÇUANA</title>

    <link rel="stylesheet" href="../css/adminlte/adminlte.min.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/all.min.css">
    <link rel="stylesheet" href="../css/select2/select2.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="height: auto;">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                     <a href="home.html" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="../index.html" class="brand-link text-decoration-none">
                <img src="../img/logo-circle.png" alt="A.R.L.S. AURORA GUAÇUANA" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">A.R.L.S. AURORA</span>
            </a>


            <div class="sidebar">
                <div class="user-panel mt-3 d-flex">
                    <div class="info">
                        <p class="d-block text-light">Nome Usuário</p> 
                        <a href="{{route('logout-cli')}}" class="d-block text-danger text-decoration-none">Sair</a>   
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-gear"></i>
                                <p>
                                    Opções
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="agenda.html" class="nav-link">
                                        <i class="nav-icon fa-solid fa-calendar-days"></i>
                                        <p>Agenda</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="fotos.html" class="nav-link">
                                        <i class="nav-icon fa-solid fa-image"></i>
                                        <p>Fotos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="documentos.html" class="nav-link">
                                        <i class="nav-icon fa-solid fa-file"></i>
                                        <p>Documentos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="usuarios.html" class="nav-link">
                                        <i class="nav-icon fa-solid fa-user"></i>
                                        <p>Usuários</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="descricaoPagInicial.html" class="nav-link">
                                        <i class="nav-icon fa-solid fa-house"></i>
                                        <p>Descrição pág inicial</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="descricaoPagHistoria.html" class="nav-link">
                                        <i class="nav-icon fa-solid fa-file-lines"></i>
                                        <p>Descrição pág história</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="veneraveis.html" class="nav-link">
                                        <i class="nav-icon fa-solid fa-user-graduate"></i>
                                        <p>Veneráveis</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <hr>
					</ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper" style="min-height: 1345.31px;">

            {{ $slot }}

        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Versão</b> 1.0.0
            </div>
            <strong>A.R.L.S. AURORA GUAÇUANA
        </footer>
    </div>

    <script src="../js/jquery/jquery.min.js" ></script>
    <script src="../js/select-menu/jquery.selected.menu.js"></script>
    <script src="../js/select2/select2.js"></script>
    <script src="../js/select2/select2bootstrap.js"></script>
    <script src="../js/fontawesome/all.min.js"></script>
    <script src="../js/popper/popper-core.min.js"></script>
    <script src="../js/popper/popper-dom.min.js"></script>
    <script src="../js/adminlte/adminlte.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/checkbox-form/checkbox-form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="../js/select-tipo-enviar-atualizacao/select-tipo-enviar-atualizacao.js"></script>
    <script src="../js/confirma-exclusao/usuarios.js"></script>
    <script src="../js/confirma-exclusao/empresas.js"></script>
    <script src="../js/confirma-exclusao/tipos.js"></script>
    <script src="../js/confirma-exclusao/atualizacoes.js"></script>
    <script src="../js/confirma-exclusao/arquivo-atualizacoes.js"></script>
    <script src="../js/confirma-exclusao/administradores.js"></script>
</body>
    
</html>
    