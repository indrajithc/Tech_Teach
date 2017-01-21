<?php

include( 'header.php'); 

?>

                
			<?php 
			$ui45983573 = true;
                $query = ' SELECT d.did, d.name, c.batch ,s.division,t.class_id FROM department d
                 LEFT JOIN class c on c.did=d.did  LEFT JOIN sub_class s on
                  s.cid = c.id LEFT JOIN teacher
                   t on t.class_id = s.class_id where t.delete_status=0 AND t.user_name="'.substr(($_SESSION['te']),3).'"';
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
			    <h3>Add Student</h3>
                
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
                
                
                
                
				<ul class="nav nav-tabs alltabs" role="tablist">
					<li class="active"><a href="#view-class"  aria-controls="profile" role="tab" data-toggle="tab">View Student</a></li>
			    	<li><a href="#add-class"  aria-controls="profile" role="tab" data-toggle="tab">Add Student</a></li>
				</ul>
				<div class="tab-content">
					 
				    <div role="tabpanel" class="tab-pane active table_vo_vont" id="view-class">
					   
                
                
                
                
                		<form name="view_Student" id="view_Student">
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
                             	<img  width="200px" height="200px" src="<?php 
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/student/images_/'.$value['image'];
								
								
								if(file_exists($imgFpath) && strlen($value['image'])>0 ) {
									
									echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/student/images_/'.$value['image'] ;
								} else {
									echo "../assets/images/defalut.jpg";	
								}
								
								
								
								?>"/>
                             </div>
							    <div class="col-md-4 fg_base">
								    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php  echo  $value['fname'].' '.$value['lname'] ;?> </label>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12 getTheUsrtId">
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
                                	<div class="heift200">
                                    	<textarea  disabled placeholder='no address' ><?php echo  $value['address'];?></textarea>
                                    </div>
                                </div>
                                
                                    <div class="col-md-1">
                                	<div class="heift200" style="padding-top:20px">
                                    	<input type="button" value="edit" class="btn edit_teacher_details"  data-toggle="modal" data-target="#myModal">
                                        
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
                    
                    
                    
				    <div role="tabpanel" class="tab-pane fade" id="add-class">
                      

      
      
      
      
         
					    <form name="add_student" id="add_student">
						    
                             <div class="form-group">
							    <label class="col-md-3">username</label>
							    <div class="col-md-9 ">
								
                                  	 <div class="input-group col-md-5 " id="usernamecheckdiv">
                                 	 <span class="input-group-addon">st-</span>
                                 	 <input type="text" class="form-control"  name="uname" name="uname" id="uname" class_id = "<?php echo $result_of_class['class_id'] ?>" aria-describedby="inputGroupSuccess3Status">
                                   <!-- 	 <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
    								 <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
                                     --> 
                                     </div>
                              
							    </div>
						    </div>
                            
                            <div class="form-group">
							    <label class="col-md-3">First Name </label>
							    <div class="col-md-9 ">
								   <input type="text" name="fname" id="fname">
							    </div>
						    </div>
                            
                            <div class="form-group">
							    <label class="col-md-3"> Last Name </label>
							    <div class="col-md-9 ">
								  <input type="text" name="lname" id="lname">
							    </div>
						    </div>

       
                         <!--  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      <i class="glyphicon glyphicon-plus-sign"></i> <span class="caret"></span>
    </button>-->
                            
                            
                            <div class="form-group">
							    <label class="col-md-3"> Mobile Number  </label>
							    <div class="col-md-9 ">
								  <input type="number" minlength="10"   maxlength="10"  name="mnumber" id="mnumber">
							    </div>
						    </div>
                            
                            <div class="form-group">
							    <label class="col-md-3"> Sex </label>
							    <div class="col-md-9 ">
                                <label class="radio-inline">
								   <input type="radio" name="sex" value="M" id="ma" checked/> male   
                                   </label>
                                   <label class="radio-inline">
        						   <input type="radio" name="sex" value="F" id="fma" /> female
                                   </label>
							    </div>
						    </div>
                           
                            
                            <div class="form-group">
							    <label class="col-md-3 "> Address </label>
							    <div class="col-md-9 ">
                                   <textarea class="form-control" id="address"  ></textarea>
							    </div>
						    </div>
                            
                            
						    <div class="form-group">
							    <label class="col-md-3"></label>
							    <div class="col-md-9">
									<input type="submit" class="btn btn-primary" value="submit" id="">
							    </div>
						    </div>			
				    	</form>	

      
      
      
      
      
        
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


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="addAsubDet" id="checkTheUsrAddteacher">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit teacher</h4>
      </div>
      <div class="modal-body">
         <div class="row">
         
         
         					<div class="col-md-offset-1">      	
                               <div class="cust_class">
                                   <label class="col-md-3">First Name </label>
							    <div class="col-md-9 ">
								   <input type="text" name="fname9" id="fname9">
							    </div>
                                </div>
                             </div>
                             
                        	<div class="col-md-offset-1">      	
                               <div class="cust_class">
                                    <label class="col-md-3"> Last Name </label>
                                    <div class="col-md-9 ">
                                      <input type="text" name="lname9" id="lname9">
                                    </div>
                                </div>
                             </div>
                             
                           
                             <div class="col-md-offset-1">      	
                               <div class="cust_class">
                                    <label class="col-md-3"> Mobile Number  </label>
							    <div class="col-md-9 ">
								  <input type="number" minlength="10" name="mnumber9" id="mnumber9">
							    </div>
                                </div>
                             </div>
                             
                             <div class="col-md-offset-1">      	
                               <div class="cust_class">
                                  <label class="col-md-3 "> Address </label>
							    <div class="col-md-9 ">
                                   <textarea class="form-control" id="address9"  ></textarea>
							    </div>
                                </div>
                             </div>
                             
                             
                        	

                              
              
          </div>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="submit" id="submitthisclick">
</form>
		<button class="btn btn-primary" id="clear_me949693" ><i class="fa fa-eraser"> clear</i></button>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton" >Close</button>
       <button class="btn btn-primary btn-danger" id="deleteAtecherForThis949693"><span class="glyphicon glyphicon-trash" aria-hidden="true">  delete</span></button>
      </div>
    </div>
  </div>
</div>




<?php include_once('footer.php'); ?>
