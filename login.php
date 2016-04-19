<?php
session_start();

require_once "Dao.php";
require_once "User.php";

$dao = new Dao();

if (isset($_POST["loginUsername"])) {
	$username = $_POST["loginUsername"];
	$password = $_POST["loginPassword"];
	$user = new User($username, $password);
	if ($user->login()) {
		// login successful
		header("Location: {$_GET["redirect"]}");
	} else {
		// login failed
		$_SESSION["login_username"] = $user->username;
		header("Location: {$_GET["redirect"]}");
	}
} else if (isset($_POST["newUsername"])) {
	$username = $_POST["newUsername"];
	if ($_POST["newPassword1"] !== $_POST["newPassword2"]) {
		$_SESSION["login_createfail"] = "Your passwords didn't match!";
		$_SESSION["login_createUsername"] = $username;
		header("Location: {$_GET["redirect"]}");
		exit();
	}
	$password = $_POST["newPassword1"];
	$user = new User($username, $password);
	if ($user->createUser()) {
		$user->login();
		header("Location: account.php"); // create successful
	} else {
		// create failed
		header("Location: {$_GET["redirect"]}");
	}
} else {
	// some nonsense happened
	header("Location: index.php");
}

exit();
