

<!------------------------------------------------------------->
<?php

session_start();
if( !isset($_SESSION['li']) ) {
	
	echo '<script type="text/javascript">location.href = "../index.php";</script>';
	exit('Please login');
}


//-------------------data base-----------------------//

try {
	require_once('../includes/db.php');
	$a = new Database();
	
}catch (Exception $e){
	
}

?>




<!doctype html>
<html><head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
        <link rel="stylesheet" href="<?php echo CSS ?>/passwrdStrng.css">
        <link rel="stylesheet" href="<?php echo CSS ?>/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo CSS ?>/datepicker.css">
        <link rel="stylesheet" href="<?php echo CSS ?>/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="<?php echo CSS  ?>/select2.min.css">
        <link rel="stylesheet" href="<?php echo CSS  ?>/bootstrap-switch.min.css">
        <link rel="stylesheet" href="<?php echo CSS  ?>/table_sort/style.css">
        
        
        <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome/css/font-awesome.min.css">
        
        
        <?php //-------------------------------------------------//?>
        
        <link rel="stylesheet" href="../assets/lobibox/css/lobibox.css">  
        <link rel="stylesheet" href="../assets/lobibox/css/animate.css">    
        
        
        <!----------->
               
        
        
        <!-------------->
        
                
        
        <link rel="stylesheet" href="<?php echo CSS ?>/custom.css">
        <link rel="stylesheet" href="<?php echo CSS ?>/table_cust.css">
        <link rel="stylesheet" href="<?php echo CSS ?>/custom_sub.css">
        
        
        
        
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
                <li><a href="add_type.php">Section</a></li> 
                <li><a href="search.php">Search</a></li> 
                <li><a href="book.php">book</a></li> 
                <li><a href="book_student.php">student</a></li> 
				
                <li><a href="settings.php">settings</a></li> 
                <!--
		            <a href="">
		                <i class="fa fa-group"></i>
		                <span>book</span>
		            </a>
		            <ul class="">
		                <li class="">
		                    <a href="#">
		                        <span><i class="entypo-dot"></i> Admit Student</span>
		                    </a>
		                </li>
		               
				
			</ul>
			-->
		</div>

	</div>

	<div class="main-content">
				
		<div class="row">
			
            <div class="head_fix_pos border-bottom">
            
                <div class="col-md-12 text-center">
                    <h2></h2>
                </div>
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-md-6 text-left clearfix ">
                            
                            <div class="header-info-wrapper no_border">
                                <ul>
                                    <li><i class="entypo-user"></i><?php echo $_SESSION['li']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <ul>
                            <li><a href="logout.php"><i class="entypo-logout"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
		    
            </div>
            <div class="" style="height: 74px;"></div>
            
		    <div class="col-md-12 p-t-50">




