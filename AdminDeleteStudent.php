<?php

session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}

include "connection.php";
$conn = Connect();

$IdPelajar= $_GET['IdPelajar'];
$delete= mysqli_query($conn, "DELETE FROM pelajar WHERE IdPelajar='$IdPelajar'");

echo"<script>alert('Data Deleted Successfully.');
    window.location='AdminListOfStudent.php'</script>";
?>