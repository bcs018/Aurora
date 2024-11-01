<x-painel.header title="CADASTRAR AGENDA | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Cadastrar agenda</h1>
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
                    <form action="{{route('agenda.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="descricaoAgenda" id="descricaoAgenda" value="{{old('descricaoAgenda')}}"
                                            class="form-control {{ $errors->has('descricaoAgenda') ? 'is-invalid' : '' }}"
                                            id="exampleFormControlInput1" autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('descricaoAgenda') }} </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Data</label>
                                <div class="input-group ">
                                    <input type="date" class="form-control {{ $errors->has('dataAgenda') ? 'is-invalid' : '' }}" id="inputGroupFile01" name="dataAgenda">
                                    <div class="invalid-feedback">{{ $errors->first('dataAgenda') }} </div>
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