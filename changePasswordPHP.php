
<?php

session_start();

if(!isset($_SESSION['userlogin1'])){
header("location: index.php"); 

}

include("connection.php");
$conn=Connect();

if(isset($_POST['submit']))
{
    $username=$_SESSION['userlogin1'];
    $oldpass = $_POST['opwd'];
    $newpassword = $_POST['npwd'];
    $confirmpassword = $_POST['cpwd'];

    $query = mysqli_query($conn, "SELECT * FROM pelajar WHERE IdPelajar = '$username'");
    $data = mysqli_fetch_array($query);
    $db_password = $data['PasswordPelajar'];

    if($oldpass == $db_password) {
        $con=mysqli_query($conn,"UPDATE pelajar SET PasswordPelajar='$newpassword' where IdPelajar='$username'");
        $val = "Password Changed Successfully !!";
        header('location:changePassword.php?val='.$val);
    }
 
 //$useremail=$_SESSION['login'];
    else
    {
        $val = "Current Password not match !!";
        header('location:changePassword.php?val='.$val);
    }

}
?>