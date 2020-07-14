<?php


session_start();
if(!isset($_SESSION['userlogin1'])){
   header("location: index.php"); 
}

$username = $_SESSION['userlogin1'];

include "connection.php";
$conn = Connect();

$KodProgram = $_GET['joinProgram'];

/*$KodProgram = $_GET['KodProgram_edit'];
$update = mysqli_query($conn, "SELECT * FROM program WHERE KodProgram = '$KodProgram'");

while($editData = mysqli_fetch_array($update)) {
  
	$kodKelab = $editData['KodKelab'];
	$namaProgram = $editData['NamaProgram'];
	$limitOfParticipant = $editData['BilanganTerhad'];
  $tarikh = $editData['TarikhProgram'];
  $tarikhProgram = date("Y-m-d", strtotime($tarikh));
	$butiranProgram = $editData['ButiranProgram'];
  $idPelajar = $editData['IdPelajar'];
}*/

$sql1="SELECT COUNT(*) FROM daftarprogram WHERE IdPelajar = '$username' AND KodProgram='$KodProgram' ";

$check = mysqli_query($conn, $sql1);
while($data = mysqli_fetch_array($check))
{
	$available = $data['COUNT(*)'];
}
//$data=mysql_fetch_assoc($sql1);

$sqlBilanganTerhad="SELECT BilanganTerhad FROM program WHERE KodProgram='$kodProgram' ";
						$resultBilanganTerhad= mysqli_query($conn, $sqlBilanganTerhad);
						  
							while($dataBilanganTerhad = mysqli_fetch_array($resultBilanganTerhad))
							{
								$bilanganTerhadOri = $dataBilanganTerhad['BilanganTerhad'];
							}


$sql="SELECT COUNT(KodProgram) AS kiraan  FROM daftarprogram WHERE KodProgram= '$kodProgram' ";
						  $calculation= mysqli_query($conn, $sql);
						  
							while($data = mysqli_fetch_array($calculation))
							{
								$bilanganTerhadKiraan = $data['kiraan'];
							}


				if($bilanganTerhadKiraan === NULL){
						$bilanganTerhad = 0;
				}else{
							
						$bilanganTerhad = $bilanganTerhadKiraan;
				}


//if($bilanganTerhadOri <= $bilanganTerhad){
	
//echo "<script>alert('Program full');
         //window.location ='homepage2.php'</script>";

//}else{
	
	if($available === "1"){
	
	 echo "<script>alert('You already join the program');
         window.location ='homepage2.php'</script>";
	
}else{
	
	$sql = "INSERT INTO daftarprogram(IdPelajar, KodProgram, TarikhDaftarProgram, Kehadiran) VALUES('" . $username . "', '" . $KodProgram . "', NOW(), 'ABSENT') LIMIT 1";

	$success=$conn->query($sql);

	if($success){
		header('location:programRegistered.php');
	}else{
		
		die("Couldnt enter data: ".$conn->error);
	}

	
}
	
//}
/*if ($user == (1 TRUE) dah join){
	error or msg keluar xleh join kerana sudah join
}else{
	
	masukkan code insert
}*/




$conn->close();

?>