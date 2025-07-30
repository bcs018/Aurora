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

    <!-- Seção de Eventos -->
    <section id="albuns" class="my-5">
        <div class="container text-center">
            <h2 class="text-center mb-5">Últimos eventos</h2>
            <div class="row justify-content-center">
                @forelse ($eventos as $evento)
                    <div class="col-md-4 album-card mb-5">
                        <div class="card d-flex flex-column" style="height: 100%; border: #c9caca 1px solid;">

                            @php
                                $ext = strtolower(pathinfo($evento->capa, PATHINFO_EXTENSION))
                            @endphp

                            @if(in_array($ext, ['mp4', 'webm', 'mov'])) 
                                <video class="album-img"  controls muted style="height: 200px; object-fit: cover;">
                                    <source src="{{ asset('storage/' . $evento->capa) }}" type="video/{{ $ext }}">
                                    Seu navegador não suporta vídeos.
                                </video>
                            @else 
                                <img src="{{ asset('storage/' . $evento->capa) }}"
                                    alt="{{ $evento->nome }}" data-bs-toggle="modal" 
                                    data-bs-target="#carouselModal"
                                    style="height: 200px; object-fit: cover;">
                            @endif

                            <div class="card-body d-flex flex-column" style="flex: 1;">
                            <h5 class="card-title">{{$evento->nome}}</h5>

                            <div class="mt-3">
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
            <div class="mt-5">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" href="{{route('fotos.indexPage')}}">Visualizar todos eventos...</a>
            </div>
        </div>
    </section>

    <hr>

    <!-- Seção de Documentos -->
    <section id="albuns" class="my-5">
        <div class="container text-center">
            <h2 class="text-center mb-5">Documentos</h2>
            <div class="row justify-content-center">
                @forelse ($documentos as $documento)
                    <div class="col-md-4 album-card mb-5">
                        <div class="card d-flex flex-column" style="height: 100%; border: #c9caca 1px solid;">
                            <img src="{{asset('assets/images/documento.png')}}" class="" alt="{{$documento->nome}}" style="height: 200px; object-fit:scale-down;">
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
            <div class="mt-5">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" href="{{route('documento.listaDocumentos')}}">Visualizar todos documentos...</a>
            </div>
        </div>
    </section>

    <hr>

    <!-- Seção de Livros -->
    <section id="albuns" class="my-5">
        <div class="container text-center">
            <h2 class="text-center mb-5">Livros</h2>
            <div class="row justify-content-center">
                @forelse ($livros as $livro)
                    <div class="col-md-4 album-card mb-5">
                        <div class="card d-flex flex-column" style="height: 100%; border: #c9caca 1px solid;">
                            <img src="{{asset('assets/images/livro.png')}}" class="" alt="{{$livro->nome}}" style="height: 200px; object-fit:scale-down;">
                            <div class="card-body d-flex flex-column" style="flex: 1;">
                            <h5 class="card-title">{{$livro->nome}}</h5>
                            <div class="mt-3">
                                <a href="{{asset('storage/'.$livro->diretorio)}}" target="_blank" class="btn btn-dark">Ver livro</a>
                            </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <p class="text-center">Não há livros cadastrados.</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-5">
                <a class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" href="{{route('documento.listaLivros')}}">Visualizar todos livros...</a>
            </div>
        </div>
    </section>

    <div style="margin-bottom: 130px"></div>

</x-site.header>