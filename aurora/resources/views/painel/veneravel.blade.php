<x-painel.header title="VENERÁVEIS | {{ env('APP_NAME') }}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Veneráveis</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('veneraveis.create')}}" class="btn btn-success">Cadastrar Venerável</a>
            </div>
            <div class="table-responsive">
                <table id="tableVeneravel" class="display">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Período de</th>
                        <th scope="col">Período até</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($veneraveis as $veneravel)
                            <tr>
                                <td>{{$veneravel->nome}}</td>
                                <td>{{$veneravel->ano_inicio}}</td>
                                <td>{{$veneravel->ano_final}}</td>
                                <td>
                                    <a href="" class="text-decoration-none" style="color: #005284">
                                        <i class="fa-solid fa-pencil me-3"></i>
                                    </a> 

                                    <form action="" class="excluir-veneravel" method="post" style="all: unset !important">

                                        <button class="btn p-0" type="submit" style="color: #005284">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Não há venerável cadastrado!</td>
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
