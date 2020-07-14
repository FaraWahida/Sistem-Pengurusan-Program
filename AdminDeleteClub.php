<?php

session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}

include "connection.php";
$conn = Connect();

$IdKelab = $_GET['IdKelab_del'];
$delete= mysqli_query($conn, "DELETE FROM kelab WHERE IdKelab='$IdKelab'");

echo"<script>alert('Data Deleted Successfully.');
    window.location='AdminClubUpdate.php'</script>";
?>