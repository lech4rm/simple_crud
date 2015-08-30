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
		<!-- Session initialization -->
		<?php
		session_start();
		if($_SESSION['user'])
		{
			$user = $_SESSION['user'];
		}
		else
		{
			header("location:index.php");
		}
		?>
		
	</head>
	<body>
		<div class="container">
			<div class="row lr">
				<h2> Welcome to your dashboard </h2>
				<p> You're loggin in as <i><?php print "$user"?>!</i></p>
			</div> <!-- end of header div -->
			<div class="row" align="right">
				<button type="button" class="btn btn-primary" onclick="window.location.assign('logout.php')">Logout</button>
			</div> <!-- end of button row -->
			<div class="row lr" > 
				<form action="add.php" method="POST">
					<div class="form-group">
						<label for="dtls">Add more to the list:</label> 
						<input class="form-control" id="dtls" type="text" name="details" placeholder="Enter data">
					</div>	
					<div class="checkbox">
						<label>
						<input type="checkbox" name="public[]" value="yes"/>Public</label>
					</div>
					<button type="submit" class="btn btn-default" value="Add to list">Add</button>
				</form>
			</div> <!-- end of form div -->
			<div class="row">
				<h2 align="center">List</h2>
				<table class="table table-striped">
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Details</th>
						<th class="text-center">Post Time</th>
						<th class="text-center">Edit Time</th>
						<th class="text-center">Edit</th>
						<th class="text-center">Delete</th>
						<th class="text-center">Public Post</th>
					</tr>
				<?php include 'dbcon.php';
					$query = mysql_query('select * from list');
					while ($row = mysql_fetch_array($query))
					{ 
						print "<tr>";
							print '<td align = "center">'. $row['id']. "</td>";
							print '<td align = "center">'. $row['details']. "</td>";
							print '<td align = "center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
							print '<td align = "center">'. $row['date_edited']. " - ". $row['time_edited']."</td>";
							print '<td align = "center"><a href = "edit.php?id='.$row['id'].'">Edit</a></td>';
							print '<td align = "center"><a href ="#" onclick="delRec('.$row['id'].')">Delete</a></td>';
							print '<td align = "center">'. $row['public']. "</td>";
						print "</tr>";
					}
				?>
				</table>
			</div> <!-- end of table div -->	
		</div> <!-- end of container -->
		<script>
			function delRec(id)
			{
				var d=confirm("Are you sure?");
				if (d == true)
				{
					window.location.assign("delete.php?id=" + id);
				}
			}
		</script>
	</body>
</html>
				
		
		
		
		