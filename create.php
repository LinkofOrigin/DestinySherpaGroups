<html>
<head>
	<title>Event Create - Destiny Sherpa Groups</title>
	<link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/create.css">

	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<script src="js/create.js"></script>

</head>
<?php
session_start();
//include "timezone.php";
$here = "create.php";

require_once "Dao.php";
$dao = new Dao();

$row = $dao->getLogin();

if (!$row) {
	header("Location: index.php");
}

?>
<body>
<?php require_once "header.php"; ?>

<div class="h2Wrap">
	<h2>
		Create Event
	</h2>
</div>

<div id="createContents">
	<form id="createEventForm" name="createEventForm" method="POST" action="createEvent.php">

		<div id="consoleWrap" class="wrapper">
			<h3>Console</h3>
			<div id="consoleButtonWrap">
				<button type="button" id="PS3" class="console">PS3</button>
				<button type="button" id="X360" class="console">X360</button>
				<button type="button" id="PS4" class="console">PS4</button>
				<button type="button" id="X1" class="console">X1</button>
			</div>
			<input type="hidden" id="createConsole" name="createConsole" value="">
		</div>

		<div id="activityWrap" class="wrapper">
			<h3>Activity</h3>
			<div>
				<button type="button" id="vog" class="activity">Vault of Glass</button>
				<button type="button" id="crota" class="activity">Crota's End</button>
				<button type="button" id="prison" class="activity">Prison of Elders</button>
				<button type="button" id="kingsFall" class="activity">King's Fall</button>
			</div>
			<input type="hidden" id="createActivity" name="createActivity" value="">
		</div>

		<div id="dayTimeWrap">
			<div class="dateTimeWrapper">
				<div class="dateTime">
					<h3>Date</h3>
					<input id="createDate" name="createDate" type="date" title="Date of Event">
				</div>
			</div>

			<div class="dateTimeWrapper">
				<div class="dateTime">
					<h3>Time</h3>
					<input id="createTime" name="createTime" type="time" title="Start Time">
				</div>
			</div>
		</div>

		<div id="otherWrap">
			<h3>Extra Event Info (optional)</h3>
			<textarea id="createOther" name="createOther" title="Extra information regarding your event"></textarea>
		</div>
		<br>
		<div id="createError"></div>
		<br>
		
		<input id="createSubmit" type="submit" title="Submit" value="Create Event">

	</form>
</div>

<?php require_once "footer.php"; ?>
</body>
</html>
