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
    
    // use get variable to paging number
    $page = !isset($_GET['page']) ? 1 : $_GET['page'];
    $limit = 5; // five rows per page
    $end = $limit * $page;
    $offset = ($page - 1) * $limit; // offset
    $total_items = count($user_list['anvandare']); // total items
    $total_pages = ceil($total_items / $limit);

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
                                    <div class="row">
                                        <div class="col-10">
                                            <h4>Användarlista</h4>
                                        </div>
                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create-user">Skapa Konto</button>
                                    </div>
                                    <hr>
                                    <div id="accordian">
                                        <?php
                                        for($i = $offset; $i < $end; $i++){

                                            if(isset($user_list['anvandare'][$i]['anamn']) && isset($user_list['anvandare'][$i]['id'])){

                                                $user = $user_list['anvandare'][$i]['anamn'];
                                                $id = $user_list['anvandare'][$i]['id'];
                                                $active = $user_list['anvandare'][$i]['aktiv'];

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
                                                                    ';
                                                                    if($active == 1){
                                                                        echo'
                                                                            <h4>Deaktivera Konto</h4>
                                                                            <hr>
                                                                            <p>Genom att deaktivera detta konto så tar du bort möjligheten för användaren att komma in på detta Wiki, 
                                                                            samt tar bort möjligheten för dem att ändra något.</p>
                                                                            <button type="button" class="btn btn-outline-warning btn-sm identify_user" data-toggle="modal" data-target="#deactivate-user" data-id="' . $id . '">Deaktivera Konto</button>
                                                                        ';
                                                                    }else if($active == 0){
                                                                        echo'
                                                                            <h4>Aktivera Konto</h4>
                                                                            <hr>
                                                                            <p>Genom att aktivera detta konto så ger du användaren möjligheten att komma in på detta Wiki, 
                                                                            samt ger möjligheten för dem att ändra på saker.</p>
                                                                            <button type="button" class="btn btn-outline-success btn-sm identify_user" data-toggle="modal" data-target="#activate-user" data-id="' . $id . '">Aktivera Konto</button>
                                                                        ';
                                                                    }
                                                                    echo'
                                                                    </div>
                                                                    <div class="col">
                                                                        <h4>Ta Bort Konto</h4>
                                                                        <hr>
                                                                        <p>Genom att ta bort detta konto så tas det bort förevigt. Detta konto kommer man inte kunna få tillbaka.</p></br>
                                                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete-user">Ta Bort Konto</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';
                                                }

                                            }

                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <?php if($page != "" && !isset($user_list['code'])): ?>
                                    
                                        <div class="d-flex justify-content-center" style="margin-top:30px;">
                                            <nav aria-label="kundtjanster">
                                                <ul class="pagination">
                                                    <?php if ($page > 1): ?>
                                                    <li class="page-item"><a class="page-link" href="_admin?page=<?php echo $page-1 ?>">Tillbaka</a></li>
                                                    <?php endif; ?>

                                                    <?php if ($page > 3): ?>
                                                    <li class="start"><a class="page-link" href="_admin?page=1">1</a></li>
                                                    <li class="dots"><a class="page-link">. . .</a></li>
                                                    <?php endif; ?>

                                                    <?php if ($page-2 > 0): ?><li class="page-item"><a class="page-link" href="_admin?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
                                                    <?php if ($page-1 > 0): ?><li class="page-item"><a class="page-link" href="_admin?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

                                                    <li class="page-item active"><a class="page-link" href="_admin?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                                                    <?php if ($page+1 < $total_pages+1): ?><li class="page-item"><a class="page-link" href="_admin?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
                                                    <?php if ($page+2 < $total_pages+1): ?><li class="page-item"><a class="page-link" href="_admin?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

                                                    <?php if ($page < ceil($total_pages / $limit)-2): ?>
                                                    <li class="dots"><a class="page-link">. . .</a></li>
                                                    <li class="end"><a class="page-link" href="_admin?page=<?php echo ceil($total_pages / $limit) ?>"><?php echo ceil($total_pages / $limit) ?></a></li>
                                                    <?php endif; ?>

                                                    <?php if ($page < $total_pages): ?>
                                                    <li class="page-item"><a class="page-link" href="_admin?page=<?php echo $page+1 ?>">Nästa</a></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </nav>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="statistics" role="tabpanel" aria-labelledby="statistics-tab" style="min-height: 500px;">
                                <h4>Statistik</h4>
                                <hr>
                                <?php include '../includes/statistics.php'; ?>
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