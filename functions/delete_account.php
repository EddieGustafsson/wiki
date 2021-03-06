<?php 
session_start();

if(isset($_SESSION["delete_account"])){
    unset ($_SESSION['delete_account']);
    header("location: ".$host."/_settings");
}

if(isset($_SESSION['role']) && $_SESSION['role'] != "superadmin"){

    if(isset($_POST['username']) && isset($_POST['password'])){
        $service = "wiki";
        $username = $_POST['username'];
        $password = $_POST['password'];

        include "../includes/settings.php";

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
            $_SESSION["delete_account"] = "true";
            header("location: ".$host."/_settings");
        } else {
            header("location: ".$host."/_settings?login=failed");
        }
    } else {
        header("location: ".$host."");
    }

}

?>