<x-painel.header title="AGENDA | {{env('APP_NAME')}}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Agenda</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="text-right mb-5">
                <a href="{{route('agenda.create')}}" class="btn btn-success">Cadastrar agenda</a>
            </div>
            <div class="table-responsive">
                <table id="tableAgenda" class="display">
                    <thead>
                    <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Reunião às 19h</td>
                            <td>05/11/2024</td>
                            <td>
                                <a href="" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-pencil me-3"></i>
                                </a> 

                                <form action="" class="excluir-agenda" method="post" style="all: unset !important">

                                    <button class="btn p-0" type="submit" style="color: #005284">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>Confraternização as 19h</td>
                            <td>21/12/2024</td>
                            <td>
                                <a href="" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-pencil me-3"></i>
                                </a> 

                                <form action="" class="excluir-agenda" method="post" style="all: unset !important">

                                    <button class="btn p-0" type="submit" style="color: #005284">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>Reunião as 19h</td>
                            <td>25/01/2025</td>
                            <td>
                                <a href="" class="text-decoration-none" style="color: #005284">
                                    <i class="fa-solid fa-pencil me-3"></i>
                                </a> 

                                <form action="" class="excluir-agenda" method="post" style="all: unset !important">

                                    <button class="btn p-0" type="submit" style="color: #005284">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</x-painel.header>