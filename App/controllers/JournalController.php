<?php
require_once "../App/models/Journal.php";
require_once "../App/models/Session.php";

class JournalController extends Controller{
    public function JournalForm(){
        $session_id = $_SESSION['journal_session_id'];
        $sessionModel = new SessionModel();
        $session = $sessionModel->getSessionById($session_id);

        $journalModel = new Journal();

        $QList = $journalModel->getSessionQuestions($session_id); //from answers table 
        $questions=[];
        if(!$QList){
            for ($i =0; $i<3; $i++){
                $q = $journalModel->getRandomQuestion(); //from questions table
                $questions[] =$q;
            };
        }else{
            foreach ($QList as $q){
            $questionData = $journalModel->getQuestionByID($q['question_id']);
            $questions[] = $questionData;
            }
        }
        $this->view("journal/index",['session'=>$session,'questions'=> $questions,'savedAnswers'=>$QList]);
    }

    public function AddJournal(){
        $session_id = $_SESSION['journal_session_id'];
        $sessionModel = new SessionModel();

        $journalModel = new Journal();  
        $answers = $_POST['answer'];
        $quetions_id = $_POST['question_id'];

        for ($i=0; $i<3 ; $i++){
            $answer =$answers[$i];
            $q_id =$quetions_id[$i];
            $journalModel->SaveAnswers($session_id,$q_id,$answer);
        }
        
        $_SESSION['success'] = "Answers saved successfully!";
        header("Location: /JOURNALAPP/public/journal");
        exit;
    }

    public function updateanswers(){
         $session_id = $_SESSION['journal_session_id'];

        $journalModel = new Journal();  
        $answers = $_POST['answer'];
        $quetions_id = $_POST['question_id'];

        for ($i=0; $i<3 ; $i++){
            $answer =$answers[$i];
            $q_id =$quetions_id[$i];
            $journalModel->updateAnswers($answer,$session_id,$q_id);
        }
        
        $_SESSION['success'] = "Answers updated successfully!";
        header("Location: /JOURNALAPP/public/journal");
        exit;
    }
}