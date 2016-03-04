<?php

session_start();

$here = "index.php";

?>

<html>
<head>
    <title>Home - Destiny Sherpa Groups</title>
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/index.css">

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<?php
if(isset($_COOKIE["dsg_login"])) {
}
?>
<?php require_once "inc/loginBox.php"; ?>
<?php require_once "inc/header.php"; ?>

<div id="mainLeft" class="main">

    <div id="consoles">
        <div class="filterWrap">
            <button id="ps3" class="console">PS3</button>
            <button id="x360" class="console">X360</button>
            <button id="ps4" class="console">PS4</button>
            <button id="x1" class="console">X1</button>
        </div>
    </div>

    <div id="activities">
        <div class="filterWrap">
            <button id="vog" class="activity">Vault of Glass</button>
            <button id="crota" class="activity">Crota's End</button>
            <button id="prison" class="activity">Prison of Elders</button>
            <button id="kingsFall" class="activity">King's Fall</button>
        </div>
    </div>

    <div id="dateTime">
        <div class="filterWrap">
            <div class="dateTime">
                <h3>Date</h3>
                <input title="Filter Date" type="date">
            </div>

            <div class="dateTime">
                <h3>Time</h3>
                <input title="Filter Date" type="time">
            </div>
        </div>
    </div>

</div>

<div id="mainRight" class="main">

    <a class="eventWrap" href="details.php?id=1">
        <div class="event">
            <div class="eventSherpa">
                <div class="eventConsole">
                    <div class="eventX1 consoleMini">
                        X1
                    </div>
                </div>
                <p>Link of Origin</p>
            </div>
            <div class="eventActivity">
                Vault of Glass
            </div>
            <div class="eventDateTime">
                ABC. 99 - 99:99 ZM
            </div>
            <div class="eventOther">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec nunc viverra, ornare lacus
                    et, finibus odio. Ut non lorem a neque elementum faucibus et pretium libero. Pellentesque eu lacinia
                    leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam erat volutpat. Aenean
                    iaculis, arcu quis blandit tempus, sapien nulla accumsan lectus, ac convallis ipsum elit in lorem.
                    Duis cursus posuere tempor. Sed pulvinar ac purus non dapibus. Vivamus libero dolor, mollis eget
                    porta convallis, vestibulum eget sem. Etiam a ipsum metus.
                </p>
            </div>
        </div>
    </a>

    <a class="eventWrap" href="details.php?id=2">
        <div class="event">
            <div class="eventSherpa">
                <div class="eventConsole">
                    <div class="eventPS4 consoleMini">
                        PS4
                    </div>
                </div>
                <p>Link of Origin</p>
            </div>
            <div class="eventActivity">
                Prison of Elders
            </div>
            <div class="eventDateTime">
                ABC. 99 - 99:99 ZM
            </div>
            <div class="eventOther">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec nunc viverra, ornare lacus
                    et,
                    finibus odio. Ut non lorem a neque elementum faucibus et pretium libero. Pellentesque eu lacinia
                    leo.
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam erat volutpat. Aenean iaculis,
                    arcu quis blandit tempus, sapien nulla accumsan lectus, ac convallis ipsum elit in lorem. Duis
                    cursus
                    posuere tempor. Sed pulvinar ac purus non dapibus. Vivamus libero dolor, mollis eget porta
                    convallis,
                    vestibulum eget sem. Etiam a ipsum metus.
                </p>
            </div>
        </div>
    </a>

    <a class="eventWrap" href="details.php?id=3">
        <div class="event">
            <div class="eventSherpa">
                <div class="eventConsole">
                    <div class="eventX360 consoleMini">
                        X360
                    </div>
                </div>
                <p>Link of Origin</p>
            </div>
            <div class="eventActivity">
                Crota's End
            </div>
            <div class="eventDateTime">
                ABC. 99 - 99:99 ZM
            </div>
            <div class="eventOther">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec nunc viverra, ornare lacus
                    et,
                    finibus odio. Ut non lorem a neque elementum faucibus et pretium libero. Pellentesque eu lacinia
                    leo.
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam erat volutpat. Aenean iaculis,
                    arcu quis blandit tempus, sapien nulla accumsan lectus, ac convallis ipsum elit in lorem. Duis
                    cursus
                    posuere tempor. Sed pulvinar ac purus non dapibus. Vivamus libero dolor, mollis eget porta
                    convallis,
                    vestibulum eget sem. Etiam a ipsum metus.
                </p>
            </div>
        </div>
    </a>

</div>

<?php require_once "inc/footer.php"; ?>
</body>
</html>
