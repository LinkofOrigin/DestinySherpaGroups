<?php

require_once "Dao.php";

date_default_timezone_set("UTC");

class User {

	public $username;
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
			$_SESSION["login_createfail"] = "That user already exists!";
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
			$this->dao->loginUser($this->username, $_COOKIE["PHPSESSID"]);
			return true;
		} else {
			return false; // user not found
		}
	}

	public function verify() {
		$userResult = $this->dao->getUserByName($this->username);
		if (!empty($userResult)) {
			if (password_verify($this->password, $userResult["password"])) {
				return true;
			} else {
				// incorrect password
				$_SESSION["login_fail"] = "Incorrect password.";
				return false;
			}
		} else {
			// user doesn't exist
			$_SESSION["login_fail"] = "There is no user with that username.";
			return false;
		}
	}

}
