$(()=>{
    $("#cadastrar-fotos-form").on('submit', async function(e){
        e.preventDefault();

        const descricaoEvento = $("#descricaoEvento").val();
        const nomeEvento = $("#nomeEvento").val();
        const _token = $("[name=_token]").val();
        const fotos = document.getElementById('fotos').files;

        if (validar(descricaoEvento, nomeEvento, fotos))
            return;

        $("#cadastrar-fotos").addClass("visually-hidden");
        $("#cadastrar-fotos-loading").removeClass("visually-hidden");

        enviarFormulario(descricaoEvento, nomeEvento, fotos, _token, 'INC');
    })

    $("#editar-fotos-form").on('submit', function(e){
        e.preventDefault();

        const descricaoEvento = $("#descricaoEvento").val();
        const nomeEvento = $("#nomeEvento").val();
        const _token = $("[name=_token]").val();
        const fotos = document.getElementById('fotos').files;
        const evento_id = $("#evento_id").val();

        if (validar(descricaoEvento, nomeEvento, fotos, 'ALT'))
            return;

        $("#editar-fotos").addClass("visually-hidden");
        $("#editar-fotos-loading").removeClass("visually-hidden");

        enviarFormulario(descricaoEvento, nomeEvento, fotos, _token, 'ALT', evento_id);
    })
})()

function validar (descricaoEvento, nomeEvento, fotos, tipo='')
{
    let validacao = false;

    if (!descricaoEvento)
    {
        $("#descricaoEvento").addClass("is-invalid");
        $("#invalid-feedback-descricaoEvento").html("O campo Descrição do evento é obrigatório");
        validacao = true;
    }
    else 
    {
        $("#descricaoEvento").removeClass("is-invalid");
        $("#invalid-feedback-descricaoEvento").html("");
    }
            
    if (!nomeEvento)
    {
        $("#nomeEvento").addClass("is-invalid");
        $("#invalid-feedback-nomeEvento").html("O campo Nome do evento é obrigatório");
        validacao = true;
    }
    else 
    {
        $("#nomeEvento").removeClass("is-invalid");
        $("#invalid-feedback-nomeEvento").html("");
    }

    if (tipo != 'ALT')
    {
        if (fotos.length == 0 || !fotos)
        {
            $("#fotos").addClass("is-invalid");
            $("#invalid-feedback-fotos").html("O campo Fotos é obrigatório");
            validacao = true;
        }
        else 
        {
            $("#fotos").removeClass("is-invalid");
            $("#invalid-feedback-fotos").html("");
        }
    }

    return validacao
}

async function enviarFormulario(descricaoEvento, nomeEvento, fotos, _token, tipo, evento_id='')
{
    const formData = new FormData();
        formData.append('descricaoEvento', descricaoEvento);
        formData.append('nomeEvento', nomeEvento);
        formData.append('_token', _token);

        try {
            
            if (tipo == 'INC')
                var response = await axios.post('/painel/eventos', formData, {});
            else
            {
                var response = await axios.put('/painel/eventos/'+evento_id, {
                    descricaoEvento,
                    nomeEvento,
                    _token
                });
            }

            if (response)
            {
                const eventoId = response.data.evento_id; 
                const qtdFotos = fotos.length;
                const lote = 5; // Número de fotos por envio

                for (let i = 0; i < fotos.length; i+=lote) {
                    const formData = new FormData();

                    for (let j = i; j < i + lote && j < fotos.length; j++) {
                        formData.append('fotos[]', fotos[j]); // Use "fotos[]" para arrays
                    }
                    
                    formData.append('evento_id', eventoId);
                    formData.append('nomeEvento', nomeEvento);
                    formData.append('_token', _token);

                    try {
                        // cadastro das fotos
                        const response = await axios.post('/painel/fotos', formData, {
                            headers: { 'Content-Type': 'multipart/form-data' },
                            onUploadProgress: (progressEvent) => {
                                // $("#status").html(` Aguarde, não feche nem mude de página, fazendo upload da foto ${i + 1} de ${qtdFotos}`);
                                $("#status").html(` Aguarde, não feche nem mude de página, fazendo upload das fotos ${i + 1} a ${Math.min(i + lote, qtdFotos)} de ${qtdFotos}`);
                            },
                        });
            
                        console.log(`Image ${i + 1} uploaded successfully:`, response.data);
                    } catch (error) {
                        console.error(`Error uploading image ${i + 1}:`, error);
                    }
                }
            }

            if (tipo == 'INC')
            {
                $("#cadastrar-fotos").removeClass("visually-hidden");
                $("#cadastrar-fotos-loading").addClass("visually-hidden");
                var text = 'cadastradas';
            }
            else 
            {
                $("#editar-fotos").removeClass("visually-hidden");
                $("#editar-fotos-loading").addClass("visually-hidden");
                var text = 'alteradas';
            }

            Swal.fire({
                title: "Sucesso!",
                text: "Fotos "+text+" com sucesso!",
                icon: "success",
                confirmButtonColor: "#005284",
            }).then((result) => {
                location.reload()
            });

            console.log(`Image ${i + 1} uploaded successfully:`, response.data);
        } catch (error) {
            console.error(`Error uploading image ${i + 1}:`, error);
        }
}