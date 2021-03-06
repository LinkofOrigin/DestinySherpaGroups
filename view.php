<html>
<head>
	<title>My Events - Destiny Sherpa Groups</title>
	<link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab|Roboto+Mono' rel='stylesheet'
	      type='text/css'>
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/view.css">
	
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<script src="js/view.js"></script>

</head>
<?php
session_start();
include "timezone.php";

require_once "Dao.php";
$here = "view.php";

date_default_timezone_set("UTC");

$dao = new Dao();

$row = $dao->getLogin();

if (!$row) {
	header("Location: index.php");
}

$user = $dao->getUser($row["user_id"]);

$events = $dao->getUserEvents($user["id"]);

?>
<body>
<?php require_once "header.php"; ?>

<div class="h2Wrap">
	<h2>
		<?php echo htmlspecialchars($user["username"]); ?>'s Events
	</h2>
</div>

<div id="viewContent">
	
	<?php
	foreach ($events as $event) {
		$sherpa = $dao->getUser($event["sherpa"]);
		$activity = $dao->getActivity($event["activity"]); ?>
		<a href="details.php?id=<?php echo htmlspecialchars($event["event"]); ?>" class="eventWrap">
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
					<?php echo htmlspecialchars(date_format(date_create($event["start"]), "M. d - g:i A")); ?>
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
