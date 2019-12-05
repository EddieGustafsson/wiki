<?php 

include '../includes/settings.php';

if(isset($_POST['debug'])) {
    if($_POST['debug'] == true){
        setcookie("debug", 'on', time()+(60*60*24*30), '/');
        header('Location: ' . $host . '/_settings?status=settings&reason=DebugEnabled');
    } 
} else {
    setcookie("debug", 'off', time()+(60*60*24*30), '/');
    header('Location: ' . $host . '/_settings?status=settings&reason=DebugDisabled');
}

exit();

?>