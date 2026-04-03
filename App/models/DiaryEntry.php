<?php
class DiaryEntry extends Model{
    public function InsertDairy($content, $session_id,$user_id){
        $stmt =$this->db->prepare("INSERT INTO diary (date_id, content, user_id) VALUES (?,?,?)");
        $stmt->execute([$session_id,$content,$user_id]);
    }
    public function getSessionDiary($session_id){
        $stmt= $this->db->prepare("SELECT * FROM diary WHERE date_id = ?");
        $stmt->execute([$session_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateDiary($content, $session_id){
        $stmt = $this->db->prepare("UPDATE diary SET content =? WHERE date_id = ? ");
        $stmt->execute([$content,$session_id]);
    }
    public function getAllDiaryEnteries($user_id){
        $stmt = $this->db->prepare("SELECT d.content, s.date FROM diary d JOIN date s ON d.date_id = s.id WHERE d.user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}