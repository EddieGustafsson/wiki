<?php

include '../includes/settings.php';
include '../includes/head.php';

if(empty($_SESSION['username']) && $_SESSION['role'] != "superadmin"){

    echo 
    "
    <script>
        window.location = '".$host."/home?create=unauthorized';
    </script>
    ";

}

?>