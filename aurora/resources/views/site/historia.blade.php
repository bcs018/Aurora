<x-site.header title="HISTÓRIA | {{ env('APP_NAME') }}  N° 3551">

    <!-- Conteúdo Principal -->
    <div class="content">
        <div class="container text-center">
            <h1 class="mb-4">Nossa História</h1>
        </div>
        <div class="p-5 ">
            <p class="lead text-justify">
                @if (!is_null($historia))
                    {!!$historia->conteudo!!}
                @endif
            </p>
    </div>

    <div>
        @if (!is_null($historia))
            @if ($historia->video_diretorio && trim($historia->video_diretorio) != '')
                <div class="container text-center">
                    <video controls muted style="height: 600px" width="95%">
                        <source src="{{ asset('storage/' . $historia->video_diretorio) }}" type="video/mp4">
                        Seu navegador não suporta vídeos.
                    </video>
                </div>
            @endif
            @if ($historia->ata_diretorio && trim($historia->ata_diretorio) != '')
                <div class="container text-center mt-5">
                    <h2 class="mb-4">ATA</h2>
                </div>
                <div class="container text-center">
                    <div class="container mt-5">
                        <div class="d-flex justify-content-center">
                            <canvas id="the-canvas-ata"></canvas>
                            <input type="hidden" id="ata" value="{{ asset('storage/' . $historia->ata_diretorio) }}">
                        </div>
                    </div>

                    <div class="controls align-items-center mt-3">
                        <button id="prev-ata" class="btn btn-outline-primary btn-sm m-3">⬅️ Anterior</button>
                        <span>Página: <span id="page_num_ata"></span> / <span id="page_count_ata"></span></span>
                        <button id="next-ata" class="btn btn-outline-primary btn-sm m-3">Próxima ➡️</button>
                    </div>
                </div>
            @endif
            @if ($historia->slide_diretorio && trim($historia->slide_diretorio) != '')
                <div class="container text-center mt-5">
                    {{-- <iframe src="{{ asset('storage/' . $historia->slide_diretorio) }}" style="height: 600px" width="95%"></iframe> --}}
                    <input type="hidden" id="slide" value="{{ asset('storage/' . $historia->slide_diretorio) }}">

                    <div class="container mt-5">
                        <div class="d-flex justify-content-center">
                            <canvas id="the-canvas-slide"></canvas>
                            <input type="hidden" id="ata" value="{{ asset('storage/' . $historia->slide_diretorio) }}">
                        </div>
                    </div>

                    <div class="controls align-items-center mt-3">
                        <button id="prev-slide" class="btn btn-outline-primary btn-sm m-3">⬅️ Anterior</button>
                        <span>Página: <span id="page_num_slide"></span> / <span id="page_count_slide"></span></span>
                        <button id="next-slide" class="btn btn-outline-primary btn-sm m-3">Próxima ➡️</button>
                    </div>

                </div>
            @endif
        @endif

        <div class="p-4"></div>
    </div>
</x-site.header>
