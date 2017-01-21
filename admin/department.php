
<?php include( 'header.php'); 
	defined('master') or die('You didnot have permissions to aacees this page.');
?>



  <div class="row">
	    <div class="panel panel-primary">
		    
		    <div class="page-heading">
			    <h3>department</h3>
		    </div>
			
			<div class="panel-body">
				
				<ul class="nav nav-tabs alltabs" role="tablist">
					<li class="active"><a href="#view-department"  aria-controls="profile" role="tab" data-toggle="tab">View department</a></li>
			    	<li><a href="#add-class"  aria-controls="profile" role="tab" data-toggle="tab">Add department</a></li>
				</ul>
				<div class="tab-content">
					 
				    <div role="tabpanel" class="tab-pane active" id="view-department">
					   
    <!-- ---------------------------------------------------------------------------------- -->                   
                       <?php 
					   
					   $query = "SELECT * FROM department";
						 $result_view_class = $a->display($query);
					   ?>
                       
                         <form name="view-department" id="view_department">                        
                                <table class="table table-hover table-striped" id="view_department_table">
                                    <thead  class="header">
                                    <tr class="success" >
                                      <th ><font color="#0aa699">name</th>  
                                      <th ><font color="#0aa699">year</th>  
                                    </tr>
                                    </thead>
                     				<tbody>
                                    <?php
									
									 foreach($result_view_class as $value) {
										 
										echo "<tr class='filterable-cell'><td val_id ='".$value['did']."' class='hover_edit_deta_a'>".$value['name']."</td><td val_id ='".$value['did']."' class='hover_edit_deta_a'>".$value['year']."</td>";
											
									}
									
									
									?>
                                    </tbody>
                                </table>  			    					    
				    	</form>
                       
                       
                       
       <!-- ---------------------------------------------------------------------------------- -->                            
                       
                       
                       
                       
                       
                       
                       
				    </div>
				    <div role="tabpanel" class="tab-pane fade" id="add-class">
                      
					      <form name="add-department" id="add-department">
                
                            
                            
                            <div class="form-group">
							    <label class="col-md-3 "> department name </label>
							    <div class="col-md-9 ">
                                    <input type="text" name="dname" id="dname">
							    </div>
						    </div>
                            
                            <div class="form-group">
							    <label class="col-md-3 ">  number of years </label>
							    <div class="col-md-9 ">
                                     <input type="text" name="noyears" id="noyears" placeholder="year">
							    </div>
						    </div>
                            
                            
						    <div class="form-group">
							    <label class="col-md-3"></label>
							    <div class="col-md-9">
									<input type="submit" class="btn btn-primary" value="submit" id="a_department">
							    </div>
						    </div>			
				    	</form>	
      
				    </div>
				</div>
			</div>
	    </div>
    </div>





<?php include_once('footer.php'); ?>





    
