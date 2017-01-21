
<?php

include( 'header.php'); 

?>


<?php
	$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".substr($_SESSION['te'],3)."'";
	$OUTTresult = $a->display($query);
	$OUTTresult = $OUTTresult[0];
?>
     
   <div class="row">
		    <div class="page-heading">
			    <h3>subject</h3>
		    </div>
				<div class="tab-content">
					 
				    <div role="tabpanel" class="tab-pane active" id="view-class">
					   
    <!-- ---------------------------------------------------------------------------------- -->                   
                       
                       <div class="top_add_new_item">
                       	<!-- Trigger the modal with a button -->
                        <?php 
							
							if ($amAHOD) { 
						?>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle">  Add New Subject</i> </button>
							<?php 
							
							}
							
							?>

                       </div>
                         <form name="view-class" id="view_class">                      
                                <table class="table table-hover " id="view_table10">
                                 <thead  class="header">
                                    <tr class="success" >
                                      <th ><font color="#0aa699">no</th>  
                                      <th ><font color="#0aa699">Subject</th>  
                                      <th ></th>  
                                      <th  ></th>
                                      <th ><font color="#0aa699">Department</th>  
                                      <th ></th>  
                                      <th ></th>  
                                      <th><font color="#0aa699">Description</th>
                                      <th></th>  
                                      <th></th>                                         
                                    </tr>
                                    
                                </thead>
                                <tbody id="mytbodyI">
                                    <?php
									$query = "SELECT * FROM `subject` WHERE  department_id =  '".$OUTTresult['department']."'";
									$result = $a->display($query);
									
									
									$sno =1 ;
									 foreach ( $result as $value) {
										 
										 $temDepartment = 'no department assigned';//department_id
										$query = "SELECT * FROM `department` WHERE did =  ".$value['department_id'];
										$tempDDd = $a->display($query);
										if(!empty($tempDDd)) {
										$tempDDd = $tempDDd[0];
										$temDepartment = $tempDDd['name'];
										}
										 
										 
										 
										echo "<tr><td>".$sno."</td><td style='width:30%;'>".
										$value['sub_name'].
										"</td><td style='width:30%;'>".
										$temDepartment.
										"</td><td  style='width:30%;'><textarea readonly style='width:30%;'>".
										$value['description'].
										"</textarea></td></tr>";
										$sno++;
									 }
										
										
									
									
									?>
                                    
                                </tbody>
                            </table>       					    
				    	</form>
                       
                       
                       
       <!-- ---------------------------------------------------------------------------------- -->                            
                       
                       
                       
               
			</div>
	    </div>
    </div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="addAsubDet" id="addAsubDetHere">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add A New Subject</h4>
      </div>
      <div class="modal-body">
         <div class="row">
                        	<div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Subject Name </label>
                                    <div class="col-md-8 ">
                                       <input type="text" name="sub_namea" id="sub_name">
                                    </div>
                                </div>
                             </div>
                             
                             
                        	<div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Department </label>
                                    <div class="col-md-8 ">
                                    <?php 
									$query = "SELECT * FROM `department` WHERE  did =  '".$OUTTresult['department']."'";
					
									$Rresult = $a->display($query);
									if(!empty($Rresult)) {
									$Rresult = $Rresult[0];
									?>
                                       <input type="text"  name="dep_ida" id="dep_id" ID_Value ="<?php echo $OUTTresult['department'] ?>" value ="<?php echo $Rresult['name'] ?>" disabled="disabled">
                                       
                                       <?php 
									   
									}
									?>
                                    </div>
                                </div>
                             </div>
                             
                             <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Description </label>
                                    <div class="col-md-8 ">
                                       <textarea class="form-control " name="sub_disc" id="sub_disc"> </textarea>
                                    </div>
                                </div>
                             </div>
              
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="submit" id="">
</form>
		<button class="btn btn-primary" id="clear_me" ><i class="fa fa-eraser"> clear</i></button>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton" >Close</button>
      </div>
    </div>
  </div>
</div>



<?php include_once('footer.php'); ?>
