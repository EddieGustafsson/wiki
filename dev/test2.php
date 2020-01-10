<link rel="icon" href="/Wiki/assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="/Wiki/assets/css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

 <button type="button" class="btn btn-outline-warning btn-sm identify_user" data-toggle="modal" data-target="#deactivate-user" data-id="5">Deaktivera Konto</button>
 
 <!-- Deactivate user -->

 <div class="modal fade" tabindex="-1" id="deactivate-user" role="dialog" aria-labelledby="deactivate-user" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deactivate-useri">Är du säker på att du vill göra det här?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="'.$host.'/functions/deactivate_user.php" method="POST">
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Detta är oerhört viktigt.
                                </div>
                                <ul>
                                    <li>Detta konto kommer att <strong>deaktiveras</strong>.</li>
                                    <li>Ett deaktiverat konto kommer <strong>inte vara tillgängligt</strong> för användaren</li>
                                    <li>Kontot måste aktiveras av en admin igen för att användaren ska få tillgång</li>
                                </ul> 
                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-danger btn-lg">Deaktivera konto</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $('#deactivate-user').on('shown.bs.modal', function(e) {

        var my_id_value = $(e.relatedTarget).data('id');
        $(".modal-body #user_id").val(my_id_value);

    });
</script>
