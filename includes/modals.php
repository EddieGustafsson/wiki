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