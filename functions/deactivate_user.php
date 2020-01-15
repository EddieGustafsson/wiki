<?php

session_start();
include "../includes/settings.php";

if(isset($_SESSION['role']) && $_SESSION['role'] == "superadmin"){

    if(isset($_POST['anv_id'])){

        $function = 'deaktiveraKonto';
        $user_id = $_POST['anv_id'];

        // Create map with request parameters
        $params = array ('funktion' => $function, 'id' => $user_id);

        $query = http_build_query($params);

        // Create Http context details
        $context_data = array (
            'method' => 'POST',
            'header' => "Connection: close\r\n".
                        "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Content-Length: ".strlen($query)."\r\n",
            'content'=> $query );

        $context = stream_context_create(array('http' => $context_data));

        $result = file_get_contents('http://10.130.216.101/TP/Admin/funktioner/konto.php', false, $context);

        $array = json_decode($result, true);

        header("location: " . $host . "/_admin");

    }

}

?>