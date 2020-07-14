<?php
	
	session_start();

	if(!isset($_SESSION['userlogin1'])){
	header("location: index.php"); 
	}

	include 'connection.php';
	$conn = Connect();
    $KodProgram = $_POST['KodProgram'];
		
		
	$username = $_SESSION['userlogin1'];
	$idProgram = "";
	$namaProgram = $conn->real_escape_string($_POST['namaProgram']);
	$namaKelab = $conn->real_escape_string($_POST['namaKelab']);
	$butiranProgram = $conn->real_escape_string($_POST['butiranProgram']);
	$tarikhProgram = $conn->real_escape_string($_POST['tarikhProgram']);
	$limitOfParticipant = $conn->real_escape_string($_POST['limitOfParticipant']);
		
					$query = "update program set NamaProgram = '".$namaProgram."', ButiranProgram='".$butiranProgram."', TarikhProgram='".$tarikhProgram."', BilanganTerhad='".$limitOfParticipant."' where KodProgram='".$KodProgram."' AND IdPelajar='".$username."'";

			$success = $conn->query($query);
            
				if ($success){
					echo"<script>alert('Data Insert Successfully.'); window.location='uploadProgramFormPHP.php'</script>";
					header("location:uploadProgramFormPHP.php"); 
					$conn->close();
				}else{
					die("Couldnt enter data: ".$conn->error);

				}
?>
