<?php
require_once "../App/models/User.php";
require_once "../App/models/Session.php";

class HomeController extends Controller{
    public function index(){

        if(!isset($_SESSION['user_id'])){
            header("Location: /JOURNALAPP/public/login");
            exit;
        }
        $user_id =$_SESSION['user_id'];
        $sessionModel =new SessionModel();
        $todaySession = $sessionModel->findTodaySession($user_id);
        if(!$todaySession){
            $session_id =$sessionModel->createSession($user_id);   
        }else{
            $session_id =$todaySession['id'];
        }

        $_SESSION['journal_session_id'] = $session_id;
        
        $userModel =new User();
        $user = $userModel->findByID($_SESSION['user_id']);
         $session = $sessionModel->getSessionById($session_id);
        $this->view("Home/home", ['session'=>$session ,'user'=>$user]);
    }
}