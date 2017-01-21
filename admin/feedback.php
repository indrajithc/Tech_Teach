
<?php include( 'header.php');  
	
?>
<?php 

$query = "SELECT * FROM `say_to_admin` ORDER BY `say_to_admin`.`date` DESC ";
			$result = $a->display($query);
			if($result) {
			
			


?>
 <div class="row" style="overflow-x: hidden;">
	    <div class="panel panel-primary and_my_panal" id="select_this_id_body">
		    <div class="scroll_r_div mouseup_this" id="selectThisAs_innr_duiv" >
            	            
            <?php
				foreach( $result as $value) {
					$status = '';
					$Colour ='';
					switch ($value['priority']) {
						case 1:
							$status = 'HOD';
							$Colour ='style="color:#001DFF; font-size:17px;"';
						break;
						case 2:
							$status = 'Class Teacher';
							$Colour ='style="color:#00CBFF; font-size:17px;"';
						
						break;
						case 3:
							$status = 'Teacher';
							$Colour ='style="color:#00FFE3; font-size:17px;"';
						
						break;
						case 4:
							$status = 'Library';
							$Colour ='style="font-size:17px; color:#FFCE00;"';
						
						break;
						case 5:
							$status = 'Student';
							$Colour ='style="color:#359E03; font-size:17px;"';
						
						break;
					}
					
					echo '
            <div class="mouseup_this scroll_innrEcach">
                	<div class="mouseup_this width_o">
                    	<div class="mouseup_this row">
                        	<div class="mouseup_this col-md-4">
                            	<label class="mouseup_this">'.$value['id'].'</label>
                                <div class="mouseup_this width_o">
                                	<label class="mouseup_this"> '.$value['fname'].' '.$value['lname'].'</label>
                                </div>
                                 <div class="mouseup_this width_o">
                                	<label class="mouseup_this"> '.$value['user_id'].' </label>
                                </div>
                                 <div class="mouseup_this width_o">
                                	<label class="mouseup_this">'.$value['details'].'  </label>
                                </div>
                                 <div class="mouseup_this width_o">
                                	<label class="mouseup_this"> '.$value['class_dp'].'  </label>
                                </div>
                                
                                 <div class="mouseup_this width_o">
                                	<label class="mouseup_this"  '.$Colour.'> '.$status.' </label>
                                </div>
                            </div>
                            
                            <div class="mouseup_this col-md-8">
                            	<img src="..'.$value['image'].'" style="width:180px; height:180px; margin:10px ;  float: right;" class="mouseup_this">
                            </div>
                            
                        </div>
                        <div class="mouseup_this width_o" style="min-height: 50px; border-top: 1px solid #cecece;">
                        	<p style="font-size:20px;     word-spacing: 2px;    line-height: initial;" class="mouseup_this">'.$value['subject'].'</p>
                        
                        </div>
                        
                        <div class="mouseup_this width_o" style="min-height: 150px; border: 1px solid #cecece;margin-bottom:15px;">
                        	description :<p style="font-size:15px; padding:6px;    word-spacing: 2px;    " class="mouseup_this">'.$value['description'].'</p>
                        
                        </div>
                        <div class="mouseup_this width_o">
                        	<input type="button" class="btn mouseup_this" style="float:right;" value="attachment" basevaleue="..'.$value['attachment'].'" data-toggle="modal" data-target="#satToadmin" id="selectThisDisplaythiattach">
                            
                        </div>
                         <div class="mouseup_this width_o">
                        	<label class="mouseup_this" style="float:right; padding-right:10px;">'.$value['date'].'</label>
                            
                        </div>
                        
                    </div>
                
                </div>

					
					';
				}
			
			
			
			?>
            
            
            <!-------
           
            
            
            ---->
            </div>
		</div>
	</div>
 </div>

<?php

				} else {
					
				echo 'no feedbacks';	
				}



?>

<div id="satToadmin" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	
            
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">attachment</h4>
      </div>
      <div class="modal-body">
         <div class="row" id="mainbosyGorAdkjturcvk">

  <div class="post-materials" style="width: 100%;">
                        <div class="" style="text-align:center">
                            <img src="" style="max-width:100%; max-height:500px; width:auto; height:auto;" id="imagAttached">
                        </div>
                    </div>
              
          </div>
      </div>
      <div class="modal-footer">
      
      

        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton" >Close</button>
      </div>
    </div>
  </div>
</div>






<?php include_once('footer.php'); ?>
