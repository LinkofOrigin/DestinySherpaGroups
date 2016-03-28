<?php

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
        // TODO: session stuff for failed login 
        header("Location: {$_GET["redirect"]}");
    }
} else if (isset($_POST["newUsername"])) {
    $username = $_POST["newUsername"];
    $password = $_POST["newPassword1"];
    $user = new User($username, $password);
    if ($user->createUser()) {
        header("Location: account.php"); // create successful
    } else {
        // create failed
        // TODO: session stuff for failed create
        header("Location: {$_GET["redirect"]}");
    }
} else {
    // some nonsense happened
    header("Location: index.php");
}

exit();
