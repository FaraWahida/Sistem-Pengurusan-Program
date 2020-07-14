<?php
	session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}
?>