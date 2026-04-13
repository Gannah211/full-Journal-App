<?php
class User extends Model {

    public function findByUsername($username){
        $stmt= $this->db->prepare("SELECT * FROM users WHERE username =?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function registerUser($username,$email,$password){
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        echo "New record created successfully.";
    }
    public function findById($id){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByemail($email){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
} 