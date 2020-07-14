<?php
session_start();
if(!isset($_SESSION['userlogin1'])){
   header("location: index.php"); 
}

include "connection.php";
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
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  
	   </script>
	  
	  	  <script type='text/javascript'>

			function readURL(input) {
				var url = input.value;
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
				var reader = new FileReader();

					reader.onload = function (e) {
						$('#img').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}else{
					$('#img').attr('src', '/assets/no_preview.png');
				}
			}


			$("#upload").change(function(){ 
					readURL(this);
				});

	  </script>
		  
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
                    <a class="dropdown-item" href="PJprofile.php">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="changePassword.php">
                      <i class="dropdown-icon fe fe-lock"></i> Change Password
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
                  <li class="nav-item"> <a href="homepage2.php" class="nav-link"><em class="fe fe-home"></em> Home</a> </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i> Club</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="listOfProgramClub.php" class="dropdown-item ">List Of Program by Club</a>
                    </div>
                  </li>
				  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Upload Program</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
					  <a href="uploadProgramFormPHP.php" class="dropdown-item ">Upload Program</a>
                      <a href="listOfProgram.php" class="dropdown-item ">List of Program Uploaded</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Program Organized</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="programRegistered.php" class="dropdown-item ">Program Registered</a>
                    </div>
                  </li>                             
                </ul>
              </div>
            </div>
          </div>
		  </div>
		  
   <div class="col-md-12">
			<div class="container">
				</br>
				<div class="row">
					<div class="col-sm-8">
				<?php 
				
						$KodProgram = $_GET['KodProgram_edit'];
						$update = mysqli_query($conn, "SELECT * FROM program WHERE KodProgram = '$KodProgram'");

						while($editData = mysqli_fetch_array($update)) {


							$image= 'images/'.$editData['images'];
							$imageName= $editData['images'];
							$kodKelab = $editData['KodKelab'];
							$namaProgram = $editData['NamaProgram'];
							$limitOfParticipant = $editData['BilanganTerhad'];
						  $tarikh = $editData['TarikhProgram'];
						  $tarikhProgram = date("Y-m-d", strtotime($tarikh));
							$butiranProgram = $editData['ButiranProgram'];
						  $idPelajar = $editData['IdPelajar'];
							
						}
				?>
						
			<form class="card" action="edit2.php" method="post" enctype="multipart/form-data" >
			 <div class="card-body">
                  <h3 class="card-title">Update Program Form</h3>
				 <fieldset class="form-fieldset">

                        <div class="form-group">
                          <label class="form-label">PROGRAM NAME<span class="form-required">*</span></label>
                          <input type="text" class="form-control" name="NamaProgram" required autofocus value="<?php echo $namaProgram; ?>"></div> 
					 
						 <div class="form-group">
                          <label class="form-label">PROGRAM DETAIL<span class="form-required">*</span></label>
						  <textarea class="form-control" name="butiranProgram" rows="5" required=""><?php echo strip_tags($butiranProgram);  ?></textarea>
                        </div>

                        <div class="form-group">
                          <label class="form-label">IMAGE POSTER<span class="form-required">*</span></label>
                          <!--<input type="file" name="file" id="file" >
 							<input type="file" name="file" id="file" accept="image/*" onchange="preview_image(event)" >-->
						  <input type="file" id="upload" name="upload" accept="image/*" onchange="readURL(this)" />
							
							</br></br>
				 
				 			<!-- <img id="output_image" />-->
				 
				 			<?php 
				 				//if (mysqli_num_rows($image) > 0) 
				 
				 			?>
				 		  <!--<img id="output_image1" src="<?php //echo $image; ?>" alt="Your Image" on />
				 		  <img id="output_image" alt="" />-->
				 
				 		<img id="img" src="<?php echo $image; ?>" alt="your image" />
						  <!--<img id="blah" src="#" alt="Your image" />-->
								
                        </div>
					 
					    <div class="form-group">
                          <label class="form-label">DATE OF PROGRAM<span class="form-required">*</span></label>
                          <input type="date" class="form-control" name="TarikhProgram" required autofocus value="<?php echo $tarikhProgram; ?>"></div>

					    <div class="form-group">
                          <label class="form-label">LIMIT OF PARTICIPANTS<span class="form-required">*</span></label>
                          <input type="text" class="form-control" name="limitOfParticipant" required autofocus value="<?php echo $limitOfParticipant; ?>"></div>
              
					  <input type="hidden" name="KodProgram" value="<?php echo $KodProgram; ?>">
					  <input type="hidden" name="IdPelajar" value="<?php echo $idPelajar; ?>">
					  <input type="hidden" name="KodKelab" value="<?php echo $kodKelab; ?>">
					  <input type="hidden" name="imageLama" value="<?php echo $namaKelab; ?>">
                      </fieldset>
				  </div>
                <div class="card-footer text-right">
                  <button type="submit" name="submit" class="btn btn-success">Update</button>
                </div>
			</form>
			
					</div>	
				</div>
			  	</div>
			  </div>
			</div> 
		  </div>
		  
		 
		  
		  
        
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