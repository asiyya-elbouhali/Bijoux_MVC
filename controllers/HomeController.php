<?php


class Homecontroller{

    public function index($page){
        include('views/'.$page.'.php');
    }
}


?>