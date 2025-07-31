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
        @if (!is_null($historia))
            @if ($historia->video_diretorio)
                <div class="container text-center">
                    <video controls muted style="height: 600px" width="95%">
                        <source src="{{ asset('storage/' . $historia->video_diretorio) }}" type="video/mp4">
                        Seu navegador não suporta vídeos.
                    </video>
                </div>
            @endif
            @if ($historia->ata_diretorio)
                <div class="container text-center mt-5">
                    <h2 class="mb-4">ATA</h2>
                </div>
                <div class="container text-center">
                    <img src="{{ asset('storage/' . $historia->ata_diretorio) }}" alt="Imagem ATA"  class="img-fluid" style="max-width: 300px;">
                </div>
            @endif
            @if ($historia->slide_diretorio)
                <div class="container text-center mt-5">
                    <iframe src="{{ asset('storage/' . $historia->slide_diretorio) }}" style="height: 600px" width="95%"></iframe>
                </div>
            @endif
        @endif

        <div class="p-4"></div>

        <!-- Cards de Integrantes -->
    </div>
</x-site.header>
