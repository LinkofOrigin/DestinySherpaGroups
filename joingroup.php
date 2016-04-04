<?php
session_start();
require_once "Dao.php";

$dao = new Dao();
$row = $dao->getLogin();

if (!$row) {
	header("Location: details.php?id={$_GET["id"]}");
}

$association = $dao->getAssociation($row["user_id"], $_GET["id"]);

echo "<pre>".print_r($row, true)."</pre>";
echo "<pre>".print_r($association, true)."</pre>";

if ($association) {
	$dao->removeAssociation($row["user_id"], $_GET["id"]);
} else {
	$dao->createAssociation($row["user_id"], $_GET["id"]);
}


header("Location: details.php?id={$_GET["id"]}");

exit();
