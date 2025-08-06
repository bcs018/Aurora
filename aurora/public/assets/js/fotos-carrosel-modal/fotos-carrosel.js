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


        /**
         * Retira os botões padrão de next e prev do carrossel e add novos botões quando é vídeo
         */
        const carouselEl = document.getElementById('carouselExampleIndicators');
        const prevBtn = carouselEl.querySelector('.carousel-control-prev');
        const nextBtn = carouselEl.querySelector('.carousel-control-next');

        const prevBtnAux = carouselEl.querySelector('#customPrevBtn');
        const nextBtnAux = carouselEl.querySelector('#customNextBtn');

        function updateControlsVisibility() {
            const activeItem = carouselEl.querySelector('.carousel-item.active');
            const isVideo = activeItem.querySelector('video') !== null;

            if (isVideo) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';

                prevBtnAux.style.display = '';
                nextBtnAux.style.display = '';
            } else {
                prevBtn.style.display = '';
                nextBtn.style.display = '';

                prevBtnAux.style.display = 'none';
                nextBtnAux.style.display = 'none';
            }
        }

        // Atualiza visibilidade sempre que o carrossel muda de slide
        carouselEl.addEventListener('slid.bs.carousel', updateControlsVisibility);

        // Evento de clique nas mídias
        document.querySelectorAll('.album-img').forEach((el) => {
            el.addEventListener('click', function () {
                const slideIndex = this.getAttribute('data-index');
                carousel.to(slideIndex);
                // aguarda o modal abrir e atualiza a visibilidade
                setTimeout(updateControlsVisibility, 500);
            });
        });

        // Resetar carrossel ao fechar
        carouselModal.addEventListener('hidden.bs.modal', function () {
            carousel.to(0);
        });

        // Botões personalizados
        document.getElementById('customPrevBtn').addEventListener('click', () => {
            carousel.prev();
        });

        document.getElementById('customNextBtn').addEventListener('click', () => {
            carousel.next();
        });
    });
})();