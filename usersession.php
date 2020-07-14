<?php
require 'connection.php';
$conn = Connect();

session_start();


$user_check=$_SESSION['userlogin1'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT IdPelajar FROM pelajar WHERE IdPelajar = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];






?>