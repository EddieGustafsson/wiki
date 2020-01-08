<?php

function getUser(){

    include "../includes/settings.php";

    $tjanst_id = "61";

    // Create map with request parameters
    $params = array ('nyckel' => $api, 'tjanst' => 'wiki', 'typ' => 'JSON', 'tjanstId' => $tjanst_id);

    $query = http_build_query($params);

    // Create Http context details
    $context_data = array (
        'method' => 'POST',
        'header' => "Connection: close\r\n".
                    "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($query)."\r\n",
        'content'=> $query );

    $context = stream_context_create(array('http' => $context_data));

    $result = file_get_contents('http://10.130.216.101/TP/api.php', false, $context);

    $array = json_decode($result, true);

    return $array;

}

?>