<?php

session_start();
if( !isset($_SESSION['st']) ) {
	echo '<script type="text/javascript">location.href = "../index.php";</script>';
	exit('Please login');
}
?>

<?php

//-------------------data base-----------------------//

try {
	require_once('../includes/db.php');
	$a = new Database();
	
}catch (Exception $e){
	
}

?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="<?php echo CSS ?>/passwrdStrng.css">
	<link rel="stylesheet" href="<?php echo CSS ?>/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo CSS ?>/datepicker.css">
	<link rel="stylesheet" href="<?php echo CSS ?>/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="<?php echo CSS  ?>/select2.min.css">
	
	
	<link rel="stylesheet" href="<?php echo CSS ?>/font-awesome/css/font-awesome.min.css">
	
	
	<?php //-------------------------------------------------//?>
	
	<link rel="stylesheet" href="../assets/lobibox/css/lobibox.css">  
	<link rel="stylesheet" href="../assets/lobibox/css/animate.css">    
	
	
        <!----------->
        
        

        
        <link rel="stylesheet" href="<?php echo CSS ?>/custom.css">
        <link rel="stylesheet" href="<?php echo CSS ?>/table_cust.css">
        <link rel="stylesheet" href="<?php echo CSS ?>/custom_sub.css">
        
        
        
        <link rel="stylesheet" href="<?php echo CSS ?>/post.css">
        
        
        <link rel="stylesheet" href="<?php echo CSS ?>/css/css/jquery.Jcrop.min.css" type="text/css" />

        
        
        
        
        
        
        
    </head>
    <body class="teacher-section page-body">
        
        
<div class="page-container">
	
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<div class="logo">
					<a href="index.php">
						<img src="../assets/img/logo@2x.png" width="200" alt="" />
					</a>
				</div>

			</header>
			
									
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active"-->
				<li class="active opened active">
					<a href="index.php">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>
				
				<li><a href="q-wall.php">Q Wall</a></li> 
				<li><a href="profile.php">Profile</a></li> 
				<li><a href="updates.php">updates</a></li> 
				<li><a href="gallery.php">gallery</a></li> 
               <!-- <li><a href="#">subject</a></li> 
             
                
				<li>
		            <a href="#">
		                <i class="fa fa-group"></i>
		                <span>Student</span>
		            </a>
		            <ul class="">
		                <li class="">
		                    <a href="#">
		                        <span><i class="entypo-dot"></i> Add Student</span>
		                    </a>
		                </li>
		            -->  
		            
		        </ul>
		        
		    </div>

		</div>

		<div class="main-content">
			
			<div class="row">
				
				<div class="col-md-12 text-center">
					<h2></h2>
				</div>
				<div class="col-md-12 border-bottom custMyHead">
					<div class="row ">
						<div class="col-md-6 text-left clearfix ">
							
							<div class="header-info-wrapper">
								<ul>
									<li><i class="entypo-user"></i><?php echo $_SESSION['st']; ?></li>

								</ul>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<ul>
								
								
								<!------------------------------------------------------>
								<?php
								
								$query = "SELECT COUNT(*) AS total FROM `alert` WHERE status = 1 ORDER BY `alert`.`date` DESC";
								$countRc = $a->display($query);
								$countRc =  $countRc[0];
								
								?>
								
								<li><a href="notifications.php"><span class="glyphicon glyphicon-bell alert_icon_this_inokClks949693" aria-hidden="true" total="<?php echo $countRc['total']; ?>"></span><span class="alert_icon_this_inokClks949693SSSS" style="float:left; padding-left:5px;    font-size: small;  color: red;"></span></a> </li>
								
								
								<!---------------------------------------------->
								
								
								<li><a href="logout.php"><i class="entypo-logout"></i>Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 p-t-40"><!doctype html>
					<html>
					<head>
						<meta charset="utf-8">
						<title>Untitled Document</title>
					</head>
					<body>
						<!--ALL NAVIGATON LINKS -->
						
						
						
						
					</body>
					</html>