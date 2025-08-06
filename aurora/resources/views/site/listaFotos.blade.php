<x-site.header title="FOTOS | {{ env('APP_NAME') }}  N° 3551">

    <div class="content">
        <div class="container">
            <h1 class="text-center mb-4">{{ $fotos[0]->evento->nome }}</h1>
            <p class="text-center mb-5">{{ $fotos[0]->evento->descricao }}</p>
            <div class="row">
                @forelse ($fotos as $index => $foto)
                    @php
                        $ext = strtolower(pathinfo($foto->diretorio, PATHINFO_EXTENSION))
                    @endphp

                    @if(!in_array($ext, ['mp4', 'webm', 'mov'])) 
                        <div class="col-md-4 album-card mb-2">
                            <img src="{{ asset('storage/' . $foto->diretorio) }}"
                                class="album-img" alt="{{ $foto->nome }}" data-bs-toggle="modal" 
                                data-bs-target="#carouselModal" data-index="{{ $index }}">
                        </div>
                    @else
                        <div class="col-md-4 album-card mb-2">
                            <img src="{{ asset('storage/images/player.png') }}"
                                class="album-img" alt="{{ $foto->nome }}" data-bs-toggle="modal" 
                                data-bs-target="#carouselModal" data-index="{{ $index }}">
                        </div>
                    @endif
                @empty
                    <div>
                        <p class="text-center">Não há fotos para esse evento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Modal com Carrossel -->
    <div class="modal fade" id="carouselModal" tabindex="-1" aria-labelledby="carouselModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-inner">
                            
                            @foreach ($fotos as $index => $foto)
                                @php
                                    $ext = strtolower(pathinfo($foto->diretorio, PATHINFO_EXTENSION))
                                @endphp

                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    @if(!in_array($ext, ['mp4', 'webm', 'mov'])) 
                                        <img src="{{ asset('storage/' . $foto->diretorio) }}" class="d-block w-100 img-fluid" alt="{{ $foto->nome }}">
                                    @else 
                                        <video id="" class="w-100" controls autoplay>
                                            <source src="{{ asset('storage/' . $foto->diretorio) }}" type="video/{{$ext}}">
                                            Seu navegador não suporta a reprodução de vídeo.
                                        </video>
                                    @endif
                                </div>
                            @endforeach

                        </div>

                        <!-- Botões customizados -->
                        <div class="d-flex justify-content-center mt-2 mb-2 gap-5">
                            <button class="btn btn-secondary btn-sm" id="customPrevBtn">Anterior</button>
                            <button class="btn btn-secondary btn-sm" id="customNextBtn">Próximo</button>
                        </div>

                        <!-- Controles de navegação do carrossel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div style="margin-bottom: 130px"></div>

</x-site.header>
