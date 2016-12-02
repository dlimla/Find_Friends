<!DOCTYPE html>
<html>
<head>
	<title>Welcome User</title>
</head>
<body>
	<div id="WelcomeViewMainContainer">
		<a href="logOffUser">Log off</a>
		<p>Hello <?= $this->session->userdata['name'] ?></p>
		<p>Here is your list of friends</p>

		<table>
			<tr>
				<td>Name</td>
				<td>Action</td>
			</tr>
<?php
			foreach($friends as $friend) 
			{
				if($friend['user'] == $this->session->userdata['name']){	
?>		
					<tr>
						<td> <?= $friend['friend'] ?> </td>
						<td><a href="show/<?= $friend['id'] ?>">View Profile</a></td>
						<td><a href="/remove/<?= $friend['id'] ?>">Remove as Friend</a></td>
					</tr>	
<?php
				}
			}
?>
		</table>

		<p>Other Users not on Your friends list</p>
		<table>
			<tr>
				<td>Name</td>
				<td>Action</td>
			</tr>
			<tr>
<?php
			foreach($friends as $friend) 
			{
				if($friend['user'] != $this->session->userdata['name']){	
?>		
					<tr>
						<td> <?= $friend['user'] ?> </td>
						<td><a href="show/<?= $friend['id'] ?>">View Profile</a></td>
						<td><a href="/remove/<?= $friend['id'] ?>">Add as Friend</a></td>
					</tr>	
<?php
				}
			}
?>
			</tr>
		</table>

	</div>
</body>
</html>