<?php

	session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}

	include 'connection.php';
	$conn = Connect();

	$idStaf = $_SESSION['mlogin'];
	$idPelajar = strtoupper($conn->real_escape_string($_POST['idPelajar']));
	$namaPelajar= strtoupper($conn->real_escape_string($_POST['namaPelajar']));
	$nomborTelefon = $conn->real_escape_string($_POST['nomborTelefon']);
	$passwordPelajar = $conn->real_escape_string($_POST['passwordPelajar']);
	$jawatan = $_POST['jawatan'];
	$idKelab = $_POST['idKelab'];

	$query="INSERT INTO pelajar(IdPelajar, NamaPelajar, NomborTelefon, PasswordPelajar, Jawatan, IdKelab, IdStaf) VALUES('" . $idPelajar . "', '" . $namaPelajar . "', '" . $nomborTelefon . "', '" . $passwordPelajar . "', '" . $jawatan . "', '" . $idKelab . "', '" . $idStaf . "')";

	$success= $conn->query($query);

	if($success){
					//$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
					echo"<script>alert('Data Insert Successfully.'); window.location='AdminListOfStudent.php'</script>";
					//header("location:AdminAddStudentForm.php"); 
					$conn->close();
				}else{
					//$statusMsg = "File upload failed, please try again.";
					die("Couldnt enter data: ".$conn->error);
				} 
?>