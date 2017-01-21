<?php

session_start();
if( !isset($_SESSION['te']) ) {
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

<?php
$amAHOD = false;
$query = "SELECT * FROM `department` WHERE hod ='".substr($_SESSION['te'],3)."'";
							$OUTTresultTf = $a->display($query);
							if (!empty($OUTTresultTf)) { 
								$amAHOD = true;
							}
							

/*
* class teacher
*/

$amACLASSTEACHER = false;
$myClassCharge = '';
$dprtMnt_t = 0;
$query = "SELECT * FROM `teacher`WHERE  delete_status=0 AND user_name ='".substr($_SESSION['te'],3)."'";
							$OUTTresultNf = $a->display($query);
								 $OUTTresultNf = $OUTTresultNf[0];
							if (!is_null($OUTTresultNf['class_id'])) {
								 $myClassCharge = $OUTTresultNf['class_id']; 
								$amACLASSTEACHER = true;
								$dprtMnt_t =  $OUTTresultNf['department']; 
								
								
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
        
        
        <link rel="stylesheet" href="../assets/lobibox/css/lobibox.css">  
        <link rel="stylesheet" href="../assets/lobibox/css/animate.css">    
        
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
        <!----------------------------------------------------------------------------->
        
           <div draggable="true"  class=" gradientBoxesWithOuterShadows display_deta_" id="display_deta_id">
                        <?php
						
						$query = "SELECT * FROM `department` WHERE  hod = '".substr($_SESSION['te'],3)."'";
						$dprtmnrt_na = $a->display($query);
						if(!empty($dprtmnrt_na)) {
							$dprtmnrt_na = $dprtmnrt_na[0];
							echo '<div class="row">
                            	<label class="col-md-3">HOD </label>
                            	<div class="col-md-8">'.
								$dprtmnrt_na['name']
								.'</div>
                            </div>';
						}
						
						
						
							echo '<div class="row">
                            	<label class="col-md-3">Class IN </label>
                            	<div class="col-md-7">'.
								returnClasee_ ($OUTTresultNf['class_id'])
								.'</div>
                            </div>';
							//
						
						$query = "SELECT * FROM `subject`s LEFT JOIN class_subject cs on s.sub_id = cs.sid WHERE cs.tid =".$OUTTresultNf['id'];
						$classEdnae = $a->display($query);
						if(!empty($classEdnae)) {
							$jcov = true;
							foreach($classEdnae as $vVal) {
								if($jcov) {
									echo '<div class="row">
									<label class="col-md-3">Subjects </label>
									<div class="col-md-8"><span class="
glyphicon glyphicon-hand-right " aria-hidden="true"> </span> '.
									$vVal['sub_name']
									.'</div>
									</div>';
									$jcov = false;	
								} else {
									echo '<div class="row">
									
									<div class="col-md-offset-3 col-md-8"> <span class="
glyphicon glyphicon-hand-right " aria-hidden="true"> </span> '.
									$vVal['sub_name']
									.'</div>
									</div>';
								}
							
							}
						}
						
					
						
						
						
						?>
                        
                        
                        <!--
                        	<div>
                            	<label class="col-md-3">HOD </label>
                            	<div class="col-md-8">
                                	bsc computer sciencde
                                </div>
                            </div>
                            -->
                        </div>
        
        
        
        
        
        <!--------------------------------------------------------------------------------->
        
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
                <li><a href="subject.php">subject</a></li> 
                <li><a  href="call.php">video call</a></li> 
               <!-- target="_blank"  -->
               
                 
                <?php
					if($amAHOD) {
				?>
                <li><a href="class_subject.php">set subject</a></li> 
                <?php
					}
				?>
                
				<li>
		            <a href="#">
		                <i class="fa fa-group"></i>
		                <span>Student</span>
		            </a>
		            <ul class="">
		                <li class="">
		                    <a href="add_student.php">
		                        <span><i class="entypo-dot"></i> Add Student</span>
		                    </a>
		                </li>
                        <?php 
						if ($amACLASSTEACHER) {
							echo '<li class="">
		                    <a href="parent.php">
		                        <span><i class="entypo-dot"></i> Add Parent</span>
		                    </a>
		                </li>';
							
						}
						?>
                          <?php 
						if ($amACLASSTEACHER) {
							echo '<li class="">
		                    <a href="confirm_student.php">
		                        <span><i class="entypo-dot"></i> Confirm Student</span>
		                    </a>
		                </li>';
							
						}
						?>
                         <?php 
								if(true) {
									echo "<li><a href='exam.php'><span><i class='entypo-dot'></i>exams</span></a></li>";
								}
							?>
							 
                             
		                <li>
                        	<a href="assignment.php">
                            <span><i class="entypo-dot"></i> assignment</span>
                            </a>
                       </li> 
                        <li>
                        	<a href="mark_sem_ass.php">
                            <span><i class="entypo-dot"></i> assignment Marks</span>
                            </a>
                       </li> 
				
			</ul>
			
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
                                <?php
								$query = "SELECT * FROM `department` WHERE did =".$dprtMnt_t;
								$dprtmrntdis = $a->display($query);
								$dprtmrntdis = $dprtmrntdis[0];
								
								?>
                                    <li><i class="entypo-user"></i><?php echo $_SESSION['te']; ?></li>
                                    <li><font style="font-size:13px;"> <?php echo '  ( '.$dprtmrntdis['name'].')'; ?></font></li>
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
		    
            </div>
            <div class="" style="height: 74px;"></div>
		    
		    <div class="col-md-12 p-t-40">
            
<?php 
function returnClasee_ ($opRslt) {
	if(is_null($opRslt)) {
		return "no class in charge";
	}
	
	global $a;
				$query = "SELECT * FROM sub_class s  LEFT JOIN class c on c.id=s.cid WHERE s.class_id =  ".$opRslt."";
				$subDeprt = $a->display($query);
				if(!empty($subDeprt)) {
				$Cvalue = $subDeprt[0];
				
                $yearsWord = $Cvalue['batch'];
                $currntYear =  date("Y");
                $currntMonth =(int)date("m");
                $startYeat = substr($Cvalue['batch'],0,4);
                $finalYear = substr($Cvalue['batch'],5);
                $date1=date_create($startYeat.'-01-01');
                $date2=date_create($currntYear.'-01-01');
                $diff=date_diff($date1,$date2);
                $yearsNo = $diff->format("%R%Y");
                $noOfYearz = (int)$yearsNo;
                if($currntMonth < 4 ) {
                    $noOfYearz = $noOfYearz-1;
                }
				
                switch ($noOfYearz) {
                    case 00:
                        $yearsWord = "1st year";
                    break;	
                    case 01:
                        $yearsWord = "2nd year";
                    break;	
                    case 02:
                        $yearsWord = "3rd year";
                    break;
                    default :
                    if( $noOfYearz > 02 ) {
                        $yearsWord = $noOfYearz."th year ";
                        break;
                    }
				}
				return $yearsWord.'  '.$Cvalue['division'];
				} else {
		return "no class in charge";
	}
	
	
}


?> 