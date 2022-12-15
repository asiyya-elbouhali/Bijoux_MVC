<?php

class ProductsController{
    
    public function getAllProducts(){
        $products = Product::getAll();
        return $products;
    }

    public function getOneProduct(){
        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id']
            );
            $product = Product::getProduct($data);
        return $product;
        }
        
    }


    public function findProduct(){
        if(isset($_POST['search'])){
            $data = array('search' => $_POST['search']);
        }
        $products = Product::searchProduct($data);
        return $products;
    }


    public function addProduct(){


//         $picname=$_FILES['image']['name'];
//         $pictmpname=$_FILES['image']['tmp_name'];


        
// //   traitement de la photo
        


// if($_FILES['image']['error']===0){

//     if($_FILES['image']['size']>100000000){
//         $em = "sorry your file is too large";
//                 Redirect::to('add');

//     }else{
//         $img_ex = pathinfo($picname, PATHINFO_EXTENSION);
//         $img_ex_lc = strtolower($img_ex);
  
//         $allowed_exs=array("jpg","jpeg","png");
  
//         if(in_array($img_ex_lc,$allowed_exs)){
  
//             $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
//             $img_upload_path='uploads/'.$new_img_name;
//             move_uploaded_file($pictmpname,$img_upload_path);
//         }else{
  
//             $em="only jpg,jpeg,png extensions are allowed";
//                 Redirect::to('add');
//         }
//     }
//   }else{
//     $em="erreur lors d'importation de photo l'image";
//     Redirect::to('add');
// }

//   unset($_FILES['image']['name']); // initialiser la variable 


        if (isset($_POST['add'])){

            $target_dir = "uploads/";
            $img = $_FILES["image"]["name"];
            $target_file = $target_dir . basename($img);
            


            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                $data = array(
                    'libelle' => $_POST['nom'],
                    'prix' => $_POST['prix'],
                    'quantite' => $_POST['quantite'],
                    'descriptif' => $_POST['description'],
                    'img' => $img,
                );
                $result = Product::add($data);
                Redirect::to('home');
            };
                
            


        //     $data = array(
        //         'libelle' => $_POST['nom'],
        //         'prix' => $_POST['prix'],
        //         'quantite' => $_POST['quantite'],
        //         'descriptif' => $_POST['description'],
        //         'img' => $_POST['image'],
        //     );
        // $result = Product::add($data);
        if($result === 'ok'){
            Session::set('success','Produit ajouté');
                Redirect::to('home');
        }else{
            echo $result;
        }
      }
    }



    // public function updateProduct()
    // {
    //     if (isset($_POST['submit'])) {
    //             $target_dir = "uploads/";
    //             $img = $_FILES["image"]["name"];
    //             $target_file = $target_dir . basename($img);

    //             if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //                 $data = array(
    //                     'id' => $_POST['id'],
    //                     'libelle' => $_POST['nom'],
    //                     'prix' => $_POST['prix'],
    //                     'quantite' => $_POST['quantite'],
    //                     'descriptif' => $_POST['description'],
    //                     'img' => $img,
    //                 );
    //                 $result = Product::update($data);
    //             }
    //                 Session::set('success', 'Produit modifié');
    //                 Redirect::to('home');
                    
            
    //     }
    // }












    public function updateProduct()
    {
        if (isset($_POST['submit'])) {
                $target_dir = "uploads/";
                $img = $_FILES["image"]["name"];
                $target_file = $target_dir . basename($img);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data = array(
                        'id' => $_POST['id'],
                        'libelle' => $_POST['nom'],
                        'prix' => $_POST['prix'],
                        'quantite' => $_POST['quantite'],
                        'descriptif' => $_POST['description'],
                        'img' => $img,
                    );
                    $result = Product::update($data);
                }else{
                    $data = array(
                        'id' => $_POST['id'],
                        'libelle' => $_POST['nom'],
                        'prix' => $_POST['prix'],
                        'quantite' => $_POST['quantite'],
                        'descriptif' => $_POST['description'],
                        'img' => '',
                    );
                    $result = Product::update($data);
                }
                Session::set('success', 'Produit modifié');
                Redirect::to('home');    
        }
    }








     public function deleteProduct(){
    if(isset($_POST['id'])){
            $data['id'] = $_POST['id'];
            $result = Product::delete($data);
            if($result === 'ok'){
                Session::set('success','Produit sypprimé');

                Redirect::to('home');

            }else{
                echo $result;
            }
    }
 }





}

$add = new ProductsController();
$add->addProduct();
?>