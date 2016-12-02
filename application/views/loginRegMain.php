<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css"></style>
<body>
	<div id="MainContainer">
		<div id="login">
			Log In Please<form action="login" method="post">
				Email: <input type="text" name="email" value="" placeholder="Email"><br>
				Password: <input type="password" name="password" value=""><br>
				<input type="Submit" value="LogIn">

				<!-- this line displays the flashdata "error" if there is any if not then nothing is displayed -->
				<?= $this->session->flashdata('logInError') ?>
			</form>
		</div>
		<div id="register">
			or Register<form action="register" method="post">
				First Name: <input type="text" name="firstName" value="" placeholder="First Name"><br>
				Last Name: <input type="text" name="lastName" value="" placeholder="Last Name"><br>
				Email Address: <input type="text" name="emailReg" value="" placeholder="Email Address"><br>
				Password: <input type="password" name="password" value=""><br>
				Confirm Password: <input type="password" name="passwordConfirm" value=""><br>
				<input type="Submit" value="Register">
				<?= $this->session->flashdata('errorReg') ?>
			</form>
		</div>
	</div>
</body>
</html>