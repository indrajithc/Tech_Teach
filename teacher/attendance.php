
<?php

include( 'header.php'); 


?>


<?php
	$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".substr($_SESSION['te'],3)."'";
	$OUTTresult = $a->display($query);
	$OUTTresult = $OUTTresult[0];
?>
     
   <div class="row" style=" margin-top: -20px;">
		    <div class="page-heading">
			    <h3>attendance</h3>
		    </div>
				<div class="tab-content muclassfoehei">
					 
				    <div role="tabpanel" class="tab-pane active" id="view-class">
					     <div class="row head_notif2">
                         <table class="table   tablesorter" id="view_table10">
                                 <thead  class="header">
                                    <tr class="success" >
                                      <th  style='width:9%;'><font color="#FFFFFF">Date</th>  
                                      <th style='width:20%;'><font color="#FFFFFF">Class</th>  
                                      <th  style='width:20%;' ><font color="#FFFFFF">Subject</th>
                                      <th style='width:10%;' ><font color="#FFFFFF">hour</th>  
                                      <th style='width:20%;'><font color="#FFFFFF">attendance</th> 
                                      <th style='width:20%;'><font color="#FFFFFF">teacher</th>                                        
                                    </tr>
                                    
                                </thead>
                                <tbody id="mytbodyI_dt">
                                    <?php
									$query = "SELECT * FROM `global_attendance_base` WHERE class_id=".$OUTTresult['class_id']." OR teacher_id='".$OUTTresult['user_name']."' ORDER BY `global_attendance_base`.`date` DESC LIMIT 20";
									$result = $a->display($query);
									
									
									$sno =1 ;
									 foreach ( $result as $value) {
										 
										  $query = "SELECT * FROM `subject` WHERE sub_id=".$value['sub_id'];
									$subjectId = $a->display($query);
									$sub_id = "";
									
									if(!empty($subjectId)) {
										$subjectId = $subjectId[0];
										$sub_id = $subjectId['sub_name'];
									}
										 
										 
										 
										 	 
										  $query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".$value['teacher_id']."'";
									$subjectIaa = $a->display($query);
									$user_na_me = "";
									
									if(!empty($subjectIaa)) {
										$subjectIaa = $subjectIaa[0];
										$user_na_me = $subjectIaa['fname'].' '.$subjectIaa['lname'];
									}
										 
										 
										 	  $query = "SELECT * FROM `global_attendance_child` WHERE  attendance_id=".$value['local_id']." AND user_id ='".$value['teacher_id']."'";
									$sglobal_attendance_child = $a->display($query);
									$user_na_be = "";
									if(!empty($sglobal_attendance_child)) {
										foreach($sglobal_attendance_child as $chil) {
											$query = "SELECT * FROM `student` WHERE  delete_status=0 AND user_name =  '".$chil['student']."'";
											$students = $a->display($query);
											$students = $students[0];
											
											
											$user_na_be = $user_na_be
											.'<h4 style="over-flow:hidden;"><label>'.$students['user_name'].'  /  '.$students['fname'].' '.$students['lname'].'</label></h4>';
										}
										
									}
										 
										 
										 $datse = date_create($value['date']);
										 $datse = date_format($datse,"Y-m-d");
										 
										echo "<tr><td style='width:9%;    font-size: small;'>".$datse ."</td><td style='width:20%; padding-left: 15px; font-size:14px;'>".returnClaseeForMe ($value['class_id'])
										.
										"</td><td style='width:20%; padding-left: 15px;'  >".
										$sub_id.
										"
										 </td><td  style='width:10%; padding-left: 15px;'>  ".
										$value['hour_id'].
										" </td><td  style='width:20%; padding-left: 15px;'>".
										$user_na_be.
										"</td><td style='width:20%; padding-left: 15px;' class='hover_action_deta'  data-toggle='tooltip' title='".$value['teacher_id']."'> ".$user_na_me."</td></tr>";
										$sno++;
									 }
										
										
									
									
									?>
                                    
                                </tbody>
                            </table>       	                                   
            
                </div>
        
              
               
			</div>
	    </div>
    </div>





<?php

function returnClaseeForMe ($opRslt) {
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
				
				$query = "SELECT * FROM department  WHERE did =  ".$Cvalue['did']."";
				$dpname_must = $a->display($query);
				$dpname_must = $dpname_must[0];
				return $yearsWord.'  '.$Cvalue['division'].' ('.$dpname_must['name'].')';
				} else {
		return "no class in charge";
	}
	
	
}


?>




<?php include_once('footer.php'); ?>
