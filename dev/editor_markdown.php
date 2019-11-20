<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Editor Markdown</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css">
    </head>
    <body>

        <div id="editor">
            <!-- Tips: Editor.md can auto append a `<textarea>` tag -->
            <textarea style="display:none;">### Hello Editor.md !</textarea>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/editormd.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var editor = editormd("editor", {
                    width: "900px",
                    height: "800px",

                    theme : "dark",
                    previewTheme : "dark",
                    editorTheme : "pastel-on-dark",
                    
                    codeFold : true,
                    htmlDecode : "style,script,iframe|on*",
                    emoji: true,
                    taskList: true,
                    tocm: true,
                    tex: true,
                    flowChart: true,
                    sequenceDiagram: true,

                    imageUpload : true,
                    imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL : "./php/upload.php",
                    
                    path : "../assets/js/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
                });
            });
        </script>
    </body>
</html>