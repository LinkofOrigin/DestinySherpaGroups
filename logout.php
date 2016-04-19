<?php

require_once "Dao.php";

date_default_timezone_set("UTC");

$dao = new Dao();
$row = $dao->getLogin();

if ($row) {
	$dao->logoutUser($_COOKIE["PHPSESSID"]);
	setcookie("PHPSESSID", '', time() - 3600, '/');
}

if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) {
	header("Location: " . $_GET["redirect"]);
} else {
	header("Location: index.php");
}


exit();
