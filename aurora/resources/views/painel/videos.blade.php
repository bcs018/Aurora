<x-painel.header title="VÍDEOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Vídeos</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('videos.create')}}" class="btn btn-success">Cadastrar vídeos</a>
            </div>
            <div class="table-responsive">
                <table id="tableDocumentos" class="display">
                    <thead>
                    <tr>
                        <th scope="col">Url</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data inclusão</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($videos as $video)
                            <tr>
                                <td>{{$video->url}}</td>
                                <td>{{$video->titulo}}</td>
                                <td>{{date('d/m/Y', strtotime($video->created_at))}}</td>
                                <td>
                                    <a href="{{route('videos.edit', $video->id)}}" class="text-decoration-none" style="color: #005284">
                                        <i class="fa-solid fa-pencil me-3"></i>
                                    </a> 

                                    <form action="{{route('videos.destroy', $video->id)}}" class="excluir-video" method="post" style="all: unset !important">
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
                                <td>Não há videos cadastrados</td>
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