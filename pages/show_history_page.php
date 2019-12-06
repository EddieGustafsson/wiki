<?php 
include "../includes/settings.php";
include "../functions/get_title.php";
include "../functions/get_history.php";

if(isset($_GET['version']) && isset($_GET['id'])){
    $page_id = $_GET['id'];
    $version_id = $_GET['version'];
    $array = getHistory($page_id);
    $index = $_GET['index'];
    $parent_branch = $_GET['branch_title'];
}

include '../includes/head.php';

?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);">
                        <?php 
                        if($array[$index]['titel'] != 'Home'){
                            echo 
                            '
                            <li class="breadcrumb-item"><a href="/Wiki">Hem</a></li>
                            <li class="breadcrumb-item"><a href=/Wiki/'. $parent_branch.'>'.$parent_branch.'</a></li>
                            <li class="breadcrumb-item"><a href=/Wiki/'. $parent_branch.'/_history>Historik</a></li>
                            <li class="breadcrumb-item active" aria-current="page">'.$array[$index]['titel'].'</li>
                            ';
                        } else {
                            echo '<li class="breadcrumb-itemactive" aria-current="page"><a>Hem</a></li>';
                        }
                        
                        ?>
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
                                        <a class="nav-link active">Artikel</a>
                                    </li>
                                </ul>
                                <br>
                                <h1>
                                <?php
                                    echo $array[$index]['titel']; 
                                ?></h1>
                                <p><i>Senast ändrad: <?php echo $array[$index]['datum']; ?></i></p>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div id="test-markdown-view" class="js-toc-content">
                                    <!-- Server-side output Markdown text -->
                                    <textarea style="display:none;">
<?php echo $array[$index]['innehall']; ?>
                                    </textarea>             
                                </div>
                            </div>
                            <div class="col-4" style="border-left: 1px solid rgba(0,0,0,.125);text-align:left;">
                                <div class="sticky-top" style="top: 100px; z-index: 1;">
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