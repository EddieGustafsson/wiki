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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/editormd.min.js"></script>
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
        </script>