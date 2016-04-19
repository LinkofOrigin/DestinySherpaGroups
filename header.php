<?php
require_once "Dao.php";
$dao = new Dao();
$row = $dao->getLogin();

$accountActive = $here === "account.php" ? " activePage" : "";
$viewActive = $here === "view.php" ? " activePage" : "";
$createActive = $here === "create.php" ? " activePage" : "";
?>

<header>
    <a id="headerTitle" href="index.php">Destiny<br>Sherpa Groups</a>
    <?php
        if($row) { ?>
            <a href='logout.php?redirect=<?php echo $here; ?>'><button id="logout" class='headerButton'>Logout</button></a>
            <a href='account.php'><button class='headerButton<?php echo $accountActive; ?>'>Account</button></a>
            <a href='view.php'><button class='headerButton<?php echo $viewActive; ?>'>My Events</button></a>
	        <a href='create.php'><button id='createButton' class='headerButton<?php echo $createActive; ?>'>Create New Event</button></a>
        <?php } else {
            echo "<button id=\"login\" class='headerButton'>Login</button>";
        }
    ?>
</header>
