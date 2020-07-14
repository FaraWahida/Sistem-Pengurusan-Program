<?php

session_start();

	if(!isset($_SESSION['userlogin1'])){
	header("location: index.php"); 
	}

	$username=$_SESSION['userlogin1'];

	include 'connection.php';
	$conn = Connect();
	
	if(isset($_POST['submit'])){
		
		$NomborTelefon = $_POST['NomborTelefon'];
		
		$update1 = mysqli_query($conn, "UPDATE pelajar SET NomborTelefon = '$NomborTelefon' WHERE IdPelajar='$username' ");
		
		header("Location:Pprofile.php");
		
	}

?>