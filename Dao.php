<?php

class Dao {
    
    private $host = "localhost";
    private $db = "jrupe";
    private $user = "jrupe";
    private $pass = "miniman333";
    
    public function getConnection() {
        return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    }
    
    public function getUserEvents($userID) {
        $conn = $this->getConnection();
        $getQuery =
            "SELECT * 
            FROM events JOIN user_event 
            ON user_event.user = :userID 
            WHERE events.id = user_event.event";
        $query = $conn->prepare($getQuery);
        $query->bindParam(":userID", $userID);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getEventUsers($eventID) {
        $conn = $this->getConnection();
        $getQuery = 
            "SELECT *
            FROM users JOIN user_event
            ON user_event.event = :eventID
            WHERE users.id = user_event.user";
        $query = $conn->prepare($getQuery);
        $query->bindParam(":eventID", $eventID);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUser($userID) {
        $conn = $this->getConnection();
        $getQuery =
            "SELECT *
            FROM users
            WHERE id=:userID";
        $query = $conn->prepare($getQuery);
        $query->bindParam(":userID", $userID);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getUserByName($username) {
        $conn = $this->getConnection();
        $getQuery = 
            "SELECT *
            FROM users
            WHERE username=:username";
        $query = $conn->prepare($getQuery);
        $query->bindParam(":username", $username);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createUser($username, $password, $console="", $about="") {
        $conn = $this->getConnection();
        $createQuery =
            "INSERT INTO users
            (username, password, console, about)
            VALUES
            (:username, :password, :console, :about)";
        $query = $conn->prepare($createQuery);
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->bindParam(":console", $console);
        $query->bindParam(":about", $about);
        $query->execute();
    }
    
    public function editUser($id, $username, $password, $console, $about) {
        $conn = $this->getConnection();
        $editQuery =
            "UPDATE users
            SET username=:username, password=:password, console=:console, about=:about
            WHERE id=:id";
        $query = $conn->prepare($editQuery);
        $query->bindParam(":id", $id);
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->bindParam(":console", $console);
        $query->bindParam(":about", $about);
        $query->execute();
    }
    
    public function getEvent($eventID) {
        $conn = $this->getConnection();
        $getQuery =
            "SELECT *
            FROM events
            WHERE id=:eventID";
        $query = $conn->prepare($getQuery);
        $query->bindParam(":eventID", $eventID);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createEvent($sherpaID, $console, $activity, $start, $other="") {
        $conn = $this->getConnection();
        $createQuery =
            "INSERT INTO events
            (sherpa, console, activity ,start, other)
            VALUES
            (:sherpaID, :console, :activity, :start, :other)";
        $query = $conn->prepare($createQuery);
        $query->bindParam(":sherpaID", $sherpaID);
        $query->bindParam(":console", $console);
        $query->bindParam(":activity", $activity);
        $query->bindParam(":start", $start);
        $query->bindParam(":other", $other);
        $query->execute();
    }
}
