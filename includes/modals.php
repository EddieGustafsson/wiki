<!-- Remove page check -->

<div class="modal fade" id="remove-page-check" tabindex="-1" role="dialog" aria-labelledby="remove-page-check" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remove-page-check">Sidan kommer strax att raderas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo $host;?>/functions/delete_page.php">
                        <input type="hidden" name="page_id" value="<?php if(!empty($array['sidor'][$page_id]['id'])){echo $array['sidor'][$page_id]['id'];} ?>">
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i> Är du säker på att du vill fortsätta?
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-danger btn-lg">Ja</button>
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Avbryt</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

<?php 

if($page_title = 'Inställnigar' && isset($_SESSION["user_id"])){
    echo 
    '
    <!-- Deactivate account -->

        <div class="modal fade" tabindex="-1" id="deactivate-account" tabindex="-1" role="dialog" aria-labelledby="deactivate-account" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deactivate-account">Är du säker på att du vill göra det här?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo $host;?>/_login" method="POST">
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Detta är oerhört viktigt.
                                </div>
                                <ul>
                                    <li>Ditt konto kommer att <strong>deaktiveras</strong>.</li>
                                    <li>Endast en <strong>adminstratör</strong> kommer kunna aktivera det igen</li>
                                </ul> 
                                <hr>
                                <div class="settings-section-modal">
                                    <lable><strong>Ditt användarnamn:</strong></lable>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" aria-label="username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="settings-section-modal">
                                    <lable><strong>Bekräfta ditt lösenord:</strong></lable>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" aria-label="username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger btn-lg">Deaktivera konto</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Remove account -->

        <div class="modal fade" tabindex="-1" id="remove-account" tabindex="-1" role="dialog" aria-labelledby="remove-account" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="remove-account">Är du säker på att du vill göra det här?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="'.$host.'/functions/delete_account.php" method="POST">
                                <input type="hidden" name="user_id" value="'.$_SESSION["user_id"].'">
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Detta är oerhört viktigt.
                                </div>
                                <ul>
                                    <li>Ditt konto kommer att raderas <strong>permanent</strong>. Det kommer alltså vara omöjligt att ångra detta val.</li>
                                    <li>Vi på Marvel Wiki har inte möjlighet att återställa ditt konto.</li>
                                </ul> 
                                <hr>
                                <div class="settings-section-modal">
                                    <lable><strong>Ditt användarnamn:</strong></lable>
                                    <div class="input-group input-group-sm">
                                        <input name="username" type="text" class="form-control" aria-label="username" aria-describedby="basic-addon1"  required autofocus>
                                    </div>
                                </div>
                                <div class="settings-section-modal">
                                    <lable><strong>Bekräfta ditt lösenord:</strong></lable>
                                    <div class="input-group input-group-sm">
                                        <input name="password" type="password" class="form-control" aria-label="username" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger btn-lg">Fortsätt</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Remove account check -->

        <div class="modal fade" id="remove-account-check" tabindex="-1" role="dialog" aria-labelledby="remove-account-check" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="remove-account-check">Ditt konto kommer strax att raderas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="'.$host.'/functions/delete_account_confirm.php" method="POST">
                                <input type="hidden" name="user_id" value="'.$_SESSION["user_id"].'">
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Om du är säker på att du vill fortsätta, följ instruktionerna
                                </div>
                                <p><strong>Var vänlig och skriv, </strong><i>jag försäkrar på heder och samvete att jag vill ta bort mitt konto</i><strong>, nedan:</strong></p>
                                <hr>
                                <div class="settings-section-modal">
                                    <div class="input-group input-group-sm">';

                                    if(isset($_SESSION["confirmation_phrase"]) && $_SESSION["confirmation_phrase"] == "failed"){
                                        echo 
                                        '
                                        <input id="confirmation_phrase" name="confirmation_phrase" type="text" class="form-control is-invalid" aria-label="safe" aria-describedby="basic-addon1" required autofocus>
                                        <div class="invalid-feedback">
                                            Var vänlig och skriv in rätt fras.
                                        </div>
                                        ';
                                    } else {
                                        echo '<input id="confirmation_phrase" name="confirmation_phrase" type="text" class="form-control" aria-label="safe" aria-describedby="basic-addon1" required autofocus>';
                                    }

                                    echo '
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger btn-lg">Ta bort detta konto</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Change username -->

        <div class="modal fade" id="change-username" tabindex="-1" role="dialog" aria-labelledby="change-username" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="change-username">Vill du verkligen ändra ditt användarnamn?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo $host;?>/_login" method="POST">
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Oväntade dåliga saker kommer att hända om du inte läser detta!
                                </div>
                                <ul>
                                    <li>Vi kommer <strong>inte</strong> att skapa omdirigeringar för din gamla profil.</li>
                                    <li>Någon kan använda ditt gammla användarnamn.</li>
                                    <li>Det kan ta några minuter att byta namn.</li>
                                </ul> 
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger btn-lg">Jag förstår, låt mig ändra mitt användarnamn</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    ';
}

?>

<!-- Login Form -->

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login">Logga in till Marvel Wiki</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $host;?>/_login" method="POST">
                        <label for="inputUsername" class="sr-only">Användarnamn</label>
                        <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Användarnamn" required autofocus>
                        <br>
                        <label for="inputPassword" class="sr-only">Lösenord</label>
                        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Lösenord" required>
                        <br>
                        <div class="checkbox mb-3 text-center">
                            <label>
                            <input type="checkbox" value="remember-me"> Kom ihåg mig
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger btn-lg">Logga in</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

<?php

if($page_title == 'Adminpanel' && $_SESSION['role'] == "superadmin"){

echo '

<!-- Skapa Konto -->

<div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="create_user" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-user">Skapa Konto till Marvel Wiki</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="'.$host.'/functions/create_user.php" method="POST">
                        <label for="input-username" class="sr-only">Användarnamn</label>
                        <input name="username" type="text" id="input-username" class="form-control" placeholder="Användarnamn" required autofocus>
                        <br>
                        <label for="input-password" class="sr-only">Lösenord</label>
                        <input name="password" type="password" id="input-password" class="form-control" placeholder="Lösenord" required>
                        <br>
                        <label for="input-role" class="sr-only">Roll</label>
                        <select name="role" class="input-group-text" for="input-role">
                            <option value="5" selected>Användare</option>
                            <option value="3">Admin</option>
                        </select>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg">Skapa Konto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Deactivate user -->

    <div class="modal fade" tabindex="-1" id="deactivate-user" role="dialog" aria-labelledby="deactivate-user" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deactivate-user">Är du säker på att du vill göra det här?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="'.$host.'/functions/deactivate_user.php" method="POST">
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <div class="alert alert-warning" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Detta är oerhört viktigt.
                                </div>
                                <ul>
                                    <li>Detta konto kommer att <strong>deaktiveras</strong>.</li>
                                    <li>Ett deaktiverat konto kommer <strong>inte vara tillgängligt</strong> för användaren</li>
                                    <li>Kontot <strong>måste</strong> aktiveras av en admin igen för att användaren ska få tillgång</li>
                                </ul> 
                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-warning btn-lg">Deaktivera konto</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

    <!-- Activate user -->

    <div class="modal fade" tabindex="-1" id="activate-user" role="dialog" aria-labelledby="activate-user" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="activate-user">Är du säker på att du vill göra det här?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="'.$host.'/functions/activate_user.php" method="POST">
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <div class="alert alert-success" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Detta är viktigt.
                                </div>
                                <ul>
                                    <li>Detta kommer att <strong>aktivera</strong> kontot.</li>
                                    <li>Kontot <strong>måste vara aktiverat</strong> för att användaren ska kunna komma in på detta wiki igen</li>
                                </ul> 
                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-success btn-lg">Aktivera Konto</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

    <!-- Remove account -->

        <div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="delete-user" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete-user">Ta bort användarkonto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="'.$host.'/functions/delete_user.php" method="POST">
                                <input type="hidden" name="user_id" value="">
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Är du säker på att du vill ta bort denna användare.
                                </div>
                                <p><strong>Genom att ta bort denna användare så kommer allt denna användare har gjort att tas bort!</strong></p>
                                <hr>
                                <div class="settings-section-modal">
                                    <lable><strong>Ditt användarnamn:</strong></lable>
                                    <div class="input-group input-group-sm">
                                        <input name="username" type="text" class="form-control" aria-label="username" aria-describedby="basic-addon1"  required autofocus>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger btn-lg">Ta bort detta konto</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        ';

        }

    ?>
