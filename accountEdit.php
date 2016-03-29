<?php

require_once "Dao.php";
require_once "User.php";

$dao = new Dao();
$row = $dao->getLogin($_COOKIE["PHPSESSID"]);
$userRow = $dao->getUser($row["id"]);
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
    // TODO: session stuff for successful update
    header("Location: account.php");
} else {
    // verify fail, wrong password (?)
    // TODO: session stuff for verify fail
    header("Location: {$_GET["redirect"]}");
}

exit();
