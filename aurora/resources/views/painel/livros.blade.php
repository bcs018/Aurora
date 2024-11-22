<x-painel.header title="LIVROS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Livros</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('livros.create')}}" class="btn btn-success">Cadastrar livros</a>
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
                        @forelse ($livros as $livros)
                            <tr>
                                <td>{{$livros->nome}}</td>
                                <td>{{date('d/m/Y', strtotime($livros->created_at))}}</td>
                                <td>
                                    <a href="{{route('livros.edit', $livros->id)}}" class="text-decoration-none" style="color: #005284">
                                        <i class="fa-solid fa-pencil me-3"></i>
                                    </a> 

                                    <form action="{{route('livros.destroy', $livros->id)}}" class="excluir-livro" method="post" style="all: unset !important">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn p-0" type="submit" style="color: #005284">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Não há livros cadastrados</td>
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