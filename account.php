<?php

require_once "Dao.php";
require_once "User.php";

if (!isset($_COOKIE["dsg_login"])) {
    header("Location: index.php");
}

$here = "account.php";
$userCookie = json_decode($_COOKIE["dsg_login"], true);
$user = new User($userCookie["username"]);
$user->refresh();

$dao = new Dao();
$userData = $dao->getUserByName($userCookie["username"]);

$X1 = $userData["console"] === "X1" ? "active" : "";
$X360 = $userData["console"] === "X360" ? "active" : "";
$PS3 = $userData["console"] === "PS3" ? "active" : "";
$PS4 = $userData["console"] === "PS4" ? "active" : "";

?>

<html>
<head>
    <title>Account - Destiny Sherpa Groups</title>
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/account.css">

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

</head>
<body>
<?php require_once "inc/loginBox.php"; ?>
<?php require_once "inc/header.php"; ?>

<div class="h2Wrap">
    <h2>
        <?php echo $userData["username"]; ?>'s Account Info
    </h2>
</div>

<div id="accountContents">
    <form id="accountForm" name="accountForm" method="post" action="accountEdit.php?redirect=<?php echo $here; ?>"
          onsubmit="return passwordCheck('accountNewPass1', 'accountNewPass2', 'accountPassError')">

        <div id="left" class="column">
            <h3>Default Console</h3>
            <div id="consoleButtonWrap">
                <button type="button" id="ps3" class="console <?php echo $PS3; ?>" onclick="activateConsole(this);">
                    PS3
                </button>
                <button type="button" id="x360" class="console <?php echo $X360; ?>" onclick="activateConsole(this);">
                    X360
                </button>
                <button type="button" id="ps4" class="console <?php echo $PS4; ?>" onclick="activateConsole(this);">
                    PS4
                </button>
                <button type="button" id="x1" class="console <?php echo $X1; ?>" onclick="activateConsole(this);">X1
                </button>
            </div>
            <input type="hidden" name="accountConsole" id="accountConsole" value="<?php echo $userData["console"]; ?>">
        </div>

        <div id="middle" class="column">
            <h3>Info about yourself</h3>
            <textarea id="accountAbout" name="accountAbout"
                      title="Share a little about yourself"><?php echo $userData["about"]; ?></textarea>
        </div>

        <div id="right" class="column">
            <h3>Password Change</h3>
            <div id="passwordWrap">
                <label for="accountCurrPass">
                    Current Password<br>
                    <input id="accountCurrPass" name="accountCurrPass" type="password" title="Your current password">
                </label>
                <label for="accountNewPass1">
                    New Password<br>
                    <input id="accountNewPass1" name="accountNewPass1"
                           onkeyup="passwordCheck(this.id, 'accountNewPass2', 'accountPassError');" type="password"
                           title="Your new desired password">
                </label>
                <label for="accountNewPass2">
                    New Password again<br>
                    <input id="accountNewPass2" name="accountNewPass2"
                           onkeyup="passwordCheck(this.id, 'accountNewPass1', 'accountPassError');" type="password"
                           title="Please retype your desired password">
                </label>
                <p id="accountPassError">Passwords don't match!</p>
            </div>

            <div>
                <input id="accountSubmit" type="submit" title="Submit" value="Save Changes">
            </div>
        </div>

    </form>
</div>

<?php require_once "inc/footer.php"; ?>
</body>
</html>
