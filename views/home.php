<?php

require_once 'controllers/UsersController.php';

?>


<div class="container">
    <!-- <h2><?php echo $_SESSION['logged'] ?></h2> -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card" >
                <div class="card-body bg-light " style="overflow-x: scroll;">
                    <a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-primary mr-2">
                    
                    <i class="fas fa-plus"></i>
                    <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2">
                    <i class="fas fa-home"></i>
                    </a>
                    </a> <form class="float-right mb-2 d-flex flex-row" method="post">
                        <input type="text" class="form-control" name="search" placeholder="Recherche">
                        <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search" ></i></button>
                    </form>
                                <table class="table table-hover  " style="overflow: scroll;" >
                        <thead>
                            <tr >
                            <th scope="col">Nom du produit</th>
                            <th scope="col">Image </th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Descriptif</th>
                            <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody >

                            <?php foreach ($products as $produit): ?><tr>

                            <th scope="row"><?php echo $produit['libelle']; ?> </th>
                            <td> <img style="height: 100px; width: 100px;" src="uploads/<?=$produit['img']?>" alt=""> </td>
                            <td><?php echo $produit['prix']; ?></td>
                            <td><?php echo $produit['quantite']; ?></td>
                            <td><?php echo $produit['descriptif']; ?></td>
                            <td class="d-flex flex-row">
                                <form method="post" class="mr-1" action="update">
                                    <input type="hidden" name="id" value=" <?php echo $produit['id']; ?>">
                                     <button class="btn  btn-sm btn-warning"> <i class="fa  fa-edit"></i></button>
                                </form>
                                <form method="post" class="mr-1" action="delete">
                                    <input type="hidden" name="id" value="  <?php echo $produit['id'] ;?> ">
                                     <button class="btn  btn-sm btn-danger"> <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                        </table>
                </div>
            </div>

        </div>

    </div>

    </div>