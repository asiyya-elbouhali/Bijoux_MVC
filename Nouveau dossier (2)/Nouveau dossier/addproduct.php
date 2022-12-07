<?php

//l'ajout d'un noveau produit

if (isset($_POST['nomproduit']) && isset($_POST['quantiteproduit']) && isset($_POST['categorieproduit']) && isset($_POST['prixproduit']) && isset($_FILES['picproduit'])){

    require 'db_conn.php';

    $nomproduit=$_POST['nomproduit'];
    $quantiteproduit=$_POST['quantiteproduit'];
    $categorieproduit=$_POST['categorieproduit'];
    $prixproduit=$_POST['prixproduit'];

    $picname=$_FILES['picproduit']['name'];
    $pictmpname=$_FILES['picproduit']['tmp_name'];


  
//verification la non existence prealable de produit

$sqlQuery = "SELECT libelle FROM produit WHERE libelle = :nomproduit";

$productver = $mysqlClient->prepare($sqlQuery);
$productver->execute([
  'nomproduit' => $nomproduit,
]);

$ver = $productver->fetch(); 


if ($ver) {
  $em="Le produit  déja ajouté !!";
  header("Location: add.php?error=$em");
}else{


  //traitement de la photo



if($_FILES['picproduit']['error']===0){

  if($_FILES['picproduit']['size']>100000000){
      $em = "sorry your file is too large";
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
          header("Location: add.php?error=$em");
      }
  }
}else{
  $em="erreur lors d'importation de photo l'image";
  header("Location: add.php?error=$em");
}

unset($_FILES['picproduit']); // initialiser la variable 

// donner l'id de la categorie au produit ajouté 

$sqlQuery = "SELECT id FROM categorie WHERE nom = :categorie";

$getcategorieid = $mysqlClient->prepare($sqlQuery);
$getcategorieid->execute([
  'categorie' => $categorieproduit,
]);


foreach ($getcategorieid as $categoriid) { 

  $sqlQuery = 'INSERT INTO produit(libelle, quantite, id_categorie, prix, img) VALUES (:nomproduit, :quantiteproduit, :categorieproduit, :prixproduit, :new_img_name)';


$addproductStatement = $mysqlClient->prepare($sqlQuery);
$addproductStatement->execute([
  'nomproduit' => $nomproduit,
  'quantiteproduit' => $quantiteproduit,
  'categorieproduit' => $categoriid['id'],
  'prixproduit' => $prixproduit,
  'new_img_name'=>$new_img_name,
]);
}

header("Location: gallery-gestion.php");
}
}else{

  $em="champs obligatoir non inscrit";
  header("Location: add.php?error=$em");
}
?>
