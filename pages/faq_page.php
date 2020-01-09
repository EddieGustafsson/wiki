<?php
include "../includes/settings.php";
include "../functions/get_title.php";

$page_title = 'FAQ';

function faq($question, $answer){
    $id = uniqid();
    echo 
    '
    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-'.$id.'" aria-expanded="true" aria-controls="collapse-'.$id.'">
            '.$question.'
            </button>
        </h2>
        </div>

        <div id="collapse-'.$id.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
            '.$answer.'
            </div>
        </div>
    </div>
    ';
}

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
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h3> Frequently Asked Questions</h3>
                                <p><i>Svar på ofta förekommande frågor</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="accordion" id="accordionExample">

                                    <?php 
                                        faq('Test 1', 'dakd poawkd pkwap odkpao k pod');
                                        faq('Test 2', 'dakd poawkd pkwap odkpao k pod');
                                    ?>

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