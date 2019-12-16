<?php

include "../includes/settings.php";
include "../includes/edit_user.php";

/*$service = 'wiki';
$type = 'function';
$action = 'skapa';*/
$function = 'skapaAKonto';
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Create map with request parameters
$params = array ('funktion' => $function, 'username' => $username, 'rollid' => '5', 'tjanst' => '0');

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

if($array['success'] == true){

    header("location: " . $host . "/_admin?create_user_status=success");

}

?>