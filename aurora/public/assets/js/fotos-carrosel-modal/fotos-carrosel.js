(() => {
    document.addEventListener('DOMContentLoaded', function() {
        const carouselModal = document.getElementById('carouselModal');
        const carousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'));

        // Atribuir evento de clique em cada imagem
        document.querySelectorAll('.album-img').forEach((img, index) => {
            img.addEventListener('click', function() {
                const slideIndex = this.getAttribute('data-index');
                carousel.to(slideIndex); // Definir a imagem inicial no carrossel
            });
        });

        // Resetar o carrossel para a primeira imagem ao fechar o modal
        carouselModal.addEventListener('hidden.bs.modal', function() {
            carousel.to(0);
        });
    });
})();