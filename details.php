<html>
<head>
	<title>Event Details - Destiny Sherpa Groups</title>
	<link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/details.css">
	
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<script src="js/details.js"></script>

</head>
<?php
session_start();
include "timezone.php";

require_once "Dao.php";
$here = "details.php";

$eventID = $_GET["id"];

$dao = new Dao();
$event = $dao->getEvent($eventID);
$sherpa = $dao->getUser($event["sherpa"]);
$activity = $dao->getActivity($event["activity"]);

$sherpaName = $sherpa["username"];
$sherpaAbout = $sherpa["about"];
$console = $event["console"];
$activityName = $activity["name"];
$eventStart = date("M. d - g:i A", strtotime($event["start"]));
$eventOther = $event["other"];

$open = "- Open -";
$guardians = array(1=>$sherpaName, 2=>$open, 3=>$open, 4=>$open, 5=>$open, 6=>$open);

$i = 2;
$eventUsers = $dao->getEventUsers($eventID);
foreach($eventUsers as $user) {
	if($user["user"] !== $sherpa["id"]) {
		$guardians[$i++] = $user["username"];
	}
};

?>
<body>
<?php require_once "loginBox.php"; ?>
<?php require_once "header.php"; ?>

<div class="h2Wrap">
	<h2>
		<?php echo $sherpaName; ?>
	</h2>
</div>

<div id="detailBody">
	
	<div id="detailContent">
		
		<div id="detailLeft">
			<div id="aboutSherpa">
				<h3>About - <?php echo $sherpaName; ?></h3>
			</div>
			<p id="sherpaInfo">
				<?php echo $sherpaAbout; ?>
			</p>
		</div>
		
		<div id="detailMiddle">
			<div id="activity">
				<h3><?php echo $activityName; ?></h3>
			</div>
			<div id="dateTime">
				<h3><?php echo $eventStart; ?></h3>
			</div>
			<p id="eventInfo">
				<?php echo $eventOther; ?>
			</p>
		</div>
		
		<div id="detailRight">
			<div id="guardians">
				<h3>Guardians</h3>
			</div>
			<div id="guardianList">
				<p id="guard1"><?php echo $guardians[1]; ?></p>
				<p id="guard2"><?php echo $guardians[2]; ?></p>
				<p id="guard3"><?php echo $guardians[3]; ?></p>
				<p id="guard4"><?php echo $guardians[4]; ?></p>
				<p id="guard5"><?php echo $guardians[5]; ?></p>
				<p id="guard6"><?php echo $guardians[6]; ?></p>
			</div>
		</div>
	
	</div>

</div>

<?php require_once "footer.php"; ?>
</body>
</html>
