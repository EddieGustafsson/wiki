<?php
$page_title = 'Skapa en ny artikel';

include '../includes/settings.php';
include '../includes/head.php';
include '../functions/get_title.php';

if(empty($_SESSION['username'])){

    echo 
    "
    <script>
        window.location = '".$host."/home?create=unauthorized';
    </script>
    ";
}

?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);background-color: #fff;">
                        <li class="breadcrumb-item"><a href="<?php echo $host;?>/home">Hem</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <form method="POST" action="<?php echo $host;?>/functions/text_formating.php">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]?>">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-lg">
                                        <input placeholder="Din titel" name="title" value="<?php if(isset($_GET['page'])){echo $_GET['page'];}; ?>" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div style="margin-top:10px;" id="editor">
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
                        return ["undo", "redo", "|", "bold", "italic", "quote", "ucwords", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "list-ul", "list-ol", "hr", "|", "link", "reference-link", "image", "code", "table", "|", "clear", "search", "watch" ,"help", "tag",]
                    },
                    toolbarIconsClass : {
                        tag : "fa-hashtag"  
                    },

                    toolbarHandlers : {
                        /** 
                         * @param {Object}      cm         CodeMirror对象
                         * @param {Object}      icon       图标按钮jQuery元素对象
                         * @param {Object}      cursor     CodeMirror的光标对象，可获取光标所在行和位置
                         * @param {String}      selection  编辑器选中的文本
                         */
                        tag : function(cm, icon, cursor, selection) {

                            cm.replaceSelection("<div class='tags'></div>");

                            if(selection === "") {
                                cm.setCursor(cursor.line, cursor.ch + 18);
                            }

                            console.log("tagIcon =>", this, icon.html());
                        },

                    },

                    lang : {
                        toolbar : {
                            tag : "Infoga tagg-div", 
                        }
                    },

                    codeFold : true,
                    htmlDecode : "style,script,iframe|on*",
                    autoLoadModules: true,
                    lineNumbers: true, // Display editor line numbers
                    autoHeight: true,

                    <?php 
                        if($style == "/darkmode.css"){
                            echo 
                            '
                            theme: "dark",
                            previewTheme: "dark", 
                            editorTheme: "pastel-on-dark",

                            ';
                        }
                    ?>

                    imageUpload: true,
                    imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL: "./php/upload.php",
                    
                    path : "<?php echo $host;?>/assets/js/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
                });

            });
        </script>
        <script src="<?php echo $host;?>/assets/js/languages/sv.js"></script>

    </body>
</html>