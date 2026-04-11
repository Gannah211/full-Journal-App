<?php

class SessionModel extends Model{
    public function findTodaySession($user_id){
        $today = date('Y-m-d');
        $stmt = $this->db->prepare("SELECT * FROM date WHERE user_id = ? AND date = ?");
        $stmt->execute([$user_id, $today]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createSession($user_id){
        $today = date('Y-m-d');

        $stmt =$this->db->prepare("INSERT INTO date (user_id,date) VALUES (?, ?)");
        $stmt->execute([$user_id,$today]);
        return $this->db->lastInsertId();
    }

    public function getSessionById($session_id){
        $stmt =$this->db->prepare("SELECT * FROM date WHERE id = ?");
        $stmt->execute([$session_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}