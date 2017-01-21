
<?php include( 'header.php');  
	
?>

 <div class="row" style="overflow-x: hidden;">
	    <div class="panel panel-primary">
		    
		    <div class="page-heading">
			    <h3>Add Notifications</h3>
		    </div>
			
			<div class="panel-body">
				<div class="row head_notif1">
                	<div class="col-md-offset-1 col-md-2 head_notif_each">
                    	<div class="innr_c5665g">
                        <div class="Ttop">
                        <label class="col-md-3" > subject </label>
                        <div class="btn " id="clickForPtaDif" style="float:right;    padding: 1px 15px;"> PTA </div>
                            </div>
                            <div class="Bbottom">
                            	<textarea placeholder="subject.." id="main_notf_sub"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 head_notif_each">
                    	<div class="innr_c5665g">
                        	<div class="Ttop">
                            	<label class="col-md-3" > to </label>
                            </div>
                            <div class="Bbottom">
                            	<div class=" textAre btn inputa" data-toggle="modal" data-target="#myModal" id="tosele56859656f"> <label>select ..</label></div>
                                
                            </div>
                            
                        </div>
                    </div>
                      <div class="col-md-2 head_notif_each">
                    	<div class="innr_c5665g">
                        <div class="Ttop">
                        <label class="col-md-3" > description </label>
                            </div>
                            <div class="Bbottom">
                            	<textarea placeholder="description.." id="main_notf_des"></textarea>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-2 head_notif_each">
                    	<div class="innr_c5665g">
                        <div class="Ttop">
                        <label class="col-md-10" > valid upto </label>
                            </div>
                            <div class="Bbottom">
                                <input type="date"  min="<?php   echo date("Y-m-d"); ?>"  max="<?php  
						// echo date('Y-m-d', strtotime("+7 days")); 
						 $string = date('Y-m-d', strtotime("+1 year")); 
						$timestamp = strtotime($string);
						$day0005 =  date("Y", $timestamp);
						//echo $string;
						$string = $day0005."-04-29";
						echo $string;
						//sat
						//sun
						
						 
						 ?>"   class="textAre" id="main_notf_date" >
                            </div>
                        </div>
                    </div>
                      <div class="col-md-2 head_notif_each" style="border:none;>
                    	<div class="innr_c5665g" ">
                        	<div class="Ttop" style="height:25px;" >
                            </div>
                            <div class="Bbottom">
                            	<div class="btn_textAre btn" id="saveAnAlrt" style="padding:10px;" > <label>SAVE</label></div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="row head_notif2">
                         <table class="table   tablesorter" id="view_table10">
                                 <thead  class="header">
                                    <tr class="success" >
                                      <th  style='width:9%;'><font color="#FFFFFF">Department</th>  
                                      <th style='width:20%;'><font color="#FFFFFF">Subject</th>  
                                      <th  style='width:20%;' ><font color="#FFFFFF">To</th>
                                      <th style='width:20%;' ><font color="#FFFFFF">description</th>  
                                      <th style='width:20%;'><font color="#FFFFFF">valid upto</th> 
                                      <th style='width:10%;'><font color="#FFFFFF">Status</th>                                        
                                    </tr>
                                    
                                </thead>
                                <tbody id="mytbodyI_dt">
                                    <?php
									$query = "SELECT * FROM `alert` ORDER BY `alert`.`date` DESC";
									$result = $a->display($query);
									
									
									$sno =1 ;
									 foreach ( $result as $value) {
										 
										
										 
										 $sta_00tus = '';
										 if($value['status']) {
											 $sta_00tus = 'checked';
										 }
										 $t_to = '';
										 $t_to_main = '';
										 switch ($value['to']) {
											 case 'te':
											 	$t_to_main = ' to all teachers';
											 break;
											 case 'cl':
											 	$t_to_main = ' classes in this department';
											 break;
											 case 'teacher':
											 	$t_to_main = 'teachers';
												$query = "SELECT * FROM `alert_to` WHERE alert =  ".$value['id'];
												$tempDDd = $a->display($query);
												foreach ($tempDDd as $xva) {
													if(strlen($xva['target'])>0) 
														$t_to = $t_to.'
';
														
														$teus ='';
														$query="SELECT * FROM `teacher` WHERE  delete_status=0 AND id = ".$xva['target'];
														$tempd = $a->display($query);
														if(!empty($tempd)) {
														$tempd = $tempd[0];
														$teus = $tempd['user_name'];
																		
														}
														
												$t_to = $t_to.$teus;
												}
												
											 break;
											 
											 
											 case 'student':
											 	$t_to_main = 'students';
												$query = "SELECT * FROM `alert_to` WHERE alert =  ".$value['id'];
												$tempDDd = $a->display($query);
												$uy = true;
												foreach ($tempDDd as $xva) {
													if(strlen($xva['target'])>0) 
														$t_to = $t_to.'
';
														
														$teus ='';
														$query="SELECT * FROM `student` WHERE user_name = '".$xva['target']."'";
														$tempd = $a->display($query);
														if(!empty($tempd)) {
														$tempd = $tempd[0];
														if($uy)  {
															$t_to = '-'.returnClaseeForMe ($tempd['class']).'-
';
															$uy = false;
														}
														$teus = $tempd['fname'].' '.$tempd['lname'];
																		
														}
														
												$t_to = $t_to.$teus;
												}
												
											 break;
											 
											 case 'parent':
											 	$t_to_main = 'parents ';
												$query = "SELECT * FROM `alert_to` WHERE alert =  ".$value['id'];
												$tempDDd = $a->display($query);
												$uy = true;
												foreach ($tempDDd as $xva) { 
														$t_to = $t_to.'
';
														
														$teus ='';
														$query="SELECT * FROM `student` WHERE sid = ".$xva['target']."";
														$tempd = $a->display($query);
														if(!empty($tempd)) {
														$tempd = $tempd[0];
														if($uy)  {
															$t_to = '-'.returnClaseeForMe($tempd['class']).'-
';
															$uy = false;
														}
														$teus = $tempd['fname'].' '.$tempd['lname'];
																
																$query="SELECT * FROM `parent` WHERE st_id = '".$tempd['sid']."'";
																$ghjkl = $a->display($query);
																if(!empty($ghjkl)) {
																	$ghjkl = $ghjkl[0];
																	$teus = $teus.'-('.$ghjkl['name'].') ';
																}
																
																		
														}
														
												$t_to = $t_to.$teus;
												}
												
											 break;
											 
											 default :
											 if($value['type'] == 2 && $value['to']>0) {
												$t_to_main = 'all students in '.returnClaseeForMe ($value['to']);
												 
											 }
											 if($value['type'] == 3 && $value['to']>0) {
												$t_to_main = 'all parents in '.returnClaseeForMe ($value['to']);
												 
											 }
											 
										 }
										 
										 
										 
										$temDepartment = 'no department assigned';//department_id
										$query = "SELECT * FROM `department` WHERE did =  ".$value['department'];
										$tempDDds = $a->display($query);
										if(!empty($tempDDds)) {
										$tempDDds = $tempDDds[0];
										$temDepartment = $tempDDds['name'];
										}
										 
										 
										 
										 $datse = date_create($value['valid']);
										 $datse = date_format($datse,"Y-m-d");
										 
										echo "<tr><td style='width:9%;    font-size: small;'>".$temDepartment."</td><td style='width:20%; padding-left: 15px;'>".
										$value['subject'].
										"</td><td style='width:20%; padding-left: 15px;' id='".$value['id']."' class='hover_action_deta'  data-toggle='tooltip' title='".$t_to."'>".
										$t_to_main.
										"
										 </td><td  style='width:20%; padding-left: 15px;'> <textarea disabled>".
										$value['description'].
										"</textarea></td><td  style='width:20%; padding-left: 15px;'>".
										$datse.
										"</td><td><input id='change-click-event' type='checkbox' class='change_stAtus' bt_id='".$value['id']."' name='my-checkbox' ".$sta_00tus."></td></tr>";
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
				return $yearsWord.'  '.$Cvalue['division'];
				} else {
		return "no class in charge";
	}
	
	
}

?>




<?php

function returnClasee ($opRslt) {
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






<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="addAsubDet" id="addAsubDetHere">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">select</h4>
      </div>
      <div class="modal-body">
         <div class="row ">
             <div class="col-md-offset-1 col-md-3 mod_ma_cl">
             	<input type="button"  class="btn btn-primary wid100" id="model_o_1" value='teacher'>
             </div>    
             <div class=" col-md-4 mod_ma_cl">
             	<input type="button" class="btn btn-primary wid100" id="model_o_2" value="student" >
             </div>    
             <div class="col-md-3 mod_ma_cl">
             	<input type="button"  class="btn btn-primary wid100" id="model_o_3" value="parent">
             </div>   
                       	
          </div>
          <div class="row mycust_modl_body">
          <div class="col-md-12 ">
          	 <div class="col-md-4 ">
              	
              </div>
              
              <div class="col-md-4 hidden">
              	<button type="button" id="ist_check_bo_20" class="btn btn-warning  button_for_ button_for_0">uncheck</button> 
                <button type="button" id="ist_check_bo_21" class="btn btn-warning  button_for_ button_for_1">check all</button>
              </div>
              
              <div class="col-md-4 hidden">
              	<button type="button" id="ist_check_bo_30" class="btn btn-warning  button_for_ button_for_0">uncheck</button>
                 <button type="button" id="ist_check_bo_31" class="btn btn-warning  button_for_ button_for_1">check all</button>
              </div>
          </div>
          	<div class="col-md-12 ">
            	<div class="col-md-4 myinnr_modl">
                	<div class="div_Scrool_in" id="div_Scrool_in_001">
                    	
                  
                    </div>
                </div>
                <div class="col-md-4 myinnr_modl" >
                	<div class="div_Scrool_in" id="div_Scrool_in_002">
                    	
                  
                    </div>
                </div>
                <div class="col-md-4 myinnr_modl" >
                	<div class="div_Scrool_in" id="div_Scrool_in_003">
                    
                  
                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="button" class="btn btn-primary" value="submit" id="submitaddbutton_okay">
</form>

        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton_4ofr_alrt" >Close</button>
      </div>
    </div>
  </div>
</div>





<?php include_once('footer.php'); ?>
