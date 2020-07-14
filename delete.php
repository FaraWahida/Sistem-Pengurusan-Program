<?php
include "connection.php";
$conn = Connect();

$KodProgram = $_GET['KodProgram_del'];
$delete= mysqli_query($conn, "DELETE from program where KodProgram='$KodProgram'");

echo"<script>alert('Data Deleted Successfully.');
    window.location='listOfProgram.php'</script>";
?>