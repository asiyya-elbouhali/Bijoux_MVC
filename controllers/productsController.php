<?php

class ProductsController{
    
    public function getAllProducts(){
        $products = Product::getAll();
        return $products;
    }

}

?>