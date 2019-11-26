<?php 
include "../includes/settings.php";
include "../functions/view_json.php";

if(isset($_GET["page"])){
    $page_id = $_GET["page"];
    $array = getWiki($wiki_id);
}

include '../includes/head.php';

?>
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

        <?php include '../includes/footer.php'; ?>

    </body>
</html>