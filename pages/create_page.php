<?php
$page_title = 'Skapa en ny artikel';
include '../includes/head.php';
?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);background-color: #fff;">
                        <li class="breadcrumb-item"><a href="#">Hem</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <form method="POST" action="">
                    <input type="hidden" name="page_id" value="0">
                    <input type="hidden" name="user_id" value="0">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <div class="input-group input-group-lg">
                                        <input name="title" type="text" class="form-control" aria-label="Sizing example input" placeholder="Titel" aria-describedby="inputGroup-sizing-lg">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <p style="margin-top:1px;margin-bottom:-2px;">Inställningar:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Lås artikel
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div id="editor">
                                        <textarea name="source" style="display:none;"></textarea>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Skriv ett litet meddelande här som förklarar denna förändring. (Valfri)" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <div style="margin-top:10px;">
                                        <button type="submit" class="btn btn-outline-success">Skapa artikel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include '../includes/footer.php'; ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/editormd.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var editor = editormd("editor", {
                    placeholder: "Hej, skriv din markdown här!",

                    toolbarIcons : function() {
                        return ["undo", "redo", "|", "bold", "italic", "quote", "ucwords", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "list-ul", "list-ol", "hr", "|", "link", "reference-link", "image", "code", "table", "|", "clear", "search", "watch" ,"help"]
                    },

                    codeFold : true,
                    htmlDecode : "style,script,iframe|on*",
                    autoLoadModules: true,
                    lineNumbers: true, // Display editor line numbers
                    autoHeight: true,

                    imageUpload: true,
                    imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL: "./php/upload.php",
                    
                    path : "../assets/js/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
                });

            });
        </script>
        <script src="../assets/js/languages/en.js"></script>

    </body>
</html>