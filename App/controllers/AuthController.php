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
           $errorMessage = "Invalid username or password";
           $this->view("auth/login", ["errorMessage" => $errorMessage]);
        }
       
    }

    public function registerForm(){
        $this->view("auth/register");
    }

    public function register(){
        $userModel = new User();
        $username =$_POST['username'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $confirm_password = $_POST['confirm_password'];
        $userExist = $userModel->findByEmail($email);
        if ($password != $confirm_password) {
            $errorMessage = "Passwords do not match";
            $this->view("auth/register", ["errorMessage" => $errorMessage]);
        }else if (isset($userExist)){
            $errorMessage = "This email is already registered";
            $this->view("auth/register", ["errorMessage" => $errorMessage]);
        }else{
            $userModel->registerUser($username,$email,$hashedPassword);
            header("Location: /JOURNALAPP/public/login");
            exit;
        }

    }

    public function logout() {
    session_start();
    session_destroy();
    header("Location: /JOURNALAPP/public/home");
    exit();
}
}