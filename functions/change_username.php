<?php
session_start();

include "../includes/settings.php";

if(isset($_SESSION['role'])){

    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $user_id = $_SESSION["user_id"];

        $params = array ('funktion' => 'redigeraKonto', 'anvandarid' => $user_id, 'anamn' => $username);
        $query = http_build_query ($params);
        $context_data = array (
            'method' => 'POST',
            'header' => "Connection: close\r\n".
                        "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Content-Length: ".strlen($query)."\r\n",
            'content'=> $query );

        $context = stream_context_create (array ( 'http' => $context_data ));
        $result =  file_get_contents ('http://10.130.216.101/TP/Admin/funktioner/redigera.php', false, $context);

        $array = json_decode($result, true);

        if($array['code'] == 202){
            header("location: ".$host."/_settings?status=changeUsername&reason=success");
        } else{
            header("location: ".$host."/_settings?status=changeUsername&reason=failed");
        }

    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
?>