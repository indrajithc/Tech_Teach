<?php
			session_start();
			
			if(isset($_SESSION['te'])) {
				echo '<script type="text/javascript">location.href = "teacher/index.php";</script>';
			} else if (isset($_SESSION['st'])) {
				echo '<script type="text/javascript">location.href = "student/index.php";</script>';
				
			} else if (isset($_SESSION['ad'])) {
				echo '<script type="text/javascript">location.href = "admin/index.php";</script>';
				
			} else if (isset($_SESSION['li'])) {
				echo '<script type="text/javascript">location.href = "library/index.php";</script>';
				
			}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Project</title>
		
		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Favicons -->
		<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="assets/img/favicon.ico">
		
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700">
		
		<link rel="stylesheet" href="assets/css/custom.css">
        
		<link rel="stylesheet" href="assets/special_animations/css3-animated-clouds/css/style.css">		
	</head>
	<body style="height:auto;">
		
		<!-- Navigation top
		================================================== -->
		<div class="navigation-top-bar">
			<nav class="navbar navbar-default">
			  <div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="index.php">Tech Teach</a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 text-right">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="newLogin.php">new user</a></li>
			      </ul>
			      
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</div>
			
			
		<!-- HEADER
		================================================== -->
          <div class="sky" style="
    height: 560px;
    margin-top: 60px;
">
    <div class="moon"></div>
    <div class="clouds_one"></div>
    <div class="clouds_two"></div>
    <div class="clouds_three"></div>
  </div>
		<section class="site-header login-wrapper" role="banner"style="
    position: absolute;
    top: -80px;
    text-align: center;
    width: 100%;
    padding-left: 115px;
">
        
        
        
			<div class="container" >
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-8">
						<form id="login-form" style="    background: rgba(255,255,255,0.6);">
							<h3>Login</h3>
                            <!--
							<input type="text" minlength="2" required id="name" class="form-control" name="user_name" placeholder="Username"/>
                            -->
                            
                            <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 37px; width:68px;" id="selectOneActionFo">
          Teacher
        </button>
        <div class="dropdown-menu">
        <ul style="width: 250px; padding-left:0px;" id="selectOneLogin">
          <li style="padding: 6px;"><a class="dropdown-item" value=''>Admin</a> </li>
           <li style="padding: 6px;"><a class="dropdown-item"   value='te-'>Teacher</a> </li>
           <li style="padding: 6px;"><a class="dropdown-item"   value='st-'>Student</a> </li>
           <li style="padding: 6px;"><a class="dropdown-item"   value='li-'>Library</a> </li>
           
          </ul>
        </div>
      </div>
      <input type="text" class="form-control" aria-label="Text input with dropdown button" style="top: -5px;width: 182px; max-width: 182px;"  minlength="2" required id="name" name="user_name" placeholder="Username"  user_key='te-'>
    </div>
    
    
                            
                            
                            
							<input type="password" id="password"  class="form-control" name="password" placeholder="Password"/>
							<input id="main-login-submit" type="submit" value="Login" class="btn btn-primary" />
                            <div style="height:20px; width:100%">
                            <a href="" class="hidden" style=" font-size: 13px;  color: #0AA699;" id="forgotpass_wrd">Forgot password? </a>
                            </div>
						</form>
					</div>
			
				</div><!-- row -->
			</div><!-- container -->
            
            
            
            
		</section>
		
		<footer>
			
		</footer>
		
		<!-- Bootstrap core JavaScript
			Placed at the end of the document so the pages load faster
		================================================== -->
		<script src="assets/js/jquery-1.11.3.min.js"></script>

		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/special_animations/css3-animated-clouds/js/prefixfree.min.js"></script>
		
	</body>
</html>
