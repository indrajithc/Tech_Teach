


<?php include( 'header.php'); 
	defined('master') or die('You didnot have permissions to aacees this page.');
?>
            
            
 
    
            <?php 
			$query = "SELECT * FROM `department` ";
			$result = $a->display($query);
			if($result) {
			?>
    
    <div class="row">
	    <div class="panel panel-primary">
		    
		    <div class="page-heading">
			    <h3>class</h3>
		    </div>
			
			<div class="panel-body">
				
				<ul class="nav nav-tabs alltabs" role="tablist">
					<li class="active"><a href="#view-class"  aria-controls="profile" role="tab" data-toggle="tab">View Classes</a></li>
			    	<li><a href="#add-class"  aria-controls="profile" role="tab" data-toggle="tab">Add Class</a></li>
				</ul>
				<div class="tab-content">
					 
				    <div role="tabpanel" class="tab-pane active" id="view-class">
					   
    <!-- ---------------------------------------------------------------------------------- -->                   
                       <?php 
					   
					   $query = "SELECT d.name, c.batch ,s.division,t.class_id, CONCAT( t.fname,' ',t.lname )
					    AS teacher FROM department d LEFT JOIN class c on c.did=d.did 
						 LEFT JOIN sub_class s on s.cid = c.id LEFT JOIN teacher t 
						 on t.class_id = s.class_id WHERE  s.class_id  IS NOT NULL";
						 //t.delete_status=0  AND
						 $result_view_class = $a->display($query);
					   ?>
                       
                         <form name="view-class" id="view_class">                      
                                <table class="table table-hover table-striped" id="view_table">
                                 <thead  class="header">
                                    <tr class="success" >
                                      <th ><font color="#0aa699">department</th>  
                                      <th ><font color="#0aa699">batch</th>  
                                      <th ><font color="#0aa699">division</th>  
                                      <th ><font color="#0aa699">teacher</th>                                       
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php
									
									
									 foreach($result_view_class as $value) {
										 $teachrr = null;
										 if ( $value['teacher'] == NULL ) {
											 $teachrr = 'null';
											 
										 } else {
											 
											$teachrr = $value['teacher']; 
										 }
										 
										echo "<tr><td>".$value['name']."</td><td>".$value['batch']."</td><td>".
										$value['division']."</td> <td>".$teachrr."</td></tr>";
											
									}
									
									
									?>
                                </tbody>
                            </table>       					    
				    	</form>
                       
                       
                       
       <!-- ---------------------------------------------------------------------------------- -->                            
                       
                       
                       
                       
                       
                       
                       
				    </div>
				    <div role="tabpanel" class="tab-pane fade" id="add-class">
                      
					    <form name="add-class" id="add_class">
						    <div class="form-group">
							    <label class="col-md-3">Department ID </label>
							    <div class="col-md-9 ">
								    
                                    <select  name="aa1"  id="department_id">
									
								        <?php 
								    	foreach($result as $value) {
											echo '<option value="'.$value['did'].'" data-value="'.$value['year'].'">'.$value['name'].'</option>';
								    	} 
								        ?>
									</select>
							    </div>
						    </div>
						    
						    <div class="form-group">
							    <label class="col-md-3">Batch</label>
							    <div class="col-md-9">
                                
                                 
                                    <input type="text" name="aa2"  id="batcha" placeholder=<?php echo date('Y'); ?>>
									to <div id="batchz" class="batchz"  style="background-color:#EDEDED; float:right" > </div>
							    </div>
						    </div>
						    
   							<div class="form-group">
							 <label class="col-md-3">number of division</label>
							    <div class="col-md-9 ">
								    
                                    <select  name="aa1"  id="numberofdivision">
									
								       <?php 
											for ( $i = 1 ;$i < 10 ;$i++ ) {
												 print "<option id=".$i. " >".$i.'</option>';	
												
											}
										
										?>
									</select>
							    </div>
						    </div>
                            
						    <div class="form-group">
							    <label class="col-md-3"></label>
							    <div class="col-md-9">
									<input type="submit" class="btn btn-primary" value="submit" id="a_class">
							    </div>
						    </div>			
				    	</form>			    
        <?php } else {
			echo 'Add deprtnt first';
		}?>
        
				    </div>
				</div>
			</div>
	    </div>
    </div>
    
<?php include_once('footer.php'); ?>







    
