<?php

include( 'header.php'); 

?>

                
			<?php 
			$ui45983573 = true;
                $query = ' SELECT d.did, d.name, c.batch ,s.division,t.class_id FROM department d
                 LEFT JOIN class c on c.did=d.did  LEFT JOIN sub_class s on
                  s.cid = c.id LEFT JOIN teacher
                   t on t.class_id = s.class_id where  delete_status=0 AND t.user_name="'.substr(($_SESSION['te']),3).'"';
                  // echo $query;
                $result_of_class = $a->display($query);
                
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
                    echo 'you can  not add a student <br>
					no valid classes ';
					$ui45983573 = false;
                }
                 
              
        
		
		if($ui45983573) {
		
            ?>
                
                
<div class="row">



   
	    <div class="panel panel-primary">
		    
		    <div class="page-heading">
			    <h3>Confirm Student</h3>
                
                 <?php
								   echo ''.$class_ID .'   '.$yearsWord.'   '.$result_of_class['division'].'  batch';
								 ?>
		    </div>
			<div id="myNameClassUniq" class="hidden" class_name='<?php
								   echo ''.$result_of_class['batch'].'   '.$result_of_class['division'].'';
								 ?>'></div>
			<div class="panel-body">
            
            
				
                
            <?php 
			$query = "SELECT * FROM `department` ";
			$result = $a->display($query);
			if($result) {
				$querya = "SELECT * FROM `sub_class` ";
				$resulta = $a->display($querya);
				if($resulta) {
				
				
			?>
                
                
                
                
			
				<div class="tab-content">
					 
				    <div role="tabpanel" class="tab-pane active table_vo_vont" id="view-class">
					   
                
                
                
                
                		<form name="view_Student" id="view_Student">
	<?php
            $query = "SELECT * FROM `student` WHERE  class in ( SELECT s.class_id FROM department d
                 LEFT JOIN class c on c.did=d.did  LEFT JOIN sub_class s on
                  s.cid = c.id where d.did = ".$result_of_class['did']." AND s.class_id IS NOT NULL)";
			$resulta = $a->display($query);
			//var_dump($resulta);
			if($resulta) {
						
			foreach( $resulta as $value) {			
						
						?>
                        
                        
                        
						  <div class="fg_base">
                          	<div class="row bord">
                            
							 <div class="col-md-3 img_cls">
                             	<img  width="200px" height="200px" src="<?php 
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/student/images_/'.$value['image'];
								
								
								if(file_exists($imgFpath) && strlen($value['image'])>0 ) {
									
									echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/student/images_/'.$value['image'] ;
								} else {
									echo "../assets/images/defalut.jpg";	
								}
								
								
								
								?>"/>
                             </div>
							    <div class="col-md-5 fg_base">
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
                                        	<label ><?php
											
											 
											 
											 ?></label>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php echo  $value['mobile'].' ';?><i style="padding-left:10px;" class="fa fa-mobile"></i></label>
                                        </div>
                                    </div>
                                    
                                     <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php echo returnClasee ($value['class']);?></label>
                                        </div>
                                    </div>
                                    
                                    
							    </div>
                                <div class="col-md-4">
                                	<div class="heift200 dclds76776">
                                    
                                                                      	
  <button type="button" class="btn btn-primary btn-lg generatepass3453495873 generatepass3453495873949693"   user_id="<?php  echo  $value['user_name'];?>">Generate Password</button>
  
  <div class="dclds76776_">
  <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-eye click578576573"></i></span>
        <input type="password" class="form-control inputSuccess1645664" aria-describedby="inputGroupSuccess2Status">
      </div>
     </div>       
               
                                    
                                    
                      				 </div>
                                </div>
						    </div>
                          </div>
                          
                          
                          
                          <?php 
			}
			}
						  ?>
                          
                          	
				    	</form>			    
      
                
                
                
                
				
					
        <?php 
		
		
		
		
		
		
			} else {
			echo 'Add class first';
			}
		
		
		
		} else {
			echo 'Add deprtnt first';
		}?>
        		    
       
        
        
        
        
        
        		    </div>
                    
                    
                    
				 
                    
				</div>
        
        
        
        
        
        
        
        
        
        
        
				   
			</div>
	    </div>











    </div>


<?php
		}
				} else {
					echo 'you can  not add a student 
					no valid classes ';
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






<?php include_once('footer.php'); ?>
