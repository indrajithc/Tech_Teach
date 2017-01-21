
<?php
	try {
		require_once('../includes/db.php');
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
	
		function get_a_value_from_db ($table , $column ,$where) {
		global $a;
		$result = array();
		$query = 'SELECT '.$column.' FROM '.$table.' where '.$where;
		
		$result = $a->display($query) ;
		//echo $result[0] ;
		
		return $result ;
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


function sendAmessageVerfivation($mobile, $code) {
$dola_oip = false;

	return true;

$sendMsg = "welcome to TechTeach.com
			use ".$code." as TechTeach account security code";
	$status = sendSms( $mobile, $sendMsg );
		//$status = 'success';
		if( $status == 'success' ) {
			$dola_oip = true;
		} else {
			$dola_oip = false;	
		}
	return $dola_oip;
}
function sendSms( $no , $msg ) {
		
		return file_get_contents( "http://aastarthemes.com/smsgateway/sendsms.php?action=send_sms&no=".$no."&msg=".rawurlencode($msg)."&key=9Y0Y2lDpMs1I9PuU4z8OuvhYi" );
		
	}
	


?>