<?php
class instances{
    static public function ajoutInstance(){
        if(isset($_POST['submit'])){ 
            $newProduct = new ProductsController();
            $newProduct->addProduct();
            }
    }

    static public function updateInstance(){
        
    if(isset($_POST['id'])){ 
        $existProduct = new ProductsController();
        $product = $existProduct->getOneProduct();
    }else{
        Redirect::to('home');
    }
    if(isset($_POST['submit'])){ 
        $existProduct = new ProductsController();
        $existProduct->updateProduct();
        }
        return isset($_POST['id']) ? $product : [];
    }


    static public function deleteInstance(){
        if(isset($_POST['id'])){ 
            $existProduct = new ProductsController();
            $existProduct->deleteProduct();
            }
    }

    // static public function showInstance(){
    //     include 'DB.php';

    //     $sqlQuery = "SELECT nom FROM categorie";
    //     $categoriesnom = $mysqlClient->prepare($sqlQuery);
    //     $categoriesnom->execute();
        
    // }



}
?>