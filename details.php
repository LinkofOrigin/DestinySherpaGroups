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
$here = "details.php?id={$_GET["id"]}";

$dao = new Dao();
$loggedInUser = $dao->getLogin();

$eventID = $_GET["id"];
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
$guardians = array(1 => $sherpaName, 2 => $open, 3 => $open, 4 => $open, 5 => $open, 6 => $open);

$partOfGroup = false;

$i = 2;
$eventUsers = $dao->getEventUsers($eventID);
foreach ($eventUsers as $user) {
	if ($user["user"] !== $sherpa["id"]) {
		$guardians[$i++] = $user["username"];
	}
	if ($loggedInUser && $loggedInUser["user_id"] === $user["user"]) {
		$partOfGroup = true;
	}
};

$joinText = "";

if ($loggedInUser) {
	if ($partOfGroup) {
		$joinText = "You are already in this group.";
		if ($sherpa["id"] !== $loggedInUser["user_id"]) {
			$joinText .= "<br>Click to leave this group.";
		}
	} else {
		$joinText = "Click to join this group!";
	}
} else {
	$joinText = "Please login to join groups.";
}

if ($guardians[6] !== $open) {
	$joinText = "This group is full.";
}

?>
<script type="text/javascript">
	loggedin = <?php echo json_encode($loggedInUser ? true : false); ?>;
	isSherpa = <?php echo json_encode($sherpa["id"] === $loggedInUser["user_id"]); ?>;
	isFull = <?php echo json_encode($guardians[6] !== $open); ?>;
</script>
<body>
<?php require_once "loginBox.php"; ?>
<?php require_once "header.php"; ?>

<div class="h2Wrap">
	<h2>
		<?php echo $sherpaName; ?>
	</h2>
	<?php if ($loggedInUser["user_id"] === $sherpa["id"]) { ?>
		<form id="deleteEventForm" name="deleteEventForm" method="post"
		      action="deleteevent.php?id=<?php echo $_GET["id"]; ?>">
			<button id="deleteEvent">Delete this event</button>
		</form>
	<?php } ?>
	
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
			<form id="joinGroupForm" name="joinGroupForm" method="POST"
			      action="joingroup.php?id=<?php echo $_GET["id"]; ?>">
				<button id="joinGroup" type="submit"><?php echo $joinText; ?></button>
			</form>
		</div>

	</div>

</div>

<?php require_once "footer.php"; ?>
</body>
</html>
