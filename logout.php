<?php

require_once "Dao.php";

$dao = new Dao();

if(isset($_COOKIE["PHPSESSID"]) && !empty($_COOKIE["PHPSESSID"])) {
    $dao->logoutUser($_COOKIE["PHPSESSID"]);
    unset($_COOKIE["PHPSESSID"]);
    setcookie("PHPSESSID", '', time() - 3600, '/');
}

header("Location: " . $_GET["redirect"]);
