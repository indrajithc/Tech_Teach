
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
			    <h3>exam</h3>
		    </div>
				<div class="tab-content muclassfoehei">
					 
				    <div role="tabpanel" class="tab-pane active" id="view-class">
					   
    <!-- ---------------------------------------------------------------------------------- -->                   
       <div class="exam_b1">
       	<div  class="exam_b2">
         <?php 
							
							if ($amACLASSTEACHER) { 
						?>
                        <button type="button" class="btn btn-primary " id="sechedule_exam" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"> Schedule New Exam</i> </button>
							<?php 
							
							}
							
							?>
        </div>
        <div class="exam_b3">
             <div class="row">
                <div class="col-md-3 ">
                <div class="headsub">
                	<span > Subject </span>
                </div>
                <div class="examm1 divscroll" id="subjectHome">
                <?php 
					$query = "SELECT * FROM `subject` WHERE  department_id =   ".$OUTTresult['department']." ";
					$allSubs = $a->display($query);
					//echo $query;
					foreach( $allSubs as $value) {
						$statushrteV = false;
					  $query = "SELECT * FROM `class_subject` WHERE tid=".$OUTTresult['id']." AND sid =".$value['sub_id']." ORDER BY `sid` DESC";
					$isthismaSub = $a->display($query);
					foreach( $isthismaSub as $forthispartval) {
						$statushrteV = true;
					}
					
						
						
						
						?>
                      <div t_id="<?php echo $value['sub_id']; ?>" class="exam_n1 exam_c1" data-toggle='tooltip' title="<?php echo $value['description']; ?>">
                    	<div class="exam_n9">
                        	 <div class="exam_m1"  <?php
					if($statushrteV) {		 
					   echo 'style="    background-color: #FF8A00;"';
					}
                       
                       ?>>
                             <?php
							 if($statushrteV) {		 
							 
					   echo "<h4 style='color:white;' > ".$value['sub_name']."</h4>";
					} else {
                             	echo "<h4> ".$value['sub_name']."</h4>";
					}
								?>
                             </div>
                             <div class="exam_m2 ">
                             	<i class="fa fa-angle-right"></i>
                             </div>
                        </div>
                    </div>
                        
                        
                        <?php
						
					}
				
				?>
                </div>	
                </div>  
                <div class="col-md-3 ">
                 <div class="headsub">
                	<span id="examhead"> </span>
                </div>
                <div class="examm1 divscroll" id="exams_a">
                <?php 
					
					
						?>
                      <div class="exam_n1 exam_c2" >
                    	<div class="exam_n9">
                        	 <div class="exam_m1">
                             <?php
                             	echo "<h4> select a subject </h4>";
								?>
                             </div>
                             <div class="exam_m2 ">
                                                          </div>
                        </div>
                    </div>
                        
                        
                        <?php
						
					
				
				?>
                </div>	
                
                </div>  
                 <div class="col-md-3 ">
                <div class="headsub">
                	<span id="studhead"> </span>
                </div>
                 <div class="examm1 divscroll" id="student_a">
                <?php 
					
					
						?>
                      <div class="exam_n1 exam_c3" > <!--
                    	<div class="exam_n9">
                        	 <div class="exam_m1">
                             <?php
                             	echo "<h4>  </h4>";
								?>
                             </div>
                             <div class="exam_m2 ">
                                                          </div>
                        </div> -->
                    </div>
                        
                        
                        <?php
						
					
				
				?>
                </div>	
                
                
                </div>  
                 <div class="col-md-3 ">
                 <form id="setmark"><span id='succmsg' ></span>
                 	<div class="last_deta_b1 " style="height:400px; " id="vieweachstud">
                    	
                  
                    </div>
               </form>
                
                
                </div>  
                
             
             </div> 
        
        </div>
       
       </div> 
                       
                       
    <!-- ---------------------------------------------------------------------------------- -->                   
              
               
			</div>
	    </div>
    </div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="addAExamDet" id="addAexamDetHere">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add A New Exam</h4>
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
											//echo $finalY.'-------'.$initlY.'-'.$currntYear.'------'.$yrval.'-----------'.$yearsWord;			
										if($finalY>0 && $yrval) {						
										
                                        echo '<li><a   data-toggle="tooltip"  My_value="'.$value1['cid'].'"  My_tvalue="'.$OUTTresult['id'].'"  href="#">'.
										 $yearsWord.' - '.$dpnameSh.' '.$divisionsWord.' BATCH </a></li>';
									   
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
                <a class="btn btn-default dropdown-toggle btn-select hreonlycistcolor" id="setDivisionText9" data-toggle="dropdown" href="#" my_value="0" style="width: 250px;">subject<span class="caret"></span></a>
                   <ul class="dropdown-menu setThisClasFoStyle" id="divisionntt9" style="width: 100%;">
                   
                    </ul>
                </div>
                                      
                                      
                                      
                                    </div>
                                </div>
                             </div>
                             
                            <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Mark in </label>
                                    <div class="col-md-8 ">
                                       <input type="number"  name="markin" id="markin" value ="100">
                                      
                                    </div>
                                </div>
                             </div>
                            
                            
                            <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Series </label>
                                    <div class="col-md-8 ">
                                      <div class="input-append btn-group seris_x1">
                                        <input class="span2 " name="appendedInputButton" style="width: 75%;" id="appendedInputButton" size="16" type="text">
                                        <a class="btn btn-primary dropdown-toggle seris_x3" data-toggle="dropdown" href="#">
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" id="selectaseries" style="width: 100%;">
                                            <li><a href="#"><i class="icon-pencil"></i> First Series </a></li>
                                            <li><a href="#"><i class="icon-trash"></i>Second Series </a></li>
                                            <li><a href="#"><i class="icon-ban-circle"></i> Third Series </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#"><i class="i"></i> model exam</a></li>
                                        </ul>
                                    </div>

                                    </div>
                                </div>
                             </div>
                             
                            
                            
                            
                             
                             <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Description </label>
                                    <div class="col-md-8 ">
                                       <textarea class="form-control " style="min-width: 250px;" name="sub_disc" id="xam_disc"> </textarea>
                                    </div>
                                </div>
                             </div>
              
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="submit" id="">
</form>
		<button class="btn btn-primary" id="clear_me" ><i class="fa fa-eraser"> clear</i></button>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbuttonf" >Close</button>
      </div>
    </div>
  </div>
</div>



<?php include_once('footer.php'); ?>
