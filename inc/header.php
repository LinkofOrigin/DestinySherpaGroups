<?php ?>

<header>
    <a id="headerTitle" href="index.php">Destiny<br>Sherpa Groups</a>
    <?php
        if($_COOKIE["PHPSESSID"]) {
            echo "<button id=\"logout\">Logout</button>";
        } else {
            echo "<button id=\"login\">Login</button>";
        }
    ?>
</header>
