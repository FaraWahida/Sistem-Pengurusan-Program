<?php
require 'connection.php';
$conn = Connect();

session_start();


//require_once("dbcontroller.php");

//$db_handle = new DBController();

$user_check=$_SESSION['mlogin'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT IdStaf FROM staf WHERE IdStaf = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['IdStaf'];


?>