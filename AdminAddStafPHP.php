<?php

	session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}

	include 'connection.php';
	$conn = Connect();

	$username = $_SESSION['mlogin'];
	$idStaf = strtoupper($conn->real_escape_string($_POST['idStaf']));
	$namaStaf= strtoupper($conn->real_escape_string($_POST['namaStaf']));
	$passwordStaf = $conn->real_escape_string($_POST['passwordStaf']);
	$idKelab=$conn->real_escape_string($_POST['idKelab']);
	



	$query="INSERT INTO staf(IdStaf, NamaStaf, PasswordStaf, IdKelab, Jawatan) VALUES('" . $idStaf . "', '" . $namaStaf . "', '" . $passwordStaf . "', '" . $idKelab . "', 'LECTURER')";

	$success= $conn->query($query);

	if($success){
					//$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
					echo"<script>alert('Data Insert Successfully.'); window.location='AdminListOfStaf.php'</script>";
					//header("location:AdminAddStafForm.php"); 
					$conn->close();
				}else{
					//$statusMsg = "File upload failed, please try again.";
					die("Couldnt enter data: ".$conn->error);
				} 
?>