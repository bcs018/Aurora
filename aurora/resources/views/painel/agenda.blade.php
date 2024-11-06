<x-painel.header title="AGENDA | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Agenda</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('agenda.create')}}" class="btn btn-success">Cadastrar agenda</a>
            </div>
            <div class="table-responsive">
                <table id="tableAgenda" class="display">
                    <thead>
                    <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($agendas as $agenda)
                            <tr>
                                <td>{{$agenda->descricao}}</td>
                                <td>{{ date('d/m/Y', strtotime($agenda->data))}}</td>
                                <td>
                                    <a href="{{route('agenda.edit', $agenda->id)}}" class="text-decoration-none" style="color: #005284">
                                        <i class="fa-solid fa-pencil me-3"></i>
                                    </a> 

                                    <form action="{{route('agenda.destroy', $agenda->id)}}" method="POST" class="excluir-agenda" style="all: unset !important">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn p-0" type="submit" style="color: #005284">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Não há agendas cadastradas!</td>
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