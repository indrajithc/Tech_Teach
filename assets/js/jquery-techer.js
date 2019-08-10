$(document).ready(function(e) {
		
		 //console.log( "window READY" );
		  jQuery("time.timeago").timeago();
		  $('[data-toggle="tooltip"]').tooltip();
		  var global_id_for_btt1;
		   var global_id_for_btt2;
		  	$custwidthc = $("#custHrenvid > li").length;
			$("#custHrenvid").width((160*$custwidthc));
			//console.log((160*$custwidthc));
			
			  $('#exam1').datepicker({
                    format: "dd/mm/yyyy"
                });  
			
	
	/////////////////////////////////
	var arrayOfnotifc = [];  
	var arrayOfnotifc_name = [];  
	////////////
	
	
	//////////
	//////////////////////
	////////////////////////////////
	///////////////////////////////////////////////////
	var $elem = $('#display_deta_id'), l = $elem.length, i = 0;
	comeOn();
	function comeOn() {
		$elem.eq(i % l).fadeIn(1700, function() {
			$elem.eq(i % l).fadeOut(1000, comeOn);
			i++;
			////console.log(l);
		});
	}
	
	
	//////////////////////////
	///////////////
	///////////
	
	
			
		$('#prfyl_teacher').validate({
		  	
		   rules: { 
				 fname:{required: true},
				 lname:{required: true},
				 mobno:{required: true}
			}, 
			submitHandler: function(form, event){
				
				
				te_firstname = $('#te_firstname').val();
			    te_lastname = $('#te_lastname').val();
				te_adname=$('#te_adname').val();
				te_mobno = $('#te_mobno').val();
				
				//alert(te_firstname + te_lastname +'\n'+ te_mobno +'\n' 	te_pass + te_repass );
				
				$.post(ajax_url,{action:'update_teacher',f_name:te_firstname,l_name:te_lastname,ad_name:te_adname,mbno:te_mobno},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(response.success){
								alert("successfully submitted  ");/*
								$('#te_firstname').val('');
								$('#te_lastname').val('');
								$('#te_adname').val('');
								$('#te_mobno').val(''); */
							}
							else{
								alert("failed to save  ");		
							}
					
						});	
				
			}
		});
		
		
		
		
	$('#passshow').change(function() {
		$("#toppassrea").removeClass("hidden");
       
    });
		
		
		
	$('#cutThisScreen').click(function() {
    	jztAbvE();
		$('#te_cpass').val('');
		$('#inputPassword').val('');
		$('#te_repass').val('');
		$('#repassStat').text('');
    });
		
	function jztAbvE() {
		$("#toppassrea").addClass("hidden");
		$('#passshow').prop('checked', false);	
	}
	
	
	
	
	
	
	$('#passChnge').validate({
		  	
		   rules: { 
				 pass:{required: true},
				 repass:{required: true},
				 cpass:{required: true}
			}, 
			submitHandler: function(form, event){
				
				
				$cpassword = $('#te_cpass').val();
			    $npassword= $('#inputPassword').val();	
				$rpassword=$('#te_repass').val();
				
				if($npassword != $rpassword) {
				//alert('password mismatch ' );
				return ;	
				}
				
				//alert(te_firstname + te_lastname +'\n'+ te_mobno +'\n' 	te_pass + te_repass );
				
				$.post(ajax_url,{action:'update_teacher_password',cpassword:$cpassword, npassword:$npassword, rpassword:$rpassword},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(1==response.success){
								alert("successfully submitted  ");
								$('#te_cpass').val('');
								$('#inputPassword').val('');
								$('#te_repass').val('');
								$('#repassStat').text('');
								jztAbvE();
							} else if (response.success == -1 ) {
								alert("current password invalid  ");
							} else {
								alert("error  ");		
							}
					
						});	
				
			}
		});	
		
		
		$('.testPasswrdLastHere').keyup(function(){
			$cpassword = $('#te_cpass').val();
			$npassword= $('#inputPassword').val();	
			$rpassword=$('#te_repass').val();
			if($cpassword.length > 0 && $npassword.length > 0 && $rpassword.length > 0 ) {
				if($npassword != $rpassword) {
					$('#repassStat').css('color' ,'#FF0004');
					$('#repassStat').text('password mismatch');

				} else {				
					$('#repassStat').css('color' ,'#2AFF00');
					$('#repassStat').text('ready to go');
					
				}
				
			}
		
		});
		
		
		
		
		
		
		
		
		
		
		
		
	$("#departmenttt li a").click(function(e){
		     e.preventDefault();
 		 selText = $(this).text();
		 $('#setDivisionText').attr('ind_value','0');
		 $('#setDivisionText').attr('ind_name','');
		 $dpid = $(this).attr("value"); 
		 
		 $('#setClassText').attr('ind_name',selText);
 		 $(this).parents('#btn-group2').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		 
		 $('#divisionntt').empty();
		 $('#setDivisionText').text('Division');
		 
		 $('#divisionntt').parents('#btn-group2').find('.dropdown-toggle').append('<span class="caret"></span>');
		 $.post(ajax_url,{action:'view-class-values-suj-class',classid:$dpid},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length; 
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				 $tempString=$tempString+'<li><a value="'+op_response.class_id+'" href="#">'+op_response.division+'</a></li>';
			
			}
			$('#divisionntt').append($tempString).end().appendTo('#divisionntt');
		});	
		
		 
		// testThatTheClassWithOrWithoutAteacher($('#divisionntt li a').attr("value"));
		// global_department = $dpid;
		$('#setClassText').attr('ind_value',$dpid);
	});
	
	
	$(document).on('click', '#divisionntt li a' ,function(e) {
    	 e.preventDefault();
 		 selText = $(this).text();
		 $dpid = $(this).attr("value"); 
		 
		 $('#setDivisionText').attr('ind_name',selText);
 		 $(this).parents('#btn-group3').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		 $divis = $(this).attr("value"); 
		 $('#setDivisionText').attr('ind_value',$dpid);
	
		 
	});	
	
	
	$('#selectAsub').validate({
		  	
		   rules: { 
			}, 
			submitHandler: function(form, event){
				
				$bata = $('#setClassText').attr('ind_value');
				$divt = $('#setDivisionText').attr('ind_value');
				
				$bataa = $('#setClassText').attr('ind_name');
				$divta = $('#setDivisionText').attr('ind_name');
				$semsele = null;
				$semsele = $('#semid :selected').text();
				
				//console.log($bata+$bataa+'  '+$divt+$divta);
				
				$submit = $('#add_student input[type="submit"]');
				$submit.attr('disabled','disable');
				
				if($bata>0) {
					if($divt>0) {
						
						$("#selectedclassi").html('   '+$bataa+' / '+$divta+' / sem '+$semsele);
						$_Strtt = parseInt($bataa.substring(0,4));
						$_ebdd = parseInt($bataa.substring(5));
						S_strh ='';
						//$("#selectedclassi").html('Add A New Subject');
						for ($iu=1,$io=$_Strtt; $io<$_ebdd; $iu++,$io++ ) {
						S_strh = S_strh+ "<option data ='"+$io+"-"+($io+1)+"'>"+$io+"-"+($io+1)+"   ( "+$iu+" year"+" )</option>";						
						}
						//console.log(S_strh);
						$('#selectduratuinyr').append(S_strh);
					}
					
				}
				
				
					
				$submit.removeAttr('disabled');
				
				
			$('#submitclosebutton').trigger('click');
			}
			
			
		});
			
	$("#selectedclass").click(function(e) {
		$("#selectedclassi").html(' select a class');
		$('#setDivisionText').attr('ind_value','0');
		$('#setDivisionText').attr('ind_name','');	
		
	});
	
	
		$("#submitclosebutton").click(function(e){
	$('#divisionntt').empty();
	$('#setDivisionText').text('Division');	
		 
		});	
		
	
			
		
	$("#divisionntt5 li a").click(function(e){
		 e.preventDefault();
 		 selText = $(this).text();
		 $dpid = $(this).attr("value"); 
 		 $(this).parents('#btn-group5').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		 $('#btn-group5').attr('ind_value',$dpid);
		 
		
		 
		global_id_for_btt1 = $(this);
	});
	
	
		$("#divisionntt6 li a").click(function(e){
		 e.preventDefault();
 		 selText = $(this).text();
		 $dpid = $(this).attr("value"); 
 		 $(this).parents('#btn-group6').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		 $('#btn-group6').attr('ind_value',$dpid);
		 
		
		 
		global_id_for_btt2 = $(this);
		// testThatTheClassWithOrWithoutAteacher($('#divisionntt li a').attr("value"));
		// global_department = $dpid;
		//$('#setClassText').attr('ind_value',$dpid);
	});
	
	
	
	$('#saveaclasssub').click(function(e){
		$class_id = $('#setDivisionText').attr('ind_value');	
		$semm = $('#semid :selected').text();	
		$subject_id = $('#btn-group5').attr('ind_value');
		$duratin = $('#selectduratuinyr :selected').attr('data');
		$teacher_id = $('#btn-group6').attr('ind_value');
		
		try {
				if(!($class_id>0)) {
					return;	
				}
				if(!($semm>0)) {
					return;	
				}
				if(!($subject_id>0)) {
					return;	
				}
				if(!($teacher_id>0)) {
					return;	
				}
				
				if(!($duratin.length>0)) {
					return;	
				}
				
		}catch(err){
			return;
		}
		//console.log( $class_id+$semm+$subject_id+$duratin+$teacher_id);
		$.post(ajax_url,{action:'save-sub-to-class', class_id:$class_id, semm:$semm , subject_id:$subject_id, duratin:$duratin, teacher_id:$teacher_id},function(response){
					//console.log(response);
					response =$.parseJSON(response);
					$op = response.success;
					if( $op == 1){
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
						$('#section'+$class_id+' div .jztatableonlyforthisbcidused tbody').append(
										"<tr><td value='"+ $('#btn-group5').attr('ind_value')+"'>"+
										$('#setDivisionText5').text()+
										"</td><td>"+
										$('#setDivisionText6').text()+
										"</td><td user_name='"+$('#selectduratuinyr :selected').attr('user_name')+"'>"+
										$('#selectduratuinyr :selected').text()+
										"</td><td >"+
										$('#semid :selected').text()+
										"</textarea></td></tr>"
								);
						
						
						$('#setDivisionText').attr('ind_value','0');
						$('#setDivisionText').attr('ind_name','');
						$("#selectedclassi").html(' select a class');
						$('#setDivisionText').attr('ind_value','0');
						$('#setDivisionText').attr('ind_name','');	
						$('#setDivisionText5').html('Subject'+' <span class="caret"></span>');
						$('#setDivisionText6').html('Teacher'+' <span class="caret"></span>');
						
						$("#selectduratuinyr option[value='']").attr('selected', true);
						$('.select2-selection__rendered').html('');
						$('#selectduratuinyr').empty();
						
						global_id_for_btt1.addClass('hidden');
						alert("successfully submitted  ");
						
						
					}
					else {
						alert("error  ");
					}
				});
		
		});
	
	
	
	/*
	$('#custHrenvid li a').click(function(e){
		//alert('ee');
		$('#custHrenvid .active').removeClass('myactive');
		$(this).parent().addClass('myactive');
		//alert('rr');
		//return;
	
		
	});
	*/
		
		/*
		* exam 
		*/
		
		
		$("div.exam_c1").click(function(e){
		   $(this).parent().find(".hovrtexam").removeClass('hovrtexam');
		   $(this).parent().prepend(this);
		    $(this).find('div').addClass('hovrtexam');
		    setViewExamc1($(this).attr('t_id'));
		   });
	
function setViewExamc1($sid) {
	striingappentexam = '';
	//console.log($sid);
	$.post(ajax_url,{action:'getExamofSub', sid:$sid},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							$xarryh = response.success;
							
									$('#exams_a').empty();
									$('#student_a').empty();
									$('#vieweachstud').empty();
									$('#examhead').html('');
									$('#studhead').html('');
									
							if( $xarryh && $xarryh.length === 0){
								striingappentexam = striingappentexam +" <div t_id='' class='exam_n1 ccctrig' data-toggle='tooltip' title='add new exams'><div class='exam_n9'><div class='exam_m1'><h4>  No exams should </h4></div><div class='exam_m2 '></div></div></div>";
									
									$('#exams_a').prepend(striingappentexam);
							} else {
								$('#examhead').html('exams');	
								for($io = 0 ; $io<$xarryh.length; $io++) {
									
									////console.log($xarryh[$io]);
									striingappentexam = striingappentexam +" <div  tatalm_id='"+$xarryh[$io].total+"' ss_id='"+$xarryh[$io].subject+"' t_id='"+$xarryh[$io].id+"' class='exam_n1 exam_c2' data-toggle='tooltip' title='"+$xarryh[$io].description+"'><div class='exam_n9'><div class='exam_m1'><h4> "+$xarryh[$io].series+"  ("+$xarryh[$io].total+")</h4></div><div class='exam_m2 '></div></div></div>";
									
									
								}
									$('#exams_a').append(striingappentexam);
									$('#exams_a .exam_m2').append("<i class='fa fa-angle-righ'></i>");
									 $('#exams_a .exam_m2').find($(".fa")).removeClass('fa-chevron-down').addClass('fa-chevron-right');	
							}
					
						});	
				
	
}
$(document).on('click', '.ccctrig', function(e){$("#sechedule_exam").click();});


		
	$("#divisionntt8 li a").click(function(e){
		     e.preventDefault();
 		 selText = $(this).text();
		 $unkid = $(this).attr('My_value');
		 $untid = $(this).attr('My_tvalue');
		 
		 $('#setDivisionText8').attr('ind_name',selText);
 		 $(this).parents('#btn-group8').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		
		 $('#divisionntt9').empty();
		 $('#setDivisionText9').text('Subject');
		 $('#setDivisionText9').attr('my_value', '0');
		 $.post(ajax_url,{action:'view-subjects',classid:$unkid, tid:$untid},function(response){
			response =$.parseJSON(response);	
			 $elementCount  = response.length; 
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				 $tempString=$tempString+'<li><a My_value="'+op_response.sub_id+'" href="#">'+op_response.sub_name+'</a></li>';
			
			}
			 
			
			$('#divisionntt9').append($tempString).end().appendTo('#divisionntt');
	
		});	
		
	});
	


$(document).on('click', '#divisionntt9 li a', function(e){
		     e.preventDefault();
 		 selText = $(this).text();
		 $unkid = $(this).attr('My_value');
		 
		 $('#setDivisionText9').attr('ind_name',selText);
 		 $(this).parents('#btn-group9').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		$('#setDivisionText9').attr('my_value', $unkid);
		
		
	});
	






$(document).on('click', 'div.exam_c2', function(e){
		   $(this).parent().find(".hovrtexam").removeClass('hovrtexam');
		   $(this).parent().prepend(this);
		    $(this).find('div').addClass('hovrtexam');
			
			$nt_id = $(this).attr('t_id');
			$('#student_a').attr('xam_id',$nt_id);
			
			$mak_id_tot = $(this).attr('tatalm_id');
			$('#student_a').attr('total_mark_in',$mak_id_tot);
			
			
			$mak_id_tot = $(this).attr('ss_id');
			$('#student_a').attr('ss_id',$mak_id_tot);
			
		    setViewExamc2($(this).attr('ss_id'));
		   });
	
function setViewExamc2($sid) {
	 striingappentexam = '';
	//console.log($sid); 
	if(typeof $sid === "undefined") {
						return;	
					}
	$.post(ajax_url,{action:'getStudentofSub', sid:$sid},function(response){
							//console.log(response);
								$('#student_a').empty();
								$('#vieweachstud').empty();
							response =$.parseJSON(response);
							$xarryh = response.success;
							$('#studhead').html('');
							if($xarryh.length === 0){
								striingappentexam = striingappentexam +" <div t_id='' class='exam_n1 ' data-toggle='tooltip' title='add new student'><div class='exam_n9'><div class='exam_m1'><h4> <a href='add_student.php'>  add students </a></h4></div><div class='exam_m2 '></div></div></div>";
									
									$('#student_a').prepend(striingappentexam);
							} else {
								
									$('#studhead').html('students');
								for($io = 0 ; $io<$xarryh.length; $io++) {
									////console.log($xarryh[$io]);	
									//$('#student_a').empty();
									striingappentexam = striingappentexam +" <div id="+$xarryh[$io].user_name+" class='exam_n1 exam_c3' data-toggle='tooltip' title='"+$xarryh[$io].mobile+"'><div class='exam_n9'><div class='exam_m1'><h4> "+$xarryh[$io].fname+" "+$xarryh[$io].lname+"</h4></div><div class='exam_m2 '></div></div></div>";
									
									
								}
									$('#student_a').prepend(striingappentexam);
									$('#student_a .exam_m2').append("<i class='fa fa-angle-righ'></i>");
									 $('#student_a .exam_m2').find($(".fa")).removeClass('fa-chevron-down').addClass('fa-chevron-right');	
							}
					
						});	
				
	
	 
	 
	
	
}

$(document).on('click', 'div.exam_c3', function(e){
	$(this).parent().find(".hovrtexam").removeClass('hovrtexam');
	$(this).parent().prepend(this);
	$(this).find('div').addClass('hovrtexam');
	setViewExamc3($(this).attr('id'));
});

function setViewExamc3($sid){
		
	$stringforapp = "";
	//console.log($sid);
	$('#vieweachstud').empty();
	
	
	$prevmarksaved = '';
	$prevdiskrsaved = '';
	$xamid = $('#student_a').attr('xam_id');
	$.post(ajax_url,{action:'checkistrue-markOl',xamid:$xamid, studid:$sid},function(responsv){	
	try {
	//console.log(responsv);
	responsv =$.parseJSON(responsv);
	$adfgt = responsv.success[0];
	$prevmarksaved = $adfgt.mark;	
	$prevdiskrsaved = $adfgt.description;

	}catch (err) {}
	});
	
	
	$cionfirtrue = false;
	$ss_id = $('#').attr('ss_id');
	$cionfir = " disabled='disabled' ";
	$ss_id = $('#student_a').attr('ss_id');
	$.post(ajax_url,{action:'checkistrue-teach', ss_id:$ss_id},function(responsr){	
	//console.log(responsr);
	responsr =$.parseJSON(responsr);
		if(responsr.success) {
			$cionfir ='';	
			$cionfirtrue = true;	
		}
		
		$.post(ajax_url,{action:'getuniqStud', sid:$sid},function(response){	
		response =$.parseJSON(response);
		//console.log(response);
		
	
		$xarryh = response.success;
		if($xarryh.length === 0){
			 location.reload();
		} else {
			
			$stringforapp = $stringforapp +"<div class='last_deta_ba1' id='"+$xarryh.user_name+"'><div class='buttoSave'>";
			
			
			if($cionfirtrue) {
			$stringforapp = $stringforapp +"<input type='submit' class='btn btn-primary' value='save score' style='width:100%;'>";
			}
			$stringforapp = $stringforapp +"</div><div class='photomex'><img src='"+
			$xarryh.image+		
			"'></div><div class='nameLa'><h4 class='hzh4' data-toggle='' title='"+$xarryh.user_name+"' > "+
			$xarryh.fname+" "+$xarryh.lname+
			" </h4> <div class='nameLa '><h6 >"+
			$xarryh.mobile+
			"</h6></div></div> <div class='last_deta_ba2'><div class='markd'><div class='elemtss'><input type='text ' class='form-control markval1' placeholder='mark' name='thismakevalid' id='thismakevalid003' "+$cionfir+" value= '"+$prevmarksaved+"'>&nbsp;<span id='errmsg'></span></div><div class='elemtss '><textarea class='markval2 shadow' id='descriptionuc' placeholder='description' "+$cionfir+">"+$prevdiskrsaved+"</textarea></div></div></div>";
			$('#vieweachstud').prepend($stringforapp);
			
			$("#thismakevalid003").focus();
			
			 $('div .last_deta_ba1').find($(".hzh4")).attr('data-toggle','tooltip');	
		}
		
	
	});
		
	});
	
	
	
	
	
	
	
}



$('#setmark').validate({
		  	
		   rules: { 
				 thismakevalid:{required: true}
			}, 
			submitHandler: function(form, event){
				
				
				$makr =parseInt( $('#thismakevalid003').val());
			    $descriptions= $('#descriptionuc').val();	
				$max_mark =parseInt( $('#student_a').attr('total_mark_in'));
				if($makr > $max_mark ) {
					alert('invalid mark');
				} 
				$xamid = $('#student_a').attr('xam_id');
				$studid= $('#vieweachstud .last_deta_ba1').attr('id');
				$.post(ajax_url,{action:'update-mark-password',xamid:$xamid, studid:$studid, makr:$makr, descriptions:$descriptions},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(1==response.success){
								//alert("successfully submitted  ");
								//$('#thismakevalid003').val('');
								//$('#descriptionuc').val('');
								$("#succmsg").html("successfully saved").show().fadeOut("slow");
							} else if (response.success == -1 ) {
								alert("mark olready inserted  ");
							} else {
								alert("error  ");		
							}
					
						});	
				
			}
		});	
		
		







	
	$('#selectaseries li a').click(function(e){
		$('#appendedInputButton').val($(this).text());
		
		
		});
	
	
	
	$('#addAexamDetHere').validate({
		  	
			submitHandler: function(form, event){
				
				$class_sub = setDivisionText9.getAttribute('my_value');
				
				if($class_sub == 0) {
					alert('select subject' );
				return ;
				}
				$totalm = $('#markin').val();
				if(!($totalm>0)) {
					$totalm = null;
				}
				$series = $('#appendedInputButton').val();
				if(!($series.length>0)) {
					alert('select Series ' );
				return ;
				}
				
				$description = $('#xam_disc').val();
				if(!($description.length>0)) {
					$description = null;
				}
				//alert($description + $series  );
				
				$.post(ajax_url,{action:'set-exam',class_sub:$class_sub, totalm:$totalm, series:$series, description:$description},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(1==response.success){
								alert("successfully submitted  ");
													
							 $('#divisionntt9').empty();
							 $('#setDivisionText9').text('Subject');
							 $('#setDivisionText9').attr('my_value', '0');
							 $('#xam_disc').val("");
							$('#markin').val('100');
							 $('#appendedInputButton').val('');
							$('#submitaddbuttonf').trigger('click');
												
							} else if(-1==response.success) {
								alert("exam already exist");	
								
							}else {
								alert("error  ");		
							}
					
						});	
				
			}
		});	
		
		
		
	$(document).on('keypress', '#thismakevalid003', function(e){
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
	
	
	
			

	
	
	
	
		

		
/*
************************************************************************************************
*/		




/***********************************uplad image only **************************************/
$(document).on("click", "#upadanimage", function() {
	
		$('#upladimageprofselectf').val('');
		$('#upladimageprofselectf').click();
	
	});
	
	

$('#upladimageprofselectf').change(function() {
	 
	 
		$("#upladimageprof").ajaxForm({
		 success: function(responseText,statusText) {
			//console.log(responseText);
			$imageHrCro = '../'+responseText.trim();
			$('#cropbox').attr($imageHrCro );
			
			show_popup_crop($imageHrCro );
			
		  }
		}).submit();
		$('#upladimagepfinalsub').click();
		
	 $('#cropbox').attr('../images_/loader.gif');

		
		$('#setImg').click();
	
	
	
	
	
	
	
	
	
	
	
	
	

	
});

//




var TARGET_W = 300;
var TARGET_H = 300;

	
		
	$('#crop_btn').click(function(e) {
   
	
	var x_ = $('#x').val();
	var y_ = $('#y').val();
	var w_ = $('#w').val();
	var h_ = $('#h').val();
	var photo_url_ = $('#photo_url').val();
	photo_url_ = photo_url_.substr(3);
	
	photo_url_ = photo_url_.replace(/^.*[\\\/]/, '');
	$sest_utl_p_ = 'teacher/images_/';
	
	$('#myModal').click();
	
	console.log("eeeeeeeeeeeeeeeeee-"+photo_url_);
	
	$.ajax({
		url: '../crop_photo.php',
		type: 'POST',
		data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H, sest_utl_p_:$sest_utl_p_},
		success:function(data){
			//console.log(data);			
			$data =data.replace(/^.*[\\\/]/, '');

			$ght = $('#display_my_image_in_prof').parent();
			$ght.find('img').attr('src',''+window.location.origin+'/tech_teach/teacher/images_/'+$data+'');
				$.post(ajax_url,{action:'update-teacher-image',images:$data},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(1 == response.success){
								//console.log("successfully submitted  ");
	
							}
							else {
								alert("failed to save  ");	
							}
				});
			/*$ght.remove('img');
			if(data.length > 0) {
				$ght.html('<div class="editimg" id="upadanimage"><i class="fa fa-pencil-square-o shadow"></i></div><img src ="'+window.location.origin+'/tech_teach/'+data+'?" image_name = "'+window.location.origin+'/tech_teach/'+data+' " id="display_my_image_in_prof" >');  
			}*/
			
		}
	});
	

    });
	
	

	

	
	
	function show_popup_crop(url) {
	// change the photo source
	$('#cropbox').attr('src', url);
	// destroy the Jcrop object to create a new one
	try {
		jcrop_api.destroy();
	} catch (e) {
		// object not defined
	}
	// Initialize the Jcrop using the TARGET_W and TARGET_H that initialized before
    $('#cropbox').Jcrop({
      aspectRatio: TARGET_W / TARGET_H,
      setSelect:   [ 100, 100, TARGET_W, TARGET_H ],
      onSelect: updateCoords
    },function(){
        jcrop_api = this;
    });

    // store the current uploaded photo url in a hidden input to use it later
	$('#photo_url').val(url);
	// hide and reset the upload popup
	$('#popup_upload').hide();
	$('#loading_progress').html('');
	$('#photo').val('');

	// show the crop popup
	$('#popup_crop').show();
}

function updateCoords(c) {
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
}


/**************************************end image edit *************************************************/
		
		
		
			
		$('#add_student').validate({
		  	
		   rules: { 
				mnumber:{required: true,number: true},
				uname:{required: true, number: true},
				fname:{required: true}
			}, 
			submitHandler: function(form, event){
				$user_name = $('#uname').val();
				$fname = $('#fname').val();
				$lname = $('#lname').val();
				$sex = $('input[type="radio"]:checked').attr('value');
				$address = $('#address').val();
				$mobile = $('#mnumber').val();
				$class = $('#uname').attr('class_id');
				$submit = $('#add_student input[type="submit"]');
				$submit.attr('disabled','disable');
				
				$.post(ajax_url,{action:'add-student', user_name:$user_name, 
				fname:$fname, lname:$lname, sex:$sex, address:$address, 
				mobile:$mobile, class:$class},function(response){
					//console.log(response);
					
					response =$.parseJSON(response);
					$op = response.success;
					if( $op == 1){
						
						setNewStudentForView($user_name, $fname, $lname, $sex, $address, $mobile, $class);
						
						alert("successfully submitted  ");	
						$('#uname').val('');
						$('#fname').val('');
						$('#lname').val('');
						$('#address').val('');
						$('#mnumber').val('');
						
						
								
						$('.inputError2Statuspar').remove();
					}
					else if ( $op == -1){
						alert("user name already exist");		
					} 
					else if ( $op == -2){
						alert("mobile number already exist");		
					}else {
						
					 	alert("An Error occurred, please refresh the page and try again");
						
					}
					
					$submit.removeAttr('disabled');
				});
				
			
			}
			
			
		});
			
		
		
		
		$('#uname').keyup(function(){
	 	
			$get_username = $('#uname').val().length;
			if( $get_username >0) {
				$user_name = $('#uname').val();
				//console.log($user_name);
			$.post(ajax_url,{action:'getsudentnamecheck',user_name:$user_name},function(response){
				response =$.parseJSON(response);
				
				//console.log(response);
				$('.inputError2Statuspar').remove();
				if( Object.keys(response).length>0 ) {	
					$('#usernamecheckdiv').append(' <span class="glyphicon glyphicon-remove form-control-feedback inputError2Statuspar" aria-hidden="true"></span>'+
    				'<span id="inputError2Status" class="sr-only inputError2Statuspar">(error)</span>');
						
				} else {
					
						 $('#usernamecheckdiv').append(' <span class="glyphicon glyphicon-ok form-control-feedback inputError2Statuspar" aria-hidden="true"></span>'+
    					'<span id="inputSuccess2Status" class="sr-only inputError2Statuspar">(success)</span>');
						
				}
				
				
			});
				
			} else {
				$('.inputError2Statuspar').remove();	
				
			}
		});
	
	
		
		
		
		
		$('#updares_s').validate({
		   rules: { 
				content:{required: true}
			}, 
			submitHandler: function(form, event){
				$text_me = $('#content').val();
				$submit = $('#updares_s input[type="submit"]');
				$submit.attr('disabled','disable');
				$.post(ajax_url,{action:'add-a-post-by-teacher', text:$text_me},function(response){
					
					
					//console.log('sssssssssssssssssss'+response);
					response =$.parseJSON(response);
					$op = response.success;
					//console.log($op);
					if( $op != 0){
						$('#content').val('');
						$("#viewOnlyPost").prepend($op);
						//sub_belve_jzt_rep ();
						
						
						
						
					}
					else  {
						
					 	alert("An Error occurred, please refresh the page and try again");
						
					}
				});
				
				
					$submit.removeAttr('disabled');
			
			}
			
			
		});
		
		$("#prvcysele div ").click(function(e){
		     e.preventDefault();
 		 selText = $(this).text();
		 $dpid = $(this).attr("value"); 
		 tempclassName = $(this).find('i').attr('class');
 		 $(this).parents('#btn-select').find('.dropdown-toggle').html('<i class="'+tempclassName+'"></i>'+selText+' <span class="caret"></span>');
		 
		 
		});
		
		
		
		
		function sub_belve_jzt_rep () {
			$inpu = $('#viewOnlyPost').children().length;
			$.post(ajax_url,{action:'uptudate-post', input:$inpu},function(response){
			response =$.parseJSON(response);
			$op = response.success;
			if( $op != 0){
			$("#viewOnlyPost").empty();
				$("#viewOnlyPost").prepend($op);
			}});	
		}
		
		/*
		setInterval(function(e) {
							$("#viewOnlyPost").empty();
							$inpu = true;
							$.post(ajax_url,{action:'uptudate-post', input:$inpu},function(response){
							response =$.parseJSON(response);
							$op = response.success;
							if( $op != 0){
								$("#viewOnlyPost").prepend($op);
							}
							else  {
								//console.log('error');
							}
						});}, 30000);
       */     	
		
		
		/*
		$(function(){
		   $(window).scroll(function(){
			   if($(document).height()==$(window).scrollTop()+$(window).height()){
				   
					$last_time = $('#viewOnlyPost').children().last().attr('id');
					if(typeof $last_time === "undefined") {
						return;	
					}
					////console.log("hhhhhhhhhhhhhhhhhhhhhhhhh  "+$last_time);
					$.post(ajax_url,{action:'uptudate-bottom-post', input:$last_time},function(response){
						//console.log(response);
						response =$.parseJSON(response);
						$op = response.success;
						if( $op != 0){
							$("#viewOnlyPost").append($op);
					}});	
						   
			   }
		   });
		});
		*/
	
		
			$(".addACommentMe").keyup(function(e){
				if((e.keyCode || e.which) == 13) { //Enter keycode
					$text_me = $(this).val();
					
					$postid = $(this).parent().attr('post_id');
					$postdate = $(this).parent().attr('post_date');
					if (!($text_me.length>1)) {
						$('.addACommentMe').parents('#'+$postid).find("textarea").val('');
						return;
					}				
					$.post(ajax_url,{action:'add-a-comment-to-poast', text:$text_me, postid:$postid, postdate:$postdate },function(response){
						////console.log(response);
						response =$.parseJSON(response);
						$op = response.success;
					
						if( $op != 0){
							$('.addACommentMe').parents('#'+$postid).find("textarea").val('');
							$('.addACommentMe').parents('#'+$postid).find("#commentsHere").append($op);
							$myCountHere = $('.addACommentMe').parents('#'+$postid).find("#commentsHere").children('.commentinnr').length;
							comment_belve_jzt_rep ($postid, $('.addACommentMe').parents('#'+$postid).find("#commentsHere"), $myCountHere);
							
						}
						else  {
							
							alert("An Error occurred, please refresh the page and try again");
							
						}
					});
					
					
					
				 }
			});  
		
		
		
		function comment_belve_jzt_rep ($postidt, $postCommnt, $inpu) {
			$.post(ajax_url,{action:'uptudate-commnt', postid:$postidt, input:$inpu},function(response){
			////console.log("ffffffffffffffff"+response);
			response =$.parseJSON(response);
			$op = response.success;
			if( $op != 0){
			$postCommnt.empty();
			$postCommnt.append($op);
			}});	
		}
		
		/*
			$("div").on("click", "div a.customAddCmntHr", function(){
				$postid = $(this).parent().attr('post_id');
				$totCountH =  $(this).attr('countid');
						comment_belve_jzt_rep ($postid, $('.addACommentMe').parents('#'+$postid).find("#commentsHere"),$totCountH);
					
			
				
			});
		
		
		*/
		


	$('#addAsubDetHere').validate({
		rules: { 
				 sub_namea:{required:true},
				 dep_ida:{required:true}
			}, 
			submitHandler: function(form, event){
				  	$sub_name = $('#sub_name').val();
					$dep_id= $('#dep_id').attr('ID_Value');	
					$sub_disc=$('#sub_disc').val();
				$.post(ajax_url,{action:'add_subject',sub_name:$sub_name,dep_id:$dep_id,sub_disc:$sub_disc},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							
							if( $sub_name == response.success){
								$( "#submitaddbutton" ).trigger( "click" );
								countI = $('#mytbodyI').children('tr').length;
								countI++;
								$('#view_table10 tbody').append(
										"<tr><td>"+
										countI+
										"</td><td style='width:30%;'>"+
										$sub_name+
										"</td><td style='width:30%;'>"+
										$('#dep_id').val()+
										"</td><td  style='width:30%;'><textarea readonly style='width:30%;'>"+
										$sub_disc+
										"</textarea></td></tr>"
								);
								
								
								clearAllAddSuje ();
								alert("successfully submitted  ");
							}
							else if(-1 == response.success){
								alert("already exists");		
							}
							else {
								alert("failed to save  ");	
							}
					
						});	
				
			}
		});
		
		$('#clear_me').click(function (e) {
			clearAllAddSuje ();
		});
		
		
		function clearAllAddSuje () {
			$('#sub_name').val('');
			$('#sub_disc').val('');	
		}
		
		
		
		
		$("#showSubXam").scroll(function() {
			
		$window = $('#showSubXam');
		docViewTop = $window.scrollTop();
		
		$custheight = $("#showSubXam div").height();
		
		$inpu = $('#showSubXam div').children('.sectionV').length;
		
		$onedivheight = $custheight/$inpu; 
		
		$onedivheight = Math.ceil($onedivheight.toFixed(2));
		
		$testCurrtdiv = docViewTop/$onedivheight;
		
		//$rsad = Math.ceil($testCurrtdiv.toFixed(2));
		//console.log($testCurrtdiv);
		
		//if($testCurrtdiv.toFixed(2) <) {
			
		//}
		$numberfinded = Math.round($testCurrtdiv.toFixed(2));
		
		//$numberfinded = Math.ceil($testCurrtdiv.toFixed(2));
		
		
		//console.log($numberfinded);
		$numberfinded++;
		//console.log($numberfinded);
		$('#custHrenvid li').removeClass('active');
		$("#custHrenvid li:nth-child("+($numberfinded)+")").addClass('active');
});

		
		
$('.save_parrent_det').click(function(e) {
	$sh_this = $(this);
    //(`id`, `st_id`, `name`, `designation`, `mobile`, `description`, `date`)
	$st_id = $(this).attr('stud_id');
	$name = $('#pname'+$st_id).val();
	$designation = $('#dsg'+$st_id).val();
	$mobile = $('#pmno'+$st_id).val();
	$description = $('#pdes'+$st_id).val();
	$l_no =  $('#plno'+$st_id).val();
	//console.log($st_id +'-'+$name+'-'+$designation+'-'+$mobile+'-'+$description+'-'+$l_no);
	if(!($name .length>1)) {
		alert('enter a valid name');
		return;
	} else if (!($mobile.length >9)) {
		alert('enter a valid mobile number');
		return;
	}
	
		$.post(ajax_url,{action:'add-or-update-parent',st_id:$st_id ,name:$name,designation:$designation,mobile:$mobile,description:$description,l_no:$l_no},function(response){
					
					
					//console.log('sssssscfffffdss'+response);
					response =$.parseJSON(response);
					
					if( response != 0){
	$sh_this.parent().parent().find('.fg_baserow').css('border', "none");
						$sh_this.attr('value', 'update');
					
						$('#but_p_up'+$st_id).html('update');
						//console.log('true');
						Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutLeft',
			title: 'successfully updated',
			msg: ' name :'+$name+' ('+$mobile+')'
	});
					}
					else  {
						
					 	alert("An Error occurred, please refresh the page and try again");
						
					}
				});
				
	
	
	
	
});	
	
		
	
	
///////////////////////////////////////////////////////////////////////////////	
varnow = new Date();/////////////////////////////////////////////////////
////////////////////
varday = ("0" + varnow.getDate()).slice(-2);/////////////////
varmonth = ("0" + (varnow.getMonth() + 1)).slice(-2);///////////////////
////////////////////////////////////////////////////
var vartoday = varnow.getFullYear()+"-"+(varmonth)+"-"+(varday) ;////////////////
/////////////////////////////////////////////////////////
$('#ass_date').attr('min',vartoday);//////////////////////////////////
////////////////////////////////////////
/////////////////////////////////////////
vartodays = (varnow.getFullYear()+1)+"-0"+(5)+"-0"+(1) ;//////////////////////
/////////////////////////////////////////////////
$('#ass_date').attr('max',vartodays);///////////////////////////////////////////////
//////////////////////
/////////////////////////////////////////////////////////////////////////////////////
	
	
	
		$('#addAssignDetHere').validate({
		  	
			submitHandler: function(form, event){
				
				$class_sub = setDivisionText9.getAttribute('my_value');
				
				if($class_sub == 0) {
					alert('select subject' );
				return ;
				}
				
				$topic = $('#topic').val();
				if(!($topic.length>0)) {
					alert('type the topic ' );
				return ;
				}
				
				$sub_date  = $('#ass_date').val();
				if(!($sub_date.length>0)) {
					alert('select  submission date ' );
				return ;
				}
				
				
				$description = $('#assig_disc').val();
				if(!($description.length>0)) {
					$description = null;
				}
				
				
				//alert($description + $series  );
				
				$.post(ajax_url,{action:'set-assignment',class_sub:$class_sub, topic:$topic, sub_date:$sub_date, description:$description},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(1==response.success){
								alert("successfully submitted  ");
									
									
									PrepStr = '';
									PrepStr = PrepStr+"<tr>"+
										"<td sub_id='"+$class_sub+"'>"+
										$('#setDivisionText9').attr('ind_name')+
										"</td><td >"+
										$topic+
										"</td><td >"+
										vartoday+
										"</td><td >"+
										$description+
										"</td><td >"+
										$sub_date+
										"<span class='glyphicon glyphicon-edit edit_each_assgnt959693' aria-hidden='true' style='float:right; padding-right:10px;'></span>"+
										"</td></tr>";
									$('#view_table20').find('#mytbodyJ').prepend(PrepStr);
										
										
													
							 $('#divisionntt9').empty();
							 $('#setDivisionText9').text('Subject');
							 $('#setDivisionText9').attr('my_value', '0');
							 $('#assig_disc').val("");
							$('#topic').val('');
							 $('#appendedInputButton').val('');
							$('#submitaddbuttonf').trigger('click');
												
							} else if(-1==response.success) {
								alert("exam already exist");	
								
							}else {
								alert("error  ");		
							}
					
						});	
				
			}
		});	
	
	
	
		$('#clear_me_here').click(function (e) {
			clear_me_here ();
		});
		
		
		function clear_me_here () {
			$('#topic').val('');
			$('#assig_disc').val('');	
		}
		
		
		
	
		
		
	
	
	
	$('.col-my-b0').click(function(e) {
        
		
		$topic = $(this).html();
		$subject = $(this).attr('subject');
		$submission_date = $(this).attr('submission_date');
		$date = $(this).attr('date');
		$description = $(this).attr('description');
		$id = $(this).attr('id');
		$subjectname = '';
		$subject_class = '';
		//
			
		
 $appStRing = "<div class='col-md-12'><div class='cust_class_new'><label class='col-md-4'>topic   </label> <div class='col-md-8 '><label class=' '>"+$topic+"</label></div></div></div><div class='col-md-12'><div class='cust_class_new'><label class='col-md-4'> subject  </label><div class='col-md-8 '><label id='subjectnamej' class=' '>"+ $subjectname+"</label></div></div></div><div class='col-md-12'><div class='cust_class_new'><label class='col-md-4'> class  </label><div class='col-md-8 '><label id='subject_classj' class=' '>"+$subject_class+"</label></div></div></div><div class='col-md-12'><div class='cust_class_new'><label class='col-md-4'>date</label><div class='col-md-8 '><label class=' '>"+$date+"</label></div></div></div><div class='col-md-12'> <div class='cust_class_new'><label class='col-md-4'> final </label><div class='col-md-8 '><label class=' '> "+$submission_date+"</label></div></div></div><div class='col-md-12'>  <div class='cust_class_new'> <label class='col-md-4'>description</label><div class='col-md-8 '><label class=' '>"+$description +"</label></div> </div></div>";
		
		
		$('#details_of_assgn').empty();
		$('#details_of_assgn').append($appStRing);
		$('#details_of_assgn').attr('assgnmnt_id',$id);
		jztAbvStT ($subject);
		
    });
	
	
	
	
	
	
	
	
	
	
	function jztAbvStT ($id) {
	
	$class_DI = 0;
	//console.log('88888888888888888--'+$id);
			$.post(ajax_url,{action:'get-data-c',table:'subject', zero:'sub_id', one:$id},function(response){
							////console.log(response);
							response =$.parseJSON(response);
							if(response){
								response = response[0];
								$subjectname = response.sub_name;
								$('#subjectnamej').html($subjectname);
	 
								//console.log($subjectname);
							}
							
			});
		$.post(ajax_url,{action:'get-data-c',table:'class_subject', zero:'sid', one:$id},function(response){
							////console.log('sssssssssssssss'+response);
							response =$.parseJSON(response);
							if(response){
								response = response[0];
								$class_DI = response.cid;
								list_allStudentsByClass ($class_DI, $id);
		
								$.post(ajax_url,{action:'getAclassNameHr',class:response.cid },function(response){
									//console.log('rrrrrrrrrrrr'+response);
									response =$.parseJSON(response);
									if(response){
										$subject_class = response.success;
										$('#subject_classj').html($subject_class);	
										//console.log($subject_class);
									}
								});
							}
							
			});
			
			
			
			
		
	}
	
	
	
		
	function list_allStudentsByClass ($class_DI, $id) {
		//console.log('-9-'+$class_DI);
		
		
		$.post(ajax_url,{action:'get-data-c',table:'student', zero:'class', one:$class_DI },function(response){
									////console.log('uuuuuu'+response);
									response =$.parseJSON(response);
									if(response){
										////console.log($subject_class);
										$string_is_str = '';
										$elementCount  = response.length; 
										for( ii=0 ; ii<$elementCount ; ii++) {
											 op_response = response[ii];
											 
											 
											$string_is_str=$string_is_str+"<div class='row col-my-da'><div class='col-md-4'>"+op_response.fname+" " +op_response.lname+"</div><div class='col-md-8'><input type='number' class='mainConmtnt' id='"+op_response.sid+"'  style='width:80%;'/><font> % </font></div></div>";
											}
										$('#set_mark_dirctly').empty();
										$('#set_mark_dirctly').append($string_is_str);
										return_the_val();
		/////////////////////////////////////////////////								
										
									}
								});
		
		
	}
	
	
	$(document).on('change', '.mainConmtnt', function(e){
	 
	  $st_mrk = $(this).val();
	  $st_id = $(this).attr('id');
	  if($st_mrk >100) {
		   $(this).val('');
		   alert('invalidd mark %');
		   $(this).focus();
		   return;
	  }
	  $ref_id = $('#details_of_assgn').attr('assgnmnt_id');
	   //console.log($st_id+' - '+$st_mrk);
	    $.post(ajax_url,{action:'se-assg-mrk',st_id:$st_id, st_mrk:$st_mrk, ref_id:$ref_id },function(responsea){
												 //console.log(responsea);
													 responsea =$.parseJSON(responsea);
												 if(responsea){
													//console.log('success');
														//console.log('true');
						Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutLeft',
			title: 'successfully updated',
			msg: ' saved mark'
	});
													} else {
													alert('error');	
													}
											 });
	  
	});
	
		
		
		
function return_the_val() {
	$leng = $('#set_mark_dirctly').find('.mainConmtnt').length;
		$('#set_mark_dirctly').find('.mainConmtnt').each(function () {
		//	$xqv = $(this);
			dj_Rtj_t_abv ($(this)) ;
											 });


  

	
}
		
		
		
function dj_Rtj_t_abv ($xqv) {
			$id = $xqv.attr('id');
			//console.log('***********'+$id);
			$ref_id = $('#details_of_assgn').attr('assgnmnt_id');
			
			 $.post(ajax_url,{action:'get-mrk-cd',st_id:$id, ref_id:$ref_id},function(response){ 
													 response =$.parseJSON(response);
													 response = response[0];
												 if(response){ 
													$persent_agea = response.percentage;
			////console.log($persent_agea+'--'+$xqv.attr('id') );
			$xqv.val($persent_agea);		
				}
			});
										
		
	
}
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	$('.addEditUpDat').click(function(e) {
		$clss_id = $(this).attr('class_id');
		$clsass_tec = $(this).parent('div').find('.col-md-8').html();
		$tab97898le = $('#section'+$clss_id).find('.jztatableonlyforthisbcidused');
		$string345 = '';
		
		    $tab97898le.find('tr').each(function (i, el) {
        var $tds = $(this).find('td'),
            t56451 = $tds.eq(0).text(),
            t56452 = $tds.eq(1).text(),
            t56453 = $tds.eq(2).text(),
            t56454 = $tds.eq(3).text();
			
			if(t56451.length>0 && t56452.length>0 && t56453.length>0 && t56454.length>0) {
			
			$string345 = $string345 + '<div class="col-md-12">'+
		'<div class="form-group">'+
		'<label  value="'+$tds.eq(0).attr('value') +'"   class="col-md-2 class9806581"> '+t56451+' </label>'+
		'<div class="col-md-5">'+
		'<select value="'+$tds.eq(1).attr('value') +'"  class="teach67"><option selected>'+t56452+'</option></select>'+
		'</div>'+


		'<label class="col-md-3 class9806582"> '+t56453+'</label>'+
		'<label class="col-md-1 class9806583"> '+t56454+' </label>'+
		'<span class="col-md-1 class9806584 glyphicon glyphicon-trash dleteclick" aria-hidden="true" statu_del=0></span>'+


		'</div>'+
		
		'</div>';
			}
        // do something with productId, product, Quantity
    });
		
		//$clsass_tec
		
	$('#showSubXam').prepend('<div class="divfulEditupshow" id="editTheIfea4968468749845t" clss_id="'+$clss_id+'" style="padding: 20px 122px;     overflow: auto;">'+
		'<div class="row" style="padding:20px;background-color: #f5f5f5;">'+
		
		
		'<div class="col-md-offset-0 col-md-3" style="padding-bottom:15px;">'+
		$clsass_tec+
		'</div>'+

		
		
		$string345+
		
		'<div class="col-md-12">'+
		'<div class="form-group">'+
		
		'<div class="col-md-offset-10 col-md-2">'+
		'<input type="button" value="update" id="update_btn_for_th" clss_id="'+$clss_id+'">'+
		'</div>'+

		


		'</div>'+
		
		'</div>'+
		
		'</div>'+
		'</div>');
		
		
		
 do_for_mr_op();
	
	
	//teach67
	
	
	
	
	});
	
	
	$(document).on('click','#update_btn_for_th', function(e) {
		   $('#editTheIfea4968468749845t').find('select').each(function (i, el) {
			   $this986464 = $(this);
			 $tdis = $(this).attr('value');
			 $semsele = $(this).find(':selected').attr('data-id');
			 
			 
			 $deletemr50985 = $this986464.parent('div').parent().children('.class9806584').attr('statu_del');
				
			if($deletemr50985 == 1) {
				alert($deletemr50985);	
				 $clalca = $('#update_btn_for_th').attr('clss_id');
				 $sub = $this986464.parent('div').parent().children('.class9806581').attr('value');
				 $tea0 = $tdis;
				 $tea = $semsele;
				 $year = $this986464.parent('div').parent().children('.class9806582').html() ;
				 $sem = $this986464.parent('div').parent().children('.class9806583').html();
				//console.log($clalca+'--'+$sub+'--'+$tea+'--'+$year+'--'+$sem );
				 
				 $.post(ajax_url,{action:'delete_aTeach_ck',cid:$clalca, sem_id:$sem, tid0:$tea0, year:$year, sid:$sub},function(response){ 
													 //console.log(response);response =$.parseJSON(response);
													 if(response) {
								alert("successfully submitted  ");
								$('#editTheIfea4968468749845t').remove();
									deleteeBase ($clalca, $tea0);
													 }
													 
				 });
				 
			} else if (!(typeof $semsele === "undefined")) {
					////console.log($tdis+'--'+$semsele);
					
			 $selectname = $(this).find(':selected').html();
					////console.log($this986464.parent('div').parent().children('.class9806581').html());
					
					
					
					
			 if($tdis != $semsele ) {
				 $clalca = $('#update_btn_for_th').attr('clss_id');
				 $sub = $this986464.parent('div').parent().children('.class9806581').attr('value');
				 $tea0 = $tdis;
				 $tea = $semsele;
				 $year = $this986464.parent('div').parent().children('.class9806582').html() ;
				 $sem = $this986464.parent('div').parent().children('.class9806583').html();
				//console.log($clalca+'--'+$sub+'--'+$tea+'--'+$year+'--'+$sem );
				 
				 $.post(ajax_url,{action:'update_aTeach_ck',cid:$clalca, sem_id:$sem, tid:$tea, tid0:$tea0, year:$year, sid:$sub},function(response){ 
													 //console.log(response);
													 response =$.parseJSON(response);
													 if(response) {
								alert("successfully submitted  ");
								$('#editTheIfea4968468749845t').remove();
														 
									updateBase ($clalca, $selectname ,$tea0);					 
														 
														 
													 }
				
				
			});                                                                                                                                                                                                                                                                                                                                                                                                                                         
			 }
			
				}
			   
			   
			   
				  
			 
		   });
	});
	
	
	$(document).on('click','.dleteclick', function(e) {
		if($(this).attr('statu_del') == 0) {
		$(this).attr('statu_del',1);
		$(this).parent('div').parent().css('background-color','rgba(255,0,4,0.72)');
		$(this).parent('div').parent().css('color','white');
		} else if($(this).attr('statu_del') == 1) {
		$(this).attr('statu_del',0);	
		$(this).parent('div').parent().css('background-color','#f5f5f5');
		
		$(this).parent('div').parent().css('color','rgba(0,0,0,1.00)');
		}
		
	});
	
	function deleteeBase ($clalca, $tea0) {
		$tab97898le = $('.showSubXamk').find('#section'+$clalca).find('.jztatableonlyforthisbcidused');
		
		//console.log($clalca+$tea+$tea0);
			$tab97898le.find('tr').each(function (i, el) {
        	$tds = $(this).find('td'),
            t56452 = $tds.eq(1).attr('value');
			if(t56452 == $tea0) {
				$(this).remove();
			}
			
		
        // do something with productId, product, Quantity
    });
		
	}
	
	function updateBase ($clalca, $tea ,$tea0) {
		$tab97898le = $('.showSubXamk').find('#section'+$clalca).find('.jztatableonlyforthisbcidused');
		
		//console.log($clalca+$tea+$tea0);
			$tab97898le.find('tr').each(function (i, el) {
        	$tds = $(this).find('td'),
            t56452 = $tds.eq(1).attr('value');
			if(t56452 == $tea0) {
				$tds.eq(1).html($tea);
			}
			
		
        // do something with productId, product, Quantity
    });
	
	}
	
	
	
	
	function do_for_mr_op() {
			
		
								$tempString = "";
	
	
	
	
		    $('#divisionntt6').find('li').each(function (i, el) {
			 $tdis = $(this).find('a');
			
			if($tdis.html().length >0) {
									 $tempString=$tempString+'<option data-id="'+$tdis.attr('value')+'" data-toggle="tooltip" title="'+$tdis.attr('data-original-title')+'">'+$tdis.html()+'</option>';
			
			}
			});
			
								$('.teach67').append($tempString);
		
	/*	
		  $tab97898le.find('tr').each(function (i, el) {
        var $tds = $(this).find('td'),
            t56452 = $tds.eq(1).attr('value');
			
			$('.selDiv option:eq(1)').prop('selected', true)
		  });
	*/	
	}
	//editTheIfea4968468749845t
	
	
	
	
	
	$(document).on('dblclick', '#editTheIfea4968468749845t' ,function (e) {
        $(this).remove();
    });
	
	
	
	$('.generatepass3453495873949693').click(function(e) {
        // $('.inputSuccess1645664').val(generatePassword());
		
		 $user_name = $(this).attr('user_id');
		 $this = $(this).parent('.dclds76776').find('.inputSuccess1645664');
		 $password = generatePassword();
		 //console.log($user_name+$password );
		  $.post(ajax_url,{action:'gen_and_upade_a_pass949693',user_name:$user_name, password:$password},function(responsea){
												//console.log(responsea);
												responsea =$.parseJSON(responsea);
												 if(responsea == 1){
													//console.log('success');
													
		 $this.val($password);
		 
		 
													} else {
													alert('error');	
													}
											 });
	  
		 
    });
	
	$('.click578576573').mousedown(function(e) {
        $(this).parent().parent('.input-group').find('.inputSuccess1645664').attr('type','text');
		
    });
	
	$('.click578576573').mouseup(function(e) {
        $(this).parent().parent('.input-group').find('.inputSuccess1645664').attr('type','password');
    });
	
	
	
	
	
	
	
	
/********************************************************************************
            **************************for my cust qwall fir global******************************
						                                ****************************************************/
	window.setInterval(function(){
	//		//console.log('------- -- - -');
	if($('#q_wall80869191').is(':visible')) {
			////console.log('dd');
			update_new_qstns();
	}
			
			}, 5000);													
	
														
							//writeqstion
	$('#writeqstion').validate({
		  	
		   rules: { 
				 sub_disc_qstn:{required: true}
			}, 
			submitHandler: function(form, event){
				
				
			    $my_qstnis= $('#my_qstnis').val();	
				$my_qstnis = $my_qstnis.trim();
				$.post(ajax_url,{action:'add_aqstn',qstn:$my_qstnis},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(0!=response){
								$('#submitaddbutton').click();
								Lobibox.alert('success', {
										msg: 'successfully added  '
								});

								$('#my_qstnis').val('');
								
									$date = new Date();
									$iso = $date.toISOString().match(/(\d{4}\-\d{2}\-\d{2})T(\d{2}:\d{2}:\d{2})/)

								$('#aftermypostadd80869191').after('<div class="mypoststwo connon_class_dorJqry_Rvnt" qstn_id="'+response+'"  admin="'+$('#aftermypostadd80869191').attr('admin')+'"  time = "'+$iso[1] + ' ' + $iso[2]+'"><i class="fa fa-question" style="color:#018100; font-size:30px;"></i>'+$my_qstnis+'</div>');
								
								//$('#descriptionuc').val('');
							} else if (response.success == -1 ) {
								alert("question olready inserted  ");
							} else {
								alert("error  ");		
							}
					
						});	
				
			}
		});	
		
		
$(document).on('click', '.custfotntfoclick', function() {
	$This = $(this);
	$status = $(this).attr('status');
	$qstn = $(this).attr('replay_id');
	//console.log($status);	
	$.post(ajax_url,{action:'like_dislik_replay',qstn:$qstn, status:$status},function(response){
		//console.log(response);
		response =$.parseJSON(response);
		
		$This.parent().find('.opthisnow').html(response);

		
	});	
});
	
	function forOnereplayCountLike($qstn){
		
	var tmp = null;
				$.ajax({
					'async': false,
					'type': "POST",
					'global': false,
					'dataType': 'JSON',
					'url': ajax_url,
					'data': {action:'like-dislik-replay-onlyCou',qstn:$qstn},
					'success': function (data) {
						tmp = data;
					}
				});
				return tmp;
	
	}
														
														
														
														
function update_new_qstns() {
	$totopost = $('#newQuestions80869191_id').attr('total_qstns');
	////console.log($totopost);
	$.post(ajax_url,{action:'uptudate-qstn', input:$totopost},function(response){
			//console.log(response);
			response =$.parseJSON(response);
			$op = response.success;
			if( $op == 1){
					Lobibox.notify('default', {
						size:'mini',
						showClass: 'wobble',
						hideClass: 'bounceOut',
						title: 'NEW',
						msg: 'new post'
				});
				response_po = response.data;
			for( uu =0 ; uu < response_po.length ; uu++ ) {
					$actu_op = response_po[uu];
					$actu_op  = $actu_op .value;
				////console.log($actu_op);
				$solved = '';
				if($actu_op.replay) {
				$solved = '<string> [solved] </strong>';	
				}
					$('#newQuestions80869191_id').prepend('<div class="subquetn_80869191 connon_class_dorJqry_Rvnt" qstn_id="'+$actu_op.id+'"  admin="'+$actu_op.admin+'" time = "'+$actu_op.date+'"><i class="fa fa-question-circle"></i>'+$actu_op.subject+$solved+'</div>');
			}
			//$('#add_a_new_post_Base58634653').after(response.data);
			//console.log('added a post');
			
			$('#newQuestions80869191_id').attr('total_qstns', response.count);
		 
				//$("#viewOnlyPost").prepend($op);
			}});	
}



	$('#addAreplayForthis').validate({
		  	
		   rules: { 
				 replayTeextArea_80869191_replay:{required: true}
			}, 
			submitHandler: function(form, event){
				
			    $my_replay= $('#replayTeextArea_80869191_replay').val();
				$q_id = $('#displaymainqstn80869191').attr('qstn_id');
				if (typeof $q_id  === "undefined" ) {
					alert('select a question');
					return ;
				}	
				$my_replay = $my_replay.trim();
				$.post(ajax_url,{action:'add_a_replay',qstn:$my_replay, qid:$q_id},function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(0!=response){

								$('#replayTeextArea_80869191_replay').val('');
								
								
							
								$('#mainRepalys_viewArea80869191 .replayTeextAr_9191').after(appent_this_reoply( response, 0, $my_replay, $('#replayTeextArea_80869191_replay').attr('admin')));	
								
								
							} else if (response.success == -1 ) {
								alert("question olready inserted  ");
							} else {
								alert("error  ");		
							}
					
						});	
				
			}
		});	
	

$('.forquestionFav').click(function(e) {
        $qstn_id = $(this).attr('post_id');
		if (typeof $qstn_id  === "undefined" ) {
					alert('select a question');
					return ;
				}	
		//<div class="subquetn_80869191 connon_class_dorJqry_Rvnt" qstn_id="'+$actu_op.id+'"  admin="'+$actu_op.admin+'" time = "'+$actu_op.date+'"><i class="fa fa-question-circle"></i>'+$actu_op.subject+$solved+'</div>
		$this = $(this).find('i');
			$.post(ajax_url,{action:'add_to_fav', qid:$qstn_id},function(response){
			//console.log(response);
			response =$.parseJSON(response);
			if(response == 1){ 
			$this.css('color','#38C100');
			
					 $('#hdearfourdivcom80869191_2 .oruhedd80869191').after('<div class="oruhedd80869191two connon_class_dorJqry_Rvnt orupaddingadd698" qstn_id="'+$qstn_id+'"  admin="'+ $('#replayTeextArea_80869191_replay').attr('admin')+'" time = "'+$('#discriptog80869191_3').html()+'" style="padding:9px;"> <i class="fa fa-question-circle"></i>'+$('#displaymainqstn80869191').html()+'</div>');	
				 
			} else { 
			$this.css('color','#000000');
					 $('#hdearfourdivcom80869191_2').find("[qstn_id='" + $qstn_id + "']").remove();	
					 }
								
	});
	
		
    });


function checkIsAfevQorNot($q_id) {
	 $('#hdearfourdivcom80869191_2').find('.oruhedd80869191two').each(function (i, el) {
			 if($(this).attr('qstn_id') == $q_id) {
				$('.forquestionFav i').css('color','#38C100');
			}
		});
}



$(document).on('click', '.connon_class_dorJqry_Rvnt', function(e) {
	$('.forquestionFav i').css('color','#000000');
	$('#mainRepalys_viewArea80869191').find('.commonclass_for_only_replays').remove();
	$q_id = $(this).attr('qstn_id');
	$admin = $(this).attr('admin');
	//$admin = $admin.substring(3);
	$question = $(this).text();
	$time = $(this).attr('time');
	$question = $question.trim();
	//console.log($q_id+'-'+$admin+'-'+$question);
	$('#displaymainqstn80869191').attr('qstn_id', $q_id);
	$('#displaymainqstn80869191').html($question);
	$('.forquestionFav').removeClass('hidden');
	checkIsAfevQorNot($q_id);
	$('.forquestionFav').attr('post_id',$q_id);
	function_for_updateDeta( $q_id, $admin, $time );
	$('#displaymainqstn80869191').attr('admin', $admin);
	$.post(ajax_url,{action:'view_al_replay', qid:$q_id},function(response){
			////console.log(response);
			response =$.parseJSON(response);
			if(response){
				for( yy = 0; yy < response.length ; yy++) {
					response_op = response[yy];
					//console.log(response_op.id);
					$op90fgf = 0;
					$.when( $op90fgf = forOnereplayCountLike(response_op.id)).done(
					$('#mainRepalys_viewArea80869191 .replayTeextAr_9191').after(appent_this_reoply( response_op.id,$op90fgf , response_op.replay,  response_op.r_admin)));
				}//
				checkUpDateERplaySave($q_id);
			}
								
	});
	
	
});

function checkUpDateERplaySave($q_id) {
	$.post(ajax_url,{action:'view_A_qstBN', qid:$q_id},function(response){
			//console.log(response);
			if(response){
				response =$.parseJSON(response);
				if(response.success){
					if(response.success > 0) {
						$thisZis = $('#mainRepalys_viewArea80869191').find("[rp_id='" + response.success + "']");
						$thisZis.css('color', '#01FF0E');
						$thisZis.removeClass('hidden');
						$('#displaymainqstn80869191').html($('#displaymainqstn80869191').html()+'<strong style="color:green"> [solved]</strong>');
					}
				}
			}
			
	});
}

function function_for_updateDeta( $q_id, $admin, $time ) {
	$('#discriptog80869191_1').html('');
	$('#discriptog80869191_2').html('');
	$('#discriptog80869191_3').html('');
	
	
	//console.log($q_id+'---------'+$admin+'------------'+$time);

	 $.post(ajax_url,{action:'get_aUser_frm_db', user_name:$admin},function(response){ 
		 //console.log('---------------------'+response);
		 response =$.parseJSON(response);
			if(1 == response.success) {
							
				op_response = response.data;
				op_response = op_response[0];
				$name ='';
				$dpt = '';
				$img_src = '';
				if(1 == response.status) {
					$name =' '+op_response.name+'  ('+response.val+')';
					$img_src = ''+window.location.origin+'/tech_teach/'+response.val+'/images_/'+op_response.image;
					$dpt = op_response.department;
				}
				
	
	
	
	
	
	$('#discriptog80869191_1').html($name);
	$('#discriptog80869191_2').html($dpt);
	$('#discriptog80869191_3').html( $time );
				 
			
			
													 }
				
				
			});
			
			
			
											
}

$(document).on('click', '.tickfortruetop', function() {
	$('.tickfortruetop').css('color','#6D6F6D' );
	$('.tickfortruetop').addClass("down"); 
	$(this).removeClass("down");
	$('.tickfortruetop').toggleClass("down"); 
	//$(this).toggleClass("down"); 
	$rply_id  = $(this).attr('rp_id');
	$tHtHOIS = $(this);
	 $.post(ajax_url,{action:'updateARepalySplv', replay:$rply_id},function(response){ 
		 //console.log('---------------------'+response);
		 if(response) {
		 	response =$.parseJSON(response);
			if(1 == response.success) {
				if(response.color) {
					$tHtHOIS.css('color', '#01FF0E');
					$myQstnHrs = $('#displaymainqstn80869191').html();
					if (!($myQstnHrs.toLowerCase().indexOf("solved") >= 0)) {
						$('#displaymainqstn80869191').html($myQstnHrs+'<strong style="color:green"> [solved]</strong>');
					}
					
					
				} else {
					$tHtHOIS.css('color', '#6D6F6D');
					//$(this).removeClass("down");
					$myQstnHrs = $('#displaymainqstn80869191').html();
					//console.log($myQstnHrs);
					$myQstnHrs = $myQstnHrs.substring(0, $myQstnHrs.indexOf('<'));
					$('#displaymainqstn80869191').html($myQstnHrs); 
					$tHtHOIS.addClass("down"); 
					$tHtHOIS.toggleClass("down");
				}		
			}
		 }
	 });

	
});

function appent_this_reoply( $$response, $ratecount, $my_replay, $admin) {
	//console.log( $$response+'-xxxxxxxxxxxxxxxxxxxxxxxxx---'+$ratecount+'----'+$my_replay+'----'+$admin);
	//$isThisAvalidForSlov='<i class="fa fa-check tickfortruetop hidden"></i>'
	$isThisAvalidForSlov = $isThisAvalidForSlov = '<i class="fa fa-check tickfortruetop_e down hidden" style="color:#01FF0E;" rp_id="'+$$response+'" ></i>';
	
	if($('#displaymainqstn80869191').attr('admin') == $('#aftermypostadd80869191').attr('admin')) {
		$isThisAvalidForSlov = '<i class="fa fa-check tickfortruetop " style="color:#6D6F6D;cursor:pointer;" rp_id="'+$$response+'" ></i>';
	}
	
	
	
	
	 response = function () {
				var tmp = null;
				$.ajax({
					'async': false,
					'type': "POST",
					'global': false,
					'dataType': 'JSON',
					'url': ajax_url,
					'data': {action:'get_aUser_frm_db', user_name:$admin},
					'success': function (data) {
						tmp = data;
					}
				});
				return tmp;
			}();   
	//response =$.parseJSON(response);
	////console.log(response);
	
			if(1 == response.success){
				op_response = response.data;
				op_response = op_response[0];
				$name ='';
				$dpt = '';
				$img_src = '';
				if(1 == response.status) {
					$name =' '+op_response.name+'  ('+response.val+')';
					$img_src = ''+window.location.origin+'/tech_teach/'+response.val+'/images_/'+op_response.image;
					$dpt = op_response.department;
				}
				
				$Stringfor_app = '<div class="each_comment80869191 commonclass_for_only_replays" replay_id="'+$$response+'">'+
                    	   '<div class="col-md-1">'+
                                '<div class="rate_me80869191">'+
                                   ' <div class="addone8086 custfotntfoclick font_clip_up" replay_id="'+$$response+'" status="1">'+
                                        '<i class="fa fa-chevron-up"></i>'+
                                   ' </div>'+
                                   ' <div class="actialopno">'+
                                        '<h1 class="opthisnow">'+
                                            $ratecount
                                           +'</h1>'+
                                    '</div>'+
                                    '<div class="subtraone8086 custfotntfoclick font_clip_down"  replay_id="'+$$response+'" status="0">'+
                                        '<i class="fa fa-chevron-down"></i>'+
                                    '</div>'+
                                    '<div class="fiapading80869191">'+
                                       ' <i class="fa fa-star"></i>'+
                                    '</div>'+
                                    '<div class="fiapading80869191" >'+
                                            $isThisAvalidForSlov+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-11">'+
                                '<p class="para_dis80869191">'+
                                        $my_replay
                               +' </p>'+
                            '</div>'+
							'<div class="detailsofwhoadd">'+
                            	'<div class="col-md-3">'+
                                '<img width="50px" height="50px" src="'+$img_src+'">'+
                                '</div>'+
                                '<div class="col-md-9"  style="overflow:hidden;">'+
                                	'<h5>'+$name+'</h5>'+
                                    '<h6> '+$dpt +' </h6>'+
                                '</div>'+
                            '</div>'+
                    '</div>';
								
								
		return $Stringfor_app;			
		
			}

	
			
}

$('.headtestsearch80869191').keyup(function(e) {
    $inptString = $(this).val();
	//subquetn_80869191 
		$thistopPut = null;
	$('#newQuestions80869191_id > .subquetn_80869191 ').each(function(index, element) {
		$TREthis = $(this);
		$TTgThis = $(this).text().trim();
		if ($TTgThis.toLowerCase().indexOf($inptString .toLowerCase()) >= 0) {
		//console.log($TTgThis);
			$('#newQuestions80869191_id').prepend($TREthis);
			$thistopPut = $TREthis;
		}
	});
			$('.subquetn_80869191').removeClass('subquetn_80869191_hover');
			if($thistopPut) {
				$thistopPut .addClass("subquetn_80869191_hover");
			}
			setInterval(function(){
				$('.subquetn_80869191_hove') .toggleClass("subquetn_80869191_hover");
			}, 1000);
			
			if($inptString.length < 1) {
				$('.subquetn_80869191').removeClass('subquetn_80869191_hover');
			}
});



/********************************************************************************
           						 **************************end ******************************
						                                ****************************************************/
	
	
	
	
	/************** video call ********************************/
	$('#nake_a_newVido_call').click(function(e) {
		$user_name = $(this).attr('user_name');
		$user_id = $(this).attr('user_id');
        $.post('../video.php',{user_name:$user_name, user_id: $user_id},function(response){
						//console.log(response);
		});
    });
	
	
	/***********************************/
	
		
		
		/***************************** call copy admin aler***************************/
	
	$('#model_o_1').click(function(e) {
         conForDisplyDprtmnt ('teacher');
    });
	
	$('#model_o_2').click(function(e) {
         conForDisplyDprtmnt ('student');
		 
    });
	
	
	
	function conForDisplyDprtmnt ($status) {
	$('#div_Scrool_in_001').empty();
	$('#div_Scrool_in_002').empty();
	$('#div_Scrool_in_003').empty();
	
	$('#div_Scrool_in_003').attr('dp_id','0');
	$('.button_for_').parent('div').addClass('hidden');
	
	
	$('#div_Scrool_in_001').attr('owner_status',$status);
	 $.post(ajax_url,{action:'slect_dp_ful'},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length; 
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				 if(op_response.did == $('#model_o_1').attr('dpt_id')){
				 $tempString=$tempString+'<div class="inr_58475" id="'+op_response.did+'" ><h4 class="col-md-9 inr_58475_in">'+op_response.name+'</h4> <input class="inr_58475_in  paadle546465" type="checkbox" ></div>';
				 }
			}
			$('#div_Scrool_in_001').empty();
			$('#div_Scrool_in_001').append($tempString);
			
		});	

		
}



$(document).on('click', 'div.inr_58475', function(e){
	$(this).parent().find('.inr_58475').removeClass('color_chnge');
	$(this).parent().prepend(this);
	$(this).addClass('color_chnge');
	
			$('#div_Scrool_in_003').empty();
	$('#div_Scrool_in_003').attr('dp_id','0');
			$('#div_Scrool_in_002').empty();
	
	
	$('#div_Scrool_in_001').find('.paadle546465').prop('checked', false);	
	$('#ist_check_bo_20').parent('div').addClass('hidden');
	$('#ist_check_bo_20').parent('div').addClass('hidden');
	
	$this = $(this).children('.paadle546465');
	$bool = true;
	$bool = $this.prop('checked');
	//console.log($bool);
	
	if($bool) {
		$this.attr('checked', false);
	} else {
		$this.prop('checked', true);
	
	$dp_id = $(this).parent().find('div.inr_58475').attr('id');
	$dp_id_ma = $(this).parent().find('div.inr_58475 h4').html();
	$owner_status = $('#div_Scrool_in_001').attr('owner_status');
	$('#div_Scrool_in_001').attr('dp_id',$dp_id);
	$('#tosele56859656f').attr('dp_id',$dp_id);
	$('#tosele56859656f').attr('dp_id_name',$dp_id_ma);
	$('#tosele56859656f').attr('owner_status',$owner_status);

	//|| ($('#div_Scrool_in_001').attr('owner_status') =='student')
		if( ($('#div_Scrool_in_001').attr('owner_status') =='teacher') ) {
			 get_data_by_t_click764365( $dp_id, $('#div_Scrool_in_001').attr('owner_status')) ;
		}
		if( ($('#div_Scrool_in_001').attr('owner_status') =='student') ) {
			 get_data_by_t_click586787( $dp_id, $('#div_Scrool_in_001').attr('owner_status')) ;
		}
		if( ($('#div_Scrool_in_001').attr('owner_status') =='parent') ) {
			 get_data_by_t_click586787( $dp_id, $('#div_Scrool_in_001').attr('owner_status')) ;
		}
		
		$('#ist_check_bo_20').parent('div').removeClass('hidden');
	
	}
});
function get_data_by_t_click764365($dp_id, $table) {
	$('#div_Scrool_in_003').empty();
	$('#div_Scrool_in_003').attr('dp_id','0');
	
									//alertify.success($dp_id+"okay"+$table);
	 $.post(ajax_url,{action:'slect_table_ful_by_db', table:$table, dp_id:$dp_id},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length; 
		
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				 $tempString=$tempString+'<div class="inr_58476" id="'+op_response.id+'" ><h4 class="col-md-9 inr_58475_in"  data-toggle="tooltip" title="'+op_response.user_name+'">'+op_response.fname+' '+op_response.lname+'</h4> <input class="inr_58475_in  paadle546465" type="checkbox" checked></div>';
				 
			}
			$('#div_Scrool_in_002').empty();
			$('#div_Scrool_in_002').append($tempString);
		});	
			
}

$(document).on('click', 'div.inr_58476', function(e){
	
	prnt_di = $(this).parent('div').attr('id');
	$this = $(this).children('.paadle546465');
	$bool = true;
	$bool = $this.prop('checked');
	//console.log(prnt_di);
	
	if( prnt_di == 'div_Scrool_in_002') {
	$('#div_Scrool_in_003').empty();
	$('#div_Scrool_in_003').attr('dp_id','0');
	$('#ist_check_bo_30').parent('div').addClass('hidden');
	
	}
	if($bool) {
		$this.attr('checked', false);
	} else {
		if($('#div_Scrool_in_001').attr('owner_status') !='teacher'){
			$('#ist_check_bo_30').parent('div').removeClass('hidden');
		}
	$('#div_Scrool_in_002').find('.paadle546465').prop('checked', false);	
		$this.prop('checked', true);
		//console.log($(this).parent('div').attr('id'));
		if( ($('#div_Scrool_in_001').attr('owner_status') =='student') && prnt_di == 'div_Scrool_in_002') {
				 actionClickClass( $(this), $('#div_Scrool_in_001').attr('owner_status')) ;
			}
			if( ($('#div_Scrool_in_001').attr('owner_status') =='parent') && prnt_di == 'div_Scrool_in_002') {
				 actionClickClass_parent( $(this), $('#div_Scrool_in_001').attr('owner_status')) ;
			}
			
			
		
	}
	
	
});

$(document).on('click', 'div.inr_53435453', function(e){
	
	
	$this = $(this).children('.paadle546465');
	$bool = true;
	$bool = $this.prop('checked');
	//console.log($bool);
	
	if($bool) {
		$this.attr('checked', false);
	} else {
		$this.prop('checked', true);
	}
});

$('#ist_check_bo_20').click(function(e) {
    
	$('#div_Scrool_in_003').empty();
	$('#div_Scrool_in_003').attr('dp_id','0');    
	$('#div_Scrool_in_002').find('.paadle546465').prop('checked', false);	
});
$('#ist_check_bo_21').click(function(e) {
    
	$('#div_Scrool_in_003').empty();
	$('#div_Scrool_in_003').attr('dp_id','0');    
	$('#div_Scrool_in_002').find('.paadle546465').prop('checked', true);	
});
$('#ist_check_bo_30').click(function(e) {
	$('#div_Scrool_in_003').find('.paadle546465').prop('checked', false);	
});
$('#ist_check_bo_31').click(function(e) {
	$('#div_Scrool_in_003').find('.paadle546465').prop('checked', true);	
});


	
	function get_data_by_t_click586787($dp_id, $table) {
	$('#div_Scrool_in_003').empty();
	$('#div_Scrool_in_002').empty();
	
	$('#div_Scrool_in_003').attr('dp_id','0');
									//alertify.success($dp_id+"okay"+$table);
	 $.post(ajax_url,{action:'slect_class_table_ful_by_db', table:$table, dp_id:$dp_id},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length;
			////console.log(response); 
		
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				  $class_idd = op_response.class_id;
				  
				  //console.log($class_idd);  
						  $.post(ajax_url,{action:'getAclassNameHr_all_one_val', class:op_response.class_id},function(repo_in1){
							  
								repo_in1 =$.parseJSON(repo_in1);
								repo_in = repo_in1.success;
				  //console.log(repo_in1); 
								
								if( repo_in.length>0 ) {
									 $tempString='<div class="inr_58476" id="'+repo_in1.id+'" ><h4 class="col-md-9 inr_58475_in"  data-toggle="tooltip" title="'+repo_in+'">'+repo_in+'</h4> <input class="inr_58475_in  paadle546465" type="checkbox" ></div>';
								
			////console.log($tempString);  
								}
			$('#div_Scrool_in_002').append($tempString);
					
						  });
				 
				 
				
				 
			}
		});	
			
}
	function  actionClickClass( $this, $owner_status) {
		//console.log($this.attr('id'));
		$cid = $this.attr('id');
		
	$('#div_Scrool_in_003').attr('dp_id',$cid);
		
		
		 $.post(ajax_url,{action:'get-data-c',table:'student', zero:'class', one:$cid},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length;
			////console.log(response); 
		
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				  $class_idd = op_response.user_name;
				  
				  //console.log($class_idd);  
							
									 $tempString= $tempString+'<div class="inr_58476" id="'+op_response.user_name+'" ><h4 class="col-md-9 inr_58475_in"  data-toggle="tooltip" title="'+op_response.user_name+'">'+op_response.fname+''+op_response.lname+'</h4> <input class="inr_58475_in  paadle546465" type="checkbox" ></div>';
				
				 
			}
			
			$('#div_Scrool_in_003').append($tempString);
				 
		});	
		
	}


$('#submitaddbutton_okay').click(function(e) {
    $owner_status = $('#div_Scrool_in_001').attr('owner_status');
    $dp_id = $('#div_Scrool_in_001').attr('dp_id');
	
	if(typeof $owner_status == "undefined") {return;}
	
	if ($owner_status == "teacher") {
		if(typeof $dp_id == "undefined") {return;}
		
		varcount = $('#div_Scrool_in_002 > div').length;
		actual_count = 0;
		actual_countNve = 0;
		$('#div_Scrool_in_002 > div').each(function(index, element) {
			//console.log($(this).attr('id'));
			$this = $(this).children('.paadle546465');
			if($this.prop('checked')) {
				arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
				actual_count++;
			} else {
				actual_countNve++;
			}
        });
		//console.log(actual_count+'---------------'+varcount);
		if(actual_count === varcount ) {
			arrayOfnotifc = [];
			
					arrayOfnotifc_name = [];
			arrayOfnotifc[0]=9;
			arrayOfnotifc[1]=9;
			//console.log('-----');
		}
		if(actual_countNve === varcount ) {
			arrayOfnotifc = [];
			
					arrayOfnotifc_name = [];
			Lobibox.notify('warning', {
			size:'mini',
			showClass: 'tada',
			hideClass: 'hinge',
			msg: 'select something'
	});


			return;
		}
		
		
		for ( i = 0; i < arrayOfnotifc.length; i++) {
       //console.log(arrayOfnotifc[i]);
}

		
		
		
		
		
	}
	
	
	
	if ($owner_status == "student" ) {
		if(typeof $dp_id == "undefined") {return;}
		
		varcount = $('#div_Scrool_in_002 > div').length;
		if(varcount >0) {
			varcount_ju = $('#div_Scrool_in_003 > div').length;
			//console.log('varcount_ju'+varcount_ju);
			if( varcount_ju > 0) {
				
				actual_count = 0;
				actual_countNve = 0;
				$('#div_Scrool_in_003 > div').each(function(index, element) {
					//console.log($(this).attr('id'));
					$this = $(this).children('.paadle546465');
					if($this.prop('checked')) {
						arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
						actual_count++;
					} else {
						actual_countNve++;
					}
				});
				//console.log(actual_count+'---------------'+varcount);
				if(actual_count === varcount_ju ) {
					arrayOfnotifc = [];
					
					arrayOfnotifc_name = [];
					$_get_clss_id = $('#div_Scrool_in_003').attr('dp_id');
					arrayOfnotifc[0]= $_get_clss_id;
					arrayOfnotifc[1]= $_get_clss_id;
					//console.log('-----');
				}
				if(actual_countNve === varcount_ju ) {
					arrayOfnotifc = [];
					
					arrayOfnotifc_name = [];
					Lobibox.notify('warning', {
					size:'mini',
					showClass: 'tada',
					hideClass: 'hinge',
					msg: 'select something'
					});
		
		
					return;
				}
				
			} else {
				actual_count = 0;
				actual_countNve = 0;
				$('#div_Scrool_in_002 > div').each(function(index, element) {
					//console.log($(this).attr('id'));
					$this = $(this).children('.paadle546465');
					if($this.prop('checked')) {
						arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
						actual_count++;
					} else {
						actual_countNve++;
					}
				});
				//console.log(actual_count+'---------------'+varcount);
				if(actual_count === varcount ) {
					arrayOfnotifc = [];
					arrayOfnotifc_name = [];
					arrayOfnotifc[0]=7;
					arrayOfnotifc[1]=7;
					//console.log('-----');
				}
				if(actual_countNve === varcount ) {
					arrayOfnotifc = [];
					arrayOfnotifc_name = [];
					Lobibox.notify('warning', {
					size:'mini',
					showClass: 'tada',
					hideClass: 'hinge',
					msg: 'select something'
					});
		
		
					return;
				}

				
				
				
			}
		
			
		}
		
		if(arrayOfnotifc.length == 1) {
					arrayOfnotifc[1]='';
		}
		
					//console.log('----arraY -');
		for ( i = 0; i < arrayOfnotifc.length; i++) {
       
					//console.log('--VALUE -['+i+']');
					//console.log(arrayOfnotifc[i]);
					//console.log(arrayOfnotifc_name[i]);
					
}

					//console.log('--end ---');
		
		
		
		
		
	}
	
	if ($owner_status == "parent") {
		if(typeof $dp_id == "undefined") {return;}
		
		varcount = $('#div_Scrool_in_002 > div').length;
		if(varcount >0) {
			varcount_ju = $('#div_Scrool_in_003 > div').length;
			//console.log('varcount_ju'+varcount_ju);
			if( varcount_ju > 0) {
				
				actual_count = 0;
				actual_countNve = 0;
				$('#div_Scrool_in_003 > div').each(function(index, element) {
					//console.log($(this).attr('id'));
					$this = $(this).children('.paadle546465');
					if($this.prop('checked')) {
						arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
						actual_count++;
					} else {
						actual_countNve++;
					}
				});
				//console.log(actual_count+'---------------'+varcount);
				if(actual_count === varcount_ju ) {
					arrayOfnotifc = [];
					arrayOfnotifc_name = [];
					$_get_clss_id = $('#div_Scrool_in_003').attr('dp_id');
					arrayOfnotifc[0]= $_get_clss_id;
					arrayOfnotifc[1]= $_get_clss_id;
					//console.log('-----');
				}
				if(actual_countNve === varcount_ju ) {
					arrayOfnotifc = [];
					arrayOfnotifc_name = [];
					Lobibox.notify('warning', {
					size:'mini',
					showClass: 'tada',
					hideClass: 'hinge',
					msg: 'select something'
					});
		
		
					return;
				}
				
			} else {
				actual_count = 0;
				actual_countNve = 0;
				$('#div_Scrool_in_002 > div').each(function(index, element) {
					//console.log($(this).attr('id'));
					$this = $(this).children('.paadle546465');
					if($this.prop('checked')) {
						arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
						actual_count++;
					} else {
						actual_countNve++;
					}
				});
				//console.log(actual_count+'---------------'+varcount);
				if(actual_count === varcount ) {
					arrayOfnotifc = [];
					
					arrayOfnotifc_name = [];
					arrayOfnotifc[0]=7;
					arrayOfnotifc[1]=7;
					//console.log('-----');
				}
				if(actual_countNve === varcount ) {
					arrayOfnotifc = [];
					
					arrayOfnotifc_name = [];
					Lobibox.notify('warning', {
					size:'mini',
					showClass: 'tada',
					hideClass: 'hinge',
					msg: 'select something'
					});
		
		
					return;
				}

				
				
				
			}
		
			
		}
		
		if(arrayOfnotifc.length == 1) {
					arrayOfnotifc[1]='';
		}
		
					//console.log('----arraY -');
		for ( i = 0; i < arrayOfnotifc.length; i++) {
       
					//console.log('--VALUE -['+i+']');
					//console.log(arrayOfnotifc[i]);
}

					//console.log('--end ---');
		
		
		
		
		
	}
	
	
	for ( i = 0; i < arrayOfnotifc.length; i++) {
       
					//console.log('--VALUE -['+i+']');
					//console.log(arrayOfnotifc[i]);
					//console.log(arrayOfnotifc_name[i]);
					
	}
					fosaveallABV() ;
});
	
	
	function fosaveallABV() {
		////`to`, `subject`, `description`, `valid`, `status`, `date`
		
		if(arrayOfnotifc.length <1) {
			Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'select something'
	});



			highlighted($('#tosele56859656f'));
			return;
		}
		//t teacher
		//2 class
		//3 student
		//4 parent 
		//
		$type = 0;
		
		switch ($('#div_Scrool_in_001').attr('owner_status')) {
			case 'teacher' :
				$type = 1;
			break;
			case 'student' :
				$type = 2;
			break;
		}
		
		
		$sta = $('#tosele56859656f').attr('owner_status');
		$description = $('#main_notf_des').val(); 
		$My_user_name = $('#tosele56859656f').attr('dp_id');
		$my_user_name_for_you = $('#my_user_name_for_you').val();
		var $key = makeid();
		$('#myad_fot_this_key').val($key);
		//console.log('rrrrrrrrrr'+$My_user_name);
		
		$.post(ajax_url,{action:'nake_a_newVido_call',user_name:$my_user_name_for_you, to:arrayOfnotifc, description:$description, key:$key, sta:$sta, type:$type},function(response){
									//console.log('rrrrrrrrrrrr'+response);
									response =$.parseJSON(response);
									if(response){
										
										$('#submitaddbutton_4ofr_alrt').click();
										$('#nake_a_newVido_call').click();
									} 
								});
		


	
	
	}
			
	
	

	
	
	function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 15; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
	
	
	
	
	
		
	
		/*****************************************************************************/
		
		/********************** drag me ***********************/

var offset_data; //Global variable as Chrome doesn't allow access to event.dataTransfer in dragover

function drag_start(event) {
    var style = window.getComputedStyle(event.target, null);
    offset_data = (parseInt(style.getPropertyValue("left"),10) - event.clientX) + ',' + (parseInt(style.getPropertyValue("top"),10) - event.clientY);
    event.dataTransfer.setData("text/plain",offset_data);
} 
function drag_over(event) { 
    var offset;
    try {
        offset = event.dataTransfer.getData("text/plain").split(',');
    } 
    catch(e) {
        offset = offset_data.split(',');
    }
    var dm = document.getElementById('display_deta_id');
    dm.style.left = (event.clientX + parseInt(offset[0],10)) + 'px';
    dm.style.top = (event.clientY + parseInt(offset[1],10)) + 'px';
    event.preventDefault(); 
    return false; 
} 
function drop(event) { 
    var offset;
    try {
        offset = event.dataTransfer.getData("text/plain").split(',');
    } 
    catch(e) {
        offset = offset_data.split(',');
    }
    var dm = document.getElementById('display_deta_id');
    dm.style.left = (event.clientX + parseInt(offset[0],10)) + 'px';
    dm.style.top = (event.clientY + parseInt(offset[1],10)) + 'px';
    event.preventDefault();
    return false;
} 
var dm = document.getElementById('display_deta_id'); 
dm.addEventListener('dragstart',drag_start,false); 
document.body.addEventListener('dragover',drag_over,false); 
document.body.addEventListener('drop',drop,false); 


/////////////////////////////////



//////////////////////////////////////////////////
		
		/****************** end drag me ***********************************/
		
		
		
		
		/*************** EDIT STUDENT *********************/
				
	$(document).on('click', '.edit_teacher_details', function(e) {
		$thisnew =$(this).parent().parent().parent('.bord');
		$thisnew = $thisnew.find('.getTheUsrtId');
		$user_name = $thisnew.find('label').html().trim().substring(3);
		//console.log($user_name);
		//getaTeacher
		$.post(ajax_url,{action:'getAStudent',user_name:$user_name},function(response){
				response =$.parseJSON(response);
				//console.log(response);	
				if(response.length > 0) {
					response = response[0];
					$('#address9').val(response.address);
					$('#mnumber9').val(response.mobile);
					$('#lname9').val(response.lname);
					$('#fname9').val(response.fname);
					$('#submitthisclick').attr('user_name', response.user_name);
					$('#deleteAtecherForThis949693').attr('user_name', response.user_name);
				}
		});
	});
	
	$('#clear_me949693').click(function(e) {
        $('#address9').val('');
        $('#mnumber9').val('');
        $('#lname9').val('');
        $('#fname9').val('');
		$('#submitthisclick').attr('user_name', '');
    });
	
		$('#checkTheUsrAddteacher').validate({
		  	
		   rules: { 
				 mnumber9:{required: true,number: true},
				 uname9:{ required: true, email: true},
				 fname9:{required: true}
			}, 
			submitHandler: function(form, event){
				$fname = $('#fname9').val();
				$lname = $('#lname9').val();
				$address = $('#address9').val();
				$mobile = $('#mnumber9').val();
				$user_name = $('#submitthisclick').attr('user_name');
				 
				if(typeof $user_name == "undefined") {	 
					 	Lobibox.alert('error', {
								msg: 'An Error occurred, please try again'
						});
					 	return;	
					 
				}
				
				
				
				$submit = $('#add_teacher input[type="submit"]');
				$submit.attr('disabled','disable');
				
				$.post(ajax_url,{action:'update-student', user_name:$user_name, fname:$fname, lname:$lname, address:$address, mobile:$mobile },function(response){
					//console.log(response);
					response =$.parseJSON(response);
					$op = response.success;
					if( $op == 1){
						
						
						
						Lobibox.alert('success', {
								msg: 'successfully updated  '
						});
					$('#clear_me949693').click();
					$('#submitaddbutton').click();
					upadateTeacherval($user_name, $fname, $lname,  $address, $mobile);
					
					}
					else if ( $op == -2){
												Lobibox.alert('warning', {
			msg: 'mobile number already exist'
	});

						
					}else {
																	Lobibox.alert('error', {
			msg: 'An Error occurred, please refresh the page and try again'
	});

					 	
						
					}
					
					$submit.removeAttr('disabled');
				});
				
			
			}
			
			
		});
	

$('#deleteAtecherForThis949693').click(function(e) {
		$user_namea  = $('#deleteAtecherForThis949693').attr('user_name');   
		
		$.post(ajax_url,{action:'delete_aStudent',user_name:$user_name},function(response){
				 //console.log(response);
		response =$.parseJSON(response);
			if(response.success) {
				$('.getTheUsrtId:contains("'+$user_namea+'")').parent().parent().css('color', 'red');
			}
			
		});
});

		
		
		/************** END EDIT STUDENT ****************/
		
		
$(document).on('click', '.edit_each_assgnt959693', function(e) {
	clrtTgusdsdhal949693();
	$ThisThis = $(this).parent().parent().find('td');
	$subject = $ThisThis.eq(0).attr('sub_id');
	$subjectname = $ThisThis.eq(0).text();
	$topic = $ThisThis.eq(1).text();
	$created = $ThisThis.eq(2).text();
	$discri = $ThisThis.eq(3).text();
	$final_date = $ThisThis.eq(4).text();
	//console.log($subject+'---'+$topic+'---'+$created+'---'+$final_date+'---'+$discri);
	
	$.post(ajax_url,{action:'get-id-the-assignment',subject:$subject, topic:$topic, final_date:$final_date, discri:$discri, created:$created },function(response){
							//console.log(response);
							if(response) {
								response =$.parseJSON(response);
								if(0<response){
									$('#subject1').attr('sub_id',$subject );								
									$('#subject1').val($subjectname);
									$('#topic1').val($topic);
									$('#finlDate').val($final_date);
									$('#finlDate').attr('date_f', $created );
									$('#assig_disc1').val($discri);
									$('#clear_me_here_editAss').attr('assig_id', response);
									$('#edittheassmnt949396').click();
									
								}
							}
							
							
	});
	
	
});


$('#clear_me_here_editAss').click(function(e) {
    clrtTgusdsdhal949693();
});

function clrtTgusdsdhal949693() {
	$('#subject1').val('');
	$('#topic1').val('' );
	$('#finlDate').val('');
	$('#assig_disc1').val('');
	$('#finlDate').attr('date_f','');
}

	$('#editAssgnmt').validate({
		  	rules: { 
				 subject1:{required: true},
				 topic1:{required: true},
				 finlDate:{required: true},
				 assig_disc1:{required: true}
			},
			submitHandler: function(form, event){
			
			
						
			$subject = $('#subject1').attr('sub_id');
			$topic = $('#topic1').val();
			$final_date = $('#finlDate').val();
			$discri = $('#assig_disc1').val();
			$created = $('#finlDate').attr('date_f');
			$ass_id = $('#clear_me_here_editAss').attr('assig_id');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
				//alert($description + $series  );
				
				$.post(ajax_url,{action:'update-the-assignment',subject:$subject, topic:$topic, final_date:$final_date, discri:$discri, created:$created, ass_id:$ass_id },function(response){
							//console.log(response);
							response =$.parseJSON(response);
							if(1==response){
								$ThisThis = $('#view_table20 tbody tr td ').find("[ass_id='" + $ass_id + "']");
								$ThisThis = $ThisThis.parent().parent().find('td');
								//console.log($ThisThis.html());
								$ThisThis.eq(0).html($('#subject1').val());
								$ThisThis.eq(1).html($topic);
								$ThisThis.eq(2).html($created);
								$ThisThis.eq(3).html($discri);
								$ThisThis.eq(4).html($final_date+"<span class='glyphicon glyphicon-edit edit_each_assgnt959693' aria-hidden='true' style='float:right; padding-right:10px;' ass_id = '"+$ass_id+"'></span>");
								$('#submitaddbuttonf_thisClik').click();
								alert("successfully submitted  ");
									
							} else {
								alert("error  ");		
							}
					
						});	
				
			}
		});	
	
	












//////////////////////////////////
/////////////////////////////////////////
$('#select_new_fl').click(function(e) {
	$('#upad_any_item_1_949693').click();
});
$('#upad_any_item_1_949693').change(function(e) {
	$('#select_new_fl').val($(this).val());
    $('#btnSubmit_this').click();
});

 $('#opad_attachmntopdate_').submit(function(e) {	
		if(true) {
			e.preventDefault();
			$('#progress-div').removeClass('hidden');
			
			$(this).ajaxSubmit({ 
				
				beforeSubmit: function() {
				  $("#progress-bar").width('0%');
				},
				uploadProgress: function (event, position, total, percentComplete){	
					$("#progress-bar").width(percentComplete + '%');
					$("#progress-bar").html('<div id="progress-status" style="color:black; text-align: right;">' + percentComplete +' %</div>')
				},
				 success: function(responseText,statusText) {
			//console.log(responseText);
			$('#upld_a_item_here_fothis').empty();
					$('#upld_a_item_here_fothis').append(responseText);
					
					 
						$('#progress-div').delay(500).queue(function(){
							$(this).addClass('hidden').clearQueue();
							 $("#progress-bar").width('0%');
						});
					 
										
										
				},
				resetForm: true 
			}); 
			return false; 
		}
	});

	$('#saAYtOaadmin').validate({
		  	rules: { 
				 subjecta:{required: true}
			},
			submitHandler: function(form, event){
			//$fname ='';
			//$lname ='';
			//$user_id ='';
			//$priority ='';
			//$details ='';
			//$class_dp ='';
			//$image	 ='';
			$subject = $('#subjecta').val();
			$description = $('#sub_adisc').val();
			$attachment = $('.div_les_edu454445').attr('src');
			//console.log($subject+$description+$attachment);
				$.post(ajax_url,{action:'update_the_post_to_all',subject:$subject, description:$description, attachment:$attachment},function(response){
					//console.log(response);
					if(response){
						response =$.parseJSON(response);
						if(response == 1) {
							$('#submitaddbutton').click();
							alert('successfully submitted  ');
							$('#subjecta').val('');
							$('#sub_adisc').val('');
							$('#select_new_fl').val('file');
						} else {
							
						}
					}
									
				});

			
				
			}
		});	
	





///////////////////////////////////////
///////////////////////////////






//////////////////////////////////////////////////////////////////////////////
////////////// reprt deta

$('#selectTheYearThis').change(function(e) {
    $('#select_semtr_th').empty();
	$('#'+'select2-'+'select_semtr_th'+'-container').html('');
	$('#'+'select2-'+'select_semtr_th'+'-container').attr('title', '');
	
	
    $('#selectThSubJecTsHere').empty();
	$('#'+'select2-'+'selectThSubJecTsHere'+'-container').html('');
	$('#'+'select2-'+'selectThSubJecTsHere'+'-container').attr('title', '');
	
	$('.commonemfhjthriut').empty();
	
	$value = $(this).val();
	$class = $('#actlClassHereDi').attr('class_id');
	$.post(ajax_url,{action:'get_semS',class:$class, value:$value},function(response){
					//console.log(response);
					if(response){
						response =$.parseJSON(response);
						$SsSsrting ='<option disabled selected>select</option>';
						for(kk=0; kk<response.length; kk++) {
							Rresponse = response[kk];
							//console.log(Rresponse);
							$SsSsrting = $SsSsrting+'<option value="'+Rresponse.sem_id+'">'+Rresponse.sem_id+'</option>';
						}
						
						$('#select_semtr_th').append($SsSsrting);
					}
	});
	
	
});

$('#select_semtr_th').change(function(e) {
	
	
    $('#selectThSubJecTsHere').empty();
	$('#'+'select2-'+'selectThSubJecTsHere'+'-container').html('');
	$('#'+'select2-'+'selectThSubJecTsHere'+'-container').attr('title', '');
	
	
	
	$('.commonemfhjthriut').empty();
	
	$class = $('#actlClassHereDi').attr('class_id');
    $year = $('#selectTheYearThis').val();
	$value = $(this).val();
	$.post(ajax_url,{action:'get_subYhtS',class:$class, value:$value, year:$year },function(response){
					//console.log(response);
					if(response){
						response =$.parseJSON(response);
						$SsSsrting ='<option disabled selected>select</option>';
						for(kk=0; kk<response.length; kk++) {
							Rresponse = response[kk];
							//console.log(Rresponse);
						 	$SsSsrting = $SsSsrting+'<option value="'+Rresponse.id+'">'+Rresponse.name+'</option>';
						}
						
						$('#selectThSubJecTsHere').append($SsSsrting);
					}
	});
	
	
	
	
});


$('#selectThSubJecTsHere').change(function(e) {
    $value = $(this).val();
	$actual_sub = $('#selectThSubJecTsHere :selected').text();
	$('#ecamfjsdfhsjkfd').empty();
	$('#assgnfjsdfhsjkfd').empty();
	$.post(ajax_url,{action:'get_each_detailsS', value:$value },function(response){
					//console.log(response);
					if(response){
						response =$.parseJSON(response);
						$SsSsrting ='';
						$exxam = response.exam;
						for(kk=0; kk<$exxam.length; kk++) {
							Rresponse = $exxam[kk];
							//console.log(Rresponse);
							
							
								
							$Select = '';
							$chkL = $('#'+'id_is-'+Rresponse.id+'-'+'exam'+'-'+'--v').hasClass('tis0thud0thuis');
							
							if($chkL) {
								$Select = 'checked="true"';
							}
							
						 	$SsSsrting = $SsSsrting+'<div style="padding:6px; display:inline-block;"><input type="checkbox" data_id="'+Rresponse.id+'" '+$Select+' total="'+Rresponse.total+'" data_item="exam" data-toggle="tooltip" title="'+Rresponse.description+'"  class="thisisthecjekboxhope949693" value="'+Rresponse.series+'" subject="'+$actual_sub+'">'+Rresponse.series+'</div>';
						}
						
						$('#ecamfjsdfhsjkfd').append($SsSsrting);
						
						///////////////////
						
						$SsSsrting ='';
						$assignments = response.assignment;
						for(kk=0; kk<$assignments.length; kk++) {
							Rresponse = $assignments[kk];
							//console.log(Rresponse);
							
							
							$Select = '';
							$chkLa = $('#'+'id_is-'+Rresponse.id+'-'+'assignment'+'-'+'--v').hasClass('tis0thud0thuis');
							
							if($chkLa) {
								$Select = 'checked="true"';
							}
							
							
						 	$SsSsrting = $SsSsrting+'<div style="padding:6px; display:inline-block;"><input type="checkbox" data_id="'+Rresponse.id+'" '+$Select+'  total="100"  data_item="assignment"  data-toggle="tooltip" title="'+Rresponse.description+'" class="thisisthecjekboxhope949693" value="'+Rresponse.topic+'"  subject="'+$actual_sub+'">'+Rresponse.topic+'</div>';
						}
						
						$('#assgnfjsdfhsjkfd').append($SsSsrting);
					}
	});
	
});

$(document).on('click', '.thisCkik949693', function(e) {
	$(this).parent().remove();
	$data_id = $(this).parent().attr('data_id');
	 $data_item = $(this).parent().attr('data_item');
	//$("thisisthecjekboxhope949693 [data_id='" +$data_id +"'][data_item='" + $data_item + "']").attr("checked", false);
});

$(document).on('change', '.thisisthecjekboxhope949693', function(e) {
	//console.log('event');
	$data_id= $(this).attr('data_id');
	$data_item= $(this).attr('data_item');
	$value = $(this).attr('value');
	 $subject = $(this).attr('subject');
	
	  if($(this).is(":checked")) {
		  $('#appentAll_here949693').append('<div id="'+'id_is-'+$data_id+'-'+$data_item+'-'+'--v'+'" class="tis0thud0thuis" data_id="'+$data_id+'" data_item="'+$data_item+'" subject = "'+$subject+'"><label>'+$value+'</label><span class="glyphicon glyphicon-remove thisCkik949693 hidden" aria-hidden="true" style="float:right;cursor:pointer;"></span></div>');
		  
			$(this).attr("checked", true);
        } else {
			$('#'+'id_is-'+$data_id+'-'+$data_item+'-'+'--v').remove();
			$(this).attr("checked", false);
			
		}
	
});


$('#createTthepdfmanfuckit').click(function(e) {
	
	$aRaay = [];
	$class = $('#actlClassHereDi').attr('class_id');
	
     $('#appentAll_here949693').find('div').each(function (i, el) {
		 ////console.log($(this).html());
		 $data_item = $(this).attr('data_item');
		 $data_id =  $(this).attr('data_id');
		 	object = {}; 
			object[$data_item] = $data_id;
			 $aRaay.push(object);
		 
	 });
	 ////console.log($aRaay);
	 
	 $tTable ='<table class"table" id="howToDothis949693"><thead><tr>';
						for(kk=0; kk<$aRaay.length; kk++) {
							$inrVaxl = $aRaay[kk];
							if($inrVaxl.student) {
								switch(parseInt($inrVaxl.student)) {
									case 1:
										$tTable = $tTable +'<th> no </th>';
									break;
									case 2:
										$tTable = $tTable +'<th> roll no </th>';
									
									break;
									case 3:
										$tTable = $tTable +'<th> reg no  </th>';
									
									break;
									case 4:
										$tTable = $tTable +'<th> name  </th>';
									
									break;
									case 5:
										$tTable = $tTable +'<th> mobile </th>';
									
									break;
									case 6:
										$tTable = $tTable +'<th> Parent` name </th>';
									
									break;
									case 7:
										$tTable = $tTable +'<th> Parent` Mobile </th>';
									
									break;
									case 8:
										$tTable = $tTable +'<th>image </th>';
									
									break;
									default:
								}
							} else if($inrVaxl.exam) {
								if($inrVaxl.exam > 0)  {
								$actuaKl = $('#'+'id_is-'+$inrVaxl.exam+'-exam-'+'--v').text();
								$subject = $('#'+'id_is-'+$inrVaxl.exam+'-exam-'+'--v').attr('subject');
								$tTable = $tTable +'<th> '+$subject+'-'+$actuaKl+' </th>';
								}
							} else if($inrVaxl.assignment) {
								if($inrVaxl.assignment >0) {
								
								$actuaKl = $('#'+'id_is-'+$inrVaxl.assignment+'-assignment-'+'--v').text();
								$subject = $('#'+'id_is-'+$inrVaxl.assignment+'-assignment-'+'--v').attr('subject');
								$tTable = $tTable  +'<th> '+$subject+'-'+$actuaKl+' </th>';
								}
							}
							
						}
						$tTable = $tTable +'</tr></thead> <tbody>';
						
	 $.post(ajax_url,{action:'create_this_data', class:$class, array:$aRaay },function(response){
					////console.log(response);
					if(response){
						response =$.parseJSON(response);
						//console.log(response);
						
						
						
						for(kk=0; kk<response.length; kk++) {
							$inrVal = response[kk];
							$tTable = $tTable +'<tr>';
							
							
							objects = $inrVal.marks;
							 
								
									for(ll=0; ll<objects.length; ll++) {
										$objZro = objects[ll];
					
				 
										$.each($objZro, function(keuu, value) {
												
												 //console.log(keuu+'---------'+value);
												  if(keuu == 'no') {
													 value = kk+1; 
												  } 
												  if(keuu == 'image') {
													 value = '<img style="width:60px; height:60px;" src="../student/images_/'+value+'" >'; 
												  }
												  if(value) {
													
												  } else {
													    value ='<span style="padding:3px"></span>';
												  }
												  console.log(value);
												  $tTable = $tTable +'<td>'+value+'</td>';
											});
											
									}
								
								
								////console.log('--------------------------------------');
								
							
							$tTable = $tTable +'</tr>';
						}
						
						$('#actualHentrtListHere').empty();
						$tTable = $tTable +'</tody></table>';
						$('#actualHentrtListHere').append($tTable);
						
	 $lengThT = $('#howToDothis949693 thead tr th').length;
						//console.log($lengThT);
	 $('#howToDothis949693 thead tr th').css('width', (98/$lengThT)+'%' );
	 $('#howToDothis949693 tbody tr td').css('width', (98/$lengThT)+'%' );
					}
	 });
	 
	 
});

$(document).on('click', '#saveAsPdfpdfmanfuckit', function(e) {
	
	
});

$('#subThiS949693').submit(function(e) {
	
    var tbl = $('table#howToDothis949693 tr').get().map(function(row) {
	  return $(row).find('td, th').get().map(function(cell) {
		return $(cell).html();
	  });
	});
	
	$('.thisisthecjekboxhope949693').attr("checked", false);
	nameArray = JSON.stringify(tbl);
	$('#thisPosthshit').val(nameArray);
    //$.post("../pdf.php", { table:nameArray });

});

//////////////////// n end
///////////////////////////////////////////////////////////////////////////////////




		
});//////////////////////////


	
	
	
	
	
										
	function setNewStudentForView($user_name, $fname, $lname, $sex, $address, $mobile, $class) {
		
		classIDB =$('#myNameClassUniq').attr('class_name');
		
		StringForAppB =" <div class='fg_base'><div class='row bord'><div class='col-md-3 img_cls'><img  width='200px' height='200px' src='../assets/images/defalut.jpg'/></div><div class='col-md-4 fg_base'><div class='row fg_baserow'><div class='col-md-12'><label >"+$fname +" "+$lname+"</label></div></div><div class='row fg_baserow'><div class='col-md-12 getTheUsrtId'><label >st-"+$user_name+" </label></div></div><div class='row fg_baserow'><div  class='col-md-12'><label >"+"  "+"</label></div></div><div class='row fg_baserow'><div class='col-md-12'><label >"+$mobile+"<i style='padding-left:10px;' class='fa fa-mobile'></i></label></div></div><div class='row fg_baserow'><div class='col-md-12'><label id='set_theClASa' >"+classIDB+"</label></div></div></div><div class='col-md-4'><div class='heift200'><textarea  disabled placeholder='no address' >"+$address+"</textarea></div></div>"+
		 "<div class='col-md-1'><div class='heift200' style='padding-top:20px'><input type='button' value='edit' class='btn edit_teacher_details'  data-toggle='modal' data-target='#myModal'></div></div>"
		+"</div></div>";
	//console.log(StringForAppB);
		$('#view_Student').prepend(StringForAppB);
		activaTab('view-class');
			
		
	}
	
	
function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
}

function generatePassword() {
    var length = 8,
        charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}

	
	function upadateTeacherval($user_name, $fname, $lname,  $address, $mobile) {
	
	
		$thismain = $('.getTheUsrtId:contains("'+$user_name+'")').parent().parent();
		$thismain.children(".fg_baserow:eq(0)").find('.col-md-12').find("label:eq(0)").html($fname+' '+$lname);
		//$thismain.children(".fg_baserow:eq(0)").find('.col-md-12').find("label:eq(1)").html($lname);
		
		
		$thismain.children(".fg_baserow:eq(3)").find('.col-md-12').children("label").html($mobile+'<i style="padding-left:10px;" class="fa fa-mobile"></i>');
		
		$thismain.parent().find('.heift200').find('textarea').html($address);
	}
	