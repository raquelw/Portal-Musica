<?php
	include('config.php');
	session_start();
	
	$user_check = $_session['login_user'];
	
	$ses_sql = mysql_query($db, "select Email from customer where Email = '$user_check'");
	
	$row = mysql_fetch_array($ses_sql, MYSQLI_ASSOC);
	
	$login_session = $row['Email'];
	
	if(!isset($_SESSION['login_user'])){
		header("location:login.php");
	}
?>