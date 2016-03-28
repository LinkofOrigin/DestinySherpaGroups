<?php

date_default_timezone_set(@date_default_timezone_get());

require_once "Dao.php";

class User {
    
    private $username;
    private $password;
    private $dao;
    
    public function __construct($username, $password = "") {
        $this->username = $username;
        $this->password = $password;
        $this->dao = new Dao();
    }
    
    public function createUser() {
        if (empty($this->dao->getUserByName($this->username))) {
            $this->dao->createUser($this->username, $this->password);
            return true;
        } else {
            return false; // user already exists!
        }
    }
    
    public function updateUser($newPassword, $newConsole, $newAbout) {
        if (empty($newPassword)) {
            $this->dao->editUser($this->username, $this->password, $newConsole, $newAbout);
        } else {
            $this->dao->editUser($this->username, $newPassword, $newConsole, $newAbout);
        }
    }
    
    public function login() {
        if ($this->verify()) {
            // user verified, now login
            // TODO: use session_start to do the cookie stuff
            session_start();
            $this->dao->loginUser($this->username, $_COOKIE["PHPSESSID"]);
            return true;
        } else {
            return false; // user not found
        }
    }
    
    public function verify() {
        $userResult = $this->dao->getUserByName($this->username);
        if (!empty($userResult) && password_verify($this->password, $userResult["password"])) {
            return true; // user found
        } else {
            // user doesn't exist or not verified
            return false;
        }
    }
    
}
