<x-painel.header title="PÁGINA HISTÓRIA | {{env('APP_NAME')}}">
    <script src="https://cdn.jsdelivr.net/npm/resumablejs/resumable.js"></script>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center mb-3">
                    <h1>Página história</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Insira os dados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('historia.store')}}" method="POST" enctype="multipart/form-data" id="cadastrar-historia-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <div class="input-group mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="summernote" name="descricaoHistoria" style="height: 100px">
                                                {{$texto}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div style="color: #dc3545">{{ $errors->first('descricaoHistoria') }} </div>
                            </div>

                            

                            <div id="dropArea">Arraste o vídeo aqui ou clique para selecionar</div>

                            <div class="col-md-12">
                                <label>Selecione a imagem da ATA</label>
                                <div class="input-group">
                                    <input type="file" class="form-control {{ $errors->has('imgAta') ? 'is-invalid' : '' }}" id="imgAta" name="imgAta" accept="image/jpeg, image/jpg, image/png, image/gif">
                                    <div id="invalid-feedback-imgAta" class="invalid-feedback">{{ $errors->first('imgAta') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-5">
                                    <strong>DICA: </strong>Para substituir o ATA, basta inserir o novo arquivo. A ATA atual será automaticamente removido e a nova ficará visível.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Selecione o PDF do slide</label>
                                <div class="input-group">
                                    <input type="file" class="form-control {{ $errors->has('slide') ? 'is-invalid' : '' }}" id="slide" name="slide" accept="application/pdf" >
                                    <div id="invalid-feedback-slide" class="invalid-feedback">{{ $errors->first('slide') }} </div>
                                </div>
                                <div id="arquivosHelp" class="form-text mb-3">
                                    <strong>DICA: </strong>Para substituir o slide, basta inserir o novo arquivo. O slide atual será automaticamente removido e a nova ficará visível.
                                </div>
                                <div id="arquivosHelp" class="form-text mb-2">
                                    <strong>ATENÇÃO: </strong>Como vídeos possuem maior tamanho, o upload pode ser mais lento. Não feche ou atualize a página até que o envio seja concluído.
                                </div>
                            </div>
                        </div>

                        <div id="uploadStatus"></div>

                        <button class="btn btn-success mt-3" id="cadastrar-historia">Cadastrar</button>
                        <button class="btn btn-success mt-3 visually-hidden" type="button" disabled id="cadastrar-historia-loading">
                            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                            <span role="status">Aguarde, não feche nem mude de página, o processo pode demorar um pouco...</span>
                        </button>
                    </form>

                     {{-- <button id="uploadBtn">Enviar</button> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('historia.saveVideo')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="col-md-12 mt-4">
                            <label>Selecione o vídeo a ser mostrado na página história (Formato MP4 e tamanho máximo 1GB)</label>
                            <div class="input-group ">
                                <input type="file" class="form-control {{ $errors->has('videoHistoria') ? 'is-invalid' : '' }}" id="videoHistoria" name="videoHistoria" accept="video/*" >
                                <div id="invalid-feedback-videoHistoria" class="invalid-feedback">{{ $errors->first('videoHistoria') }} </div>
                            </div>
                            <div id="arquivosHelp" class="form-text mb-5">
                                <strong>DICA: </strong>Para substituir o vídeo, basta inserir o novo arquivo. O vídeo atual será automaticamente removido e o novo ficará visível.
                            </div>
                        </div>
                        <button class="btn btn-success mt-3" id="cadastrar-historia2">Cadastrar</button>
                        <button class="btn btn-success mt-3 visually-hidden" type="button" disabled id="cadastrar-historia-loading2">
                            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                            <span role="status">Aguarde, não feche nem mude de página, o processo pode demorar um pouco...</span>
                        </button>
                    </form>
                </div>
                <div id="uploadStatus"></div>
        </div>
    </section>

    <script>
       document.getElementById('videoHistoria').addEventListener('change', function () {
            const fileInput = this;
            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                const label = document.createElement('div');
                label.className = 'mt-2 text-primary';
                label.textContent = 'Arquivo selecionado: ' + fileName;

                // Remove antigo, se tiver
                const oldLabel = document.getElementById('fileNameLabel');
                if (oldLabel) oldLabel.remove();

                label.id = 'fileNameLabel';
                fileInput.parentNode.appendChild(label);
            }
        });
        
        const r = new Resumable({
            target: '/painel/store-video',
            query: () => ({
            _token: '{{ csrf_token() }}',
            descricaoHistoria: document.getElementById('summernote').value,
            }),
            fileType: ['mp4'],
            chunkSize: 5 * 1024 * 1024,
            simultaneousUploads: 1,
            testChunks: false,
            throttleProgressCallbacks: 1,
        });

        // r.assignBrowse(document.getElementById('dropArea'));
        // r.assignDrop(document.getElementById('dropArea'));

        r.assignBrowse(document.getElementById('videoHistoria'));

        // r.on('fileAdded', function(file) {
        //     document.getElementById('uploadStatus').innerText = "Enviando vídeo...";
        //     r.upload();
        // });

        r.on('fileProgress', function(file) {
            const percent = Math.floor(file.progress() * 100);
            $("#cadastrar-historia2").addClass("visually-hidden");
            $("#cadastrar-historia-loading2").removeClass("visually-hidden");
            document.getElementById('cadastrar-historia-loading2').innerText = `Aguarde, não feche nem mude de página, Progresso: ${percent}%`;
        });

        // r.on('fileSuccess', function(file, response) {
        //     document.getElementById('uploadStatus').innerText = "Vídeo enviado com sucesso! Enviando arquivos restantes...";

        //     const formData = new FormData();
        //     formData.append('imgAta', document.getElementById('imgAta').files[0]);
        //     formData.append('slide', document.getElementById('slide').files[0]);
        //     formData.append('descricaoHistoria', document.getElementById('summernote').value);

        //     fetch('/painel/historia', {
        //     method: 'POST',
        //     headers: {
        //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //     },
        //     body: formData
        //     })
        //     .then(res => res.json())
        //     .then(data => {
        //     document.getElementById('uploadStatus').innerText = "Todos os arquivos foram enviados com sucesso!";
        //     console.log(data);
        //     })
        //     .catch(err => {
        //     document.getElementById('uploadStatus').innerText = "Erro ao enviar os arquivos adicionais.";
        //     });
        // });

        r.on('fileError', function(file, message) {
            alert("Erro no upload: " + message);
        });

        

        document.getElementById('cadastrar-historia2').addEventListener('click', (e) => {
            console.log('aprtei')

            e.preventDefault(); // Evita o form.submit
            if (r.files.length === 0) {
            alert("Por favor, selecione o vídeo.");
            } else {
            r.upload();
            }
        });
    </script>

</x-painel.header>