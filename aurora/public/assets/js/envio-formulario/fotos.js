$(()=>{
    $("#cadastrar-fotos-form").on('submit', function(e){
        e.preventDefault();

        $("#cadastrar-fotos").addClass("visually-hidden");
        $("#cadastrar-fotos-loading").removeClass("visually-hidden");

        $(this).off('submit').submit();
    })

    $("#editar-fotos-form").on('submit', function(e){
        e.preventDefault();

        $("#editar-fotos").addClass("visually-hidden");
        $("#editar-fotos-loading").removeClass("visually-hidden");

        $(this).off('submit').submit();
    })
})()