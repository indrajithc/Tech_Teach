<?php

include( 'header.php'); 

?>
	<?php 
			$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".substr($_SESSION['li'],3)."'";
			$result = $a->display($query);
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
	<div class="main_body_b">
	    <div class="panel panel-primary">
		   
		    <div class="page-heading ">
            
            	<div class="head_my_erk">
                	<div class="search_bix_rig_t hidden" id="back_o9_o">
                    	 <div class="input-group">
                         	 <button type="button" class="btn btn-default dropdown-toggle"  style="width: 90px;"><i class="fa fa-backward"></i></button>
                         </div> 
                    </div>
                    
                
			    <h3 class="" id="search_head_lin_wrd" val_id='0'>search</h3>
                	<div class="search_bix hidden" id="search_bix_my_id">
                    	
                        <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width: 90px;">
                                <span id="search_concept">Filter by</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="select_optn_">
                              <li><a href="#contains" x_id='1'>name</a></li>
                              <li><a href="#its_equal" x_id='2'>author</a></li>
                              <li class="divider"></li>
                              <li><a href="#all" x_id='3'>Anything</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">         
                        <input type="text" class="form-control " style="border:none;" name="x" placeholder="Search term..." id="search_me_man" search_status = '3'>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="searchAclickHere"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                        
                        
                        
                    </div>
                    
                </div>
               
		    </div>
			
            
	    </div>
        
        
        <div class="row  my_cust_body_n">
        	<div class="innr_bdy_tab" id="display_your_result">
                <div class="row padding_bot_top_10">
        <?php 
			$query = "SELECT * FROM `book_section`  ORDER BY `book_section`.`section` ASC";
			$result_book = $a->display($query);
			$cout_i = 0;
		
		foreach ($result_book as $valb) { 
		
			if( $cout_i == 6) {
				echo '</div><div class="row padding_bot_top_10">';
			}
		?>
            	
                
        
                	<div class="col-md-2">
                    	<div class="innr_dp" style=" background: url('<?php echo "../assets/images/book.jpg";?>');     background-size: 100% 200px;
    background-repeat: no-repeat;">
                        	<div class="innr_dp_in innr_dp_hover" book_section_id="<?php echo  $valb['id'];?>"  book_section_name="<?php echo  $valb['section'];?>">
                            	<h4> 
                                	<?php echo  $valb['section'];?>
                                </h4>
                                <textarea disabled class="innr_dp_in_textarea"><?php echo  $valb['description'];?></textarea>
                            </div>
                        </div>
                    </div>
                	
                
               
                
                <?php 
				$cout_i ++;
		}
		?>
                 </div>    
                      
            </div>        
        </div>
        
        
        
    
    </div>
    </div>






<?php //include_once '../upladimage.php'; ?>



<?php include_once('footer.php'); ?>
