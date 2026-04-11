<?php
require_once "../App/models/User.php";

class AuthController extends Controller{

    public function loginForm(){
        $this->view("auth/login");
    }

    public function login(){
        $username =$_POST['username'];
        $password = $_POST['password'];

        $userModel = new User();

        $user = $userModel->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
         header("Location: /JOURNALAPP/public/home");
        exit;
        }else{
            header("location: /JOURNALAPP/public/login?error=1");
            exit;
        }
       
    }

    public function registerForm(){
        $this->view("auth/register");
    }

    public function register(){
        $username =$_POST['username'];
        $email =$_POST['email'];
        $password = $_POST['password'];
         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel = new User();

        $user = $userModel->registerUser($username,$email,$hashedPassword);
        header("Location: /JOURNALAPP/public/login");
        exit;
    }

    public function logout() {
    session_start();
    session_destroy();
    header("Location: /JOURNALAPP/public/home");
    exit();
}
}