<?php

require_once "Dao.php";

$dao = new Dao();
$row = $dao->getLogin();

if($row) {
    $dao->logoutUser($_COOKIE["PHPSESSID"]);
    setcookie("PHPSESSID", '', time() - 3600, '/');
}

header("Location: " . $_GET["redirect"]);
