<?php

require_once "Dao.php";

$dao = new Dao();

$userResult = $dao->getUserByName("Link of Origin");

$id = $userResult["id"];
$username = $userResult["username"];
$password = password_hash("miniman333", PASSWORD_DEFAULT);
echo $password;
$console = $userResult["console"];
$about = $userResult["about"];

$dao->editUser($id, $username, $password, $console, $about);
