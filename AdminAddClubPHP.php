<?php
	
	
	session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}

	include('connection.php');
	$conn=Connect();
		
		
	$username = $_SESSION['mlogin'];
	
	$idKelab = $conn->real_escape_string($_POST['idKelab']);
	$namaKelab = $conn->real_escape_string($_POST['namaKelab']);
		
					$query = "INSERT into kelab(IdKelab, NamaKelab) VALUES('" . $idKelab . "','" . $namaKelab . "')";

			$success = $conn->query($query);
            
				if ($success){
					echo"<script>alert('Club Successfully Created.'); 
					window.location='AdminClubUpdate.php'</script>";
					//header("location:AdminAddClubForm.php"); 
					$conn->close();
				}else{
					die("Couldnt enter data: ".$conn->error);

				}
?>
