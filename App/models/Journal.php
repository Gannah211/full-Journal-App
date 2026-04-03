<?php
class Journal extends Model{
    public function getRandomQuestion(){
        $stmt = $this->db->prepare("SELECT * FROM questions ORDER BY RAND() LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSessionQuestions($session_id){
        $stmt= $this->db->prepare("SELECT q.question, q.id AS question_id,a.answer FROM answers a JOIN questions q ON q.id = a.question_id WHERE a.date_id = ?");
        $stmt->execute([$session_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuestionByID($question_id){
        $stmt = $this->db->prepare("SELECT * FROM questions as q JOIN answers as a on q.id = a.question_id WHERE q.id =?");
        $stmt->execute([$question_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function insertOuestionsOfTheDay($date_id,$question_id){
        $stmt = $this->db->prepare("INSERT INTO answers (date_id, question_id, answer) VALUES (?,?, NULL)");
        $stmt->execute([$date_id, $question_id]);
    }

    public function SaveAnswers($date_id, $question_id,$answer){
        $stmt = $this->db->prepare("INSERT INTO answers (date_id, question_id , answer) VALUES (?, ?, ?)");
        $stmt->execute([$date_id, $question_id,$answer]);
    }

    public function updateAnswers($answer,$date_id, $question_id){
        $stmt = $this->db->prepare("UPDATE answers SET answer=? WHERE date_id =? AND question_id =?");
        $stmt->execute([$answer, $date_id, $question_id]);
    }

    public function countAnswersByDateId($date_id) {
    $stmt = $this->db->prepare("SELECT COUNT(*) FROM answers WHERE date_id = ?");
    $stmt->execute([$date_id]);
    return (int) $stmt->fetchColumn();
    }

    public function getUserJournals($user_id){
        $stmt = $this->db->prepare("SELECT q.question, a.answer,d.date FROM questions q JOIN answers a ON q.id =a.question_id JOIN date d ON a.date_id = d.id WHERE d.user_id= ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}