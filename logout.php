<?php
	session_start();
	session_destroy();
	echo "<script>";
	echo "alert('Bye!');";
	echo "window.location= 'index.php';";
	echo "</script>";
?>