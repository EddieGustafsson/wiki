<?php
session_start();
include "../includes/settings.php";

if(isset($_POST['page_id']) && $_SESSION['role'] == "superadmin"){
    $page_id = $_POST['page_id'];

    $params = array ('nyckel' => $api, 'tjanst' => 'wiki', 'typ' => 'function',
                        'handling' => 'tabort', 'funktion' => 'tabortWikiSida', 'wikiId' => $wiki_id,
                        'sidId' => $page_id);

    $query = http_build_query ($params);
    $context_data = array (
        'method' => 'POST',
        'header' => "Connection: close\r\n".
                    "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($query)."\r\n",
        'content'=> $query );

    $context = stream_context_create (array ( 'http' => $context_data ));  
    $result =  file_get_contents ('http://10.130.216.101/TP/api.php', false, $context);
    $array = json_decode($result, true);

    header("location: ".$host."/_create?status=delete&reason=PageDeleted");
} else {
    header("location: ".$host."/_create?status=delete&reason=Error");
}

?>