<?php
class Todo extends Model{

    public function createTodo($session_id){
        $stmt =$this->db->prepare("INSERT INTO todolist (date_id) VALUES (?)");
        $stmt->execute([$session_id]);
    }
    public function getTodoId($session_id){
        $stmt= $this->db->prepare("SELECT id FROM todolist WHERE date_id =?");
        $stmt->execute([$session_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
     public function getSessionId(){
        $stmt= $this->db->prepare("SELECT date_id FROM todolist");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTask($content,$priority,$todo_id){
        $stmt =$this->db->prepare("INSERT INTO task (content,priority, todo_id) VALUES (?, ?, ?)");
        $stmt->execute([$content,$priority,$todo_id]);

    }

    
    public function getSessionTasks($session_id){
        $stmt = $this->db->prepare("SELECT  t.id AS task_id, t.content,t.priority, t.is_done, td.id AS todo_id FROM task as t JOIN todolist as td ON t.todo_id = td.id WHERE td.date_id = ?");
        $stmt->execute([$session_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function updateTaskStatus($id, $status){
        $stmt= $this->db->prepare("UPDATE task SET is_done = ? WHERE id = ?");
        $stmt->execute([$status, $id]);

    }

}