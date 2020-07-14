<?php
/*include "connection.php";
$conn = Connect();

$KodProgram=$_GET['KodProgram'];
$IdPelajar = $_GET['AbsentIdPelajar'];
$update= mysqli_query($conn, "UPDATE daftarprogram SET Kehadiran='ABSENT' where IdPelajar='$IdPelajar' AND KodProgram='$KodProgram' ");
header("location:attandance.php"); 
/*echo"<script>alert('Data Deleted Successfully.');*/
  // echo"<script> window.location='attandance.php'</script>";*/
?>
<?php
include "connection.php";
$conn = Connect();

$absent = $_GET['Absent'];
$kodprogram = $_GET['kodProgram'];
$update= mysqli_query($conn, "UPDATE daftarprogram SET Kehadiran='ABSENT' where IdPelajar='$absent' AND KodProgram = '$kodprogram'");
header("location:attandance.php"); 
/*echo"<script>alert('Data Deleted Successfully.');*/
  // echo"<script> window.location='attandance.php'</script>";
?>