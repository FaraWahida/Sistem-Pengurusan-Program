
<?php

session_start();

if(!isset($_SESSION['mlogin'])){
header("location: index.php"); 

}

include("connection.php");
$conn=Connect();

if(isset($_POST['submit']))
{
    $username=$_SESSION['mlogin'];
    $oldpass = $_POST['opwd'];
    $newpassword = $_POST['npwd'];
    $confirmpassword = $_POST['cpwd'];

    $query = mysqli_query($conn, "SELECT * FROM staf WHERE IdStaf = '$username'");
    $data = mysqli_fetch_array($query);
    $db_password = $data['PasswordStaf'];

    if($oldpass == $db_password) {
        $con=mysqli_query($conn,"UPDATE staf SET PasswordStaf='$newpassword' where IdStaf='$username'");
        $val = "Password Changed Successfully !!";
        header('location:index.php');
    }
 
 //$useremail=$_SESSION['login'];
    else
    {
        $val = "Current Password not match !!";
        header('location:AdminChangePassword.php?val='.$val);
    }

}
?>