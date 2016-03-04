<?php ?>

<div id="loginBack" onclick="hideloginBack()"></div>

<div id="loginBox">
	
	<div id="existingUser">
		<h2 id="loginH2">Log In</h2>
		<form id="existUserForm" name="existUserForm" method="post" action="login.php?redirect=<?php echo $here; ?>">
			<label for="loginUsername">Username
				<input name="loginUsername" id="loginUsername" type="text" title="Username">
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
		<form id="newUserForm" name="newUserForm" method="post" action="login.php?redirect=<?php echo $here; ?>" onsubmit="passwordCheck()">
			<label for="newUsername">Username (Xbox GT/PSN ID)
				<input name="newUsername" id="newUsername" type="text" title="Desired Username">
			</label>
			
			<label for="newPassword1">Password
				<input name="newPassword1" id="newPassword1" type="password" title="Desired Password">
			</label>
			
			<label for="newPassword2">Password again
				<input name="newPassword2" id="newPassword2" type="password" title="Please type password again">
			</label>
			
			<input type="submit" value="Create User">
		</form>
	</div>

</div>
