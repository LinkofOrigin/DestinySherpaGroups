<html>
<head>
    <title>My Events - Destiny Sherpa Groups</title>
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/view.css">

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script src="js/view.js"></script>

</head>
<?php
session_start();
//include "timezone.php";

require_once "Dao.php";
$here = "view.php";

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
        <?php echo $user["username"]; ?>'s Events
    </h2>
</div>

<div id="viewContent">
	
	<?php
	foreach($events as $event) {
		$sherpa = $dao->getUser($event["sherpa"]);
		$activity = $dao->getActivity($event["activity"]);
		echo 
"	<a href='details.php?id={$event['event']}' class=\"eventWrap\">
        <div class=\"event\">
            <div class=\"eventSherpa\">
                <div class=\"eventConsole\">
                    <div class=\"event{$event["console"]} consoleMini\">
                        {$event["console"]}
                    </div>
                </div>
                <p>{$sherpa["username"]}</p>
            </div>
            <div class=\"eventActivity\">
                {$activity["name"]}
            </div>
            <div class=\"eventDateTime\">
                ".date_create_from_format('M. d - g:i A',$event['start'])."
            </div>
            <div class=\"eventOther\">
                <p>{$event["other"]}</p>
            </div>
        </div>
    </a>";
	}
	
	?>
</div>

<?php require_once "footer.php"; ?>
</body>
</html>
