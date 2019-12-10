<?php

include '../includes/settings.php';
include '../includes/head.php';

if(empty($_SESSION['username']) && $_SESSION['role'] != "superadmin"){

    echo 
    "
    <script>
        window.location = '".$host."/home?admin=unauthorized';
    </script>
    ";

}

?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2> Adminpanel </h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3" style="border-right: 1px solid rgba(0,0,0,.125);">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="user-list-tab" data-toggle="pill" href="#user-list" role="tab" aria-controls="user-list" aria-selected="false">Användarlista</a>
                            <a class="nav-link" id="statistics-tab" data-toggle="pill" href="#statistics" role="tab" aria-controls="statistics" aria-selected="false">Statistik</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="user-list" role="tabpanel" aria-labelledby="user-list-tab" style="min-height: 500px;">
                                <h4>Användarlista</h4>
                            </div>
                            <div class="tab-pane fade" id="statistics" role="tabpanel" aria-labelledby="statistics-tab" style="min-height: 500px;">
                                <h4>Statistik</h4>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    include '../includes/footer.php';
?>