<?php
require_once "../App/models/Journal.php";
require_once "../App/models/Session.php";

class JournalController extends Controller{
    public function JournalForm(){
        $this->requireLogin();

        $session_id = $_SESSION['journal_session_id'];
        $sessionModel = new SessionModel();
        $session = $sessionModel->getSessionById($session_id);

        $journalModel = new Journal();
        $existingCount = $journalModel->countAnswersByDateId($session_id);

    if ($existingCount >= 3) {
        $questions = $journalModel->getSessionQuestions($session_id);
    } else {
        $questions = $this->getJournalQuestions($session_id, $journalModel);
    }
    $hasAnswers = $this->IsAllQuestionsAnswered($questions);
    // var_dump($questions);
    // exit;
    $this->view("journal/index",['session'=>$session,'questions'=> $questions, 'hasAnswers' => $hasAnswers]);
    }

    private function IsAllQuestionsAnswered($questions){
        foreach($questions as $q){
        if(empty($q['answer'])){
            return false;
            }
        }
        return true;
    }

    private function getJournalQuestions($session_id,$journalModel,$questions =[], $i =3){
        if($i == 0){
            return $questions;
        }
        $q = $journalModel->getRandomQuestion();
        $ids = array_column($questions, "id");
        if (in_array($q["id"], $ids)){
           return $this->getJournalQuestions($session_id,$journalModel,$questions, $i);
        }else{
            $questions[] =$q;
            $journalModel->insertOuestionsOfTheDay($session_id,$q["id"]);
            return $this->getJournalQuestions($session_id,$journalModel,$questions, $i-1);
        }
        
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
            $journalModel->updateAnswers($answer,$session_id,$q_id);
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