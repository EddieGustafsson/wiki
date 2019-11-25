<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css">
    </head>
    <body>

        <div id="wikisida-form" class="wikisida-form">
            <div id="skapa-wikisida" class="skapa-wikisida">
                <h4>Skapa wikisida</h4>

                <form id="form" action="../functions/text_formating.php" method="POST">
                    Sid id: <input type="text" name="sidId"><br>
                    Bidragare: <input type="text" name="bidragsgivare"><br>
                    Titel: <input type="text" name="titel"><br>
                    <p>Innehåll:</p>
                    <div id="editor">
                        <!-- Tips: Editor.md can auto append a `<textarea>` tag -->
                         <textarea id="innehall" name="innehall" style="display:none;"></textarea>
                    </div>

                    <input type="submit" value="Skapa wikisida">
                    
                </form>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                    autoLoadModules: true,
                    lineNumbers: true, // Display editor line numbers

                    imageUpload: true,
                    imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL: "./php/upload.php",
                    
                    path : "../assets/js/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
                });
            });

        </script>

        
    </body>
</html>















