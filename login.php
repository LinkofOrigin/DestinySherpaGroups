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
    }
} else if (isset($_POST["newUsername"])) {
    $username = $_POST["newUsername"];
    $password = $_POST["newPassword1"];
    $user = new User($username, $password);
    if ($user->createUser()) {
        header("Location: account.php"); // create successful
    } else {
        // create failed
        
    }
} else {
    header("Location: index.php");
}

exit();
