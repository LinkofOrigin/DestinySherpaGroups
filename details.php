<?php

$here = "details.php";

?>

<html>
<head>
    <title>Event Details - Destiny Sherpa Groups</title>
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/details.css">

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

</head>
<body>
<?php require_once "inc/loginBox.php"; ?>
<?php require_once "inc/header.php"; ?>

<div class="h2Wrap">
    <h2>
        Link of Origin
    </h2>
</div>

<div id="detailBody">

    <div id="detailContent">

        <div id="detailLeft">
            <div id="aboutSherpa">
                <h3>About - Link of Origin</h3>
            </div>
            <p id="sherpaInfo">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec nunc viverra, ornare lacus
                et, finibus odio. Ut non lorem a neque elementum faucibus et pretium libero. Pellentesque eu lacinia
                leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam erat volutpat. Aenean
                iaculis, arcu quis blandit tempus, sapien nulla accumsan lectus, ac convallis ipsum elit in lorem.
                Duis cursus posuere tempor. Sed pulvinar ac purus non dapibus. Vivamus libero dolor, mollis eget
                porta convallis, vestibulum eget sem. Etiam a ipsum metus.
            </p>
        </div>

        <div id="detailMiddle">
            <div id="activity">
                <h3>Vault of Glass</h3>
            </div>
            <div id="dateTime">
                <h3>ABC. 99 - 99:99 ZM</h3>
            </div>
            <p id="eventInfo">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec nunc viverra, ornare lacus
                et, finibus odio. Ut non lorem a neque elementum faucibus et pretium libero. Pellentesque eu lacinia
                leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam erat volutpat. Aenean
                iaculis, arcu quis blandit tempus, sapien nulla accumsan lectus, ac convallis ipsum elit in lorem.
                Duis cursus posuere tempor. Sed pulvinar ac purus non dapibus. Vivamus libero dolor, mollis eget
                porta convallis, vestibulum eget sem. Etiam a ipsum metus.
            </p>
        </div>

        <div id="detailRight">
            <div id="guardians">
                <h3>Guardians</h3>
            </div>
            <div id="guardianList">
                <p id="guard1">Link of Origin</p>
                <p id="guard2">OscillatorJones</p>
                <p id="guard3">Leg Sweeper</p>
                <p id="guard4">Enkidu Ken</p>
                <p id="guard5">- Open -</p>
                <p id="guard6">- Open -</p>
            </div>
        </div>

    </div>

</div>

<?php require_once "inc/footer.php"; ?>
</body>
</html>
