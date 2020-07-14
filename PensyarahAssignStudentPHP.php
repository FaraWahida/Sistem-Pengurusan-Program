<?php
	
	include('sessionAdminStart.php');

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "spp";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	
	$error=''; 
		
	if (isset($_POST['submit'])){	
	$username = $_SESSION['mlogin'];
	
	/*$idPelajar = $conn->real_escape_string($_POST['idPelajar']);
	$jawatanPelajar = $conn->real_escape_string($_POST['jawatanPelajar']);
	$kelabPelajar = $conn->real_escape_string($_POST['namaKelab']);*/
	$idPelajar = $_POST['idPelajar'];
	$jawatanPelajar = strtoupper($_POST['jawatanPelajar']);
	$idKelab = $_POST['idKelab'];
	//$jawatanPelajar = strtoupper($_POST['jawatanPelajar']);
	
	if($jawatanPelajar==='PELAJAR'){
		
		$error = "Not insert Username or Password";
	}else{
		$success = mysqli_query($conn, "UPDATE pelajar SET Jawatan='$jawatanPelajar', IdKelab='$idKelab' WHERE IdPelajar='$idPelajar'");
            
				if ($success){
					echo"<script>alert('Student Succesfully Assign.'); 
					window.location='PensyarahListOfStudentJawatan.php'</script>";
					//header("location:AdminAddClubForm.php"); 
					//$conn->close();
				}else{
					die("Couldnt enter data: ".$conn->error);

				}
	}
		
					//$query = "UPDATE pelajar SET Jawatan='$jawatanPelajar', IdKelab='$kelabPelajar' WHERE IdPelajar'$idPelajar' AND IdStaf='$username'";

			
		
	} //if submit
?>
