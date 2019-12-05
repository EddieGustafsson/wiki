<?php

function getHistory($wiki_page_id){

    include '../includes/settings.php';

     // Create map with request parameters
     $params = array ('nyckel' => $api, 'tjanst' => 'wiki', 'typ' => 'JSON', 'sidId' => $wiki_page_id);

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
     $result =  file_get_contents ('http://10.130.216.101/TP/api.php', false, $context);
 
     $array = json_decode($result, true);
 
     return $array;


}


















?>