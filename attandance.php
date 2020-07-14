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
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
		  
		  
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                List of Program
              </h1>
            </div>

<?php

			  $KodProgram = $_GET['KodProgram_record'];
			  
		  
   
			  
			  //$sql = "SELECT daftarprogram.IdPelajar, pelajar.NamaPelajar, program.NamaProgram, pelajar.NomborTelefon, daftarprogram.TarikhDaftarProgram FROM daftarprogram, program, pelajar WHERE daftarprogram.IdPelajar=pelajar.IdPelajar AND program.KodProgram=daftarprogram.KodProgram AND daftarprogram.KodProgram = '$KodProgram'";
			  
			  $sql = "SELECT daftarprogram.IdPelajar, pelajar.NamaPelajar, program.NamaProgram, pelajar.NomborTelefon, daftarprogram.TarikhDaftarProgram,daftarprogram.KodProgram,daftarprogram.Kehadiran FROM daftarprogram, program, pelajar WHERE daftarprogram.IdPelajar=pelajar.IdPelajar AND program.KodProgram=daftarprogram.KodProgram AND daftarprogram.KodProgram = '$KodProgram'";
			  
    		  $result = mysqli_query($conn, $sql);




if (mysqli_num_rows($result) > 0) 

?>
  <!--<h6>Nama Program:</h6>-->

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
		  <th></th>
        <th> STUDENT ID </th>
	   <th> STUDENT NAME </th>
        <th> PHONE NUMBER </th>
		<th>DATE OF JOIN PROGRAM</th>
		  <th>ATTENDANCE</th>
		  <th></th>

      </tr>
    </thead>

    <?php
      	//OUTPUT DATA OF EACH ROW
	while($row = mysqli_fetch_assoc($result)){
		
		$IdPelajar = $row['IdPelajar'];
        $kehadiran = $row["Kehadiran"];
        $kod = $row["KodProgram"];
      
    ?>

  <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"><span> </td>
      <td><?php echo $row["IdPelajar"]; ?></td>
	  <td> <?php echo $row["NamaPelajar"]; ?></td>
	  <td><?php echo $row["NomborTelefon"]; ?></td>
      <td><?php echo $row["TarikhDaftarProgram"]; ?></td>
	  <td>
        <?php
            if ($kehadiran == "PRESENT") {
              echo "<a class='btn btn-success pre present$IdPelajar' id='present$IdPelajar' value='$IdPelajar'>Present</a>";
            }else {
              echo "<a class='btn btn-primary pre present$IdPelajar' id='present$IdPelajar' value='$IdPelajar'>Present</a>";
            }
        ?>
      </td>
      <td>
        <?php
            if($kehadiran == "ABSENT") {
              echo "<a class='btn btn-success ab absent$IdPelajar' id='absent$IdPelajar' value='$IdPelajar'>Absent</a>";
            }else {
              echo "<a class='btn btn-primary ab absent$IdPelajar' id='absent$IdPelajar' value='$IdPelajar'>Absent</a>";
            }
        ?>  
	  </td>  
	</tr> 
		
    </tr> 
	  <?php 
	  	}   
	 ?>
  </tbody>
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
</div> <!-- flex-fill-->
		
		
<script>
	
	$(document).ready(function(){

    var kodprogram = "<?= $kod ?>";
    
		//button present
		$(".pre").on("click", function(e){

        var idpresent = $(this).attr("value");
        var idabsent = $(this).attr("value");

        console.log("present"+idpresent);
        e.preventDefault();
        
        $.ajax({
        // change complete for success
        url: 'present.php',
        type: 'POST',
        data: {updatePresent: idpresent, kodProgram: kodprogram},
        success: function(){
          $("#present"+idpresent).removeClass("btn-primary");
          $("#present"+idpresent).addClass("btn-success");
          $("#absent"+idabsent).removeClass("btn-success");
          $("#absent"+idabsent).addClass("btn-primary");
        }
        });
		});
		

        //button absent
		$(".ab").on("click", function(e){

        var idpresent = $(this).attr("value");
        var idabsent = $(this).attr("value");

        console.log("Absent"+idabsent);
        e.preventDefault();
        
        $.ajax({
        // change complete for success
        url: 'absent.php',
        type: 'GET',
        data: {Absent: idabsent, kodProgram: kodprogram},
        success: function(){
          $("#absent"+idabsent).removeClass("btn-primary");
          $("#absent"+idabsent).addClass("btn-success");
          $("#present"+idpresent).removeClass("btn-success");
          $("#present"+idpresent).addClass("btn-primary");
        }
        });
		});
	  
	});
	
	
	//function presentFunction() {
		
		//document.getElementById("present").style.color = "red";
		//document.getElementsByClassName("btn btn-primary")[0].style.backgroundColor = "red";
	//}
	/*$(document).ready(function(){

    var id = $("#present").attr("value");

	  $(function(){
		
		//button present
		$("#present").on("click", function(e){
		  e.preventDefault();
		  
		  $.ajax({
			// change complete for success
      url: 'present.php',
      type: 'POST',
      data: {updatePresent: id},
			success: function(){
			  $("#present").removeClass("btn-primary");
			  $("#present").addClass("btn-success");
        $("#absent").removeClass("btn-warning");
			  $("#absent").addClass("btn-danger");
			}
		  });
		});
		
	  });

        //button absent
		$("#absent").on("click", function(e){
		  e.preventDefault();
		  
		  $.ajax({
			// change complete for success
      url: 'absent.php',
      type: 'GET',
      data: {Absent: id},
			success: function(){
			  $("#absent").removeClass("btn-danger");
			  $("#absent").addClass("btn-warning");
        $("#present").removeClass("btn-success");
			  $("#present").addClass("btn-primary");
			}
		  });
		});
	  
	});
	
	*/
</script>
		
<script>
	
	/*function presentFunction() {
		
		  document.getElementById("present").style.color = "red";
	}*/
	
</script>
		
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
  