<?php
	
	
	include('PensyarahAssignStudentPHP.php');


	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "spp";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	
	/*ini_set('fawa', 1);
	error_reporting(E_ALL|E_STRICT);*/


	$username=$_SESSION['mlogin'];
	$sqlProfile = "select * from staf where IdStaf= '$username' ";
					
					
		 $resultProfile = mysqli_query($conn, $sqlProfile);
				while($rowProfile = mysqli_fetch_array($resultProfile)){
						
				$idStaf = $rowProfile['IdStaf'];
				$namaStaf = $rowProfile['NamaStaf'];
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
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>SPP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="./assets/plugins/datatables/plugin.js"></script>
	  
	<!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>-->
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
				
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php echo $idStaf ?></span>
                      <small class="text-muted d-block mt-1"><?php echo $namaStaf ?></small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="PensyarahProfile.php">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                  
                    <div class="dropdown-divider"></div>
					<a class="dropdown-item" href="AdminChangePassword.php">
                      <i class="dropdown-icon fe fe-lock"></i> Change Password
                    </a>
                    <a class="dropdown-item" href="logout.php">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
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
                  <li class="nav-item">
                    <a href="adminHomepage.php" class="nav-link"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Club Organize</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="AdminListOfClub.php" class="dropdown-item ">List Of Program</a>
                      <a href="AdminClubUpdate.php" class="dropdown-item ">Club Update</a>
                    </div>
                  </li>
					<li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-vcard"></i> Student Organize</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="AdminAssignStudentForm.php" class="dropdown-item ">Assign Student</a>
						<a href="AdminListOfStudentJawatan.php" class="dropdown-item ">List Of Students with Position </a>
                    </div>
                  </li>
					<li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-user-plus"></i> Student </a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="AdminAddStudentForm.php" class="dropdown-item ">Add Student</a>
					  <a href="AdminListOfStudent.php" class="dropdown-item ">List Of Students</a>
                    </div>
                  </li>
					</li>
					<li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-user-secret"></i> Lecturer </a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="AdminAddStafForm.php" class="dropdown-item ">Add Staff</a>
						<a href="AdminListOfStaf.php" class="dropdown-item ">List Of Staff</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
		  
		  </br>
		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						
						<?php
						$IdPelajar=$_GET['IdPelajar_data'];
						
						$sqlPelajar="SELECT IdPelajar, NamaPelajar FROM pelajar WHERE IdPelajar='$IdPelajar'";
						
						$resultPelajar = mysqli_query($conn, $sqlPelajar);
						

							while($rowPelajar = mysqli_fetch_array($resultPelajar)):;
								
								$pelajarId=$rowPelajar['IdPelajar'];
								$pelajarNama=$rowPelajar['NamaPelajar'];
							endwhile;
						  
						  $resultIdKelab = mysqli_query($conn, "select IdKelab from staf where IdStaf='$username' ");
						  while($rowPensyarah = mysqli_fetch_array($resultIdKelab)){
							  $IdKelabPensyarah = $rowPensyarah['IdKelab'];
							  
						  }
						  
						
						?>
						
						<form class="card" action="" method="post" enctype="multipart/form-data" >
						 <div class="card-body">
							  <h3 class="card-title">ASSIGN STUDENT POSITION</h3>
							 <div class="alert alert-primary" role="alert">
							  Please assign their position and club. 
							</div>
							
							 <fieldset class="form-fieldset">
								 	<div class="form-group">
									 
									  <label class="form-label">STUDENT DETAIL</label>
									  <label class="form-label">STUDENT ID:  <?php  echo $pelajarId ?></label>
									  <label class="form-label">STUDENT NAME:  <?php  echo $pelajarNama ?></label>
									  <label class="form-label">FOR CLUB:  <?php  echo $IdKelabPensyarah ?></label>
									  <input type="hidden" name="idPelajar" value="<?php echo $pelajarId ?>">
									  <input type="hidden" name="idKelab" value="<?php echo $IdKelabPensyarah ?>">
									  
									</div>
									<div class="form-group">
									  <label class="form-label">POSITION<span class="form-required">*</span></label>
									  <input type="text" class="form-control" name="jawatanPelajar" required=""/>
									</div>

										
								 
								 	


								  </fieldset>
								 <?php if($error){?>

								<div class="alert alert-icon alert-danger" role="alert" Display: none;>
								 <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Please dont insert 'PELAJAR' as position.
								</div>
								<?php }?>
							  </div>
							<div class="card-footer text-right">
							  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
						
						

						
					</div>	<!--tutup col 8-->
				</div> <!-- tutup row -->
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