        <footer class="footer mt-auto py-3">
            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <h4 class="card-text">Om oss</h4>
                                    <p class="card-text">“We don't make mistakes, just happy little accidents.”</p>
                                    <p class="card-text">― Bob Ross </p>
                                </div>
                                <div class="col-sm">
                                    <h4 class="card-text">Kom igång </h4>
                                    <ul>
                                        <li><a href="<?php echo $host;?>/home">Hem</a></li>
                                        <li><a data-toggle="modal" data-target="#login" href="#">Logga in</a></li>
                                        <li><a href="<?php echo $host;?>/_random">Slumpa en artikel</a></li>
                                        <li><a href="<?php echo $host;?>/_showall">Alla sidor</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm">
                                    <h4 class="card-text">Hjälp</h4>
                                    <ul>
                                        <li><a href="<?php echo $host;?>/_faq">FAQ</a></li>
                                        <li><a href="#">Kontakta oss</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <small><a href="<?php echo $host;?>/Privacy Policy">Integritetspolicy</a> &#8226 © <?php echo date("Y"); ?> Marvel Wiki &#8226 <a href="<?php echo $host;?>/Terms of Service">Användarvillkor</a></small>
                            <br>
                            <small><i class="fas fa-xs fa-power-off" ></i> Powered by <a href="https://github.com/EddieGustafsson/wiki">Wikingdom</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="cookie-consent-overlay">
            <div class="alert text-center cookiealert" role="alert">
                <b>Gillar du kakor?</b> &#x1F36A; Vi använder cookies för att säkerställa att du får den bästa upplevelsen på vår webbplats. <a href="https://cookiesandyou.com/" target="_blank">Läs mer</a>
                <div class="cookie-buttons">
                    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
                        Jag godkänner
                    </button>
                    <a type="button" href="https://google.com" class="btn btn-danger btn-sm" style="text-decoration: none!important;">
                        Jag godkänner inte
                    </a>
                </div>
            </div>
        </div>

        <?php include '../includes/modals.php'; ?>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="<?php echo $host;?>/assets/js/editormd.js"></script>
        <script src="<?php echo $host;?>/assets/js/linked_popovers.js"></script>
        <script src="<?php echo $host;?>/assets/js/cookie-popup.js"></script>
        <script src="<?php echo $host;?>/assets/js/backtotop.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/marked.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/prettify.min.js"></script>
        
        <script type="text/javascript">
            $(function() {
                var testView = editormd.markdownToHTML("test-markdown-view", {
                    htmlDecode : true,  // Enable / disable HTML tag encode.
                    toc: true,
                    tocm: true,    // Using [TOCM]
                    tocContainer: "#custom-toc-container",
                    htmlDecode : "style,script,iframe,applet,link,form,body,button,video,math",  // Note: If enabled, you should filter some dangerous HTML tags for website security.
                });
            });

            $(function () {
                $('[data-toggle="popover"]').popover({ trigger: "hover focus" })
            })

            xhttp.open("POST", "http://10.130.216.101/TP/api.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("nyckel=<?php echo $api;?>&tjanst=wiki&typ=JSON&wiki=9");

            const pasteBox = document.getElementById("confirmation_phrase");
            pasteBox.onpaste = e => {
                e.preventDefault();
                return false;
            };

            $('#deactivate-user').on('shown.bs.modal', function(e) {

                var my_id_value = $(e.relatedTarget).data('id');
                $(".modal-body #user_id").val(my_id_value);

            });

            <?php 
            if(isset($_SESSION["delete_account"]) && $_SESSION["delete_account"] == "true"){
                echo 
                "
                    $('#remove-account-check').modal({
                        show: true
                    })

                $('#remove-account-check').on('hide.bs.modal', function(){
                    var xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        document.location = '".$host."/functions/delete_account.php';
                    }
                    xhr.open('GET', '".$host."/functions/delete_account.php', true);
                    xhr.send();
                });
                ";
            }
            ?>
        </script>