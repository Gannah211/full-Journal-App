<?php
require_once "../App/models/DiaryEntry.php";
require_once "../App/models/Session.php";

class DiaryController extends Controller{
    public function DiaryForm(){
        $session_id = $_SESSION['journal_session_id'];
        $sessionModel = new SessionModel();
        $session = $sessionModel->getSessionById($session_id);
         $diaryModel= new DiaryEntry();
        $SavedDiary =$diaryModel->getSessionDiary($session_id);
        $this->view("diary/index",['session'=>$session, 'diary'=> $SavedDiary]);
    }
    public function AddDiary(){
        $session_id = $_SESSION['journal_session_id'];
        $user_id = $_SESSION['user_id'];
        $sessionModel = new SessionModel();
        $session = $sessionModel->getSessionById($session_id);

        $content=$_POST['content'];

        $diaryModel= new DiaryEntry();

        $diaryModel->InsertDairy($content, $session_id,$user_id);
        $_SESSION['success'] = "Diary saved successfully!";

        header("Location: /JOURNALAPP/public/diary");
        exit;
    } 

    public function updateDiary(){
        $session_id = $_SESSION['journal_session_id'];
        $content = $_POST['content'];

         $diaryModel= new DiaryEntry();

        $diaryModel->updateDiary($content, $session_id);
        $_SESSION['success'] = "Diary updated successfully!";

        header("Location: /JOURNALAPP/public/diary");
        exit;
    }
}
