<?php

function deletePage($pageId){

    $params = array ('nyckel' => 'JIOAJWWNPA259FB2', 'tjanst' => 'wiki', 'typ' => 'function',
                        'handling' => 'tabort', 'funktion' => 'tabortWikiSida', 'wikiId' => '3',
                        'sidId' => $pageId);

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