<x-painel.header title="EDITAR FOTOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Editar fotos</h1>
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
                    <form action="{{route('fotos.update', $foto[0]->id)}}" method="POST" enctype="multipart/form-data">
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
                                        <div class="invalid-feedback">{{ $errors->first('nomeEvento') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição do evento</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="descricaoEvento" id="descricaoEvento" value="{{$foto[0]->evento->descricao}}"
                                            class="form-control {{ $errors->has('descricaoEvento') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('descricaoEvento') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione as novas fotos</label>
                                <div class="input-group ">
                                    <input type="file" class="form-control {{ $errors->has('fotos') ? 'is-invalid' : '' }}" id="inputGroupFile01" name="fotos[]" multiple>
                                    <div class="invalid-feedback">{{ $errors->first('fotos') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-2">
                                    <strong>DICA: </strong>Organize todas as fotos em uma pasta para facilitar a seleção em lote. Para adicionar ou remover 
                                    fotos de um evento, acesse o menu "Fotos", selecione o evento desejado e insira ou exclua as imagens conforme necessário.
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success mt-3">Alterar</button>
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
                            <img src="{{asset('storage/'.$f->diretorio)}}" class="card-img-top" alt="{{$f->nome}}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column" style="flex: 1;">
                                <div class="">
                                    <a href="" class="btn btn-danger">Excluir</a>
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