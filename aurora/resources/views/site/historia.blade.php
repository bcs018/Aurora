<x-site.header title="HISTÓRIA | {{ env('APP_NAME') }}  N° 3551">

    <!-- Conteúdo Principal -->
    <div class="content">
        <div class="container text-center">
            <h1 class="mb-4">Nossa História</h1>
        </div>

        <div class="container text-center">
            <iframe 
                style="width: 95%; height: auto; aspect-ratio: 16 / 9; justify-content:center;"
                src="https://www.youtube.com/embed/SkvhXDBxjpI?rel=0" 
                title="Vídeo do YouTube" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
        
        <div class="p-5 ">
            <p class="lead text-justify">
                {!!$texto!!}
            </p>
        </div>

        <div class="p-4"></div>

        <!-- Cards de Integrantes -->
    </div>

</x-site.header>
