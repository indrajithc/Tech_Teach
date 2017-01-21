<?php

include( 'header.php'); 

?>

  
   
 <div class="row">
	    <div class="panel panel-primary">
		   
            
		    <div class="page-heading">
			    <h3>Add Book</h3>
                
              
		    </div>
            
			
			<div class="panel-body">
				
           
                
                
                
				<ul class="nav nav-tabs alltabs" role="tablist">
					<li class="active"><a href="#view-class"  aria-controls="profile" role="tab" data-toggle="tab">View Book</a></li>
			    	<li><a href="#add-class"  aria-controls="profile" role="tab" data-toggle="tab">Add Book</a></li>
				</ul>
				<div class="tab-content">
					 
				    <div role="tabpanel" class="tab-pane active table_vo_vont" id="view-class">
					   
                
                
                
                
                		<form name="view_Teach" id="view_text">
	<?php
            $query = "SELECT * FROM `book`  ";
			$resulta = $a->display($query);
			if($resulta) {
						
			foreach( $resulta as $value) {			
						
						?>
                        
                        
                        
						  <div class="fg_base">
                          	<div class="row bord">
                            
							 <div class="col-md-3 img_cls">
                             	<img  width="200px" height="200px" src="<?php 
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/library/images_/'.$value['image'];
								
								
								if(file_exists($imgFpath) && strlen($value['image'])>0 ) {
									
									echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/library/images_/'.$value['image'] ;
								} else {
									echo "../assets/images/book.jpg";	
								}
								
								
								
								?>"/>
                             </div>
							    <div class="col-md-4 fg_base">
								    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php echo  $value['name'];?> </label>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12 getTheUsrtId">
                                        	<label book_id = <?php echo  $value['id'];?> ><?php echo  $value['author'];?> </label>
                                        </div>
                                    </div>
                                    <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<?php
											
											 $query = "SELECT * FROM `book_section` WHERE id = ". $value['section'];
											$resultxc= $a->display($query);
											if($resultxc) {
												$resultxc = $resultxc[0];
												if(!empty($resultxc)) {
													echo '<label  data-toggle="tooltip" title="'.$resultxc['description'].'" >'.$resultxc['section'];
												}
											
											}
											 
											 ?></label>
                                        </div>
                                    </div>
                                       <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        		<label ><?php echo  'edition '.$value['edition'];?> </label>
                                        </div>
                                    </div>
                                    
                                     <div class="row fg_baserow">
                                    	<div class="col-md-12">
                                        	<label ><?php echo 'number of copies '.$value['noc'];?></label>
                                        </div>
                                    </div>
                                    
                                    
							    </div>
                                <div class="col-md-4">
                                	<div class="heift200">
                                    	<textarea  disabled placeholder='no address' ><?php echo  $value['description'];?></textarea>
                                    </div>
                                </div>
                                
                                 <div class="col-md-1">
                                	<div class="heift200" style="padding-top:20px">
                                    	<input type="button" value="edit" class="btn edit_teacher_details"  data-toggle="modal" data-target="#myModal_edit">
                                        
                                    </div>
						    </div>
                                
						    </div>
                          </div>
                          
                          
                          
                          <?php 
			}
			}
						  ?>
                          
                          	
				    	</form>			    
      
                
                
                
                
				
					
           
       
        
        
        
        
        
        		    </div>
				    <div role="tabpanel" class="tab-pane fade" id="add-class">
                      

      
      
      
      
          <form name="add_book" id="add_book">
				
                    	<div class="row">
                        	<div class="col-md-8">   	
                    
                    
                    	    
                             <div class="cust_class">
							    <label class="col-md-3">Text Name</label>
							    <div class="col-md-9 ">
								
                                  	 <input type="text" name="tname" id="tname">
                              
							    </div>
						    </div>
                            
                            <div class="cust_class">
							    <label class="col-md-3">Author </label>
							    <div class="col-md-9 ">
								   <input type="text" name="author" id="author">
							    </div>
						    </div>
                            
                            <div class="cust_class">
							    <label class="col-md-3"> Edition </label>
							    <div class="col-md-9 ">
								  <input type="number" name="edition" id="edition">
							    </div>
						    </div>
                            <?php 
								$query = "SELECT * FROM book_section";
								$result_view_class = $a->display($query);
							?>
                            
                            <div class="cust_class">
							    <label class="col-md-3"> Section </label>
							    <div class="col-md-9 ">
                                	<select id="Section_t">
                                    <option > select </option>
										<?php  foreach($result_view_class as $value) {
                                            echo '<option tid="'.$value['id'].'" data-toggle="tooltip" data-placement="right" title="'.$value['description'].'"  >'.$value['section'].'</option>';
										}
                                            ?>
                                    </select>
								  
							    </div>
						    </div>

                            
                            
                            <div class="cust_class">
							    <label class="col-md-3 "> Description </label>
							    <div class="col-md-9 ">
                                   <textarea class="form-control" id="description"  ></textarea>
							    </div>
						    </div>
                            
                            
                            <div class="cust_class">
							    <label class="col-md-3"> Number of Copies  </label>
							    <div class="col-md-9 ">
								  <input type="number" min="1" minlength="1"  name="noc" id="noc">
							    </div>
						    </div>
                            
						    <div class="cust_class">
							    <label class="col-md-3"></label>
							    <div class="col-md-9">
									<input type="submit" class="btn btn-primary" value="submit" id="">
							    </div>
						    </div>		
                            
                            </div>
                            <div class="col-md-4">
                           <div class="photome">
                                <div class="editimg" id="upadanimage">
                                	<i class="fa fa-pencil-square-o shadow"></i>
                                </div>
                                
                                	 <img src= "<?php 
								 
									echo "../assets/images/book.jpg";	
								 
								?>" id="display_my_image_in_prof"></br>
                                </div>
                            </div>   
                            
                            	
				    	</form>	

      
      
      
      
      
        
				    </div>
				</div>
        
        
        
        
        
        
        
         <!----------------------------------------------------------------------------------->     
   <!----------------------------------------------------------------------------------->     
   <!----------------------------------------------------------------------------------->     
   <!------------------------------------------------------------action="<?php// echo $_SERVER["PHP_SELF"];?>" method="post"----------------------->      
   
   
  
  
  
    
	<form name="photo" action="../upladimage.php" method="post" enctype="multipart/form-data" id="upladimageprof"  > 
    <input type="file" name="image" size="30" class="hidden"  id="upladimageprofselectf" accept="image/x-png, image/gif, image/jpeg" /> <input type="submit" name="upload" value="Upload"class="hidden" id="upladimagepfinalsub"/>
    

	</form>
    
    
    
<button type="button" class="btn btn-primary hidden " id="setImg" data-toggle="modal" data-target="#myModal"></button>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="addimg" id="addimg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">crop image</h4>
      </div>
      <div class="modal-body" >
      
        
       <div class="form_crop">
            
           
            <img id="cropbox" />
            
            <form>
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <input type="hidden" id="photo_url" name="photo_url" />
                <input type="button" value="Crop Image" id="crop_btn"  />
            </form>
        </div>
    
      </div>
     
    </div>
  </div>
</div>
   
   
   
   
   
   
   
   
   <!----------------------------------------------------------------------------------->     
   <!----------------------------------------------------------------------------------->     
   <!----------------------------------------------------------------------------------->     
   <!----------------------------------------------------------------------------------->                     
                        
                    
                    
        
        
        
				   
			</div>
	    </div>
    </div>

</div>






<?php

function returnClasee ($opRslt) {
	if(is_null($opRslt)) {
		return "no class in charge";
	}
	
	global $a;
				$query = "SELECT * FROM sub_class s  LEFT JOIN class c on c.id=s.cid WHERE s.class_id =  ".$opRslt."";
				$subDeprt = $a->display($query);
				if(!empty($subDeprt)) {
				$Cvalue = $subDeprt[0];
				
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
				return $yearsWord.'  '.$Cvalue['division'];
				} else {
		return "no class in charge";
	}
	
	
}

?>














<div id="myModal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="addAsubDet" id="checkTheUsrAddbook">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Book</h4>
      </div>
      <div class="modal-body">
         <div class="row">
         
         
         					<div class="col-md-offset-1">      	
                               <div class="cust_class">
                                   <label class="col-md-3">Name </label>
							    <div class="col-md-9 ">
								   <input type="text" name="fname9" id="fname9">
							    </div>
                                </div>
                             </div>
                             
                        	<div class="col-md-offset-1">      	
                               <div class="cust_class">
                                    <label class="col-md-3"> Author </label>
                                    <div class="col-md-9 ">
                                      <input type="text" name="lname9" id="lname9">
                                    </div>
                                </div>
                             </div>
                             
                           
                             <div class="col-md-offset-1">      	
                               <div class="cust_class">
                                    <label class="col-md-3"> Edition  </label>
							    <div class="col-md-9 ">
								  <input type="number" name="mnumber9" id="mnumber9">
							    </div>
                                </div>
                             </div>
                             
                             <div class="col-md-offset-1">      	
                               <div class="cust_class">
                                    <label class="col-md-3"> Number of Copies  </label>
							    <div class="col-md-9 ">
								  <input type="number"  name="noc949693" id="noc949693">
							    </div>
                                </div>
                             </div>
                             
                             <div class="col-md-offset-1">      	
                               <div class="cust_class">
                                  <label class="col-md-3 "> Description </label>
							    <div class="col-md-9 ">
                                   <textarea class="form-control" id="address9"  ></textarea>
							    </div>
                                </div>
                             </div>
                             
                             
                        	

                              
              
          </div>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="submit" id="submitthisclick">
</form>
		<button class="btn btn-primary" id="clear_me949693" ><i class="fa fa-eraser"> clear</i></button>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton" >Close</button>
       <button class="btn btn-primary btn-danger" id="deleteAtecherForThis949693"><span class="glyphicon glyphicon-trash" aria-hidden="true">  delete</span></button>
      </div>
    </div>
  </div>
</div>











<?php include_once('footer.php'); ?>
