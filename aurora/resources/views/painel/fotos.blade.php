<x-painel.header title="MÍDIAS DE EVENTOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Mídias de eventos</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('fotos.create')}}" class="btn btn-success">Cadastrar fotos/vídeos</a>
            </div>
            <div class="table-responsive">
                <table id="tableFotos" class="display">
                    <thead>
                    <tr>
                        <th scope="col">Evento</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($eventos as $evento)
                            <tr>
                                <td>{{$evento->nome}}</td>
                                <td>{{$evento->descricao}}</td>
                                <td>
                                    <a href="{{route('fotos.edit', $evento->id)}}" class="text-decoration-none" style="color: #005284">
                                        <i class="fa-solid fa-pencil me-3"></i>
                                    </a> 

                                    <form action="{{route('fotos.destroy', $evento->id)}}" class="excluir-evento" method="post" style="all: unset !important">
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
                                <td>Não há eventos cadastrados!</td>
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