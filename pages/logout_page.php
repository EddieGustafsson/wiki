<?php
    include '../includes/settings.php';

    session_start();
    unset(
        $_SESSION["username"],
        $_SESSION["user_id"],
        $_SESSION["mail"],
        $_SESSION["role"]  
    );
    session_destroy();
    //header("location: ".$host."/home");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>