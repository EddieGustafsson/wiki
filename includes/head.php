<?php
session_start();
include '../includes/settings.php';

$stylesArr = array('main', 'darkmode', 'zebra', 'color-blind', 'polka');

if(isset($_COOKIE['theme']) && in_array($_COOKIE['theme'], $stylesArr)) {
    $style = '/' . $_COOKIE['theme'] . '.css';
} else {
    $style = '/main.css';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
        <?php 
            if(isset($page_title)){
                echo $page_title;
            } else {
                echo $array['sidor'][$page_id]['titel']; 
            }
        ?>
        – Marvel Wiki 
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo $host;?>/assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo $host;?>/assets/css<?php echo $style; ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.preview.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    
    <body class="d-flex flex-column h-100">

        <div class="container sticky-top" style="margin-bottom:15px">
            <nav class="navbar navbar-dark bg-dark justify-content-end" style="padding: .1rem 1rem!important;font-size: 15px;">
                <div class="navbar-text" style="padding-top: .3rem; padding-bottom: .3rem;">
                    <?php 
                        if(!empty($_SESSION['username'])){
                            echo 
                            '
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger btn-sm">Inloggad som <strong>'.$_SESSION["username"].'</strong></button>
                                    <button type="button" class="btn btn-danger btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="'.$host.'/_settings"><i class="fab fa-accessible-icon"></i>Test</a>
                                        <a class="dropdown-item" href="'.$host.'/_settings"><i class="fas fa-cogs"></i>Inställningar</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="'.$host.'/_logout"><i class="fa fa-sign-out-alt"></i> Logga ut</a>
                                    </div>
                                </div>
                            ';
                        } else {
                            echo '<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#login">Logga in</button>';
                        }
                    ?>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow" style="background-color: #ce1022 !important;">
                <a class="navbar-brand" href="<?php echo $host;?>/home">Marvel Wiki</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home"><i class="fa fa-home"></i> Hem <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i> Karaktärer
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-book"></i> Serier
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-compass"></i> Utforska
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo $host;?>/_random">Slumpartikel</a>
                            <a class="dropdown-item" href="<?php echo $host;?>/_showall">Alla sidor</a>
                            <a class="dropdown-item" href="#">Senaste ändringarna</a>
                        </div>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Sök i Marvel Wiki" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Sök</button>
                    </form>
                </div>
            </nav>
        </div>