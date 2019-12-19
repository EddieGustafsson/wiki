<?php

include "../includes/settings.php";
//include "../edit_user.php";

if(isset($_POST['user_id']) && isset($_POST['username'])){

    $function = '';
    $username = $_POST['username'];
    $user_Id = $_POST['user_id'];
    $role = $_POST['role'];

    // Create map with request parameters
    $params = array ('funktion' => $function, 'kontoID' => $user_Id, 'anamn' => $username);

    $query = http_build_query($params);

    // Create Http context details
    $context_data = array (
        'method' => 'POST',
        'header' => "Connection: close\r\n".
                    "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($query)."\r\n",
        'content'=> $query );

    $context = stream_context_create(array('http' => $context_data));

    $result = file_get_contents('http://10.130.216.101/TP/Admin/funktioner/tabort.php', false, $context);

    $array = json_decode($result, true);

    print_r($array);

    //header("location: " . $host . "/_admin");

}

?>