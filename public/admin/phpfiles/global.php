<?php
  	session_start();

  	$connect = mysqli_connect("localhost", "root", "", "djconsul_site");
	date_default_timezone_set("Africa/Lagos");
	include_once "select_admin.php";
	include_once "functions.php";

	if ($_SESSION['LAST_ACTIVITY'] < time() - (60 * 10) && $admin_keep_logged_in == 'no') {
		unset($_SESSION['admin_bigdata']);
	    header("Location:login.php"); 
	}

	$_SESSION['LAST_ACTIVITY'] = time();    


  $notify = $active1 = $active2 = $active3 = $active4 = $active5 = $active6 = $active7 = $active8 = $active9 = $active10 = $active11 = $active12 = $alert = $alert_contact = "";
 ?>
