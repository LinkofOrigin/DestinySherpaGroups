<?php ?>

<header>
    <a id="headerTitle" href="index.php">Destiny<br>Sherpa Groups</a>
    <?php
        if(isset($_COOKIE["PHPSESSID"]) && !empty($_COOKIE["PHPSESSID"])) {
            echo "<a href='logout.php?redirect={$here}'><button id=\"logout\" class='headerButton'>Logout</button></a>";
            echo "<a href='account.php'><button class='headerButton'>Account</button></a>";
            echo "<a href='view.php'><buttton class='headerButton'>My Events</buttton></a>";
        } else {
            echo "<button id=\"login\" class='headerButton'>Login</button>";
        }
    ?>
</header>
