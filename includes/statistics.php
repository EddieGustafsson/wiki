<div class="row">
    <div class="col">
        <div class="shadow card bg-success text-white h-100 rounded">
            <div class="card-body bg-success">
                <div class="rotate">
                    <i class="fa fa-user fa-lg"></i>
                </div>
                <h6 class="text-uppercase">Användare</h6>
                <h1><?php echo sizeof($user_list['anvandare']); ?></h1>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="shadow card text-white bg-danger h-100 rounded">
            <div class="card-body bg-danger">
                <div class="rotate">
                    <i class="far fa-sticky-note fa-lg"></i>
                </div>
                <h6 class="text-uppercase">Artiklar</h6>
                <h1><?php echo $page_tot;?></h1>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="shadow card text-white bg-info h-100 rounded">
            <div class="card-body bg-info">
                <div class="rotate">
                    <i class="fa fa-twitter fa-lg"></i>
                </div>
                <h6 class="text-uppercase">Ändringar</h6>
                <h1>125</h1>
            </div>
        </div>
    </div>
</div>