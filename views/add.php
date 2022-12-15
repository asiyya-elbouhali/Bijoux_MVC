<?php
require_once 'controllers/productsController.php';
instances::ajoutInstance();

?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
  
            <div class="card mt-3">
                <div class="card-header"> Ajouter un nouveau produit</div>
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2">
                    <i class="fas fa-home"></i>
                    </a>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nom"> Nom du produit*</label>
                            <input type="text" name="nom" class="form-control" placeholder="produit">
                        </div>
                        <div class="form-group">
                            <label for="image"> Image*</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="prix"> Prix*</label>
                            <input type="number" name="prix" class="form-control" placeholder="prix">
                        </div>
                        <div class="form-group">
                            <label for="quantite"> Quantité*</label>
                            <input type="number" name="quantite" class="form-control" placeholder="quantite">
                        </div>
                        <div class="form-group">
                            <label for="description"> Description*</label>
                            <input type="text" name="description" class="form-control" placeholder="description">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2" name="add"> Ajouter</button>
                        </div>

                    </form>                              
                </div>
            </div>
        </div>
    </div>

    </div>