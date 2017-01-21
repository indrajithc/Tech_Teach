
<?php include( 'header.php');  
	defined('master') or die('You didnot have permissions to aacees this page.');
?>

 <div class="row">
	    <div class="panel panel-primary">
		    
		    <div class="page-heading">
			    <h3>Add Teacher</h3>
		    </div>
			
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
					<li class="active"><a href="#view-class"  aria-controls="profile" role="tab" data-toggle="tab">View Teacher</a></li>
			    	<li><a href="#add-class"  aria-controls="profile" role="tab" data-toggle="tab">Add Teacher</a></li>
				</ul>
				<div class="tab-content">
					 
				    <div role="tabpanel" class="tab-pane active table_vo_vont" id="view-class">
					   
                
                
                
                
                		<form name="view_Teach" id="view_Teach">
	<?php
            $query = "SELECT * FROM `teacher`";
			$resulta = $a->display($query);
			if($resulta) {
						
			foreach( $resulta as $value) {			
						
						?>
                        
                        
                        
						  <div class="fg_base">
                          	<div class="row bord" <?php  
							if($value['delete_status'] == 1) {
							echo 'style="color:red;"';	
							}
							  ?>>
                            
							 <div class="col-md-3 img_cls">
                             	<img  width="200px" height="200px" src="<?php 
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/teacher/images_/'.$value['image'];
								
								
								if(file_exists($imgFpath) && strlen($value['image'])>0 ) {
									
									echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/teacher/images_/'.$value['image'] ;
								} else {
									echo "../assets/images/defalut.jpg";	
								}
								
								
								
								?>"/>
                             </div>
							    <div class="col-md-4 fg_base">
								    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label val_id ='<?php echo  $value['user_name'];?> ' class='hover_edit_deta' ><?php echo  $value['fname'];?> </label><?php echo ' '; ?><label  val_id ='<?php echo  $value['user_name'];?> ' class='hover_edit_deta' ><?php echo  $value['lname'] ;?> </label>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12 getTheUsrtId">
                                        	<label ><?php echo  $value['user_name'];?> </label>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php
											
											 $query = "SELECT * FROM `department` WHERE did = ". $value['department'];
											$resultxc= $a->display($query);
											if($resultxc) {
												$resultxc = $resultxc[0];
												if(!empty($resultxc)) {
													echo $resultxc['name'];
												}
											
											}
											 
											 ?></label>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        <label  val_id ='<?php echo  $value['user_name'];?> ' class='' ><?php echo  $value['mobile'];?><i style="padding-left:10px;" class="fa fa-mobile"></i></label>
                                        </div>
                                    </div>
                                    
                                     <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php echo returnClasee ($value['class_id']);?></label>
                                        </div>
                                    </div>
                                    
                                    
							    </div>
                                <div class="col-md-4">
                                	<div class="heift200">
                                    	<textarea  val_id ='<?php echo  $value['user_name'];?> ' class='hover_edit_deta' disabled placeholder='no address' ><?php echo  $value['address'];?></textarea>
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
                      

      
      
      
      
          <form name="add-teacher" id="add_teacher">
						    
                             <div class="form-group">
							    <label class="col-md-3">username </label>
							    <div class="col-md-9 ">
								
                                  	 <div class="input-group col-md-5 " id="usernamecheckdiv">
                                 	 <span class="input-group-addon">te-</span>
                                 	 <input type="text" class="form-control"  name="uname" id="uname" aria-describedby="inputGroupSuccess3Status">
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
                            
                            
                            
                            
                            <div class="form-group">
							    <label class="col-md-3"> Department </label>
							    <div class="col-md-9 ">
								  	<div class="btn-group custClassLast" id="btn-group1"> 
                                        <a class="btn btn-default dropdown-toggle btn-select custClassLast" id="setDepartmentText" style="background-color:#8B7E7F" data-toggle="dropdown" href="#">Department <span class="caret"></span></a>
                                           <ul class="dropdown-menu" id="departmenttt">
                                                <?php 
													foreach($result as $value) {
														echo '<li><a  value="'.$value['did'].'"  href="#">'.$value['name'].'</a></li>';
													} 
												?>
                                            </ul>
                                        </div>
							    </div>
						    </div>
                            
                            
                            
                         
                         
                         
                         <!--  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      <i class="glyphicon glyphicon-plus-sign"></i> <span class="caret"></span>
    </button>-->
                            
                            
                            <div class="form-group">
							    <label class="col-md-3">  Class Charge  </label>
							    <div class="col-md-8 ">
                                	<div class="btn-group custClassLast custClassForDiv">
                                        
                                        <div class="btn-group"  id="btn-group2"> 
                                        <a class="btn btn-default dropdown-toggle btn-select"  id="setClassText" style="background-color:#8B7E7F" data-toggle="dropdown" href="#">Batch <span class="caret"></span></a>
                                           <ul class="dropdown-menu" id="classstt" >
                                               
                                            </ul>
                                        </div>
                                        
                                        <div class="btn-group"  id="btn-group3"> 
                                        <a class="btn btn-default dropdown-toggle btn-select" id="setDivisionText" style="background-color:#8B7E7F" data-toggle="dropdown" href="#">Division<span class="caret"></span></a>
                                           <ul class="dropdown-menu" id="divisionntt">
                                            
                                            </ul>
                                        </div>
                                                                   
                                	</div><div class="btn" id="addClassForTeacher001" style="background:none;border:hidden; color:#0B0000;">
                                        </div>     
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group">
							    <label class="col-md-3"> Mobile Number  </label>
							    <div class="col-md-9 ">
								  <input type="number" minlength="10" name="mnumber" id="mnumber">
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
									<input type="submit" class="btn btn-primary" value="submit" id="a_class">
							    </div>
						    </div>			
				    	</form>	
      
      
      
      
      
      
      
        
				    </div>
				</div>
        
        
        
        
        
        
        
        
        
        
        
				   
			</div>
	    </div>
    </div>








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
