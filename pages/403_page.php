<?php
include "../includes/settings.php";
include "../functions/view_json.php";
include "../functions/get_title.php";

$page_title = 'Error 403 - Page Forbidden';

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
                                <h3><?php echo $page_title; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p><strong>Oops you've have encountered an error</strong></p>
                                <p>We're sorry, you don't have access to the page you requested.</p>
                                <p><a href="<?php echo $host; ?>">Please go back to the homepage.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include '../includes/footer.php'; ?>

    </body>
</html>