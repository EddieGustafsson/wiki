<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>View Markdown</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.preview.min.css">
    </head>
    <body>

        <div id="test-markdown-view">
            <!-- Server-side output Markdown text -->
            <textarea style="display:none;">### Hello world!</textarea>             
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/editormd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/marked.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/prettify.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var testView = editormd.markdownToHTML("test-markdown-view", {
                    // markdown : "[TOC]\n### Hello world!\n## Heading 2", // Also, you can dynamic set Markdown text
                    // htmlDecode : true,  // Enable / disable HTML tag encode.
                    // htmlDecode : "style,script,iframe",  // Note: If enabled, you should filter some dangerous HTML tags for website security.
                });
            });
        </script>
    </body>
</html>