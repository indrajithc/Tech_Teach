<?php

include( 'header.php'); 

if($amACLASSTEACHER) {
	
$globalStudIdUniq = 0;
?>

                
			<?php 
			
                    $ui45983573 = true;
                $query = ' SELECT d.did, d.name, c.batch ,s.division,t.class_id FROM department d
                 LEFT JOIN class c on c.did=d.did  LEFT JOIN sub_class s on
                  s.cid = c.id LEFT JOIN teacher
                   t on t.class_id = s.class_id where t.delete_status=0 AND t.user_name="'.substr(($_SESSION['te']),3).'" ';
                  // echo $query;
                $result_of_class = $a->display($query);
                if(!isset($result_of_class)) {
				
                    return;
                    
                }
                if ($result_of_class) {
				//	echo $query;
                $result_of_class =  $result_of_class[0];
                $class_ID = $result_of_class['name'];
                
                $staX = true ;
                
                $currntYear =  date("Y");
                $currntMonth =(int)date("m");
                $startYeat = substr($result_of_class['batch'],0,4);
                $finalYear = substr($result_of_class['batch'],5);
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
                        $yearsWord = $noOfYearz."th year";
                        break;
                    }
                    echo 'you can  not add a parent <br>
					no valid classes ';
					$ui45983573 = false;
					                }
                 
              
        
		
		
		if($ui45983573) {
            ?>
                
<div class="row">



   
	    <div class="panel panel-primary">
		    
		    <div class="page-heading">
			    <h3>Add Student</h3>
                
                 <?php
								   echo ''.$class_ID .'   '.$yearsWord.'   '.$result_of_class['division'].'  batch';
								 ?>
		    </div>
			<div id="myNameClassUniq" class="hidden" class_name='<?php
								   echo ''.$result_of_class['batch'].'   '.$result_of_class['division'].'';
								 ?>'></div>
			<div class="panel-body">
            
            
				
                
           
           
                
             
             
				<div class="tab-content">
					 
				    <div role="tabpanel" class="tab-pane active table_vo_vont" id="view-class">
					   
                
                
                
                
                		<form name="view_Student_add_parent" id="view_Student_add_parent">
	<?php
            $query = "SELECT * FROM `student` WHERE  class = ".$result_of_class['class_id'];
			$resulta = $a->display($query);
			 //var_dump($resulta);
			if($resulta) {
						
			foreach( $resulta as $value) {			
						
						?>
                        
                        
                        

						  <div class="fg_base">
                          	<div class="row bord">
                            
							 <div class="col-md-3 img_cls">
                             	<img  width="230px" height="230px" src="<?php 
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/student/images_/'.$value['image'];
								
								
								if(file_exists($imgFpath) && strlen($value['image'])>0 ) {
									
									echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/student/images_/'.$value['image'] ;
								} else {
									echo "../assets/images/defalut.jpg";	
								}
								
								
								
								?>"/>
                             </div>
							    <div class="col-md-3 fg_base">
								    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php  echo  $value['fname'].' '.$value['lname'] ;?> </label>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php  echo  'st-'.$value['user_name'];?> </label>
                                        </div>
                                    </div>
                                    
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php echo  $value['mobile'].' ';?><i style="padding-left:10px;" class="fa fa-mobile"></i></label>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                     <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        		<div class="heift201">
                                    	<textarea  disabled placeholder='no address' ><?php echo  $value['address'];?></textarea>
                                    </div>
                                        </div>
                                    </div>
                                    
                                    
							    </div>
                                <div class="col-md-6 fg_base">
                                	
                                    <?php
									$forStyle = 'style="border: 1px solid #FF0000;"  data-toggle="tooltip" title="add details"';
									$parnt0001 ='';
									$parnt0002 ='';
									$parnt0003 ='';
									$parnt0004 ='';
									$parnt0005 ='';
									 $query = "SELECT * FROM `parent` WHERE  st_id = ". $value['sid']." ORDER BY `parent`.`date` DESC";
										$parentStud = $a->display($query);
										//var_dump($resulta);
										if(!empty($parentStud)){
										if($parentStud) {
											$parentStud = $parentStud[0];
											$parnt0001 =$parentStud['name'];
											$parnt0002 =$parentStud['mobile'];
											$parnt0003 =$parentStud['l_no'];
											$parnt0004 =$parentStud['designation'];
											$parnt0005 =$parentStud['description'];
											$forStyle = "";
										}
										}
										
									?>
                                    
                                    
                                    
                                      <div class="row fg_baserow" <?php echo $forStyle; ?>>
                                       <div class="">
                                            <label class="col-md-3"> Parent Name </label> 
                                            <div class="col-md-9 ">
                                              <input type="text"   id="pname<?php echo $value['sid']; ?>" value = <?php echo $parnt0001.' '; ?>><font color="#FF0004"> * </font>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="">
                                            <label class="col-md-3"> P Mobile NO </label>
                                            <div class="col-md-9 ">
                                              <input type="number" min-length="10" name="pmno" id="pmno<?php echo $value['sid']; ?>" value = <?php echo $parnt0002; ?>><font color="#FF0004"> * </font>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row fg_baserow">
                                    	<div class="">
                                            <label class="col-md-3"> landline NO </label>
                                            <div class="col-md-9 ">
                                              <input type="number" name="plno" id="plno<?php echo $value['sid']; ?>"  value = <?php echo $parnt0003; ?>>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row fg_baserow">
                                    	<div class="">
                                            <label class="col-md-3"> designation </label> 
                                            <div class="col-md-9 ">
                                              <input type="text" name="dsg" id="dsg<?php echo $value['sid']; ?>"  value = <?php echo $parnt0004; ?>> 
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row fg_baserow">
                                    	<div class="">
                                            <label class="col-md-3"> description</label>
                                            <div class="col-md-9 ">
                                              <input type="text" name="pdes" id="pdes<?php echo $value['sid']; ?>"  value = <?php echo $parnt0005; ?>> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                      <div class="colsub">
									<input type="button" <?php if(strlen($parnt0002) >0 && strlen($parnt0001) >0 ) {
										echo 'value="update"';
									} else {
										echo 'value="save"';
									}?> value="save" class="btn btn-primary save_parrent_det" stud_id = <?php echo $value['sid']; ?>   id=" <?php echo 'but_p_up'.$value['sid']; ?> ">
							    </div>
                                    
                                </div>
						    </div>
                          </div>
                          
                          
                          
                          <?php 
			}
			}
						  ?>
                          
                          	
				    	</form>			    
      
                
                
                
                
				

	    
       
        
        
        
        
        
        		    </div>
                    
                    
                  
                  
                    
                    
				</div>
        
        
        
        
        
        
        
        
        
        
        
				   
			</div>
	    </div>











    </div>


<?php
		}
				}
				
				
				
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




<?php


}

?>

<?php include_once('footer.php'); ?>
