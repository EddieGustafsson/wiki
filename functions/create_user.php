<?php

session_start();
include "../includes/settings.php";

if(isset($_SESSION['role']) && $_SESSION['role'] == "superadmin"){

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){

        $function = 'skapaAKonto';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Create map with request parameters
        $params = array ('funktion' => $function, 'anamn' => $username, 'rollid' => $role, 'tjanst' => '61');

        $query = http_build_query($params);

        // Create Http context details
        $context_data = array (
            'method' => 'POST',
            'header' => "Connection: close\r\n".
                        "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Content-Length: ".strlen($query)."\r\n",
            'content'=> $query );

        $context = stream_context_create(array('http' => $context_data));

        $result = file_get_contents('http://10.130.216.101/TP/Admin/funktioner/skapa.php', false, $context);

        $array = json_decode($result, true);

        header("location: " . $host . "/_admin");

    }

}

?>