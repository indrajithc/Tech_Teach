
<?php include( 'header.php'); 
	defined('master') or die('You didnot have permissions to aacees this page.');
?>

 <?php 
	$query = "SELECT * FROM `department`";
	$result = $a->display($query);


?>
            





<div class="">

    <div class="row">
      <div class="page-heading">
			    <h3>assign hod</h3>
		    </div>
      <div class="col-md-6">
<form name="add-hod" id="add_hod">
    <div class="form-group">
        <label class="col-xs-8 col-sm-3">department</label>
        
        <div class="input-group col-md-8 " id="usernamecheckdivforaddAdmin">
        <div class="btn-group custClassLast" id="btn-group1" style="width:100%"> 
                                        <a class="btn btn-default dropdown-toggle btn-select custClassLast" id="setDepartmentText" style="background-color:#8B7E7F" data-toggle="dropdown" href="#">Department <span class="caret"></span></a>
                                        <?php 
											$query = "SELECT * FROM `department` WHERE hod IS NULL";
											$resultD = $a->display($query);
											if($resultD) {
																		
										?>
                                        
                                           <ul class="dropdown-menu " id="addDP">
                                                <?php 
													foreach($resultD as $value) {
														echo '<li><a  value="'.$value['did'].'"  href="#">'.$value['name'].'</a></li>';
													} 
											}
												?>
                                            </ul>
                                        </div>
          </div>
        
        
        	
                                        
                                        
    </div>	
    
    
    
     <div class="form-group">
        <label class="col-xs-8 col-sm-3">teacher</label>
        
        <div class="input-group col-md-8 " id="usernamecheckdivforaddAdmin">
        <div class="btn-group custClassLast" id="btn-group1" style="width:100%"> 
                                        <a class="btn btn-default dropdown-toggle btn-select custClassLast" id="setTeacherText" style="background-color:#8B7E7F" data-toggle="dropdown" href="#">teacher <span class="caret"></span></a>
                                        <?php 
											$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name NOT IN (SELECT hod FROM `department` WHERE hod IS NOT NULL) ";
											$resultT = $a->display($query);
											if($resultT) {
																		
										?>
                                        
                                           <ul class="dropdown-menu "  id="addedforremovediffdp">
                                           <li>
                                           	<input class="textTyp" type="text" id="arrgeTe" >
                                           </li>
                                               <li>
                                               	<ul  class="textTyPp " id="adddTe">
                                                 <?php 
													foreach($resultT as $value) {
														echo '<li dp_id="'.$value['department'].'" class="hidden"><a   data-toggle="tooltip" title="'.$value['user_name'].'" value="'.$value['user_name'].'"  href="#">'.$value['fname'].' ' .$value['lname'].'</a></li>';
														
													} 
											}
												?>
                                                </ul>
                                               </li>
                                            </ul>
                                            
                                        </div>
          </div>
        
        
        	
                                        
                                        
    </div>	
    
    
    
    <div class="form-group">
        <label class="col-xs-8 col-sm-3"></label>
        <input type="submit" class="btn btn-primary" value="submit" id="a_admin">
    </div>			
</form>	

      
      
      
      </div>
      <?php 
	  		$query = "SELECT * FROM `department` WHERE hod IS NOT NULL ";
			$resultTAB = $a->display($query);
	  ?>
      <div class="col-md-6 "><br>
      	<form name="view-admin" id="view_admin">
     <!--       <div style="height:350px; overflow:auto;" >    -->                       
                <table class="table table-hover table-striped" id="view_hod_table">
                <thead  class="header">
                    <tr class="success" >
                      <th ><font color="#0aa699">department</th>  
                       <th ><font color="#0aa699">teacher</th>  
                     
                     <button type="button" class="btn btn-primary clckforedithods" data-toggle="modal" data-target="#myModal" id="clickforEdithods"> edit  </button>
                    </tr>
                    </thead>
                     <tbody>
					   <?php
                            foreach($resultTAB as $value) {	
							
							$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name = '".$value['hod']."'";
							$resultTABj = $a->display($query);	
							if($resultTABj) {
								$resultTABj = $resultTABj[0];
									echo "<tr class='filterable-cell'><td>".$value['name']."</td><td>
								   <label data-toggle='tooltip' title='".$resultTABj['user_name']."'>".$resultTABj['fname'].' '.$resultTABj['lname']."</label>
								   </td></tr>";
							}
                            }
                        ?>
                      </tbody>
                </table>                                    
      <!--     </div>		-->		    					    
        </form>
                       

	  </div>
    </div>
</div>






<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="editHods" id="editHods">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add A New Subject</h4>
      </div>
      <div class="modal-body">
         <div class="row" id="edit_the_hods_s">
                        	
                            
                             
                             
                             <!--
                              <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Description </label>
                                    <div class="col-md-8 ">
                                       <select> 
                                       	<option>sdsds</option>
                                       </select>
                                    </div>
                                </div>
                             </div>
              -->
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="update" id="">
</form>

        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton_k" >Close</button>
      </div>
    </div>
  </div>
</div>



<?php include_once('footer.php'); ?>
