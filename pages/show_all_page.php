<?php
include "../includes/settings.php";
include "../functions/view_json.php";
include "../functions/get_title.php";

$page_title = 'Alla sidor';

$wiki_page_id = 3;
$array = getWiki($wiki_page_id);


include '../includes/head.php';
?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);background-color: #fff;">
                        <li class="breadcrumb-item"><a href="/home">Hem</a></li>
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
                                    <?php
                                    echo "<ul>";

                                    for($i = 0; $i < sizeof($array['sidor']); $i++){

                                        echo "<li><a href='/Wiki/".$array['sidor'][$i]['titel']."'>".$array['sidor'][$i]['titel']."</a></li>";
                            
                                    }

                                    echo "</ul>";
                                    
                                    ?>
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

    </body>
</html>