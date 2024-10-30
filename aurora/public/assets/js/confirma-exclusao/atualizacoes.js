(() => {

    $('.excluir-atualizacao').on('submit', function(e){
        e.preventDefault();

        Swal.fire({
            title: "Atenção",
            text: "Deseja remover esta atualização?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "SIM",
            cancelButtonText: "NÃO"
          }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
          });
    })

})();