<?php 

include '../includes/settings.php';
include '../functions/search.php';
include "../includes/settings.php";


if(isset($_GET['query'])){

    $find = array("'",'"'); // Removes ", '
    $query = str_replace($find,"",$_GET['query']);
    
    $search_array = getSearch($query);

    $msg = $search_array['msg'];

    if(!isset($search_array['code'])){
        for($i = 0; $i < sizeof($search_array); $i++){
            if(strtolower($search_array[$i]) == strtolower($query)){
                header("location: ".$host."/".$query."");
            }
        }
    }

    // use get variable to paging number
    $page = !isset($_GET['page']) ? 1 : $_GET['page'];
    $limit = 5; // five rows per page
    $offset = ($page - 1) * $limit; // offset
    $total_items = count($search_array); // total items
    $total_pages = ceil($total_items / $limit);
    $final = array_splice($search_array, $offset, $limit); // splice them according to offset and limit

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
                                
                                if($query != "" && $msg != "hittade inget"){
                                    echo "<p><strong>".sizeof($search_array)."</strong> resultat hittades för sökningen efter <strong>".$query."</strong></p>";
                                } else {
                                    echo '<p><strong>Inget</strong> resultat hittades för sökningen efter "<strong>'.$query.'</strong>"</p>';
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4" style="border-right: 1px solid rgba(0,0,0,.125);">
                                <h4><i class="fa fa-filter fa-sm"></i> Filter</h4>
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
                                        <?php if($query != "" && $msg != "hittade inget"): ?>

                                            <?php foreach($final as $key): ?>
                                                <tr>
                                                    <td><a href="<?php echo $host?>/<?php echo !is_array($key) ? $key : implode(',', $key);?>"><?php echo !is_array($key) ? $key : implode(',', $key); ?></a></td>
                                                </tr>
                                            <?php endforeach; ?>

                                        <?php else: ?>

                                            <p><center>Inget resultat för din sökning.</center></p>
                                            <p><center><a href="<?php echo $host?>/<?php echo $query?>">Klicka här för att skapa en artikel för <strong><?php echo $query?></strong></a></center></p>

                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <br>
                                <?php if($query != "" && !isset($search_array['code'])): ?>
                                
                                    <div class="d-flex justify-content-center" style="margin-top:30px;">
                                        <nav aria-label="kundtjanster">
                                            <ul class="pagination">
                                                <?php if ($page > 1): ?>
                                                <li class="page-item"><a class="page-link" href="_search?query=<?php echo $query ?>&page=<?php echo $page-1 ?>">Tillbaka</a></li>
                                                <?php endif; ?>

                                                <?php if ($page > 3): ?>
                                                <li class="start"><a class="page-link" href="_search?query=<?php echo $query ?>&page=1">1</a></li>
                                                <li class="dots"><a class="page-link">. . .</a></li>
                                                <?php endif; ?>

                                                <?php if ($page-2 > 0): ?><li class="page-item"><a class="page-link" href="_search?query=<?php echo $query ?>&page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
                                                <?php if ($page-1 > 0): ?><li class="page-item"><a class="page-link" href="_search?query=<?php echo $query ?>&page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

                                                <li class="page-item active"><a class="page-link" href="_search?query=<?php echo $query ?>&page=<?php echo $page ?>"><?php echo $page ?></a></li>

                                                <?php if ($page+1 < $total_pages+1): ?><li class="page-item"><a class="page-link" href="_search?query=<?php echo $query ?>&page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
                                                <?php if ($page+2 < $total_pages+1): ?><li class="page-item"><a class="page-link" href="_search?query=<?php echo $query ?>&page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

                                                <?php if ($page < ceil($total_pages / $limit)-2): ?>
                                                <li class="dots"><a class="page-link">. . .</a></li>
                                                <li class="end"><a class="page-link" href="_search?query=<?php echo $query ?>&page=<?php echo ceil($total_pages / $limit) ?>"><?php echo ceil($total_pages / $limit) ?></a></li>
                                                <?php endif; ?>

                                                <?php if ($page < ceil($total_pages / $limit)): ?>
                                                <li class="page-item"><a class="page-link" href="_search?query=<?php echo $query ?>&page=<?php echo $page+1 ?>">Nästa</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </nav>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include '../includes/footer.php'; ?>

    </body>
</html>