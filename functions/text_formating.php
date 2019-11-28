<?php
if(isset($_POST['user_id'], $_POST['title'], $_POST['source'])){

    $user_id = $_POST['user_id']; //bidragsgivare
    $title = $_POST['title']; //titel
    $source = $_POST['source']; //innehall

    $characters = str_split($source);
    $source = "";

    foreach($characters as $char){
        if(!($char == ' ' || $char == 'A' || $char == 'a' || $char == 'B' || $char == 'b' || $char == 'C' || $char == 'c' || $char == 'D' || $char == 'd' || $char == 'E' || $char == 'e' || $char == 'F' || $char == 'f' || $char == 'G' || $char == 'g' || $char == 'H' || $char == 'h' || $char == 'I' || $char == 'i' || $char == 'J' || $char == 'j' || $char == 'K' || $char == 'k' || $char == 'L' || $char == 'l' || $char == 'M' || $char == 'm' || $char == 'N' || $char == 'n' || $char == 'O' || $char == 'o' || $char == 'P' || $char == 'p' || $char == 'Q' || $char == 'q' || $char == 'R' || $char == 'r' || $char == 'S' || $char == 's' || $char == 'T' || $char == 't' || $char == 'U' || $char == 'u' || $char == 'V' || $char == 'v' || $char == 'W' || $char == 'w' || $char == 'X' || $char == 'x' || $char == 'Y' || $char == 'y' || $char == 'Z' || $char == 'z' || $char == 'Å' || $char == 'å' || $char == 'Ä' || $char == 'ä' || $char == 'Ö' || $char == 'ö' || $char == '1' || $char == '2' || $char == '3' || $char == '4' || $char == '5' || $char == '6' || $char == '7' || $char == '8' || $char == '9' || $char == '0' || $char == '!' || $char == '"' || $char == '#' || $char == '¤' || $char == '%' || $char == '&' || $char == '/' || $char == '(' || $char == ')' || $char == '=' || $char == '?' || $char == '+' || $char == '´' || $char == '`' || $char == '@' || $char == '£' || $char == '$' || $char == '\\' || $char == '§' || $char == '½' || $char == '¨' || $char == '^' || $char == '~' || $char == '*' || $char == '\'' || $char == '-' || $char == '_' || $char == '.' || $char == ':' || $char == ',' || $char == ';' || $char == '<' || $char == '>' || $char == '|' || $char == '\n' || $char == '\r')){
            $char = "";
        }

        $source = $source . $char;
    }

    $params = array ('nyckel' => 'JIOAJWWNPA259FB2', 'tjanst' => 'wiki', 'typ' => 'function', 'handling' => 'skapa', 'funktion' => 'skapaWikiUppdatering', 'wikiId' => '3', 'sidId' => '', 'bidragsgivare' => $user_id, 'titel' => $title, 'innehall' => $source);
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

                
























