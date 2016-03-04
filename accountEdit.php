<?php

require_once "Dao.php";
require_once "User.php";

$username = json_decode($_COOKIE["dsg_login"], true)["username"];
$console = $_POST["accountConsole"];
$about = $_POST["accountAbout"];
$password = $_POST["accountCurrPass"];
$newPassword = $_POST["accountNewPass1"];

$dao = new Dao();
$user = new User($username, $password);

if($user->verify()) {
    // verify complete, update user
    $user->updateUser($newPassword, $console, $about);
    header("Location: account.php");
} else {
    // verify fail, wrong password ?
    // TODO: session stuff for verify fail
    header("Location: {$_GET["redirect"]}");
}

exit();
