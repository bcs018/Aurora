<x-painel.header title="USUÁRIOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Usuários</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('usuarios.create')}}" class="btn btn-success">Cadastrar usuário</a>
            </div>
            <div class="table-responsive">
                <table id="tableUsuarios" class="display">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">SIM</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>João Silva</td>
                            <td>joao@example.com</td>
                            <td>P23456</td>
                            <td>SIM</td>
                            <td>
                                <a href="" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-pencil me-3"></i>
                                </a> 

                                <form action="" class="excluir-admin" method="post" style="all: unset !important">

                                    <button class="btn p-0" type="submit" style="color: #005284">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>Marcos Santos</td>
                            <td>marcos@example.com</td>
                            <td>P23457</td>
                            <td>NÃO</td>
                            <td>
                                <a href="" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-pencil me-3"></i>
                                </a> 

                                <form action="" class="excluir-admin" method="post" style="all: unset !important">

                                    <button class="btn p-0" type="submit" style="color: #005284">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>Mohamed Salem</td>
                            <td>mohamed@example.com</td>
                            <td>P23458</td>
                            <td>SIM</td>
                            <td>
                                <a href="" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-pencil me-3"></i>
                                </a> 

                                <form action="" class="excluir-admin" method="post" style="all: unset !important">

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