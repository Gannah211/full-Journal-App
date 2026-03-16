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

    public function SaveAnswers($date_id, $question_id,$answer){
        $stmt = $this->db->prepare("INSERT INTO answers (date_id, question_id , answer) VALUES (?, ?, ?)");
        $stmt->execute([$date_id, $question_id,$answer]);
    }

    public function updateAnswers($answer,$date_id, $question_id,){
        $stmt = $this->db->prepare("UPDATE answers SET answer=? WHERE date_id =? AND question_id =?");
        $stmt->execute([$answer, $date_id, $question_id]);
    }
}