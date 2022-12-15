<?php

class User{


    static public function login($username , $password) {

        try {
            $query = 'SELECT * FROM users   WHERE username = :username AND password = :password';
        $stmt = DB::connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $admin = $stmt->fetch();
        return $admin;
        }catch (PDOException $ex) {
            return 'error' . $ex->getMessage();
        }

    }






    static public function createUser($data){ 

    $stmt = DB::connect()->prepare('INSERT INTO users(fullname,username,password) VALUES(:fullname,:username,:password)');
    $stmt->bindParam(':fullname',$data['fullname']);
    $stmt->bindParam(':username',$data['username']);
    $stmt->bindParam(':password',$data['password']);
    if($stmt->execute()){
        return 'ok';
    }else{
        return 'error';
    }
}




}

?>