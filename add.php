<?php
	session_start();
	if($_SESSION['user'])
	{}
	else
	{
		header('location:index.php');
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$details = mysql_real_escape_string($_POST['details']);
		$time = strftime("%X");
		$date = strftime("%B %d, %Y");
		$decision = "no";
	
		include 'dbcon.php';
		foreach($_POST['public'] as $check)
			{
				if($check !== null)
				{
					$decision = "yes";
				}
			}
		mysql_query("INSERT INTO list (details, date_posted, time_posted, public) values ('$details', '$date', '$time', '$decision')");
		header('location:home.php');
	}
	else
	{
		header("location:home.php");
	}
?>	