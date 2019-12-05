<?php 

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
    session_start();
    $_SESSION["username"] = $array['anamn'];
    $_SESSION["user_id"] = $array['anvandarId'];
    $_SESSION["role"] = $array['roll'];
    
    setcookie("theme", 'main', time()+(60*60*24*30), '/');

    header("location: ".$host."/home?login=success");
    
} else {
    header("location: ".$host."/home?login=failed");
}


?>