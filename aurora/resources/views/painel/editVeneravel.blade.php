<x-painel.header title="EDITAR VENERÁVEL | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Editar Venerável</h1>
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
                    <form action="{{route('veneraveis.update', $veneravel->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nomeVeneravel" id="nomeVeneravel" value="{{$veneravel->nome}}"
                                            class="form-control {{ $errors->has('nomeVeneravel') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('nomeVeneravel') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Período de</label>
                                    <div class="input-group mb-3">
                                        <input type="number"  name="periodoDe" id="periodoDe" value="{{$veneravel->ano_inicio}}"
                                            class="form-control {{ $errors->has('periodoDe') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('periodoDe') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Período até</label>
                                    <div class="input-group mb-3">
                                        <input type="number" name="periodoAte" id="periodoAte" value="{{$veneravel->ano_final}}"
                                            class="form-control {{ $errors->has('periodoAte') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('periodoAte') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Selecione a nova foto do Venerável</label>
                                <div class="input-group ">
                                    <input type="file" class="form-control {{ $errors->has('fotoVeneravel') ? 'is-invalid' : '' }}" id="inputGroupFile01" name="fotoVeneravel">
                                    <div class="invalid-feedback">{{ $errors->first('fotoVeneravel') }} </div>
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
            <div class="row justify-content-center">
                <div class="col-md-3 album-card mb-2">
                    <h3 class="mb-5 mt-3 text-center">Foto atual do Venerável</h3>
                    <div class="card d-flex flex-column" >
                        <img src="{{asset('storage/'.$veneravel->diretorio)}}" class="card-img-top" alt="Foto do venerável {{$veneravel->nome}}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column" style="flex: 1;">
                            <p>Para atualizar a foto, basta enviar uma nova imagem pelo formulário acima.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-painel.header>