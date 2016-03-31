<?php

session_start();
$offset = $_GET["offset"];

$_SESSION["timezone"] = date("e", time()-$offset);

