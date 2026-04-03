<?php
require_once "../App/models/Session.php";
require_once "../App/models/DiaryEntry.php";
require_once "../App/models/Journal.php";
require_once "../App/models/Todo.php";

class HistoryController extends Controller{
    public function index(){
        $this->requireLogin();

        $session_id = $_SESSION['journal_session_id'];
        $sessionModel = new SessionModel();
        $session = $sessionModel->getSessionById($session_id);
        
        $this->view("history/index",['session'=>$session]);
    }

    public function getDiary(){
        $user_id= $_SESSION['user_id'];
        $diaryModel= new DiaryEntry();
        $diaryEntries = $diaryModel->getAllDiaryEnteries($user_id);
        // var_dump($diaryEntries);
        // exit;
        $this->view("/history/Diary",['diaries'=>$diaryEntries]);
    }
    public function getJournal(){
        $user_id =$_SESSION['user_id'];
        $journalModel =new Journal();
        $journalHstory = $journalModel->getUserJournals($user_id);
        $groupedJournals = $this->groupByDate($journalHstory);
        // echo '<pre>';
        // var_dump($groupedJournals);
        // exit;
        $this->view("/history/Journal",['journals'=>$groupedJournals]);

    }
    public function getTodo(){
        $user_id =$_SESSION['user_id'];
        $todoModel =new Todo();
        $TodoHistory = $todoModel->getUserAllTasks($user_id);
        $gatheredTasks = $this->groupByDate($TodoHistory);
        // echo '<pre>';
        // var_dump($gatheredTasks);
        // exit;
        $this->view("/history/Todo",['Todos'=>$gatheredTasks]);
    }

    private function groupByDate($assocArr){
        $organizedTodosByDate =[];

        foreach ($assocArr as $arr){
           $organizedTodosByDate[$arr['date']][] = $arr;
        }
        return $organizedTodosByDate ;
    }
}