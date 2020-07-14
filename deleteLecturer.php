<?php
include "connection.php";
$conn = Connect();

$IdLecturer = $_GET['IdLecturer'];
$delete= mysqli_query($conn, "DELETE from staf where IdStaf='$IdLecturer'");

echo"<script>alert('Data Deleted Successfully.');
    window.location='AdminListOfStaf.php'</script>";
?>