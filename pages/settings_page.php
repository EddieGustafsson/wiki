<?php
include "../includes/settings.php";

$page_title = 'Inställnigar';


include '../includes/head.php';

if(empty($_SESSION['username'])){

    echo 
    "
    <script>
        window.location = '".$host."/home?edit=unauthorized';
    </script>
    ";
}

?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);background-color: #fff;">
                        <li class="breadcrumb-item"><a href="<?php echo $host;?>/home">Hem</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION["username"]; ?></li>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2>Inställningar</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3" style="border-right: 1px solid rgba(0,0,0,.125);">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                     <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">Konto</a>
                                    <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">Säkerhet</a>
                                    <a class="nav-link" id="theme-tab" data-toggle="pill" href="#theme" role="tab" aria-controls="theme" aria-selected="false">Tema</a>
                                    <a class="nav-link" id="advanced-settings-tab" data-toggle="pill" href="#advanced-settings" role="tab" aria-controls="advanced-settings" aria-selected="false">Avancerade inställningar</a>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                        <div class="settings-section">
                                            <h4>Ändra användarnamn</h4>
                                            <hr>
                                            <p>Att ändra ditt användarnamn kan ha oavsiktliga biverkningar.</p>
                                            <button data-toggle="modal" data-target="#change-username" type="button" class="btn btn-secondary btn-sm">Ändra ditt användarnamn</button>
                                        </div>
                                        <div class="settings-section">
                                            <h4 style="color:#ffc107;font-weight: bold;">Deaktivera konto</h4>
                                            <hr>
                                            <p>När du har deaktiverat ditt konto så kommer endast en adminstratör kunna aktivera det igen.</p>
                                            <button type="button" class="btn btn-outline-warning btn-sm">Deaktivera ditt konto</button>
                                        </div>
                                        <div class="settings-section">
                                            <h4 style="color:red;font-weight: bold;">Ta bort konto</h4>
                                            <hr>
                                            <p>När du raderar ditt konto kommer det inte att gå ångra. Snälla, var helt säker.</p>
                                            <button data-toggle="modal" data-target="#remove-account" type="button" class="btn btn-outline-danger btn-sm">Ta bort ditt konto</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                        <h4>Ändra lösenord</h4>
                                        <hr>
                                        <lable><strong>Gammalt lösenord</strong></lable>
                                        <div class="input-group input-group-sm w-50">
                                            <input type="password" class="form-control" aria-label="password" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <lable><strong>Nytt lösenord</strong></lable>
                                        <div class="input-group input-group-sm w-50">
                                            <input type="password" class="form-control" aria-label="password" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <lable><strong>Bekräfta nytt lösenord</strong></lable>
                                        <div class="input-group input-group-sm w-50">
                                            <input type="password" class="form-control" aria-label="password" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <button type="button" class="btn btn-secondary btn-sm">Uppdatera lösenord</button>
                                    </div>
                                    <div class="tab-pane fade" id="theme" role="tabpanel" aria-labelledby="theme-tab">
                                        <div class="settings-section">
                                            <h4>Ändra tema</h4>
                                            <hr>
                                            <select class="custom-select custom-select-sm w-25">
                                                <option value="1" selected>Vanila</option>
                                                <option value="2">Darkmode</option>
                                                <option value="3">Zebra</option>
                                                <option value="4">Color blind</option>
                                            </select>
                                            <br>
                                            <button style="margin-top:15px;" type="button" class="btn btn-secondary btn-sm">Ändra tema</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="advanced-settings" role="tabpanel" aria-labelledby="advanced-settings-tab">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include '../includes/footer.php'; ?>

    </body>
</html>