<?php

session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}
$username=$_SESSION['mlogin'];

include "connection.php";
$conn = Connect();

$IdPelajar= $_GET['IdPelajar'];
$resetPelajar= mysqli_query($conn, "UPDATE pelajar SET Jawatan='PELAJAR', IdKelab='0' WHERE IdPelajar='$IdPelajar' AND IdStaf='$username' ");

if($resetPelajar){
echo"<script>alert('You already cancel student position.'); 
	window.location='AdminListOfStudentJawatan.php'</script>";
	$conn->close();
}else{
	die("Couldnt update data: ".$conn->error);
}

?>