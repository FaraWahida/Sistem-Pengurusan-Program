<?php
session_start();

if(!isset($_SESSION['userlogin1'])){
header("location: index.php"); 
}

include 'connection.php';
					
$conn = Connect();

$username=$_SESSION['userlogin1'];

$sqlProfile = "select * from pelajar where IdPelajar= '$username' ";
					
					
		 $resultProfile = mysqli_query($conn, $sqlProfile);
				while($rowProfile = mysqli_fetch_array($resultProfile)):;
						
				$idPelajar = $rowProfile['IdPelajar'];
				$jawatan = $rowProfile['Jawatan'];
?>


<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="LOGOSPP2.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="LOGOSPP2.png" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>SPP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="assets/css/dashboard.css" rel="stylesheet" />
    <script src="assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="assets/plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="assets/plugins/datatables/plugin.js"></script>
  </head>
 <body class="">
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                <img src="LOGOSPP2.png" class="header-brand-img" alt="spp logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                  <a href="logout.php" class="btn btn-sm btn-outline-primary">Log Out</a>
                </div>
				  
				  
				  
                <div class="dropdown"> <!-- drop down profile-->
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php echo $username ?></span>
                      <small class="text-muted d-block mt-1"><?php echo $jawatan ?></small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="Pprofile.php">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="changePassword.php">
                      <i class="dropdown-icon fe fe-log-out"></i> Change Password
                    </a>
                  </div>
                </div>
              </div>
				
				<?php endwhile; ?>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item"> <a href="homepagePelajar.php" class="nav-link"><em class="fe fe-home"></em> Home</a> </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i> Club </a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="listOfProgramClubPelajar.php" class="dropdown-item ">List of Program by Club</a>
                    </div>
                  </li> 
				  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Program Organized</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="programRegisteredPelajar.php" class="dropdown-item ">Program Registered</a>
                    </div>
                  </li>                             
                </ul>
              </div>
            </div>
          </div>
		  </div>
		  
		  
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Program Registered
              </h1>
            </div>
			  
			<div class="alert alert-primary" role="alert">
			  List of programs that you have been join will appear here. 
			</div>

<?php

	$sql="SELECT daftarprogram.KodProgram, program.NamaProgram, kelab.NamaKelab, program.TarikhProgram FROM program, kelab, pelajar, daftarprogram WHERE program.KodProgram = daftarprogram.KodProgram AND kelab.IdKelab = program.KodKelab AND pelajar.IdPelajar = daftarprogram.IdPelajar AND daftarprogram.IdPelajar = '" . $username . "'";
				  

    $result = mysqli_query($conn, $sql);



//if (mysqli_num_rows($result) > 0) 

?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>  </th>
		  <th> TARIKH PROGRAM </th>
		  <th> KOD PROGRAM </th>
        <th> NAMA PROGRAM </th>
        <th> NAMA KELAB </th>
		  <th></th>
        
        
      </tr>
    </thead>

    <?php
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"><span> </td>
	  <td><?php echo $row["TarikhProgram"]; ?></td>
      <td><?php echo $row["KodProgram"]; ?></td>
	  <td> <?php echo $row['NamaProgram']; ?> </td>
      <td><?php echo $row["NamaKelab"]; ?></td>
	  <td> <a class="btn btn-danger" href="cancelJoinPelajar.php?KodProgram_cancelJoin=<?php echo $row['KodProgram'];?>"> Cancel Join </a></td>
	  	
    </tr> 
  </tbody>
  
	<?php 
	  	}   
	 ?>
  </table>
    <br>


  <?php  
	//else { 
	?>
<!--
  <h4><center>0 RESULTS</center> </h4>
-->
  <?php 
			  //} ?>

        
        </div>
      
    </div>
</div>
<br>
<br>
<br>
<br>
			
   	 <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <p>Developed by KucenKucenTersakiti, UTHM</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              <p>Copyright © 2020 Kucen. All rights reserved.</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
			 
  </body>			
  