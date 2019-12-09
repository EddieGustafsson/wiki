<?php 

function alert($type, $msg){
    echo 
    '<div class="container">
        <div class="alert '.$type.' alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
    ';
}

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'settings':
            switch($_GET['reason']){
                case 'DebugEnabled':
                    alert("alert-success", "Panel för felsökningsinformation har nu aktiverats");
                    break;
                case 'DebugDisabled':
                    alert("alert-success", "Panel för felsökningsinformation har nu deaktiverats");
                    break;
            }
            break;  
        case 'delete':
            switch($_GET['reason']){
                case 'PageDeleted':
                    alert("alert-success", "<i class='fas fa-info-circle'></i> Artikeln har nu tagist bort.");
                    break;
                case 'Error':
                    alert("alert-danger", "<i class='fas fa-exclamation-triangle'></i> Det uppstod något fel vid borttaning av artikeln. Vänligen försök igen.");
                    break;
            }
    }
}

?>