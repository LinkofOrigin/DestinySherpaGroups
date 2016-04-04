<?php
session_start();

require_once "Dao.php";
require_once "User.php";

$dao = new Dao();
$row = $dao->getLogin();
if(!$row) {
	header("Location: index.php");
}

$userRow = $dao->getUser($row["user_id"]);
$username = $userRow["username"];
$password = $userRow["password"];

$console = $_POST["accountConsole"];
$about = $_POST["accountAbout"];
$password = $_POST["accountCurrPass"];
$newPassword = $_POST["accountNewPass1"];

$user = new User($username, $password);

if($user->verify()) {
    // verify complete, update user
    $user->updateUser($newPassword, $console, $about);
    header("Location: account.php");
} else {
    // verify fail, wrong password
	$_SESSION["login_console"] = $console;
	$_SESSION["login_about"] = $about;
	$_SESSION["login_newPassword"] = $newPassword;
    header("Location: account.php");
}

//exit();
