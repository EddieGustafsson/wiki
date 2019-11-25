
<?php


        $innehall = $_POST['innehall'];
        $titel = $_POST['titel'];
        $sidId = $_POST['sidId'];
        $bidragsgivare = $_POST['bidragsgivare'];
        $characters = str_split($innehall);
        $innehall = "";

        foreach($characters as $char){
            if($char == '"' || $char == "'"){
                $char = "2_%1";
            }
        
            $innehall = $innehall . $char;
        }
        
        $params = array ('nyckel' => 'JIOAJWWNPA259FB2', 'tjanst' => 'wiki', 'typ' => 'function', 'handling' => 'skapa', 'funktion' => 'skapaWikiUppdatering', 'wikiId' => '3', 'sidId' => $sidId, 'bidragsgivare' => $bidragsgivare, 'titel' => $titel, 'innehall' => $innehall);
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
    
        foreach($array as $a){
            echo $a, ", ";
        }
        
    
    
?>

                
























