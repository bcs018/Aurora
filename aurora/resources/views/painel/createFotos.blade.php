<x-painel.header title="CADASTRAR MÍDIAS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Cadastrar mídias para evento</h1>
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
                    <form action="{{route('fotos.store')}}" method="POST" id="cadastrar-fotos-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome do evento</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nomeEvento" id="nomeEvento" value="{{old('nomeEvento')}}"
                                            class="form-control {{ $errors->has('nomeEvento') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div id="invalid-feedback-nomeEvento" class="invalid-feedback">{{ $errors->first('nomeEvento') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição do evento</label>
                                    <div class="input-group mb-3">
                                        <textarea name="descricaoEvento" id="descricaoEvento" class="form-control {{ $errors->has('descricaoEvento') ? 'is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="9">{{old('descricaoEvento')}}</textarea>
                                        <div id="invalid-feedback-descricaoEvento" class="invalid-feedback">{{ $errors->first('descricaoEvento') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione as fotos/vídeos (Vídeos devem ser em formato MP4 e tamanho máximo 1GB)</label>
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
                        <button class="btn btn-success mt-3" id="cadastrar-fotos">Cadastrar</button>
                        <button class="btn btn-success mt-3 visually-hidden" type="button" disabled id="cadastrar-fotos-loading">
                            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                            <span id="status" role="status">Aguarde, não feche nem mude de página</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-painel.header>