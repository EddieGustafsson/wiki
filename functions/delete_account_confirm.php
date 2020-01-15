<?php 

session_start();

include "../includes/settings.php";

if(isset($_POST['confirmation_phrase']) && isset($_SESSION['role'])){
    $confirmation_phrase = $_POST['confirmation_phrase'];
    $user_id = $_POST['user_id'];

    if($confirmation_phrase == "jag försäkrar på heder och samvete att jag vill ta bort mitt konto" && $_SESSION['role'] != "superadmin"){
        unset ($_SESSION['confirmation_phrase']);
        unset ($_SESSION['delete_account']);

        // Create map with request parameters
        $params = array ('funktion' => 'tabortKonto', 'anvandarid' => $user_id);

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
        $result =  file_get_contents ('http://10.130.216.101/TP/Admin/funktioner/tabort.php', false, $context);

        $array = json_decode($result, true);

        header("location: ".$host."/");
    } else {
        $_SESSION["confirmation_phrase"] = "failed";
        header("location: ".$host."/_settings");
    }
} 

?>