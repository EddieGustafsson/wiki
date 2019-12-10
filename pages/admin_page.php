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
            
        </div>
    </div>
</main>

<?php 
    include '../includes/footer.php';
?>