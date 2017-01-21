<?php
	try {
		require_once('includes/db.php');
		global $a;
		$a = new Database();
		
	}catch (Exception $e){
		
	}
	
	
	/*
	*function updateMe ($table, $xarray, $where ) 
	*function get_a_value_from_db ($table , $column ,$where) 
	*function insertInToComm ($table, $xarray ) {
	*function returnClaseeForMe ($opRslt)
	*/
	/*----------------------admin-----------------------*/
	function adminlogin($username, $password) {
		global $a;
		$query = 'SELECT * FROM `admin` where user_name = :username and password = :password';
		if ( $a->display($query, array(':username' => $username, ':password' => $password))  ) {
			
			return true;
						
		} else {
			return  false;	
		}
		
	}
	
	
	
	/*----------------------ad-----------------------*/
	function adlogin($username, $password) {
		global $a;
		
		
		$query = 'SELECT * FROM `admin` where user_name = :username and password = :password';
		if ( $a->display($query, array(':username' => $username, ':password' => $password))  ) {
			
			return true;
						
		} else {
			return  false;	
		}
		
	}
	
	
	/*----------------------te-----------------------*/
	function telogin($username, $password) {
		global $a;
		$query = 'SELECT * FROM `teacher` where user_name = :username and password = :password AND  delete_status=0 ';
		if ( $a->display($query, array(':username' => $username, ':password' => $password))  ) {
			
			return true;
						
		} else {
			return  false;	
		}
		
	}
	
	
	
	/*----------------------li-----------------------*/
	function lilogin($username, $password) {
		global $a;
		$query = 'SELECT * FROM `library` where user_name = :username and password = :password';
		if ( $a->display($query, array(':username' => $username, ':password' => $password))  ) {
			
			return true;
						
		} else {
			return  false;	
		}
		
	}
	
	
	/*----------------------st-----------------------*/
	function stlogin($username, $password) {
		global $a;
		$query = 'SELECT * FROM `student` where user_name = :username and password = :password  AND  delete_status=0 ';
		if ( $a->display($query, array(':username' => $username, ':password' => $password))  ) {
			
			return true;
						
		} else {
			return  false;	
		}
		
	}
	/*
	 *
	 * Add department
	 *
	 *date("Y-m-d H:i:s")
	 */
	
	function admin_adddepartment($classdepartment,$numberofyears) { 
		global $a;
		
		$query = "INSERT INTO `tech_teach`.`department` ( `name`, year, `date`) VALUES ( :name, :years, :date)";
		
		if ( $a->execute_data($query, array(':name' => $classdepartment, ':years' => $numberofyears, ':date' => date("Y-m-d H:i:s") )  )) {
			
			return true;
				
		} else {
			return false;	
		}
		
		
	}
	/*
	#
	# return list of department and values 
	#
	*/
	function get_department_values( $confirm ) {
	 	global $a;
		$result = array();
		$query = "SELECT did,name FROM `department` ";
		$result = $a->display($query);
		return $result;
		
		
	}
	
	/*
	/
	/ return a singe vale output by query i/p
	/
	*/
	
	function get_a_value_from_db ($table , $column ,$where) {
		global $a;
		$result = array();
		$query = 'SELECT '.$column.' FROM '.$table.' where '.$where;
		
		$result = $a->display($query) ;
		//echo $result[0] ;
		
		return $result ;
	}
	/*
	*
	* ad class
	*
	*/
	
	
	function add_class($name,$departmentidq,$batchq,$divisionidq) {
		
		if (true ) {
			$rturn_me = false;
			$result = get_department_values( true);
			foreach($result as $value) {
				if($departmentidq == $value['did'] && $name == $value['name']  ) {
					$rturn_me = true;
				}
			}	
			if($rturn_me) {}
			else {
				return false;	
			}
		}
		
		global $a;
		
		
					$letters = "ABCDEFGHIJKLMNOPQ";
		$statusz = true;			
		
			
			$query = "SELECT * FROM  `class` WHERE did =:did AND batch = :batch ";
			if ( !$a->display($query , array ( ':did' => $departmentidq, ':batch' => $batchq ) )) {
			
				$query = "INSERT INTO `tech_teach`.`class` (  `did`, `batch`, `date`) VALUES (  :did , :batch, :date)";
				
				
				
				if ( $a->execute_data($query, array(':did' => $departmentidq  , ':batch' => $batchq, ':date' => date("Y-m-d H:i:s") )  )) {
					
					//return true;
						
				} else {
					$statusz = false;
					//return false;	 code logic error return true for excut code sucssfly not chk if updtd or not
				}
				
				
				$query = "SELECT id from `class` WHERE did = '".$departmentidq."' AND batch = '".$batchq."'";
				$resultt = $a->display($query);
				$class_id = $resultt[0];
				if ($resultt) {
					for ( $j = 0  ; $j< $divisionidq ; $j++ ) {
						$divisionidql = $letters{$j};
						//echo "kkk";
						//var_dump($resultt);
						$query = "SELECT * FROM  `sub_class` WHERE cid =:cid AND division = :division ";
						if ( !$a->display($query , array ( ':cid' =>  $class_id['id'], ':division' => $divisionidql ) )) {
			
							$query = "INSERT INTO `tech_teach`.`sub_class` (`cid`, `division`, `date`) VALUES (  :cid , :division, :date)";
							if ( $a->execute_data($query, array(':cid' => $class_id['id'] ,':division' => $divisionidql, ':date' => date("Y-m-d H:i:s") )  )) {
										
							} else {
									//return false;	 code logic error return true for excut code sucssfly not chk if updtd or not
							}
						}
					}
				}
				
			
			} else {
				
				$query = "SELECT id from `class` WHERE did = '".$departmentidq."' AND batch = '".$batchq."'";
				$resultt = $a->display($query);//echo $query;
				$class_id = $resultt[0];
				if ($resultt) {
					for ( $j = 0  ; $j< $divisionidq ; $j++ ) {
						$divisionidql = $letters{$j};
						//echo "kkk";
						//var_dump($resultt);
						
						$query = "SELECT * FROM  `sub_class` WHERE cid =:cid AND division = :division ";
						if ( !$a->display($query , array ( ':cid' =>  $class_id['id'], ':division' => $divisionidql ) )) {
			
							$query = "INSERT INTO `tech_teach`.`sub_class` (`cid`, `division`, `date`) VALUES (  :cid , :division, :date)";
							if ( $a->execute_data($query, array(':cid' => $class_id['id'] ,':division' => $divisionidql, ':date' => date("Y-m-d H:i:s") )  )) {
										
							} else {
									//return false;	 code logic error return true for excut code sucssfly not chk if updtd or not
							}
						}
					}
				}
				
			}
				
			
				
		
			
		
		return $statusz;
		
		
	}
	
	
	/*
	*
	* add teacher
	* 
	*
	*/
	
	function  add_teacher($user_name,$fname ,$lname ,$sex ,$address,$mobile ,$code ,$class  ,$department) {
		global $a;
		
		$query = "SELECT * FROM  `teacher` WHERE user_name = :user_name ";
			if ( !$a->display($query , array ( ':user_name' => $user_name ) )) {
				$query = "SELECT * FROM  `teacher` WHERE mobile = :mobile ";
					if ( !$a->display($query , array ( ':mobile' => $mobile ) )) {
				
						$query = "INSERT INTO `tech_teach`.`teacher` ( `user_name`, `fname`, `lname`, `sex`,".
						" `address`, `mobile`, `department`, `class_id`, `code`, `date`) VALUES ".
						"(:user_name, :fname ,:lname ,:sex ,:address ,:mobile , :department, :class ,:code ,:date );";
						
						if ( $a->execute_data($query, array(':user_name' => $user_name , ':fname' => $fname
						, ':lname' => $lname , ':sex' => $sex , ':address' => $address ,
						':mobile' => $mobile , ':department' => $department, ':code' => $code, ':class' =>$class, ':date' => date("Y-m-d H:i:s") )  )) {
							
							return 1;
								
						} else {
							return 0;	
						}
					} else {
						return -2;	
					}
				
			} else {
				
				return -1;
			}
		
	}
	
	
	
	function get_classId( $department )  {
		$string = "";
		$ret = array();
		$table = 'class';
		$column = '*';
		$where = ' did = '.$department;
		$ret = get_a_value_from_db ($table , $column ,$where);
		foreach($ret as $value) {
				$string = $string.'<option value="'.$value['id'].'" >'.$value['batch']."</option>";	
			}
		return $string;
		
	}
	
	
	/*
	*
	* add Student
	* 
	*
	*/
	
	function  add_student($user_name,$fname ,$lname ,$sex ,$address,$mobile ,$class ) {
		global $a;
		$query = "SELECT * FROM  `student` WHERE user_name = :user_name";
			if ( !$a->display($query , array ( ':user_name' => $user_name ) )) {
				$query = "SELECT * FROM  `student` WHERE mobile = :mobile ";
					if ( !$a->display($query , array ( ':mobile' => $mobile ) )) {
		
						$query = "INSERT INTO `tech_teach`.`student` (`user_name`, `fname`, `lname`, ".
						"`class`, `sex`, `address`, `mobile`, `date`)VALUES (:user_name, :fname, :lname, ".
						":class, :sex, :address, :mobile, :date );";
												
						if ( $a->execute_data($query, array(':user_name' => $user_name , ':fname' => $fname
						, ':lname' => $lname , ':class' => $class, ':sex' => $sex , ':address' => $address ,
						':mobile' => $mobile , ':date' => date("Y-m-d H:i:s") )  )) {
							
							return 1;
								
						} else {
							return 0;	
						}
					} else {
						return -2;	
					}
				
			} else {
				
				return -1;
			}
		
	}
	
	
	
	
function  add_admin($user_name, $password ) {
		global $a;
		
		$query = "SELECT * FROM  `admin` WHERE user_name = :user_name";
			if ( !$a->display($query , array ( ':user_name' => $user_name ) )) {
				
						$query = "INSERT INTO `tech_teach`.`admin` (`user_name`, `password`, `date`)
						VALUES (:user_name, :password, :date );";
												
						if ( $a->execute_data($query, array(':user_name' => $user_name ,
						':password' => $password , ':date' => date("Y-m-d H:i:s") )  )) {
							
								$pass = get_a_value_from_db ('admin' , 'user_name, password' ,'user_name = "'.$user_name.'"');
								return $pass[0];
								
						} else {
							$xarray = array (
						':paasword' => 0);
						return $xarray;	
						}
					 
				
			} else {
				
				$xarray = array (
						'password' => -1);
						return $xarray;
			}
		
	}
	
	/*
	* ad a post bt teacher
	*/
	
	function add_a_post_by_teacher($data_post, $to_who, $type, $attachment )  {
		global $a;
		session_start();
		$sessionS = '';
		
		if(isset($_SESSION['te'])) {
			$sessionS = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessionS = $_SESSION['st'];
		} else {
			
			return 0;
		}
		$sessionS = substr( $sessionS ,3);
		$table = 'post';
		$date = date("Y-m-d H:i:s");
		$flag = NULL;
		$varreturn = 0;
		/////	
		$arrlength=count($attachment);
		
		if($arrlength == 1) {
			if(strlen($attachment[0])==0) {
		$xarray = array (
						'te_id' => $sessionS,
						'type' => $type,
						'message' => $data_post,
						'attachment' => NULL,
						'date' => $date
						
						);
		$flag = insertInToComm ($table, $xarray );
		$varreturn = $flag;
			}
		
		}  
		if(!is_null($arrlength)) {
		for($x=0;$x<$arrlength;$x++) {
			
			if(strlen($attachment[$x])>0) {
					$xarray = array (
						'te_id' => $sessionS,
						'type' => $type,
						'message' => $data_post,
						'attachment' => basename($attachment[$x]),
						'date' => $date
						
						);
		$flag = insertInToComm ($table, $xarray );
		$varreturn = $flag ;
				if($flag  == 1) {
					$targetPath_new = 'post/'.basename($attachment[$x]);
					$targetPath =  'uploads/'.basename($attachment[$x]);
					 if(rename($targetPath , $targetPath_new)) {
						 $varreturn = 1;
					 } else {
						 $varreturn = 0;
					 }
 
				}
			}
		} 
		}
		
	
	
/*$flag = get_a_value_from_db ($table ,  ,$where);
		$retuay = array (
						0 => $flag
						);
			*/					

		return $varreturn;
		
		
	}
	
	
	function appentPackPostedData ( $value) {
		
		if (session_status() == PHP_SESSION_NONE) {
			//session_start();
		}
				
		global $a;
		$returnStr45ing45645645 = '';
		$result_view_base = array();
		
		$myImg = "";
		$myname ="";
		$myTime ="";
		$bool224223222334 = false ;
		
		
		if( isset($_SESSION['te'])) {
			$query = "SELECT * FROM teacher WHERE user_name = '".substr($_SESSION['te'],3)."' AND  delete_status=0 ";
			$result_view_base = $a->display($query);
			$result_view_base = $result_view_base[0];
			
			
			$myImg = IMG.$result_view_base['image'];
			$myname = $result_view_base['lname'].' '. $result_view_base['fname'];
			$myTime = $result_view_base['date'];
			if(isSee_post( $value['post_id'] )) {
					$bool224223222334  = true ;
			
			}
	} else if(isset($_SESSION['st']))  {
		
		
		$query = "SELECT * FROM student WHERE user_name = '".substr($_SESSION['st'],3)."'";
		$result_view_base = $a->display($query);
		$result_view_base = $result_view_base[0];
		$myImg = IMG_STUD.$result_view_base['image'];
		$myname = $result_view_base['lname'].' '. $result_view_base['fname'];
		$myTime = $result_view_base['date'];
				if(isSee_post( $value['post_id'] )) {
								$bool224223222334 = true ;
						
				}
	}
				
			
			
		if (!ctype_digit($value['te_id'])) {
					
					
	/*if( isset($_SESSION['te'])) {
			$query = "SELECT * FROM teacher WHERE user_name = '".substr($_SESSION['te'],3)."'";
			$result_view_base = $a->display($query);
			$result_view_base = $result_view_base[0];
			
			
			$myImg = IMG.$result_view_base['image'];
			$myname = $result_view_base['lname'].' '. $result_view_base['fname'];
			$myTime = $result_view_base['date'];
			if(isSee_post( $value['post_id'] )) {
			$INRquery = "SELECT d.name as department ,t.image, CONCAT( t.fname,' ',t.lname ) AS name FROM teacher t LEFT JOIN department d on t.department = d.did WHERE t.user_name ='".$value['te_id']."'";
				$INRresult_post = $a->display($INRquery);
				$errors = array_filter($INRresult_post);		
				if (!empty($errors)) {
					$bool224223222334  = true ;
					$INRresult_post = $INRresult_post[0];  
					$showimage = "../assets/images/defalut.jpg";
					$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/teacher/images_/'.$INRresult_post['image'];
					if(file_exists($imgFpath) && strlen($INRresult_post['image'])>0 ) {
						$showimage = ''.PATH.'/teacher/images_/'.$INRresult_post['image'];
						} else {
								$showimage = "../assets/images/defalut.jpg";
							}
					}
			}
	} else if( isset($_SESSION['st']))  {
		$query = "SELECT * FROM student WHERE user_name = '".substr($_SESSION['st'],3)."'";
		$result_view_base = $a->display($query);
		$result_view_base = $result_view_base[0];
		$myImg = IMG_STUD.$result_view_base['image'];
		$myname = $result_view_base['lname'].' '. $result_view_base['fname'];
		$myTime = $result_view_base['date'];
				if(isSee_post( $value['post_id'] )) {
							$INRquery = "SELECT class AS department ,image, CONCAT( fname,' ',lname ) AS name FROM `student` WHERE user_name ='".$value['te_id']."'";
							$INRresult_post = $a->display($INRquery);
							$errors = array_filter($INRresult_post);
							if (!empty($errors)) {
								$bool224223222334  = true ;
								$INRresult_post = $INRresult_post[0]; 
								 $INRresult_post['department'] = returnClaseeForMe ($INRresult_post['department']);
								$showimage = "../assets/images/defalut.jpg";
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/student/images_/'.$INRresult_post['image'];
								if(file_exists($imgFpath) && strlen($INRresult_post['image'])>0 ) {
									$showimage = ''.PATH.'/student/images_/'.$INRresult_post['image'];
								} else {
									$showimage = "../assets/images/defalut.jpg";	
								}
							}
				}
	}
		
	*/			
			if ($bool224223222334) {
		$INRquery = "SELECT d.name as department ,t.image, CONCAT( t.fname,' ',t.lname ) AS name FROM teacher t LEFT JOIN department d on t.department = d.did WHERE t.user_name ='".$value['te_id']."'";
				$INRresult_post = $a->display($INRquery);
				$errors = array_filter($INRresult_post);		
				if (!empty($errors)) {
					$INRresult_post = $INRresult_post[0];  
					$showimage = "../assets/images/defalut.jpg";
					$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/teacher/images_/'.$INRresult_post['image'];
					if(file_exists($imgFpath) && strlen($INRresult_post['image'])>0 ) {
						$showimage = ''.PATH.'/teacher/images_/'.$INRresult_post['image'];
						} else {
								$showimage = "../assets/images/defalut.jpg";
							}
											
				
						
						
		
		
		$returnStr45ing45645645 = $returnStr45ing45645645 .'<!-- Loop it --><div class="post-area-wrapper loop_onside_for_ciunt" id="'.$value['post_id'].'" did = "'.strtotime($value['date']).'">';
		 		
				$buo ='';
			   	if(isset($_SESSION['te'])  ) {
					$buo = substr( $_SESSION['te'] ,3) ;
				} else if( isset($_SESSION['st'])  ) {
					$buo = substr( $_SESSION['st'] ,3) ;
				}
				
					if($buo == $value['te_id'] ) {
			    
$returnStr45ing45645645 = $returnStr45ing45645645 .'<div class="clseeditpostdelete" ><span class="glyphicon glyphicon-remove remove_post_234234" aria-hidden="true" post_id="'.$value['post_id'].'"> remove</span><br/>
<i class="fa fa-pencil-square-o oclasForIvondWithClcik" aria-hidden="true"   post_id="'.$value['post_id'].'"><span style="padding-left:13px">edit</i></div>';

				}
		
		
		
		$returnStr45ing45645645 = $returnStr45ing45645645 .'<!-- Post --><div class="post-wrapper"><div class="pull-left"><div class="post-avatar"><img src="'.$showimage.'" alt="" width="100px" height="100px"></div><div class="post-user-name"><a href="asdas">'.$INRresult_post['name'] .'</a></div><div class="post-user-dpt"><a href="asdas">'.$INRresult_post['department'].'</a></div><div class="post-user-meta"><!--  <p>200 posts</p><a href="#" class="post-replay-it">Replay </a> <!-- Giv an id to trigger comment box(model box) --></div></div><div class="pull-right-post"><div class="post-heading"><!--  <h3>HTML & JavaScript for beginners</h3> --></div><div class="post-meta-description"><p><time class="timeago" datetime="'. date("c", strtotime($value['date'])).'">July 17, 2008</time></p></div><div class="post-details min_height_maf"><p>  '. $value['message'].'</p>';
                    
                    
				
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
						
                    $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><img src="'.''.PATH.'/post/'.$value['attachment'].'" style="max-width:100%; max-height:500px; width:auto; height:auto;"></div></div>';
					
						break;
						case 2 :
					$returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><video style="max-width:100%; max-height:500px; width:auto; height:auto;" controls> <source src="'.''.PATH.'/post/'.$value['attachment'].'" type="video/'.pathinfo($value['attachment'], PATHINFO_EXTENSION).'">Your browser does not support the video tag.</video></div></div>';
						break;
						case 31 :

                     $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><object style=" width:100%;height:500px;border: none;" src="'.''.PATH.'/post/'.$value['attachment'].'"><embed  style=" width:100%;height:500px;border: none;"src="'. ''.PATH.'/post/'.$value['attachment'].'"></embed></object><a  href="../download.php?link='.'post/'.$value['attachment'].'" id="clickdwn542345354"><i class="fa fa-download"></i>Download here</a></div></div>';
                    
						break;
						case 32 :
						
                    $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><embed src="'.''.PATH.'/post/'.$value['attachment'].'" style=" width:100%; height:500px;"></div></div>';
                   
						break;
						case 33 :
							
                    $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><object style=" width:100%;height:500px;border: none;" src="'.''.PATH.'/post/'.$value['attachment'].'"><embed  style=" width:100%;height:500px;border: none;"src="'.''.PATH.'/post/'.$value['attachment'].'"></embed></object><a  href="../download.php?link='.'post/'.$value['attachment'].'" id="clickdwn542345354"><i class="fa fa-download"></i>Download here</a></div></div>';
                   
						break;
						case 4 :
					   $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><a  href="../download.php?link='.'post/'.$value['attachment'].'" id="clickdwn542345354"><i class="fa fa-download"></i>Download here</a></div></div>';
						break;
					}
					
					
					
					}
					 $returnStr45ing45645645  = $returnStr45ing45645645 .'</div></div></div><div class="comment-heading-box"><div class="commentnoshowJu"> </div><div class="moreComments"><div post_id="'. $value['post_id'].'"><a class="customAddCmntHr" countId="0"></a></div></div></div><!-- Comment -->
        <div class="post-comment-wrapper"><!-- Comments --></div><div class="post-comment-container jzt_a_border" style="padding-left: 74px;"><div class=" pull-left-child-com"><div class="post-comment-avatar-post" style="background:url('.$myImg.')"></div></div><div class=" pull-right-comment "><div class="col-md-11" post_id="'.$value['post_id'].'" post_date = "'.strtotime($value['date']).'"><textarea  name="content" name="commnt" placeholder="What`s on your mind?" class="addACommentMe_post"></textarea></div></div></div></div>';
					
					} 
			}
		} else  {
			
				if ($bool224223222334) {
									 
		$INRquery = "SELECT class AS department ,image, CONCAT( fname,' ',lname ) AS name FROM `student` WHERE user_name ='".$value['te_id']."'";
							$INRresult_post = $a->display($INRquery);
							$errors = array_filter($INRresult_post);
							if (!empty($errors)) {
								$INRresult_post = $INRresult_post[0]; 
								 $INRresult_post['department'] = returnClaseeForMe ($INRresult_post['department']);
								$showimage = "../assets/images/defalut.jpg";
								$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/student/images_/'.$INRresult_post['image'];
								if(file_exists($imgFpath) && strlen($INRresult_post['image'])>0 ) {
									$showimage = ''.PATH.'/student/images_/'.$INRresult_post['image'];
								} else {
									$showimage = "../assets/images/defalut.jpg";	
								}
							
				
						
						
		
		
		$returnStr45ing45645645 = $returnStr45ing45645645 .'<!-- Loop it --><div class="post-area-wrapper loop_onside_for_ciunt" id="'.$value['post_id'].'" did = "'.strtotime($value['date']).'">';
		 		
				$buo ='';
			   	if(isset($_SESSION['te'])  ) {
					$buo = substr( $_SESSION['te'] ,3) ;
				} else if( isset($_SESSION['st'])  ) {
					$buo = substr( $_SESSION['st'] ,3) ;
				}
					if($buo == $value['te_id'] ) {
			    
$returnStr45ing45645645 = $returnStr45ing45645645 .'<div class="clseeditpostdelete"  ><span class="glyphicon glyphicon-remove remove_post_234234" aria-hidden="true" post_id="'.$value['post_id'].'"> remove</span><br/>
<i class="fa fa-pencil-square-o oclasForIvondWithClcik" aria-hidden="true"   post_id="'.$value['post_id'].'"><span style="padding-left:13px">edit</i></div>';

				}
		
		
		
		$returnStr45ing45645645 = $returnStr45ing45645645 .'<!-- Post --><div class="post-wrapper"><div class="pull-left"><div class="post-avatar"><img src="'.$showimage.'" alt="" width="100px" height="100px"></div><div class="post-user-name"><a href="asdas">'.$INRresult_post['name'] .'</a></div><div class="post-user-dpt"><a href="asdas">'.$INRresult_post['department'].'</a></div><div class="post-user-meta"><!--  <p>200 posts</p><a href="#" class="post-replay-it">Replay </a> <!-- Giv an id to trigger comment box(model box) --></div></div><div class="pull-right-post"><div class="post-heading"><!--  <h3>HTML & JavaScript for beginners</h3> --></div><div class="post-meta-description"><p><time class="timeago" datetime="'. date("c", strtotime($value['date'])).'">July 17, 2008</time></p></div><div class="post-details min_height_maf"><p>  '. $value['message'].'</p>';
                    
				
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
						
                    $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><img src="'.''.PATH.'/post/'.$value['attachment'].'" style="max-width:100%; max-height:500px; width:auto; height:auto;"></div></div>';
					
						break;
						case 2 :
					$returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><video style="max-width:100%; max-height:500px; width:auto; height:auto;" controls> <source src="'.''.PATH.'/post/'.$value['attachment'].'" type="video/'.pathinfo($value['attachment'], PATHINFO_EXTENSION).'">Your browser does not support the video tag.</video></div></div>';
						break;
						case 31 :

                     $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><object style=" width:100%;height:500px;border: none;" src="'.''.PATH.'/post/'.$value['attachment'].'"><embed  style=" width:100%;height:500px;border: none;"src="'. ''.PATH.'/post/'.$value['attachment'].'"></embed></object><a  href="../download.php?link='.'post/'.$value['attachment'].'" id="clickdwn542345354"><i class="fa fa-download"></i>Download here</a></div></div>';
                    
						break;
						case 32 :
						
                    $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><embed src="'.''.PATH.'/post/'.$value['attachment'].'" style=" width:100%; height:500px;"></div></div>';
                   
						break;
						case 33 :
							
                    $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><object style=" width:100%;height:500px;border: none;" src="'.''.PATH.'/post/'.$value['attachment'].'"><embed  style=" width:100%;height:500px;border: none;"src="'.''.PATH.'/post/'.$value['attachment'].'"></embed></object><a  href="../download.php?link='.'post/'.$value['attachment'].'" id="clickdwn542345354"><i class="fa fa-download"></i>Download here</a></div></div>';
                   
						break;
						case 4 :
					   $returnStr45ing45645645  = $returnStr45ing45645645 .'<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center ;  max-width: 600px;"><a  href="../download.php?link='.'post/'.$value['attachment'].'" id="clickdwn542345354"><i class="fa fa-download"></i>Download here</a></div></div>';
						break;
					}
					
					
					
					}
					 $returnStr45ing45645645  = $returnStr45ing45645645 .'</div></div></div><div class="comment-heading-box"><div class="commentnoshowJu"> </div><div class="moreComments"><div post_id="'. $value['post_id'].'"><a class="customAddCmntHr" countId="0"></a></div></div></div><!-- Comment -->
        <div class="post-comment-wrapper"><!-- Comments --></div><div class="post-comment-container jzt_a_border" style="padding-left: 74px;"><div class=" pull-left-child-com"><div class="post-comment-avatar-post" style="background:url('.$myImg.')"></div></div><div class=" pull-right-comment "><div class="col-md-11" post_id="'.$value['post_id'].'" post_date = "'.strtotime($value['date']).'"><textarea  name="content" name="commnt" placeholder="What`s on your mind?" class="addACommentMe_post"></textarea></div></div></div></div>';
					
					}
					
		}
		}
		
		//////////////////////////////////////////////////////

		return $returnStr45ing45645645;
	}
	
	
	function uptudate_post ( $data ) {
		$uptudateStringx = '';
		//$qw = "SELECT COUNT(*) AS total FROM `post`";
	 $selct_cwqe423ou422tnZ = get_a_value_from_db ('`post`' , ' COUNT(*) AS total ' ,'1=1');
	 $selct_cwqe423ou422tnZ = $selct_cwqe423ou422tnZ[0];
	 $newTot = $selct_cwqe423ou422tnZ['total'];
		
		if($newTot == $data) {
		return array('success'=>0,
					'data' => $uptudateStringx,
					'count' => $newTot
					 );	
		}
		
		global $a;
		$query = "SELECT * FROM post ORDER BY `post`.`date` DESC LIMIT ".($newTot - $data);
		$result_ = $a->display($query);
		
		session_start();
		foreach($result_ as $value) {
			$uptudateStringx = $uptudateStringx.appentPackPostedData($value);
		}
		return array('success'=>1,
					'data' => $uptudateStringx,
					'count' => $newTot,
					'notification' => custNotifiactionForThisS($result_)
					 );	
	}
	
	
	function  custNotifiactionForThisS($result_) {
		
			global $a;
		$oneArayyretrn = array();
		foreach($result_ as $value) {
			
			
		$returnString = '';
		$myimg =PATH.'/assets/images/defalut_f.jpg';
		$myname = 'un known';
		if (!ctype_digit($value['te_id'])) {
			$INRquery = "SELECT * FROM `teacher` WHERE user_name ='".$value['te_id']."' AND  delete_status=0 ";
			$INRresult_Comment = $a->display($INRquery);
			
			$errors = array_filter($INRresult_Comment);
			
			if (!empty($errors)) {
			$INRresult_Comment = $INRresult_Comment[0]; 
			$myimg = ''.PATH.'/teacher/images_/'.$INRresult_Comment['image'];
			$myname = $INRresult_Comment['fname'].' '.$INRresult_Comment['lname'];	 
			
			
			 }
		} else {
			$INRquery = "SELECT * FROM `student` WHERE user_name ='".$value['te_id']."'";
			 
			$INRresult_Comment = $a->display($INRquery);
			
			$errors = array_filter($INRresult_Comment);
			
			if (!empty($errors)) {
			$INRresult_Comment = $INRresult_Comment[0]; 
			$myimg = ''.PATH.'/student/images_/'.$INRresult_Comment['image'];
			$myname = $INRresult_Comment['fname'].' '.$INRresult_Comment['lname'];
			 }
		}
			
			
			
			
			
			array_push($oneArayyretrn , array('name'=> $myname ,
								'image' => $myimg,
								'message' => $value['message']
								 ));	
			
			
		}
		
		return $oneArayyretrn;
	}
	
	function  uptudate_bottom_post ( $data ) {
		$uptudateStringx = '';
		$uptudateStringx43443  = '';
		$array_deta232 = array();
		global $a;
		$query = "SELECT * FROM `post` WHERE date < (SELECT date from `post` WHERE post_id=".$data." )  ORDER BY `post`.`date` DESC LIMIT 10";
		$result_ = $a->display($query);
		session_start();
		foreach($result_ as $value) {
			
			
		/////////////////////////////////////////////////////////////////////////////////			
					
			$query = "SELECT * ,(SELECT COUNT(*) FROM comment WHERE post_id = ".$value['post_id']." ) AS COUNT FROM `comment` WHERE post_id = ".$value['post_id']." ORDER BY `comment`.`date` ASC ";
		$result7667676_ = $a->display($query);
		
		if(!empty($result7667676_)) {
			$jztNoOfCommts2344 = $result7667676_[0];
			$tempCount = $jztNoOfCommts2344['COUNT'];
			if($tempCount > 0) {
				$ful_or_half =' <a class="customAddCmntHr" countId="'.$tempCount.'">
										View previous comments
									 </a>'	;	
					
					
				$uptudateStringx43443 = '<div class="commentnoshowJu">';
										  $uptudateStringx43443 = $uptudateStringx43443.' 0 of '.$tempCount;
										   $uptudateStringx43443 = $uptudateStringx43443.'</div>';
											
									 $uptudateStringx43443 = $uptudateStringx43443.'<div class="moreComments">
										<div post_id="'.$value['post_id'].'">'.$ful_or_half.'</div>
									 </div>';
							
			}
		}
		
		/////////////////////////////////////////////////////////////////////////////////
			
			$uptudateStringx = $uptudateStringx.appentPackPostedData ($value);
			array_push($array_deta232 , array('id'=> $uptudateStringx43443 ,
								'value' => appentPackPostedData ($value),
								'post' => $value['post_id']
								 ));	
			
		}
		return array('success'=>1,
					'data' => $array_deta232 
					 );
					
		
	
					
					
					
					
	}
	//
	// add a comment
	
	//.date("Y-m-d H:i:s", $timestamp);
	function add_a_comment_to_poast( $post_id, $post_date, $comment ) {
		global $a;
		session_start();
		//$sessionSd = $_SESSION['te'];
		if(isset($_SESSION['te'])) {
			$sessionSd = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessionSd = $_SESSION['st'];
		}
		$sessionS = substr( $sessionSd ,3);		
		$post_date = date("Y-m-d H:i:s", $post_date);
		$query = "SELECT COUNT(*) AS ROWS FROM `post` WHERE post_id = :post_id AND date = :post_date";
		$count_rslt_k = $a->display($query , array ( ':post_id' => $post_id, ':post_date' => $post_date ) );
		$count_rslt_k = $count_rslt_k[0];
			if ( $count_rslt_k['ROWS']>0) {
			} else {
			return 0;	
			}
			
		$query = "INSERT INTO `tech_teach`.`comment` (`post_id`, `user_id`, `comment`, `date`) VALUES ( :post_id, :user_id, :comment, :date);";
						
						$datr =  date("Y-m-d H:i:s") ;
						if ( $a->execute_data($query, array(':post_id' => $post_id,
						 ':user_id' => $sessionS, ':comment' => $comment, ':date' => $datr )  )) {
							$where = '`post_id` = '.$post_id.' AND user_id = "'.$sessionS.'" AND `comment` = "'.$comment.'" AND date = "'.$datr.'"';
							$ret87935635 = get_a_value_from_db ('`comment`' , '*' ,$where);
							$ret87935635 = $ret87935635[0];
							return  $ret87935635['comment_id'];
								
						} else {
							return 0;	
						}
		
	
		
	}
	
	
	
	function showDetaNotfWimg($val) {
		global $a;
		
		$returnString = '';
		$myimg =PATH.'/assets/images/defalut_f.jpg';
		$myname = 'un known';
		if (!ctype_digit($val['user_id'])) {
			$INRquery = "SELECT * FROM `teacher` WHERE user_name ='".$val['user_id']."' AND  delete_status=0 ";
			$INRresult_Comment = $a->display($INRquery);
			
			$errors = array_filter($INRresult_Comment);
			
			if (!empty($errors)) {
			$INRresult_Comment = $INRresult_Comment[0]; 
			$myimg = ''.PATH.'/teacher/images_/'.$INRresult_Comment['image'];
			$myname = $INRresult_Comment['fname'].' '.$INRresult_Comment['lname'];	 
			
			
			 }
		} else {
			$INRquery = "SELECT * FROM `student` WHERE user_name ='".$val['user_id']."'";
			 
			$INRresult_Comment = $a->display($INRquery);
			
			$errors = array_filter($INRresult_Comment);
			
			if (!empty($errors)) {
			$INRresult_Comment = $INRresult_Comment[0]; 
			$myimg = ''.PATH.'/student/images_/'.$INRresult_Comment['image'];
			$myname = $INRresult_Comment['fname'].' '.$INRresult_Comment['lname'];
			 }
		}
			
		return array(
					'name' => $myname,
					'image' => $myimg,
					'message' => $val['comment'] );
		
	
	
		
	}
	
	
	function uptudate_commnt($postId,  $data ) {
		$uptudateStringx = '';
		global $a;
		$query = "SELECT * ,(SELECT COUNT(*) FROM comment WHERE post_id = ".$postId." ) AS COUNT FROM `comment` WHERE post_id = ".$postId." ORDER BY `comment`.`date` ASC ";
		$result_ = $a->display($query);
		$jztNoOfCommts = $result_[0];
		$tempCount = $jztNoOfCommts['COUNT'];
		$ful_or_half ='';
		if($tempCount == $data) {
			$ty=4;
			$ful_or_half =' <a class="customAddCmntHr" countId="'.$ty.'">
                                        Hide previous comments
                                     </a>';
			} else {
				$ful_or_half =' <a class="customAddCmntHr" countId="'.$tempCount.'">
								View previous comments
							 </a>'	;
			}
		
								if($tempCount >= $data) {
		$uptudateStringx = '<div class="commentnoshowJu">';
								  $uptudateStringx = $uptudateStringx.' '.$data.' of '.$tempCount;
								   $uptudateStringx = $uptudateStringx.'</div>';
                            		
                             $uptudateStringx = $uptudateStringx.'<div class="moreComments">
                             	<div post_id="'.$postId.'">'.$ful_or_half.'</div>
                             </div>';
								}
		$uptudateStringx0 = $uptudateStringx;
		$uptudateString1 = '';
		foreach($result_ as $value) {
			if($tempCount <= $data) {
				
				$uptudateString1 = $uptudateString1.appentPackCommentdData($value);
			}
			$tempCount--;
		}
		return array('success'=>1,
					'data0' => $uptudateStringx0 ,
					'data1' => $uptudateString1 );	
		
	}
	
	
	
	function uptudate_comment_( $data, $output ) {
		//$top
		//SELECT MAX(column_name) FROM table_name;
		$uptudateStringx = '';
		//SELECT * FROM comment c LEFT JOIN post p on p.post_id = c.post_id WHERE c.comment_id in (SELECT MAX(c.comment_id ) FROM comment c LEFT JOIN post p on p.post_id = c.post_id WHERE p.delete = 0 )
		$selct_cwqe423ou422tnZ = get_a_value_from_db ('comment c LEFT JOIN post p on p.post_id = c.post_id ' , '*' ,' c.comment_id in (SELECT MAX(c.comment_id ) FROM comment c LEFT JOIN post p on p.post_id = c.post_id WHERE p.delete = 0 )');
		//isSee_post( $post )
		
		 $selct_cwqe423ou422tnZ = $selct_cwqe423ou422tnZ[0];
		 $newTot = $selct_cwqe423ou422tnZ['comment_id'];
		 session_start();
		if(!isSee_post( $selct_cwqe423ou422tnZ['post_id'] )) {
			return array('success'=>0,
				'data' => $uptudateStringx,
				'count' => $newTot
				 );	
		}
		
		if($selct_cwqe423ou422tnZ['post_id'] < $output ) {
			return array('success'=>0,
				'data' => $uptudateStringx,
				'count' => $newTot
				 );	
		}
			
			if($newTot == $data) {
				return array('success'=>0,
					'data' => $uptudateStringx,
					'count' => $newTot
					 );	
			} else {
				$array_deta = array();
				$new58674568476 = get_a_value_from_db ('`comment`' , ' * ' ,' comment_id > '.$data);
				foreach($new58674568476 as $value) {
					$uptudateStringx = $uptudateStringx.appentPackCommentdData ($value);
					array_push($array_deta , array('id'=> $value['post_id'],
								'value' => appentPackCommentdData ($value),
								'notification' => showDetaNotfWimg($value))
					 );	
				}
				
				return array('success'=>1,
					'data' => $array_deta,
					'count' => $newTot
					 );	
			}
		 return array('success'=>0,
					'data' => $uptudateStringx,
					'count' => $newTot
					 );	
		
	}
	
	
	
	function appentPackCommentdData($val) {
		
		global $a;
		
		$returnString = '';
		
		if (!ctype_digit($val['user_id'])) {
			$INRquery = "SELECT * FROM `teacher` WHERE user_name ='".$val['user_id']."' AND  delete_status=0 ";
			 
			$INRresult_Comment = $a->display($INRquery);
			
			$errors = array_filter($INRresult_Comment);
			
			if (!empty($errors)) {
			$INRresult_Comment = $INRresult_Comment[0]; 
			$myimg = ''.PATH.'/teacher/images_/'.$INRresult_Comment['image'];
			$myname = $INRresult_Comment['fname'].' '.$INRresult_Comment['lname'];	 
				 	 $returnString =  $returnString.'<div class="post-comment-container jzt_a_border" comment_id = "'.$val['comment_id'].'"><div class=" pull-left-child"><div class="post-comment-avatar-post" style="background:url('.$myimg.');"></div></div><div class="pull-right-comment"><div class="post-comment-name"><a href="">'.$myname.'</a></div><div class="post-comment-meta"><p> <time class="timeago" datetime="'.date("c", strtotime($val['date'])).'" ></time></p></div><div class="post-comment-description"><p>'.$val['comment'].'</p> </div></div></div>';
						 
				
			 }
		} else {
			$INRquery = "SELECT * FROM `student` WHERE user_name ='".$val['user_id']."'";
			 
			$INRresult_Comment = $a->display($INRquery);
			
			$errors = array_filter($INRresult_Comment);
			
			if (!empty($errors)) {
			$INRresult_Comment = $INRresult_Comment[0]; 
			$myimg = ''.PATH.'/student/images_/'.$INRresult_Comment['image'];
			$myname = $INRresult_Comment['fname'].' '.$INRresult_Comment['lname'];	 
				 	 $returnString =  $returnString.'<div class="post-comment-container jzt_a_border" comment_id = "'.$val['comment_id'].'"><div class=" pull-left-child"><div class="post-comment-avatar-post" style="background:url('.$myimg.');"></div></div><div class="pull-right-comment"><div class="post-comment-name"><a href="">'.$myname.'</a></div><div class="post-comment-meta"><p> <time class="timeago" datetime="'.date("c", strtotime($val['date'])).'" ></time></p></div><div class="post-comment-description"><p>'.$val['comment'].'</p> </div></div></div>';
						 
				
			 }
		}
			
		return $returnString;
		
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	function arrayTimeList ($Zaz, $ZdDate) {
	$ZX__ye = '';
	$ZX__mo = $ZX__ye;
	$ZX__da = $ZX__mo;
	$ZX__ho = $ZX__da;
	$ZX__mi = $ZX__ho;
	$ZX__se = $ZX__mi;
	$ZX__00 = $ZX__se;
	$ZoDate = new DateTime($ZdDate);
	$Zb = $ZoDate->format("Y-m-d H:i:s");
	$Zaz = new DateTime($Zaz);
	$Zaz = $Zaz->format("Y-m-d H:i:s");
	$Zdate1=date_create($Zaz);
	$Zdate2=date_create($Zb);
	$Zdiff=date_diff($Zdate1,$Zdate2);
	$Zmyy = $Zdiff->format("%Y");
	$Zmmm = $Zdiff->format("%M");
	$Zmdd = $Zdiff->format("%D");
	$Zmhh = $Zdiff->format("%H");
	$Zmmt = $Zdiff->format("%i");
	$Zmst = $Zdiff->format("%s");
	$ZpostTime = false;
	if ($Zmyy!=0) {
		$ZX__ye = ' '.$Zmyy.' years';
		$ZpostTime = true;
	}
	if ($Zmmm!=0) {
		$ZX__mo = ' '.$Zmmm.' months';
		$ZpostTime = true;
	}
	if ($Zmdd!=0) {
		$ZX__da = ' '.$Zmdd.' days';
		$ZpostTime = true;
	}
	if ($Zmhh!=0) {
		$ZX__ho = ' '.$Zmhh.' hours';
		$ZpostTime = true;
	}
	if ($Zmmt!=0) {
		$ZX__mi = ' '.$Zmmt.' minutes';
		$ZpostTime = true;
	}
	if ($Zmst!=0) {
		$ZX__se = ' '.$Zmst.' seconds';
		$ZpostTime = true;
	}
	if($ZpostTime) {
		$ZX__00 = ' ago';
	} else {
		$ZX__00 = ' now';/**/
	} 
	$Zxarray = array (	
						':ye' => $ZX__ye,
						':mo' => $ZX__mo,
						':da' => $ZX__da,
						':ho' => $ZX__ho,
						':mi' => $ZX__mi,
						':se' => $ZX__se,
						':z' =>  $ZX__00
						);
						
	
	return $Zxarray;
	
}
	
	
	
	
	
	
	
	
	
	
	
function add_book( $text_name, $author, $edition, $section, $description, $noc, $image) {
	
	
		global $a;	
	$query = "SELECT * FROM  `book` WHERE name = :name AND author = :author AND edition = :edition";
			if ( !$a->display($query , array ( ':name' => $text_name, ':author' => $author, ':edition' => $edition ) )) {
				
		
						$datr = date("Y-m-d H:i:s");
		$query = "INSERT INTO `tech_teach`.`book` (`name`, `author`, `edition`, `description`, `section`, `noc`, `available_copies`, `image`, `date`) VALUES ( :name, :author, :edition, :description, :section, :noc, :available_copies, :image, :date);";
						
						if ($a->execute_data($query, array(':name' => $text_name, ':author' => $author, ':edition' => $edition, ':description' => $description, ':section' => $section, ':noc' => $noc, ':available_copies' => $noc, ':image' => $image, ':date' => $datr))) {
							
							return 1;
								
						} else {
							return 0;	
						}
					
				
			} else {
				
				return -1;
			}					
		
}


function add_book_section( $text_name, $description ) {
	global $a;	
	$query = "SELECT * FROM  `book_section` WHERE section = :section ";
			if ( !$a->display($query , array ( ':section' => $text_name ) )) {
				
		
						$datr = date("Y-m-d H:i:s");
		$query = "INSERT INTO `tech_teach`.`book_section` (`section`, `description`, `date`) VALUES (:section, :description, :date);";
						
						if ($a->execute_data($query, array(':section' => $text_name, ':description' => $description, ':date' => $datr))) {
							
							return 1;
								
						} else {
							return 0;	
						}
					
				
			} else {
				
				return -1;
			}					
		
	
}




function gettextnamecheck( $text_name) {
	global $a;	
	$query = "SELECT * FROM  `book_section` WHERE section = :section ";
			if ( $a->display($query , array ( ':section' => $text_name ) )) {
				return 1;
					
				
			} else {
				
				return 0;
			}					
			
}



function update_teacher($fnname ,$lnname ,$addname, $mobile) {
		global $a;
		
		
			session_start();
			
			$id = explode('-',$_SESSION['te'])[1];
			
			$query = "UPDATE `teacher` SET `fname` = :f_tfname, `lname` = :f_tlname,`address`=:f_tadname, `mobile` = :f_tmobile where `user_name` = :username";
					
			if ($a->execute_data($query, array(
											':f_tfname' => $fnname , 
											':f_tlname' => $lnname, 
											':f_tadname' =>$addname,
											':f_tmobile' => $mobile, 
											':username' => $id
											) 
							)){	
				return 1;
					
			} else {
				return 0;	
			}
	}
	
	

	
	
	
function updateMe ($table, $xarray, $where ) {
	//foreach($xarray as $k=>$value) { 	
		global $a;
		
		
			
			$query = "UPDATE ".$table." SET ";
			$bzo = 0;
			foreach($xarray as $k=>$value) { 
				if ( $bzo != 0 ) {
					$query = $query.", ";
				}
				$query = $query."`".$k."` = :update_item_".$bzo ;
				$xarray[':update_item_'.$bzo] = $xarray[$k];
				unset($xarray[$k]); 
				$bzo++;
			}
			$query = $query." WHERE ".$where;
			if ($a->execute_data($query, $xarray)){	
				return 1;
					
			} else {
				return 0;	
			}
	
	
	
	
}

function setPasswrd( $cpassword,$password) {
	
	session_start();
	$id = explode('-',$_SESSION['te'])[1];
	
	$where =  '  `user_name` ="'.$id.'" AND  delete_status=0 ';
	$op = get_a_value_from_db('teacher' , '*' ,$where);
	$op = $op[0];
	$Npassword = $op['password'];
	if( 0 != strcmp( $Npassword, $cpassword)) {
				return -1;
			}
	
	$xarray = array (
						'password' => $password
						);
			 
	$flag = updateMe('teacher', $xarray, '`user_name` ="'.$id.'" AND  delete_status=0 ' );
	return $flag;

	
}

function  add_a_subject($name ,$department ,$description) {
	global $a;
		
		$query = "SELECT * FROM `subject` WHERE department_id = :department_id AND sub_name = :sub_name ";
			if ( !$a->display($query , array ( ':department_id' => $department, ':sub_name' => $name  ) )) {
				
						$query = "INSERT INTO `tech_teach`.`subject` (`department_id`, `sub_name`, `description`, `date`) VALUES (:department_id1, :sub_name1, :description1, :date)";
												
						if ( $a->execute_data($query, array(':department_id1' => $department ,':sub_name1' => $name,':description1' => $description , ':date' => date("Y-m-d H:i:s") )  )) {
							$pass = get_a_value_from_db ('subject' , '*' ,' department_id = '.$department.' AND sub_name = "'.$name .'"');
							$pass = $pass[0];
								return $pass['sub_name'];
								
						} else {
							return 0;	
						}
					 
				
			} else {
				
						return -1;
			}
			
	
}
	
	
function add_hod($dep, $tea ) {
		global $a;
		
		$query = "UPDATE `tech_teach`.`department` SET `hod` = :hid, `date` = :date WHERE did = :did ;";
						
						if ($a->execute_data($query, array(':did' => $dep, ':hid' => $tea.'', ':date' =>  date("Y-m-d H:i:s")))) {
							
							return 1;
								
						} else {
							return 0;	
						}	
	
}




function insertInToComm ($table, $xarray ) {
	//foreach($xarray as $k=>$value) { 	
		global $a;
		
		
			
			$query = "INSERT INTO ".$table." ( ";
			$bzo = 0;
			foreach($xarray as $k=>$value) { 
				if ( $bzo != 0 ) {
					$query = $query.", ";
				}
				$query = $query." `".$k."`";
				$bzo++;
			}
			$query = $query." ) VALUES ( ";
			
			$bzo = 0;
			foreach($xarray as $k=>$value) { 
				if ( $bzo != 0 ) {
					$query = $query.", ";
				}
				
				$query = $query." :update_item_".$bzo ;
				$xarray[':update_item_'.$bzo] = $xarray[$k];
				unset($xarray[$k]); 
				$bzo++;
			}
			$query = $query." ) "; 
			
			
			if ($a->execute_data($query, $xarray)){	
				return 1;
					
			} else {
				return 0;	
			}
			
	
	
	
	
}

function get_Exam_of_Sub($sid) {
	
	return get_a_value_from_db (' exam' , '*' ,'subject = '.$sid);	
}
function view_subjects($cid, $tid ) {
	
		$table = ' class_subject cs LEFT JOIN subject s on cs.sid=s.sub_id ';
		$column = '*';
		$where = ' cs.tid = '.$tid.' AND cs.cid ='.$cid.' ';
		$ret = get_a_value_from_db ($table , $column ,$where);
	return 	$ret;
}


function set_exam($class_sub, $totalm, $series, $description) {
	
	$cvu = 0;
	$op = get_a_value_from_db('exam' , '*' ,' subject = '.$class_sub.' AND series = "'.$series.'"');
	foreach($op as $va) {
		$cvu++;
	}
	if($cvu>0) {
		return -1;
	}


	$table = 'exam';
		$xarray = array (
						'subject' => $class_sub,
						'total' => $totalm,
						'series' => $series,
						'description' => $description,
						'date' => date("Y-m-d H:i:s")
						
						);
	
		$flag = insertInToComm ($table, $xarray );
	return $flag;
}


function  get_Student_of_Sub($sid) {
	$op = get_a_value_from_db('class_subject' , '*' ,' sid = '.$sid);
	$op = $op[0];
	
	$flag = get_a_value_from_db('student' , '*' ,' class = '.$op['cid']);
	return $flag;
}

function get_uniq_Stud($sid) {
	$op = get_a_value_from_db('student' , '*' ,' user_name = '.$sid);	
	$op = $op[0];
	$op['image'] = ''.PATH.'/student/images_/'.$op['image'];
	return $op;
}

function checkistrue_markOl($xamid, $studid) {
	$op = get_a_value_from_db('mark' , '*' ,' exam_id = '.$xamid.' AND stud_id = "'.$studid.'"');
	return $op;
}


function update_mark_password($xamid, $studid,$makr, $descriptions) {
	$cvu = 0;
	try {
	$op = get_a_value_from_db('mark' , '*' ,' exam_id = '.$xamid.' AND stud_id = '.$studid);
	foreach($op as $va) {
		$cvu++;
	}
	if($cvu>0) {
		
		$xarrasy = array (
						'mark' => $makr,
						'description' => $descriptions
						);
			 
	$flag = updateMe('mark', $xarrasy, ' exam_id = '.$xamid.' AND stud_id = '.$studid);
	return $flag;
		
	}
	}catch (Exception $e){return -1;}
	
	
	$table = 'mark';
		$xarray = array (
						'exam_id' => $xamid,
						'stud_id' => $studid,
						'mark' => $makr,
						'description' => $descriptions,
						'date' => date("Y-m-d H:i:s")
						
						);
	
		$flag = insertInToComm ($table, $xarray );
	return $flag;	
}

function checkistrue_teach($fdp) {
		$returnhx =false;
		$table = " class_subject ";
		$column = "*";
		$where = " sid =".$fdp."";	
		$flag = get_a_value_from_db($table, $column, $where );	
		$flag = $flag[0];
		
		session_start();
		$sessionS = $_SESSION['te'];
		$sessionS = substr( $sessionS ,3);
		
		$table = " teacher ";
		$column = "*";
		$where = " user_name ='".$sessionS ."' AND  delete_status=0 ";	
		$flagz = get_a_value_from_db($table, $column, $where );	
		$flagz = $flagz[0];
		
		if($flag['tid'] == $flagz['id']) {
			$returnhx = true;	
		} else {
			$returnhx = false;	
		}
		
		return $returnhx;
}


function  update_teacher_image($img) {
	session_start();
		$sessionS = $_SESSION['te'];
		$id = substr( $sessionS ,3);
	
	$xarray = array (
						'image' => $img
						);
			 
	$flag = updateMe('teacher', $xarray, '`user_name` ="'.$id.'" AND  delete_status=0 ' );
	return $flag;	
	
}



function  update_sudent_image($img) {
	session_start();
		$sessionS = $_SESSION['st'];
		$id = substr( $sessionS ,3);
	
	$xarray = array (
						'image' => $img
						);
			 
	$flag = updateMe('student', $xarray, '`user_name` ="'.$id.'"' );
	return $flag;	
	
}

/*********************************com func 4 retrn cls***************************************************/
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

/****************************************************************************************/


function  update_classChrg_fot_tech($class_id, $Teacher_id) {
	
	//return $class_id.'__'.$Teacher_id;
	
	if(strlen( $Teacher_id )<1) {
		
		$xarray = array (
						'class_id' => 0
						);
			 
	$flag = updateMe('teacher', $xarray, '`class_id` ="'.$class_id.'" AND  delete_status=0 ' );
	return $flag;	
		
		
	} else {
		
	$xarray = array (
					'class_id' => $class_id
					);
			 
	$flag = updateMe('teacher', $xarray, '`user_name` ="'.$Teacher_id.'" AND  delete_status=0 ' );
	return $flag;
		}
	}
	
	
	function add_or_update_parent($st_id , $name, $designation, $mobile, $description, $l_no) {
		
		//return ($st_id .$name.$designation.$mobile.$description.$l_no);
		$temcount = 0;
		$table = 'parent';
		$column = '*';
		$where = ' st_id = '.$st_id;
		$ret = get_a_value_from_db ($table , $column ,$where);
		foreach($ret as $value) {
			$temcount =  $value['id'] ;
		}
		
		if($temcount == 0) {
			$table = 'parent';
		$xarray = array (
						'st_id' => $st_id,
						'name' => $name,
						'designation' => $designation,
						'mobile' => $mobile,
						'description' => $description,
						'l_no' => $l_no,
						'date' => date("Y-m-d H:i:s")
						
						);
	
		$flag = insertInToComm ($table, $xarray );
		return $flag ;
		} else {
			$xarray = array (
						'name' => $name,
						'designation' => $designation,
						'mobile' => $mobile,
						'description' => $description,
						'l_no' => $l_no,
						'date' => date("Y-m-d H:i:s")
						
						);
			 
	$flag = updateMe('parent', $xarray, '`id` ='.$temcount.'' );
	return $flag;
			
		}
		
	}



function set_assignment($class_sub, $topic, $sub_date, $description) {
	
	$sub_date = date('Y-m-d H:i:s', strtotime($sub_date)) ;
	 
	$cvu = 0;
	$op = get_a_value_from_db('assignment' , '*' ,' subject = '.$class_sub.' AND topic = "'.$topic.'" AND submission_date = "'.$sub_date.'"');
	if(!empty($op)) {
	foreach($op as $va) {
		$cvu++;
	}
	if($cvu>0) {
		return -1;
	}
	}

	$table = 'assignment';
		$xarray = array (
						'subject' => $class_sub,
						'topic' => $topic,
						'submission_date' => $sub_date,
						'description' => $description,
						'date' => date("Y-m-d H:i:s")
						
						);
	
		$flag = insertInToComm ($table, $xarray );
	return $flag;
}

function se_assg_mrk($st_id , $st_mrk, $ref_id, $status) {
		$temcount = 0;
		$table = 'mark_percentage';
		$column = '*';
		$where = ' stud_id = '.$st_id.' AND ref_id = '.$ref_id.' AND status = "'.$status.'"';
		$ret = get_a_value_from_db ($table , $column ,$where);
		if(!empty($ret)) {
		foreach($ret as $value) {
			$temcount =  $value['id'] ;
		}
		}
		if($temcount == 0) {
			$table = 'mark_percentage';
		$xarray = array (
						'status' => $status,
						'ref_id' => $ref_id,
						'stud_id' => $st_id,
						'percentage' => $st_mrk,
						'date' => date("Y-m-d H:i:s")
						
						);
		$flag = insertInToComm ($table, $xarray );
		return $flag ;
		} else {
			$xarray = array (
						'percentage' => $st_mrk,
						'date' => date("Y-m-d H:i:s")
						);
	$flag = updateMe('mark_percentage', $xarray, '`id` ='.$temcount.'' );
	return $flag;
			
		}
	
}


function get_a_user ($table , $column ,$where_a, $sess) {
	$rsl = NULL;
	$flag_a = NULL;
	$flag_b = NULL;
	$flag_c = NULL;
		if($sess == 'te') {
		$where = 'user_name = "'.$where_a.'" AND  delete_status=0 ';
				$table = 'teacher';
		$flag_a = get_a_value_from_db ($table , $column ,$where);
		$rsl = $flag_a[0];
		$flag_b = returnClaseeForMe($rsl['class_id']);
		$flag_c = get_a_value_from_db (' department ' , '*' ,' did = '.$rsl['department']);
			} else if($sess == 'st') {
		$where = 'user_name  = "'.$where_a.'" ';
				$table = 'student';
		$flag_a = get_a_value_from_db ($table , $column ,$where);
		$rsl = $flag_a[0];
		$flag_b = returnClaseeForMe ($rsl['class']);
		$xc =  get_a_value_from_db ('sub_class' , '*', ' class_id = '.$rsl['class']);
		$xc = $xc[0];
		$xc =  get_a_value_from_db ('class' , '*', ' id = '.$xc['cid']);
		$xc = $xc[0];
		$flag_c = get_a_value_from_db (' department ' , '*' ,' did = '.$xc['did']);
		
			}
			
		return(array('a1'=>$flag_a ,
					'a2'=>$flag_b ,
					'a3' => $flag_c
					));	
		
}

function global_updat_a_single_value ($table , $id ,$zero, $one) {
	//return 	$table.'----'.$id .'----'.$zero.'----'.$one;
	$st089 = '';
	$flag_001 = get_a_value_from_db ($table , '*' ,' user_name = "'.$id.'"');
	  $flag_001 =$flag_001[0];
        foreach ($flag_001 as $col => $val) {
			$val = str_replace(" ", "", trim($val));
			$zero = str_replace(" ", "", trim($zero));
			if($val == $zero ) {
				
				if (preg_match("/^-?[1-9][0-9]*$/D", $col)) {
					
					} else {
						$st089 = $col;;
					}
			}	
        }
    $flag = NULL;
	if(strlen($st089) >0) {
		$xarray = array (
						$st089 => $one
						);
			 
	$flag = updateMe($table, $xarray, '`user_name` ="'.$id.'"' );
	
	}
	return $flag;
}

function ad_a_alert ($subject,$description,$valid ,$tofor ,$department ,$sta ,$type) {
	$table = 'alert';
	$flag =  NULL;
		$date = date("Y-m-d H:i:s");

	
	$arrlength=count($tofor);
	
//if($arrlength>1) 
	if($arrlength>1 && $tofor[0] == $tofor[1]) {
		$towhome = '';
		switch ($tofor[0]) {
			case 9:
				$towhome = 'te';			
			break;
			case 8:
				$towhome = 'st';	// full cls of stud		
			break;
			case 7:
				$towhome = 'cl';	// full clss in a dprtmtn		
			break;
			default:
				if($type == 2) {
					$towhome = $tofor[0];
				}
				if($type == 3) {
					$towhome = $tofor[0];
				}

			
			
		}
		
		$temcount = 0;
		$column = '*';
		$where = ' `to` = "'.$towhome.'" AND department = '.$department.' AND subject = "'.$subject.'"  AND valid = "'.$valid.'" AND status = 1 AND type = '.$type.'';
		$ret = get_a_value_from_db ($table , $column ,$where);
		if(!empty($ret)) {
		foreach($ret as $value) {
			$temcount ++;
		}
		if($temcount >0) {
			return -1;
		}
		}
	
		$xarray = array (
						'to' => $towhome,
						'department' => $department,
						'type' => $type,
						'subject' => $subject,
						'description' => $description,
						'valid' => $valid,
						'status' => '1',
						'date' => date("Y-m-d H:i:s")
						
						);
	
		$flag = insertInToComm ($table, $xarray );
		
		
	} else { 	
	
		$temcount = 0;
		$column = '*';
		$where = ' `to` = "'.$sta.'" AND department = '.$department.' AND subject = "'.$subject.'"  AND valid = "'.$valid.'" AND status = 1 AND type = '.$type.'';
		
		$ret = get_a_value_from_db ($table , $column ,$where);
		if(!empty($ret)) {
		foreach($ret as $value) {
			$temcount ++;
		}
		}
		if($temcount >0) {
			$flag -1;
		} else {
		
		$xarray = array (
						'to' => $sta,
						'department' => $department,
						'type' => $type,
						'subject' => $subject,
						'description' => $description,
						'valid' => $valid,
						'status' => '1',
						'date' => $date
						
						);
	
		$flag = insertInToComm ($table, $xarray );
		}
		$column = '*';
		$where = ' `to` = "'.$sta.'" AND department = '.$department.' AND subject = "'.$subject.'"  AND valid = "'.$valid.'" AND status = 1  AND date = "'.$date.'" AND type = '.$type.'';
		$ret = get_a_value_from_db ($table , $column ,$where);
		if(!empty($ret)) {
		$ret = $ret[0];
		$i_id = $ret['id'];
	for($x=0;$x<$arrlength;$x++) {
			if(strlen($tofor[$x])>0) {
				$xarray = array (
							'alert' => $i_id,
							'target' => $tofor[$x],
							'date' => $date
							
							);
		
				$flag = insertInToComm ('alert_to', $xarray );
				
			}
			  
	  }
		}
	
	}
		
		if($flag == 1) {
			$column = '*';
		$where = ' date = "'.$date.'" AND type = '.$type.'';
		$ret_r = get_a_value_from_db ($table , $column ,$where);
		return (array('success'=> $flag,
								'data' =>$ret_r
								));
			
		} else {
			return (array('success'=> $flag,
								'data' => ''
								));
		}
}

function sendMsgFun($mobile, $us_id) {
	$dola_oip = '';
	$flags = 0;
	
	$flafg = get_a_value_from_db ('teacher' , '*' ,' delete_status=0 AND id = '.$us_id);
			$flafg = $flafg[0];
			$sendMsg = "welcome to TechTeach.com
			use ".$flafg['code']." as TechTeach account security code";
	$status = sendSms( $mobile, $sendMsg );
		//$status == 'success'
		if( $status == 'success' ) {
			$dola_oip = 'sent a text message with 6 digit code
Please enter it below';
$flags = 1;
		} else {
			$dola_oip =  'An Error Occured.!!....'.$status;
$flags = 0;			
		}
	
	
	return (array('success'=> $flags,
								'data' => $dola_oip
								));
}


function sendSms( $no , $msg ) {
		
		return file_get_contents( "http://aastarthemes.com/smsgateway/sendsms.php?action=send_sms&no=".$no."&msg=".rawurlencode($msg)."&key=9Y0Y2lDpMs1I9PuU4z8OuvhYi" );
		
	}
	
function delete_a_value_from_db ( $table , $where) {
	global $a;
		$result = array();
		$query = 'DELETE FROM '.$table.' where '.$where;
		
		$result = $a->display($query) ;
		//echo $result[0] ;
		
		return $result ;
	////////////////////////////////////////////////////////////////////////////////////////////////////////////delete a calss sub teachr
}
	
	
	
	/******************************************** delete a file*********************************/

function delete_a_file_from_dir ($src){
	
	$targetPath_new = basename($src);
	$path = $_SERVER['DOCUMENT_ROOT'].'tech_teach/uploads/'.$targetPath_new;
	if (file_exists($path)) {
		if(unlink($path)) {
		return 1;
		} else {
			return 0;
		}
	}
}
	



/******************************************** delete a file*********************************/
/////////////////////////////////////////////////////////////////////////////////////////
/* function isSee_post( $post ) {
	global $a;
	$varreturn = false;
	$query = "SELECT * FROM post WHERE `post`.`post_id` =".$post;
		$pstDeta = $a->display($query);
		$pstDeta =$pstDeta[0];
		if ($pstDeta['type'] == 0) {
			return true;
		} else {
		
			$sessionS = $_SESSION['te'];
			$sessionS = substr( $sessionS ,3);
			
	//echo $pstDeta.'-'.$sessionS;
			
			if( $pstDeta['te_id'] == $sessionS) {
				return true;
			}  else if ($pstDeta['type'] == 1) {
				return false;
			} else {
				
					$query = "SELECT * FROM `teacher` WHERE user_name ='".$sessionS."'";
						$postTeach = $a->display($query);
						$postTeach =$postTeach[0];
						
				
					$query = "SELECT * FROM `teacher` WHERE user_name ='".$pstDeta['te_id']."'";
						$post_int = $a->display($query);
						$post_int =$post_int[0];
						
						if($pstDeta['type'] == 2) {
							if ($postTeach['department'] == $post_int['department']) {
								return true;	
							}
						}
				
				
			}

	
		}
	
	
	return $varreturn;
} */
	
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
				
				
						$query = "SELECT * FROM `teacher` WHERE user_name ='".$sessionS."'";
						$postTeach = $a->display($query);
						$postTeach =$postTeach[0];
						$uclass_id = $postTeach['class_id'];
				
				$pclass_id = '';
				if (!ctype_digit($pstDeta['te_id'])) {
						$query = "SELECT * FROM `teacher` WHERE user_name ='".$pstDeta['te_id']."' AND  delete_status=0 ";
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
				
					$query = "SELECT * FROM `teacher` WHERE user_name ='".$sessionS."' AND  delete_status=0 ";
						$postTeach = $a->display($query);
						$postTeach =$postTeach[0];
						$udpt = $postTeach['department'];
						
						$pdpt = '';
						if (!ctype_digit($pstDeta['te_id'])) {
								$query = "SELECT * FROM `teacher` WHERE user_name ='".$pstDeta['te_id']."' AND  delete_status=0 ";
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
						$query = "SELECT * FROM `teacher` WHERE user_name ='".$pstDeta['te_id']."' AND  delete_status=0 ";
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
								$query = "SELECT * FROM `teacher` WHERE user_name ='".$pstDeta['te_id']."' AND  delete_status=0 ";
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

	/////////////////////////////////////////////////////////////////////////////




function add_aqstn_nw($qstn, $sessi){
	$cvu = 0;
	$op = get_a_value_from_db('question' , '*' ,' admin = "'.$sessi.'" AND subject = "'.$qstn.'" ');
	if(!empty($op)) {
	foreach($op as $va) {
		$cvu++;
	}
	if($cvu>0) {
		return -1;
	}
	}
	$date = date("Y-m-d H:i:s");

	$table = 'question';
		$xarray = array (
						'admin' => $sessi,
						'subject' => $qstn,
						'date' => $date
						
						);
	
		$flag = insertInToComm ($table, $xarray );
		
		if($flag ==1 ) {
			$op = get_a_value_from_db('question' , '*' ,' admin = "'.$sessi.'" AND subject = "'.$qstn.'" AND date = "'.$date.'"');
			if(!empty($op)) {
				$op = $op[0];
			}
		}
	return $op['id'];
}


function uptudate_qstn( $data ) {
		$uptudateStringx = '';
		//$qw = "SELECT COUNT(*) AS total FROM `post`";
	 $selct_cwqe423ou422tnZ = get_a_value_from_db ('`question`' , ' COUNT(*) AS total ' ,'1=1');
	 $selct_cwqe423ou422tnZ = $selct_cwqe423ou422tnZ[0];
	 $newTot = $selct_cwqe423ou422tnZ['total'];
		
		if($newTot == $data) {
		return array('success'=>0,
					'data' => $uptudateStringx
					 );	
		}
		
		global $a;
		$query = "SELECT * FROM question ORDER BY `question`.`date` DESC LIMIT ".($newTot - $data);
		$result_ = $a->display($query);
		
		session_start();
		$array_deta232 = array ();
		foreach($result_ as $value) {
			//$uptudateStringx = $uptudateStringx.appentPackQuestionData($value);
			array_push($array_deta232 , array('id'=> $value['id'] ,
								'value' => $value
								 ));	
		}
		return array('success'=>1,
					'data' => $array_deta232,
					'count' => $newTot
					 );	
	}
	
	
	function uptudate_replay($q_id, $my_qstnis, $sessi) {
		$cvu = 0;
	$op = get_a_value_from_db('q_replay' , '*' ,' r_admin = "'.$sessi.'" AND replay = "'.$my_qstnis.'" AND question= '.$q_id);
	if(!empty($op)) {
	foreach($op as $va) {
		$cvu++;
	}
	if($cvu>0) {
		return -1;
	}
	}
	$date = date("Y-m-d H:i:s");

	$table = 'q_replay';
		$xarray = array (
						'question' => $q_id,
						'r_admin' => $sessi,
						'replay' => $my_qstnis,
						'date' => $date
						);
	
		$flag = insertInToComm ($table, $xarray );
		
		if($flag ==1 ) {
			$op = get_a_value_from_db('q_replay' , '*' ,' r_admin = "'.$sessi.'" AND replay = "'.$my_qstnis.'" AND question= '.$q_id.' AND date = "'.$date.'"');
			if(!empty($op)) {
				$op = $op[0];
			}
		}
	return $op['id'];
	
	
		
	}
	
	
	function add_to_fav_($qstn_id, $sessi) {
		global $a;
				$cvu = 0;
				$op = get_a_value_from_db('favourite_question' , '*' ,' admin = "'.$sessi.'" AND question = '.$qstn_id);
				if(!empty($op)) {
					foreach($op as $va) {
						$cvu++;
					}
					
				}
		if($cvu>0) {
					$query = 'DELETE FROM favourite_question  WHERE admin = "'.$sessi.'" AND question = '.$qstn_id;
					$result_view_base = $a->display($query);
					
					return $result_view_base;
				} else {
						$table = 'favourite_question';
						$xarray = array (
										'admin' => $sessi,
										'question' => $qstn_id,
										'date' => date("Y-m-d H:i:s")
										);
					
						$flag = insertInToComm ($table, $xarray );
						
						return $flag;
					
				}
				
				return 0;
				
		
	}
	
	function like_dislik_replay_($qstn, $status, $sessi) {
		
		global $a;
				$cvu = 0;
				$my_satus =0;
				$unQ_id = 0;
				$op = get_a_value_from_db('replay_like' , '*' ,' admin = "'.$sessi.'" AND q_replay = '.$qstn);
				if(!empty($op)) {
					foreach($op as $va) {
						$cvu++;
						$my_satus = $va['status'];
						$unQ_id = $va['id'];
					}
					
				}
		if($cvu>0) {
						
					$xarray = array (
										'status' => $status
										);
							 
					$flag = updateMe('replay_like', $xarray, '`id` = '.$unQ_id);
	
				} else {
						$table = 'replay_like';
						$xarray = array (
										'admin' => $sessi,
										'q_replay' => $qstn,
										'status' => $status,
										'date' => date("Y-m-d H:i:s")
										);
					
						$flag = insertInToComm ($table, $xarray );
						
					
				}
				
				$countp = 0;
				$countm = 0;
				//SELECT COUNT(*) AS count FROM `replay_like` WHERE status = 1 AND q_replay = 5
				$array_X = get_a_value_from_db('replay_like' , ' COUNT(*) AS count ' ,' status = 1 AND q_replay ='.$qstn);
				$array_X =$array_X[0];
				$countp = (int)$array_X['count'];
				
				
				
				$array_X = get_a_value_from_db('replay_like' , ' COUNT(*) AS count ' ,' status = 0 AND q_replay ='.$qstn);
				
				$array_X =$array_X[0];
				$countm = (int)$array_X['count'];
				
				$coun = $countp - $countm;
				
				return $coun;
				
		
		
	}
	
	
	function like_dislik_replay_onlyCou($qstn) {
			$countp = 0;
				$countm = 0;
				//SELECT COUNT(*) AS count FROM `replay_like` WHERE status = 1 AND q_replay = 5
				$array_X = get_a_value_from_db('replay_like' , ' COUNT(*) AS count ' ,' status = 1 AND q_replay ='.$qstn);
				$array_X =$array_X[0];
				$countp = (int)$array_X['count'];
				
				
				
				$array_X = get_a_value_from_db('replay_like' , ' COUNT(*) AS count ' ,' status = 0 AND q_replay ='.$qstn);
				
				$array_X =$array_X[0];
				$countm = (int)$array_X['count'];
				
				$coun = $countp - $countm;
				
				return $coun;
				
		
	}
	
	
	
	//($subject,$description,$valid ,$tofor ,$department ,$sta ,$type) {
	function  nake_a_newVido_call($user_name, $tofor , $key, $description, $sta, $type) {
	/*		return array ('a1' => $user_name,
					'a2' => $tofor,
					'a3' => $key.$description.$sta.$type);
		*/		

	$date = date("Y-m-d H:i:s");					
	$table = 'tech_teach.call';
	$flag =  NULL;
		 
	$arrlength=count($tofor);
	
if($arrlength>1) 
	if($tofor[0] == $tofor[1]) {
		$towhome = '';
		switch ($tofor[0]) {
			case 9:
				$towhome = 'te';			
			break;
			case 8:
				$towhome = 'st';	// full cls of stud		
			break;
			case 7:
				$towhome = 'cl';	// full clss in a dprtmtn		
			break;
			default:
				if($type == 2) {
					$towhome = $tofor[0];
				}
				if($type == 3) {
					$towhome = $tofor[0];
				}

			
			
		}
		
		$temcount = 0;
		$column = '*';
		$where = '  `call`.`to` = "'.$towhome.'" AND owner= "'.$user_name.'" AND call_id = "'.$key.'" AND status = 1 AND type = '.$type.'';
		$ret = get_a_value_from_db ($table , $column ,$where);
		if(!empty($ret)) {
		foreach($ret as $value) {
			$temcount ++;
		}
		if($temcount >0) {
			return -1;
		}
		}
	
		$xarray = array (
						'to' => $towhome,
						'owner' => $user_name,
						'type' => $type,
						'call_id' => $key,
						'description' => $description,
						'status' => '1',
						'date' => date("Y-m-d H:i:s")
						
						);
	
		$flag = insertInToComm ($table, $xarray );
		
		
	} else { 	
	
		$temcount = 0;
		$column = '*';
		$where = ' `call`.`to` = "'.$sta.'" AND owner = "'.$user_name.'" AND call_id = "'.$key.'" AND status = 1 AND type = '.$type.'';
		
		$ret = get_a_value_from_db ($table , $column ,$where);
		
		
		if(!empty($ret)) {
		foreach($ret as $value) {
			$temcount ++;
		}
		}
		if($temcount >0) {
			$flag -1;
		} else {
			
		
		$xarray = array (
						'to' => $sta,
						'owner' => $user_name,
						'type' => $type,
						'call_id' => $key,
						'description' => $description,
						'status' => '1',
						'date' => $date
						
						);
	
		$flag = insertInToComm ($table, $xarray );
		}
		$column = '*';
		$where = '  `call`.`to`  = "'.$sta.'" AND owner = "'.$user_name.'" AND call_id = "'.$key.'" AND status = 1  AND date = "'.$date.'" AND type = '.$type.'';
		///$where = ' `to` = "'.$towhome.'" AND $owner = "'.$user_name.'" AND call_id = "'.$key.'" AND status = 1 AND type = '.$type.'';
		
		$ret = get_a_value_from_db ($table , $column ,$where);
		
		if(!empty($ret)) {
		$ret = $ret[0];
		$i_id = $ret['id'];
	for($x=0;$x<$arrlength;$x++) {
			if(strlen($tofor[$x])>0) {
				$xarray = array (
							'call' => $i_id,
							'target' => $tofor[$x],
							'date' => $date
							
							);
		
				$flag = insertInToComm ('call_to', $xarray );
				
			}
			  
	  }
		}
	
	}
		
		if($flag == 1) {
			$column = '*';
		$where = ' date = "'.$date.'" AND type = '.$type.'';
		$ret_r = get_a_value_from_db ($table , $column ,$where);
		return (array('success'=> $flag,
								'data' =>$ret_r
								));
			
		} else {
			return (array('success'=> $flag,
								'data' => ''
								));
		}
		
		
						
					///////////////////////////////////////////////////////////////////////////////////////////
		/*$table = 'tech_teach.call';
						$xarray = array (
										'owner' => $user_name,
										'to' => $to,
										'call_id' => $key,
										'description' => $to,
										'status' => 1,
										'date' => date("Y-m-d H:i:s")
										);
					
						$flag = insertInToComm ($table, $xarray );
						
						return $flag; */
	}
	
	function end_a_newVido_call($user_name, $key ) { 
	$flag = 0;
	if (!ctype_digit($user_name)) {
		$xarray = array (
						'status' => 0
						);
			 
	$flag = updateMe('tech_teach.call', $xarray, ' `call`.`owner`="'.$user_name.'"' );
	}
	return $flag;
	
	}
	
	
	
	function checkVideoCall_($user_name ) {
		
		$returnArayy = array( );
		
		$op = get_a_value_from_db('tech_teach.call' , '*' ,' `call`.`status` = 1');
		if(!empty($op)) {
			foreach($op as $va) {
				if (!ctype_digit($user_name)) {
					
					$currentUser = get_a_value_from_db('teacher' , '*' ,'user_name = "'.$user_name.'" AND  delete_status=0 ');
					if(!empty($currentUser)) {
						$currentUser = $currentUser[0];
						$currentUser_id = $currentUser['id'];
						if (!ctype_digit($va['owner'])) {
							$where = ' delete_status=0  AND user_name = "'.$va['owner'].'" AND department='.$currentUser['department'];
							$fromTableUser = get_a_value_from_db('teacher' , '*' ,$where );
							if( !empty($fromTableUser)) {
								// check for match same dp
														array_push($returnArayy , array('id'=> sameDpokayb($currentUser_id, $va, $currentUser) ,
							'data' => $va
				 ));
	
								 
							}//
							
						} 
					
					
						
					}
					
				} else {
					
					
					$currentUser = get_a_value_from_db('student' , '*' ,'user_name = "'.$user_name.'"');
					if(!empty($currentUser)) {
						$currentUser = $currentUser[0];
						$currentUser_id = $currentUser['id'];
						if (!ctype_digit($va['owner'])) {
							
								$table = 'sub_class s  LEFT JOIN class c on c.id=s.cid ';
								$where = 's.class_id ='.$currentUser['class'];
								$fromTableUser = get_a_value_from_db($table , '*' ,$where );
								
								if(!empty($fromTableUser)) {
									$fromTableUser = $fromTableUser[0];
									$where = ' delete_status=0 AND user_name ="'.$va['owner'].'" AND department='.$fromTableUser['did'];
									$fromTableUser = get_a_value_from_db('teacher' , '*' ,$where );
									if( !empty($fromTableUser)) {
										// check for match same dp
						array_push($returnArayy , array('id'=> sameDpokayb($currentUser_id, $va, $currentUser) ,
							'data' => $va
				 ));
									}//
								}
							
							
							
						} 
					
					
						
					}
					
					
					
				}
			}
			
		}
			
		return array ( 'id' => 1,
		'data'=> $returnArayy
		);
	}
	
	function sameDpokayb($user_name, $op, $currentUser) {
		$flag = 0;
		$data = array();
		if($op['type']==1) {
			
				if($op['to']=='te') {
					$flag = 1;
					$data = $op;
				} else if($op['to']=='teacher') {
					$where = '`call_to`.`call` ='.$op['id'].' AND target ='.$user_name;
					$newUserch = get_a_value_from_db('call_to' , '*' ,$where );
								if(!empty($newUserch)) {
									 foreach($newUserch as $xc) {
										$flag = 1;
										$data = $op;
									 }
								}
				}
 		}
		
		/////2
		if($op['type']==2) {
			
				if($op['to']=='student') {
					$where = '`call_to`.`call` ='.$op['id'].' AND target ='.$user_name;
					$newUserch = get_a_value_from_db('call_to' , '*' ,$where );
								if(!empty($newUserch)) {
									 foreach($newUserch as $xc) {
										$flag = 1;
										$data = $op;
									 }
								}
								
				} else {
					if($currentUser['class'] == $op['type'] ) {
						$flag = 1;
						$data = $op;
					}
				}
			
			
		}







		return $flag;
	}
	
	
	function delete_aTeacher_this( $user_name) {
		global $a;
		$newUserch = get_a_value_from_db('teacher' , '*' ,'user_name = "'.$user_name.'"');
		$newUserch = $newUserch[0];
		$user_id = $newUserch['id'];
		$query = 'DELETE FROM alert_to where  `alert_to`.`target` ='.$user_id;
		//$result = $a->display($query) ;
		
		$query = 'DELETE FROM tech_teach.call where  owner ="'.$user_name.'"';
		$result = $a->display($query) ;
		
		$query = 'DELETE FROM call_to where  `call_to`.`target` ='.$user_id;
		$result = $a->display($query) ;
		
		$query = 'DELETE FROM class_subject where  tid ='.$user_id;
		$result = $a->display($query) ;
		
		$query = 'DELETE FROM comment where  user_id ="'.$user_name.'"';
		//$result = $a->display($query) ;
		
		
		$xarray = array (
							'hod' => NULL
							);
				 
		$flag = updateMe('department', $xarray, ' `hod` ="'.$user_name.'"' );
		
		
		$query = 'DELETE FROM favourite_question where  admin ="'.$user_name.'"';
		$result = $a->display($query) ;
		
		$query = 'DELETE FROM post where  `post`.`te_id` ="'.$user_name.'"';
		//$result = $a->display($query) ;
		
		$query = 'DELETE FROM replay_like where  admin ="'.$user_name.'"';
		$result = $a->display($query) ;
		
		
		
		$xarray = array (
							'class_id' => 0,
							'delete_status' => 1
							);
				 
		$flag = updateMe('teacher', $xarray, '`user_name` ="'.$user_name.'" AND  delete_status=0 ' );
		 
		return $flag; 
	}
	
	function delete_aAdmin_this( $user_name) {
		global $a;
		$query = 'DELETE FROM admin where  user_name ="'.$user_name.'"';
		$flag = $a->display($query) ;
			return $flag; 
	}
	
	function get_hodsAndTch_o() {
		global $a;
		$rneRArayy = array();
		$alldPtm = get_a_value_from_db('department' , '*' ,'`hod` IS NOT NULL');
		foreach($alldPtm as $vValue) {
			$newUTarry = get_a_value_from_db('teacher' , '*' ,' department='.$vValue['did'].' AND  delete_status=0 ');
			//$newUTarry = $newUTarry[0];
				array_push($rneRArayy , array('dp'=> $vValue ,
							'teachers' => $newUTarry
				 ));
		}
		return $rneRArayy;
		
	}
	
	function delete_aStudent_this( $user_name){
		global $a;
		$newUserch = get_a_value_from_db('student' , '*' ,'user_name = "'.$user_name.'"');
		$newUserch = $newUserch[0];
		$user_id = $newUserch['sid'];
		$query = 'DELETE FROM alert_to where  `alert_to`.`target` ='.$user_id;
		//$result = $a->display($query) ;
		
		
		
		
		$query = 'DELETE FROM favourite_question where  admin ="'.$user_name.'"';
		$result = $a->display($query) ;
		
		$query = 'DELETE FROM post where  `post`.`te_id` ="'.$user_name.'"';
		//$result = $a->display($query) ;
		
		$query = 'DELETE FROM replay_like where  admin ="'.$user_name.'"';
		$result = $a->display($query) ;
		
		
		
		$xarray = array (
							'class' => 0,
							'delete_status' => 1
							);
				 
		$flag = updateMe('student', $xarray, '`user_name` ="'.$user_name.'" AND  delete_status=0 ' );
		 
		return $flag; 
	}
	
	
	
function setPasswrd_Studnt( $cpassword,$password) {
	
	session_start();
	$id = substr( $_SESSION['st'],3);
	
	$where =  '  `user_name` ="'.$id.'" AND  delete_status=0 ';
	$op = get_a_value_from_db('student' , '*' ,$where);
	$op = $op[0];
	$Npassword = $op['password'];
	if( 0 != strcmp( $Npassword, $cpassword)) {
				return -1;
			}
	
	$xarray = array (
						'password' => $password
						);
			 
	$flag = updateMe('student', $xarray, '`user_name` ="'.$id.'" AND  delete_status=0 ' );
	return $flag;
	
	
}
	
function setPasswrd_li_thr( $cpassword,$password) {
	
	session_start();
	$id = substr( $_SESSION['li'],3);
	
	$where =  '  `user_name` ="'.$id.'" ';
	$op = get_a_value_from_db('library' , '*' ,$where);
	$op = $op[0];
	$Npassword = $op['password'];
	if( 0 != strcmp( $Npassword, $cpassword)) {
				return -1;
			}
	
	$xarray = array (
						'password' => $password
						);
			 
	$flag = updateMe('library', $xarray, '`user_name` ="'.$id.'"' );
	return $flag;

	
}


function updateSayToadminposr($subject, $description, $attachment,  $sessi) {
	$sessi = substr( $sessi ,3);
		$post_int = array();
		$table = '';
		global $a;
		
			$priority ='';
			$details ='';
			$class_dp ='';
	if("library@techteach.com" ==$sessi ) {
		$priority = 4;
		$image = '/assets/images/book.jpg';
		$fname = 'library';
		$lname = 'system';
	} else {
		
			if (!ctype_digit($sessi)) {
				$priority = 3;
						$query = "SELECT * FROM `teacher` WHERE user_name ='".$sessi."' AND  delete_status=0 ";
						$post_int = $a->display($query);
						$post_int =$post_int[0];
						$table = 'teacher';
						if($post_int['class_id'] > 0) {
							$class_dp = returnClaseeForMe ($post_int['class_id']);
							$priority = 2;
						}
						$ret = get_a_value_from_db ('department' , '*' ,'`department`.`hod` ="'.$sessi.'"');
						foreach($ret as $fguj) {
							$priority = 1;
							$details = $fguj['name'];
						}
						
				} else {
						$query = "SELECT * FROM `student` WHERE user_name ='".$sessi."'";
						$post_int = $a->display($query);
						$post_int =$post_int[0];
						$table = 'student';
						$priority = 5;
						foreach($post_int as $fguj) {
							$class_dp = returnClaseeForMe ($post_int['class']);
						}
				}
				
			$fname = $post_int['fname'];
			$lname = $post_int['lname'];
			$image = $post_int['image'];
			$showimage = "/assets/images/defalut.jpg";
			$imgFpath =$_SERVER['DOCUMENT_ROOT'] .'tech_teach/'.$table.'/images_/'.$image;
			
			if(file_exists($imgFpath) && strlen($image)>0 ) {
				$showimage = '/'.$table.'/images_/'.$image;
				
				} 
			$image = $showimage;	
				
				
							 
	}	
					$targetPath_new = 'sat2adminimg/'.basename($attachment);
					$targetPath = 'uploads/'.basename($attachment);
					
						 if(rename($targetPath , $targetPath_new)) {
							$attachment = '/'.$targetPath_new;
						 } else {
							 //$varreturn = 0;
						 }
		
						 
				$where = ' user_id ="'.$sessi.'" and details ="'.$details.'" and class_dp ="'.$class_dp.'" and subject ="'.$subject.'" and description ="'.$description.'" and attachment ="'.$attachment.'"';	 
				$ret = get_a_value_from_db ('say_to_admin' , '*' ,$where);
					 
				foreach($ret as $tun) {
					return -1;
				}
					$xarray = array (
						'fname' => $fname,
						'lname' => $lname,
						'user_id' => $sessi,
						'priority' => $priority,
						'details' => $details ,
						'class_dp' => $class_dp ,
						'image'	 => $image ,
						'subject' => $subject,
						'description' => $description,
						'attachment' =>  $attachment,
						'date' => date("Y-m-d H:i:s")
						
						);
		$flag = insertInToComm ('say_to_admin', $xarray );
		
		return $flag;
				
}

function ckeckNotification_($total ) {
	$where = ' status = 1 ORDER BY `alert`.`date` DESC';	 
				$ret = get_a_value_from_db ('`alert`' , ' COUNT(*) AS total' ,$where);	
				if(!empty($ret)) {
					$ret = $ret[0];
					
					if($total < $ret['total'] ) {
						$new_ret = get_a_value_from_db ('`alert`' , ' *' ,' id in (SELECT MAX(id) FROM `alert`)');
						$new_ret = $new_ret[0];	
					
				
				
						if(checkIsAvalidpersn2see($new_ret['id'], $new_ret['department'],$new_ret['type'], $new_ret['to'])) {
							return array('success'=>1,
										'total' => $ret['total'],
										'data' => $new_ret
										 );	
						}
									 
					} else  {
						return array('success'=>0);	
					}
					
				}
				return array('success'=>0,
				'total' => 'new');	
}


				
function returnDb ($opRslt) {
	if(is_null($opRslt)) {
		return "no class in charge";
	}
	
	global $a;
				$query = "SELECT * FROM sub_class s  LEFT JOIN class c on c.id=s.cid WHERE s.class_id =  ".$opRslt."";
				$subDeprt = $a->display($query);
				if(!empty($subDeprt)) {
				$Cvalue = $subDeprt[0];
				return $Cvalue['did'];
				} else {
		return 0;
	}
	
	
}



function checkIsAvalidpersn2see($id, $department, $user_type,$sessiox) {
	$vretrun = false;
	global $a;
	
	
		$sessionS = '';
		
		session_start();
		if(isset($_SESSION['te'])) {
			$sessionS = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessionS = $_SESSION['st'];
		} else {
			
			return 0;
		}
		
		$arrayOp = array();
		
		$sessionSa = substr( $sessionS ,0, 2);
		$sessionSb = substr( $sessionS ,3);
		$department949693 = 0;
		$glob_usr_id = 0;
		if (!ctype_digit($sessionSb)) {
			$query = "SELECT * FROM `teacher` WHERE user_name ='".$sessionSb."' AND  delete_status=0 ";
						$arrayOp = $a->display($query);
						$arrayOp  = $arrayOp[0];
						$department949693 = $arrayOp['department'];
						$glob_usr_id = $arrayOp['id'];
		} else {
			$query = "SELECT * FROM `student` WHERE user_name ='".$sessionSb."' AND delete_status=0 ";
						$arrayOp = $a->display($query);
						$arrayOp =$arrayOp[0];
						$department949693 = returnDb ($arrayOp['class']);
						$glob_usr_id = $arrayOp['user_name'];
		}
		
		if($department949693 == $department) {
			
				if (!ctype_digit($sessionSb) && ($user_type==1) ) {
					if($sessionSa   == $sessiox) {
						$vretrun = true;
						
					} else if ( 'teacher' == $sessiox) {
						$query = "SELECT * FROM `alert_to` WHERE `alert_to`.`alert`=".$id." AND  `alert_to`.`target` ='".$glob_usr_id."'";
						$chek_inT0clol = $a->display($query);
						foreach($chek_inT0clol as $tVal) {
							$vretrun = true;
							}
					}
					
				} else if (ctype_digit($sessionSb) && $user_type==2) {
					
					if(is_numeric($sessiox)) {
						if($sessiox == $arrayOp['class']) {
							$vretrun = true;
						} 
					} else if($sessiox == 'student') {
						$query = "SELECT * FROM `alert_to` WHERE `alert_to`.`alert`=".$id." AND  `alert_to`.`target` ='".$glob_usr_id."'";
						$chek_inT0clol = $a->display($query);
						foreach($chek_inT0clol as $tVal) {
							$vretrun = true;
							}
					}
				}
		
		}
	return $vretrun;
}


function crreateThRplrt($class, $array ) {
	//return $array;
	$zArray = array();
	$students = get_a_value_from_db('student', '*',' class='.$class);
	foreach($students as $valGay) {
		
	array_push($zArray , array('id'=> $valGay['sid'] ,
						'marks' => returnTheMarkS( $valGay['sid'], $array,$valGay)
			 ));	
				 
	}
	

	return $zArray ;
	
	
	
}

function returnTheMarkS($id, $array, $valGay) {
	$RTYarray = array();
	$pName = '';
	$pMob ='';
	$prntx = get_a_value_from_db('parent', '*',' st_id='.$id);
	if(!empty($prntx)) {
		$prntx = $prntx[0];
			$pName = $prntx['name'];
			$pMob =$prntx['mobile'];
	}
	foreach($array as $value) {
		
		if(isset($value['student']) ) {
			
				if((int)$value['student'] == 1) {
					array_push($RTYarray , array('no'=> '0'));	
				}
				if((int)$value['student'] == 2) {
					array_push($RTYarray , array('roll_no'=> '1'));	
				}
				if((int)$value['student'] == 3) {
					array_push($RTYarray , array('reg_no'=> $valGay['user_name']));	
				} 
				if((int)$value['student'] == 4) {
					array_push($RTYarray , array('name'=>  $valGay['fname'].' '.$valGay['lname']));	
				}
				if((int)$value['student'] == 5) {
					array_push($RTYarray , array('mobile'=>  $valGay['mobile']));	
				}
				if((int)$value['student'] == 6) {
					if(!empty($prntx['name'])) {
						array_push($RTYarray , array('parent_name'=> $pName ));	
					}
				}
				if((int)$value['student'] == 7) {
					if(!empty($prntx['mobile'])) {
						array_push($RTYarray , array('parent_mobile'=> $pMob  ));	
					}
				}
				 if((int)$value['student'] == 8) {
	
	
					array_push($RTYarray , array('image'=>  $valGay['image']));	
				 }
		} 
		 if(isset($value['exam'])) {
			 
			$eExam = get_a_value_from_db('`mark`', '*',' exam_id='.$value['exam'].' AND stud_id='.$valGay['user_name']);
				if(!empty($eExam)) {
						$eExam = $eExam[0];
						array_push($RTYarray , array('exam-'.$value['exam'] =>  $eExam['mark']));	
					} else {
						array_push($RTYarray , array('exam-'.$value['exam'] =>  NULL));
					}
			//array_push($RTYarray , array('exam-'.$value['exam'] =>  ' exam_id='.$value['exam'].' AND stud_id='.$id));	
		} 
		 if (isset($value['assignment'])) {
			$eExam = get_a_value_from_db('`mark_percentage`', '*',' ref_id='.$value['assignment'].' AND stud_id='.$valGay['sid']);
				if(!empty($eExam)) {
						$eExam = $eExam[0];
						array_push($RTYarray , array('assignment-'.$value['assignment'] =>  $eExam['percentage']));	
					} else {
						array_push($RTYarray , array('assignment-'.$value['assignment'] =>  NULL ));	
					}
			
			
		}
		
		
		
	}
	
	return $RTYarray;
}

?>