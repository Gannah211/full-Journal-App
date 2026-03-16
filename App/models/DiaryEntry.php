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
}