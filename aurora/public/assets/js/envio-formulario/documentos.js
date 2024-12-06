$(()=>{
    $("#cadastrar-documentos-form").on('submit', function(e){
        e.preventDefault();

        $("#cadastrar-documentos").addClass("visually-hidden");
        $("#cadastrar-documentos-loading").removeClass("visually-hidden");

        $(this).off('submit').submit();
    })

    $("#editar-documentos-form").on('submit', function(e){
        e.preventDefault();

        $("#editar-documentos").addClass("visually-hidden");
        $("#editar-documentos-loading").removeClass("visually-hidden");

        $(this).off('submit').submit();
    })
})()