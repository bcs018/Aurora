<x-site.header title="HOME | {{env('APP_NAME')}}  N° 3551">

    <!-- Banner -->
    <div id="banner" >
        <img src="{{asset('storage/images/banner.png')}}"      class="w-100 img-fluid d-md-none" alt="Banner {{env('APP_NAME')}}  N° 3551">
        <img src="{{asset('storage/images/banner-logo.png')}}" class="w-100 img-fluid d-none d-md-block d-xl-none" alt="Banner {{env('APP_NAME')}}  N° 3551">
        <img src="{{asset('storage/images/banner-logo.png')}}" class="w-100 img-fluid d-none d-xl-block" alt="Banner {{env('APP_NAME')}}  N° 3551">
    </div>

    <!-- Seção Sobre -->
    <div id="sobre">
        <div class="container">
            <h2 class="text-center mb-4">{{ env('APP_NAME') }} Nº 3551</h2>
            <p class="text-center">
                {!! $descricao !!}
            </p>
        </div>
    </div>

    <!-- Seção de Documentos -->
    <section id="albuns" class="my-5">
        <div class="container text-center">
        <h2 class="text-center mb-5">Documentos</h2>
        <div class="row justify-content-center">
            @forelse ($documentos as $documento)
                <div class="col-md-4 album-card mb-2">
                    <div class="card d-flex flex-column" style="height: 100%;">
                        <img src="https://static.vecteezy.com/system/resources/previews/017/395/386/non_2x/google-document-icon-free-png.png" class="" alt="Álbum 1" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column" style="flex: 1;">
                        <h5 class="card-title">{{$documento->nome}}</h5>
                        <div class="mt-3">
                            <a href="{{asset('storage/'.$documento->diretorio)}}" target="_blank" class="btn btn-dark">Ver documento</a>
                        </div>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <p class="text-center">Não há documentos cadastrados.</p>
                </div>
            @endforelse
        </div>
        </div>
    </section>

    <hr>

    <!-- Seção de Álbuns -->
    <section id="albuns" class="my-5">
        <div class="container text-center">
            <h2 class="text-center mb-5">Últimos eventos</h2>
            <div class="row justify-content-center">
                @forelse ($eventos as $evento)
                    <div class="col-md-4 album-card mb-5">
                        <div class="card d-flex flex-column" style="height: 100%;">
                            <img src="{{asset('storage/'.$evento->capa)}}" class="" alt="{{$evento->nome}}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column" style="flex: 1;">
                            <h5 class="card-title">{{$evento->nome}}</h5>
                            <p class="card-text">{{$evento->descricao}}</p>
                            <div class="mt-auto">
                                <a href="{{route('fotos.listaFotos', $evento->id)}}" class="btn btn-dark">Ver fotos</a>
                            </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <p class="text-center">Não há eventos cadastrados.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <div style="margin-bottom: 130px"></div>

</x-site.header>