<x-painel.header title="EDITAR LIVROS | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Editar livros</h1>
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
                    <form action="{{route('livros.update', $livro->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome do livro</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nomeLivro" id="nomeLivro" value="{{$livro->nome}}"
                                            class="form-control {{ $errors->has('nomeLivro') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('nomeLivro') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione o novo documento</label>
                                <div class="input-group ">
                                    <input type="file" class="form-control {{ $errors->has('livros') ? 'is-invalid' : '' }}" id="inputGroupFile01" name="livros" accept="application/pdf">
                                    <div class="invalid-feedback">{{ $errors->first('livros') }} </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success mt-3">Alterar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-painel.header>