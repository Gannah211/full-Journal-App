<?php
class Controller{
    public function view($view, $data=[]){
        extract($data);
        require "../App/views/$view.php";
    }
}