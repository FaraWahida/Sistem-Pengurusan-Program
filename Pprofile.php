<?php
session_start();

if(!isset($_SESSION['userlogin1'])){
header("location: index.php"); 

}
include('connection.php');				
$conn = Connect();

$username=$_SESSION['userlogin1'];

$sqlProfile = "select * from pelajar where IdPelajar= '$username' ";
					
					
		 $resultProfile = mysqli_query($conn, $sqlProfile);
				while($rowProfile = mysqli_fetch_array($resultProfile)){
						
				$idPelajar = $rowProfile['IdPelajar'];
				$jawatan = $rowProfile['Jawatan'];
		}

$sqlProfile2 = "select p.IdPelajar, p.NamaPelajar, p.Jawatan, k.NamaKelab, p.NomborTelefon from pelajar p, kelab k where p.IdKelab=k.IdKelab AND p.IdPelajar= '$username' ";

		$resultProfile2 = mysqli_query($conn, $sqlProfile2);
				while($rowProfile2 = mysqli_fetch_array($resultProfile2)){
						
				$PelajarId = $rowProfile2['IdPelajar'];
				$PelajarNama = $rowProfile2['NamaPelajar'];	
				$KelabNama = $rowProfile2['NamaKelab'];
				$PelajarJawatan = $rowProfile2['Jawatan'];
				$TelefonNumber =$rowProfile2['NomborTelefon'];
		}


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
    <link rel="icon" href="../fyptabler/LOGOSPP2.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="../fyptabler/LOGOSPP2.png" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>SPP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="../fyptabler/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="../fyptabler/assets/css/dashboard.css" rel="stylesheet" />
    <script src="../fyptabler/assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="../fyptabler/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="../fyptabler/assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="../fyptabler/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="../fyptabler/assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="../fyptabler/assets/plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="../fyptabler/assets/plugins/datatables/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="../fyptabler/index.html">
                <img src="../fyptabler/LOGOSPP2.png" class="header-brand-img" alt="spp logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                  <a href="../fyptabler/logout.php" class="btn btn-sm btn-outline-primary">Log Out</a>
                </div>
				  
				  
				  
                <div class="dropdown"> <!-- drop down profile-->
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(../fyptabler/demo/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php echo $username ?></span>
                      <small class="text-muted d-block mt-1"><?php echo $jawatan ?></small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="../fyptabler/Pprofile.php">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../fyptabler/changePassword.php">
                      <i class="dropdown-icon fe fe-lock"></i> Change Password
                    </a>
                  </div>
                </div>
              </div>
				
				
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
                  <li class="nav-item"> <a href="../fyptabler/homepagePelajar.php" class="nav-link"><em class="fe fe-home"></em> Home</a> </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i> Club</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="../fyptabler/listOfProgramClubPelajar.php" class="dropdown-item ">List Of Program by Club</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Program Organized</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="../fyptabler/programRegisteredPelajar.php" class="dropdown-item ">Program Registered</a>
                    </div>
                  </li>                             
                </ul>
              </div>
            </div>
          </div>
		  </div>
		  
		  
		<div class="col-md-12">
			</br>
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<form class="card" action="../fyptabler/updateNumberPelajar.php" method="post">
							<div class="card-body">
							  <h3 class="card-title">Edit Profile</h3>
							  <div class="row">
								<div class="col-md-12">
								  <div class="form-group">
									<label class="form-label">Name</label>
									<input type="text" class="form-control" disabled="" placeholder="Name" value="<?php echo $PelajarNama ?>">
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">User ID</label>
									<input type="text" class="form-control" disabled="" placeholder="User ID" value="<?php echo $PelajarId ?>">
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Position</label>
									<input type="text" class="form-control" disabled="" placeholder="Position" value="<?php echo $PelajarJawatan ?>">
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Club</label>
									<input type="text" class="form-control" disabled="" placeholder="Club" value="<?php echo $KelabNama ?>">
								  </div>
								</div>	
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Phone Number</label>
									<input type="text" class="form-control" placeholder="Club" name="NomborTelefon" value="<?php echo $TelefonNumber ?>">
								  </div>
								</div>
							  </div>
							</div>
							<div class="card-footer text-right">
							  <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
							</div>
						  </form>
						
					</div>	
				</div>
			</div> 
		  </div>
		  
		 
		  
		  
        <div class="my-3 my-md-5">
        </div>
      </div>
      
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
</html>