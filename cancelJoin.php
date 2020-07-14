<?php

	session_start();

	if(!isset($_SESSION['userlogin1'])){
	header("location: index.php"); 
	}

	include("connection.php");
	$conn=Connect();

	$username=$_SESSION['userlogin1'];

	$KodProgram = $_GET['KodProgram_cancelJoin'];
 	$delete= mysqli_query($conn, "DELETE FROM daftarprogram WHERE KodProgram='$KodProgram' AND IdPelajar='$username'");
	//header("Location:programRegistered.php");

	echo"<script>alert('You Successfully Cancel to Join Program.');
    window.location='programRegistered.php'</script>";



?>
