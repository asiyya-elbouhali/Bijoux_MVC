<?php
require_once 'controllers/UsersController.php';

?>

 
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Connexion</h3>

                </div>
                <div class="card-body bg-light">
                <form method="post" class="mr-1" >
                    <div class="form-group">
                    <input type="text" name="username" placeholder="Pseudo" class="form-control">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                    </div>
                    <button name="login" class="btn  btn-sm btn-primary"> Connexion</button>
                    </form>
                </div> 
                <div class="card-footer">
                    <a href="<?php echo BASE_URL; ?>register" class="btn btn-link">inscription</a>
                </div>
            </div>

        </div>

    </div>

    </div>