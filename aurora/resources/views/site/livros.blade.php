<x-site.header title="LIVROS | {{ env('APP_NAME') }}  N° 3551">

    <div class="content">
        <div class="container text-center">
            <h1 class="mb-5">Livros</h1>
        </div>

        <section id="albuns" class="my-5 pt-5">
            <div class="container">
                <div class="row">
                    @forelse ($livros as $livro)
                    <div class="col-md-4 album-card mb-5">
                        <div class="card d-flex flex-column" style="height: 100%; border: #c9caca 1px solid;">
                            <img src="{{asset('assets/images/livro.png')}}" class="" alt="{{$livro->nome}}" style="height: 200px; object-fit: cover;">
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
                            <p class="text-center">Não há livros cadastradas.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

</x-site.header>
