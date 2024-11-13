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
                        <th scope="col">CIM</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->cim}}</td>
                                <td>{{($usuario->administrador == 1) ? 'SIM' : 'NÃO'}}</td>
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
                        @empty
                            <tr>
                                <td>Não há usuários cadastrados!</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-painel.header>