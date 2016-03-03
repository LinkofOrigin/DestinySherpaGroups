<?php

require_once "Dao.php";

class User {

    private $username;
    private $password;
    private $dao;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->dao = new Dao();
    }

    public function createUser() {
        if (empty($this->dao->getUserByName($this->username))) {
            $this->dao->createUser($this->username, $this->password);
            return true;
        } else {
            // user already exists!
            return false;
        }
    }

    public function login() {
        $userResult = $this->dao->getUserByName($this->username);
        echo "<pre>". print_r($userResult, 1) . "</pre>";
        if (!empty($userResult) && password_verify($this->password, $userResult["password"])) {
            // user verified, now login
            setcookie("dsg_login", $this, time() + 60 ** 60 * 24 * 7); // active for one week
            return true;
        } else {
            // user not found
            echo password_verify($this->password, $userResult["password"]) ? "true" : "false" . "<br>";
            echo $this->password . "<br>";
            echo $userResult["password"] . "<br>";
            return false;
        }
    }
    
    public function refresh() {
        setcookie("dsg_login", $this, time() + 60 ** 60 * 24 * 7);
    }
}
