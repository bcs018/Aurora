<x-painel.header title="CADASTRAR DOCUMENTOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Cadastrar documentos</h1>
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
                    <form action="{{route('documentos.store')}}" method="POST" id="cadastrar-documentos-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome do documento</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nomeDocumento" id="nomeDocumento" value="{{old('nomeDocumento')}}"
                                            class="form-control {{ $errors->has('nomeDocumento') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('nomeDocumento') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione o documento em PDF</label>
                                <div class="input-group ">
                                    <input type="file" class="form-control {{ $errors->has('documentos') ? 'is-invalid' : '' }}" id="inputGroupFile01" name="documentos" accept="application/pdf">
                                    <div class="invalid-feedback">{{ $errors->first('documentos') }} </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success mt-3" id="cadastrar-documentos">Cadastrar</button>
                        <button class="btn btn-success mt-3 visually-hidden" type="button" disabled id="cadastrar-documentos-loading">
                            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                            <span role="status">Aguarde, não feche nem mude de página...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-painel.header>