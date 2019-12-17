<?php

function editUser($anvandarid, $password){

    include "../includes/settings.php";

    /*$service = 'wiki';
    $type = 'function';
    $action = 'skapa';*/
    $function = 'redigeraKonto';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create map with request parameters
    $params = array ('funktion' => $function, 'anvandarid' => $anvandarid, 'password' => $password);

    $query = http_build_query($params);

    // Create Http context details
    $context_data = array (
        'method' => 'POST',
        'header' => "Connection: close\r\n".
                    "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($query)."\r\n",
        'content'=> $query );

    $context = stream_context_create(array('http' => $context_data));

    $result = file_get_contents('http://10.130.216.101/TP/Admin/funktioner/redigera.php', false, $context);

    $array = json_decode($result, true);



}

?>