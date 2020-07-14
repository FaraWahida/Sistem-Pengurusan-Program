<?php
/*include "connection.php";
$conn = Connect();



//    echo $kodkelab.','.$namaprogram.','.$bilanganterhad.','.$tarikhprogram.','.$butiranprogram.','.$kodprogram.','.$idpelajar; die();

    $update = mysqli_query($conn, "UPDATE program SET KodKelab = '$kodkelab',
    	                                              NamaProgram = '$namaprogram',
                                                      BilanganTerhad = '$bilanganterhad',
                                                      TarikhProgram = '$tarikhprogram',
                                                      ButiranProgram = '$butiranprogram',
													  images= '$image'
                                                      WHERE KodProgram = '$kodprogram' AND IdPelajar = '$idpelajar' ");
    
    echo "<script>alert('Data Has Been Update');
         window.location ='listOfProgram.php'</script>";*/
?>

<?php
	
	session_start();

	if(!isset($_SESSION['userlogin1'])){
	header("location: index.php"); 
	}

	include 'connection.php';
	$conn = Connect();
	//$username = $_SESSION['userlogin1'];

	/*$sql="SELECT IdKelab FROM pelajar WHERE IdPelajar = '$username' ";
		$check = mysqli_query($conn, $sql);
						  
			while($data = mysqli_fetch_array($check)){
				$IdKelab = $data['IdKelab'];
			}	*/

	//$image= $_POST['file'];

	
	
	


	/*$idProgram = "";
	$namaProgram = $conn->real_escape_string($_POST['namaProgram']);
	//$namaKelab = $conn->real_escape_string($_POST['namaKelab']);
	$butiranProgram = $conn->real_escape_string($_POST['butiranProgram']);
	$tarikhProgram = $conn->real_escape_string($_POST['tarikhProgram']);
	$limitOfParticipant = $conn->real_escape_string($_POST['limitOfParticipant']);*/
	

	if(isset($_POST['submit'])){
	$statusMsg = '';

	// File upload path
	$targetDir = "images/";
	$fileName = basename($_FILES["upload"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

		$kodprogram = $_POST['KodProgram'];  
		$kodkelab = $_POST['KodKelab'];
		$idpelajar = $_POST['IdPelajar'];

		$namaprogram = $conn->real_escape_string($_POST['NamaProgram']);
		$bilanganterhad = $conn->real_escape_string($_POST['limitOfParticipant']);
		$tarikhprogram = $conn->real_escape_string($_POST['TarikhProgram']);
		$butiranprogram = nl2br($_POST['butiranProgram']);

	if(empty($_FILES["upload"]["name"])){
		
	$update1 = mysqli_query($conn, "UPDATE program SET KodKelab = '$kodkelab',
    	                                              NamaProgram = '$namaprogram',
                                                      BilanganTerhad = '$bilanganterhad',
                                                      TarikhProgram = '$tarikhprogram',
                                                      ButiranProgram = '$butiranprogram'
                                                      WHERE KodProgram = '$kodprogram' AND IdPelajar = '$idpelajar' AND KodKelab='$kodkelab' ");
		if($update1){
					//$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
					echo"<script>alert('Data Update Successfully.'); window.location='listOfProgram.php'</script>";
					//header("location:uploadProgramFormPHP.php"); 
					$conn->close();
				}else{
					//$statusMsg = "File upload failed, please try again.";
					die("Couldnt enter data: ".$conn->error);
				} 
		
		
		
	}else{
		
		//$statusMsg = 'Please select a file to upload.';
		
		$allowTypes = array('jpg','png','jpeg','gif');
		if(in_array($fileType, $allowTypes)){
			// Upload file to server
			if(move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFilePath)){
				// Insert image file name into database
				
				$update2 = mysqli_query($conn, "UPDATE program SET KodKelab = '$kodkelab',
    	                                              NamaProgram = '$namaprogram',
                                                      BilanganTerhad = '$bilanganterhad',
                                                      TarikhProgram = '$tarikhprogram',
                                                      ButiranProgram = '$butiranprogram',
													  images='$fileName'
                                                      WHERE KodProgram = '$kodprogram' AND IdPelajar = '$idpelajar' AND KodKelab='$kodkelab' ");
				
				if($update2){
					//$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
					echo"<script>alert('Data Update Successfully.'); window.location='listOfProgram.php'</script>";
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
		
		
		
	}//end if isset submit
	}
	
	
		
					/*$query = "INSERT into program(KodProgram, NamaProgram, KodKelab, BilanganTerhad, TarikhProgram, ButiranProgram, IdPelajar) VALUES('" . $idProgram . "','" . $namaProgram . "','" . $namaKelab . "','" . $limitOfParticipant . "','" . $tarikhProgram . "','" . $butiranProgram . "','" . $username . "')";

			
            
				if ($success){
					echo"<script>alert('Data Insert Successfully.'); window.location='uploadProgramFormPHP.php'</script>";
					header("location:uploadProgramFormPHP.php"); 
					$conn->close();
				}else{
					die("Couldnt enter data: ".$conn->error);

				}*/


	 
?>
