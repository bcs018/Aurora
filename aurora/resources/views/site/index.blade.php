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
            Aqui será informado no painel de controle uma breve descrição, como um pouco da história, endereço contato
            etc...
        </p>
        <p class="text-center">
            Poderá colocar qualquer coisa
        </p>
        </div>
    </div>

    <!-- Seção de Documentos -->
    <section id="albuns" class="my-5">
        <div class="container text-center">
        <h2 class="text-center mb-4">Documentos</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 album-card mb-2">
            <div class="card d-flex flex-column" style="height: 100%;">
                <img src="https://static.vecteezy.com/system/resources/previews/017/395/386/non_2x/google-document-icon-free-png.png" class="" alt="Álbum 1" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column" style="flex: 1;">
                <h5 class="card-title">Documentos teste 1</h5>
                <div class="mt-3">
                    <a href="https://jucisrs.rs.gov.br/upload/arquivos/201710/30150625-criacao-de-pdf-a.pdf" target="_blank" class="btn btn-dark">Ver documento</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4 album-card mb-2">
            <div class="card d-flex flex-column" style="height: 100%;">
                <img src="https://static.vecteezy.com/system/resources/previews/017/395/386/non_2x/google-document-icon-free-png.png" class="" alt="Álbum 2" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column" style="flex: 1;">
                <h5 class="card-title">Documentos teste 2</h5>
                <div class="mt-3">
                    <a href="https://jucisrs.rs.gov.br/upload/arquivos/201710/30150625-criacao-de-pdf-a.pdf" target="_blank" class="btn btn-dark">Ver documento</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <hr>

    <!-- Seção de Álbuns -->
    <section id="albuns" class="my-5">
        <div class="container text-center">
        <h2 class="text-center mb-4">Eventos</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 album-card mb-2">
            <div class="card d-flex flex-column" style="height: 100%;">
                <img src="https://images.squarespace-cdn.com/content/v1/5db9a570d2e92960a6db994f/2caa3c25-c67c-43af-8374-16ca4115db2d/DMS_1644.jpg" class="" alt="Álbum 1" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column" style="flex: 1;">
                <h5 class="card-title">Evento 1</h5>
                <p class="card-text">Uma breve descrição do evento 1.</p>
                <div class="mt-auto">
                    <a href="album1.html" class="btn btn-dark">Ver fotos</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4 album-card mb-2">
            <div class="card d-flex flex-column" style="height: 100%;">
                <img src="https://babyherois.com.br/wp-content/uploads/2019/07/2019-08-o-que-nao-pode-faltar-em-uma-festa-no-sitio-802x506-1.jpg" class="" alt="Álbum 2" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column" style="flex: 1;">
                <h5 class="card-title">Evento 2</h5>
                <p class="card-text">Descrição do evento 2.</p>
                <div class="mt-auto">
                    <a href="album2.html" class="btn btn-dark">Ver fotos</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4 album-card mb-2">
            <div class="card d-flex flex-column" style="height: 100%;">
                <img src="https://laranjeiras.camporeal.edu.br/content/uploads/2024/03/342368802_611007210910013_5727294774046424249_n.jpg" class="" alt="Álbum 3" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column" style="flex: 1;">
                <h5 class="card-title">Evento 3</h5>
                <p class="card-text">Esta é uma descrição um pouco mais longa do Evento 3.</p>
                <div class="mt-auto">
                    <a href="album3.html" class="btn btn-dark">Ver fotos</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

</x-site.header>