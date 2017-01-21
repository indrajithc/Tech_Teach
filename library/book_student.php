<?php

include( 'header.php'); 

?>

  
   
 <div class="row">
	    <div class="main_body_b">
            <div class="stud_add_main_head">
           		<div class="row_my">
                	<div class="col-my-6 rg_brdr">
                    
                        <div class="col-my-16 padii">
                            <div class="row">
                            	<div class="col-md-12" style="    padding-bottom: 9px;">
                                    <select class="select_wisth"  id="avilbl_book_idz"> 
                                    
                                    <?php
									$query = "SELECT * FROM `book` WHERE available_copies > 0  ORDER BY `book`.`name` ASC ";
										$avilbl_book_idz = $a->display($query);
										if(!empty($avilbl_book_idz)) {
											foreach( $avilbl_book_idz as $value) {
												echo '<option value="'.$value['id'].'"  data-toggle="tooltip" title="'.$value['author'].'">'.$value['name'].'</option>';
											}
										
										}
										
									?>
                                        
                                        
                                    
                                    
                                    </select>
                                    
                                </div>
                                <div class="col-md-12">
                                
                                 <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle width89" type="button" data-toggle="dropdown" id="select_aCopy_buttn">COPY number
                                      <span class="caret"></span></button>
                                      <ul class="dropdown-menu width89" id="select_aCopy" >
                                        <li><a href="#" My_value ='0'>no data</a></li>
                                        <?php
										
										
										?>
                                      
                                      </ul>
                                    </div>
                                    
                                </div>
                            
                            </div>
                            
                            
                             <div class="row">
                            	<div class="col-md-offset-1 col-md-4 padii3">
                                  name
                                </div>
                                <div class="col-md-7 ">
                                  <label id="b_bname"></label>
                                </div>
                            
                            </div>
                            
                             <div class="row">
                            	<div class="col-md-offset-1 col-md-4 padii3">
                                  author
                                </div>
                                <div class="col-md-7 ">
                                  <label id="b_bauthor"></label>
                                </div>
                            
                            </div>
                            
                             <div class="row">
                            	<div class="col-md-offset-1 col-md-4 padii3">
                                  edition
                                </div>
                                <div class="col-md-7 ">
                                  <label id="b_bedition"></label>
                                </div>
                            
                            </div>
                            
                            
                        </div>
                        <div class="col-my-26 padii img_pass">
                            <img src="../assets/images/book.jpg" width="180px" height="180px"  id="b_bimg">
                        </div>
                		
                	</div>
                	<div class="col-my-6">
                		               <div class="col-my-16 padii">
                            <div class="row">
                            	<div class="col-md-12">
                                    <select class="select_wisth" id="select_aTeachr_stud_booktak" > 
                                         <?php
									$query = "SELECT * FROM `student` WHERE delete_status = 0 ORDER BY `student`.`fname` ASC";
										$avilbl_book_idz = $a->display($query);
										if(!empty($avilbl_book_idz)) {
											foreach( $avilbl_book_idz as $value) {
												echo '<option value="'.$value['user_name'].'"  data-toggle="tooltip" title="'.$value['user_name'].'">st-'.$value['user_name'].'</option>';
											}
										
										}
										
										$query = "SELECT * FROM `teacher` WHERE  delete_status=0  ORDER BY `teacher`.`fname` ASC ";
										$avilbl_book_idz = $a->display($query);
										if(!empty($avilbl_book_idz)) {
											foreach( $avilbl_book_idz as $value) {
											echo '<option value="'.$value['user_name'].'"  data-toggle="tooltip" title="'.$value['user_name'].'"> te-'.$value['user_name'].'</option>';
											}
										
										}
										
									?>
                                           
                                    
                                    </select>
                                   
                                    
                                
                                </div>
                            
                            </div>
                            
                            
                              <div class="row">
                            	<div class="col-md-offset-1 col-md-4 padii2">
                                  name
                                </div>
                                <div class="col-md-7 padii2">
                                  <label id="s_sname"></label>
                                </div>
                            
                            </div>
                            
                             <div class="row">
                            	<div class="col-md-offset-1 col-md-4 padii2">
                                  class
                                </div>
                                <div class="col-md-7 padii2">
                                  <label id="s_saclass"></label>
                                </div>
                            
                            </div>
                            
                             <div class="row">
                            	<div class="col-md-offset-0 col-md-5 padii2">
                                  department
                                </div>
                                <div class="col-md-7 padii2">
                                  <label id="s_sdepartment"></label>
                                </div>
                            
                            </div>
                            
                        </div>
                        <div class="col-my-26 padii img_pass">
                            <img src="../assets/images/defalut.jpg" width="180px" height="180px" id="s_simg">
                        </div>
                		
                	</div>
                </div>
               <form id="add_a_book_me_get">
                
                <div class="row padd_bord">
                	<div class="col-md-offset-2 col-md-3">
                		<input type="date" value="<?php   echo date("Y-m-d"); ?>" disabled id="s_date_d">
                	</div>
                    <div class="col-md-3">
                		
                		<input type="date"  min="<?php   echo date("Y-m-d"); ?>"  value="<?php  
						// echo date('Y-m-d', strtotime("+7 days")); 
						 $string = date('Y-m-d', strtotime("+7 days")); 
						$timestamp = strtotime($string);
						$day0005 =  date("D", $timestamp);
						//echo $string;
						if( $day0005 == 'Sat') {
							$string = date('Y-m-d', strtotime("+9 days"));
						} else  if( $day0005 == 'Sun') {
							$string = date('Y-m-d', strtotime("+8 days"));
						}
						echo $string ;
						//sat
						//sun
						
						 
						 ?>"   max="<?php  
						// echo date('Y-m-d', strtotime("+7 days")); 
						 $string = date('Y-m-d', strtotime("+7 days")); 
						$timestamp = strtotime($string);
						$day0005 =  date("D", $timestamp);
						//echo $string;
						if( $day0005 == 'Sat') {
							$string = date('Y-m-d', strtotime("+9 days"));
						} else  if( $day0005 == 'Sun') {
							$string = date('Y-m-d', strtotime("+8 days"));
						}
						echo $string ;
						//sat
						//sun
						
						 
						 ?>"  id="s_date_s">
                	</div>
                    <div class="col-md-3">
                		
                		<input type="button"  class="btn btn-primary"  id="get_save_book_delection" value="confirm"/>
                	</div>
                </div>
            </form>
            
            </div>
            <div class="stud_add_main_body">
                            <table class="table table-hover tablesorter" id="view_table10">
                                 <thead  class="header">
                                    <tr class="success" >
                                      <th  style='width:9%;'><font color="#FFFFFF">Book ID</th>  
                                      <th style='width:20%;'><font color="#FFFFFF">Book Name</th>  
                                      <th  style='width:20%;' ><font color="#FFFFFF">Student Name</th>
                                      <th style='width:20%;' ><font color="#FFFFFF">Date From</th>  
                                      <th style='width:20%;'><font color="#FFFFFF">Date To</th> 
                                      <th style='width:10%;'><font color="#FFFFFF">Status</th>                                        
                                    </tr>
                                    
                                </thead>
                                <tbody id="mytbodyI_dt">
                                    <?php
									$query = "SELECT * FROM `library_book` ORDER BY `library_book`.`status` DESC";
									$result = $a->display($query);
									
									
									$sno =1 ;
									 foreach ( $result as $value) {
										 
										 $temDepartment = 'inavalid book';//department_id
										$query = "SELECT * FROM `book` WHERE id =  ".$value['book_id'];
										$tempDDd = $a->display($query);
										if(!empty($tempDDd)) {
										$tempDDd = $tempDDd[0];
										$temDepartment = $tempDDd['name'];
										}
										 
										 $sta_00tus = '';
										 if($value['status']) {
											 $sta_00tus = 'checked';
										 }
										 
										echo "<tr><td style='width:9%;'>".$value['book_id'].'-'.$value['copy_id']."</td><td style='width:20%; padding-left: 15px;'>".
										$temDepartment.
										"</td><td style='width:20%; padding-left: 15px;' id='".$value['s_id']."' class='hover_action_deta'  data-toggle='tooltip' title='press and hold for view details'>".
										$value['s_id'].
										"</td><td  style='width:20%; padding-left: 15px;'>".
										$value['date'].
										"</td><td  style='width:20%; padding-left: 15px;'>".
										$value['to_date'].
										"</td><td><input type='checkbox' class='change_stAtus' bt_id='".$value['id']."' name='my-checkbox' ".$sta_00tus."></td></tr>";
										$sno++;
									 }
										
										
									
									
									?>
                                    
                                </tbody>
                            </table>       	                                   
            
            </div>
         
         
         
	 
    </div>

</div>

 <button type="button" class="btn btn-primary hidden" data-toggle="modal" data-target="#myModal" id="show_mod_el"> </button>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="bk" id="bhk">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Book</h4>
      </div>
      <div class="modal-body">
         <div class="row" id="mode_appe_nt">
                        	<div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Subject Name </label>
                                    <div class="col-md-8 ">
                                       <input type="text" name="sub_namea" id="sub_name">
                                    </div>
                                </div>
                             </div>
                             
                         
                             
          </div>
      </div>
      <div class="modal-footer">
      
      
</form>

        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton" >Close</button>
      </div>
    </div>
  </div>
</div>



<?php include_once('footer.php'); ?>
