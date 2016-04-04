<?php

session_start();
include "timezone.php";
require_once "Dao.php";

$dao = new Dao();
$row = $dao->getLogin();

$sherpa = $dao->getUser($row["user_id"]);
$createConsole = $_POST["createConsole"];
$createActivity = $_POST["createActivity"];
$createDateTime = $_POST["createDate"] . " " . $_POST["createTime"];
$createOther = $_POST["createOther"];

echo "<pre> sherpa:" . print_r($sherpa, true) . "</pre>";
echo "<pre> console:" . $createConsole . "</pre>";
echo "<pre> activity:" . $createActivity . "</pre>";
echo "<pre> date/time:" . $createDateTime . "</pre>";
echo "<pre> other:" . $createOther . "</pre>";

$newEventID = $dao->createEvent($sherpa["id"], $createConsole, $createActivity, $createDateTime, $createOther);

echo "<pre> new event:" . print_r($newEventID, true) . "</pre>";

header("Location: details.php?id={$newEventID}");
