<?php
    include '../includes/settings.php';

    session_start();
    unset($_SESSION["username"], $_SESSION["role"]);
    session_destroy();
    header("location: ".$host."/home");
?>