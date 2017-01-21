<?php

include( 'header.php'); 

?>

<?php 
		$query = "SELECT * FROM post WHERE `post`.`delete` = 0 AND te_id = '".substr($_SESSION['st'],3)."' ORDER BY `post`.`date` ";
		$result_view_post = $a->display($query);
		//$contcut54987558679867 = $result_view_post[0];
		
		//var_dump($result_view_base);
		//return;
		
		
	 ?>



<div class="row" style="margin-top: -42px;" >
   <div class="ead004873" id="bss5987358" style="padding: 13px;">
        <div class="head_div_my hidden" id="sho585739587">
            <div class="col-md-3 my_each_col_md54">
                <label id="image8579935"> images </label>
            </div>
            <div class="col-md-3 my_each_col_md54">
                <label id="video38597358"> videos </label>
            </div>
            <div class="col-md-3 my_each_col_md54">
                <label id="doc3857348"> documents </label>
            </div>
            <div class="col-md-3 my_each_col_md54">
                <label id="othr4853457"> other </label>
            </div>
        
        
        </div>
   <label style="text-align:center;"> menu </label>
   </div>
    <div class="main_body_gal forall4divhide">
    <div class="display9865756">
    	<div class="actual_cont8985 col-md-8" id="actual_cont898557863">
        
        </div>
        <div class="col-md-4" id="actual_commnt898557863" style="max-width: 100%; max-height: 410px; overflow:auto; overflow-x:hidden;">
        
        </div>
    
    </div>
    <div class="review5907834">
    	<div class="rewinnr">
        <?php
		foreach($result_view_post as $value ) {
			
			$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/post/'.$value['attachment'];
											
											
				if(file_exists($imgFpath) && strlen($value['attachment'])>0 ) {
					
					$query = "SELECT COUNT(*) AS count FROM comment WHERE post_id = ".$value['post_id'];
					$result_view_base534 = $a->display($query);
					$count_cmnt556 = 0;
					if(!empty($result_view_base534)) {
						$result_view_base534 = $result_view_base534[0];
						$count_cmnt556 = $result_view_base534['count'];
					}
					
					
					$showimage = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];
					
					
					$file_exte_fir_fu35435 = pathinfo($value['attachment'], PATHINFO_EXTENSION);			
					$typ5870345973e = 0;
					switch(strtolower($file_exte_fir_fu35435))  {
						case 'jpg':		
					$typ5870345973e = 1;
						break;
						case 'png':
					$typ5870345973e = 1;
						break;
						case 'jpeg':
					$typ5870345973e = 1;
						break;
						case 'gif':
					$typ5870345973e = 1;
						break;		
						case 'mp4':
					$typ5870345973e = 2;
						break;
						case '3gp':
					$typ5870345973e = 2;
						break;
						case 'mkv':
					$typ5870345973e = 2;
						break;
						case 'avi':
					$typ5870345973e = 2;
						break;
						case 'mov':
					$typ5870345973e = 2;
						break;
						case 'docx':
					$typ5870345973e = 31;
						break;
						case 'pdf':
					$typ5870345973e = 32;
						break;
						case 'ppt':
					$typ5870345973e = 33;
						break;
						default :
					$typ5870345973e = 4;
					}
		
							
						
						
						
					switch ($typ5870345973e) {
						case 1 :
						?>
                    <div class="prevorescroll" >
                        <div class="" >
                            <img src="<?php  echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment']; ?>" style="max-width:100%; max-height:155px; width:auto; height:auto;" class="clickmeforwiew" post_id="<?php echo $value['post_id'];  ?>" cmmnt_count=<?php echo $count_cmnt556; ?> data-toggle="tooltip" title="<?php  echo $value['message']; ?>">
                        </div>
                    </div>
                    <?php
						break;
						
						
					}
					
					
					
					
					
					
					
					
					
					
				} else {
					
				}
				
		}
           ?>
        </div>
    </div>
    
    
    </div>
    
    
    <div class="main_body_video forall4divhide hidden">
    <div class="display9865756">
    	<div class="actual_cont8985 col-md-8" id="actual_cont5566456456" style=" text-align: center;">
        
        </div>
        <div class="col-md-4" id="actual_commnt56456456" style="max-width: 100%; max-height: 410px; overflow:auto; overflow-x:hidden;">
        
        </div>
    
    </div>
    <div class="review5907834">
    	<div class="rewinnrvideo">
        <?php
		foreach($result_view_post as $value ) {
			
			$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/post/'.$value['attachment'];
											
											
				if(file_exists($imgFpath) && strlen($value['attachment'])>0 ) {
					
					$query = "SELECT COUNT(*) AS count FROM comment WHERE post_id = ".$value['post_id'];
					$result_view_base534 = $a->display($query);
					$count_cmnt556 = 0;
					if(!empty($result_view_base534)) {
						$result_view_base534 = $result_view_base534[0];
						$count_cmnt556 = $result_view_base534['count'];
					}
					
					
					$showimage = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];
					
					
					$file_exte_fir_fu35435 = pathinfo($value['attachment'], PATHINFO_EXTENSION);			
					$typ5870345973e = 0;
					switch(strtolower($file_exte_fir_fu35435))  {
						case 'jpg':		
					$typ5870345973e = 1;
						break;
						case 'png':
					$typ5870345973e = 1;
						break;
						case 'jpeg':
					$typ5870345973e = 1;
						break;
						case 'gif':
					$typ5870345973e = 1;
						break;		
						case 'mp4':
					$typ5870345973e = 2;
						break;
						case '3gp':
					$typ5870345973e = 2;
						break;
						case 'mkv':
					$typ5870345973e = 2;
						break;
						case 'avi':
					$typ5870345973e = 2;
						break;
						case 'mov':
					$typ5870345973e = 2;
						break;
						case 'docx':
					$typ5870345973e = 31;
						break;
						case 'pdf':
					$typ5870345973e = 32;
						break;
						case 'ppt':
					$typ5870345973e = 33;
						break;
						default :
					$typ5870345973e = 4;
					}
		
							
						
						
						
					switch ($typ5870345973e) {
						
						case 2 :
						?>
                    
                        <div class="prevorescroll" >
                            
                            <video   style="max-width:100%; max-height:155px; width:auto; height:auto;" class="clickmeforwiewforvideo" post_id="<?php echo $value['post_id'];  ?>" cmmnt_count=<?php echo $count_cmnt556; ?> data-toggle="tooltip" title="<?php  echo $value['message']; ?>">
  <source src="<?php  echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment']; ?>" type="video/<?php echo pathinfo($value['attachment'], PATHINFO_EXTENSION); ?>" >
Your browser does not support the video tag.
</video>
                        </div>
                    <?php
						break;
						
					}
					
					
					
					
					
					
					
					
					
					
				} else {
					
				}
				
		}
           ?>
        </div>
    </div>
    
    
    </div>
    
    
     <div class="main_body_doc forall4divhide hidden">
    <div class="display9865756">
    	<div class="actual_cont8985 col-md-8" id="actual_contdoc898557863">
        
        </div>
        <div class="col-md-4" id="actual_commntdoc" style="max-width: 100%; max-height: 410px; overflow:auto; overflow-x:hidden;">
        
        </div>
    
    </div>
    <div class="reviewdoc434">
    	<div class="rewinnr0t6">
        <?php
		foreach($result_view_post as $value ) {
			
			$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/post/'.$value['attachment'];
											
											
				if(file_exists($imgFpath) && strlen($value['attachment'])>0 ) {
					
					$query = "SELECT COUNT(*) AS count FROM comment WHERE post_id = ".$value['post_id'];
					$result_view_base534 = $a->display($query);
					$count_cmnt556 = 0;
					if(!empty($result_view_base534)) {
						$result_view_base534 = $result_view_base534[0];
						$count_cmnt556 = $result_view_base534['count'];
					}
					
					
					$showimage = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];
					
					
					$file_exte_fir_fu35435 = pathinfo($value['attachment'], PATHINFO_EXTENSION);			
					$typ5870345973e = 0;
					switch(strtolower($file_exte_fir_fu35435))  {
						case 'jpg':		
					$typ5870345973e = 1;
						break;
						case 'png':
					$typ5870345973e = 1;
						break;
						case 'jpeg':
					$typ5870345973e = 1;
						break;
						case 'gif':
					$typ5870345973e = 1;
						break;		
						case 'mp4':
					$typ5870345973e = 2;
						break;
						case '3gp':
					$typ5870345973e = 2;
						break;
						case 'mkv':
					$typ5870345973e = 2;
						break;
						case 'avi':
					$typ5870345973e = 2;
						break;
						case 'mov':
					$typ5870345973e = 2;
						break;
						case 'docx':
					$typ5870345973e = 31;
						break;
						case 'pdf':
					$typ5870345973e = 32;
						break;
						case 'ppt':
					$typ5870345973e = 33;
						break;
						default :
					$typ5870345973e = 4;
					}
		
							
						
						
						
					switch ($typ5870345973e) {
						
						case 31 :
							?>
                    
                        <div class="prevorescroll"  >
                            <div style=" width:200px;  height:155px;  background-color:#61FF48;    overflow: auto;" class="clickmeforwiewdoc" post_id="<?php echo $value['post_id'];  ?>" cmmnt_count=<?php echo $count_cmnt556; ?> src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];?>"> <?php echo $value['message']; ?></div>
                           
                        </div>
                     
                    <?php
						break;
						case 32 :
						?>
                     <div class="prevorescroll"  >
                            <div style=" width:200px;  height:155px;  background-color:#61FF48;    overflow: auto;" class="clickmeforwiewdoc" post_id="<?php echo $value['post_id'];  ?>" cmmnt_count=<?php echo $count_cmnt556; ?> src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];?>"><?php echo $value['message']; ?></div>
                         </div>
                    <?php
						break;
						case 33 :
							?>
                    <div class="prevorescroll"  >
                            <div style="max-width:200px;  height:155px;   background-color:#61FF48;    overflow: auto;" class="clickmeforwiewdoc" post_id="<?php echo $value['post_id'];  ?>" cmmnt_count=<?php echo $count_cmnt556; ?> src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];?>"><?php echo $value['message']; ?></div>
                         </div>
                    <?php
						break;
						
					}
					
					
					
					
					
					
					
					
					
					
				} else {
					
				}
				
		}
           ?>
        </div>
    </div>
    
    
    </div>
    

   <div class="main_body_dwnld forall4divhide hidden">
    <div class="display9865756">
    	<div class="actual_cont8985 col-md-8" id="actual_543dwnld">
        
        </div>
        <div class="col-md-4" id="actual_commntdwnld" style="max-width: 100%; max-height: 410px; overflow:auto; overflow-x:hidden;">
        
        </div>
    
    </div>
    <div class="review5907834">
    	<div class="rewinnr">
        <?php
		foreach($result_view_post as $value ) {
			
			$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/post/'.$value['attachment'];
											
											
				if(file_exists($imgFpath) && strlen($value['attachment'])>0 ) {
					
					$query = "SELECT COUNT(*) AS count FROM comment WHERE post_id = ".$value['post_id'];
					$result_view_base534 = $a->display($query);
					$count_cmnt556 = 0;
					if(!empty($result_view_base534)) {
						$result_view_base534 = $result_view_base534[0];
						$count_cmnt556 = $result_view_base534['count'];
					}
					
					
					$showimage = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];
					
					
					$file_exte_fir_fu35435 = pathinfo($value['attachment'], PATHINFO_EXTENSION);			
					$typ5870345973e = 0;
					switch(strtolower($file_exte_fir_fu35435))  {
						case 'jpg':		
					$typ5870345973e = 1;
						break;
						case 'png':
					$typ5870345973e = 1;
						break;
						case 'jpeg':
					$typ5870345973e = 1;
						break;
						case 'gif':
					$typ5870345973e = 1;
						break;		
						case 'mp4':
					$typ5870345973e = 2;
						break;
						case '3gp':
					$typ5870345973e = 2;
						break;
						case 'mkv':
					$typ5870345973e = 2;
						break;
						case 'avi':
					$typ5870345973e = 2;
						break;
						case 'mov':
					$typ5870345973e = 2;
						break;
						case 'docx':
					$typ5870345973e = 31;
						break;
						case 'pdf':
					$typ5870345973e = 32;
						break;
						case 'ppt':
					$typ5870345973e = 33;
						break;
						default :
					$typ5870345973e = 4;
					}
		
							
						
						
						
					switch ($typ5870345973e) {
						case 4 :
								?>
                   
                        <div srct='<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];?>' post_id="<?php echo $value['post_id'];  ?>" cmmnt_count=<?php echo $count_cmnt556; ?> class="prevorescroll downl_dfdfgdfgdfgdfdf" data-toggle="tooltip" title="<?php  echo $value['message']; ?>" style="width:200px;  height:155px;   background-color:#61FF48;  >
                            <a    overflow: auto;" class="clickmeforwfiles"href="../download.php?link=<?php echo 'post/'.$value['attachment'];?> "   ><i class="fa fa-download"></i>Download here</a>
                        </div>
                  
                   
						 
                         
                    <?php
					
					
					

						
						
					}
					
					
					
					
					
					
					
					
					
					
				} else {
					
				}
				
		}
           ?>
        </div>
    </div>
    
    
    </div>
    

</div>


	

<?php include_once('footer.php'); ?>

