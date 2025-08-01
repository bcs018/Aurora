<x-painel.header title="EDITAR FOTOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Editar mídias de eventos</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Insira os dados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('fotos.update', $foto[0]->evento->id)}}" method="POST" id="editar-fotos-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome do evento</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nomeEvento" id="nomeEvento" value="{{$foto[0]->evento->nome}}"
                                            class="form-control {{ $errors->has('nomeEvento') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div id="invalid-feedback-nomeEvento" class="invalid-feedback">{{ $errors->first('nomeEvento') }} </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="evento_id" value="{{$foto[0]->evento->id}}">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição do evento</label>
                                    <div class="input-group mb-3">
                                        <textarea name="descricaoEvento" id="descricaoEvento" class="form-control {{ $errors->has('descricaoEvento') ? 'is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="9">{{$foto[0]->evento->descricao}}</textarea>

                                        <div id="invalid-feedback-descricaoEvento" class="invalid-feedback">{{ $errors->first('descricaoEvento') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione as novas fotos/vídeos (Vídeos devem ser em formato MP4 e tamanho máximo 1GB)</label>
                                <div class="input-group ">
                                    <input type="file" class="form-control {{ $errors->has('fotos') ? 'is-invalid' : '' }}" id="fotos" name="fotos[]" accept="image/jpeg, image/jpg, image/png, image/gif, video/mp4" multiple>
                                    <div id="invalid-feedback-fotos" class="invalid-feedback">{{ $errors->first('fotos') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-2">
                                    <strong>DICA: </strong>Organize todas as fotos/vídeos em uma pasta para facilitar a seleção em lote. Para adicionar ou remover 
                                    fotos de um evento, acesse o menu "Fotos", selecione o evento desejado e insira ou exclua as imagens conforme necessário.
                                </div>
                                <div id="arquivosHelp" class="form-text mb-2">
                                    <strong>ATENÇÃO: </strong>Como vídeos possuem maior tamanho, o upload pode ser mais lento. Não feche ou atualize a página até que o envio seja concluído.
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success mt-3" id="editar-fotos">Alterar</button>
                        <button class="btn btn-success mt-3 visually-hidden" type="button" disabled id="editar-fotos-loading">
                            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                            <span id="status" role="status">Aguarde, não feche nem mude de página</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="content" id="albuns" class="my-5">
        <div class="container">
            <div class="row">
                @forelse ($foto as $f)
                    <div class="col-md-3 album-card mb-2">
                        <div class="card d-flex flex-column" >

                            @php
                                $ext = strtolower(pathinfo($f->diretorio, PATHINFO_EXTENSION));
                                $isVideo = false;
                            @endphp

                            @if(in_array($ext, ['mp4', 'webm', 'mov'])) 
                                <video class="card-img-top"  controls muted style="height: 200px; object-fit: cover;">
                                    <source src="{{ asset('storage/' . $f->diretorio) }}" type="video/{{ $ext }}">
                                    Seu navegador não suporta vídeos.
                                </video>

                                @php 
                                    $isVideo = true 
                                @endphp
                            @else 
                                <img src="{{asset('storage/'.$f->diretorio)}}" class="card-img-top" alt="{{$f->nome}}" style="height: 200px; object-fit: cover;">
                            @endif

                            <div class="card-body d-flex flex-column" style="flex: 1;">
                                <div class="">
                                    <form action="{{route('fotos.destroyFoto', $f->id)}}" class="excluir-foto" method="post" style="all: unset !important">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" >
                                            {{($isVideo) ? 'Excluir vídeo' : 'Excluir foto'}}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <h5>Não há fotos para esse evento</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-painel.header>