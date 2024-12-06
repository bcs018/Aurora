$(()=>{
    $("#cadastrar-livros-form").on('submit', function(e){
        e.preventDefault();

        $("#cadastrar-livros").addClass("visually-hidden");
        $("#cadastrar-livros-loading").removeClass("visually-hidden");

        $(this).off('submit').submit();
    })

    $("#editar-livros-form").on('submit', function(e){
        e.preventDefault();

        $("#editar-livros").addClass("visually-hidden");
        $("#editar-livros-loading").removeClass("visually-hidden");

        $(this).off('submit').submit();
    })
})()