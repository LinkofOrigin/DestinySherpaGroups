<html>
<head>
	<title>Account - Destiny Sherpa Groups</title>
	<link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab|Roboto+Mono' rel='stylesheet'
	      type='text/css'>
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/account.css">
	
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<script src="js/account.js"></script>
</head>
<?php
session_start();

require_once "Dao.php";
require_once "User.php";
$here = "account.php";

date_default_timezone_set("UTC");

$dao = new Dao();
$row = $dao->getLogin();

if (!$row) {
	header("Location: index.php");
}

$userData = $dao->getUser($row["user_id"]);

$user = new User($userData["username"]);

$PS3 = $userData["console"] === "PS3" ? " active" : "";
$X360 = $userData["console"] === "X360" ? " active" : "";
$PS4 = $userData["console"] === "PS4" ? " active" : "";
$X1 = $userData["console"] === "X1" ? " active" : "";

if (isset($_SESSION["account_updateFail"]) && !empty($_SESSION["account_updateFail"])) {
	$PS3 = "";
	$X360 = "";
	$PS4 = "";
	$X1 = "";
	if ($_SESSION["account_updateConsole"] === 1) {
		$PS3 = " active";
	} else if ($_SESSION["account_updateConsole"] === 2) {
		$X360 = " active";
	} else if ($_SESSION["account_updateConsole"] === 3) {
		$PS4 = " active";
	} else if ($_SESSION["account_updateConsole"] === 4) {
		$X1 = " active";
	}
	
	$userData["about"] = $_SESSION["account_updateAbout"];
	
	unset($_SESSION["account_updateFail"]);
	unset($_SESSION["account_updateConsole"]);
	unset($_SESSION["account_updateAbout"]);
}

?>
<body>
<?php require_once "header.php"; ?>

<div class="h2Wrap">
	<h2>
		<?php echo $userData["username"]; ?>'s Account Info
	</h2>
</div>

<div id="accountContents">
	<form id="accountForm" name="accountForm" method="post" action="accountEdit.php">
		
		<div id="left" class="column">
			<h3>Default Console</h3>
			<div id="consoleButtonWrap">
				<button type="button" id="PS3" class="console<?php echo $PS3; ?>">PS3</button>
				<button type="button" id="X360" class="console<?php echo $X360; ?>">X360</button>
				<button type="button" id="PS4" class="console<?php echo $PS4; ?>">PS4</button>
				<button type="button" id="X1" class="console<?php echo $X1; ?>">X1</button>
			</div>
			<input type="hidden" name="accountConsole" id="accountConsole" value="<?php echo $userData["console"]; ?>">
		</div>
		
		<div id="middle" class="column">
			<h3>Info about yourself</h3>
            <textarea id="accountAbout" name="accountAbout"
                      title="Share a little about yourself"><?php echo htmlspecialchars($userData["about"]); ?></textarea>
		</div>
		
		<div id="right" class="column">
			<h3>Password Change</h3>
			<div id="passwordWrap">
				<label for="accountNewPass1">
					New Password<br>
					<input id="accountNewPass1" name="accountNewPass1" type="password"
					       title="Your new desired password">
				</label>
				<label for="accountNewPass2">
					New Password again<br>
					<input id="accountNewPass2" name="accountNewPass2" type="password"
					       title="Please retype your desired password">
				</label>
				<br><br>
				<hr>
				<label for="accountCurrPass">
					Current Password<br>
					<input id="accountCurrPass" name="accountCurrPass" type="password" title="Your current password">
				</label>
				<p id="accountPassError">Passwords don't match!</p>
			</div>
			
			<div>
				<input id="accountSubmit" type="submit" title="Submit" value="Save Changes">
			</div>
		</div>
	
	</form>
</div>

<?php if (isset($_SESSION["login_fail"]) && !empty($_SESSION["login_fail"])) { ?>
	<div id="editError">Your password was incorrect.</div>
	<script type="text/javascript">
		$("#accountCurrPass").focus();
		$("#accountAbout").val("<?php echo $_SESSION["login_about"]; ?>");
		$("#accountNewPass1").val("<?php echo $_SESSION["login_newPassword"]; ?>");
		$("#accountNewPass2").val("<?php echo $_SESSION["login_newPassword"]; ?>");
		$(".console").each(function () {
			$(this).removeClass("active");
		});
		$("#<?php echo $_SESSION["login_console"]; ?>").addClass("active");
		$("#accountConsole").val("<?php echo $_SESSION["login_console"]; ?>");
	</script>
	<?php
	unset($_SESSION["login_fail"]);
	unset($_SESSION["login_about"]);
	unset($_SESSION["login_newPassword"]);
	unset($_SESSION["login_console"]);
}
?>

<?php require_once "footer.php"; ?>
</body>
</html>
