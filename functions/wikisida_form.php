<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    </head>
    <body>
        <div id="wikisida-form" class="wikisida-form">

            <div id="skapa-wikisida" class="skapa-wikisida">
                <h4>Skapa wikisida</h4>

                <form action="http://10.130.216.101/TP/api.php" method="POST">
                    <input type='hidden' name='nyckel' value='JIOAJWWNPA259FB2'/>
                    <input type='hidden' name='tjanst' value='wiki'/> 
                    <input type='hidden' name='typ' value='function'/>
                    <input type='hidden' name='handling' value='skapa'/>
                    <input type='hidden' name='funktion' value='skapaWikiUppdatering'/>
                    <input type="hidden" name="wikiId" value="6">

                    Sid id: <input type="text" name="sidId"><br>
                    Bidragare: <input type="text" name="bidragsgivare"><br>
                    Titel: <input type="text" name="titel"><br>
                    Innehåll: <input type="text" name="innehall"><br>

                    <input type="submit" value="Skapa wikisida">
                </form>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>















