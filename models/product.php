<?php

class Product {
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM produit');
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt = null;
    }


    static public function getProduct($data){
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM produit WHERE id=:id'; 
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id"=>$id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            return $product;
        }catch(PDOException $ex){
            echo 'erreur' . $ex->getMessage();
        }
    }

    static public function add($data) {
    $stmt = DB::connect()->prepare('INSERT INTO produit(libelle,prix,quantite,descriptif , img) VALUES(:libelle,:prix,:quantite,:descriptif,:img)');
    $stmt->bindParam(':libelle',$data['libelle']);
    $stmt->bindParam(':prix',$data['prix']);
    $stmt->bindParam(':quantite',$data['quantite']);
    $stmt->bindParam(':descriptif',$data['descriptif']);
    $stmt->bindParam(':img',$data['img']);
    
    if($stmt->execute()){
        return 'ok';
    }else{
        return 'error';
    }
    // $stmt-> close();
    //     $stmt = null;
}



static public function update($data) {
        $stm = 'UPDATE produit SET libelle=:libelle,prix =:prix ,quantite =:quantite ,img = :img,descriptif =:descriptif WHERE id = :id';
        $stm0 = 'UPDATE produit SET libelle=:libelle,prix =:prix ,quantite =:quantite ,descriptif =:descriptif WHERE id = :id';
        if($data['img'] === ""){
            $stmt = DB::connect()->prepare($stm0);
            $stmt->bindParam(':id',$data['id']);
            $stmt->bindParam(':libelle',$data['libelle']);
            $stmt->bindParam(':prix',$data['prix']);
            $stmt->bindParam(':quantite',$data['quantite']);
            $stmt->bindParam(':descriptif',$data['descriptif']);
        }else{
            $stmt = DB::connect()->prepare($stm);
            $stmt->bindParam(':id',$data['id']);
            $stmt->bindParam(':libelle',$data['libelle']);
            $stmt->bindParam(':prix',$data['prix']);
            $stmt->bindParam(':quantite',$data['quantite']);
            $stmt->bindParam(':img',$data['img']);
            $stmt->bindParam(':descriptif',$data['descriptif']);

        }
    
    if($stmt->execute()){
        return 'ok';
    }else{
        return 'error';
    }
    // $stmt-> close();
    //     $stmt = null;
}



static public function delete($data){
        $id = $data['id'];
        try{
            $query = 'DELETE FROM produit WHERE id=:id'; 
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id"=>$id));
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
           
        }catch(PDOException $ex){
            echo 'erreur' . $ex->getMessage();
        }
}


static public function searchProduct($data){
    $search = $data['search'];
    try{
        $query = 'SELECT * FROM produit WHERE libelle LIKE ?  '; 
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array('%'.$search.'%'));
        $produit = $stmt->fetchAll();
        return $produit;
    }catch(PDOException $ex){
        echo 'erreur' . $ex->getMessage();
    }

}


}

?>