<x-site.header title="EVENTOS | {{ env('APP_NAME') }}  N° 3551">

    <div class="content">
        <div class="container text-center">
            <h1 class="mb-5">Eventos</h1>
        </div>

        <section id="albuns" class="my-5 pt-5">
            <div class="container">
                <div class="row">
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
                                    <a class="text-dark text-decoration-none" href="{{route('fotos.listaFotos', $evento->id)}}">
                                        <h5 class="card-title">
                                            {{$evento->nome}}
                                        </h5>
                                    </a>
                                                                        
                                    <div class="mt-3">
                                        <a href="{{route('fotos.listaFotos', $evento->id)}}" class="btn btn-dark">Ver fotos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            <p class="text-center">Não há fotos cadastradas.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

</x-site.header>
