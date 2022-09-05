<?
require_once("application.php");
?>

<!DOCTYPE html>
<html lang="en">
<?
require_once("js_css_header.php");
?>

<style>
    #pdf_fream {
        background: #eee;
        padding: 32px 0 16px 0;
    }

    .canvas-wrapper {
        margin-bottom: 16px;
    }

    canvas {
        margin: 0 auto;
        display: block;
    }
</style>
<style type="text/css" media="print">
    * { display: none; }
</style>

<body>
    <div id='pdf_fream'>
        <!-- <iframe id='pdf_fream' width="100%" height="750" frameborder="0" allownetworking="internal">
        </iframe> -->
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.385/build/pdf.min.js"></script>
<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const pdfname = urlParams.get('pdf1');
    // document.getElementById("pdf_fream").src = pdf + '#toolbar=0&navpanes=0&scrollbar=0';

    window.onload = function() {
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
            if (event.keyCode == 123) {
                disableEvent(e);
            }
        }, false);

        function disableEvent(e) {
            if (e.stopPropagation) {
                e.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
        }
    }
    $(document).contextmenu(function() {
        return false;
    });

    function renderPDF(url, canvasContainer, options) {

        options = options || {
            scale: 1
        };

        function renderPage(page) {
            var viewport = page.getViewport(options.scale);
            var wrapper = document.createElement("div");
            wrapper.className = "canvas-wrapper";
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };

            canvas.height = viewport.height;
            canvas.width = viewport.width;
            wrapper.appendChild(canvas)
            canvasContainer.appendChild(wrapper);

            page.render(renderContext);
        }

        function renderPages(pdfDoc) {
            for (var num = 1; num <= pdfDoc.numPages; num++)
                pdfDoc.getPage(num).then(renderPage);
        }

        PDFJS.disableWorker = true;
        PDFJS.getDocument(url).then(renderPages);

    }


    renderPDF(pdfname, document.getElementById('pdf_fream'));
</script>

</html>