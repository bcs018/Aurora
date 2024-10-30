$(()=>{

    verificarValorCadastroEmpresa();
    verificarValorCadastroUsusariosEmpresa();
    verificarValorCadastroAdmin();

    $('#form-cadastro-empresa #eneml-emp').on('click', function(){
        verificarValorCadastroEmpresa();
    })

    $('#form-cadastro-empresa #ativo-emp').on('click', function(){
        verificarValorCadastroEmpresa();
    })
    
    $('#form-cadastro-usuarios-empresa #ativo-usu').on('click', function(){
        verificarValorCadastroUsusariosEmpresa();
    })

    $('#form-cadastro-admin #ativo-adm').on('click', function(){
        verificarValorCadastroAdmin();
    })

    $('#form-cadastro-admin #super-adm').on('click', function(){
        verificarValorCadastroAdmin();
    })

    function verificarValorCadastroEmpresa()
    {
        if ($('#form-cadastro-empresa #ativo-emp').is(':checked'))
            $('#form-cadastro-empresa #ativo-emp').val(1);
        else 
            $('#form-cadastro-empresa #ativo-emp').val(0);

        if ($('#form-cadastro-empresa #eneml-emp').is(':checked'))
            $('#form-cadastro-empresa #eneml-emp').val(1);
        else 
            $('#form-cadastro-empresa #eneml-emp').val(0);
    }

    function verificarValorCadastroUsusariosEmpresa()
    {
        if ($('#form-cadastro-usuarios-empresa #ativo-usu').is(':checked'))
            $('#form-cadastro-usuarios-empresa #ativo-usu').val(1);
        else 
            $('#form-cadastro-usuarios-empresa #ativo-usu').val(0);
    }

    function verificarValorCadastroAdmin()
    {
        if ($('#form-cadastro-admin #ativo-adm').is(':checked'))
            $('#form-cadastro-admin #ativo-adm').val(1);
        else 
            $('#form-cadastro-admin #ativo-adm').val(0);

        if ($('#form-cadastro-admin #super-adm').is(':checked'))
            $('#form-cadastro-admin #super-adm').val(1);
        else 
            $('#form-cadastro-admin #super-adm').val(0);
    }
})()
