<?php

//l'ajout d'un noveau produit
if (isset($_POST['nomproduit']) && isset($_POST['quantiteproduit']) && isset($_POST['categorieproduit']) && isset($_POST['prixproduit'])){

    $productid=$_POST['idproduit'];
    //connexion a la base de donnes
    require 'db_conn.php';

    $nomproduit=$_POST['nomproduit'];
    $quantiteproduit=$_POST['quantiteproduit'];
    $categorieproduit=$_POST['categorieproduit'];
    $prixproduit=$_POST['prixproduit'];


       $sqlQuery = "SELECT id FROM categorie WHERE nom = :categorie";

       $getcategorieid = $mysqlClient->prepare($sqlQuery);
       $getcategorieid->execute([
       'categorie' => $categorieproduit,
       ]);



       if($_FILES['picproduitt']!=null && !empty($_FILES['picproduitt'])){

           $picname=$_FILES['picproduitt']['name'];
           $pictmpname=$_FILES['picproduitt']['tmp_name'];


           //traitement de la photo



    if($picname!=null && $pictmpname!=null){

      if($_FILES['picproduitt']['size']>100000000){
          $em = "sorry your file is too large";
          unset($_FILES['picproduitt']);
          header("Location: add.php?error=$em");
      }else{
          $img_ex = pathinfo($picname, PATHINFO_EXTENSION);
          $img_ex_lc = strtolower($img_ex);

          $allowed_exs=array("jpg","jpeg","png");

          if(in_array($img_ex_lc,$allowed_exs)){

              $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
              $img_upload_path='uploads/'.$new_img_name;
              move_uploaded_file($pictmpname,$img_upload_path);
          }else{

              $em="only jpg,jpeg,png extensions are allowed";
              unset($_FILES['picproduitt']);
              header("Location: add.php?error=$em");
          }
      }
    }else{
      $categoriid = $getcategorieid->fetch();

        $sqlQuery = 'UPDATE produit SET libelle=:nomproduit, quantite=:quantiteproduit, id_categorie=:categorieproduit, prix=:prixproduit WHERE id=:productid';
      
      
      $addproductStatement = $mysqlClient->prepare($sqlQuery);
      $addproductStatement->execute([
        'nomproduit' => $nomproduit,
        'quantiteproduit' => $quantiteproduit,
        'categorieproduit' => $categoriid['id'],
        'prixproduit' => $prixproduit,
        'productid'=>$productid,
      ]);
      unset($_FILES['picproduitt']);
      header("Location: gallery-gestion.php");
    }


    $categoriid = $getcategorieid->fetch();

    $sqlQuery = 'UPDATE produit SET libelle=:nomproduit, quantite=:quantiteproduit, id_categorie=:categorieproduit, prix=:prixproduit, img=:new_img_name WHERE id=:productid';


$addproductStatement = $mysqlClient->prepare($sqlQuery);
$addproductStatement->execute([
  'nomproduit' => $nomproduit,
  'quantiteproduit' => $quantiteproduit,
  'categorieproduit' => $categoriid['id'],
  'prixproduit' => $prixproduit,
  'new_img_name'=>$new_img_name,
  'productid'=>$productid,
]);
$_FILES['picproduitt'] = null;
header("Location: gallery-gestion.php");
}else{

  $categoriid = $getcategorieid->fetch();

    $sqlQuery = 'UPDATE produit SET libelle=:nomproduit, quantite=:quantiteproduit, id_categorie=:categorieproduit, prix=:prixproduit WHERE id=:productid';
  
  
  $addproductStatement = $mysqlClient->prepare($sqlQuery);
  $addproductStatement->execute([
    'nomproduit' => $nomproduit,
    'quantiteproduit' => $quantiteproduit,
    'categorieproduit' => $categoriid['id'],
    'prixproduit' => $prixproduit,
    'productid'=>$productid,
  ]);
  unset($_FILES['picproduitt']);
  header("Location: gallery-gestion.php");
   }
}else{
  $em="champs obligatoire non inscrit";
  header("Location: add.php?error=$em");
}
?>