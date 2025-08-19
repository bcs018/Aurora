$(() => {
    var url = $("#slide").val();

    var { pdfjsLib } = globalThis;
    pdfjsLib.GlobalWorkerOptions.workerSrc = "/assets/js/pdfjs/pdf.worker.js";

    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        canvas = document.getElementById('the-canvas-slide'),
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

    document.getElementById('page_num_slide').textContent = num;
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
    document.getElementById('prev-slide').addEventListener('click', onPrevPage);

    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        queueRenderPage(pageNum);
    }
    document.getElementById('next-slide').addEventListener('click', onNextPage);

    pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page_count_slide').textContent = pdfDoc.numPages;
        renderPage(pageNum);
    });
});

















// $(()=>{
//     var url = $("#slide").val();

//     // Loaded via <script> tag, create shortcut to access PDF.js exports.
//     var { pdfjsLib } = globalThis;

//     // The workerSrc property shall be specified.
//     pdfjsLib.GlobalWorkerOptions.workerSrc = "/assets/js/pdfjs/pdf.worker.js";

//     var pdfDoc = null,
//         pageNum = 1,
//         pageRendering = false,
//         pageNumPending = null,
//         scale = 1.5,
//         canvas = document.getElementById('the-canvas-slide'),
//         ctx = canvas.getContext('2d');

//     /**
//      * Get page info from document, resize canvas accordingly, and render page.
//      * @param num Page number.
//      */
//     function renderPage(num) {
//         pageRendering = true;
//         // Using promise to fetch the page
//         pdfDoc.getPage(num).then(function(page) {
//         var viewport = page.getViewport({scale: scale});
//         canvas.height = viewport.height;
//         canvas.width = viewport.width;

//         // Render PDF page into canvas context
//         var renderContext = {
//             canvasContext: ctx,
//             viewport: viewport
//         };
//         var renderTask = page.render(renderContext);

//         // Wait for rendering to finish
//         renderTask.promise.then(function() {
//             pageRendering = false;
//             if (pageNumPending !== null) {
//             // New page rendering is pending
//             renderPage(pageNumPending);
//             pageNumPending = null;
//             }
//         });
//         });

//         // Update page counters
//         document.getElementById('page_num_slide').textContent = num;
//     }

//     /**
//      * If another page rendering in progress, waits until the rendering is
//      * finised. Otherwise, executes rendering immediately.
//      */
//     function queueRenderPage(num) {
//         if (pageRendering) {
//         pageNumPending = num;
//         } else {
//         renderPage(num);
//         }
//     }

//     /**
//      * Displays previous page.
//      */
//     function onPrevPage() {
//         if (pageNum <= 1) {
//         return;
//         }
//         pageNum--;
//         queueRenderPage(pageNum);
//     }
//     document.getElementById('prev-slide').addEventListener('click', onPrevPage);

//     /**
//      * Displays next page.
//      */
//     function onNextPage() {
//         if (pageNum >= pdfDoc.numPages) {
//         return;
//         }
//         pageNum++;
//         queueRenderPage(pageNum);
//     }
//     document.getElementById('next-slide').addEventListener('click', onNextPage);

//     /**
//      * Asynchronously downloads PDF.
//      */
//     pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
//         pdfDoc = pdfDoc_;
//         document.getElementById('page_count_slide').textContent = pdfDoc.numPages;

//         // Initial/first page rendering
//         renderPage(pageNum);
//     });
// })()