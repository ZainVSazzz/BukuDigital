<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $myBook->book->title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.0.379/pdf_viewer.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full">
<div class="container mx-auto">
    <div class="flex justify-center items-center my-3">
        <div class="join">
            <button class="join-item btn btn-prev">«</button>
            <button class="join-item btn">
                Page <span class="page_num"></span> / <span class="page_count"></span>
            </button>
            <button class="join-item btn btn-next">»</button>
        </div>
    </div>
    <div class="flex justify-center items-center">
        <canvas id="the-canvas"></canvas>
    </div>
    <div class="flex justify-center items-center my-3">
        <div class="join">
            <button class="join-item btn btn-prev">«</button>
            <button class="join-item btn">
                Page <span class="page_num"></span> / <span class="page_count"></span>
            </button>
            <button class="join-item btn btn-next">»</button>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
    // Disable Canvas Image Downloading
    document.addEventListener('contextmenu', event => event.preventDefault());

    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    let url = "{{ route('my-book.file', [$myBook->id, Str::random(8)]) }}"; // your file location and file name with ext.


    // Loaded via <script> tag, create shortcut to access PDF.js exports.
    var pdfjsLib = window['pdfjs-dist/build/pdf'];

    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 2,
        canvas = document.getElementById('the-canvas'),
        ctx = canvas.getContext('2d');

    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport({scale: scale});
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);

            // Wait for rendering to finish
            renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

        // Update page counters
        // document.getElementById('page_num').textContent = num;
        const numEls = document.getElementsByClassName('page_num')
        for (let i = 0; i < numEls.length; i++) {
            numEls[i].textContent = num;
        }
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        queueRenderPage(pageNum);
    }
    // document.getElementById('prev').addEventListener('click', onPrevPage);
    const prevBtns = document.getElementsByClassName('btn-prev')
    for (let i = 0; i < prevBtns.length; i++) {
        prevBtns[i].addEventListener('click', onPrevPage, false);
    }

    /**
     * Displays next page.
     */
    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        queueRenderPage(pageNum);
    }
    // document.getElementById('next').addEventListener('click', onNextPage);
    const nextBtns = document.getElementsByClassName('btn-next')
    for (let i = 0; i < nextBtns.length; i++) {
        nextBtns[i].addEventListener('click', onNextPage, false);
    }

    /**
     * Asynchronously downloads PDF.
     */
    pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        const countEls = document.getElementsByClassName('page_count')
        for (let i = 0; i < countEls.length; i++) {
            countEls[i].textContent = pdfDoc.numPages;
        }

        // document.getElementById('page_count').textContent = pdfDoc.numPages;

        // Initial/first page rendering
        renderPage(pageNum);
    });
</script>
</body>
</html>
