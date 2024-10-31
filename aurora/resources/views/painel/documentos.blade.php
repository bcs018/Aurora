<x-painel.header title="DOCUMENTOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Documentos</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('documentos.create')}}" class="btn btn-success">Cadastrar documento</a>
            </div>
            <div class="table-responsive">
                <table id="tableDocumentos" class="display">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Data inclusão</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Documento teste</td>
                            <td>20/12/2023</td>
                            <td>
                                <a href="alterarDocumento.html" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-eye me-3"></i>
                                </a> 

                                <form action="" class="excluir-documento" method="post" style="all: unset !important">

                                    <button class="btn p-0" type="submit" style="color: #005284">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>Documento teste 2</td>
                            <td>12/11/2024</td>
                            <td>
                                <a href="alterarDocumento.html" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-eye me-3"></i>
                                </a> 

                                <form action="" class="excluir-documento" method="post" style="all: unset !important">

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