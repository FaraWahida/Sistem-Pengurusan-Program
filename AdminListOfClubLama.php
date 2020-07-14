<?php

	session_start();

	if(!isset($_SESSION['mlogin'])){
	header("location: index.php"); 
	}

	include("connection.php");
	$conn = Connect();

	$username = $_SESSION['mlogin'];
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
    <title>Empty page - tabler.github.io - a responsive, flat and full featured admin template</title>
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
                  <a href="logout.php" class="btn btn-sm btn-outline-primary" target="_blank">Log Out</a>
                </div>
				
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">Jane Pearson</span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-settings"></i> Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="float-right"><span class="badge badge-primary">6</span></span>
                      <i class="dropdown-icon fe fe-mail"></i> Inbox
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-send"></i> Message
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                    </a>
                    <a class="dropdown-item" href="#">
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
                <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="adminHomepage.php" class="nav-link"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Club Organize</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="AdminListOfClub.php" class="dropdown-item ">List Of Club</a>
                      <a href="AdminClubUpdate.php" class="dropdown-item ">Club Update</a>
                    </div>
                  </li>
					<li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Student Organize</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="AdminAssignStudentForm.php" class="dropdown-item ">Assign Student</a>
					  <a href="AdminListOfStudentJawatan.php" class="dropdown-item ">List Of Student Jawatan</a> 
                    </div>
                  </li>
					<li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Student </a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="AdminAddStudentForm.php" class="dropdown-item ">Add Student</a>
				      <a href="AdminListOfStudent.php" class="dropdown-item ">List Of Student</a> 
                    </div>
                  </li>
					</li>
					<li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Lecturer </a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="AdminAddStafForm.php" class="dropdown-item ">Add Staff</a>
				      <a href="AdminListOfStaf.php" class="dropdown-item ">List Of Staf</a> 
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
		  
		  
		<div class="col-md-12">
			<div class="container">
				<div class="row">
					
					<!--<div class="col-sm-8">-->
					<div class="col-12">
						
					<div class="page-header">
					  <h1 class="page-title">
						List of Program
					  </h1>
					</div>
						
					<?php 
					
					

					$sql="SELECT * FROM kelab WHERE IdKelab != '0' ";

					$result = mysqli_query($conn, $sql); 

					if (mysqli_num_rows($result) > 0) 
					?>
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                      <thead>
                        <tr>
                          <th class="text-center w-1"><i class="icon-people"></i></th>
                          <th>Kod Kelab</th>
                          <th>Nama Kelab</th>
                          <!--<th class="text-center"><i class="icon-settings"></i></th>-->
                        </tr>
                      </thead>
						
						<?php
						  //OUTPUT DATA OF EACH ROW
						  while($row = mysqli_fetch_assoc($result)){
						?>

                      <tbody> 
						  
						  <!--<tr onclick="myFunction(this)" >-->
						  
						 
                        <tr>
							
						<?php /*echo "onClick='goToNewPage(" 
								  echo $row['IdKelab'];
								  echo " )' " */?> 
							
                          <td></td>
                          <td><?php echo $row['IdKelab'];?></td>
                          <td><a href="programByClub.php?IdKelab=<?php echo $row['IdKelab'];?>"><?php echo $row['NamaKelab'];?></a></td>
							
							<?php //" echo $row['IdKelab'] echo ")'"?>
							  
						 <!-- <td><a href="programByClub.php?IdKelab=<?php //echo $row['IdKelab'];?>"></a></td>-->
                          
                        </tr> 
						  
						</tbody>
						<?php 
							}   
						 ?>
                    </table>
					
					<script>
					
					/*function myFunction(x) {
						
					  alert("Row index is: " + x.rowIndex);
					}*/
						
						/*function goToNewPage(IdKelab){
							window.open("programByClub.php?=IdKelab="+encodeURI(IdKelab));
						}*/
					</script>
					
					
					
                  </div>
                </div>
              </div>
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