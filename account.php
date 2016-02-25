<?php

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
        Link of Origin's Account Info
    </h2>
</div>

<div id="accountContents">
    <form id="accountForm" name="accountForm" action="">

        <div id="left" class="column">
            <h3>Default Console</h3>
            <div id="consoleButtonWrap">
                <button type="button" id="ps3" class="console" onclick="">PS3</button>
                <button type="button" id="x360" class="console" onclick="">X360</button>
                <button type="button" id="ps4" class="console" onclick="">PS4</button>
                <button type="button" id="x1" class="console" onclick="">X1</button>
            </div>
            <input type="hidden" name="accountConsole" value="">
        </div>

        <div id="middle" class="column">
            <h3>Info about yourself</h3>
            <textarea id="accountSelf" name="accountSelf" title="Share a little about yourself"></textarea>
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
                    <input id="accountNewPass1" name="accountNewPass1" type="password" title="Your new desired password">
                </label>
                <label for="accountNewPass2">
                    New Password again<br>
                    <input id="accountNewPass2" name="accountNewPass2" type="password" title="Please retype your desired password">
                </label>
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
