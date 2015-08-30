<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
		<title>Create | Update | Delete</title>
		<!-- Bootstrap CDNs -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>	
	<body>
		<div class="container" align="center">
		<div class="row lr formwidth">
		<h2 class="text-center"> Register!</h2>
		<form action="register.php" method="POST">
			<div class="form-group">
				<input class="form-control" type="text" name="username" placeholder="Username"	required="required" />
			</div>
			<div class="form-group">	
				<input class="form-control" type="password"  name="password" placeholder="Password" required="required" />
			</div>
			<button type="submit" class="btn btn-default" value="Register">Register</button>
		</form>
		</div>
		<a href="login.php">Click here if you're an existing user</a><br>
		<a href="index.php">Click here to go back</a>
	</body>
</html>

<?php include 'dbcon.php';?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$crit = true;
	$query = mysql_query ("select * from users");
	while($row = mysql_fetch_array($query))
	{
		$list_users = $row['username'];
		if($username == $list_users)
		{
			$crit = false;
			print '<script> alert ("User already exists!"); </script> ';
			print '<script> window.location.assign("register.php");</scriipt> ';
		}
	}
	
	if ($crit)
	{
		mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
		print '<script> alert("Welcome aboard!"); </script>';
		print '<script> window.location.assign ("login.php");</script>';
				
	}
}
?>