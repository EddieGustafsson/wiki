<?php
session_start();
include "../includes/settings.php";

if(isset($_POST['password']) && isset($_POST['new_password']) && isset($_SESSION["username"])){
    $service = "wiki";
    $username = $_SESSION["username"];
    $user_id = $_SESSION["user_id"];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];

    // Create map with request parameters
    $params = array ('tjanst' => $service, 'anamn' => $username, 'password' => $password);

    // Build Http query using params
    $query = http_build_query ($params);

    // Create Http context details
    $context_data = array (
        'method' => 'POST',
        'header' => "Connection: close\r\n".
                    "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($query)."\r\n",
        'content'=> $query );

    // Create context resource for our request
    $context = stream_context_create (array ( 'http' => $context_data ));

    // Read page rendered as result of your POST request
    $result =  file_get_contents ('http://10.130.216.101/TP/Login/login.php', false, $context);

    $array = json_decode($result, true);

    if($array['success'] == true){

        $change_password_params = array ('funktion' => 'redigeraKonto', 'anvandarid' => $user_id, 'losenord' => $new_password);
        $change_password_query = http_build_query ($change_password_params);
        $change_password_context_data = array (
            'method' => 'POST',
            'header' => "Connection: close\r\n".
                        "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Content-Length: ".strlen($change_password_query)."\r\n",
            'content'=> $change_password_query );

        $change_password_context = stream_context_create (array ( 'http' => $change_password_context_data ));
        $change_password_result =  file_get_contents ('http://10.130.216.101/TP/Admin/funktioner/redigera.php', false, $change_password_context);

        $change_password_array = json_decode($change_password_result, true);

        header("location: ".$host."/_settings?status=changePassword&reason=success");
        
    } else {
        header("location: ".$host."/_settings?status=changePassword&reason=failed");
    }
} else {
    header("location: ".$host."/_403");
}

?>