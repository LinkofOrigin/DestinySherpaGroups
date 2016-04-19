<?php

session_start();
include "timezone.php";
require_once "Dao.php";

date_default_timezone_set("UTC");

$dao = new Dao();
$row = $dao->getLogin();

$sherpa = $dao->getUser($row["user_id"]);

$createConsole = $_POST["createConsole"];
if ($createConsole === "1") {
	$createConsole = "PS3";
} else if ($createConsole === "2") {
	$createConsole = "X360";
} else if ($createConsole === "3") {
	$createConsole = "PS4";
} else if ($createConsole === "4") {
	$createConsole = "X1";
} else {
	$createConsole = "ERR";
}
$createActivity = $_POST["createActivity"];
$createDateTime = $_POST["createDate"] . " " . $_POST["createTime"];
$createOther = $_POST["createOther"];

if ($createConsole === "ERR" || empty($createActivity) || empty($createDateTime)) {
	$_SESSION["create_createEventFail"] = "Error creating event!";
	$_SESSION["create_createConsole"] = $_POST["createConsole"];
	$_SESSION["create_createActivity"] = $createActivity;
	$_SESSION["create_createDate"] = $_POST["createDate"];
	$_SESSION["create_createTime"] = $_POST["createTime"];
	$_SESSION["create_createOther"] = $createOther;
	header("Location: create.php");
}

echo "<pre> sherpa:" . print_r($sherpa, true) . "</pre>";
echo "<pre> console:" . $createConsole . "</pre>";
echo "<pre> activity:" . $createActivity . "</pre>";
echo "<pre> date/time:" . $createDateTime . "</pre>";
echo "<pre> other:" . $createOther . "</pre>";

$newEventID = $dao->createEvent($sherpa["id"], $createConsole, $createActivity, $createDateTime, $createOther);

echo "<pre> new event:" . print_r($newEventID, true) . "</pre>";

header("Location: details.php?id={$newEventID}");

exit();
