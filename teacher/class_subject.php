


<?php

include( 'header.php'); 

?>

 <?php
					if($amAHOD) {
				?>


<?php
	$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".substr($_SESSION['te'],3)."'";
	$OUTTresult = $a->display($query);
	$OUTTresult = $OUTTresult[0];
?>
     
   <div class="row antpadng">
		    <div class="page-heading">
			    <h3>SET subject</h3>
		    </div>
            <div class="jztHeadd">
            	
            </div>
            <div class="assign_one">
            <div class="my_row my_b_b_new_new_edt row">
            	<div class="col-md-3">
                <h6> Class </h6>
               <button type="button" class="btn btn-primary " data-toggle="modal" id="selectedclass" data-target="#myModal"><i class="fa fa-plus-circle" id="selectedclassi">  select a class</i> </button>
                </div>
                
                <div class="col-md-3">
                <h6> Subjects </h6>
                
                <?php
					$query = "SELECT * FROM `subject` WHERE sub_id NOT IN (SELECT sid FROM `class_subject`) ORDER BY `subject`.`date` DESC";
					$setSubjectH = $a->display($query);
					if(!empty($setSubjectH)) {
						
			
				?>
                 <div class="btn-group"  id="btn-group5"> 
                <a class="btn btn-default dropdown-toggle btn-select hreonlycistcolor" id="setDivisionText5" data-toggle="dropdown" href="#">Subject<span class="caret"></span></a>
                   <ul class="dropdown-menu" id="divisionntt5" style="width: 100%;;">
                    <?php 
													foreach($setSubjectH as $value1) {
														echo '<li><a   data-toggle="tooltip" title="'.$value1['description'].'"  value="'.$value1['sub_id'].'"  href="#">'.$value1['sub_name'].'</a></li>';
													} 
												?>
                    </ul>
                </div>
                <?php
					} else {
						?>
                         <select >
                         	<option selected><a href="subject.php">add new Subject</a></option>
                         </select>
                        <?php
					}
				?>
                
                
                </div>
                
                <div class="col-md-3">
                <h6> Duration  </h6>
               <select id="selectduratuinyr">
               	<?php
				
					//for ($iu=0,$io=2005; $iu<15; $iu++,$io++ ) {
						//echo "<option>".$io."-".($io+1)."</option>";						
					//}
				?>
               </select>
                </div>
                
                
                  <div class="col-md-2">
                <h6> Teacher </h6>
                
               
                
                <?php
					$query = "SELECT * FROM `teacher` WHERE  delete_status=0  ";
					$setSubjectB = $a->display($query);
					if(!empty($setSubjectB)) {
						
			
				?>
                 <div class="btn-group"  id="btn-group6"> 
                <a class="btn btn-default dropdown-toggle btn-select hreonlycistcolor" id="setDivisionText6" data-toggle="dropdown" href="#">Teacher<span class="caret"></span></a>
                   <ul class="dropdown-menu setThisClasFoStyle" id="divisionntt6" style="width: 100%;">
                    <?php 
													foreach($setSubjectB as $value1) {
														$temDepartment = 'no department assigned';//department_id
														$query = "SELECT * FROM `department` WHERE did =  ".$value1['department'];
														$tempDDd = $a->display($query);
														if(!empty($tempDDd)) {
														$tempDDd = $tempDDd[0];
														$temDepartment = $tempDDd['name'];
														}
	
														echo '<li><a  user_name="'.$value1['user_name'].'" data-toggle="tooltip" title="'.$value1['user_name'].' ('.$temDepartment.')" value="'.$value1['id'].'"  href="#">'.$value1['fname'].' '.$value1['lname'].'</a></li>';
													} 
												?>
                    </ul>
                </div>
                <?php
					}
				?>
                
               
                
                </div>
                 <div class="col-md-1 saveico" style="    padding-top: 34px;padding-left:50px;">
                	<i class="fa fa-floppy-o" data-toggle="tooltip" title="save" id="saveaclasssub" ></i>
                
                </div>
                
               
                
            </div>
            
            
            </div>
            
            <div class=" mainBodyHereheada">
			<div>
            <div class="viesWelect">
            <?php
				$query = "SELECT * FROM sub_class s  LEFT JOIN class c on c.id=s.cid WHERE c.did =  ".$OUTTresult['department']."";
				$subDeprt = $a->display($query);
				
			
			?>
            
            	<ul class="nav nav-pills custHrenv" id="custHrenvid">
                <?php
				
					$tempXc = true;
					foreach( $subDeprt as $Cvalue) {
						//var_dump($Cvalue);
						
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
						
						
						
						if($tempXc) {
							echo "<li class='active'><a href='#section".$Cvalue['class_id']."'>".$yearsWord.' / '.$Cvalue['division']."</a></li>";
							$tempXc = false;
						} else {
							echo "<li><a href='#section".$Cvalue['class_id']."'>".$yearsWord.' / '.$Cvalue['division']."</a></li>";	
						}
						
						
					}
				
				?>
            <!--    
                  
                     -->
                    
                  </ul>
               </div>   
            </div>
            
            <div class="mainBodyHerea divscroll" id="showSubXam">
            	 
                     <div class="col-sm-12 showSubXamk" >
                        
                         <?php
						 foreach( $subDeprt as $Cvalue) {
							 
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
						
						
							 
							echo "<div class='aclasshere'><div class='sectionV' id='section".$Cvalue['class_id']."'> <div class='jztadivtest'>";
							 echo "<h3 class='col-md-8'>". $yearsWord.' / '.$Cvalue['division']."</h3>";
							 	echo "<input type='button' class='btn addEditUpDat' value='edit' class_id='".$Cvalue['class_id']."'>   ";
								$query = "SELECT c.sem_id, c.year, s.sub_id, s.sub_name, s.description,t.id, t.user_name, t.fname, t.lname FROM class_subject c LEFT JOIN subject s on s.sub_id = c.sid LEFT JOIN teacher t on t.id = c.tid WHERE t.delete_status=0  AND c.cid =  ".$Cvalue['class_id']."";
								
								$selectsubdetatab = $a->display($query);
								//var_dump($selectsubdetatab);
								if(!empty($selectsubdetatab)){
								
							 ?>
                             
                             
                              <table class="table table-hover table-striped jztatableonlyforthisbcidused" id="view_table">
                                 <thead  class="header">
                                    <tr class="success" >
                                      <th ><font color="#0aa699">sub_name</th>  
                                      <th ><font color="#0aa699">teacher</th>  
                                      <th ><font color="#0aa699">year</th>  
                                      <th ><font color="#0aa699">semester</th>                                       
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php
									
									 foreach($selectsubdetatab as $value) {
										 $teachrr = null;
										 if ( $value['fname'] == NULL ||  $value['lname'] == NULL) {
											 $teachrr = 'null';
											 
										 } else {
											 
											$teachrr = $value['fname'].' '.$value['lname']; 
										 }
										 
										echo "<tr><td value='".$value['sub_id']."'>".$value['sub_name']."</td><td value='".$value['id']."'>".$teachrr."</td><td>".
										$value['year']."</td> <td>".$value['sem_id']."</td></tr>";
											
									}
									
									
									?>
                                </tbody>
                            </table>  
                             
                             
                             
                             <?php
								}else {
								echo '<div style="text-align:center;    padding: 100px;" >no  subject or/and teachers for display </div>';}
							 echo "</div></div></div>";
						 }
						 
						 
						 ?>
                         
                          <div class="sectionV" id="section0" style="background-color:#FFFFFF !important;">    
                           
                           
                          </div>
                          
         
                        </div>
                    </div>
                  
            </div>
            </div>
                
    </div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="selectAsub" id="selectAsub">
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
                                    <label class="col-md-4"> Department </label>
                                    <div class="col-md-8 ">
                                    <?php 
									$query = "SELECT * FROM `department` WHERE  did =  '".$OUTTresult['department']."'";
					
									$Rresult = $a->display($query);
									$Rresult = $Rresult[0];
									?>
                                       <input type="text"  name="dep_ida" id="dep_id" ID_Value ="<?php echo $OUTTresult['department'] ?>" value ="<?php echo $Rresult['name'] ?>" disabled="disabled">
                                    </div>
                                </div>
                             </div>
                             
                             
                        	<div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> select class </label>
                                    
                                    
                                    <div class="col-md-8 ">
                                	<div class="btn-group custClassLast custClassForDiv tempcustClassForDiv">
                                        <?php
											$query = "SELECT * FROM `class` WHERE  did =  '".$OUTTresult['department']."' ORDER BY `class`.`batch` ASC";
											$outputBatch = $a->display($query);
											if(!empty($outputBatch)) {
										?>
                                        
                                        <div class="btn-group"  id="btn-group2"> 
                                        <a class="btn btn-default dropdown-toggle btn-select"  id="setClassText" style="background-color:#8B7E7F" data-toggle="dropdown" ind_value="" ind_name="" href="#">Batch <span class="caret"></span></a>
                                            <ul class="dropdown-menu" id="departmenttt">
                                                <?php 
													foreach($outputBatch as $value1) {
														echo '<li><a  value="'.$value1['id'].'"  href="#">'.$value1['batch'].'</a></li>';
													} 
												?>
                                            </ul>
                                        </div>
                                        
                                        <?php
					}
					?>
                    
                    
                                        <div class="btn-group"  id="btn-group3"> 
                                        <a class="btn btn-default dropdown-toggle btn-select" id="setDivisionText" style="background-color:#8B7E7F" data-toggle="dropdown" ind_value="0"  ind_name=""  href="#">Division<span class="caret"></span></a>
                                           <ul class="dropdown-menu" id="divisionntt">
                                            
                                            </ul>
                                        </div>
                                                                   
                                	</div><div class="btn" id="addClassForTeacher001" style="background:none;border:hidden; color:#0B0000;">
                                        </div>     
                                </div>
                                    
                                    
                                </div>
                             </div>
                             
                             
                             
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
              
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="submit" id="">
</form>

        <button class="btn btn-primary" data-dismiss="modal"  id="submitclosebutton" >Close</button>
      </div>
    </div>
  </div>
</div>


 <?php
					}
				?>
                

<?php include_once('footer.php'); ?>
