<?php

class Product {
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM produit');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
}

?>