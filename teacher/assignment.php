
<?php

include( 'header.php'); 


?>


<?php
	$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".substr($_SESSION['te'],3)."'";
	$OUTTresult = $a->display($query);
	$OUTTresult = $OUTTresult[0];
?>
     
   <div class="row" style=" margin-top: -20px;">
		    <div class="page-heading">
			    <h3>assignment</h3>
		    </div>
            

				<div class="tab-content muclassfoehei">
					 
				    <div role="tabpanel" class="tab-pane active" id="view-class">
					   
    <!-- ---------------------------------------------------------------------------------- -->                   
       <div class="exam_b1">
       	<div  class="exam_b2">
         <?php 
							
							if (true) { 
						?>
                        <button type="button" class="btn btn-primary " id="sechedule_exam" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"> Schedule New Assignment</i> </button>
							<?php 
							
							}
							
							?>
        </div>
        <div class="exam_b3">
             <div class="row">
               
                     <table class="table table-hover howtoedithtisdhtableidmaythis949693" id="view_table20">
                                 <thead  class="header">
                                    <tr class="success" >
                                      <th ><font color="#0aa699">Subject</th>  
                                      <th ><font color="#0aa699">Topic</th>    
                                      <th  ><font color="#0aa699">created</th>  
                                      <th ><font color="#0aa699">description</th>  
                                      <th><font color="#0aa699">final date </th>                                 
                                    </tr>
                                    
                                </thead>
                                <tbody id="mytbodyJ">
                                    <?php
									$query = "SELECT * FROM `assignment` WHERE  subject in (SELECT sid FROM `class_subject` WHERE tid =".$OUTTresult['id']." )  ORDER BY `assignment`.`subject` ASC";
									$result = $a->display($query);
									
									//var_dump($result);
									
									$sno =1 ;
									 foreach ( $result as $value) {
										 
										 $sub_name ='';
										 
										$query = "SELECT * FROM `subject` WHERE sub_id =  ".$value['subject'];
										$tempDDd = $a->display($query);
										if(!empty($tempDDd)) {
										$tempDDd = $tempDDd[0];
										$sub_name = $tempDDd['sub_name'];
										}
										
										 
										 if( strtotime( $value['submission_date']) < strtotime('now') ) {
											
										echo "<tr style ='border-color:rgba(255,8,8,0.72); color: red;'>".
										"<td sub_id='".$value['subject']."'>".
										$sub_name.
										"</td><td >".
										$value['topic'].
										"</td><td >".
										$value['date'].
										"</td><td >".
										$value['description'].
										"</td><td >".
										$value['submission_date'].
										"<span class='glyphicon glyphicon-edit edit_each_assgnt959693' aria-hidden='true' style='float:right; padding-right:10px;' ass_id = '".$value['id']."'></span>".
										"</td></tr>";
										$sno++; 
										 } else {
											 
										echo "<tr>".
										"<td sub_id='".$value['subject']."'>".
										$sub_name.
										"</td><td >".
										$value['topic'].
										"</td><td >".
										$value['date'].
										"</td><td >".
										$value['description'].
										"</td><td >".
										$value['submission_date'].
										"<span class='glyphicon glyphicon-edit edit_each_assgnt959693' aria-hidden='true' style='float:right; padding-right:10px;' ass_id = '".$value['id']."'></span>".
										"</td></tr>";
										$sno++;
										 }
										 
										 
									 }
										
										
									
									
									?>
                                    
                                </tbody>
                            </table>       	
               
               
               
             </div> 
        
        </div>
       
       </div> 
                       
       <button type="button" class="hidden" id="edittheassmnt949396" data-toggle="modal" data-target="#myModalEdit"></button>                
    <!-- ---------------------------------------------------------------------------------- -->                   
              
               
			</div>
	    </div>
    </div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="addAssignDetHere" id="addAssignDetHere">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add A New Assignment</h4>
      </div>
      <div class="modal-body">
         <div class="row">
                        	 
                        	<div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Department </label>
                                    <div class="col-md-8 ">
                                    <?php 
									$query = "SELECT * FROM `department` WHERE  did =  '".$OUTTresult['department']."'";
									$dpnameSh = '';
					
									$Rresult = $a->display($query);
									if(!empty($Rresult)) {
									$Rresult = $Rresult[0];
									$dpnameSh = $Rresult['name'];
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
                                    <label class="col-md-4"> class </label>
                                    <div class="col-md-8 ">
                                      
                                       <div class="btn-group"  id="btn-group8"> 
                <a class="btn btn-default dropdown-toggle btn-select hreonlycistcolor" id="setDivisionText8" data-toggle="dropdown" href="#"  style="width: 250px;">class<span class="caret"></span></a>
                   <ul class="dropdown-menu setThisClasFoStyle" id="divisionntt8" style="width: 100%;">
                    <?php 
					$query = "SELECT * FROM `class_subject` WHERE tid =  ".$OUTTresult['id']. "  GROUP BY cid";
														$tempDDd = $a->display($query);
													foreach($tempDDd as $value1) {
														
														//////////////////////
														
															$query = "SELECT * FROM sub_class s  LEFT JOIN class c on c.id=s.cid WHERE s.class_id =  ".$value1['cid']." ";
				$subDeprt = $a->display($query);
				$yrval = false;
					$tempXc = true;
                $yearsWord = "";
				$divisionsWord = '';
				$finalY = 0;
				$initlY = 0;
					foreach( $subDeprt as $Cvalue) {
						//var_dump($Cvalue);
				$divisionsWord = $Cvalue['division']; 		
                $staX = true ;
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
				$finalY = $noOfYearz;
				$initlY = (int)$startYeat;
				$initlTX = (int)$finalYear;
				if($initlY<=$currntYear &&  $initlTX>=$currntYear ) {
					$yrval = true;
				}
					}							
														
														///////////////////.$OUTTresult['id'].
										if($finalY>0 && $yrval) {						
										
                                        echo '<li><a   data-toggle="tooltip"  My_value="'.$value1['cid'].'"  My_tvalue="'.$OUTTresult['id'].'"  href="#">'.
										 $yearsWord.'   - '.$dpnameSh.' '.$divisionsWord.' BATCH </a></li>';
									   
										}
														
														
													} 
												?>
                    </ul>
                </div>
                                      
                                      
                                      
                                    </div>
                                </div>
                             </div>
                             
                            
                             <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> subject </label>
                                    <div class="col-md-8 ">
                                      
                                       <div class="btn-group"  id="btn-group9"> 
                <a class="btn btn-default dropdown-toggle btn-select hreonlycistcolor" id="setDivisionText9" data-toggle="dropdown" href="#" my_value="0" style="width: 250px;" >subject<span class="caret"></span></a>
                   <ul class="dropdown-menu setThisClasFoStyle" id="divisionntt9" style="width: 100%;">
                   
                    </ul>
                </div>
                                      
                                      
                                      
                                    </div>
                                </div>
                             </div>
                             
                            <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> topic </label>
                                    <div class="col-md-8 ">
                                       <input type="text"  name="topic" id="topic" >
                                      
                                    </div>
                                </div>
                             </div>
                            
                            
                           
                                <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> submission date </label>
                                    <div class="col-md-8 ">
                                    <input type="date"  style="width: 250px;" id="ass_date" >
                               	 </div>
                                </div>
                             </div>
                            
                            
                            
                            
                             
                             <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Description </label>
                                    <div class="col-md-8 ">
                                       <textarea class="form-control " style="min-width: 250px;" name="sub_disc" id="assig_disc"> </textarea>
                                    </div>
                                </div>
                             </div>
              
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="submit" id="">
</form>
		<button class="btn btn-primary" id="clear_me_here" ><i class="fa fa-eraser"> clear</i></button>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbuttonf" >Close</button>
      </div>
    </div>
  </div>
</div>


<!--------------------------------------------------->

<!-- Modal -->
<div id="myModalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="editAssgnmt" id="editAssgnmt">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">edit Assignment</h4>
      </div>
      <div class="modal-body">
         <div class="row">
                        	 
                        	
                            <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> subject </label>
                                    <div class="col-md-8 ">
                                       <input type="text"  name="subject1" id="subject1"  disabled>
                                      
                                    </div>
                                </div>
                             </div>
                              
                            <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> topic </label>
                                    <div class="col-md-8 ">
                                       <input type="text"  name="topic1" id="topic1" >
                                      
                                    </div>
                                </div>
                             </div>
                            
                            
                           
                                <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> submission date </label>
                                    <div class="col-md-8 ">
                                    <input type="date"  style="width: 250px;" id="finlDate" name="finlDate" >
                               	 </div>
                                </div>
                             </div>
                            
                            
                            
                            
                             
                             <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Description </label>
                                    <div class="col-md-8 ">
                                       <textarea class="form-control " style="min-width: 250px;" name="assig_disc1" id="assig_disc1"> </textarea>
                                    </div>
                                </div>
                             </div>
              
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="update" id="">
</form>
		<button class="btn btn-primary" id="clear_me_here_editAss" ><i class="fa fa-eraser"> clear</i></button>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbuttonf_thisClik" >Close</button>
      </div>
    </div>
  </div>
</div>




<?php include_once('footer.php'); ?>
