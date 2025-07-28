<x-painel.header title="CADASTRAR VÍDEOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Cadastrar vídeos</h1>
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
                    <form action="{{route('videos.store')}}" method="POST" id="cadastrar-videos-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>URL do vídeo do YouTube</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="urlVideo" id="urlVideo" value="{{old('urlVideo')}}"
                                            class="form-control {{ $errors->has('urlVideo') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('urlVideo') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Nome do vídeo</label>
                                <div class="input-group ">
                                    <input type="text" name="nomeVideo" id="nomeVideo" value="{{old('nomeVideo')}}"
                                            class="form-control {{ $errors->has('nomeVideo') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                    <div class="invalid-feedback">{{ $errors->first('nomeVideo') }} </div>
                                </div>
                            </div>
                            <div id="arquivosHelp" class="form-text mb-2">
                                <strong>DICA: </strong>Os vídeos inseridos serão mostrado na página "História"
                            </div>

                        </div>
                        <button class="btn btn-success mt-3" id="cadastrar-video">Cadastrar</button>
                        <button class="btn btn-success mt-3 visually-hidden" type="button" disabled id="cadastrar-livros-loading">
                            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                            <span role="status">Aguarde, não feche nem mude de página...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-painel.header>