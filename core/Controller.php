<?php
class Controller{
    public function view($view, $data=[]){
        extract($data);
        require "../App/views/$view.php";
    }
    public function requireLogin(){
        if(empty($_SESSION['user_id'])){
            header('location: /JOURNALAPP/public/login');
            exit;
        }
    }
}