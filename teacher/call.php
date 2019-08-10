
<?php

include( 'header.php'); 

?>


<?php
$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".substr($_SESSION['te'],3)."'";
$OUTTresult = $a->display($query);
$OUTTresult = $OUTTresult[0];
?>

<div class="row">
	<div class="page-heading">
		<h3>subject</h3>
	</div>
	<div class="tab-content">
		
		<div role="tabpanel" class="tab-pane active" id="view-class">
			
			<!-- ---------------------------------------------------------------------------------- -->                   
			
			<div class="top_add_new_item" style="text-align: left;">
				<!-- Trigger the modal with a button -->
				<?php 
				
				if (true) { 
					?><!-- data-toggle="modal" data-target="#myModal" -->
					<form action="../video.php" method="post">
						<input type="hidden" class="hidden" name="user_name" value="<?php echo substr($_SESSION['te'],3) ?>" id="my_user_name_for_you">
						<input type="hidden" class="hidden" name="user_id" value="<?php echo substr($_SESSION['te'],3) ?>">
						<input type="hidden" class="hidden" name="type" value=<?php echo 1; ?>>
						
						<input type="hidden" class="hidden" name="department" value="<?php   echo $OUTTresult['department']; ?>" id="tosele56859656f" dp_id="<?php   echo $OUTTresult['department']; ?>">
						
						<input type="hidden" class="hidden"  name="key"  value="" id="myad_fot_this_key">
						
						<button type="submit" class="btn btn-primary hidden" id="nake_a_newVido_call"><i class="fa fa-plus-circle"  >  make a new call</i> </button>
						
					</form>
					
					
					<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal"  ><i class="fa fa-plus-circle"  >  make a new call</i> </button>
					<?php 
					
				}
				
				?>

			</div>
			<form name="view-class" id="view_class">  
				<div class="row head_notif2">
					<table class="table table-hover tablesorter" id="view_table10">
						<thead  class="header">
							<tr class="success" >
								
								<th  style='width:33.3%;' ><font color="#FFFFFF">To</th>
									<th style='width:33.3%;' ><font color="#FFFFFF">description</th>  
										<th style='width:33.3%;'><font color="#FFFFFF">time</th> 
											
										</tr>
										
									</thead>
									<tbody id="mytbodyI_dt">
										<?php
										$query = "SELECT * FROM `call` WHERE owner ='".substr($_SESSION['te'],3)."'  ORDER BY `call`.`date` DESC";
									//echo $query ;
										$result = $a->display($query);
										
										
										$sno =1 ;
										foreach ( $result as $value) {
											
											
											
											$sta_00tus = '';
											$t_to = '';
											$t_to_main = '';
											switch ($value['to']) {
												case 'te':
												$t_to_main = ' to all teachers';
												break;
												case 'cl':
												$t_to_main = ' classes in this department';
												break;
												case 'teacher':
												$t_to_main = 'teachers';
												$query = "SELECT * FROM `call_to` WHERE call_to.call =  ".$value['id'];
												$tempDDd = $a->display($query);
												foreach ($tempDDd as $xva) {
													if(strlen($xva['target'])>0) 
														$t_to = $t_to.'
													';
													
													$teus ='';
													$query="SELECT * FROM `teacher` WHERE  delete_status=0 AND id = ".$xva['target'];
													$tempd = $a->display($query);
													if(!empty($tempd)) {
														$tempd = $tempd[0];
														$teus = $tempd['user_name'];
														
													}
													
													$t_to = $t_to.$teus;
												}
												
												break;
												
												
												case 'student':
												$t_to_main = 'students';
												$query = "SELECT * FROM `call_to` WHERE call_to.call =  ".$value['id'];
												$tempDDd = $a->display($query);
												$uy = true;
												foreach ($tempDDd as $xva) {
													if(strlen($xva['target'])>0) 
														$t_to = $t_to.'
													';
													
													$teus ='';
													$query="SELECT * FROM `student` WHERE user_name = '".$xva['target']."'";
													$tempd = $a->display($query);
													if(!empty($tempd)) {
														$tempd = $tempd[0];
														if($uy)  {
															$t_to = '-'.returnClaseeForMe ($tempd['class']).'-
															';
															$uy = false;
														}
														$teus = $tempd['fname'].' '.$tempd['lname'];
														
													}
													
													$t_to = $t_to.$teus;
												}
												
												break;
												
												
												
												default :
												if($value['type'] == 2 && $value['to']>0) {
													$t_to_main = 'all students in '.returnClaseeForMe ($value['to']);
													
												}
												if($value['type'] == 3 && $value['to']>0) {
													$t_to_main = 'all parents in '.returnClaseeForMe ($value['to']);
													
												}
												
											}
											
											
											
											
											$datse = date_create($value['date']);
											$datse = date_format($datse,"Y-m-d");
											
											echo "<tr><td style='width:33.3%; padding-left: 15px;' id='".$value['id']."' class='hover_action_deta'  data-toggle='tooltip' title='".$t_to."'>".
											$t_to_main.
											"
											</td><td  style='width:33.3%; padding-left: 15px;'> <textarea disabled>".
											$value['description'].
											"</textarea></td><td  style='width:33.3%; padding-left: 15px;'>".
											$datse.
											"<span class='glyphicon glyphicon-earphone' aria-hidden='true' style='float:right; padding-right:20px;'></span></td></tr>";
											$sno++;
										}
										
										
										
										
										?>
										
									</tbody>
								</table>       	                                   
								
							</div>
							
							
							
							
						</form>
						
						
						
						<!-- ---------------------------------------------------------------------------------- -->                            
						
						
						
						
					</div>
				</div>
			</div>




			
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog my-modal-dialog">

					<form name="addAsubDet" id="addAsubDetHere">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">select</h4>
							</div>
							<div class="modal-body">
								<div class="row ">
									<div class="col-md-offset-1 col-md-5 mod_ma_cl">
										<input type="button"  class="btn btn-primary wid100" id="model_o_1" value='teacher' dpt_id="<?php   echo $OUTTresult['department']; ?>">
									</div>    
									<div class=" col-md-5 mod_ma_cl">
										<input type="button" class="btn btn-primary wid100" id="model_o_2" value="student" >
									</div>    
									
									
								</div>
								<div class="row mycust_modl_body" style="height: 460px;">
									<div class="col-md-12 ">
										<div class="col-md-4 ">
											
										</div>
										
										<div class="col-md-4 hidden">
											<button type="button" id="ist_check_bo_20" class="btn btn-warning  button_for_ button_for_0">uncheck</button> 
											<button type="button" id="ist_check_bo_21" class="btn btn-warning  button_for_ button_for_1">check all</button>
										</div>
										
										<div class="col-md-4 hidden">
											<button type="button" id="ist_check_bo_30" class="btn btn-warning  button_for_ button_for_0">uncheck</button>
											<button type="button" id="ist_check_bo_31" class="btn btn-warning  button_for_ button_for_1">check all</button>
										</div>
									</div>
									<div class="col-md-12 ">
										<div class="col-md-4 myinnr_modl">
											<div class="div_Scrool_in" id="div_Scrool_in_001">
												
												
											</div>
										</div>
										<div class="col-md-4 myinnr_modl" >
											<div class="div_Scrool_in" id="div_Scrool_in_002">
												
												
											</div>
										</div>
										<div class="col-md-4 myinnr_modl" >
											<div class="div_Scrool_in" id="div_Scrool_in_003">
												
												
											</div>
										</div>
									</div>
									
									<div class="col-md-12 ">
										<textarea placeholder="description.." id="main_notf_des" style="
										min-width: 100%;
										max-width: 100%;
										min-height: 57px;
										max-height: 57px;
										"></textarea>
										
									</div>
									
								</div>
							</div>
							<div class="modal-footer">
								
								<input type="button" class="btn btn-primary" value="submit" id="submitaddbutton_okay">
							</form>

							<button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton_4ofr_alrt" >Close</button>
						</div>
					</div>
				</div>
			</div>


			<?php
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
					return $yearsWord.'  '.$Cvalue['division'];
				} else {
					return "no class in charge";
				}
				
				
			}

			?>








			<?php include_once('footer.php'); ?>
