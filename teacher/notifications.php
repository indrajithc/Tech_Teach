<?php

include( 'header.php'); 


?>

                
		
<div class="row">



   
	    <div class="panel panel-primary">
		    
		    <div class="page-heading">
			    <h3>Notifications</h3>
               </div> 
                
			<div class="panel-body noticationsMain">
        <?php
		
		$query = "SELECT COUNT(*) AS total FROM `alert` WHERE status = 1 ORDER BY `alert`.`date` DESC";
        $countR = $a->display($query);
		 $countR =  $countR[0];
		?>
        
        
            
            	<div class="divContainrFornueNot" id="mainNotificationDisppalyhr" total="<?php echo $countR['total']; ?>">
	<?php
     
   		$query = "SELECT * FROM `alert` WHERE status = 1 AND DATE(valid) >= CURDATE() ORDER BY `alert`.`date` DESC";
        $notificatins = $a->display($query);
    
    foreach($notificatins as $value) {
		
		$time = strtotime($value['date']);
$craretime = date("d/m/Y g:i A", $time);
		$time = strtotime($value['valid']);
$desttime = date("d/F/Y ", $time);

if(checkIsAvalidpersn2see($value['id'], $value['department'], $value['type'], $value['to']))
		echo '<div class="innrainrFornueNot">
                    	<label > '.$value['subject'].'</label>
                        <label style="float:right; font-size:14px;" > '.$craretime.'</label>
                                            	<div >
                        	<p >  '.$value['description'].'</p>
                            <p style="text-align:right; font-size:15px;">valid up to '.$desttime.'  </p>
                        </div></div>';
	}
	
	
    ?>
                
                
                <!--
                    <div class="innrainrFornueNot">
                    	<label > subject this</label>
                        <label style="float:right; font-size:14px;" > date</label>
                                            	<div >
                        	<p > 
                             sdfskjdfh ssdfh shisfdgdsdfgdfgjkfd hgdfg dfgkgj dhfg
                            </p>
                            <p style="text-align:right; font-size:15px;">valid up to  </p>
                        </div>
                    
                    </div>  -->      
                
                </div>        
        
				   
			</div>
	    </div>











    </div>


<?php


				
								
function returnDb ($opRslt) {
	if(is_null($opRslt)) {
		return "no class in charge";
	}
	
	global $a;
				$query = "SELECT * FROM sub_class s  LEFT JOIN class c on c.id=s.cid WHERE s.class_id =  ".$opRslt."";
				$subDeprt = $a->display($query);
				if(!empty($subDeprt)) {
				$Cvalue = $subDeprt[0];
				return $Cvalue['did'];
				} else {
		return 0;
	}
	
	
}



function checkIsAvalidpersn2see($id, $department, $user_type,$sessiox) {
	$vretrun = false;
	global $a;
	
	
		$sessionS = '';
		
		if(isset($_SESSION['te'])) {
			$sessionS = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessionS = $_SESSION['st'];
		} else {
			
			return 0;
		}
		
		$arrayOp = array();
		
		$sessionSa = substr( $sessionS ,0, 2);
		$sessionSb = substr( $sessionS ,3);
		$department949693 = 0;
		$glob_usr_id = 0;
		if (!ctype_digit($sessionSb)) {
			$query = "SELECT * FROM `teacher` WHERE user_name ='".$sessionSb."' AND  delete_status=0 ";
						$arrayOp = $a->display($query);
						$arrayOp  = $arrayOp[0];
						$department949693 = $arrayOp['department'];
						$glob_usr_id = $arrayOp['id'];
		} else {
			$query = "SELECT * FROM `student` WHERE user_name ='".$sessionSb."' AND delete_status=0 ";
						$arrayOp = $a->display($query);
						$arrayOp =$arrayOp[0];
						$department949693 = returnDb ($arrayOp['class']);
						$glob_usr_id = $arrayOp['user_name'];
		}
		
		if($department949693 == $department) {
			
				if (!ctype_digit($sessionSb) && ($user_type==1) ) {
					if($sessionSa   == $sessiox) {
						$vretrun = true;
						
					} else if ( 'teacher' == $sessiox) {
						$query = "SELECT * FROM `alert_to` WHERE `alert_to`.`alert`=".$id." AND  `alert_to`.`target` ='".$glob_usr_id."'";
						$chek_inT0clol = $a->display($query);
						foreach($chek_inT0clol as $tVal) {
							$vretrun = true;
							}
					}
					
				} else if (ctype_digit($sessionSb) && $user_type==2) {
					
					if(is_numeric($sessiox)) {
						if($sessiox == $arrayOp['class']) {
							$vretrun = true;
						} 
					} else if($sessiox == 'student') {
						$query = "SELECT * FROM `alert_to` WHERE `alert_to`.`alert`=".$id." AND  `alert_to`.`target` ='".$glob_usr_id."'";
						$chek_inT0clol = $a->display($query);
						foreach($chek_inT0clol as $tVal) {
							$vretrun = true;
							}
					}
				}
		
		}
	return $vretrun;
}


?>

<?php include_once('footer.php'); ?>
