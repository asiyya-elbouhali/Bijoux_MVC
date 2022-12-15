<?php

class UsersController {
 
    public function auth() {

        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = User::login($username, $password);
            return $admin;
        }
    }



//     public function auth(){
//         if(isset($_POST['submit'])){
//             $data['username'] = $_POST['username'];
//             $result = User::login($data);
//             if($result->username === $_POST['username'] && password_verify($_POST['password'],$result->password)){
//             $_SESSION['logged'] = true;
//             $_SESSION['username'] = $result->username;
//             Redirect::to('home'); 
//             }else{
//                 Session::set('error','Pseudo ou mot de passe irroné');
//                 Redirect::to('login');
//             }
//     }
// }




    


    public function register(){

        if(isset($_POST['submit'])){
            
            $password = md5($_POST['password']);
            $data = array(
                'fullname' => $_POST['fullname'],
                'username' => $_POST['username'],
                'password' => $password
            );
        $result = User::createUser($data);
        if($result === 'ok'){
            Session::set('success','Compte crée');
                Redirect::to('login');
        }else{
            echo $result;
        }
      }
    }

}

// function logging() {
//     if(isset($_POST['login'])) {
//         $admin = new UsersController();
//         $data = $admin->auth();
//         if($data){
//             $_SESSION['logged'] = $data['username'];
//         }
//     }
// }
// logging();
    if(isset($_POST['submit'])){ 
    $createUSer = new UsersController();
    $createUSer->register();
    }

    
    if(isset($_POST['find'])){ 
        $data = new ProductsController();
        $products = $data->findProduct();
        }else{ 
        $data = new ProductsController();
        $products = $data->getAllProducts();
        }



if(isset($_POST['login'])) {
    ob_start();
    $admin = new UsersController();
    $data = $admin->auth();
    
    if($data){
        $_SESSION['logged'] = $data['username'];
        header('Location:' . BASE_URL);
    }
    ob_get_clean();
    
}
?>