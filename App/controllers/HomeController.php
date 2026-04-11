<?php
require_once "../App/models/User.php";
require_once "../App/models/Session.php";

class HomeController extends Controller{
    public function index(){

        $userModel =new User();
        $user = isset($_SESSION['user_id']) ? $userModel->findByID($_SESSION['user_id']):null;
        
        $session = null;
        if(isset($_SESSION['user_id'])){
        $sessionModel =new SessionModel();
        $todaySession = $sessionModel->findTodaySession($_SESSION['user_id']);
        $session_id =$todaySession? $todaySession['id']: $sessionModel->createSession($_SESSION['user_id']);
        $_SESSION['journal_session_id'] = $session_id;
        $session = $sessionModel->getSessionById($session_id);
        }
        $this->view("Home/home", ['session'=>$session ,'user'=>$user]);
    }
}