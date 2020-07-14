<?php

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//require 'dist/connection.php';
//require_once("dist/dbcontroller.php");
require_once("connection.php");
//$db_handle = new DBController();
$conn = Connect();
session_start(); 
$error='';
$error2='';

if (isset($_POST['submit'])) {
if (!empty($_POST['username']) && !empty($_POST['password'])) {
	// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
	
	
	//$sql="SELECT jawatan FROM pelajar WHERE IdPelajar='$username' AND PasswordPelajar='$password'";
	


// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT IdPelajar, PasswordPelajar, Jawatan FROM pelajar WHERE IdPelajar=? AND PasswordPelajar=? LIMIT 1";
	
//$query = "SELECT username, password FROM table_1 WHERE username='$username' AND password='$password' UNION SELECT username, password FROM table_2  WHERE username='$username' AND password='$password'";
//$result = mysql_fetch_array($query);
	//if($result['Jawatan']!= "PELAJAR BIASA"){
//To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $username, $password);
$stmt -> execute();
$stmt -> bind_result($username, $password);
$stmt -> store_result();
		
if ($stmt->fetch()){ //student
		// Initializing Session
	$_SESSION['userlogin1']=$username;
	
	$checkJawatan = mysqli_query($conn, "SELECT Jawatan, IdKelab FROM pelajar WHERE IdPelajar = '$username'");

						while($row = mysqli_fetch_array($checkJawatan)) {
							
							$jawatan=$row['Jawatan'];
							$idKelab=$row['IdKelab'];
							
						}

	
		
		
	if($jawatan === 'PELAJAR' && $idKelab === '0'){ //pelajar biasa
		
		header("location:homepagePelajar.php");
		
	}else{ //pelajarjawatan
		
		header("location:homepage2.php"); }
		
	}//student
	else { //lecturer

$username=$_POST['username'];
$password=$_POST['password'];
	
	
$query = "SELECT IdStaf, PasswordStaf FROM staf WHERE IdStaf=? AND PasswordStaf=? LIMIT 1";
	
//$query = "SELECT username, password FROM table_1 WHERE username='$username' AND password='$password' UNION SELECT username, password FROM table_2  WHERE username='$username' AND password='$password'";

//To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $username, $password);
$stmt -> execute();
$stmt -> bind_result($username, $password);
$stmt -> store_result();

if ($stmt->fetch()){ 
	
	// Initializing Session
	$_SESSION['mlogin']=$username;
	
	$checkJawatanAdmin = mysqli_query($conn, "SELECT Jawatan, IdKelab FROM staf WHERE IdStaf = '$username'");

						while($row = mysqli_fetch_array($checkJawatanAdmin)) {
							
							$jawatanAdmin=$row['Jawatan'];
							$kelabAdmin=$row['IdKelab'];
							
						}

	
		
		
	if($jawatanAdmin === 'LECTURER'){ //pensyarah
		
		header("location:PensyarahHomepage.php ");
		
	}else{ //admin
		
		header("location:adminHomepage.php ");}

	}
// Redirecting To Other Page
	else {
	 $error = "Username or Password is invalid";
	}

}  //lecturer 



}//if username and password not empty
	else{
		$error2 = "Not insert Username or Password";
	} 
} //submit close
mysqli_close($conn); // Closing Connection
?>