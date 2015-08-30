<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
		<title> Homepage </title>
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
			$id_exists = false;
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
				<h2> Edit </h2>
				<p> You're logged in as <i><?php print "$user"?>!</i></p><br>
				<a href="home.php">Back to home</a><br>
			</div> <!-- end of header div -->
			<div class="row" align="right">
				<button type="button" class="btn btn-primary" onclick="window.location.assign('logout.php')">Logout</a>
			</div> <!-- end of button div -->
			<div class="row">
				<h2 align="center">Current item</h2>
				<table class="table table-striped">
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Details</th>
						<th class="text-center">Post Time</th>
						<th class="text-center">Edit Time</th>
						<th class="text-center">Public Post</th>
					</tr>
					<?php
					if(!empty($_GET['id']))
					{
						$id = $_GET['id'];
						$_SESSION['id'] = $id;
						$id_exists = true;
						include 'dbcon.php';
						$query = mysql_query("select * from list where id='$id'");
						$count = mysql_num_rows($query);
						if($count > 0)
						{
							while($row = mysql_fetch_array($query))
							{
								print "<tr>";
									print '<td align ="center">'.$row['id']."</td>";
									print '<td align ="center">'.$row['details']."</td>";
									print '<td align ="center">'.$row['date_posted']."</td>";
									print '<td align ="center">'.$row['date_edited']."</td>";
									print '<td align ="center">'.$row['public']."</td>";
								print "</tr>";
							}
						}
						else
						{
							$id_exits = false;
						}
					}
					?>
					</div>
				</table>
			</div> <!-- end of table div -->	
		<?php
		if($id_exists)
		{
			print '
			<form action ="edit.php" method="POST">
				<div class="form-group">
					<label for="dtl">New data</label>
					<input class="form-control" id="dtl" type="text" name="details">
				</div>
				<div class="checkbox">
					<label>	<input type="checkbox" name="public[]" value="yes"/>Public</label>
				</div>
				<button type="submit" class="btn btn-default" value="Update List">Edit</button>
			</form>';
		}
					
		else
		{
			print '<h2 align="center">There is no date to be edited!</h2>';
		}
		?>
		</div> <!-- end of container -->
	</body>
</html>

<?php //Update code
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		include 'dbcon.php';
		$details = mysql_real_escape_string($_POST['details']);
		$public = "no";
		$id = $_SESSION['id'];
		$time = strftime("%X");
		$date = strftime("%B %d, %Y");
		foreach($_POST['public'] as $op)
		{
			if($op !== null)
			{
				$public ="yes";
			}
		}
		mysql_query("update list set details='$details', public='$public', date_edited='$date', time_edited='$time' where id='$id'");
		header("location:home.php");
	}
?>	
		
		
	
	
					
					
					
					
				