<?php

$page_title = "Adminpanel";

include '../includes/settings.php';
include '../includes/head.php';
include '../functions/get_user.php';

if(empty($_SESSION['username']) && $_SESSION['role'] != "superadmin"){

    echo 
    "
    <script>
        window.location = '".$host."/home?admin=unauthorized';
    </script>
    ";

}else{

    $user_list = getUser();

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
                                <div class="settings-section">
                                    <h4>Användarlista</h4>
                                    <hr>
                                    <div id="accordian">
                                        <?php
                                        for($i = 0; $i < sizeof($user_list['anvandare']); $i++){

                                            $user = $user_list['anvandare'][$i]['anamn'];
                                            $id = $user_list['anvandare'][$i]['id'];

                                            if(isset($user)){
                                                echo
                                                '
                                                <div class="card">
                                                    <div class="card-header" id="' . $user . '">
                                                        <h4 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#' . $user . '' . $id . '" aria-expanded="false" aria-controls="' . $id . '">
                                                                ' . $user . ' #' . $id . '
                                                            </button>
                                                        </h4>
                                                    </div>
                                                    <div id="' . $user . '' . $id . '" class="collapse" aria-labelledby="' . $user . '" data-parent="#accordian">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col" style="border-right: 1px solid rgba(0,0,0,.125);">
                                                                    <h4>Deaktivera Konto</h4>
                                                                    <hr>
                                                                    <p>Genom att deaktivera detta konto så tar du bort möjligheten för användaren att komma in på detta Wiki, 
                                                                    samt tar bort möjligheten för dem att ändra något.</p>
                                                                    <button type="button" class="btn btn-outline-warning btn-sm">Deaktivera Konto</button>
                                                                </div>
                                                                <div class="col">
                                                                    <h4>Ta Bort Konto</h4>
                                                                    <hr>
                                                                    <p>Genom att ta bort detta konto så tas det bort förevigt. Detta konto kommer man inte kunna få tillbaka.</p>
                                                                    <button type="button" class="btn btn-outline-danger btn-sm">Ta Bort Konto</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
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