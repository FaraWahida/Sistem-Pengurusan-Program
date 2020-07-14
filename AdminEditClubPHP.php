<?php
session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}

include "connection.php";
$conn = Connect();

$idKelab = $_POST['idKelab'];
$namaKelab = $_POST['namaKelab'];    
$getKelabId = $_POST['getKelabId'];

    $update = mysqli_query($conn, "UPDATE kelab SET IdKelab = '$idKelab', NamaKelab = '$namaKelab' WHERE IdKelab = '$getKelabId'");
    
    echo "<script>alert('Data Has Been Update');
         window.location ='AdminClubUpdate.php'</script>";
?>