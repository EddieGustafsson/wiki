<?php
include "../includes/settings.php";
include "../functions/get_title.php";

$page_title = 'FAQ';

function faq($question, $answer){
    $id = uniqid();
    echo 
    '
    <div class="card">
        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-'.$id.'" aria-expanded="true" aria-controls="collapse-'.$id.'">
            '.$question.'
            </button>
        </h2>
        </div>

        <div id="collapse-'.$id.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
            '.$answer.'
            </div>
        </div>
    </div>
    ';
}

include '../includes/head.php';
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
                            <div class="col-8">
                                <h3> Frequently Asked Questions</h3>
                                <p><i>Svar på ofta förekommande frågor</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="float-left mb-2">
                                    <form class="form-inline">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input id="faqFilter" onkeyup="faqSearch()" type="text" class="form-control" placeholder="Sök efter frågor..." aria-label="Search" aria-describedby="basic-addon1">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="accordion" id="accordionExample">

                                    <?php 
                                        faq('Lorem ipsum dolor sit amet?', 'Consectetur adipiscing elit. Fusce volutpat ipsum ante. Nunc at blandit est. Nam laoreet, nunc vel fermentum aliquet, augue augue consequat orci, sit amet pellentesque metus tellus nec massa. Suspendisse in bibendum quam. Nam ultricies lacus lectus, a tristique est rutrum in. Morbi sed nunc iaculis mi consequat congue. Pellentesque lacinia sed nibh a mattis. Aenean lacinia nibh vitae venenatis aliquet. Aenean semper eros arcu, non tempor sem imperdiet et. Curabitur vitae leo a neque pulvinar ornare. Duis enim sem, dapibus vitae dolor in, suscipit dignissim mauris.');
                                        faq('Nam interdum eros ut arcu blandit eleifend?', 'Aenean libero purus, pulvinar id libero sit amet, ullamcorper ultricies ipsum. Integer scelerisque lorem diam, vitae euismod orci finibus id. Duis ultrices rhoncus lorem non varius. Praesent sed congue ante. Nam nec vulputate quam, id mattis velit. Quisque ut varius magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent blandit vulputate laoreet. Nam lobortis facilisis tortor id posuere. Duis magna ante, sodales a dui eu, dignissim vestibulum elit. ');
                                        faq('Sed ut vestibulum nisl?','Sit amet dictum nulla. Etiam auctor dapibus consequat. Integer eget suscipit urna. Donec vel tincidunt dui. Mauris a volutpat quam. Donec a semper magna. Ut nec consectetur tortor. Aenean egestas urna sed purus rhoncus suscipit. Pellentesque faucibus aliquet mauris a porttitor. Suspendisse congue justo in magna mollis pharetra. Cras lorem mi, dapibus vel luctus id, cursus cursus nisl. Quisque luctus auctor sem in pellentesque. Cras et nibh eget nisi commodo aliquam eu sit amet est. Aliquam sit amet dolor vitae felis imperdiet gravida eget vel quam.');
                                        faq('Vivamus sit amet rhoncus tortor?', 'Bitae sagittis nisl. Nulla aliquam augue ante. Aenean cursus viverra ex id ullamcorper. Mauris nec velit purus. Sed ligula neque, aliquet eget ullamcorper a, mattis ac dui. Sed nibh urna, maximus eu fermentum eu, aliquet non sapien. Donec a purus mi. Fusce dictum ac quam nec scelerisque. ')
                                    ?>

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