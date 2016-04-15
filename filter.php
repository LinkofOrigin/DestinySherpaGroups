<?php

require_once "Dao.php";
$dao = new Dao();

$filterConsole = $_POST["console"];
if($filterConsole === "1") {
    $filterConsole = "PS3";
} else if ($filterConsole === "2") {
    $filterConsole = "X360";
} else if ($filterConsole === "3") {
    $filterConsole = "PS4";
} else if ($filterConsole === "4") {
    $filterConsole = "X1";
} else {
    $filterConsole = "*";
}
$filterActivity = $_POST["activity"];
$filterDateTime = $_POST["dateTime"];

$filterResult = $dao->filterEvents($filterConsole, $filterActivity, $filterDateTime);

foreach($filterResult as $event) {
	$sherpa = $dao->getUser($event["sherpa"]);
	$activity = $dao->getActivity($event["activity"]); ?>
	<a class="eventWrap" href="details.php?id=<?php echo $event["id"]; ?>">
        <div class="event">
            <div class="eventSherpa">
                <div class="eventConsole">
                    <div class="event<?php echo $event["console"]; ?> consoleMini">
                        <?php echo $event["console"] ?>
                    </div>
                </div>
                <p><?php echo $sherpa["username"]; ?></p>
            </div>
            <div class="eventActivity">
                <?php echo $activity["name"]; ?>
            </div>
            <div class="eventDateTime">
                <?php echo date("M. d - g:i A", strtotime($event["start"])); ?>
            </div>
            <div class="eventOther">
                <p><?php echo $event["other"]; ?></p>
            </div>
        </div>
    </a>
<?php } ?>
