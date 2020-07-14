<?php

session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}

include "connection.php";
$conn = Connect();

$IdPelajar= $_GET['IdStaf'];
$delete= mysqli_query($conn, "DELETE FROM staf WHERE IdStaf='$IdStaf'");

echo"<script>alert('Data Deleted Successfully.');
    window.location='AdminListOfStaf.php'</script>";
?>