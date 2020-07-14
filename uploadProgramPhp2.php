<?php
	
	session_start();

	if(!isset($_SESSION['userlogin1'])){
	header("location: index.php"); 
	}

	include 'connection.php';
	$conn = Connect();
	$username = $_SESSION['userlogin1'];

	$sql="SELECT IdKelab FROM pelajar WHERE IdPelajar = '$username' ";
		$check = mysqli_query($conn, $sql);
						  
			while($data = mysqli_fetch_array($check)){
				$IdKelab = $data['IdKelab'];
			}	

	
	$idProgram = "";
	$namaProgram = $conn->real_escape_string($_POST['namaProgram']);
	//$namaKelab = $conn->real_escape_string($_POST['namaKelab']);
	$butiranProgram = nl2br($_POST['butiranProgram']);
	$tarikhProgram = $conn->real_escape_string($_POST['tarikhProgram']);
	$limitOfParticipant = $conn->real_escape_string($_POST['limitOfParticipant']);
	
	$statusMsg = '';

	// File upload path
	$targetDir = "images/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	if(isset($_POST['submit']) && !empty($_FILES["file"]["name"])){
		
		$allowTypes = array('jpg','png','jpeg','gif');
		if(in_array($fileType, $allowTypes)){
			// Upload file to server
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
				// Insert image file name into database
				
				$success = $conn->query("INSERT into program(KodProgram, NamaProgram, KodKelab, BilanganTerhad, TarikhProgram, ButiranProgram, IdPelajar, images, TarikhUpload) VALUES('" . $idProgram . "','" . $namaProgram . "','" . $IdKelab . "','" . $limitOfParticipant . "','" . $tarikhProgram . "','" . $butiranProgram . "','" . $username . "', '" . $fileName . "', NOW())");
				if($success){
					//$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
					echo"<script>alert('Data Insert Successfully.'); window.location='listOfProgram.php'</script>";
					//header("location:uploadProgramFormPHP.php"); 
					$conn->close();
				}else{
					//$statusMsg = "File upload failed, please try again.";
					die("Couldnt enter data: ".$conn->error);
				} 
			}else{
				$statusMsg = "Sorry, there was an error uploading your file.";
			}
		}else{
			$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
		}
	}else{
		$statusMsg = 'Please select a file to upload.';
	}//end if isset submit
		
	
		
					/*$query = "INSERT into program(KodProgram, NamaProgram, KodKelab, BilanganTerhad, TarikhProgram, ButiranProgram, IdPelajar) VALUES('" . $idProgram . "','" . $namaProgram . "','" . $namaKelab . "','" . $limitOfParticipant . "','" . $tarikhProgram . "','" . $butiranProgram . "','" . $username . "')";

			
            
				if ($success){
					echo"<script>alert('Data Insert Successfully.'); window.location='uploadProgramFormPHP.php'</script>";
					header("location:uploadProgramFormPHP.php"); 
					$conn->close();
				}else{
					die("Couldnt enter data: ".$conn->error);

				}*/


	 
?>
