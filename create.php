<?php

$here = "create.php";

?>

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
<body>
<?php require_once "inc/loginBox.php"; ?>
<?php require_once "inc/header.php"; ?>

<div class="h2Wrap">
    <h2>
        Create Event
    </h2>
</div>

<div id="createContents">
    <form id="createEventForm" name="createEventForm" action="">

        <div id="consoleWrap" class="wrapper">
            <h3>Console</h3>
            <div id="consoleButtonWrap">
                <button type="button" id="ps3" class="console" onclick="">PS3</button>
                <button type="button" id="x360" class="console" onclick="">X360</button>
                <button type="button" id="ps4" class="console" onclick="">PS4</button>
                <button type="button" id="x1" class="console" onclick="">X1</button>
            </div>
            <input type="hidden" name="createConsole" value="">
        </div>

        <div id="activityWrap" class="wrapper">
            <h3>Activity</h3>
            <div>
                <button type="button" id="vog" class="activity" onclick="">Vault of Glass</button>
                <button type="button" id="crota" class="activity" onclick="">Crota's End</button>
                <button type="button" id="prison" class="activity" onclick="">Prison of Elders</button>
                <button type="button" id="kingsFall" class="activity" onclick="">King's Fall</button>
            </div>
            <input type="hidden" name="createActivity" value="">
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

        <input id="createSubmit" type="submit" title="Submit" value="Create Event">

    </form>
</div>

<?php require_once "inc/footer.php"; ?>
</body>
</html>
