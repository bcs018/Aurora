<x-painel.header title="CADASTRAR VENERÁVEL | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Cadastrar Venerável</h1>
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
                    <form action="{{route('veneraveis.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nomeVeneravel" id="nomeVeneravel" value=""
                                            class="form-control {{ $errors->has('titulo-atu') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback"> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Período de</label>
                                    <div class="input-group mb-3">
                                        <input type="number"  name="periodoDe" id="periodoDe" value=""
                                            class="form-control {{ $errors->has('titulo-atu') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback"> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Período até</label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="periodoAte" id="periodoAte" value=""
                                            class="form-control {{ $errors->has('titulo-atu') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback"> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Selecione a foto do Venerável</label>
                                <div class="input-group ">
                                    <input type="file" class="form-control {{ $errors->has('fotoVeneravel') ? 'is-invalid' : '' }}" id="inputGroupFile01" name="fotoVeneravel">
                                    <div class="invalid-feedback">{{ $errors->first('fotoVeneravel') }} </div>
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