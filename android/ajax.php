
<?php
include_once 'function.php';
if( isset($_POST['action'])   ) {
 	
	switch( $_POST['action'] ) {
		
		
	case 'my_students':
		
		$class = $_POST['id'];
		
	
	
		
		$table = '`student` s LEFT JOIN parent p on s.sid=p.st_id ';
		$column = 's.sid AS sid, s.fname AS fname, s.lname AS lname, s.user_name AS user_name, s.class AS classAnInt, s.sex AS sex, s.mobile AS mobile, s.image AS image, p.name AS parent_name, p.mobile AS parent_mobile ';
		$where = ' s.delete_status=0 AND s.class ='.$class;
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		foreach($flag as $kk=>$value) {
				foreach($value as  $k=>$each) {
					if($k == 'image') {
						$image = $each;
						$root =  $_SERVER['DOCUMENT_ROOT'] ;
						$showimage ="tech_teach/assets/images/defalut.jpg";
						$imgFpath ='tech_teach/student/images_/'.$image;
						
						if(file_exists($root.$imgFpath) && strlen($image)>0 ) {
							$showimage = $imgFpath ;
							} 
							$image =$showimage;
						$value[$k] = $image;
					}
					$flag[$kk] = $value;
				}
			
			
			
		}
		
		echo json_encode( $flag );
	break;
	
	case 'cke_this_user_name':
		
		$user_name = $_POST['user_name'];
		$mobile = 0;
		$table = 'teacher';
		$column = '*';
		$where = ' delete_status=0 AND user_name="'.$user_name.'"';
		$flag = get_a_value_from_db ($table , $column ,$where);
		$string ="";
		foreach( $flag as $value) {
			$string ="sent a text message with 6 digit code to ".$value['mobile']." Please enter it below";
			$mobile = $value['mobile'];
		}
		$code = rand(100000,999999);
		
		if( sendAmessageVerfivation($mobile, $code)) {
			
			echo json_encode( array( 0=> array( 'myMessage' => $string.$code,
								 'myCode' => $code)
		)); 
		} else {
			echo json_encode( array( 0=> array( 'myMessage' => " sorry :( ",
								 'myCode' => "")
		));
	
		}
		
		
	
	break;
	
	case 'getAuser_details':
		
		$user_name = $_POST['user_name'];
		$mobile = 0;
		$table = 'teacher';
		$column = '*';
		$where = ' delete_status=0 AND user_name="'.$user_name.'"';
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		
		      //String user_name
                                    // String fname
                                    // String lname
                                    // String sex
                                    // String address
                                    // String mobile
                                    // int deoartment
                                    // int class_id
                                    // String deoartment_name
                                    // String class_id_name
                                    // String image
		$myArray = array();
		
		foreach( $flag as $value) {
			
			$deoartment_name = '';
			$class_id_name = '';
			
			$fgggg = get_a_value_from_db ('department', '*' ,' did='.$value['department']);
			$fgggg = $fgggg[0];
			$deoartment_name  = $fgggg['name'];
			
			
			$class_id_name  =returnClaseeForMe ( $value['class_id']);
			$image = $value['image'];
						$root =  $_SERVER['DOCUMENT_ROOT'] ;
						$showimage ="tech_teach/assets/images/defalut.jpg";
						$imgFpath ='tech_teach/teacher/images_/'.$image;
						
						if(file_exists($root.$imgFpath) && strlen($image)>0 ) {
							$showimage = $imgFpath ;
							} 
							$image =$showimage;
			
			
			array_push($myArray , array('user_name'=> $value['user_name'],
										'fname'=> $value['fname'],
										'lname'=> $value['lname'],
										'sex'=> $value['sex'],
										'address'=> $value['address'],
										'mobile'=> $value['mobile'],
										'department'=> $value['department'],
										'class_id'=> $value['class_id'],
										'department_name'=> $deoartment_name,
										'class_id_name'=> $class_id_name,
										'image'=> $image,
			
				)
			);
			
		}
		
		
		
			echo json_encode($myArray);
		
	break;
	
	case 'get_my_subjects':
		
		$user_name = $_POST['user_name'];
		
	
	
		
		$table = ' `subject` s LEFT JOIN class_subject cs ON cs.sid=s.sub_id LEFT JOIN teacher t ON t.id=cs.tid ';
		$column = ' s.*, cs.* ';
		$where = ' t.user_name ="'.$user_name.'"';
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		
		
		
		$myArray = array();
		
		foreach( $flag as $value) {
			
			
                $currntMonth =(int)date("m");
			   $currntYear =  date("Y");
				$startYeat = substr($value['year'],0,4);
                $finalYear = substr($value['year'],5);
                $date1=date_create($startYeat.'-01-01');
                $date2=date_create($currntYear.'-01-01');
                $diff=date_diff($date1,$date2);
                $yearsNo = $diff->format("%R%Y");
                $noOfYearz = (int)$yearsNo;
                if($currntMonth < 4 ) {
                    $noOfYearz = $noOfYearz-1;
                }
			
			if ($noOfYearz ==1) {
					
				array_push($myArray , array('sub_id'=> $value['sub_id'],
											'sub_nmae'=> $value['sub_name'],
											'description'=> $value['description'],
											'sem_id'=> $value['sem_id']
				
					)
				);
				
				
				
			}
		}
		//var_dump( $myArray);
			echo json_encode($myArray);
		
		
		
		
	break;
	
	
	
		
	case 'get_my_classes':
		
		$user_name = $_POST['user_name'];
		
	
	
		//SELECTFROM WHERE t.user_name = 'prasanths@ym.com'
                                 
		$table = '`sub_class`sc LEFT JOIN class_subject cs ON sc.class_id=cs.cid LEFT JOIN teacher t ON t.id=cs.tid ';
		$column = '  sc.*, cs.*  ';
		$where = ' t.user_name ="'.$user_name.'"';
		$flag = get_a_value_from_db ($table , $column ,$where);
		
		
		
		
		$myArray = array();
		
		foreach( $flag as $value) {
			
			
                $currntMonth =(int)date("m");
			   $currntYear =  date("Y");
				$startYeat = substr($value['year'],0,4);
                $finalYear = substr($value['year'],5);
                $date1=date_create($startYeat.'-01-01');
                $date2=date_create($currntYear.'-01-01');
                $diff=date_diff($date1,$date2);
                $yearsNo = $diff->format("%R%Y");
                $noOfYearz = (int)$yearsNo;
                if($currntMonth < 4 ) {
                    $noOfYearz = $noOfYearz-1;
                }
			
			if ($noOfYearz ==1) {
					
				array_push($myArray , array('class_id'=> $value['class_id'],
											'class_name'=> returnClaseeForMe ( $value['class_id']),
											'sub_id'=> $value['sid'],
											'division'=> $value['division'],
											'sem_id'=> $value['sem_id']
				
					)
				);
				
				
				
			}
		}
		//var_dump( $myArray);
			echo json_encode($myArray);
		
		
		
		
	break;
	
			
	case 'set_Attendance_bse':
		
		

		$id =  $_POST['id'] ;
		$sid =  $_POST['sid'] ;
		$division = $_POST['division'];
				$sem_id = $_POST['sem_id'];
	 			$sub_id =  $_POST['sub_id'] ;
	 			$hour_id =  $_POST['hour_id'] ;
				$teacher_id = $_POST['teacher_id'];
				$date = $_POST['date'];
	$cvu = 0; 
	$query = ' SELECT * FROM global_attendance_base WHERE local_id = '.$id.' AND class_id = '.$sid.' AND hour_id ='.$hour_id.' AND sem_id='.$sem_id.' AND sub_id='.$sub_id ;
	$op = $a->display($query);
	if(!empty($op)) {
		
		
	foreach($op as $va) {
		$cvu++;
	}
	
	}
	if($cvu>0) {
		return false;
	}
	
  
				$query = "INSERT INTO `tech_teach`.`global_attendance_base` ( `local_id`, `class_id`, `hour_id`, `sem_id`, `sub_id`, `teacher_id`, `taken_time`, `date`) VALUES (  :local_id ,:class_id ,:hour_id ,:sem_id, :sub_id, :teacher_id , :taken_time , :date );";
						
						$outpt;
						
						if ($a->execute_data($query, array(':local_id'=> $id ,':class_id' => $sid ,':hour_id' => $hour_id, ':sem_id'=>$sem_id, ':sub_id'=>$sub_id ,':teacher_id' => $teacher_id , ':taken_time' => $date , ':date'=> date("Y-m-d H:i:s")  ))) {
							
							$outpt = true;
								
						} else {
							$outpt = false;
						}
					 
	 
			echo json_encode(array ( "0" => array ('success' => $outpt
		)
		));

	break;
	
	case 'set_attendance_child':
	
	
		$attendance_id =  $_POST['attendance_id'] ;
		$student =  $_POST['student'] ;
		
		$user_id =  $_POST['user_id'] ;
					 
		$cvu = 0; 
	$query = ' SELECT * FROM global_attendance_child WHERE attendance_id = '.$attendance_id.' AND student = "'.$student.'" AND user_id="'.$user_id.'"';
	$op = $a->display($query);
	if(!empty($op)) {
		
		
	foreach($op as $va) {
		$cvu++;
	}
	
	}
	if($cvu>0) {
		return false;
	}
	
  				 
				$query = "INSERT INTO `tech_teach`.`global_attendance_child` (  `attendance_id`, `student`, `user_id`, `date`) VALUES ( :attendance_id, :student, :user_id, :date)";
						
						$outpt;
						
						if ($a->execute_data($query, array(':attendance_id'=> $attendance_id ,':student' => $student, ':user_id'=> $user_id, ':date'=> date("Y-m-d H:i:s")  ))) {
							
							$outpt = true;
								
						} else {
							$outpt = false;
						}
					 
					 
					 
					 
	 
			echo json_encode(array ( "0" => array ('success' => $outpt
		)
		));
	break;
	
	case 'prev_students_details':
	
		$class_id = $_POST['class_id'];
		$hour__id = $_POST['hour_id'];
		$date = date("Y-m-d H:i:s");
		
					 
		$cvu = 0; 
	$query = 'SELECT * FROM `global_attendance_child` gc LEFT JOIN global_attendance_base gb ON gb.local_id= gc.attendance_id WHERE gb.class_id ='+$class_id+'AND gb.hour_id ='+$hour__id+' AND DATE(gb.taken_time) = CURDATE()';
	$flag = $a->display($query);
	


		$myArray = array();
		
		foreach( $flag as $value) {
			
			array_push($myArray , array('attendance_id'=> $value['attendance_id'],
										'student'=> $value['student']
			
				)
			);
			
		}
		
		
		
			echo json_encode($myArray);
		
	break;
	
	case 'getPreClassAtee':
		$class_id = $_POST['class_id'];
		$hour__id = $_POST['hour_id'];
		
		
		array_push($myArray , array('attendance_id'=> $class_id,
										'student'=> $hour__id.""
			
				)
			);
	
	
				echo json_encode($myArray);
	break;
	
	}
}



?>