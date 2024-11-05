<x-painel.header title="CADASTRAR USUÁRIOS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Cadastrar usuários</h1>
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
                    <form action="{{route('usuarios.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nomeUsuario" id="nomeUsuario" value="{{old('nomeUsuario')}}"
                                            class="form-control {{ $errors->has('nomeUsuario') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('nomeUsuario') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="emailUsuario" id="emailUsuario" value="{{old('emailUsuario')}}"
                                            class="form-control {{ $errors->has('emailUsuario') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1">
                                        <div class="invalid-feedback">{{ $errors->first('emailUsuario') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SIM</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="simUsuario" id="simUsuario" value="{{old('simUsuario')}}"
                                            class="form-control {{ $errors->has('simUsuario') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1">
                                        <div class="invalid-feedback">{{ $errors->first('simUsuario') }} </div>
                                    </div>
                                    <div id="arquivosHelp" class="form-text mb-4">
                                        <strong>DICA: </strong>Este código SIM será o login do usuário.
                                    </div>
                                </div>
                            </div>

                            <div class="form-check ml-2 mb-4">
                                <input class="form-check-input" type="checkbox" name="administradorUsuario" value="" id="administradorUsuario">

                                <label class="form-check-label" for="administradorUsuario" >
                                    Administrador
                                </label>
                            </div>

                        </div>
                        <button class="btn btn-success mt-3">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-painel.header>