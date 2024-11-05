$(async ()=>{
    $('#select2').select2();

    var titulo = '';
    var texto = '';
    var titulo = '';

    getTipo();

    $("#select-tipo").change(function(){
        getTipo();
    })

    $("#titulo-atu").change(function(){
        $("#num-atu").html($("#titulo-atu").val());

        titulo = $("#titulo-atu").val();

        console.log("qw")

        getTipo();
    })

    function getTipo()
    {
        if (textoSelecionado == 'ACBD' || textoSelecionado == 'AVERIS')
        {
            texto  = 'Atualizar somente após PPRO- <br><br>'
                   + saudacao
                   + '<br><br>Estamos enviando o ACBD'+titulo+'-NE.ZIP, contendo: '
                   + '<br>'
                   + '<ul><li></li></ul>'
                   + 'Ref.RA       <br><br>'
                   + 'Solicitante: <br><br>'
                   + 'Ref. Email:  <br><br>'
                   + 'Descrição:   <br><br>'
                   + 'Atenciosamente';
        }
        else if (textoSelecionado == 'PPRO')
        {
            texto  = saudacao
                   + '<br><br>Estamos enviando o PPRO-'+titulo+'</span>'
                   + '<br><br>Favor verificar os documentos PDFs'
                   + '<br><br>'
                   + 'Atenção:<br>'
                   + 'O conteúdo do arquivo deve ser colocado na pasta /GCS/EXEC33 ou /GCS/EXECUT.<br><br>'
                   + 'Qualquer dúvida entre em contato com o nosso suporte, pelo e-mail suporte@gcs.com.br ou pelo telefone (19) 3851-6220. <br><br>'
                   + 'Atenciosamente';
        }
        else 
        {
            texto = '';
        }

        $('#summernote').summernote({
            placeholder: 'Insira o texto aqui',
            tabsize: 4,
            height: 390,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['']],
                ['insert', []],
                ['view', ['codeview']]
            ]
        });

        $('#summernote-alt').summernote({
            placeholder: 'Insira o texto aqui',
            tabsize: 4,
            height: 390,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['']],
                ['insert', []],
                ['view', ['codeview']]
            ]
        });
        $('#summernote').summernote('code', texto);

        $("#tipo-envio").html(textoSelecionado);
    }

})();