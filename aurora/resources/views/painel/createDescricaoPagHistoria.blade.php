<x-painel.header title="PÁGINA HISTÓRIA | {{env('APP_NAME')}}">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Página história</h1>
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
                    <form action="{{route('historia.store')}}" method="POST" enctype="multipart/form-data" id="cadastrar-historia-form">
                        @csrf
                        <div id="app_token" data-token="{{ csrf_token() }}"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <div class="input-group mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="summernote" name="descricaoHistoria" style="height: 100px">
                                                {{$texto}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div style="color: #dc3545">{{ $errors->first('descricaoHistoria') }} </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione o vídeo a ser mostrado na página história (Formato MP4)</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary" id="dropArea">Clique para selecionar o vídeo</button>
                                    
                                </div>
                                <div class="input-group">
                                    <span id="nomeVideo"></span>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-5">
                                    {{-- Input criado pois o Resumable precisa desse input --}}
                                    <input type="file" class="form-control d-none {{ $errors->has('videoHistoria') ? 'is-invalid' : '' }}" id="videoHistoria" name="videoHistoria" accept="video/*" >
                                    <strong>DICA: </strong>Para substituir o vídeo, basta inserir o novo arquivo. O vídeo atual será automaticamente removido e o novo ficará visível.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione o PDF da ATA</label>
                                <div class="input-group">
                                    <input type="file" class="form-control {{ $errors->has('imgAta') ? 'is-invalid' : '' }}" id="imgAta" name="imgAta" accept="application/pdf">
                                    <div id="invalid-feedback-imgAta" class="invalid-feedback">{{ $errors->first('imgAta') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-5">
                                    <strong>DICA: </strong>Para substituir o ATA, basta inserir o novo arquivo. A ATA atual será automaticamente removido e a nova ficará visível.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione o PDF do slide</label>
                                <div class="input-group">
                                    <input type="file" class="form-control {{ $errors->has('slide') ? 'is-invalid' : '' }}" id="slide" name="slide" accept="application/pdf" >
                                    <div id="invalid-feedback-slide" class="invalid-feedback">{{ $errors->first('slide') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-3">
                                    <strong>DICA: </strong>Para substituir o slide, basta inserir o novo arquivo. O slide atual será automaticamente removido e a nova ficará visível.
                                </div>
                                <div id="arquivosHelp" class="form-text mb-2">
                                    <strong>ATENÇÃO: </strong>Como vídeos possuem maior tamanho, o upload pode ser mais lento. Não feche ou atualize a página até que o envio seja concluído.
                                </div>
                            </div>
                        </div>

                        <div id="uploadStatus"></div>

                        <button class="btn btn-success mt-3" id="cadastrar-historia">Cadastrar</button>
                        <button class="btn btn-success mt-3 visually-hidden" type="button" disabled id="cadastrar-historia-loading">
                            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                            <span id="mensagemStatus" role="status">Aguarde, não feche nem mude de página, o processo pode demorar um pouco...</span>
                        </button>
                    </form>
                </div>
                <div id="uploadStatus"></div>
        </div>
    </section>
</x-painel.header>