<?php
include "../includes/settings.php";

$page_title = 'Kontakta oss';


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
                    </ol>
                </nav>
            </div>

            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2>Kontakta oss</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3" style="border-right: 1px solid rgba(0,0,0,.125);">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab" style="min-height: 500px;">
                                        <div class="settings-section">
                                            <h4>Skicka ett meddelande till oss</h4>
                                            <hr>

                                            <form>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="basic-url">Fyll i ditt namn:</label>
                                                    <div class="input-group mb-3">
                                                    <input id="mail" type="text" class="form-control" placeholder='"John Parkin"' aria-label="Username" aria-describedby="basic-addon1" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                <label for="basic-url">Fyll i din mail address:</label>
                                                    <div class="input-group mb-3">
                                                    <input id="mail" type="text" class="form-control" placeholder="exempel@yahoo.se" aria-label="Email" aria-describedby="basic-addon2" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="contact-us-reason">
                                                <label for="basic-url">Vad är anledningen för att du kontaktar oss?</label>
                                                <div class="form-group">
                                                    <select class="form-control" id="reason" >
                                                        <option>Välj ...</option>
                                                        <option>Almänna frågor</option>
                                                        <option>IT-problem</option>
                                                        <option>Kontakta webmaster</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>

                                            <div>
                                            <label for="basic-url">Skriv ditt meddelande här:</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" aria-label="With textarea" required></textarea>
                                                </div>
                                            </div>
                                            <br><br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>

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