<x-painel.header title="DESCRIÇÃO DA PÁGINA HISTÓRIA | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Descrição da página história</h1>
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
                    <form action="{{route('historia.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <label>Selecione o vídeo a ser mostrado na página história</label>
                                <div class="input-group ">
                                    <input type="file" class="form-control {{ $errors->has('videoHistoria') ? 'is-invalid' : '' }}" id="videoHistoria" name="videoHistoria" accept="video/*" >
                                    <div id="invalid-feedback-videoHistoria" class="invalid-feedback">{{ $errors->first('videoHistoria') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-4">
                                    <strong>DICA: </strong>Para substituir o vídeo, basta inserir o novo arquivo. O vídeo atual será automaticamente removido e o novo ficará visível.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione a imagem da ATA</label>
                                <div class="input-group">
                                    <input type="file" class="form-control {{ $errors->has('imgAta') ? 'is-invalid' : '' }}" id="imgAta" name="imgAta" accept="image/jpeg, image/jpg, image/png, image/gif">
                                    <div id="invalid-feedback-imgAta" class="invalid-feedback">{{ $errors->first('imgAta') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-4">
                                    <strong>DICA: </strong>Para substituir o ATA, basta inserir o novo arquivo. A ATA atual será automaticamente removido e a nova ficará visível.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione o PDF do slide</label>
                                <div class="input-group">
                                    <input type="file" class="form-control {{ $errors->has('slide') ? 'is-invalid' : '' }}" id="slide" name="slide" accept="application/pdf" >
                                    <div id="invalid-feedback-slide" class="invalid-feedback">{{ $errors->first('slide') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-4">
                                    <strong>DICA: </strong>Para substituir o slide, basta inserir o novo arquivo. O slide atual será automaticamente removido e a nova ficará visível.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success mt-3">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-painel.header>