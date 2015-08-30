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
        <div class = "container">
			<div class ="row lr" align="right">
				
					<button class="btn btn-success" onclick="window.location.assign('login.php')">Login</button>
					<button class="btn btn-primary" onclick="window.location.assign('register.php')">Register</button>
				
			</div>	
			<br>
			<h2 align="center">Create | Update | Delete</h2>
			<div class="row">
				<table class="table table-striped table-responsive table-hover table-bordered">
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Details</th>
						<th class="text-center">Post Time</th>
						<th class="text-center">Edit Time</th>
					</tr>
					<?php
					include 'dbcon.php';
					$query = mysql_query("select * from list where public='yes'");
					while($row = mysql_fetch_array($query))
					{
						print "<tr>";
							print '<td align="center">'.$row['id']."</td>";
							print '<td align="center">'.$row['details']."</td>";
							print '<td align="center">'.$row['date_posted']. " - ".$row['time_posted']."</td>";
							print '<td align="center">'.$row['date_edited']." - ".$row['time_edited']."</td>";
						print "<tr>";
					}
					?>
				</table>
			</div>
		</div>   <!-- end of container -->	
	</body>
</html>
		
	
	