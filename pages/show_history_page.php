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
    $final_array = array();

    for($i = sizeof($array)-1; $i >= 0; $i--){
        array_push($final_array, $array[$i]);
    }

    $page_title = '#'.$version_id.' '.$final_array[$index]['titel'].'';
}

include '../includes/head.php';

?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);">
                        <?php 
                            echo 
                            '
                            <li class="breadcrumb-item"><a href="/Wiki">Hem</a></li>
                            <li class="breadcrumb-item"><a href=/Wiki/'. $parent_branch.'>'.$parent_branch.'</a></li>
                            <li class="breadcrumb-item"><a href=/Wiki/'. $parent_branch.'/_history>Historik</a></li>
                            <li class="breadcrumb-item active" aria-current="page">#'.$version_id.' '.$final_array[$index]['titel'].'</li>
                            ';
                        
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
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo ''.$host.'/'.$parent_branch.'/_history';?>">Gå tillbaka till historik</a>
                                    </li>
                                </ul>
                                <br>
                                <h1>
                                <?php
                                    echo $final_array[$index]['titel'];
                                    echo ' (#'.$version_id.')'; 
                                ?></h1>
                                <p><i>Senast ändrad: <?php echo $final_array[$index]['datum']; ?></i></p>
                            </div>
                            <div class="col-4 alert alert-warning">
                                <h5><i class="fas fa-exclamation-triangle"></i> Förhandsgranskning av artikel</h5><br>
                                <p>Detta är en tidigare version av artikeln <em><?php echo $final_array[$index]['titel']?></em>, som publicerades <em><?php echo $final_array[$index]['datum']; ?></em>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div id="test-markdown-view" class="js-toc-content">
                                    <!-- Server-side output Markdown text -->
                                    <textarea style="display:none;">
<?php echo $final_array[$index]['innehall']; ?>
                                    </textarea>             
                                </div>
                            </div>
                            <div class="col-4" style="border-left: 1px solid rgba(0,0,0,.125);text-align:left;">
                            <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <h5>Innehållsförteckning</h5>
                                                </button>
                                                <div class="float-right" data-toggle="collapse" data-target="#collapseOne" style="margin-top: 3%;">
                                                    <i class="fa" aria-hidden="true"></i>
                                                </div>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div id="custom-toc-container"></div>
                                            </div>
                                        </div>
                                    </div>
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