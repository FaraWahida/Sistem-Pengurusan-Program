<?php


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
    <title>Login - tabler.github.io - a responsive, flat and full featured admin template</title>
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
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="LOGOSPP2.png" alt="" class="h-7">
              </div>
              <form class="card" name="chngpwd" action="changePasswordPHP.php" method="post" onSubmit="return valid();" >
				  
                <div class="card-body p-6">
                  <div class="card-title">Login to your account</div>
                  <div class="form-group">
                    <label class="form-label">Current Password</label>
					  <input type="password" class="form-control" name="opwd" id="opwd" placeholder="Current Password">
					
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      New Password
                      <!--<a href="./forgot-password.html" class="float-right small">I forgot password</a>-->
                    </label>
                    <input type="password" class="form-control" name="npwd" id="npwd" placeholder="New Password">
                  </div>
				 <div class="form-group">
                    <label class="form-label">
                      Confirm Password
                      <!--<a href="./forgot-password.html" class="float-right small">I forgot password</a>-->
                    </label>
                    <input type="password" class="form-control" name="cpwd" id="cpwd" placeholder="Confirm Password">
					 
					 <!-- </br></br> -->
				  <!-- <p style="color:red;"><?php //echo $_SESSION['msg1'];?><?php //echo $_SESSION['msg1']="";?></p> -->
                  </div>
        <?php
          if (!empty($_GET['val']))		
		  {
			 $value_get = $_GET['val'];
			 if (!empty($value_get)) {
               echo "<div class='alert alert-icon alert-success' role='alert' Display: none;><i class='fe fe-alert-triangle mr-2' aria-hidden='true'></i>".$value_get."</div>";
          }
		  }
        ?>
					
                  <!--<div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" />
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>-->
					
				<!--<div class="alert alert-icon alert-danger" role="alert" Display: none;>
 				 <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Log in failed. Invalid username or password.
				</div>-->
					
                  <div class="form-footer">
                    <button type="submit" name="submit" value="Change Password" class="btn btn-primary btn-block">Change Password</button>
                  </div>
                </div>
              </form>
              
				
				<!--<div class="text-center text-muted">
                Don't have account yet? <a href="./register.html">Sign up</a>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
	  
<script type="text/javascript">
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>
	  
  </body>
</html>