<html>
<head>
	<title>Event Create - Destiny Sherpa Groups</title>
	<link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab|Roboto+Mono' rel='stylesheet'
	      type='text/css'>
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


$ps3Active = "";
$x360Active = "";
$ps4Active = "";
$x1Active = "";
$vogActive = "";
$ceActive = "";
$poeActive = "";
$kfActive = "";
$date = "";
$time = "";
$other = "";
if (isset($_SESSION["create_createEventFail"]) && !empty($_SESSION["create_createEventFail"])) {
	if ($_SESSION["create_createConsole"] === 1) {
		$ps3Active = " active";
	} else if ($_SESSION["create_createConsole"] === 2) {
		$x360Active = " active";
	} else if ($_SESSION["create_createConsole"] === 3) {
		$ps4Active = " active";
	} else if ($_SESSION["create_createConsole"] === 4) {
		$x1Active = " active";
	}
	
	if ($_SESSION["create_createActivity"] === 1) {
		$vogActive = " active";
	} else if ($_SESSION["create_createActivity"] === 2) {
		$ceActive = " active";
	} else if ($_SESSION["create_createActivity"] === 3) {
		$poeActive = " active";
	} else if ($_SESSION["create_createActivity"] === 4) {
		$kfActive = " active";
	}
	
	$date = $_SESSION["create_createDate"];
	$time = $_SESSION["create_createTime"];
	$other = $_SESSION["create_createOther"];
	
	unset($_SESSION["create_createEventFail"]);
	unset($_SESSION["create_createConsole"]);
	unset($_SESSION["create_createActivity"]);
	unset($_SESSION["create_createDate"]);
	unset($_SESSION["create_createTime"]);
	unset($_SESSION["create_createOther"]);
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
				<button type="button" id="PS3" class="console<?php echo $ps3Active; ?>">PS3</button>
				<button type="button" id="X360" class="console<?php echo $x360Active; ?>">X360</button>
				<button type="button" id="PS4" class="console<?php echo $ps4Active; ?>">PS4</button>
				<button type="button" id="X1" class="console<?php echo $x1Active; ?>">X1</button>
			</div>
			<input type="hidden" id="createConsole" name="createConsole" value="">
		</div>
		
		<div id="activityWrap" class="wrapper">
			<h3>Activity</h3>
			<div>
				<button type="button" id="vog" class="activity<?php echo $vogActive; ?>">Vault of Glass</button>
				<button type="button" id="crota" class="activity<?php echo $ceActive; ?>">Crota's End</button>
				<button type="button" id="prison" class="activity<?php echo $poeActive; ?>">Prison of Elders</button>
				<button type="button" id="kingsFall" class="activity<?php echo $kfActive; ?>">King's Fall</button>
			</div>
			<input type="hidden" id="createActivity" name="createActivity" value="">
		</div>
		
		<div id="dayTimeWrap">
			<div class="dateTimeWrapper">
				<div class="dateTime">
					<h3>Date</h3>
					<input id="createDate" name="createDate" type="date" title="Date of Event"
					       value="<?php echo $date; ?>">
				</div>
			</div>
			
			<div class="dateTimeWrapper">
				<div class="dateTime">
					<h3>Time</h3>
					<input id="createTime" name="createTime" type="time" title="Start Time"
					       value="<?php echo $time; ?>">
				</div>
			</div>
		</div>
		
		<div id="otherWrap">
			<h3>Extra Event Info (optional)</h3>
			<textarea id="createOther" name="createOther"
			          title="Extra information regarding your event"><?php echo $other; ?></textarea>
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
