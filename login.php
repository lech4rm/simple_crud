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
		<h2 class="text-center"> Login! </h2>
		<form action="checklogin.php" method="POST">
			<div class="form-group">
				<input class="form-control" type="text" name="username" placeholder="Username"	required="required" />
			</div>
			<div class="form-group">	
				<input class="form-control" type="password"  name="password" placeholder="Password" required="required" />
			</div>
			<button type="submit" class="btn btn-default" value="Login">Login</button>
		</form>
		</div>
		<a href="register.php">Click here if you're a new user</a><br>
		<a href="index.php">Click here to go back</a>
		
			
		
		</div>
	</body>
</html>
			
		