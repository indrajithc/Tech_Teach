
<?php include( 'header.php'); 
	defined('master') or die('You didnot have permissions to aacees this page.');
?>



  <div class="row">
	    <div class="panel panel-primary">
		    
		    <div class="page-heading">
			    <h3>Assign Class</h3>
		    </div>
			
			<div class="panel-body">
			
					   
    <!-- ---------------------------------------------------------------------------------- -->                   
                       <?php 
					   
					   $query = "SELECT * FROM department";
						 $result_view_class = $a->display($query);
						 if($result_view_class) {
					   ?>
                       
                         <form name="view-add-teach-c" id="view_add_teach_c">                        
                            <?php 
							$firstTe = true;
								 foreach($result_view_class as $cdpValue) {
							?>
                            
                              <div class="mainDep">
                              	<label>
                                	<?php 
										echo $cdpValue['name'];
									?>
                                    
                                    </label>
                                    <div class="inpu_b" dp_id="<?php echo $cdpValue['did'];  ?>"  >
                                  edit  <i class="fa fa-pencil-square-o"></i>
                                    </div>
                              
                              </div>
                                <table class="table table-hover table-striped" id="view_table30" dp_id_tb = <?php  echo $cdpValue['did']; ?> >
                            
                        
                          <?php 
								if($firstTe) {
								?>
                                 <thead  class="header" id="tabHeadAddCl">
                                    <tr class="success" >
                                      <th ><font color="#0aa699">department</th>  
                                      <th ><font color="#0aa699">class</th>  
                                      <th ><font color="#0aa699">teacher</th>  
                                                                            
                                    </tr>
                                    
                                </thead>
                                <?php 
								$firstTe =false;
								 }
								?>
								    <?php
								
                        			 
				$query = "SELECT * FROM sub_class s  LEFT JOIN class c on c.id=s.cid WHERE c.did =  ".$cdpValue['did']."";
				$subDeprt = $a->display($query);
				

					$tempXc = true;
					
					foreach( $subDeprt as $Cvalue) {
					//	  var_dump($Cvalue);
						
                $staX = true ;
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
						
						
						?>
                        
                                <tbody class="overfolwnotOkay" style="height : auto;">
                                    <?php
									
									
								 $query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND class_id =".$Cvalue['class_id']. " ORDER BY `teacher`.`department` ASC";
								 
						 $resul_jz = $a->display($query);
						 $tea = '';
						 $teid = '';
											if(!empty($resul_jz)) {
										
						 					$resul_jz = $resul_jz[0];
											$tea = $resul_jz['fname'].' '.$resul_jz['lname'];
											$teid =$resul_jz['user_name'];
										
											}
										  
										echo "<tr te_id='".$teid."'><td >".$cdpValue['name']."</td><td  class='level' clss_temp_id ='".$Cvalue['class_id']. "' >". $yearsWord.' '.$Cvalue['division']."</td><td data-toggle='tooltip' title='".$teid."'class='fin_al'  >".
										$tea."</td></tr>";
											
									 
									
						
					}
									
									?>
                                </tbody>
                        
                        
                            </table>       	
                              <?php
							  
								 }
								 ?>
                              			    
				    	</form>
                       
                       <?php
					   
						 }
						 ?>
                       
       <!-- ---------------------------------------------------------------------------------- -->                            
                       
                       
                       
			</div>
	    </div>
    </div>





               <button type="button" class="btn btn-primary hidden " data-toggle="modal" id="selectedate" data-target="#myModal"><i class="fa fa-plus-circle" id="selectedclassi">   </i> </button>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog width60">

         	<form name="assign_classes" id="assign_classes">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign Classes</h4>
      </div>
      <div class="modal-body">
         <div class="row">
         	<div class="col-md-8" id="moder_drg_p">
            	 <div class=" ">
                    <!--
                    <div class=" ">
                     <div class="col-md-6 "> 
                    	<div class="min_div_dtule_parent" id="xx4"  >
                        
                        </div>
                    </div>
                    <div class="col-md-6 ">
                       <div class="min_div_dtule_parent" id="xx5"  ondrop="drop(event)" ondragover="allowDrop(event)">
                        
                        </div>
                    </div>
                </div>
            -->
            </div>
            
            
          </div>
         	<div class="col-md-4">
            	<div class="prntcolct" id="moder_drg_c">	
              <!--   <div class="min_div_dtule_parent" id="xx7"  ondrop="drop(event)" ondragover="allowDrop(event)">
                  	<div class="chid_mov" draggable="true" id="xx11"  ondragstart="drag(event)" >
                    
                    </div>
                    </div>
                   -->  
                
                </div>
            
            </div>
            
                                      
                                      
                    
                             
                          <!--   
                             <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Semester </label>
                                    <div class="col-md-8 ">
                                    	<select id="semid">
                                        	<option> 1 </option>
                                            <option> 2 </option>
                                        </select>
                                    </div>
                                </div>
                             </div>
              -->
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="submit" id="">
</form>

        <button class="btn btn-primary" data-dismiss="modal"  id="submitclosebutton" >Close</button>
      </div>
    </div>
  </div>
</div>


<?php include_once('footer.php'); ?>





    
