<?php 

include '../includes/settings.php';
include '../functions/search.php';
include "../includes/settings.php";


if(isset($_GET['query'])){
    $query = $_GET['query'];
    $search_array = getSearch($query);

    if(!isset($search_array['code'])){
        for($i = 0; $i < sizeof($search_array); $i++){
            if($search_array[$i] == $query){
                header("location: ".$host."/".$query."");
            }
        }
    }

}

$page_title = 'Sök';

include '../includes/head.php';

?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);background-color: #fff;">
                        <li class="breadcrumb-item"><a href="<?php echo $host;?>/home">Hem</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $query; ?></li>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h1>Sökresultat</h1>
                                <?php 
                                
                                if($query != "" && !isset($search_array['code'])){
                                 echo "<p><strong>".sizeof($search_array)."</strong> resultat hittades för sökningen efter <strong>".$query."</strong></p>";
                                } else {
                                    echo "<p><strong>0</strong> resultat hittades för sökningen efter <strong>".$query."</strong></p>";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4" style="border-right: 1px solid rgba(0,0,0,.125);">
                                <h4>Filtera</h4>
                            </div>
                            <div class="col-8">
                                <form action="<?php echo $host;?>/_search" method="GET">
                                    <div class="input-group mb-3">
                                        <input name="query" type="text" value="<?php echo $query;?>" class="form-control" placeholder="Sök i Marvel Wiki" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sortera efter</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="btn-group"> 
                                            <button type="button" class="btn btn-outline-dark active"><i class="fa fa-list"></i></button> 
                                            <button type="button" class="btn btn-outline-dark"><i class="fa fa-th"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <table class="table table-striped">
                                    <tbody>
                                        <?php 
                                        if($query != "" && !isset($search_array['code'])){
                                            for($i = 0; $i < sizeof($search_array); $i++){

                                                $order = $i + 1;

                                                echo 
                                                '
                                                <tr>
                                                    <th scope="row">'.$order.'</th>
                                                    <td><a href="'.$host.'/'.$search_array[$i].'">'.$search_array[$i].'</a></td>
                                                </tr>
                                                ';
                                            }
                                        } else {
                                            echo 
                                            '
                                            <tr>
                                                <td><center>Inget resultat för din sökning.</center></td>
                                            </tr>
                                            ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <?php 
                                
                                if($query != "" && !isset($search_array['code'])){
                                    echo 
                                    '
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    ';
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include '../includes/footer.php'; ?>

    </body>
</html>