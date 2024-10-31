<x-painel.header title="FOTOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Fotos</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('fotos.create')}}" class="btn btn-success">Cadastrar foto</a>
            </div>
            <div class="table-responsive">
                <table id="tableFotos" class="display">
                    <thead>
                    <tr>
                        <th scope="col">Evento</th>
                        <th scope="col">Data</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Confraternização loja</td>
                            <td>20/12/2023</td>
                            <td>Confraternização de natal</td>
                            <td>
                                <a href="alterarFoto.html" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-pencil me-3"></i>
                                </a> 

                                <form action="" class="excluir-foto" method="post" style="all: unset !important">

                                    <button class="btn p-0" type="submit" style="color: #005284">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>Reunião</td>
                            <td>12/11/2024</td>
                            <td>Reunião</td>
                            <td>
                                <a href="alterarFoto.html" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-pencil me-3"></i>
                                </a> 

                                <form action="" class="excluir-foto" method="post" style="all: unset !important">

                                    <button class="btn p-0" type="submit" style="color: #005284">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-painel.header>