<footer class="footer mt-auto py-3">
            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-header">
                    © 2019 Marvel Wiki
                    </div>
                    <div class="card-body">
                        <p class="card-text">Test footer.</p>
                    </div>
                </div>
            </div>
        </footer>

        <?php include '../includes/modals.php'; ?>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script>
        <script src="/Wiki/assets/js/editormd.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/marked.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/prettify.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var testView = editormd.markdownToHTML("test-markdown-view", {
                    // markdown : "[TOC]\n### Hello world!\n## Heading 2", // Also, you can dynamic set Markdown text
                    htmlDecode : true,  // Enable / disable HTML tag encode.
                    toc: true,
                    tocm: true,    // Using [TOCM]
                    tocContainer: "#custom-toc-container",
                    // htmlDecode : "style,script,iframe",  // Note: If enabled, you should filter some dangerous HTML tags for website security.
                });
            });

            $(function () {
                $('[data-toggle="popover"]').popover({ trigger: "hover focus" })
            })

            new Darkmode({ 
                label: '🌓',
            }).showWidget();
        </script>