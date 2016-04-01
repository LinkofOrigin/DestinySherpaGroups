<?php

require_once "Dao.php";

$dao = new Dao();
$row = $dao->getLogin();

if ($row) {
	$dao->logoutUser($_COOKIE["PHPSESSID"]);
	setcookie("PHPSESSID", '', time() - 3600, '/');
}

if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) {
	header("Location: " . $_GET["redirect"]);
}

header("Location: index.php");

exit();
