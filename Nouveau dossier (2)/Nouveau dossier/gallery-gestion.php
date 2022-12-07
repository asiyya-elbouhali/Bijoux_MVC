<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css ?v=<?php echo time(); ?>
">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>   
        <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,100&family=Rubik+Distressed&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>



<nav class="navbar navbar-expand-lg black-nav ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> <img src="img/LOGOO.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img src="img/toggle.png" alt="" style="height: 40px ;">

          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="index.html">Home</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="gestion.html">Se connecter</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>



      



<?php 

include 'db_conn.php';

 $sqlQuery = "SELECT nom FROM categorie";
  $categoriesnom = $mysqlClient->prepare($sqlQuery);
  $categoriesnom->execute();


?>
<form method="POST" action="gallery-gestion.php" class="selection-all" >
<select class="form-select mb-3" aria-label="Default select example" name="categorieproduit">
      <option selected value="all">all</option>
      <?php
      foreach($categoriesnom as $categorinom){
      ?>
      <option  value="<?php echo $categorinom["nom"]; ?>"><?php echo $categorinom["nom"]; ?></option>
      <?php
      }
      ?>
</select>
<button type="submit" class="btn btn-primary">Filtrer</button>
</form>

<?php

if(isset($_POST['categorieproduit'])){
    $categorieproduit=$_POST['categorieproduit'];

    if($categorieproduit=="all"){

        $sqlQuery = "SELECT * FROM produit";

   $products = $mysqlClient->prepare($sqlQuery);
   $products->execute();?>
   <div class="carte">
  <?php
   foreach ($products as $product) {
   ?>

   <div class="card card2 col-md-5 col-lg-3 col-sm-10" id="<?=$product['id']?>" style="width: 18rem;">
    <img src="uploads/<?=$product['img']?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?=$product['libelle']?></h5>
      <h4><?=$product['prix']?>,00 DH</h4>
      <h4>Qté: <?=$product['quantite']?></h4>

      <a href="supp.php?idproduit=<?=$product['id']?>">   
      <svg  xmlns="http://www.w3.org/2000/svg"   width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
    </a>
      <a href="modify.php?idproduit=<?=$product['id']?>">
      <svg xmlns="http://www.w3.org/2000/svg"  width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg>
    </a>
    </div>
   </div>
    <?php
   }?>
  </div>
<?php 
    }else{


        $sqlQuery = "SELECT id FROM categorie WHERE nom = :categorie";

   $getcategorieid = $mysqlClient->prepare($sqlQuery);
   $getcategorieid->execute([
  'categorie' => $categorieproduit,
   ]);

   foreach ($getcategorieid as $categoriid) {

   $sqlQuery = "SELECT * FROM produit WHERE id_categorie = :id";

   $productsid = $mysqlClient->prepare($sqlQuery);
   $productsid->execute([
  'id' => $categoriid['id'],
   ]);?>
   <div class="carte">
  <?php
   foreach ($productsid as $product) {
   ?>
   <div class="card card2 col-md-5 col-lg-3 col-sm-10" id="<?=$product['id']?>" style="width: 18rem;">
    <img src="uploads/<?=$product['img']?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?=$product['libelle']?></h5>
      <h4><?=$product['prix']?>,00 DH</h4>
      <h4>Qté: <?=$product['quantite']?></h4>
      <a href="supp.php?idproduit=<?=$product['id']?>">   
      <svg  xmlns="http://www.w3.org/2000/svg"  width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
    </a>
      <a href="modify.php?idproduit=<?=$product['id']?>">
      <svg xmlns="http://www.w3.org/2000/svg"  width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg>
    </a>
      
    </div>
   </div>
   <?php 
   }?>
   </div>
   <?php
    }
}
}else{

    $sqlQuery = "SELECT * FROM produit";

   $products = $mysqlClient->prepare($sqlQuery);
   $products->execute();
   ?>
   <div class="carte">
   <?php
   foreach ($products as $product) {
   ?>

    <div class="card card2 col-md-5 col-lg-3 col-sm-10" id="<?=$product['id']?>" style="width: 18rem;">
    <img src="uploads/<?=$product['img']?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?=$product['libelle']?></h5>
      <h4>Prix: <?=$product['prix']?>,00 DH</h4>
      <h4>Qté: <?=$product['quantite']?></h4>
      <a href="supp.php?idproduit= <?=$product['id']?>">
      <svg  xmlns="http://www.w3.org/2000/svg"  width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
    </a>
      <a href="modify.php?idproduit=<?=$product['id']?>">
      <svg xmlns="http://www.w3.org/2000/svg"  width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg>
    </a>
    </div>
   </div>
   <?php 
   }?>
   </div>
   <?php
}
?>




































































 
  


     
          



<!-- ************************************************************************************************* -->
<div class="footer">
        <div class="container">
            <div class="footer-cats row">
                <ul class="footer-cat  col-md-5 col-lg-3 col-sm-10">
                    <li class="footer-titles"> Contact</li>
                    <a href="#">
                        <li> support@gaming-store.com</li>
                    </a>
                </ul>
                <ul class="footer-cat  col-md-5 col-lg-3 col-sm-10">
                    <li class="footer-titles "> Company info</li>
                    <a href="#">
                        <li> About Us</li>
                    </a>
                    <a href="#">
                        <li> Contact Us</li>
                    </a>
                    <a href="#">
                        <li> Privacy Policy</li>
                    </a>
                    <a href="#">
                        <li> Terms & Conditions</li>
                    </a>
                    <a href="#">
                        <li> COVID-19 UPDATE</li>
                    </a>
                </ul>
                <ul class="footer-cat  col-md-5 col-lg-3 col-sm-10">
                    <li class="footer-titles"> Purchase info</li>
                    <a href="#">
                        <li> FAQs</li>
                    </a>
                    <a href="#">
                        <li> Payment Methods</li>
                    </a>
                    <a href="#">
                        <li> Shipping & Delivery</li>
                    </a>
                    <a href="#">
                        <li> Returns Policy</li>
                    </a>
                    <a href="#">
                        <li> Tracking</li>
                    </a>
                </ul>
                <ul class="footer-cat  col-md-5 col-lg-3 col-sm-10" >
                    <li class="footer-titles"> Join us On</li>
                    <li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path></svg></li>
                    <li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path></svg></li>
                    <li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path></svg></li>

                </ul>
            </div>

<div class="pay">
    <p>PAYMENT METHODS:</p>
    <img src="img/f1.png" alt="">
    <img src="img/f2.png" alt="">
    <img src="img/f3.png" alt="">
    <img src="img/f4.png" alt="">
    <img src="img/f8.png" alt="">
    <img src="img/f9.png" alt="">


</div>

            <div class="copyright">
                <p>© Copyright 2022. All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>

</html>