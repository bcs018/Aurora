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
                    @endif
                @empty
                    <div>
                        <p class="text-center">Não há fotos para esse evento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container">
            <h1 class="text-center mb-4">Vídeos</h1>
            <div class="row">
                @forelse ($fotos as $index => $foto)
                    @php
                        $ext = strtolower(pathinfo($foto->diretorio, PATHINFO_EXTENSION))
                    @endphp

                    @if(in_array($ext, ['mp4', 'webm', 'mov'])) 
                        <div class="col-md-4 album-card mb-2">
                            <div data-bs-toggle="modal" data-bs-target="#videoModal" data-index="{{ $index }}" data-video-ext={{$ext}} data-video-url="{{ asset('storage/' . $foto->diretorio) }}">
                                <video class="album-img"  controls muted>
                                    <source src="{{ asset('storage/' . $foto->diretorio) }}" type="video/{{ $ext }}">
                                    Seu navegador não suporta vídeos.
                                </video>
                            </div>
                        </div>
                    @endif
                @empty
                    <div>
                        <p class="text-center">Não há vídeos para esse evento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Modal com Carrossel -->
    <div class="modal fade" id="carouselModal" tabindex="-1" aria-labelledby="carouselModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            
                            @foreach ($fotos as $index => $foto)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $foto->diretorio) }}" class="d-block w-100 img-fluid" alt="{{ $foto->nome }}">
                                </div>
                            @endforeach

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

    <!-- Modal para videos -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark">
            <div class="modal-body p-0">
                <video id="modalVideoPlayer" class="w-100" controls autoplay>
                    <source src="" type="">
                    Seu navegador não suporta a reprodução de vídeo.
                </video>
            </div>
            </div>
        </div>
    </div>
    
    <div style="margin-bottom: 130px"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const videoModal = document.getElementById('videoModal');
            const videoPlayer = document.getElementById('modalVideoPlayer');

            videoModal.addEventListener('show.bs.modal', function (event) {
                const triggerElement = event.relatedTarget;
                const videoUrl = triggerElement.getAttribute('data-video-url');
                const videoExt = triggerElement.getAttribute('data-video-ext');

                if (videoUrl) {
                    videoPlayer.querySelector('source').src = videoUrl;
                    videoPlayer.querySelector('source').type = 'video/'+videoExt;
                    videoPlayer.load(); // atualiza o vídeo
                    videoPlayer.play();
                }
            });

            videoModal.addEventListener('hidden.bs.modal', function () {
                videoPlayer.pause();
                videoPlayer.currentTime = 0;
            });
        });
    </script>

</x-site.header>
