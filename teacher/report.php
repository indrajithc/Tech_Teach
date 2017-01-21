
<?php

include( 'header.php'); 


?>


<?php
	$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".substr($_SESSION['te'],3)."'";
	$OUTTresult = $a->display($query);
	$OUTTresult = $OUTTresult[0];
?>
     
   <div class="row" style=" margin-top: -20px;">
		    <div class="page-heading">
			    <h3>generate report</h3>
		    </div>
		<div class="tab-content muclassfoehei">
			<div class="row" style="
    margin-bottom: 30px;
">
            	<div class="col-md-3">
                <div class="glovB545454">
                    <label class_id="<?php  echo $OUTTresult['class_id']; ?>" id="actlClassHereDi"><?php echo returnClasee( $OUTTresult['class_id']); ?></label>
                	
                    
                 </div>  
                 
                   <div class="glovB545454">
                    <label> select year</label>
                	<select id="selectTheYearThis">
                    <option disabled selected>select</option>
                    <?php
					$query = "SELECT DISTINCT year FROM `class_subject` WHERE  cid=".$OUTTresult['class_id'];
					$year4s = $a->display($query);
						foreach($year4s as $vaDle) {
							echo '<option value="'. $vaDle['year'].'">'. $vaDle['year'].'</option>';
						}
					?>
                    	
                    </select>
                 </div>  
                 
                   <div class="glovB545454">
                    <label> select semester </label>
                	<select id="select_semtr_th">
                    </select>
                 </div> 
                 
                  <div class="glovB545454">
                    <label> select subjects</label>
                	<select id="selectThSubJecTsHere">
                    	<option></option>
                    </select>
                 </div>  
                </div>
                <div class="col-md-8">
               <div class="col-md-12">
                <div class="eachclassHere">
                	<div class="col-md-2">
                    	<input type="checkbox" class="thisisthecjekboxhope949693" data_id="1" data_item="student" value="no:"> no
                    </div>
                    <div class="col-md-2 hidden">
                    	<input type="checkbox"  class="thisisthecjekboxhope949693" data_id="2" data_item="student" value="roll no:" > roll no
                    </div>
                     <div class="col-md-2">
                    	<input type="checkbox"  class="thisisthecjekboxhope949693" data_id="4" data_item="student" value="name" > name
                    </div>
                     <div class="col-md-2">
                    	<input type="checkbox"  class="thisisthecjekboxhope949693" data_id="3" data_item="student" value="reg no:" > reg no
                    </div>
                    
                     <div class="col-md-2" style="border-right:none;">
                    	<input type="checkbox"  class="thisisthecjekboxhope949693" data_id="5" data_item="student" value=" mobile" > mobile
                    </div>
                    <div class="col-md-2" style="border-right:none;">
                    	<input type="checkbox"  class="thisisthecjekboxhope949693" data_id="8" data_item="student" value=" image" > image
                    </div>
                    
               </div>
               <div class="eachclassHere">     
                    
                     <div class="col-md-3">
                    	<input type="checkbox"  class="thisisthecjekboxhope949693" data_id="6" data_item="student" value="parent name" > parent name
                    </div>
                     <div class="col-md-3">
                    	<input type="checkbox"  class="thisisthecjekboxhope949693" data_id="7" data_item="student" value="parent mobile" > parent mobile
                    </div>
               
               </div> 
                
               
               </div>
               
               
               
               <div class="col-md-12" id="showMarkAndLists">
               <div>
               <label> exams</label>
                    <div class="col-md-12 commonemfhjthriut" id='ecamfjsdfhsjkfd'>
                    
                    </div>
                 </div>
                 
                 <div>   
               <label> assignment</label>
                     <div class="col-md-12 commonemfhjthriut" id='assgnfjsdfhsjkfd'>
                    
                    </div>
				</div>
                
               </div>
                    
                </div>
            </div>	
            
            <label >columns</label>
            <div class="row myClasDisplayThis" id="appentAll_here949693">
              
              <!--
              <div class="tis0thud0thuis"><label>  thihdf</label><span class="glyphicon glyphicon-remove thisCkik949693" aria-hidden="true" style="float:right;cursor:pointer;"></span></div>
              
              -->
            </div>	 
            <div class="" style="
    padding: 20px;
    text-align: right;
">
            	<input type="button" value="create list " id="createTthepdfmanfuckit" class="btn"/>
            </div>
            
            <div class="row table-responsive_thisShit" id="actualHentrtListHere">
              
              
            </div>	 

   <div class="" style="
    padding: 20px;
    text-align: right;
">
<form action="../pdf.php" method="post" id="subThiS949693">
<input type="hidden" name="table" id="thisPosthshit" value="">
            	<input type="submit" value="save as pdf " id="saveAsPdfpdfmanfuckit" class="btn"/>
                </form>
            </div>
            
	    </div>
    </div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="addAExamDet" id="addAexamDetHere">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add A New Exam</h4>
      </div>
      <div class="modal-body">
         <div class="row">
                        	 


          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="submit" id="">
</form>
		<button class="btn btn-primary" id="clear_me" ><i class="fa fa-eraser"> clear</i></button>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbuttonf" >Close</button>
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


<?php include_once('footer.php'); ?>
