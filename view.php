<?php

$here = "view.php";

require_once "Dao.php";

$dao = new Dao();

$events = $dao->getUserEvents(1);


?>

<html>
<head>
    <title>My Events - Destiny Sherpa Groups</title>
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/view.css">

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

</head>
<body>
<?php //echo "<pre>" . print_r($events, 1) . "</pre>"; ?>
<?php require_once "inc/loginBox.php"; ?>
<?php require_once "inc/header.php"; ?>

<div class="h2Wrap">
    <h2>
        Link of Origin's Events
    </h2>
</div>

<div id="viewContent">

    <div class="eventWrap">
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
    </div>

    <div class="eventWrap">
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
                King's Fall
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
    </div>

    <div class="eventWrap">
        <div class="event">
            <div class="eventSherpa">
                <div class="eventConsole">
                    <div class="eventPS3 consoleMini">
                        PS3
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
    </div>

    <div class="eventWrap">
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
    </div>

    <div class="eventWrap">
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
                Vault of Glass
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
    </div>
</div>

<?php require_once "inc/footer.php"; ?>
</body>
</html>
