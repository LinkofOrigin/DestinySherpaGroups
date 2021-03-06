<html>
<head>
	<title>Home - Destiny Sherpa Groups</title>
	<link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab|Roboto+Mono' rel='stylesheet'
	      type='text/css'>
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/index.css">
	
	<script src="js/jquery.js"></script>
	<script src="js/index.js"></script>
	<script src="js/script.js"></script>
</head>
<?php
session_start();
include "timezone.php";

require_once "Dao.php";
require_once "User.php";
$here = "index.php";

date_default_timezone_set("UTC");

$dao = new Dao();
$row = $dao->getLogin();

$events = $dao->getAllEvents();

?>

<body>
<?php require_once "loginBox.php"; ?>
<?php require_once "header.php"; ?>

<div id="mainLeft" class="main">
	
	<div id="consoles">
		<span id="filtersText">Filters</span>
		<div class="filterWrap">
			<button id="PS3" class="console">PS3</button>
			<button id="X360" class="console">X360</button>
			<button id="PS4" class="console">PS4</button>
			<button id="X1" class="console">X1</button>
		</div>
		<input type="hidden" id="filterConsole" name="filterConsole">
	</div>
	
	<div id="activities">
		<div class="filterWrap">
			<button id="vog" class="activity">Vault of Glass</button>
			<button id="crota" class="activity">Crota's End</button>
			<button id="prison" class="activity">Prison of Elders</button>
			<button id="kingsFall" class="activity">King's Fall</button>
		</div>
		<input type="hidden" id="filterActivity" name="filterActivity">
	</div>
	
	<div id="dateTime">
		<div class="filterWrap">
			<div class="dateTime">
				<h3>Date</h3>
				<input id="filterDate" title="Filter Date" type="date">
			</div>
			
			<div class="dateTime">
				<h3>Time</h3>
				<input id="filterTime" title="Filter Date" type="time">
			</div>
		</div>
	</div>

</div>

<div id="mainRight" class="main">
	<?php foreach ($events as $event) {
		$sherpa = $dao->getUser($event["sherpa"]);
		$activity = $dao->getActivity($event["activity"]); ?>
		<a class="eventWrap" href="details.php?id=<?php echo htmlspecialchars($event["id"]); ?>">
			<div class="event">
				<div class="eventSherpa">
					<div class="eventConsole">
						<div class="event<?php echo htmlspecialchars($event["console"]); ?> consoleMini">
							<?php echo htmlspecialchars($event["console"]); ?>
						</div>
					</div>
					<p><?php echo htmlspecialchars($sherpa["username"]); ?></p>
				</div>
				<div class="eventActivity">
					<?php echo htmlspecialchars($activity["name"]); ?>
				</div>
				<div class="eventDateTime">
					<?php echo htmlspecialchars(date_format(date_create($event['start']), 'M. d - g:i A')); ?>
				</div>
				<div class="eventOther">
					<p><?php echo htmlspecialchars($event["other"]); ?></p>
				</div>
			</div>
		</a>
	<?php } ?>
</div>

<?php require_once "footer.php"; ?>
</body>
</html>
