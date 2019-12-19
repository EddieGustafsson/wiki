<?php
include "../includes/settings.php";
include "../functions/view_json.php";
include "../functions/get_title.php";

$page_title = 'Senaste ändringar';

$array = getWiki(9);

include '../includes/head.php';
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
                <form method="POST" action="">
                    <input type="hidden" name="page_id" value="0">
                    <input type="hidden" name="user_id" value="0">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <h1><?php echo $page_title; ?></h1>
                                </div>
                                <div class="col-4">

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p>Detta är en lista över de senaste ändringarna på Marvel Wiki.</p>
                                    <table class="table <?php  if($style == "/darkmode.css"){ echo "table-dark"; };?>" id="recent_changes" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th scope="col">Datum</th>
                                            <th scope="col">Titel</th>
                                            <th scope="col">Bidragsgivare</th>
                                            <th scope="col">Godkänt av</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                            for($i = 0; $i < sizeof($array['sidor']); $i++){
                                                echo 
                                                '
                                                <tr>
                                                    <th scope="row">'.$array['sidor'][$i]['datum'].'</th>
                                                    <td><a href="'.$host.'/'.$array['sidor'][$i]['titel'].'">'.$array['sidor'][$i]['titel'].'</a></td>
                                                    <td>'.$array['sidor'][$i]['bidragsgivareNamn'].'</td>
                                                    <td>'.$array['sidor'][$i]['godKantAvNamn'].'</td>
                                                </tr>
                                                ';
                                            }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include '../includes/footer.php'; ?>

    </body>
</html>