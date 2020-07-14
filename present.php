<?php
/*include "connection.php";
$conn = Connect();

$KodProgram = $_GET['KodProgram'];
$IdPelajar = $_GET['PresentIdPelajar'];

$update= mysqli_query($conn, "UPDATE daftarprogram SET Kehadiran='PRESENT' where IdPelajar='$IdPelajar' AND KodProgram='$KodProgram'");
header("location:attandance.php"); 
/*echo"<script>alert('Data Deleted Successfully.');
    window.location='listOfProgram.php'</script>";*/
//echo"<script> window.location='attandance.php'</script>";*/
?>

<?php
include "connection.php";
$conn = Connect();

$Present = $_POST['updatePresent'];
$kodprogram = $_POST['kodProgram'];
$update= mysqli_query($conn, "UPDATE daftarprogram SET Kehadiran='PRESENT' where IdPelajar='$Present' AND KodProgram = '$kodprogram'");
header("location:attandance.php"); 
/*echo"<script>alert('Data Deleted Successfully.');
    window.location='listOfProgram.php'</script>";*/
//echo"<script> window.location='attandance.php'</script>";
?>