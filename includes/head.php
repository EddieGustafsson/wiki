<?php
session_start();
include '../includes/settings.php';
include '../functions/get_wiki_status.php';

if($maintenance_mode == true){
    header('Location: ' .$host.'/_maintenance');
}

if(isset($_COOKIE['theme']) && in_array($_COOKIE['theme'], $stylesArr)) {
    $style = '/' . $_COOKIE['theme'] . '.css';
} else {
    $style = '/main.css';
}

$array_status = getWikiStatus();
$page_tot = sizeof($array_status['sidor']);

$link = basename($_SERVER["REQUEST_URI"]);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php if(isset($page_title)){echo $page_title;} else {echo $array['sidor'][$page_id]['titel']; }?> – <?php echo $site_title?></title>
        <meta name="description" content="Explore the Marvel cinematic and comic universe including all characters, heroes, villains, teams, groups, weapons, items, and more!">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?php echo $host;?>/assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo $host;?>/assets/css<?php echo $style; ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/css/editormd.preview.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?php echo $host;?>/assets/css/cookiealert.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/styles/github.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/diff2html/2.3.0/diff2html.min.css'>
        <link rel='stylesheet' href='https://unpkg.com/tootik@1.0.2/css/tootik.min.css'>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js" integrity="sha256-EPrkNjGEmCWyazb3A/Epj+W7Qm2pB9vnfXw+X6LImPM=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js" integrity="sha256-TkEcmf5KSG2zToAaUzkq6G+GWezMQ4lEtaBiyaq6Jb4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <?php   
        if($_SERVER['REQUEST_URI'] == "/Wiki/_recent_changes"){
            echo 
            "
            <script>
                $(document).ready(function() {
                    $('#recent_changes').DataTable({
                        'order': [[ 0, 'desc' ]],
                        'language': {
                            'lengthMenu': 'Visar _MENU_ rader per sida',
                            'search': 'Sök:',
                            'paginate': {
                                'first': 'Första',
                                'last': 'Sista',
                                'next': 'Nästa',
                                'previous': 'Tillbaka'
                            },
                            'zeroRecords': 'Inget resultat',
                            'info': 'Visar _PAGE_ av _PAGES_ sidor',
                            'infoEmpty': 'Inga uppgifter är tillgängliga',
                            'infoFiltered': '(filtreras från _MAX_ totala rader)'
                        }
                    });
                } );
            </script>
            ";
        }
        ?>

    </head>
    
    <a id="button"></a>

    <body class="d-flex flex-column h-100">

        <div class="container <?php if($link != "_edit" && $link != "_create"){echo "sticky-top";}?>" style="margin-bottom:15px">
            <nav class="navbar navbar-dark bg-dark" style="padding: .1rem 1rem!important;font-size: 15px;">
                <div class="navbar-text justify-content-start">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a role="button" style="color: white!important;" class="btn btn-secondary btn-sm"><i class="far fa-sticky-note"></i> <strong><?php echo $page_tot?></strong> sidor</a>
                        <a role="button" style="color: white!important;" class="btn btn-success btn-sm" href="<?php echo $host;?>/_create">Skapa artikel</a>
                    </div>
                </div>
                <div class="navbar-text justify-content-end" style="padding-top: .3rem; padding-bottom: .3rem;">
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
                            ';
                            if($_SESSION['role'] == "superadmin"){ echo'<a class="dropdown-item" href="'.$host.'/_admin"><i class="fas fa-user-cog"></i> Adminpanel</a>';}
                            echo 
                            '
                                        <a class="dropdown-item" href="'.$host.'/_settings"><i class="fas fa-cogs"></i> Inställningar</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="'.$host.'/_logout"><i class="fa fa-sign-out-alt"></i> Logga ut</a>
                                    </div>
                                </div>
                            ';
                        }else {
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
                        <a class="nav-link" href="<?php echo $host;?>/home"><i class="fa fa-home"></i> Hem <span class="sr-only">(current)<?php if($title == "Home"){echo "active";}?></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i> Karaktärer
                        </a>
                        <div class="dropdown">
                        <div id="character_dropdown" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <input id="character" onkeyup="faqSearch('character','character_dropdown','dropdown-item','null')" class="form-control typeahead mr-sm-2" type="text" ata-provide="typeahead" autocomplete="off" placeholder="Sök i karaktärer" aria-label="Search">
                        </div>

                        </div>
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-book"></i> Serier
                        </a>
                        <div id="comic_dropdown" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <input name="comic" id="comic" class="form-control typeahead mr-sm-2" type="text" ata-provide="typeahead" autocomplete="off" placeholder="Sök i serier" aria-label="Search">
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-compass"></i> Utforska
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo $host;?>/_random">Slumpartikel</a>
                            <a class="dropdown-item" href="<?php echo $host;?>/_showall">Alla sidor</a>
                            <a class="dropdown-item" href="<?php echo $host;?>/_recent_changes">Senaste ändringarna</a>
                        </div>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="<?php echo $host;?>/_search" method="GET">
                        <input name="query" id="query" class="form-control typeahead mr-sm-2" type="text" ata-provide="typeahead" autocomplete="off" placeholder="Sök i Marvel Wiki" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Sök</button>
                    </form>
                </div>
            </nav>
        </div>

<?php include '../includes/alert.php' ?>
