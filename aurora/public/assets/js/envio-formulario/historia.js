$(()=>{
    $("#cadastrar-historia-form").on('submit', function(e){
        e.preventDefault();

        $("#cadastrar-historia").addClass("visually-hidden");
        $("#cadastrar-historia-loading").removeClass("visually-hidden");

        $(this).off('submit').submit();
    })

    $("#editar-historia-form").on('submit', function(e){
        e.preventDefault();

        $("#editar-historia").addClass("visually-hidden");
        $("#editar-historia-loading").removeClass("visually-hidden");

        $(this).off('submit').submit();
    })
})()