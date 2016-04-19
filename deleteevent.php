<?php
session_start();
require_once "Dao.php";

date_default_timezone_set("UTC");

$dao = new Dao();
$row = $dao->getLogin();

if (!$row) {
	header("Location: details.php?id={$_GET["id"]}");
}

$event = $dao->getEvent($_GET["id"]);

if($row["user_id"] === $event["sherpa"]) {
	$dao->deleteEvent($_GET["id"]);
}

header("Location: index.php");

exit();
