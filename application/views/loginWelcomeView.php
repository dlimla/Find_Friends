<!DOCTYPE html>
<html>
<head>
	<title>Welcome User</title>
</head>
<body>
	<div id="WelcomeViewMainContainer">
		<a href="logOffUser">Log off</a>
		<p>Welcome <?= $userDataDisplay['first_name'] ?></p>
		<p>Full Name: <?= $userDataDisplay['first_name']. " ".  $userDataDisplay['last_name'] ?></p>	
		<p>Email: <?= $userDataDisplay['email'] ?></p>
	</div>
</body>
</html>