<footer class="footer mt-auto py-3">
            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-header">
                    © 2019 Marvel Wiki
                    </div>
                    <div class="card-body">
                        <p class="card-text">Test footer.</p>
                    </div>
                </div>
            </div>
        </footer>

        <?php include '../includes/modals.php'; ?>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!--<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.3/lib/darkmode-js.min.js"></script>-->
        <script src="/Wiki/assets/js/editormd.js"></script>
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

            function getTitle(title){
                for(i = 0; i < jsonData.sidor.length; i++){

                    if(jsonData.sidor[i].innehall.toLowerCase() == title.toLowerCase()){
                        return i;
                    }

                }
            }

            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {

                    jsonData = JSON.parse(this.responseText);

                    let title = "Avengers";

                    let page_id = getTitle(title);

                    console.log(page_id);

                    let desc = jsonData.sidor[0].innehall; //0 bör ändras till page_id

                    let maxLength = 200; // maximum number of characters to extract

                    //trim the string to the maximum length
                    let trimmedString = desc.substr(0, maxLength);

                    //re-trim if we are in the middle of a word
                    trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")));
                    trimmedString = trimmedString.replace(/#|>/g,'');
                    //trimmedString = trimmedString.replace(/ \"[\s\S]*?\"/g, ''); //Trims Citations

                    var popover = $('[data-toggle="popover"]');

                    popover.attr("data-content",trimmedString + "...").data('popover').setContent();

                    popover.data('popover').$tip.addClass(popover.data('popover').options.placement);
                    
                }

            };

            xhttp.open("POST", "http://10.130.216.101/TP/api.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("nyckel=JIOAJWWNPA259FB2&tjanst=wiki&typ=JSON&wiki=3");

            new Darkmode({ 
                label: '🌓',
            }).showWidget();

            const pasteBox = document.getElementById("no-paste");
            pasteBox.onpaste = e => {
                e.preventDefault();
                return false;
             };
        </script>