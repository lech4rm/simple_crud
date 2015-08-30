<?php
	session_start();
	if($_SESSION['user'])
	{}
	else
	{
		header("location:index.php");
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		include 'dbcon.php';
		$id = $_GET['id'];
		mysql_query("delete from list where id='$id'");
		header("location:home.php");
	}
?>