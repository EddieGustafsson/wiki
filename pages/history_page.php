<?php
    include "../includes/settings.php";
    include "../functions/view_json.php";
    include "../functions/get_title.php";
    include "../functions/get_history.php";
    include "../functions/get_page_id.php";

    $page_title = 'Historik';

    $array = array();

    if(isset($_GET['page'])){
        $page_title = $_GET['page'];
        $wiki_page_id = getPageId($page_title);
        
        try{
            $array = getHistory($wiki_page_id);
        }
        catch(Exception $e){

        }
            
    }


    include '../includes/head.php';
?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);background-color: #fff;">
                        <?php 
                            echo 
                            '
                            <li class="breadcrumb-item"><a href="/Wiki">Hem</a></li>
                            <li class="breadcrumb-item"><a href=/Wiki/'.$page_title.'>'.$page_title.'</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Historik</a></li>
                            ';
                            
                        ?>
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
                                    <h1>Historik för <?php echo $page_title; ?></h1>
                                </div>
                                <div class="col-4">

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <?php

                                        if($array != null){

                                            for($i = 0; $i < sizeof($array); $i++){
                                                $array[$i]['titel'] = '#'.($i+1).' '.$array[$i]['titel'];
                                            }

                                            function cmp($a, $b) {
                                                return strcmp($b['id'], $a['id']);
                                            }

                                            usort($array, 'cmp');

                                            echo "<div class='list-group'>";

                                            for($i = 0; $i < sizeof($array); $i++){

                                                //echo "<li><a href='/Wiki/".$array['sidor'][$i]['titel']."'>".$array['sidor'][$i]['titel']."</a></li>";

                                                $source = $array[$i]['innehall'];
                                                $source = substr($source,0,300);
                                                echo '
                                                <a href="/Wiki/'.$page_title.'/_show_history?id='.$array[$i]['sidId'].'&version='.$array[$i]['id'].
                                                '&index='.$i.'&branch_title='.$page_title.'&title='.$array[$i]['titel'].'" class="list-group-item list-group-item-action">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="'.$array[$i]['sidId'].'" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1"><h5 class="mb-1"><strong>'.$array[$i]['titel'].'</strong></h5></label>
                                                        </div>
                                                    </div>
                                                    <small>Användare '.$array[$i]['godkantAv'].' godkände uppdatering av artikeln den '.$array[$i]['datum'].'</small>
                                                </a>
                                                ';
                                
                                            }
                                        } else{
                                            echo '<h5 class="mb-1"><strong>Inga tidigare versioner av denna artikel.</strong></h5>';
                                        }

                                            echo "</div>";
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include '../includes/footer.php';?>

    </body>
</html>

<?php



?>
