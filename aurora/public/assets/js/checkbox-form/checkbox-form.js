$(()=>{

    verificarValorUsuarios();

    $('#administradorUsuario').on('click', function(){
        verificarValorUsuarios();
    })
    
    function verificarValorUsuarios()
    {
        if ($('#administradorUsuario').is(':checked'))
            $('#administradorUsuario').val(1);
        else 
            $('#administradorUsuario').val(0);
    }
})()
