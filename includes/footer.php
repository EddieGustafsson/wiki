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
                                        <li><a href="<?php echo $host;?>/hem">Hem</a></li>
                                        <li><a data-toggle="modal" data-target="#login" href="#">Logga in</a></li>
                                        <li><a href="<?php echo $host;?>/_random">Slumpa en artikel</a></li>
                                        <li><a href="<?php echo $host;?>/_showall">Alla sidor</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm">
                                    <h4 class="card-text">Hjälp</h4>
                                    <ul>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Kontakta oss</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <small><a href="#">Integritetspolicy</a> &#8226 © 2019 Marvel Wiki &#8226 <a href="#">Användarvillkor</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="alert text-center cookiealert" role="alert">
            <b>Gillar du kakor?</b> &#x1F36A; Vi använder cookies för att säkerställa att du får den bästa upplevelsen på vår webbplats. <a href="https://cookiesandyou.com/" target="_blank">Läs mer</a>

            <button type="button" class="btn btn-danger btn-sm acceptcookies" aria-label="Close">
                Jag godkänner
            </button>
        </div>

        <?php include '../includes/modals.php'; ?>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="<?php echo $host;?>/assets/js/editormd.js"></script>
        <script src="<?php echo $host;?>/assets/js/linked_popovers.js"></script>
        <script src="<?php echo $host;?>/assets/js/cookie-popup.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/marked.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/editor.md@1.5.0/lib/prettify.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var testView = editormd.markdownToHTML("test-markdown-view", {
                    htmlDecode : true,  // Enable / disable HTML tag encode.
                    toc: true,
                    tocm: true,    // Using [TOCM]
                    tocContainer: "#custom-toc-container",
                    // htmlDecode : "style,script,iframe",  // Note: If enabled, you should filter some dangerous HTML tags for website security.
                });
            });

            $(function () {
                $('[data-toggle="popover"]').popover({ trigger: "hover focus" })
            })

            xhttp.open("POST", "http://10.130.216.101/TP/api.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("nyckel=nx06YHDvPELOArYg&tjanst=wiki&typ=JSON&wiki=8");

            const pasteBox = document.getElementById("no-paste");
            pasteBox.onpaste = e => {
                e.preventDefault();
                return false;
             };
        </script>