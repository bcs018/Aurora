$(()=>{
    const token = document.getElementById('app_token').dataset.token;

    const r = new Resumable({
        target: '/painel/store-video',
        query: () => ({
            _token: token,
            descricaoHistoria: document.getElementById('summernote').value,
        }),
        fileType: ['mp4'],
        chunkSize: 5 * 1024 * 1024,
        simultaneousUploads: 1,
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    r.assignBrowse(document.getElementById('dropArea'));

    r.on('fileAdded', function(file) {
        document.getElementById('nomeVideo').innerText = "Arquivo selecionado: " + file.fileName;
    });

    r.on('fileProgress', function(file) {
        const percent = Math.floor(file.progress() * 100);
        $("#cadastrar-historia").addClass("visually-hidden");
        $("#cadastrar-historia-loading").removeClass("visually-hidden");
        document.getElementById('mensagemStatus').innerText = `Aguarde, não feche nem mude de página, Progresso: ${percent}%`;

        // Atualiza a barra no Swal
        document.getElementById('progress-bar').style.width = percent + '%';
        document.getElementById('progress-text').textContent = percent + '%';
    });

    r.on('fileSuccess', function(file, response) {
        document.getElementById('mensagemStatus').innerText = "Vídeo enviado com sucesso! Enviando arquivos restantes...";

        enviarArquivos();
    });

    r.on('fileError', function(file, message) {
        alert("Erro no upload: " + message);
    });

    // Evento de clique para cadastrar
    document.getElementById('cadastrar-historia').addEventListener('click', (e) => {
        e.preventDefault(); // Evita o form.submit

         // Exibe na tela a barra de carregamento
        Swal.fire({
            title: 'Enviando...',
            html: `
                <div style="width: 100%; background: #eee; border-radius: 4px;">
                    <div id="progress-bar" style="width: 0%; height: 20px; background: #4caf50; border-radius: 4px;"></div>
                </div>
                <p id="progress-text">0%</p>
                <p id="progress-text-arquivos"></p>
            `,
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {}
        });

        if (r.files.length === 0) 
        {
            $("#cadastrar-historia").addClass("visually-hidden");
            $("#cadastrar-historia-loading").removeClass("visually-hidden");

            enviarArquivos()
        } 
        else 
        {
            r.upload();
        }
    });

    // Envia somente a ATA, PDF e Texto
    function enviarArquivos ()
    {
        document.getElementById('mensagemStatus').innerText = "Enviando arquivos restantes, aguarde!";
        document.getElementById('progress-text-arquivos').innerText = "Enviando arquivos restantes, aguarde!";

        const formData = new FormData();

        const imgAta = document.getElementById('imgAta')
        const slide = document.getElementById('slide')
        var descricaoHistoria = document.getElementById('summernote').value;

        if (imgAta && imgAta.files.length > 0) 
            formData.append('imgAta', imgAta.files[0]);

        if (slide && slide.files.length > 0) 
            formData.append('slide', slide.files[0]);

        if (descricaoHistoria.trim() == "") 
            descricaoHistoria = ' '

        formData.append('descricaoHistoria', descricaoHistoria);

        fetch('/painel/historia', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('uploadStatus').innerText = "Todos os arquivos foram enviados com sucesso!";

            Swal.fire({
                title: "Atenção",
                text: "Todos os arquivos foram enviados com sucesso!",
                icon: "success",
                confirmButtonColor: "#3085d6",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload(true)
                }
            });
            console.log(data);
        })
        .catch(err => {
            document.getElementById('uploadStatus').innerText = "Erro ao enviar os arquivos adicionais.";
        });
    }
})()