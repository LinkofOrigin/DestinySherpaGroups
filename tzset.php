<?php

session_start();

date_default_timezone_set("UTC");
$offset = $_GET["offset"];

$_SESSION["timezone"] = date("e", time()-$offset);

exit();
