<?php

session_start();

require_once "User.php";

if (isset($_POST["loginUsername"])) {
    $username = $_POST["loginUsername"];
    $password = $_POST["loginPassword"];
    $user = new User($username, $password);
    if ($user->login()) {
        echo "logged in";
//        header("Location: {$_GET["redirect"]}");
    } else {
        // login failed
        echo "login failed";
    }
} else if (isset($_POST["newUsername"])) {
    $username = $_POST["newUsername"];
    $password = $_POST["newPassword1"];
    $user = new User($username, $password);
    if ($user->createUser()) {
        echo "created user";
//        header("Location: account.php");
    } else {
        // create failed
        echo "create failed";
        echo "create failed";
    }
} else {
    echo "uhhhhhhh";
//    header("Location: index.php");
}
