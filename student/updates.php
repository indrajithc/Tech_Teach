<?php

include( 'header.php'); 

?>
	<?php 
		$query = "SELECT * FROM post WHERE `post`.`delete` = 0 ORDER BY `post`.`date` DESC LIMIT 10";
		$result_view_post = $a->display($query);
			   
		$query = "SELECT * FROM student WHERE user_name = '".substr($_SESSION['st'],3)."'";
		$result_view_base = $a->display($query);
		$result_view_base = $result_view_base[0];
		$myImg = IMG_STUD.$result_view_base['image'];
		$myname = $result_view_base['lname'].' '. $result_view_base['fname'];
		$myTime = $result_view_base['date'];
		//var_dump($result_view_base);
		//return;
		
		
	 ?>


<section id="update" class="colorCust post-area-wrapper-full">
	 <!-- Post 
    <div class="post-header-button">
        <a href="#" id="post-new-post">Write</a>
    </div>-->
    <?php 
	$imgFpath4553535 = "../assets/images/defalut.jpg";	
	$imgFpath4553535 = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/student/images_/'.$result_view_base['image'];
								
						
								if(file_exists($imgFpath4553535) && strlen($result_view_base['image'])>0 ) {
									
									$imgFpath4553535 = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/student/images_/'.$result_view_base['image'];
								} else {
									$imgFpath4553535 = "../assets/images/defalut.jpg";	
								}
								
	
	?>

<div id="default_name_id_save_deta" class="hidden" myname = "<?php echo $myname; ?>"  myimg="<?php echo $imgFpath4553535; ?>"  user_name="<?php echo substr($_SESSION['st'],3); ?>"></div>
 <div class="post-area-wrapper" id="add_a_new_post_Base58634653" totoal_post =<?php 
	 $qw = "SELECT COUNT(*) AS total FROM `post`";
	 $selct_cwqe423ou422tnZ = $a->display($qw);
	 $selct_cwqe423ou422tnZ = $selct_cwqe423ou422tnZ[0];
	 echo $selct_cwqe423ou422tnZ['total'];
 
  ?>>

       <form id="add_a_po_st">
        <div class="post-wrapper">
            <div class="pull-left for_ma_mrgn_edit">
                <div class="post-avatar">
                    <img src="<?php echo $myImg; ?>" alt="" width="100px" height="100px" >
                </div>
                <div class="post-user-name">
                    <a href="asdas"> </a>
                </div>
                
                
               
               
            </div>
            <div class="pull-right-post">
              
              
                <div class="post-details">
                <div class="col-md-11"> 
                                        <textarea id="content" name="content" placeholder="What's on your mind?" class="whsurmind_post"></textarea> 
                                                                            </div>
                                                        </div>
                    </div>
                    <div class="addpotfooter uplad_item" type=0 id="upld_a_item_here">
                
  
  
  
  
                    </div>
                    <div id="progress-div" class="hidden"><div id="progress-bar"></div></div>
                    <div class="postContntMe ">
                            	<div class="row postFotterinnr">
                                	<div class="col-md-3 inlineAPF">
                                    <i class="fa fa-camera icamera" id="uplad_a_item_ty_1"  data-toggle="tooltip" title="add an image"></i>
                                    </div>
                                    
                                    
                                    <div class="col-md-3 inlineAPF">
                                    <i class="fa fa-video-camera ivideo" id="uplad_a_item_ty_2" data-toggle="tooltip" title="add a video"></i>
                                    </div>
                                    
                                    <div class="col-md-3 inlineAPF">
                                    <i class="fa fa-file ivideo" id="uplad_a_item_ty_3" data-toggle="tooltip" title="add a document"></i>
                                    </div>
                                    
                                    <div class="col-md-3 inlineAPF">
                                    <i class="fa fa-paperclip ipaperclip" id="uplad_a_item_ty_4" data-toggle="tooltip" title="add an attachment"></i>
                                    </div>                                                                     
                                </div>
                                <div class="fotrButtn_post ">
                                	<input type="submit" class="btn btn-primary  btn-mini shadow" id="upload" value="post">
                                </div>  	
                                <div class="fotrButtn_post">
                                	<div id="btn-select" status=0>
                                        <button class="btn btn-mini dropdown-toggle custButtnFMe_post" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-eye jztAddPadd"></i>
                                        public
                                       <span class = "caret "></span>
                                       </button>
                                      <div id="prvcysele_post"  class="dropdown-menu custMeG_post">
                                      	<div class="innrPrivcy shadow" status=1>
                                        	<i class="fa fa-futbol-o jztAddPadd"></i>
                                            class only
                                        </div>
                                        <div class="innrPrivcy shadow" status=2>
                                       		<i class="fa fa-group jztAddPadd"></i>
                                        	 department only
                                        </div>
                                        <div class="innrPrivcy shadow" status=0>
                                       		<i class="fa fa-globe jztAddPadd"></i>
                                        	 public
                                        </div>
                                      </div>
                                    </div>

                                </div>                            
                            </div>  
                    
                    
</div>

</form>
<form id="opad_486_"  action="../upload.php" method="post" class="hidden">
  <input type="file" name="upad_any_item_1" class="hidden  ulad_trgg_forall" id="upad_any_item_1"  />
                    <input type="submit" id="btnSubmit_this" value="Submit" class="hidden" />
</form>
</div>




 <?php
					$az = date('Y-m-d H:i:s');
					foreach($result_view_post as $value) {
						if(isSee_post( $value['post_id'] )) {
						
						
						
						
						$INRresult_post = array();
						$showimage ='';
						$boolTestT = false ;
						if (!ctype_digit($value['te_id'])) { 
											
								$INRquery = "SELECT d.name as department ,t.image, CONCAT( t.fname,' ',t.lname ) AS name FROM teacher t LEFT JOIN department d on t.department = d.did WHERE t.delete_status=0 AND t.user_name ='".$value['te_id']."'";
								$INRresult_post = $a->display($INRquery);
								$errors = array_filter($INRresult_post);
								$boolTestT = true;
				//	 var_dump($INRquery);	
								if (!empty($errors)) {
									 
								$INRresult_post = $INRresult_post[0];  
								$showimage = "../assets/images/defalut.jpg";	
								
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/teacher/images_/'.$INRresult_post['image'];
											
											
											if(file_exists($imgFpath) && strlen($INRresult_post['image'])>0 ) {
												
												$showimage = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/teacher/images_/'.$INRresult_post['image'];
											} else {
												$showimage = "../assets/images/defalut.jpg";	
											}
											
								}
											
							} else  {
												
																		
								$INRquery = "SELECT class AS department ,image, CONCAT( fname,' ',lname ) AS name FROM `student` WHERE user_name ='".$value['te_id']."'";
								$INRresult_post = $a->display($INRquery);
								$errors = array_filter($INRresult_post);
					// var_dump($INRquery);	
					 $boolTestT = true;
								if (!empty($errors)) {
									 
								$INRresult_post = $INRresult_post[0]; 
								 $INRresult_post['department'] = returnClaseeForMe ($INRresult_post['department']);
								$showimage = "../assets/images/defalut.jpg";	
								
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/student/images_/'.$INRresult_post['image'];
											
											
											if(file_exists($imgFpath) && strlen($INRresult_post['image'])>0 ) {
												
												$showimage = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/student/images_/'.$INRresult_post['image'];
											} else {
												$showimage = "../assets/images/defalut.jpg";	
											}
											
								}
								
								
							}
						
						
						
						
						
						
						
						
						
						
						
						
						
	//	 var_dump($INRquery);	
					if ($boolTestT) {
					
					/*	 
					$INRresult_post = $INRresult_post[0];  
					$showimage = "../assets/images/defalut.jpg";	
					
					$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/teacher/images_/'.$INRresult_post['image'];
								
								
								if(file_exists($imgFpath) && strlen($INRresult_post['image'])>0 ) {
									
									$showimage = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/teacher/images_/'.$INRresult_post['image'];
								} else {
									$showimage = "../assets/images/defalut.jpg";	
								}
								*/
								
					?> 
               
    <!-- Loop it -->
    <div class="post-area-wrapper loop_onside_for_ciunt" id="<?php echo $value['post_id']?>" did = " <?php
				  echo strtotime($value['date']);				   
				  ?>">
               
               <?php
			   $buo ='';
			   	if(isset($_SESSION['te'])  ) {
					$buo = substr( $_SESSION['te'] ,3) ;
				} else if( isset($_SESSION['st'])  ) {
					$buo = substr( $_SESSION['st'] ,3) ;
				}
					
					if($buo == $value['te_id'] ) {
			    ?>
                  
                  
<div class="clseeditpostdelete" >
<span class="glyphicon glyphicon-remove remove_post_234234" aria-hidden="true" post_id="<?php echo $value['post_id']?>"> remove</span><br/>
<i class="fa fa-pencil-square-o oclasForIvondWithClcik" aria-hidden="true"  post_id="<?php echo $value['post_id']?>"><span style="padding-left:13px">edit</i>
</div>


 <?php 
				}
			    ?>

        <!-- Post -->
        <div class="post-wrapper">
            <div class="pull-left">
                <div class="post-avatar">
                    <img src="<?php echo $showimage; ?>" alt="" width="100px" height="100px">
                </div>
                <div class="post-user-name">
                    <a href="index.php"><?php echo $INRresult_post['name'] ?> </a>
                </div>
                
                
                <div class="post-user-dpt">
                    <a href="#"><?php echo $INRresult_post['department']; ?> </a>
                </div>
                
                <div class="post-user-meta">
                  <!--  <p>200 posts</p>
                    <a href="#" class="post-replay-it">Replay </a> <!-- Giv an id to trigger comment box(model box) -->
                </div>
            </div>
            <div class="pull-right-post">
                <div class="post-heading">
                  <!--  <h3>HTML & JavaScript for beginners</h3> -->
                </div>
                <div class="post-meta-description">
                    <p><time class="timeago" datetime="<?php echo date("c", strtotime($value['date']));?>">July 17, 2008</time></p>
                </div>
                <div class="post-details min_height_maf">
                    <p>  <?php echo $value['message'];  ?></p>
                    
                    <?php 
						$imgFpath54345345 = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/post/'.$value['attachment'];
								
								
								
				if(file_exists($imgFpath54345345) && strlen($value['attachment'])>0 ) {
									
					
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
                    <div class="post-materials" style="width: 100%;">
                        <div class="" style="text-align:center ;  max-width: 600px;">
                            <img src="<?php  echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment']; ?>" style="max-width:100%; max-height:500px; width:auto; height:auto;">
                        </div>
                    </div>
                    <?php
						break;
						case 2 :
						?>
                    <div class="post-materials" style="width: 100%;">
                        <div class="" style="text-align:center ;  max-width: 600px;">
                            
                            <video style="max-width:100%; max-height:500px; width:auto; height:auto;" controls>
  <source src="<?php  echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment']; ?>" type="video/<?php echo pathinfo($value['attachment'], PATHINFO_EXTENSION); ?>">
Your browser does not support the video tag.
</video>
                        </div>
                    </div>
                    <?php
						break;
						case 31 :
							?>
                    <div class="post-materials" style="width: 100%;">
                        <div class="" style="text-align:center ;  max-width: 600px;">
                            <object style=" width:100%;height:500px;border: none;" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];?>"><embed  style=" width:100%;height:500px;border: none;"src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];?>"></embed></object>
                            <a  href="../download.php?link=<?php echo 'post/'.$value['attachment'];?>" id='clickdwn542345354'><i class="fa fa-download"></i>Download here</a>
                        </div>
                    </div>
                    <?php
						break;
						case 32 :
						?>
                    <div class="post-materials" style="width: 100%;">
                        <div class="" style="text-align:center ;  max-width: 600px;">
                            <embed src="<?php  echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment']; ?>" style=" width:100%; height:500px;">
                        </div>
                    </div>
                    <?php
						break;
						case 33 :
							?>
                    <div class="post-materials" style="width: 100%;">
                        <div class="" style="text-align:center ;  max-width: 600px;">
                            <object style=" width:100%;height:500px;border: none;" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];?>"><embed  style=" width:100%;height:500px;border: none;"src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/post/'.$value['attachment'];?>"></embed></object>
                            <a  href="../download.php?link=<?php echo 'post/'.$value['attachment'];?>" id='clickdwn542345354'><i class="fa fa-download"></i>Download here</a>
                        </div>
                    </div>
                    <?php
						break;
						case 4 :
								?>
                    <div class="post-materials" style="width: 100%;">
                        <div class="" style="text-align:center ;  max-width: 600px;">
                            <a  href="../download.php?link=<?php echo 'post/'.$value['attachment'];?>" id='clickdwn542345354'><i class="fa fa-download"></i>Download here</a>
                        </div>
                    </div>
                   
						 
                         
                    <?php
					
					
					
						break;
					}
					
					
					
					}
					?>
                    
                    
                </div>
            </div>
        </div>
                                         <?php 
							 
							 $query = "SELECT * ,(SELECT COUNT(*) FROM comment WHERE post_id = ".$value['post_id']." ) AS COUNT FROM `comment` WHERE post_id = ".$value['post_id']." ORDER BY `comment`.`date` ASC ";
							 $select_comments = $a->display($query);
							$errors = array_filter($select_comments);
							if (!empty($errors)) {
								$jztNoOfCommts = $select_comments[0];
								$tempCount = $jztNoOfCommts['COUNT'];
							 ?>


        <div class="comment-heading-box">
        
          <?php if($tempCount >4) {
							 ?>
                             <div class="commentnoshowJu">
                             <?php  echo ' 4 of '.$tempCount; ?>
                             </div>	
                             <div class="moreComments">
                             	<div post_id="<?php echo $value['post_id']?>">
                                     <a class="customAddCmntHr" countId="<?php  echo $tempCount; ?>">
                                        View previous comments
                                     </a>
                                </div>
                             </div>
                             <?php } ?>
        </div>
        <!-- Comment -->
        <div class="post-comment-wrapper">
            <!-- Comments -->
             <?php 
							 
							 foreach($select_comments as $valueForComm) {
								if($tempCount <= 4) {
									
								
							 $INRquery = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name ='".$valueForComm['user_id']."'";
							 
							$INRresult_Comment = $a->display($INRquery);
							$errors = array_filter($INRresult_Comment);
							if (!empty($errors)) {
							$INRresult_Comment = $INRresult_Comment[0]; 
							//$showimageComment = IMG.$INRresult_Comment['image'];
							$showimageComment = "../assets/images/defalut.jpg";	
					
					$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/teacher/images_/'.$INRresult_Comment['image'];
								
								
								if(file_exists($imgFpath) && strlen($INRresult_post['image'])>0 ) {
									
									$showimageComment = 'http://'.$_SERVER['SERVER_NAME'].'/tech_teach/teacher/images_/'.$INRresult_Comment['image'];
								} else {
									$showimageComment = "../assets/images/defalut.jpg";	
								}
									
								 
								 
								 ?>
            
            
            <div class="post-comment-container jzt_a_border" comment_id='<?php  echo $valueForComm['comment_id']  ?>'>
                <div class=" pull-left-child">
                    <div class="post-comment-avatar-post" style="background:url('<?php echo $showimageComment; ?>');">
                    </div>
                </div>

                <div class="pull-right-comment">
                    <div class="post-comment-name">
                        <a href=""><?php echo $INRresult_Comment['fname'].' '.$INRresult_Comment['lname'] ?> </a>
                    </div>
                    <div class="post-comment-meta">
                        <p> <time class="timeago" datetime="<?php echo date("c", strtotime($valueForComm['date']));?>">July 17, 2008</time></p>
                    </div>
                    <div class="post-comment-description">
                        <p><?php echo $valueForComm['comment'];?></p>
                    </div>
                </div>
            </div>

<?php
							}
								}
								
							$tempCount --;
							}
?>


        </div>
<?php 
							
							} else {
							?>
                            
        <div class="post-comment-wrapper"> </div>
                            <?php
								
							}
?>
 <div class="post-comment-container jzt_a_border" style="padding-left: 74px;">
                <div class=" pull-left-child-com">
                    <div class="post-comment-avatar-post" style="background:url('<?php echo $myImg; ?>');">
                    </div>
                </div>

                <div class="pull-right-comment">
                  
                     <div class="col-md-11" post_id="<?php echo $value['post_id']?>" post_date = " <?php
				  echo strtotime($value['date']);				   
				  ?>">
                                                
                                                	<textarea  name="content" name="commnt" placeholder="What's on your mind?" class="addACommentMe_post"></textarea>
                                                </div>
                </div>
            </div>





    </div>
    
    
    <?php
					}
					
					}//if valid to see
					}//
	?>

</section>	


<?php
function isSee_post( $post ) {
	global $a;
	$varreturn = false;
	$query = "SELECT * FROM post WHERE `post`.`post_id` =".$post;
		$pstDeta = $a->display($query);
		$pstDeta =$pstDeta[0];
		if ($pstDeta['type'] == 0) {
			return true;
		} else {
		
		
				if(isset($_SESSION['te'])) {
			$sessionS = $_SESSION['te'];
			$sessionS = substr( $sessionS ,3);
			
	//echo $pstDeta.'-'.$sessionS;
			
			if( $pstDeta['te_id'] == $sessionS) {
				return true;
			}  else if ($pstDeta['type'] == 1) {
				
				
						$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name ='".$sessionS."'";
						$postTeach = $a->display($query);
						$postTeach =$postTeach[0];
						$uclass_id = $postTeach['class_id'];
				
				$pclass_id = '';
				if (!ctype_digit($pstDeta['te_id'])) {
						$query = "SELECT * FROM `teacher` WHERE  delete_status=0  AND user_name ='".$pstDeta['te_id']."'";
						$post_int = $a->display($query);
						$post_int =$post_int[0];
						$pclass_id = $post_int['class_id'];
					
					
				} else {
						$query = "SELECT * FROM `student` WHERE user_name ='".$pstDeta['te_id']."'";
						$post_int = $a->display($query);
						$post_int =$post_int[0];
						$pclass_id = $post_int['class'];
					
				}
				
				if($pclass_id == $uclass_id) {
					
					return true;
				}
			} else {
				
					$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name ='".$sessionS."'";
						$postTeach = $a->display($query);
						$postTeach =$postTeach[0];
						$udpt = $postTeach['department'];
						
						$pdpt = '';
						if (!ctype_digit($pstDeta['te_id'])) {
								$query = "SELECT * FROM `teacher` WHERE  delete_status=0  AND user_name ='".$pstDeta['te_id']."'";
								$post_int = $a->display($query);
								$post_int =$post_int[0];
								$pdpt = $post_int['department'];
							
					
						} else {
								$query = "SELECT * FROM `student` WHERE user_name ='".$pstDeta['te_id']."'";
								$post_int = $a->display($query);
								$post_int =$post_int[0];
								$post_int =  getDpOfAstud($post_int['class']);
								$pdpt = $post_int['did'];
							
						}
						
						if($pstDeta['type'] == 2) {
							if ($pdpt == $udpt) {
								return true;	
							}
						}
				
				
				
			}

				} else if(isset($_SESSION['st'])) {
			$sessionS = $_SESSION['st'];
			$sessionS = substr( $sessionS ,3);
			
	//echo $pstDeta.'-'.$sessionS;
			
			if( $pstDeta['te_id'] == $sessionS) {
				return true;
			}  else if ($pstDeta['type'] == 1) {
				
				
						$query = "SELECT * FROM `student` WHERE user_name ='".$sessionS."'";
						$postTeach = $a->display($query);
						$postTeach =$postTeach[0];
						$uclass_id = $postTeach['class'];
				
				$pclass_id = '';
				if (!ctype_digit($pstDeta['te_id'])) {
						$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name ='".$pstDeta['te_id']."'";
						$post_int = $a->display($query);
						$post_int =$post_int[0];
						$pclass_id = $post_int['class_id'];
					
					
				} else {
						$query = "SELECT * FROM `student` WHERE user_name ='".$pstDeta['te_id']."'";
						$post_int = $a->display($query);
						$post_int =$post_int[0];
						$pclass_id = $post_int['class'];
					
				}
				
				if($pclass_id == $uclass_id) {
					
					return true;
				} 
				
			} else {
				

					$query = "SELECT * FROM `student` WHERE user_name ='".$sessionS."'";
						$postTeach = $a->display($query);
						$postTeach =$postTeach[0];
						$postTeach =  getDpOfAstud($postTeach['class']);
						$udpt = $postTeach['did'];
						
						$pdpt = '';
						if (!ctype_digit($pstDeta['te_id'])) {
								$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name ='".$pstDeta['te_id']."'";
								$post_int = $a->display($query);
								$post_int =$post_int[0];
								$pdpt = $post_int['department'];
							
					
						} else {
								$query = "SELECT * FROM `student` WHERE user_name ='".$pstDeta['te_id']."'";
								$post_int = $a->display($query);
								$post_int =$post_int[0];
								$post_int =  getDpOfAstud($post_int['class']);
								$pdpt = $post_int['did'];
							
						}
						
						if($pstDeta['type'] == 2) {
							
							if ($pdpt == $udpt) {
								return true;	
							}
						}
				
				
			}

				}

	
		}
	
	
	return $varreturn;
}


function getDpOfAstud($class_id) {
	global $a;
	$query = "SELECT * FROM sub_class s LEFT JOIN class c ON s.cid = c.id LEFT JOIN department d ON c.did = d.did WHERE s.class_id =".$class_id ;
						$post_isdsddasnt = $a->display($query);
						$post_isdsddasnt =$post_isdsddasnt[0];
						return $post_isdsddasnt;
}

function returnClaseeForMe ($opRslt) {
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
				
				
				$query = "SELECT * FROM department  WHERE did =  ".$Cvalue['did']."";
				$dpname_must = $a->display($query);
				$dpname_must = $dpname_must[0];
				return $yearsWord.'  '.$Cvalue['division'].' ('.$dpname_must['name'].')';
				} else {
		return "no class in charge";
	}
	
	
}

?>

<input type="hidden" class="btn btn-warning hidden" data-toggle="modal" data-target="#myModal" id="editclcikcHkdututhr"/>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="updateThis" id="updateThis">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">update</h4>
      </div>
      <div class="modal-body">
         <div class="row">
                        	  <div class="col-md-12">      	
                               <div class="cust_class">
                                   
                                    <div class="col-md-12 ">
                                       <textarea class="form-control textareal80861919" name="my_qstnis_0p" id="my_qstnis_0p" placeholder="write your own question " autofocus></textarea>
                                    </div>
                                </div>
                             </div>
              
          </div>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="submit" id="updateAformOfDataDot" post_id=0>
</form>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton_0" >Close</button>
      </div>
    </div>
  </div>
</div>

<?php include_once('footer.php'); ?>
