<?php

date_default_timezone_set("UTC");

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

	public function createUser($username, $password, $console = "", $about = "") {
		$password = password_hash($password, PASSWORD_DEFAULT);
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

	public function editUser($username, $newPassword, $newConsole, $newAbout) {
		$password = password_hash($newPassword, PASSWORD_DEFAULT);
		$conn = $this->getConnection();
		$editQuery =
			"UPDATE users
            SET password=:password, console=:console, about=:about
            WHERE username=:username";
		$query = $conn->prepare($editQuery);
		$query->bindParam(":username", $username);
		$query->bindParam(":password", $password);
		$query->bindParam(":console", $newConsole);
		$query->bindParam(":about", $newAbout);
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

	public function getAllEvents() {
		$conn = $this->getConnection();
		$getQuery =
			"SELECT *
            FROM events
            LIMIT 50";
		$query = $conn->prepare($getQuery);
		$query->bindParam(":eventID", $eventID);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function filterEvents($console, $activity, $dateTime) {
		$conn = $this->getConnection();
		$getQuery =
			"SELECT *
            FROM events
            WHERE console=:console AND activity=:activity AND start>=:start
            LIMIT 50";
		if ($console === "*") {
			$getQuery = str_replace("console=:console", "", $getQuery);
		}
		if ($activity === "*") {
			$getQuery = str_replace("activity=:activity", "", $getQuery);
		}
		$getQuery = str_replace("AND  AND", "AND", $getQuery);
		$getQuery = str_replace("WHERE  AND", "WHERE", $getQuery);
		$query = $conn->prepare($getQuery);
		if ($console !== "*") {
			$query->bindParam(":console", $console);
		}
		if ($activity !== "*") {
			$query->bindParam(":activity", $activity);
		}
		$query->bindParam(":start", $dateTime);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function createEvent($sherpaID, $console, $activity, $start, $other = "") {
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
		$newEventID =  $conn->lastInsertId();
		$createQuery =
			"INSERT INTO user_event
            (user, event)
            VALUES
            (:userID, :eventID)";
		$query = $conn->prepare($createQuery);
		$query->bindParam(":userID", $sherpaID);
		$query->bindParam(":eventID", $newEventID);
		$query->execute();
		return $newEventID;
	}
	
	public function deleteEvent($eventID) {
		$conn = $this->getConnection();
		$createQuery =
			"DELETE FROM events
            WHERE id=:eventID";
		$query = $conn->prepare($createQuery);
		$query->bindParam(":eventID", $eventID);
		$query->execute();
	}

	public function createActivity($activityName) {
		$conn = $this->getConnection();
		$createQuery =
			"INSERT INTO activities
            (name)
            VALUES
            (:activityName)";
		$query = $conn->prepare($createQuery);
		$query->bindParam(":activityName", $activityName);
		$query->execute();
	}

	public function getActivity($activityID) {
		$conn = $this->getConnection();
		$getQuery =
			"SELECT *
            FROM activities
            WHERE id=:activityID";
		$query = $conn->prepare($getQuery);
		$query->bindParam(":activityID", $activityID);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function createAssociation($userID, $eventID) {
		$conn = $this->getConnection();
		$createQuery =
			"INSERT INTO user_event
            (user, event)
            VALUES
            (:userID, :eventID)";
		$query = $conn->prepare($createQuery);
		$query->bindParam(":userID", $userID);
		$query->bindParam(":eventID", $eventID);
		$query->execute();
	}
	
	public function removeAssociation($userID, $eventID) {
		$conn = $this->getConnection();
		$createQuery =
			"DELETE FROM user_event
            WHERE user=:userID AND event=:eventID";
		$query = $conn->prepare($createQuery);
		$query->bindParam(":userID", $userID);
		$query->bindParam(":eventID", $eventID);
		$query->execute();
	}
	
	public function getAssociation($userID, $eventID) {
		$conn = $this->getConnection();
		$getQuery = 
			"SELECT *
			FROM user_event
			WHERE user=:userID AND event=:eventID";
		$query = $conn->prepare($getQuery);
		$query->bindParam(":userID", $userID);
		$query->bindParam(":eventID", $eventID);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function loginUser($username, $phpsessid) {
		$conn = $this->getConnection();
		$row = $this->getUserByName($username);
		if ($this->getLogin()) {
			$updateQuery =
				"UPDATE logins
                SET phpsessid=:phpsessid
                WHERE user_id=:user_id";
			$query = $conn->prepare($updateQuery);
			$query->bindParam(":user_id", $row["id"]);
			$query->bindParam(":phpsessid", $phpsessid);
			$query->execute();
		} else {
			$loginQuery =
				"INSERT INTO logins
                (user_id, phpsessid)
                VALUES
                (:user_id, :phpsessid)";
			$query = $conn->prepare($loginQuery);
			$query->bindParam(":user_id", $row["id"]);
			$query->bindParam(":phpsessid", $phpsessid);
			$query->execute();
		}
	}

	public function logoutUser($phpsessid) {
		$conn = $this->getConnection();
		$logoutQuery =
			"DELETE FROM logins
            WHERE phpsessid =:phpsessid";
		$query = $conn->prepare($logoutQuery);
		$query->bindParam(":phpsessid", $phpsessid);
		$query->execute();
		session_start();
		session_destroy();
	}

	public function getLogin() {
		$conn = $this->getConnection();
		$getLoginQuery =
			"SELECT * 
            FROM logins
            WHERE phpsessid=:phpsessid";
		$query = $conn->prepare($getLoginQuery);
		$query->bindParam(":phpsessid", $_COOKIE["PHPSESSID"]);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}
}
