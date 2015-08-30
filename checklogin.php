<?php include 'dbcon.php';?>
<?php
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$query = mysql_query("SELECT * from users WHERE username='$username'");
	$exists = mysql_num_rows ($query);
	$list_users = $list_password = "";
	
	if($exists > 0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$list_users = $row['username'];                                  // the 'username' here refers to the column in DB. not to be confused with the name attribute of the form.
			$list_password = $row['password'];					           // applies here as well			
		}
		if(($username == $list_users) && ($password == $list_password))
		{
			if($password == $list_password)
			{
				$_SESSION['user'] = $username;
				header("location: home.php");
			}
		}
			else
			{
				print '<script>alert("Wrong password!");</script>';
				print '<script>window.location.assign("login.php");</script>';
			}
		
	}
	else
	{
		print '<script>alert("Wrong username!");</script>';
		print '<script>window.location.assign("login.php");</script>';
	}
		
	?>