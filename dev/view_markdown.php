<?php 
include "../functions/view_json.php";

if(isset($_GET["page"])){
    $wiki_page_id = 3;
    $page_id = $_GET["page"];
    $array = getWiki($wiki_page_id);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Marvel Wiki – <?php echo $array['sidor'][$page_id]['titel']; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.preview.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            :target {
                display: block;
                position: relative;
                top: -70px; 
                visibility: hidden;
            }
            img{
                padding: 0px 20px 0px 20px;
            }
        </style>
    </head>
    
    <body class="d-flex flex-column h-100">

        <div class="container sticky-top" style="margin-bottom:15px">
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow" style="background-color: #ca091b !important;">
                <a class="navbar-brand" href="#">Marvel Wiki</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa fa-home"></i> Hem <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i> Karaktärer
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-book"></i> Serier
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-compass"></i> Utforska
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Slumpartikel</a>
                            <a class="dropdown-item" href="#">Senaste ändringarna</a>
                        </div>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Sök i Marvel Wiki" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Sök</button>
                    </form>
                </div>
            </nav>
        </div>

        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);background-color: #fff;">
                        <li class="breadcrumb-item"><a href="#">Hem</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $array['sidor'][$page_id]['titel']; ?></li>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Artikel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Redigera</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Historik</a>
                                    </li>
                                </ul>
                                <br>
                                <h1><?php echo $array['sidor'][$page_id]['titel']; ?></h1>
                                <p><i>Senast ändrad: <?php echo $array['sidor'][$page_id]['datum']; ?></i></p>
                            </div>
                            <div class="col-4">
                                <p>Debug:</p>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <sub>Sid-ID: <?php echo $array['sidor'][$page_id]['id']; ?></sub><br>
                                        <sub>JSON-ID: <?php echo $page_id; ?></sub><br>
                                        <sub>Godkänd av id: <?php echo $array['sidor'][$page_id]['godkantAv']; ?></sub><br>
                                        <sub>Godkänd av namn: <?php echo $array['sidor'][$page_id]['godKantAvNamn']; ?></sub><br>
                                    </div>
                                    <div class="col">
                                        <sub>Bidragsgivare: <?php echo $array['sidor'][$page_id]['bidragsgivare']; ?></sub><br>
                                        <sub>Dolt: <?php echo $array['sidor'][$page_id]['dolt']; ?></sub><br>
                                        <sub>Låst: <?php echo $array['sidor'][$page_id]['last']; ?></sub><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div id="test-markdown-view" class="js-toc-content">
                                    <!-- Server-side output Markdown text -->
                                    <textarea style="display:none;">
<?php echo $array['sidor'][$page_id]['innehall']; ?>
                                    </textarea>             
                                </div>
                            </div>
                            <div class="col-4" style="border-left: 1px solid rgba(0,0,0,.125);text-align:left;">
                                <div class="sticky-top" style="top: 80px;">
                                    <h3>Innehållsförteckning</h3>
                                    <div id="custom-toc-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

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

    </body>
</html>