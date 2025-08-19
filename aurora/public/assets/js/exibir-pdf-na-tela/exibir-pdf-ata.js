$(() => {
    var url = $("#ata").val();

    var { pdfjsLib } = globalThis;
    pdfjsLib.GlobalWorkerOptions.workerSrc = "/assets/js/pdfjs/pdf.worker.js";

    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        canvas = document.getElementById('the-canvas-ata'),
        ctx = canvas.getContext('2d');

    function renderPage(num) {
    pageRendering = true;

    pdfDoc.getPage(num).then(function(page) {
        var viewport = page.getViewport({ scale: 1 });

        // largura desejada: 95% da tela ou no máximo 900px
        var screenWidth = Math.min(window.innerWidth * 0.95, 900); 

        // escala para caber na tela
        var scaleFactor = screenWidth / viewport.width;
        var scaledViewport = page.getViewport({ scale: scaleFactor });

        // densidade de pixels do dispositivo
        var outputScale = window.devicePixelRatio || 1;

        // canvas interno (alta resolução)
        canvas.width = Math.floor(scaledViewport.width * outputScale);
        canvas.height = Math.floor(scaledViewport.height * outputScale);

        // canvas visual (CSS)
        canvas.style.width = `${scaledViewport.width}px`;
        canvas.style.height = `${scaledViewport.height}px`;

        var renderContext = {
            canvasContext: ctx,
            viewport: scaledViewport,
            transform: outputScale !== 1 ? [outputScale, 0, 0, outputScale, 0, 0] : null
        };

        var renderTask = page.render(renderContext);

        renderTask.promise.then(function() {
            pageRendering = false;
            if (pageNumPending !== null) {
                renderPage(pageNumPending);
                pageNumPending = null;
            }
        });
    });

    document.getElementById('page_num_ata').textContent = num;
}


    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    }

    function onPrevPage() {
        if (pageNum <= 1) return;
        pageNum--;
        queueRenderPage(pageNum);
    }
    document.getElementById('prev-ata').addEventListener('click', onPrevPage);

    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        queueRenderPage(pageNum);
    }
    document.getElementById('next-ata').addEventListener('click', onNextPage);

    pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page_count_ata').textContent = pdfDoc.numPages;
        renderPage(pageNum);
    });
});





