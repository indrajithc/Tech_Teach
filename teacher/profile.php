<?php

include( 'header.php'); 

?>
	<?php 
			$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".substr($_SESSION['te'],3)."'";
			$result = $a->display($query);
			$result = $result[0];	
		/*		$url = $_SERVER['REQUEST_URI']; 
				$parts = explode('/',$url);
				$dir = $_SERVER['SERVER_NAME'];
				for ($i = 0; $i < count($parts) - 1; $i++) {
				 $dir .= $parts[$i] . "/";
				}
				
				$_POST['photo_url']= 'http://'.$dir.'images_/';
				*/
				
				
			?>
                
			
                
<div class="row">
	    <div class="panel panel-primary">
		   
		    <div class="page-heading">
			    <h3>Profile</h3>
                
                
		    </div>
			
			<div class="panel-body">
				
                <form name="add_student" id="prfyl_teacher">
                	<div class="">
                    	<div class="row">
                        	<div class="col-md-8">   
                                                         	
                               <div class="cust_class">
                                    <label class="col-md-4"> Frist Name </label>
                                    <div class="col-md-8 ">
                                      <input type="text" name="fname" id="te_firstname" value = "<?php echo  $result['fname'] ;?>">
                                    </div>
                                </div>
                                
                                <div class="cust_class">
                                    <label class="col-md-4"> Last Name </label>
                                    <div class="col-md-8 ">
                                      <input type="text" name="lname" id="te_lastname" value = "<?php echo  $result['lname'] ;?>">
                                    </div>
                                </div>
                                 
                                <div class="cust_class">
                                    <label class="col-md-4 "> Address </label>
                                    <div class="col-md-8 ">
                                       <textarea class="form-control" name="adname" id="te_adname"><?php echo  $result['address'] ;?></textarea>
                                    </div>
                                </div>
                                
                                
                                <div class="cust_class">
                                    <label class="col-md-4"> Mobile </label>
                                    <div class="col-md-8 ">
                                      <input type="text"  name="mobno" id="te_mobno" minlength="10" value = "<?php echo  $result['mobile'] ;?>">
                                    </div>
                                </div>
                                
                                
                                <div class="cust_class ">
                                    <label class="col-md-4"> 
                                    
                                    </label>
                                    <div class="col-md-8 ">
                                      <label class="col-md-4" id="showHidePass"> 
                                     	<input type="radio" id="passshow"/>  change password
                                    </label>
                                    </div>
                                </div>
                                
                               
                                
                                
                                <div class="cust_class">
                                     <label class="col-md-4"></label>
                                        <div class="col-md-8">
                                            <input type="submit" class="btn btn-primary" value="submit" id="sbtn">
                                        </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="col-md-4">
                            	<div class="photome">
                                <div class="editimg" id="upadanimage">
                                	<i class="fa fa-pencil-square-o shadow"></i>
                                </div>
                                	 <img src= "<?php echo ''.PATH.'/teacher/images_/'.$result['image'] ;?>" id="display_my_image_in_prof"></br>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    
                  
                    
                </form>	  
                    
                    <div class="temptopbk hidden" id="toppassrea">
                    <form id="passChnge">
                        <div class="temtop">
                        <div class="intoiconX">
                        	<i class="fa fa-times shadow" id="cutThisScreen"></i>
                        </div>
                        
                         			<div class="cust_class CustClssPlsMyCl testPasswrdLastHere" id="passw1">
                                        <label class="col-md-4"> current password </label>
                                        <div class="col-md-8 ">
                                          <input type="password" name="cpass" id="te_cpass" >
                                        </div>
                                    </div>
                                    <div class="cust_class CustClssPlsMyCl testPasswrdLastHere" id="te_cpass">
                                        <label class="col-md-4"> Password </label>
                                        <div class="col-md-8 ">
                                          <input type="password" name="pass" id="inputPassword" >
                        <div id="complexity" class="default myCust">Enter a random value</div>
                                        </div>
                                    </div>
                                    
                                    <div class="cust_class CustClssPlsMyCl testPasswrdLastHere" id="passw2">
                                        <label class="col-md-4">Re-enter Password </label>
                                        <div class="col-md-8 ">
                                          <input type="password"  name="repass" id="te_repass" >
                                          <div id="repassStat"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="cust_class CustClssPlsMyCl testPasswrdLastHere" id="passw1">
                                        <label class="col-md-4"></label>
                                        <div class="col-md-8 ">
                                          <input type="submit" class="btn btn-primary" value="submit" id="cpassr">
                                        </div>
                                    </div>
                        
                        </div>
                        
                        
                      </form>
                      

    
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






<?php //include_once '../upladimage.php'; ?>



<?php include_once('footer.php'); ?>
