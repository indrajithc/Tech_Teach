$(document).ready(function(e) {
		PATH = window.location.origin+'/tech_teach';
		 console.log( "window READY" );
		  jQuery("time.timeago").timeago();
		  $('[data-toggle="tooltip"]').tooltip();
		  
		  $('input[type=text][name=secondname]').tooltip({ /*or use any other selector, class, ID*/
				placement: "right",
				trigger: "focus"
			});
		  
		 var globa_array_of_name_of_files_for_delete =[];
		 
		 $.post(ajax_url,{action:'delete_all_file'},function(response){//console.log(response);
		 });	
		 
		$('#q_wall80869191').css('min-height', $('body').height()+30);
		console.log($('body').height());
		
		if($('#q_wall80869191').is(':visible')) {
			$('html').css('overflow', 'hidden');
	}
		
		 
		 setTimeout(
  function() 
  {
   $( "#showTheCallers" ).slideDown( "slow", function() {
    // Animation complete.
  });

  }, 5000);
		
		$forboolOpenthepost = false;
		$totleco56867 =$(".rewinnr > div").length;
		$totleco56867 = $totleco56867*300;
		$totleco56867 = $totleco56867+10;
		console.log($totleco56867);
		$('.rewinnr').css('width',$totleco56867);
		focustcall('rewinnr0t6');
		focustcal8l('rewinnrvideo');
		
		function focustcall($clas) {
				$totleco56867 =$("."+$clas+" > div").length;
				$totleco56867 = $totleco56867*200;
				$totleco56867 = $totleco56867+10;
				console.log($totleco56867);
				$('.'+$clas).css('width',$totleco56867);	
		}

		function focustcal8l($clas) {
				$totleco56867 =$("."+$clas+" > div").length;
				$totleco56867 = $totleco56867*300;
				$totleco56867 = $totleco56867+10;
				console.log($totleco56867);
				$('.'+$clas).css('width',$totleco56867);	
		}
window.setInterval(function(){
	//		console.log('------- -- - -');
	if($('#update').is(':visible')) {
			//console.log('dd');
			upadateAnewComment();
			upadateAnewPost();
			checkVideoCall();
	}
			
			}, 5000);


/************************************** for video calling notif ******************************/

function checkVideoCall() {
		$inpu = $('#default_name_id_save_deta').attr('user_name');
		console.log($inpu);
				$('#showTheCallers').empty();
	$.post(ajax_url,{action:'checkVideoCall', user_name:$inpu},function(response){
			// console.log(response);
			response =$.parseJSON(response);
			if(response){
				response = response.data;
				for( uu = 0 ; uu<response.length; uu++) {
					responseq = response[uu];
					responseq =responseq.data;
					 
					//owner //get_aUser_frm_db
					
					$.post(ajax_url,{action:'get_aUser_frm_db', user_name:responseq.owner},function(tyui){
						tyui =$.parseJSON(tyui);
						if(tyui.success ==1 ) {
							tyui_o = tyui.data;
							tyui_o = tyui_o[0];
							console.log(tyui_o );
					$('#showTheCallers').prepend('<div class="col-md-12 innrnewalert" key="'+responseq.call_id+'"><img src="'+PATH+'/teacher/images_/'+tyui_o.image+'" width="100px" height="100px" class="col-md-5"><div class="col-md-7"><h5> '+tyui_o.name+
					'</h5><h6>'+tyui_o.department+
					'</h6></div>');
						}
					
					});
					
				}
				
				//$('#myad_fot_this_key').val(response.call_id);
				
				//$('#nake_a_newVido_call').click();
			}
	});
	
	
}

$(document).on('click', '.innrnewalert', function(e) {
	 $('#myad_fot_this_key').val($(this).attr('key'));
	 $('#nake_a_newVido_call').click();
	
});
///////////////////// anim
$('.post-avatar').click(function(e) {

    
});

/******************************************************************************************** end ***************/

						

		$('#add_a_po_st').validate({
		   rules: { 
				content:{required: true}
			}, 
			submitHandler: function(form, event){
				$text_me = $('#content').val().trim();
				if($text_me.length <1) {
					
					$('#content').val('');
					return;
				}

				$to_who = $('#upld_a_item_here').attr('type');
				$type = $('#btn-select').attr('status');
				$temp_array_of_name_of_files_for_delete = [];
				 $('#upld_a_item_here').find('.div_les_edu454445').each(function (i, el) {
			 $temp_array_of_name_of_files_for_delete.push($(this).attr('src'));
			 console.log($(this).attr('src'));
			});
				
				
				
				if($temp_array_of_name_of_files_for_delete.length == 0) {
					$temp_array_of_name_of_files_for_delete[0] = '';
				} else {
					
				}
				
				$submit = $('#add_a_po_st input[type="submit"]');
				$submit.attr('disabled','disable');
				
				$.post(ajax_url,{action:'add-a-post-by-teacher', text:$text_me, to_who:$to_who, type:$type,attachment:$temp_array_of_name_of_files_for_delete },function(response){
					
					
					console.log('sssssssssssssssssss'+response);
					response =$.parseJSON(response);
					$op = response.success;
					console.log($op);
					if( $op ==1 ){
						////////////////////////////////////////////////////////////////////////////////////////
						$('#upld_a_item_here').empty();
						$('#content').val('');
						upadateAnewPost();
						
					}
					else  {
																		Lobibox.alert('error', {
			msg: "An Error occurred, please refresh the page and try again "
	});
		
					 	//alert("An Error occurred, please refresh the page and try again");
						
					}
				});
				
				
					$submit.removeAttr('disabled');
			
			}
			
			
		});
	
	////////////////////////////////////////syc function ///////////////////////////////
	function upadateAnewPost() {
		//$('#add_a_new_post_Base58634653').after('<div class="post-area-wrapper">dddd</div>');
		
		
		$inpu = $('#add_a_new_post_Base58634653').attr('totoal_post');
			$.post(ajax_url,{action:'uptudate-post', input:$inpu},function(response){
			//console.log(response);
			response =$.parseJSON(response);
			$op = response.success;
			if( $op == 1){
					
				$('#add_a_new_post_Base58634653').after(response.data);
				console.log('added a post');
				$inpu = $('#add_a_new_post_Base58634653').attr('totoal_post', response.count);
			  	jQuery("time.timeago").timeago();
			  	goToByScroll($(".loop_onside_for_ciunt:first").attr('id'));
					//$("#viewOnlyPost").prepend($op);
					
					$myNotfAction = response.notification;
					
						$elementCount = $myNotfAction.length; 
										for( ii=0 ; ii<$elementCount ; ii++) {
											 op_response = $myNotfAction[ii];
											 
											Lobibox.notify('default', {
												showClass: 'wobble',
												hideClass: 'bounceOut',
												title: op_response.name,
												msg: op_response.message,
												img: op_response.image
											});
										}
					
			}
			});	
		
	}
	
	
	
	
	
	
	function upadateAnewComment() {
		$top = 0;
		$('.jzt_a_border').each(function (e){$bot = $(this).attr('comment_id');if($top < $bot ) {$top = $bot;}});
		$inpu = $top;
		
		$bot = $('#update').children().last().attr('id');
			if(typeof $bot === "undefined") {
				$bot = 0;	
			}
		
		//console.log('bottt-------'+$bot+'-------------'+$inpu);
		
			$.post(ajax_url,{action:'uptudate-comment', input:$inpu, output:$bot},function(response){
			//console.log('--- --- ---'+response);
			response =$.parseJSON(response);
			$op = response.success;
			 console.log('--- --- ---'+$op );
			if( $op == 1){
					
				$count = response.count;
				response = response.data;
				
										$elementCount = response.length; 
										for( ii=0 ; ii<$elementCount ; ii++) {
											 op_response = response[ii];
											 //console.log(op_response.id +'----- \n ------');
											 //console.log(op_response.value +'----- \n ------');
											 $('div.post-area-wrapper#'+op_response.id).find('.post-comment-wrapper').append(op_response.value);
											 op_response_not= op_response.notification;
											 Lobibox.notify('info', {
												title:op_response_not.name+' ',
												showClass: 'wobble',
												hideClass: 'bounceOut',
												msg: op_response_not.message,
												img:op_response_not.image
												
												
											});
										}
				
				
				
		  jQuery("time.timeago").timeago();
				//$("#viewOnlyPost").prepend($op);
			}});	
		
	}
	
	
	
	
	
		$(document).on("click", "div a.customAddCmntHr", function(){
				$postid = $(this).parent().attr('post_id');
				$totCountH =  $(this).attr('countid');
				$phead09822 = $(this).closest('.post-area-wrapper').find('.comment-heading-box');
				console.log($phead09822.attr('class'));
						comment_belve_jzt_rep ($postid,  $(this).closest('.post-area-wrapper').find('.post-comment-wrapper'),$phead09822,$totCountH);
					
			
				
			});
			
			
			
			
			function comment_belve_jzt_rep ($postidt, $postCommnt,  $postHeadCommnt, $inpu) {
				
			$.post(ajax_url,{action:'uptudate-commnt', postid:$postidt, input:$inpu},function(response){
			//console.log("ffffffffffffffff"+response);
			response =$.parseJSON(response);
			$op = response.success;
			if( $op == 1){
			$postCommnt.empty();
			$postCommnt.append(response.data1);
			$postHeadCommnt.empty();
			$postHeadCommnt.append(response.data0);
		  jQuery("time.timeago").timeago();
			}});	
		}

	
	
		
		
		
		
		
		$("#prvcysele_post div ").click(function(e){
		     e.preventDefault();
 		 selText = $(this).text();
		 $status = $(this).attr('status');
		 $dpid = $(this).attr("value"); 
		 tempclassName = $(this).find('i').attr('class');
 		 $(this).parents('#btn-select').find('.dropdown-toggle').html('<i class="'+tempclassName+'"></i>'+selText+' <span class="caret"></span>');
		 $('#btn-select').attr('status',$status );
		 
		 
		});			
$('#uplad_a_item_ty_1').click(function(e) {
/*	$content8 = $('#content').val().trim().toLowerCase().replace(/\s/g, "_");
	if($content8.length > 0) {
    $('#upld_a_item_here').attr('type',19);
		
	} else {
		
	}*/
    $('#upld_a_item_here').attr('type',1);
	$('#upad_any_item_1').attr('accept','.jpg,.png,.gif,.jpeg');
	$('#upad_any_item_1').click();
});

$('#uplad_a_item_ty_2').click(function(e) {
	
	$('#upld_a_item_here').attr('type',2);
	$('#upad_any_item_1').attr('accept','.mp4,.3gp,.mkv,.avi,.mov');
	$('#upad_any_item_1').click();
});
$('#uplad_a_item_ty_3').click(function(e) {
	
    $('#upld_a_item_here').attr('type',3);
		
	
	$('#upad_any_item_1').attr('accept','.docx,.pdf,.ppt');
	$('#upad_any_item_1').click();
});
$('#uplad_a_item_ty_4').click(function(e) {
	

    $('#upld_a_item_here').attr('type',4);
	$('#upad_any_item_1').attr('accept','*');
	$('#upad_any_item_1').click();});


$('.ulad_trgg_forall').change(function(e) {

    $('#btnSubmit_this').click();
});






 $('#opad_486_').submit(function(e) {	
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
					$('#upld_a_item_here').append(responseText);
		 
					 
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

$(document).on('click', '.remove_me_54985', function (e) {
		$string_div_vi409842 = '';
   switch (parseInt($('#upld_a_item_here').attr('type'))) {
	   case 1:
	   $string_div_vi409842 = 'img';
	   break;
	   case 2:
	   $string_div_vi409842 = 'video';
	   break;
	   default:
   }
   
	$mainprent = $(this).parent().parent('div');
	$src = $(this).parent().parent('div').find('.div_les_edu454445').attr('src');
	console.log($src );
	
	var removeItem = $src;

	globa_array_of_name_of_files_for_delete = jQuery.grep(globa_array_of_name_of_files_for_delete, function(value) {
	  return value != removeItem;
	});
	$.post(ajax_url,{action:'delete_this_file',src:$src},function(response){
							console.log(response);
							response =$.parseJSON(response);
							if(1==response){
								$mainprent.remove();
							} else {
								//alert("error  ");		
							}
					
						});	
				
	
});



window.onbeforeunload = function(event) {
	$string_div_vi409842 = '';
   switch (parseInt($('#upld_a_item_here').attr('type'))) {
	   case 1:
	   $string_div_vi409842 = 'div img';
	   break;
	   case 2:
	   $string_div_vi409842 = 'div video';
	   break;
	   default:
   }
   
   console.log($string_div_vi409842);
   
   
   
		  $('#upld_a_item_here').find('.div_les_edu454445').each(function (i, el) {
			 globa_array_of_name_of_files_for_delete.push($(this).attr('src'));
			 console.log($(this).attr('src'));
			});
		
		//ass_sessin_me
		if(globa_array_of_name_of_files_for_delete.length>0) {
		$.post(ajax_url,{action:'ass_sessin_me',src:globa_array_of_name_of_files_for_delete},function(response){
							console.log(response);
							//response =$.parseJSON(response);
							if(1==response){} else {}
					
						});	
		
		
		}
if($("#upld_a_item_here > div").length > 0) {
	
	return "";
	
	//$('#remove_me_54985').click();
}
};


$('.post-avatar').click(function(e) {
	console.log($("#upld_a_item_here > div").length);
   // $top = 0;$('.jzt_a_border').each(function (e){$bot = $(this).attr('comment_id');if($top < $bot ) {$top = $bot;}});
			
	//console.log('-- -- -- '+$top);
	upadateAnewComment();
});



$(document).on('click' ,'.remove_post_234234' , function (e) {
	$post_id = $(this).attr('post_id');
	$this = $(this);
		$.post(ajax_url,{action:'remove_apost87635_7464576',post_id:$post_id},function(response){
							console.log(response);
							response =$.parseJSON(response);
							if(1==response){
								$this.parent('div').parent('.post-area-wrapper').remove();
									Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'successfully removed'
	});
Lobibox.alert('success', {
			msg: 'successfully removed  '
	});

								//alert("successfully removed  ");
								} else {
									
													Lobibox.alert('error', {
			msg: 'failed to process '
	});
									}
					
						});	
});


$(document).on('click', '.oclasForIvondWithClcik', function() {
	$('#editclcikcHkdututhr').click();
	$post0_id = $(this).attr('post_id');
	$tsXt = $(this).parent().parent().find('.min_height_maf');
	$('#my_qstnis_0p').val($tsXt.children('p').text());
	$('#updateAformOfDataDot').attr('post_id',$post0_id ); 
	
});

//

	$('#updateThis').validate({
		   rules: { 
				my_qstnis_0p:{required: true}
			}, 
			submitHandler: function(form, event){
				$post_id = $('#updateAformOfDataDot').attr('post_id'); 
				
				if($post_id >0) {
				$textUp = $('#my_qstnis_0p').val();	
					$.post(ajax_url,{action:'updateApost', text:$textUp, postid:$post_id },function(response){
						console.log(response);
						if(response) {
							response =$.parseJSON(response);
							if(response == 1) {
								$('#update #'+$post_id ).find('.min_height_maf').children('p').html($textUp);
								$('#my_qstnis_0p').val('');	
								$('#submitaddbutton_0').click();
							}
							
						}
					
				});
					
					
				}
			
			}
			
			
		});


		$(document).on('keyup', ".addACommentMe_post", function(e){
				if((e.keyCode || e.which) == 13) { //Enter keycode
					$text_me = $(this).val();
					$this = $(this);
					$postid = $(this).parent().attr('post_id');
					$postdate = $(this).parent().attr('post_date');
					if (!($text_me.length>1)) {
						$('.addACommentMe').parents('#'+$postid).find("textarea").val('');
						return;
					}				
					$.post(ajax_url,{action:'add-a-comment-to-poast', text:$text_me, postid:$postid, postdate:$postdate },function(response){
						console.log(response);
						response =$.parseJSON(response);
						$op = response.success;
						var d757575 = new Date();

console.log(d757575);
						if( $op != 0){
							$$myimg= $('#default_name_id_save_deta').attr('myimg');
							console.log($$myimg);
							$string_5895 = '<div class="post-comment-container jzt_a_border"  comment_id="'+$op+'"><div class=" pull-left-child"><div class="post-comment-avatar-post" style="background:url('+
					$$myimg+
					');"></div></div><div class="pull-right-comment"><div class="post-comment-name"><a href="">'+
					$('#default_name_id_save_deta').attr('myname')+
					'</a></div><div class="post-comment-meta"><p> <time class="timeago" datetime="'+
					 d757575.toISOString()+'" ></time></p></div><div class="post-comment-description"><p>'+$text_me+'</p> </div></div></div>';
							console.log('success');
							$this.val('');
							$this.closest('.post-area-wrapper').find('.post-comment-wrapper').append($string_5895);
							
		  jQuery("time.timeago").timeago();
						}
						else  {
												Lobibox.alert('error', {
			msg: "An Error occurred, please refresh the page and try again "
	});
							//alert("An Error occurred, please refresh the page and try again");
							
						}
					});
					
					
					
				 }
			});  
		
		


$(document).on('click', '#clickdwn542345354', function (e) {
	//e.preventDefault();jzt_a_border
	
	
});







$(function(){
   $(window).scroll(function(){
	   
		if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
		   
			$last_time = $('#update').children('.loop_onside_for_ciunt').last().attr('id');
			if(typeof $last_time === "undefined") {
				return;	
			}
			//alert($last_time);
		  // console.log("hhhhhhhhhhhhhhhhhhhhhhhhh  "+$last_time);
			
			$.post(ajax_url,{action:'uptudate-bottom-post', input:$last_time},function(response){
				console.log(response);
				response =$.parseJSON(response);
				$op = response.success;
				if( $op == 1){
					$data = response.data;
					for( $jj = 0 ;$jj <$data.length ;$jj++) {
						$data_ = $data[$jj];
					//console.log('count '+$data_);
						$("#update").append($data_.value);
						$('div.post-area-wrapper#'+$data_.post).find('.comment-heading-box').empty();
						$('div.post-area-wrapper#'+$data_.post).find('.comment-heading-box').append($data_.id);
						
					}
			}});	
				   
	   }
   });
});








/****************************************** glry*************************************/


$('#bss5987358').mouseenter(function(e) {
	$('#sho585739587').removeClass('hidden');
});


$('#bss5987358').mouseleave(function(e) {
	$('#sho585739587').addClass('hidden');
	
});

$('.clickmeforwiew').click(function(e) {
    $srcing = $(this).attr('src');
    $act_id = $(this).attr('post_id');
    $cmmtcou_id = $(this).attr('cmmnt_count');
	$Discript = $(this).attr('data-original-title');
	console.log($srcing );
	$('#actual_cont898557863').empty();
	$string_746  = '<img src="'+$srcing +'" style= "max-width:100%; max-height:410px; width:auto; height:auto;" class="addedimgclas5487453857"> <div class="showDiscriptiong"><p>'+$Discript+'</p></div>';
	$('#actual_cont898557863').append($string_746 );
	
		el = $('.addedimgclas5487453857');
        el.addClass('shake');
        el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
        function (e) {
            el.removeClass('shake');
        });
		
					$('#actual_commnt898557863').empty();
		if($cmmtcou_id >0) {
		
			$.post(ajax_url,{action:'uptudate-commnt', postid:$act_id, input:$cmmtcou_id},function(response){
				console.log("ffffffffffffffff"+response);
				response =$.parseJSON(response);
				$op = response.success;
				if( $op == 1){
					console.log("ffffffffffffffff"+response.data1);
					$('#actual_commnt898557863').append(response.data1);
					jQuery("time.timeago").timeago();
				}});	
		}
});

$(document).on('dblclick', '.clickmeforwiewforvideo', function(e) {
	$('.addedimgclas5487453857').remove();
	$('#actual_cont5566456456').empty();
	console.log('dbclc');
	
	$('#actual_cont5566456456').append('reload this page');
	
	});

$('.clickmeforwiewforvideo').click(function(e) {
    $srcing = $(this).find('source').attr('src');
    $act_id = $(this).attr('post_id');
    $cmmtcou_id = $(this).attr('cmmnt_count');
	console.log($srcing );
	$Discript = $(this).attr('data-original-title');
	
	if($('video.addedimgclas5487453857').hasClass("addedimgclas5487453857")) {
		$('.addedimgclas5487453857')[0].pause(); 
	}
	
	$('#actual_cont5566456456').empty();
		
	$extrm = $srcing.split('.').pop();
	$string_746  = '<video controls autoplay style= "max-width:100%; max-height:410px; width:auto; height:auto;" class="addedimgclas5487453857" ><source src="'+$srcing +'"  type="video/'+$extrm+'" ></video> <div class="showDiscriptiong"><p>'+$Discript+'</p></div>';
	$('#actual_cont5566456456').append($string_746 );
	
		el = $('.addedimgclas5487453857');
        el.addClass('shake');
        el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
        function (e) {
            el.removeClass('shake');
        });
		
					$('#actual_commnt56456456').empty();
		if($cmmtcou_id >0) {
		
			$.post(ajax_url,{action:'uptudate-commnt', postid:$act_id, input:$cmmtcou_id},function(response){
				//console.log("ffffffffffffffff"+response);
				response =$.parseJSON(response);
				$op = response.success;
				if( $op == 1){
					//console.log("ffffffffffffffff"+response.data1);
					$('#actual_commnt56456456').append(response.data1);
					jQuery("time.timeago").timeago();
				}});	
		}
});





$('.clickmeforwiewdoc').click(function(e) {
    $srcing = $(this).attr('src');
    $act_id = $(this).attr('post_id');
    $cmmtcou_id = $(this).attr('cmmnt_count');
	console.log($srcing );
	$('#actual_contdoc898557863').empty();
	$actuname3 =  $srcing.split('/').pop();
	$string_746  = '<embed style= "max-width:100%; max-height:410px; width:100%; height:410px;" class="addedimgclas5487453857" src="'+$srcing +'"></embed> <a  href="../download.php?link=post/'+$actuname3+'"  ><i class="fa fa-download"></i>Download here</a>';
	$('#actual_contdoc898557863').append($string_746 );
	
		el = $('.addedimgclas5487453857');
        el.addClass('shake');
        el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
        function (e) {
            el.removeClass('shake');
        });
		
					$('#actual_commntdoc').empty();
		if($cmmtcou_id >0) {
		
			$.post(ajax_url,{action:'uptudate-commnt', postid:$act_id, input:$cmmtcou_id},function(response){
				console.log("ffffffffffffffff"+response);
				response =$.parseJSON(response);
				$op = response.success;
				if( $op == 1){
					console.log("ffffffffffffffff"+response.data1);
					$('#actual_commntdoc').append(response.data1);
					jQuery("time.timeago").timeago();
				}});	
		}
});



$('.downl_dfdfgdfgdfgdfdf').click(function(e) {
    $srcing = $(this).attr('srct');
    $act_id = $(this).attr('post_id');
    $cmmtcou_id = $(this).attr('cmmnt_count');
	console.log($srcing );
	console.log($act_id );
	$('#actual_543dwnld').empty();
	$actuname3 =  $srcing.split('/').pop(); 
	
	$string_746  = '<embed style= "max-width:100%; max-height:410px; width:100%; height:410px;" class="addedimgclas5487453857" src="'+$srcing +'"></embed> <a  href="../download.php?link=post/'+$actuname3 +'"  ><i class="fa fa-download"></i>Download here</a>';
	$('#actual_543dwnld').append($string_746 );
	
		el = $('.addedimgclas5487453857');
        el.addClass('shake');
        el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
        function (e) {
            el.removeClass('shake');
        });
		
					$('#actual_commntdwnld').empty();
		if($cmmtcou_id >0) {
		
			$.post(ajax_url,{action:'uptudate-commnt', postid:$act_id, input:$cmmtcou_id},function(response){
				console.log("ffffffffffffffff"+response);
				response =$.parseJSON(response);
				$op = response.success;
				if( $op == 1){
					console.log("ffffffffffffffff"+response.data1);
					$('#actual_commntdwnld').append(response.data1);
					jQuery("time.timeago").timeago();
				}});	
		}
});











$('#image8579935').click(function(e) {
    $('.forall4divhide').addClass('hidden');
    $('.main_body_gal').removeClass('hidden');
	if($('video.addedimgclas5487453857').hasClass("addedimgclas5487453857")) {
	$('.addedimgclas5487453857')[0].pause(); 
	}$('#actual_cont5566456456').empty();
	
});
$('#video38597358').click(function(e) {
    $('.forall4divhide').addClass('hidden');
    $('.main_body_video').removeClass('hidden');
    
});
$('#doc3857348').click(function(e) {
    $('.forall4divhide').addClass('hidden');
    $('.main_body_doc').removeClass('hidden');
	if($('video.addedimgclas5487453857').hasClass("addedimgclas5487453857")) {
	$('.addedimgclas5487453857')[0].pause(); 
	}$('#actual_cont5566456456').empty();
    
});
$('#othr4853457').click(function(e) {
    $('.forall4divhide').addClass('hidden');
    $('.main_body_dwnld').removeClass('hidden');
	if($('video.addedimgclas5487453857').hasClass("addedimgclas5487453857")) {
	$('.addedimgclas5487453857')[0].pause(); 
	}$('#actual_cont5566456456').empty();
    
});










/****************************************************************/





});


function goToByScroll(id){
      // Remove "link" from the ID
    //id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $("#"+id).offset().top},
        'slow');
}