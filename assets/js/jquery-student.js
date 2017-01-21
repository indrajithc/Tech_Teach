$(document).ready(function(e) {
		
		 console.log( "window READY" );
		  jQuery("time.timeago").timeago();
		  $('[data-toggle="tooltip"]').tooltip();
		  
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

/***********************************uplad image only **************************************/
$(document).on("click", "#upadanimage", function() {
	
		$('#upladimageprofselectf').val('');
		$('#upladimageprofselectf').click();
	
	});
	
	

$('#upladimageprofselectf').change(function() {
	 
	 
		$("#upladimageprof").ajaxForm({
		 success: function(responseText,statusText) {
			console.log(responseText);
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
	$sest_utl_p_ = 'student/images_/';
	
	$('#myModal').click();
	
	
	
	$.ajax({
		url: '../crop_photo.php',
		type: 'POST',
		data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H, sest_utl_p_:$sest_utl_p_},
		success:function(data){
			console.log(data);			
			$data =data.replace(/^.*[\\\/]/, '');

			$ght = $('#display_my_image_in_prof').parent();
			$ght.find('img').attr('src',''+window.location.origin+'/tech_teach/student/images_/'+$data+'');
				$.post(ajax_url,{action:'update-sudent-image',images:$data},function(response){
							console.log(response);
							response =$.parseJSON(response);
							if(1 == response.success){
								console.log("successfully submitted  ");
	
							}
							else {
								alert("failed to save  ");	
							}
				});
		}
	});
	

    });
	
	

	

	
	
	function show_popup_crop(url) {
	$('#cropbox').attr('src', url);
	try {
		jcrop_api.destroy();
	} catch (e) {
		
	}
	
    $('#cropbox').Jcrop({
      aspectRatio: TARGET_W / TARGET_H,
      setSelect:   [ 100, 100, TARGET_W, TARGET_H ],
      onSelect: updateCoords
    },function(){
        jcrop_api = this;
    });

	$('#photo_url').val(url);
	$('#popup_upload').hide();
	$('#loading_progress').html('');
	$('#photo').val('');
	$('#popup_crop').show();
}

function updateCoords(c) {
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
}


/**************************************end image edit *************************************************/
		
		
		
		
			
/********************************************************************************
            **************************for my cust qwall fir global******************************
						                                ****************************************************/
	window.setInterval(function(){
	//		console.log('------- -- - -');
	if($('#q_wall80869191').is(':visible')) {
			//console.log('dd');
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
							console.log(response);
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
	console.log($status);	
	$.post(ajax_url,{action:'like_dislik_replay',qstn:$qstn, status:$status},function(response){
		console.log(response);
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
	//console.log($totopost);
	$.post(ajax_url,{action:'uptudate-qstn', input:$totopost},function(response){
			console.log(response);
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
				//console.log($actu_op);
				$solved = '';
				if($actu_op.replay) {
				$solved = '<string> [solved] </strong>';	
				}
					$('#newQuestions80869191_id').prepend('<div class="subquetn_80869191 connon_class_dorJqry_Rvnt" qstn_id="'+$actu_op.id+'"  admin="'+$actu_op.admin+'" time = "'+$actu_op.date+'"><i class="fa fa-question-circle"></i>'+$actu_op.subject+$solved+'</div>');
			}
			//$('#add_a_new_post_Base58634653').after(response.data);
			console.log('added a post');
			
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
							console.log(response);
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
			console.log(response);
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
	console.log($q_id+'-'+$admin+'-'+$question);
	$('#displaymainqstn80869191').attr('qstn_id', $q_id);
	$('#displaymainqstn80869191').html($question);
	$('.forquestionFav').removeClass('hidden');
	checkIsAfevQorNot($q_id);
	$('.forquestionFav').attr('post_id',$q_id);
	function_for_updateDeta( $q_id, $admin, $time );
	$('#displaymainqstn80869191').attr('admin', $admin);
	$.post(ajax_url,{action:'view_al_replay', qid:$q_id},function(response){
			//console.log(response);
			response =$.parseJSON(response);
			if(response){
				for( yy = 0; yy < response.length ; yy++) {
					response_op = response[yy];
					console.log(response_op.id);
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
			console.log(response);
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
	
	
	console.log($q_id+'---------'+$admin+'------------'+$time);

	 $.post(ajax_url,{action:'get_aUser_frm_db', user_name:$admin},function(response){ 
		 console.log('---------------------'+response);
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
		 console.log('---------------------'+response);
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
					console.log($myQstnHrs);
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
	console.log( $$response+'-xxxxxxxxxxxxxxxxxxxxxxxxx---'+$ratecount+'----'+$my_replay+'----'+$admin);
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
	//console.log(response);
	
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
		console.log($TTgThis);
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
	
	
	
	
		
		
		
		$('#passshow').change(function() {
		$("#toppassrea").removeClass("hidden");
       
    });
		
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
				
				$.post(ajax_url,{action:'update_student_password',cpassword:$cpassword, npassword:$npassword, rpassword:$rpassword},function(response){
							console.log(response);
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
			console.log(responseText);
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
			console.log($subject+$description+$attachment);
				$.post(ajax_url,{action:'update_the_post_to_all',subject:$subject, description:$description, attachment:$attachment},function(response){
					console.log(response);
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


	
		
		
		
			
			
});