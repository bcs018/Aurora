<x-site.header title="VENERÁVEIS | {{ env('APP_NAME') }}  N° 3551">

    <!-- Conteúdo Principal -->
  <div class="content">
    <div class="container text-center">
      <h1 class="mb-4">Veneráveis</h1>
      <p class="lead">
        Conheça nossos Veneráveis que fazem parte da nossa loja.
      </p>
    </div>

    <div class="p-5"></div>

    <div class="container mt-5">
      <div class="row row-cols-1 row-cols-md-3 g-4">

        @forelse ($veneraveis as $veneravel)
            <div class="col">
                <div class="card text-center p-4 mb-5">
                <img
                    src="{{asset('storage/'.$veneravel->diretorio)}}"
                    alt="Integrante 1" class="card-img-top mx-auto">
                <div class="card-body">
                    <h5 class="card-title">{{$veneravel->nome}}</h5>
                    <p class="card-text">{{$veneravel->ano_inicio}} - {{$veneravel->ano_final}}</p>
                </div>
                </div>
            </div>
        @empty
            <div class="container text-center">
                <p class="text-center">Não há Veneráveis cadastrados.</p>
            </div>
        @endforelse

      </div>
    </div>
  </div>

</x-site.header>