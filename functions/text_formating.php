<?php
include "../includes/settings.php";

if(isset($_POST['user_id'], $_POST['title'], $_POST['source'])){

    $user_id = $_POST['user_id']; //bidragsgivare
    $title = $_POST['title']; //titel
    $source = $_POST['source']; //innehall
    if(isset($_POST['page_id'])){
        $page_id = $_POST['page_id'];
    } else {
        $page_id = "";
    }

    $source = preg_replace('/[^a-öA-Ö0-9\.\,]\/[\w]+/i', ' ', $source);

    $params = array ('nyckel' => $api, 'tjanst' => 'wiki', 'typ' => 'function', 'handling' => 'skapa', 'funktion' => 'skapaWikiUppdatering', 'wikiId' => $wiki_id, 'sidId' => $page_id, 'bidragsgivare' => $user_id, 'titel' => $title, 'innehall' => $source);
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

    header('location: /Wiki/'.$title.'');
}

?>