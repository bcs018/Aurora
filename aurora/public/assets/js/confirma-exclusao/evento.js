(() => {

    $('.excluir-evento').on('submit', function(e){
        e.preventDefault();

        Swal.fire({
            title: "Atenção",
            text: "Deseja remover este evento? Ao remover este evento todas as fotos serão excluídas",
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