<?php
$loginUsername = "";
$errorMessage = "";

if (isset($_SESSION["login_fail"]) && !empty($_SESSION["login_fail"])) {
	$errorMessage = $_SESSION["login_fail"];
	if (isset($_SESSION["login_username"]) && !empty($_SESSION["login_username"])) {
		$loginUsername = $_SESSION["login_username"];
	}
} else if (isset($_SESSION["login_createfail"]) && !empty($_SESSION["login_createfail"])) {
	$errorMessage = $_SESSION["login_createfail"];
}


?>

<div id="loginBack" onclick="hideloginBack()"></div>
<?php if ($errorMessage !== "") { ?>
	<div id="loginErrors"><?php echo $errorMessage; ?></div>
<?php } ?>

<div id="loginBox">

	<div id="existingUser">
		<h2 id="loginH2">Log In</h2>
		<form id="existUserForm" name="existUserForm" method="post" action="login.php?redirect=<?php echo $here; ?>">
			<label for="loginUsername">Username
				<input name="loginUsername" id="loginUsername" type="text" title="Username"
				       value="<?php echo $loginUsername; ?>">
			</label>

			<label for="loginPassword">Password
				<input name="loginPassword" id="loginPassword" type="password" title="Password">
			</label>

			<input type="submit" value="Log In">

		</form>
	</div>

	<div id="loginDivider"></div>

	<div id="newUser">
		<h2>New User</h2>
		<form id="newUserForm" name="newUserForm" method="post" action="login.php?redirect=<?php echo $here; ?>">
			<label for="newUsername">Username (Xbox GT/PSN ID)
				<input name="newUsername" id="newUsername" type="text" title="Desired Username">
			</label>

			<label for="newPassword1">Password
				<input name="newPassword1" id="newPassword1" type="password" title="Desired Password">
			</label>

			<label for="newPassword2">Password again
				<input name="newPassword2" id="newPassword2" type="password" title="Please type password again">
			</label>

			<p id="newUserError"></p>

			<input type="submit" value="Create User">
		</form>
	</div>

</div>

<?php

if ($errorMessage !== "") { ?>
	<script type="text/javascript">
		showloginBack();
		<?php
		if(isset($_SESSION["login_username"])) { ?>
		$("#loginPassword").focus();
		<?php } else if(isset($_SESSION["login_createfail"])) { ?>
		$("#newUsername").focus();
		<?php } else { ?>
		$("#loginUsername").focus();
		<?php } ?>
	</script>
	<?php


	unset($_SESSION["login_fail"]);
	unset($_SESSION["login_username"]);
	unset($_SESSION["login_createfail"]);
}
?>
