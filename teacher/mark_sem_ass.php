
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
			    <h3>assignment mark</h3>
		    </div>
				<div class="tab-content muclassfoehei muclassfoeheik">
					 
				    <div role="tabpanel" class="tab-pane active" id="set_mark">
					   
    <!-- ---------------------------------------------------------------------------------- -->                   
	<div class="row">
    
    <div class="col-my-bZ">
        assignment
        </div>
    	<div class="col-md-3 col-my-0">
        
        	<div class="col-in-b">
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
											
										
										echo "<div  style ='border-color:rgba(255,8,8,0.72); color: red;' class='col-my-b0' id='".$value['id']."'".
										"subject = '".$value['subject']."'".
										"submission_date = '".$value['submission_date']."'".
										"description = '".$value['description']."'".
										"date = '".$value['date']."'"
										.">".
										$value['topic'].
										"</div>";
										 } else {
											 
										echo "<div  class='col-my-b0' id='".$value['id']."'".
										"subject = '".$value['subject']."'".
										"submission_date = '".$value['submission_date']."'".
										"description = '".$value['description']."'".
										"date = '".$value['date']."'"
										.">".
										$value['topic'].
										"</div>";
										 }
										 
										 
									 }
										?>
            
            
            
            	
            </div>
        </div>
        
        <div class="col-md-4">
                <div class="col-in-c" id="details_of_assgn"> 
                       
            </div>
        </div>
        <div class="col-md-5">
                <div class="col-in-d" id="set_mark_dirctly"> 
                    	
                        <!--
                        	<div class="row col-my-da">
                        	<div class="col-md-4">
                            dfsdfsdf
                            </div>
                            <div class="col-md-8">
                           		<input type="number" class="mainConmtnt" id="zxcz" style="width:100%;"/>
                            </div>
                        </div>
                        -->
                    </div>
                    
             
        </div>
    
    
    
    </div>

                       
                       
    <!-- ---------------------------------------------------------------------------------- -->                   
              
               
			</div>
	    </div>
    </div>








<?php include_once('footer.php'); ?>
