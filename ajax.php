
<?php
	
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

include_once 'functions.php';
if( isset($_POST['action']) &&  IS_AJAX  ) {
 	
	switch( $_POST['action'] ) {
		
		// user login
		case 'user-login':
		
		
			$id = $_POST['username'];
			$password = $_POST['password'];
			
			
			if( $id == "admin@techteach.com"){
				if( adminlogin( $id, $password) ) {
						session_start();
						$_SESSION['admin'] = 'admin@techteach.com';
						echo '<script type="text/javascript">window.location = "admin/index.php";</script>';
				  } else {
						echo 'In currect password admin';
				  }
									
						
			}
			else {
			
			
			
				switch ( substr( $id ,0,2) ){
					case "ad" :
							if( adlogin( substr( $id ,3), $password) ) {
								session_start();
								$_SESSION['admin'] = $id;
								echo '<script type="text/javascript">window.location = "admin/index.php";</script>';
							} else {
								echo 'In currect password admin';
							}
								
							break;	
					case "te" :
							if( telogin( substr( $id ,3), $password) ) {
								session_start();
								$_SESSION['te'] = $id;
								echo '<script type="text/javascript">window.location = "teacher/index.php";</script>';
							} else {
								echo 'In currect password';
							}	
								
							break;	
					case "st" :
							if( stlogin( substr( $id ,3), $password) ) {
								session_start();
								$_SESSION['st'] = $id;
								echo '<script type="text/javascript">window.location = "student/index.php";</script>';
							} else {
								echo 'In currect password';
							}	
							break;	
					case "li" :
							if( lilogin( substr( $id ,3), $password) ) {
								session_start();
								$_SESSION['li'] = $id;
								echo '<script type="text/javascript">window.location = "library/index.php";</script>';
							} else {
								echo 'In currect password';
							}	
							break;	
					
					default :
						echo 'invalid id';
					
					
					
					
				}
			
			}
			
		/*	if( userlogin($id, $password) ) {
				session_start();
				$_SESSION['admin'] = 'admin@techteach.com';
				echo '<script type="text/javascript">window.location = "admin/index.php";</script>';
			} else {
				echo 'In currect password';
			}
			*/
		break;
		
	case 'add-department':	
	
			$departmentname = $_POST['departmentname'];
			$numberofyears = $_POST['numberofyears'];
			if( admin_adddepartment($departmentname,$numberofyears) ) 
				$flag = true;
			else 
				$flag = false;
				
			echo json_encode(array('success'=>$flag));	
			
			
	
		break;
	
	case 'get_a_value_from_db':

		$op= array();
		$table =  $_POST['value1'];
		$column =  $_POST['value2'];
		$where =  $_POST['value3'];
			$op = get_a_value_from_db($table , $column ,$where);
			echo json_encode( $op[0] );
		break;
		
		
	case 'add-class':
		
		$namew = $_POST['name'];
		
		
		$departmentidq = $_POST['departmentid']; 
		$batchq  = $_POST['batch'];
		$divisionidq = $_POST['divisionid'];
		
		
		
			if( add_class($namew,$departmentidq,$batchq,$divisionidq) ) 
				$flag = true;
			else 
				$flag = false;
				
			echo json_encode(array('success'=>$flag));	
	break;
	
	case 'add-teacher':
			$user_name = $_POST['user_name'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$sex = $_POST['sex'];
			$address = $_POST['address'];
			$mobile = $_POST['mobile'];
			$class = $_POST['class'];
			$department = $_POST['department'];
			
			$code = rand(100000,999999);
			$flag = add_teacher($user_name,$fname ,$lname ,$sex ,$address ,$mobile ,$code ,$class, $department );
				
			echo json_encode(array('success'=>$flag));	
	
	
	
	break;
	
	case 'get-classid':
		$department = $_POST['department'];
		echo (get_classId($department ));	
	
	
	break;
	
	case 'add-student':
		$user_name = $_POST['user_name'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$sex = $_POST['sex'];
			$address = $_POST['address'];
			$mobile = $_POST['mobile'];
			$class = $_POST['class'];
			$flag = add_student($user_name,$fname ,$lname ,$sex ,$address ,$mobile ,$class );
				
			echo json_encode(array('success'=>$flag));	
		
	
	break;
	
	case 'add-admin':
		$user_name = $_POST['user_name'];
			$code = rand(100000,999999);
			$flag = add_admin($user_name, $code );	
			echo json_encode(array('success'=>$flag));	
		
	
	break;
	
	case 'view-class-table':
	$user_name = $_POST['user_name'];
		$table = " department d LEFT JOIN class c on c.did=d.did ".
						 "LEFT JOIN sub_class s on s.cid = c.id LEFT JOIN teacher t ".
						 "on t.class_id = s.class_id ";
		$column = " d.name, c.batch ,s.division,t.class_id, CONCAT( t.fname,' ',t.lname ) AS teacher ";
		$where = "s.class_id  IS NOT NULL ";	
		//t.delete_status=0 AND 
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
	break;
		
		
	case 'getusernamecheck':	
		
		$user_name = $_POST['user_name'];
		$table = " teacher ";
		$column = " user_name ";
		$where = " user_name ='".$user_name."'";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
		
		
		
	break;
	
	
	case 'view-department-values':
		$depatrmrnt = $_POST['depatrmrnt'];
		$table = " class ";
		$column = "*";
		$where = " did =".$depatrmrnt."";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
	
	
	
	
	break;
	
	case 'view-division-values':
		$depatrmrnt = $_POST['division'];
		$table = " sub_class ";
		$column = "*";
		$where = " cid =".$depatrmrnt."";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
	
	break;
	
	case 'getclassidteachercheck':
		$class_id = $_POST['class_id'];
		$table = " teacher ";
		$column = " user_name ";
		$where = " class_id ='".$class_id."' AND  delete_status=0 ";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
		
	break;
	
	case 'view-department-table':
		$user_name = $_POST['user_name'];
		$table = " department ";
		$column = " * ";
		$where = " 1 ";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
	break;
	
	case 'getadminnamecheck':
		$user_name = $_POST['user_name'];
		$table = " admin ";
		$column = " user_name ";
		$where = " user_name ='".$user_name."' ";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
	
	break;
	
	case 'getsudentnamecheck':	
		
		$user_name = $_POST['user_name'];
		$table = " student ";
		$column = " user_name ";
		$where = " user_name ='".$user_name."' ";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
		
	break;
	
		case 'getAStudent':	
		
		$user_name = $_POST['user_name'];
		$table = " student ";
		$column = " * ";
		$where = " user_name ='".$user_name."' ";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
		
	break;
	
	case 'add-a-post-by-teacher':
	// $text_me, $to_who $type, $attachment:$temp_array_of_name_of_files_for_delete
		$data_post = $_POST['text'];	
		$to_who = $_POST['to_who'];	
		$type = $_POST['type'];	
		$attachment = $_POST['attachment'];	
		$flag = add_a_post_by_teacher($data_post, $to_who, $type, $attachment );	
		echo json_encode(array('success'=>$flag));
	break;
	
	case 'uptudate-post':
		$data = $_POST['input'];	
		$flag = uptudate_post( $data );	
		echo json_encode($flag);
	break;
	
	case 'uptudate-bottom-post':
		$data = $_POST['input'];	
		$flag = uptudate_bottom_post( $data );	
		echo json_encode($flag);
	break;
	
	case 'add-a-comment-to-poast':
		
		$post_id = $_POST['postid'];	
		$post_date = $_POST['postdate'];	
		$comment = $_POST['text'];	
		$flag = add_a_comment_to_poast( $post_id, $post_date, $comment );
		echo json_encode(array('success'=>$flag));
	
	break;
	case 'uptudate-commnt':
		$data = $_POST['input'];
		$id = $_POST['postid'];	
		$flag = uptudate_commnt( $id, $data );	
		echo json_encode($flag);
	break;
	
	case 'add-book':
		$text_name = $_POST['text_name'];
		$author = $_POST['author'];
		$edition = $_POST['edition'];
		$description = $_POST['description'];
		$section = $_POST['section'];
		$noc = $_POST['noc'];
		$image = $_POST['image'];
		$flag = add_book( $text_name, $author, $edition, $section, $description, $noc, $image);	
		echo json_encode(array('success'=>$flag));
	
	break;
	
	case 'add-book-section':
		$text_name = $_POST['text_name'];
		$description = $_POST['description'];	
		$flag = add_book_section( $text_name, $description );	
		echo json_encode(array('success'=>$flag));
	
	break;
	case 'gettextnamecheck':
		$text_name = $_POST['text_name'];	
		$flag = gettextnamecheck( $text_name);	
		echo json_encode(array('success'=>$flag));
	break;
	
	case 'update_teacher':
			
			
			$fnname = $_POST['f_name'];
			$lnname = $_POST['l_name'];
			$addname =$_POST['ad_name'];
			$mobile = $_POST['mbno'];
			
		
			$flag = update_teacher($fnname ,$lnname ,$addname ,$mobile );
				
			echo json_encode(array('success'=>$flag));	
		break;
		
		
		case 'update_teacher_password':
		
			$cpassword = $_POST['cpassword'];
			$npassword = $_POST['npassword'];
			$rpassword =$_POST['rpassword'];
			
			if( 0 != strcmp( $npassword, $rpassword)) {
				echo json_encode(array('success'=>'0'));
				break;
			}
			
			$flag = setPasswrd( $cpassword,$rpassword);
				
			echo json_encode(array('success'=>$flag));	
		
		
		break;
		
		
		case 'add_subject':
			$name = $_POST['sub_name'];
			$department = $_POST['dep_id'];
			$description =$_POST['sub_disc'];
		
			$flag = add_a_subject($name ,$department ,$description);
				
			echo json_encode(array('success'=>$flag));	
		break;
		
		case 'add-hod':
		$dep = $_POST['dep'];
			$tea = $_POST['tea'];
			$flag = add_hod($dep, $tea );	
			echo json_encode(array('success'=>$flag));	
		
	
	break;
	
	case 'view-class-values-suj-class':
		$depatrmrnt = $_POST['classid'];
		$table = " sub_class ";
		$column = "*";
		$where = " cid =".$depatrmrnt."";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
	
	break;
	
	case 'save-sub-to-class':
		$class_id = $_POST['class_id'];
		$semm = $_POST['semm'];
		$subject_id = $_POST['subject_id'];
		$duratin = $_POST['duratin'];
		$teacher_id = $_POST['teacher_id'];
		
		
		$where = " cid= ".$class_id." AND sem_id=".$semm." AND tid=".$teacher_id." AND year='".$duratin."' AND sid=".$subject_id;
	
		$check = get_a_value_from_db ('class_subject ' , '*' ,$where);
		
		$chrk6655498746=0;
		foreach($check as $v0alue) {
			$chrk6655498746 = $v0alue['id'];
		}
		if($chrk6655498746>1) {
			echo json_encode(array('success'=>'-1'));
			return;
		}
		
		
		
		$table = 'class_subject';
		$xarray = array (
						'cid' => $class_id,
						'sem_id' => $semm,
						'tid' => $teacher_id,
						'year' => $duratin,
						'sid' => $subject_id,
						'date' => date("Y-m-d H:i:s")
						
						);
	
		$flag = insertInToComm ($table, $xarray );
			
		echo json_encode(array('success'=>$flag));	
	
	break;
	
	case 'getExamofSub':
		$sid = $_POST['sid'];
		
		$flag = get_Exam_of_Sub($sid);
			
		echo json_encode(array('success'=>$flag));	
		
	break;
	
	case 'view-subjects':
	$cid = $_POST['classid'];
	$tid = 	$_POST['tid'];
		$flag = view_subjects($cid, $tid );
			
		echo json_encode($flag);	
	
	
	break;
	case 'set-exam':
		$class_sub = $_POST['class_sub'];
		$totalm = $_POST['totalm'];
		$series = $_POST['series'];
		$description = $_POST['description'];
		
		$flag = set_exam($class_sub, $totalm, $series, $description);
			
		echo json_encode(array('success'=>$flag));	
		
	break;	
	case 'getStudentofSub':
	
		$sid = $_POST['sid'];
		$flag = get_Student_of_Sub($sid);
		echo json_encode(array('success'=>$flag));	
	
	
	break;
	case 'getuniqStud':
		$sid = $_POST['sid'];
		$flag = get_uniq_Stud($sid);
		echo json_encode(array('success'=>$flag));
	
	break;
	case 'update-mark-password':
		$xamid = $_POST['xamid'];
		$studid = $_POST['studid'];
		$makr = $_POST['makr'];
		$descriptions = $_POST['descriptions'];
		$flag = update_mark_password($xamid, $studid,$makr, $descriptions);
		echo json_encode(array('success'=>$flag));
	break;
	case'checkistrue-teach':
	
	 	$fdp = $_POST['ss_id'];
		$flag = checkistrue_teach($fdp);
		echo json_encode(array('success'=>$flag));	
	break;
	
	case 'checkistrue-markOl':
		$xamid = $_POST['xamid'];
		$studid = $_POST['studid'];
		$flag = checkistrue_markOl($xamid, $studid);
		echo json_encode(array('success'=>$flag));
	break;
	
	case 'update-teacher-image':
		$img = $_POST['images'];
		$flag = update_teacher_image($img);
		echo json_encode(array('success'=>$flag));
	break;
	
	case 'update-sudent-image':
		$img = $_POST['images'];
		$flag = update_sudent_image($img);
		echo json_encode(array('success'=>$flag));
	break;
	case 'getAclassNameHr':
		$img = $_POST['class'];
		$flag = returnClaseeForMe($img);
		echo json_encode(array('success'=>$flag));
	break;
	case 'getAdeptName':
		$depatrmrnt = $_POST['dpt'];
		$table = " department ";
		$column = "name";
		$where = " did =".$depatrmrnt."";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	

		
		
		
	break;
	
	
	case 'get_classand':
		$dp_id = $_POST['dp_id'];
		$table = " teacher ";
		$column = "*";
		$where = " department =".$dp_id." AND  delete_status=0 ";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	

		
		
		
	break;
	
	case 'upadate_class_teac':
	
	$class_id =  $_POST['class_id'];
	$Teacher_id = $_POST['Teacher_id'];
	$flag =  update_classChrg_fot_tech($class_id, $Teacher_id);
	echo json_encode($flag);	
	break;
	
	case 'add-or-update-parent':
	
	$st_id  =  $_POST['st_id'];
	$name =  $_POST['name'];
	$designation =  $_POST['designation'];
	$mobile =  $_POST['mobile'];
	$description =  $_POST['description'];
	$l_no =  $_POST['l_no'];
	$flag =  add_or_update_parent($st_id , $name, $designation, $mobile, $description, $l_no);
	echo json_encode($flag);
	
	break;
	
	
		case 'set-assignment':
		$class_sub = $_POST['class_sub'];
		$topic = $_POST['topic'];
		$sub_date = $_POST['sub_date'];
		$description = $_POST['description'];
		
		$flag = set_assignment($class_sub, $topic, $sub_date , $description);
			
		echo json_encode(array('success'=>$flag));	
		
	break;	
	
	case 'get-data-c':
		$table = $_POST['table'];
		$column = '*';
		$where = $_POST['zero'].' = '.$_POST['one'];
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		echo json_encode($flag);	
	
	break;
	case 'se-assg-mrk':
	
		$st_id =  $_POST['st_id'];
		$st_mrk =  $_POST['st_mrk'];
		$ref_id =  $_POST['ref_id'];
		$status = 'assignment';
		$flag =  se_assg_mrk($st_id , $st_mrk, $ref_id, $status);
		echo json_encode($flag);
	break;
	
	case 'get-mrk-cd':
	
		$st_id =  $_POST['st_id'];
		$ref_id =  $_POST['ref_id'];
		$status = 'assignment';
		$table = 'mark_percentage';
		$column = '*';
		$where = ' stud_id = '.$st_id.' AND ref_id = '.$ref_id.' AND status = "'.$status.'"';
		
		$flag = get_a_value_from_db ($table , $column ,$where);
		echo json_encode($flag);
	break;
	
	case 'get_whole_book':
		$flag = get_a_value_from_db ('book' , '*' ,' 1 = 1  ORDER BY `book`.`name` ASC');
		echo json_encode($flag);
	break;
	
	case 'get-a-book':
		$table = 'book';
		$column = '*';
		$where = 'id  = '.$_POST['book_id'];
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		echo json_encode($flag);	
	
	break;
	case 'get-a-user':
		$table = $_POST['table'];
		$sess = $_POST['sess'];
		$column = '*';
		$flag = get_a_user($table , $column , $_POST['s_id'], $sess);
		
		echo json_encode($flag);	
	
	break;
	case 'get-a-selected-book':
		$table = 'library_book';
		$column = '*';
		$where = 'book_id  = '.$_POST['book_id'].' AND status = "1"';
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		echo json_encode($flag);	
	break;
	
	case 'get-check-a-user':
		$table = 'library_book';
		$column = '*';
		$where = 's_id  = "'.$_POST['s_id'].'" AND status  = "1"';
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		echo json_encode($flag);	
	break;
	case 'update_book_return':
		$id = $_POST['id'];
		$status = $_POST['status'];
		$xarray = array (
						'status' => $status 
						);
			 
		$flag = updateMe('library_book', $xarray, '`id` ='.$id.'' );
	
		echo json_encode($flag);	
	break;
	
	case 'giv-abook-to-a-ownr':
	
	$book_id = $_POST['book_id']; 
	$ownr_id = $_POST['ownr_id']; 
	$st_date = $_POST['st_date']; 
	$to_date = $_POST['to_date']; 
	$copy_id = $_POST['copy_id']; 
	$name = $_POST['name']; 
	$table = 'library_book';
	$date = date("Y-m-d H:i:s");
	
	$check = get_a_value_from_db ($table , '*' ," s_id ='".$ownr_id."' AND status = '1'");
	$chrk6655498746=0;
	foreach($check as $v0alue) {
		$chrk6655498746++;
	}
	if($chrk6655498746>1) {
		echo json_encode(array('id'=>'-1'));
		return;
	}
	
		$xarray = array (
						'book_id' => $book_id,
						'copy_id' => $copy_id,
						'b_name' => $name,
						's_id' => $ownr_id,
						'to_date' => $to_date,
						'date' => $date
						
						);
	
		$flag = insertInToComm ($table, $xarray );
		if($flag) {
			$flag = get_a_value_from_db ($table , 'id' ," book_id = ".$book_id." AND copy_id =".$copy_id." AND b_name ='".$name."' AND s_id ='".$ownr_id."' AND to_date ='".$to_date."' AND date ='".$date."' AND status = '1'");
		}
		$flag = $flag[0];
		echo json_encode($flag);	
	break;
	case 'global-updat-a-single-value':
		$zero = $_POST['zero'];
		$one = $_POST['one'];
		$table = $_POST['table'];
		$id = $_POST['id'];
		
		$flag = global_updat_a_single_value ($table , $id ,$zero, $one);
		
		echo json_encode($flag);	
	
	break;
	
	case 'slect_dp_ful':
	
		$table = 'department';
		$column = '*';
		$where = ' 1=1';
		$flag = get_a_value_from_db ($table , $column ,$where);
		echo json_encode($flag);	
	break;
	case 'slect_table_ful_by_db':
		
		$table = $_POST['table'];
		$column = '*';
		$where = ' department = '.$_POST['dp_id'];
		$flag = get_a_value_from_db ($table , $column ,$where);
		echo json_encode($flag);	
	break;
	case 'ad-a-alert':
	// $subject,$description,$valid, tofor:arrayOfnotifc
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$valid = $_POST['valid'];
	$tofor = $_POST['tofor'];
	$department = $_POST['department'];
	$sta = $_POST['sta'];
	$type = $_POST['type'];
	$flag = ad_a_alert ($subject,$description,$valid ,$tofor ,$department ,$sta ,$type);
		echo json_encode($flag);	
	
	break;
	//SELECT * FROM sub_class s  LEFT JOIN class c on c.id=s.cid WHERE c.did
	case 'slect_class_table_ful_by_db':
		$table = 'sub_class s  LEFT JOIN class c on c.id=s.cid ';
		$column = '*';
		$where = ' c.did = '.$_POST['dp_id'];
		$flag = get_a_value_from_db ($table , $column ,$where);
		echo json_encode($flag);
	break;
	
	case 'getAclassNameHr_all_one_val':
		$img = $_POST['class'];
		$flag = returnClaseeForMe($img);
		echo json_encode(array('success'=>$flag,
								'id' =>$_POST['class']
								));
	break;
	case 'get-data-c-parent':
	
	//SELECT s.sid AS sid, s.user_name AS tuser_name, CONCAT(s.fname,' ' ,s.lname) AS sname, s.sex AS tsex, s.mobile AS tmobile ,p.id AS pid, p.name AS pname, p.mobile AS pmobile FROM student s LEFT JOIN parent p on s.sid=p.st_id ORDER BY s.fname ASC
		$table = " student s LEFT JOIN parent p on s.sid=p.st_id ";
		$column = " s.sid AS sid, s.user_name AS suser_name, CONCAT(s.fname,' ' ,s.lname) AS sname, s.sex AS ssex, s.mobile AS smobile ,p.id AS pid, p.name AS pname, p.mobile AS pmobile ";
		$where = 's.'.$_POST['zero'].' = '.$_POST['one']." ORDER BY s.fname ASC";
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		echo json_encode($flag);	
	
	break;
	
	case 'update_notof_timeot':
		$id = $_POST['id'];
		$status = $_POST['status'];
		$xarray = array (
						'status' => $status 
						);
			 
		$flag = updateMe('alert', $xarray, '`id` ='.$id.'' );
	
		echo json_encode($flag);	
	break;
	
	case 'get_a_usr_j':
		$new_user = $_POST['new_user'];
		$table = '';
		$fFlag = false;
		
		if (substr( $new_user ,0,2) == 'te') {
			$table = 'teacher';
			
		} else if (substr( $new_user ,0,2) == 'st') {
			$table = 'student';
		} else {
			echo json_encode(-1);
			return;
		}
		$where = ' user_name = "'.substr( $new_user ,3).'" AND  delete_status=0 ';
		$flag = get_a_value_from_db ($table , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			if($flag['password'] === NULL) {
				echo json_encode(1);
					return;
			} else {
					echo json_encode(-1);
					return;
				
				}
			
		} else {
			
			echo json_encode(-1);
			return;
		}
		
	break;
	
	case 'get_a_usr_k':
		$mobile = $_POST['mob'];
		$new_user = $_POST['new_user'];
		$where = '  delete_status=0 AND user_name = "'.substr( $new_user ,3).'" AND mobile = "'.$mobile.'"';
		$flag = get_a_value_from_db ('teacher' , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			if($flag['mobile'] == $mobile) {
				
				$Dflaf = sendMsgFun($mobile, $flag['id']);
				echo json_encode($Dflaf);
			} else {
					echo json_encode(-2);
					return;
				
				}
			
		} else {
			
			echo json_encode(-2);
			return;
		}
		
	
	break;
	
	
	
	case 'get_a_usr_l':
		$mobile = $_POST['mob'];
		$new_user = $_POST['new_user'];
		$code = $_POST['code'];
		$where = ' delete_status=0 AND user_name = "'.substr( $new_user ,3).'" AND mobile = "'.$mobile.'" AND code = '.$code;
		$flag = get_a_value_from_db ('teacher' , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			if($flag['mobile'] == $mobile) {
				
				echo json_encode(1);
				
			} else {
					echo json_encode(-3);
					return;
				
				}
			
		} else {
			
			echo json_encode(-3);
			return;
		}
		
	
	break;
	
	
	case 'get_a_usr_z':
		$mobile = $_POST['mob'];
		$new_user = $_POST['new_user'];
		$code = $_POST['code'];
		$pass = $_POST['pass'];
		
		$where = ' delete_status=0 AND user_name = "'.substr( $new_user ,3).'" AND mobile = "'.$mobile.'" AND code = '.$code;
		
		
		$xarray = array (
						'password' => $pass,
						'code' => 0 ,
						'date' => date("Y-m-d H:i:s")
						);
			 
		$flag = updateMe('teacher', $xarray, $where );
		
		echo json_encode($flag);	
	
	break;
	
		case 'update_aTeach_ck':
	
	
	$clalca = $_POST['cid'];
	$sem = $_POST['sem_id'];
	$tea = $_POST['tid'];
	$tid0 = $_POST['tid0'];
	$year = $_POST['year'];
	$year = trim($year);
	$sub = $_POST['sid'];
	
	$where = " cid= ".$clalca." AND sem_id=".$sem." AND tid=".$tid0." AND year='".$year."' AND sid=".$sub;
	
	$check = get_a_value_from_db ('class_subject ' , '*' ,$where);
	
	$chrk6655498746=0;
	foreach($check as $v0alue) {
		$chrk6655498746 = $v0alue['id'];
	}
	if($chrk6655498746<1) {
		echo json_encode(array('id'=>'-1'));
		return;
	}
	
		$xarray = array (
						'tid' => $tea
						
						);
		
	$flag = updateMe('class_subject', $xarray, ' id = '.$chrk6655498746);
		echo json_encode($flag);	
	break;
	
	case 'delete_aTeach_ck':
	
	$clalca = $_POST['cid'];
	$sem = $_POST['sem_id'];
	$tid0 = $_POST['tid0'];
	$year = $_POST['year'];
	$year = trim($year);
	$sub = $_POST['sid'];
	
	$where = " cid= ".$clalca." AND sem_id=".$sem." AND tid=".$tid0." AND year='".$year."' AND sid=".$sub;
	
	$flag = delete_a_value_from_db ('class_subject ' , $where);
	
	echo json_encode($flag);
	
	
	
	break;
/******************************************** delete a file*********************************/
	case 'delete_this_file':
		$src = $_POST['src'];
		$flag = delete_a_file_from_dir ($src);
	
	echo json_encode($flag);
	
	break;
	
	case 'ass_sessin_me':
		$src = $_POST['src'];
		 session_start();
		 $_SESSION['delete']=$src;
	echo json_encode('');
	break;
	
	case 'delete_all_file':
		$flag = NULL;
		session_start();
		if(isset($_SESSION['delete']) && !empty($_SESSION['delete'])) {
		    foreach($_SESSION['delete'] as $val)
			 {
			  $flag += delete_a_file_from_dir ($val);
			 }
		}
	echo json_encode($flag);
	
	
/******************************************** delete a file*********************************/

 case 'remove_apost87635_7464576':	
		
		$post_id = $_POST['post_id'];
		$xarray = array (
						'delete' => 1
						);
			 
	$flag = updateMe('post', $xarray, '`post_id` ='.$post_id );
		echo json_encode($flag);	
		
	break;
	
	case 'uptudate-comment':
		$data = $_POST['input'];
		$output = $_POST['output'];
		$flag = uptudate_comment_( $data, $output );	
		echo json_encode($flag);
	break;
	
	case 'gen_and_upade_a_pass949693':
	
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		$xarray = array (
							'password' => $password
							);
				 
		$flag = updateMe('student', $xarray, '`user_name` ="'.$user_name.'"' );
		echo json_encode($flag);
	
	break;
	
	
	
	case 'add_aqstn':
		$qstn = $_POST['qstn'];
		$sessi = NULL;
		session_start();
		if(isset($_SESSION['te'])) {
			$sessi = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessi = $_SESSION['st'];
		} else if(isset($_SESSION['li'])) {
			$sessi = $_SESSION['li'];
		} else if(isset($_SESSION['ad'])) {
			$sessi = $_SESSION['ad'];
		}else if(isset($_SESSION['admin'])) {
			$sessi = $_SESSION['admin'];
		} else {
			return 0;
		}
		
		$sessi = substr( $sessi ,3);
		$flag = add_aqstn_nw($qstn, $sessi);
		echo json_encode($flag);
	
	
	break;
	
	case 'uptudate-qstn':
		$input = $_POST['input'];
		$flag = uptudate_qstn($input);
		echo json_encode($flag);	
	
	break;	
	
	case 'add_a_replay':
		$my_qstnis = $_POST['qstn'];
		$q_id = $_POST['qid'];
		$sessi = '';
		session_start();
		if(isset($_SESSION['te'])) {
			$sessi = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessi = $_SESSION['st'];
		} else if(isset($_SESSION['li'])) {
			$sessi = $_SESSION['li'];
		} else if(isset($_SESSION['ad'])) {
			$sessi = $_SESSION['ad'];
		}else if(isset($_SESSION['admin'])) {
			$sessi = $_SESSION['admin'];
		} else {
			return 0;
		}
		
		$sessi = substr( $sessi ,3);
		
		$flag = uptudate_replay($q_id, $my_qstnis, $sessi);
		echo json_encode($flag);
		
	break;
	
	case 'view_al_replay':
		$q_id = $_POST['qid'];
		
		$flag = get_a_value_from_db('q_replay' , '*' ,' question = '.$q_id.'  ORDER BY `q_replay`.`date` ASC');
		echo json_encode($flag);
		
	break;
	
	case 'get_aUser_frm_db':
		$flag = array();
		$val = ' null ';
		$user_name = $_POST['user_name'];
		if (!ctype_digit($user_name)) { 
			$flag = get_a_value_from_db(" teacher t LEFT JOIN department d on t.department = d.did " , "d.name as department ,t.image, CONCAT( t.fname,' ',t.lname ) AS name " ,'  t.user_name = "'.$user_name.'" AND t.delete_status=0  ');
			$val = 'teacher';
		} else { 
		
				$flag = get_a_value_from_db('student' , " class AS department ,image, CONCAT( fname,' ',lname ) AS name " ,"user_name = '".$user_name."'");
				$flag = $flag[0];
				$flag['department'] = returnClaseeForMe($flag['department']);
				$flag = array( 0 =>$flag  );				
				$val = 'student';
		}
		
		$status = 1;
			if(empty($flag)) {
				$status = 0;
			}
		echo json_encode(array('success'=> 1,
								'data' => $flag,
								'status' => $status,
								'val' => $val));
		
	break;
	
	case 'add_to_fav':
		$sessi = '';
		session_start();
		if(isset($_SESSION['te'])) {
			$sessi = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessi = $_SESSION['st'];
		} else if(isset($_SESSION['li'])) {
			$sessi = $_SESSION['li'];
		} else if(isset($_SESSION['ad'])) {
			$sessi = $_SESSION['ad'];
		}else if(isset($_SESSION['admin'])) {
			$sessi = $_SESSION['admin'];
		} else {
			return 0;
		}
		
		$sessi = substr( $sessi ,3);
		
	
		$qstn_id = $_POST['qid'];
	 	$flag = add_to_fav_($qstn_id, $sessi);
		echo json_encode($flag);
	 break;
	 
	 case 'like_dislik_replay':
	 $sessi = '';
		session_start();
		if(isset($_SESSION['te'])) {
			$sessi = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessi = $_SESSION['st'];
		} else if(isset($_SESSION['li'])) {
			$sessi = $_SESSION['li'];
		} else if(isset($_SESSION['ad'])) {
			$sessi = $_SESSION['ad'];
		}else if(isset($_SESSION['admin'])) {
			$sessi = $_SESSION['admin'];
		} else {
			return 0;
		}
		
		$sessi = substr( $sessi ,3);
		
	 	$qstn = $_POST['qstn'];
	 	$status = $_POST['status'];
	 	$flag = like_dislik_replay_($qstn, $status, $sessi);
		echo json_encode($flag);
		
	 break;
	 
	 case 'like-dislik-replay-onlyCou':
	 	$qstn = $_POST['qstn'];
		 $flag = like_dislik_replay_onlyCou($qstn);
		 echo json_encode($flag);
	 break;
	 
	 case 'nake_a_newVido_call':
	 
	 	$user_name = $_POST['user_name'];
	 	$to = $_POST['to'];
	 	$key = $_POST['key'];
	 	$description = $_POST['description'];
	 	$sta = $_POST['sta'];
		$type = $_POST['type'];
		
		 $flag = nake_a_newVido_call($user_name, $to , $key, $description, $sta, $type);
		 echo json_encode($flag);
	 break;
	 
	  case 'endTheVido_call':
	 
	 	$user_name = $_POST['user_name'];
	 	$key = $_POST['key'];
		 $flag = end_a_newVido_call($user_name, $key );
		 echo json_encode($flag);
	 break;
	 
	 case 'checkVideoCall':
	 	$user_name = $_POST['user_name'];
		 $flag = checkVideoCall_($user_name );
		 echo json_encode($flag);
	 
	 break;
	 	case 'getaTeacher':
		$user_name = $_POST['user_name'];
		$table = " teacher ";
		$column = " * ";
		$where = " user_name ='".$user_name."' AND  delete_status=0 ";	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
		
	break;
	
	
	case 'update-teacher':
			$user_name = $_POST['user_name'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname']; 
			$address = $_POST['address'];
			$mobile = $_POST['mobile'];
			
			
			$check = get_a_value_from_db ('teacher ' , '*' ,' delete_status=0 AND mobile= '.$mobile.' AND user_name != "'.$user_name.'"');
			
			$chrk6655498746=0;
			foreach($check as $v0alue) {
				$chrk6655498746 ++;
			}
			if($chrk6655498746>0) {
				echo json_encode(array('success'=>-2));
				return;
			}
			
			$xarray = array (
							'fname' => $fname ,
							'lname' => $lname ,
							'mobile' => $mobile ,
							'address' => $address 
							);
				 
			$flag = updateMe('teacher', $xarray, '`user_name` ="'.$user_name.'" AND  delete_status=0 ' );
			
				
			echo json_encode(array('success'=>$flag));	
	
	
	
	break;
	
	case 'delete_aTeacher':
			
			$user_name = $_POST['user_name'];
			
			$flag = delete_aTeacher_this( $user_name);
				
			echo json_encode(array('success'=>$flag));	
	
	break;
	
	case 'delete_aAdmin':
		$user_name = $_POST['user_name'];
			
			$flag = delete_aAdmin_this( $user_name);
				
			echo json_encode(array('success'=>$flag));	
	
	break;
	
	case 'get_a_usr_j_fqtpass':
		$new_user = $_POST['new_user'];
		$table = '';
		$fFlag = false;
		
		if (substr( $new_user ,0,2) == 'te') {
			$table = 'teacher';
			
		} else if (substr( $new_user ,0,2) == 'st') {
			$table = 'student';
		} else {
			echo json_encode(array('success'=>-1));
			return;
		}
		$where = ' user_name = "'.substr( $new_user ,3).'" AND  delete_status=0 ';
		$flag = get_a_value_from_db ($table , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			if($flag['password'] === NULL) {
				echo json_encode(array('success'=>1));
					return;
			} else {
				$myMon = substr( $flag['mobile'] ,0,2).'******'.substr( $flag['mobile'] ,8); 
					echo json_encode(array('success'=>2,
											'data' => $myMon));
					return;
				
				}
			
		} else {
			
			echo json_encode(array('success'=>-1));
			return;
		}
		
	break;
	
	case 'get_a_code_mob_verf_fqtpass':
		$new_user = $_POST['new_user'];
		$table = '';
		$fFlag = false;
		
		if (substr( $new_user ,0,2) == 'te') {
			$table = 'teacher';
			
		} else if (substr( $new_user ,0,2) == 'st') {
			$table = 'student';
		} else {
			echo json_encode(array('success'=>-1));
			return;
		}
		$where = ' user_name = "'.substr( $new_user ,3).'" AND  delete_status=0 ';
		$flag = get_a_value_from_db ($table , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			$code = rand(100000,999999);
			$xarray = array (
							'code' => $code 
							);
				 
			$flaga = updateMe('teacher', $xarray, '`user_name` ="'.substr( $new_user ,3).'" AND  delete_status=0 ' );
			if($flaga ==1 ) { 
				$Dflaf = sendMsgFun($flag['mobile'],$flag['id']);
				echo json_encode($Dflaf);
			} else {
				echo json_encode(array('success'=>-1));
				return;
			}
			
			
			
		} else {
			
			echo json_encode(array('success'=>-1));
			return;
		}
		
	break;
	
	
 
 
 	case 'resent_mob_verf_fqtpass':
		$new_user = $_POST['new_user'];
		$table = '';
		$fFlag = false;
		
		if (substr( $new_user ,0,2) == 'te') {
			$table = 'teacher';
			
		} else if (substr( $new_user ,0,2) == 'st') {
			$table = 'student';
		} else {
			echo json_encode(array('success'=>-1));
			return;
		}
		$where = ' user_name = "'.substr( $new_user ,3).'" AND  delete_status=0 ';
		$flag = get_a_value_from_db ($table , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			
			$Dflaf =sendMsgFun($flag['mobile'],$flag['id']);
			echo json_encode($Dflaf);
			
			
		} else {
			
			echo json_encode(array('success'=>-1));
			return;
		}
		
	break;
	
	
 
 
  	case 'get_a_code_verfy_verf_fqtpass':
	
		$new_user = $_POST['new_user'];
		$user_key = $_POST['user_key'];
		$table = '';
		$fFlag = false;
		
		if (substr( $new_user ,0,2) == 'te') {
			$table = 'teacher';
			
		} else if (substr( $new_user ,0,2) == 'st') {
			$table = 'student';
		} else {
			echo json_encode(array('success'=>-1));
			return;
		}
		$where = ' user_name = "'.substr( $new_user ,3).'" AND  delete_status=0 ';
		$flag = get_a_value_from_db ($table , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			
			if($flag['code'] == $user_key ) {
				echo json_encode(array('success'=>1));
			} else {
				echo json_encode(array('success'=>2));	
			}
			
			
		} else {
			
			echo json_encode(array('success'=>-1));
			return;
		}
		
	break;
	
	
	
	
	case 'get_a_code_changeManf_fqtpass':
	
		$new_user = $_POST['new_user'];
		$user_key = $_POST['user_key'];
		$password = $_POST['password'];
		$table = '';
		$fFlag = false;
		
		if (substr( $new_user ,0,2) == 'te') {
			$table = 'teacher';
			
		} else if (substr( $new_user ,0,2) == 'st') {
			$table = 'student';
		} else {
			echo json_encode(array('success'=>-1));
			return;
		}
		$where = ' user_name = "'.substr( $new_user ,3).'" AND  delete_status=0 ';
		$flag = get_a_value_from_db ($table , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			
			if($flag['code'] == $user_key ) {
				
				
				
				$xarray = array (
							'code' => 0,
							'password' => $password 
							);
				 
			$flag = updateMe('teacher', $xarray, '`user_name` ="'.substr( $new_user ,3).'" AND  delete_status=0 ' );
				echo json_encode(array('success'=>$flag));
			} else {
				echo json_encode(array('success'=>2));	
			}
			
			
		} else {
			
			echo json_encode(array('success'=>-1));
			return;
		}
		
	break;
	
	case 'get_hodsAndTch':
		$flag = get_hodsAndTch_o();
		echo json_encode($flag);
	break;
 	
	case 'update_hod':
	
		$dp = $_POST['dp'];
		$teacher = $_POST['teacher'];
		$image = $_POST['image'];
		$showimage = "../assets/images/defalut.jpg";
		$imgFpath = $_SERVER['DOCUMENT_ROOT'] .'tech_teach/teacher/images_/'.$image;
		if(file_exists($imgFpath) && strlen($image)>0 ) {
			$showimage = ''.PATH.'/teacher/images_/'.$image;
			} 

		
			$xarray = array (
							'hod' => $teacher 
							);
				 
			$flag = updateMe('department', $xarray, '`did` = '.$dp);
		echo json_encode(array('success'=> $flag,
								'image' => $showimage));
	break;
	
	case 'updateARepalySplv':
		$replay = $_POST['replay'];
		$where = ' id='.$replay;
		$flag = get_a_value_from_db ('q_replay' , '*' ,$where);
		if (!empty($flag)) {
			$flag = $flag[0];
			
			if($flag['question'] >0 ) {
				
				$dome = get_a_value_from_db ('question' , '*' , '`id` ='.$flag['question']);
				$dome = $dome[0];
				if($dome['replay'] == $replay ) {
					$replay = NULL;
				}
				$xarray = array (
							'replay' => $replay 
							);
				 
			$flags = updateMe('question', $xarray, '`id` ='.$flag['question']);
			echo json_encode(array('success'=>$flags,
									'color' => $replay ));
			} else {
				
				echo json_encode(array('success'=>0));
			}
		} else {
				
				echo json_encode(array('success'=>0));
			}
		
	break;
	
	
	case 'view_A_qstBN':
		$qid = $_POST['qid'];
		$dome = get_a_value_from_db ('question' , '*' , '`id` ='.$qid);
		if(!empty($dome)) {
			$dome = $dome[0];
			echo json_encode(array('success'=>$dome['replay']));
		}
	break;
	
	case 'updateApost':
		$text = $_POST['text'];
		$postid = $_POST['postid'];
		$xarray = array (
							'message' => $text 
							);
				 
			$flags = updateMe('post', $xarray, '`post_id` ='.$postid);
			echo json_encode($flags);
		
		
	break;
	 
	 
	 case 'update-student':
			$user_name = $_POST['user_name'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname']; 
			$address = $_POST['address'];
			$mobile = $_POST['mobile'];
			
			
			$check = get_a_value_from_db ('student ' , '*' ,' delete_status=0 AND mobile= '.$mobile.' AND user_name != "'.$user_name.'"');
			
			$chrk6655498746=0;
			foreach($check as $v0alue) {
				$chrk6655498746 ++;
			}
			if($chrk6655498746>0) {
				echo json_encode(array('success'=>-2));
				return;
			}
			
			$xarray = array (
							'fname' => $fname ,
							'lname' => $lname ,
							'mobile' => $mobile ,
							'address' => $address 
							);
				 
			$flag = updateMe('student', $xarray, '`user_name` ="'.$user_name.'" AND  delete_status=0 ' );
			
				
			echo json_encode(array('success'=>$flag));	
	
	
	
	break;
	
		case 'delete_aStudent':
			
			$user_name = $_POST['user_name'];
			
			$flag = delete_aStudent_this( $user_name);
				
			echo json_encode(array('success'=>$flag));	
	
	break;
	
		case 'update_student_password':
			
			$cpassword = $_POST['cpassword'];
			$npassword = $_POST['npassword'];
			$rpassword =$_POST['rpassword'];
			
			if( 0 != strcmp( $npassword, $rpassword)) {
				echo json_encode(array('success'=>'0'));
				break;
			}
			
			$flag = setPasswrd_Studnt( $cpassword,$rpassword);
				
			echo json_encode(array('success'=>$flag));	
		
		
			
		break;
		
		case 'get-id-the-assignment':
			$subject = $_POST['subject'];
			$topic = $_POST['topic'];
			$final_date = $_POST['final_date'];
			$discri = $_POST['discri'];
			$created = $_POST['created'];
			
			$table = " assignment ";
			$column = " * ";
			$where = " subject =".$subject." AND  topic ='".$topic."'  AND  submission_date ='".$final_date."'  AND  description ='".$discri."' AND DATE(date) = DATE('".$created."')";	
			$flag = get_a_value_from_db($table, $column, $where );	
			$idD='';
			if(!empty($flag)) {
				$flag = $flag[0];
				$idD=$flag['id'];
			}
			
			echo json_encode($idD);	
		break;
		
		case 'update-the-assignment':
			$subject = $_POST['subject'];
			$topic = $_POST['topic'];
			$final_date = $_POST['final_date'];
			$discri = $_POST['discri'];
			$created = $_POST['created'];
			$ass_id = $_POST['ass_id'];
			
			
			$xarray = array (
							'subject' => $subject ,
							'topic' => $topic ,
							'submission_date' => $final_date ,
							'description' => $discri 
							);
				 
			$flag = updateMe('assignment', $xarray, '`id` ='.$ass_id );
			
				
			
			echo json_encode($flag);	
		break;
		
		case 'update_li_teacher_password':
		
			$cpassword = $_POST['cpassword'];
			$npassword = $_POST['npassword'];
			$rpassword =$_POST['rpassword'];
			
			if( 0 != strcmp( $npassword, $rpassword)) {
				echo json_encode(array('success'=>'0'));
				break;
			}
			
			$flag = setPasswrd_li_thr( $cpassword,$rpassword);
				
			echo json_encode(array('success'=>$flag));	
		
		
		break;
		
		case 'new_paswrd_for_libra':
		
			$code = rand(11111111,99999999);
			$xarray = array (
							'password' => $code
							);
				 
			$flag = updateMe('library', $xarray, 'user_name = "library@techteach.com"' );
			
			if( $flag != 1) {
				$code = 0;
			}
			
			echo json_encode($code);	
		break;
		
	case 'getABook':	
		
		$user_name = $_POST['user_name'];
		$table = " book ";
		$column = " * ";
		$where = " id =".$user_name;	
		$flag = get_a_value_from_db($table, $column, $where );	
		echo json_encode($flag);	
		
	break;
	
	case 'update-Book':
			$user_name = $_POST['user_name'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname']; 
			$address = $_POST['address'];
			$mobile = $_POST['mobile'];
			$noc = $_POST['noc'];
			
			
			
			$xarray = array (
							'name' => $fname ,
							'author' => $lname ,
							'edition' => $mobile ,
							'noc' => $noc, 
							'description' => $address 
							);
				 
			$flag = updateMe('book', $xarray, '`id` ='.$user_name.'' );
			
				
			echo json_encode(array('success'=>$flag));	
	
	break;
	
	case 'update_the_post_to_all':
	
		$subject = $_POST['subject'];
		$description = $_POST['description'];
		$attachment = $_POST['attachment'];
		$sessi = NULL;
		session_start();
		if(isset($_SESSION['te'])) {
			$sessi = $_SESSION['te'];
		} else if(isset($_SESSION['st'])) {
			$sessi = $_SESSION['st'];
		} else if(isset($_SESSION['li'])) {
			$sessi = $_SESSION['li'];
		} else if(isset($_SESSION['ad'])) {
			$sessi = $_SESSION['ad'];
		}else if(isset($_SESSION['admin'])) {
			$sessi = $_SESSION['admin'];
		} else {
			return 0;
		}
		
		
		
		$flag = updateSayToadminposr($subject, $description, $attachment, $sessi);
			
				
			echo json_encode($flag);	
				
		
	break;
	
	case 'ckeckNotification':
		$total = $_POST['total'];
		$flag = ckeckNotification_($total );
		
		echo json_encode($flag);	
	break;
		
	case 'get_semS':
		$class = $_POST['class'];
		$value = $_POST['value'];
			$flag = get_a_value_from_db('class_subject', 'DISTINCT sem_id','  year="'.$value .'" AND cid ='.$class);	
		echo json_encode($flag);	
		
		
	break;
	
	case 'get_subYhtS':
		$class = $_POST['class'];
		$year = $_POST['year'];
		$value = $_POST['value'];
		$array = array();
			$flag = get_a_value_from_db('class_subject', '*','  year="'.$year .'" AND cid ='.$class.' AND sem_id='.$value);	
			foreach($flag as $VcVale) {
			$flagx = get_a_value_from_db('subject', '*','  sub_id='.$VcVale['sid']);
			$flagx = $flagx[0];
			$naBane = $flagx['sub_name'];
			
				array_push($array , array('id'=> $VcVale['sid'] ,
							'name' => $naBane
				 ));	
			}
			
			
		echo json_encode($array);	
		
		
	break;
	
	case 'get_each_detailsS':
		$value = $_POST['value'];
			$flaga = get_a_value_from_db('exam', '*',' subject='.$value);	
			
			$flagb = get_a_value_from_db('assignment', '*',' subject='.$value);
			
			
		echo json_encode(array('exam'=> $flaga ,
							'assignment' => $flagb
				 ));	
		
		
	break;
	
	case 'create_this_data':
		
		$class = $_POST['class'];
		$array = $_POST['array'];
		
		$flagb = crreateThRplrt($class, $array );
		echo json_encode($flagb);
	break;
	
	
	}
}



?>