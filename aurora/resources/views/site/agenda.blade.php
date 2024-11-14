<x-site.header title="AGENDA | {{ env('APP_NAME') }}  N° 3551">

    <div class="content">
        <div class="container mb-5">
          <h1 class="text-center mb-5">Agenda de Eventos</h1>
    
          <ul class="list-group">
                @forelse ($agendas as $agenda)
                    <li class="list-group-item">
                        <strong>Data: {{date('d/m/Y', strtotime($agenda->data))}}</strong>
                        <ul>
                            <li>{{$agenda->descricao}}</li>
                        </ul>
                    </li>
                @empty
                    <div>
                        <p class="text-center">Não há agendas cadastradas.</p>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>

</x-site.header>