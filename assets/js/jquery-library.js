$(document).ready(function(e) {
		
		 console.log( "window READY" );
		  jQuery("time.timeago").timeago();
		  $('[data-toggle="tooltip"]').tooltip(); 
	$(document).ready(function() 
    { 
        $("#view_table10").tablesorter(); 
    } 
); 
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
		//run at start //////////
		$("[name='my-checkbox']").bootstrapSwitch();
		var whole_book = null ;
		var global_main_cont_html = [];
		 global_main_cont_html[0] =$('#display_your_result').html();
		var global_main_head_html =$('#search_head_lin_wrd').html();
		
			 
			 
			
			var whole_book = function () {
				var tmp = null;
				$.ajax({
					'async': false,
					'type': "POST",
					'global': false,
					'dataType': 'JSON',
					'url': ajax_url,
					'data': { action:'get_whole_book' },
					'success': function (data) {
						tmp = data;
					}
				});
				return tmp;
			}();   
						   
		 
		
			
		$('#add_book').validate({
		  	
		   rules: { 
				tname:{required: true},
				author:{required: true},
				edition:{required: true},
				noc:{required: true, number:true}
			}, 
			submitHandler: function(form, event){				
				$text_name = $('#tname').val();
				$author = $('#author').val();
				$edition = $('#edition').val();
				$description = $('#description').val();
				$noc = $('#noc').val();
				$image = $('#display_my_image_in_prof').attr('image_id');
				
				if(typeof $image == "undefined") {	
					$image = null;
					
				}
				if(typeof $description == "undefined") {	
					$description = null;
					
				}
				$section = $('#Section_t option:selected' ).attr('tid');
				if(typeof $section == "undefined") {	
					$section = null;
					
Lobibox.alert('warning', {
			msg: 'select a section '
	});
					return;
				}
				$submit = $('#add_book input[type="submit"]');
				$submit.attr('disabled','disable');
				$.post(ajax_url,{action:'add-book', text_name:$text_name, 
				author:$author, edition:$edition, section:$section, description:$description, 
				noc:$noc, image:$image },function(response){
					console.log(response);
					
					response =$.parseJSON(response);
					$op = response.success;
					if( $op == 1){

Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
		
						setNewStudentForView($author, $text_name, '', $('#display_my_image_in_prof').attr('src'), $description, 'edition '+$edition, 'number of copies '+$noc) ;
						$('#tname').val('');
						$('#author').val('');
						$('#edition').val('');
						$('#description').val('');
						$('#noc').val('');						
					}
					else if ( $op == -1){
						Lobibox.alert('error', {
			msg: 'text already exist '
	});
	
					} else {
								Lobibox.alert('error', {
			msg: 'An Error occurred, please refresh the page and try again'
	});
	
	
					}
					
					$submit.removeAttr('disabled');
				});
				
			
			}
			
			
		});
			
		
		
		
		
		$('#add-book-section').validate({
		  	
		   rules: { 
				uname:{required: true}
			}, 
			submitHandler: function(form, event){
				$uname = $('#add_section_name').val();
				$description = $('#description').val();
				
				
				$submit = $('#add-book-section input[type="submit"]');
				$submit.attr('disabled','disable');
				$.post(ajax_url,{action:'add-book-section', text_name:$uname,description:$description},function(response){
					//console.log(response);
					
					response =$.parseJSON(response);
					$op = response.success;
					if( $op == 1){
						//alertify.alert("successfully submitted");
						$('#view_section_table tbody').append("<tr class='filterable-cell'><td>"+$uname+"</td><td><textarea disabled>"+$description+"</textarea></td></tr>");
						$('.inputError2Statuspar').remove();
						$('#add_section_name').val('');
						$('#description').val('');
								
					}
					else if ( $op == -1){	
						Lobibox.alert('error', {
			msg: 'text already exist '
	});

					} else {
										Lobibox.alert('error', {
			msg: 'An Error occurred, please refresh the page and try again'
	});	
	
					}
					
					$submit.removeAttr('disabled');
				});
				
			
			}
			
			
		});
		
		
		
		$('#add_section_name').keyup(function(){
	 		
			$get_username = $('#add_section_name').val().length;
			if( $get_username >0) {
				$user_name = $('#add_section_name').val();
			$.post(ajax_url,{action:'gettextnamecheck',text_name:$user_name},function(response){
				response =$.parseJSON(response);
				
				$('.inputError2Statuspar').remove();
				if( response.success>0 ) {	
					$('#usernamecheckdivforaddText').append(' <span class="glyphicon glyphicon-remove form-control-feedback inputError2Statuspar" aria-hidden="true"></span>'+
    				'<span id="inputError2Status" class="sr-only inputError2Statuspar">(error)</span>');
						
				} else {
					
						 $('#usernamecheckdivforaddText').append(' <span class="glyphicon glyphicon-ok form-control-feedback inputError2Statuspar" aria-hidden="true"></span>'+
    					'<span id="inputSuccess2Status" class="sr-only inputError2Statuspar">(success)</span>');
						
				}
				
				
			});
				
			} else {
				$('.inputError2Statuspar').remove();	
				
			}
		});
		
		
		
		
		
		
		
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
	$sest_utl_p_ = 'library/images_/';
	
	$('#myModal').click();
	
	
	
	$.ajax({
		url: '../crop_photo.php',
		type: 'POST',
		data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H, sest_utl_p_:$sest_utl_p_},
		success:function(data){
			console.log(data);			
			$data =data.replace(/^.*[\\\/]/, '');

			$ght = $('#display_my_image_in_prof').parent();
			$ght.find('img').attr('src',''+window.location.origin+'/tech_teach/library/images_/'+$data+'');
			
			$('#display_my_image_in_prof').attr('image_id',$data);
			
			
			
			
			/*	$.post(ajax_url,{action:'update-library-text',images:$data},function(response){
							console.log(response);
							response =$.parseJSON(response);
							if(1 == response.success){
								console.log("successfully submitted  ");
	
							}
							else {
								alertify.alert("failed to save  ");	
							}
				});
			$ght.remove('img');
			if(data.length > 0) {
				$ght.html('<div class="editimg" id="upadanimage"><i class="fa fa-pencil-square-o shadow"></i></div><img src =""+window.location.origin+'/tech_teach/'+data+"?" image_name = "'+window.location.origin+'/tech_teach/'+data+' " id="display_my_image_in_prof" >');  
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
		
		
		
		
		
		
		
		
												
	function setNewStudentForView($user_name, $fname, $lname, $img, $address, $mobile, $class) {
		
		classIDB =$('#myNameClassUniq').attr('class_name');
		
		StringForAppB =" <div class='fg_base'><div class='row bord'><div class='col-md-3 img_cls'><img  width='200px' height='200px' src='"+$img+"'/></div><div class='col-md-5 fg_base'><div class='row fg_baserow'><div class='col-md-12'><label >"+$fname +" "+$lname+"</label></div></div><div class='row fg_baserow'><div class='col-md-12'><label >"+$user_name+" </label></div></div><div class='row fg_baserow'><div  class='col-md-12'><label >"+$mobile+"</label></div></div><div class='row fg_baserow'><div class='col-md-12'><label >"+$class+"</label></div></div><div class='row fg_baserow'><div class='col-md-12'><label id='set_theClASa' >"+"</label></div></div></div><div class='col-md-4'><div class='heift200'><textarea  disabled placeholder='no address' >"+$address+"</textarea></div></div></div></div>";
	console.log(StringForAppB);
		$('#view_text').prepend(StringForAppB);
		activaTab('view-class');
			
		
	}
	
	
function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
}
	
		
	//////////////////////////////// search
	
	$('#select_optn_ li a').click(function(e) {
		$vbr = $(this).attr('x_id');
        $('#search_me_man').attr('search_status', $vbr);
		$('#search_concept').html($(this).text());
		$('#search_me_man').val('');
    });	
		
		
		
		
		
		
		$(document).on('click', '.innr_dp_in' ,function(e) {
            console.log('clickForAbookSection');
			$selected_section = $(this).attr('book_section_id');
			$selected_section_nAME = $(this).attr('book_section_name');
            console.log($selected_section);
			
			//whole_book
			 $temp_glbl_var = whole_book;
			$elementCount  = $temp_glbl_var.length; 
			$tempString = "<div class='row padding_bot_top_10'>";
			$cout_i = 0;
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = $temp_glbl_var[ii];
				 console.log('---------------------------------------------------------------------');
				$im_g_g ='';
				if( op_response.section == $selected_section ) {
					if( $cout_i == 6) {
						$tempString = $tempString+'</div><div class="row padding_bot_top_10">';
					}
					
					console.log(UrlExists(''+window.location.origin+'/tech_teach/library/images_/'+op_response.image));
					
					$tempString = $tempString+'<div class="col-md-2"> <div class="innr_dp" style=" background:url(';
					if(UrlExists(''+window.location.origin+'/tech_teach/library/images_/'+op_response.image)) {
						$tempString = $tempString+''+window.location.origin+'/tech_teach/library/images_/'+op_response.image;
						$im_g_g = ''+window.location.origin+'/tech_teach/library/images_/'+op_response.image;
					} else {
						$tempString = $tempString+'../assets/images/book.jpg';
						$im_g_g = '../assets/images/book.jpg';
					}
					$tempString = $tempString+'); background-size: 100% 200px; background-repeat: no-repeat; "><div class="innr_dp_in_01  innr_dp_hover" book_section_id="'+op_response.id+'" name = "'+op_response.name +'"  author = "'+op_response.author +'"  edition = "'+op_response.edition +'"  description = "'+op_response.description +'"  section = "'+op_response.section +'"  noc= "'+op_response.noc +'"  image = "'+$im_g_g+'"  ><h4> '+op_response.name+
					' </h4><h5> author : '+op_response.author+' </h5><h5> edition : '+op_response.edition+' </h5><textarea disabled  class="innr_dp_in_textarea"> '+op_response.description+' </textarea></div></div></div>';
					
					
					$cout_i ++;
				}
		
		
			}
			$tempString = $tempString+'</div>';
			
			$('#display_your_result').empty();
			$('#display_your_result').append($tempString);
			$('#search_bix_my_id').removeClass('hidden');
			$('#back_o9_o').removeClass('hidden');
			$('#search_head_lin_wrd').text($selected_section_nAME);
			$('#search_head_lin_wrd').attr('val_id','1');
			$('#search_me_man').attr('section_id',$selected_section);
			
        });
		
		
		$('#back_o9_o div .btn').click(function(e) {
            $('#display_your_result').empty();
			$status_num = parseInt($('#search_head_lin_wrd').attr('val_id'));
			$status_num  --;
			$('#display_your_result').append(global_main_cont_html[$status_num]);
			if($status_num == 0) {
				$('#search_bix_my_id').addClass('hidden');
				$('#back_o9_o').addClass('hidden');
				global_main_head_html = 'SEARCH';
			}
			$('#search_head_lin_wrd').text(global_main_head_html);
			
			$('#search_head_lin_wrd').attr('val_id',$status_num );
        });
		
		
		$(document).on('click', '.innr_dp_in_01' ,function(e) {
            console.log('clickForAbookSection_01');
			 global_main_cont_html[1] =$('#display_your_result').html();
			 global_main_head_html =$('#search_head_lin_wrd').html();
			$('#search_head_lin_wrd').attr('val_id','2');
			
			$('#display_your_result').empty();
			
			$tempString = '';
			
			$tempString = $tempString + "  <form name='view_book_book' id='view_book_book'><div class='row'><div class='col-md-8'><div class='cust_class'><label class='col-md-3'> name</label><div class='col-md-9 '><label class='col-md-3'>"+ $(this).attr('name')
			+"</label></div></div><div class='cust_class'><label class='col-md-3'>author </label><div class='col-md-9 '><label class='col-md-3'>"+$(this).attr('author')
			+"</label></div></div><div class='cust_class'><label class='col-md-3'>edition </label><div class='col-md-9 '><label class='col-md-3'>"+$(this).attr('edition')
			+"</label></div></div> <div class='cust_class'><label class='col-md-3'>section </label><div class='col-md-9 '><label class='col-md-3'>"+$('#search_head_lin_wrd').text()+
			"</label></div></div><div class='cust_class'><label class='col-md-3'>Number of Copies  </label><div class='col-md-9 '><label class='col-md-3'>"+$(this).attr('noc')
			+"</label></div></div><div class='cust_class'><label class='col-md-3 '> Description </label><div class='col-md-9 '><textarea class='form-control' id='description_e'  disabled >"+$(this).attr('description')
			+"</textarea></div></div></div><div class='col-md-4'><div class='photome'><div class='editimg hidden' id='upadanimage'><i class='fa fa-pencil-square-o shadow'></i></div><img src= "+$(this).attr('image')
			+" id='display_my_image_in_prof'></br></div></div></form>";
			
			
			
			
			
			
			$('#display_your_result').append($tempString);
			//$('#search_bix_my_id').removeClass('hidden');
			//$('#back_o9_o').removeClass('hidden');
			//$('#search_head_lin_wrd').text($selected_section_nAME);
        });
	
		
		
		
		
		function UrlExists(url)
		{ 
		
		
		try {
			var http = new XMLHttpRequest();
			http.open('HEAD', url, false);
			http.send();
			return http.status!=404;
		}catch (err) {
			return false;
		}

		}
		
		
		
		$('#search_me_man').keyup(function(e) {
			 searchMeManTemFun4ButtnClik ();
        });
		
		$('#searchAclickHere').click(function(e) {
			 searchMeManTemFun4ButtnClik ();
        });
		
		function searchMeManTemFun4ButtnClik () {
		$search_status = parseInt($('#search_me_man').attr('search_status'));
			$section_id = $('#search_me_man').attr('section_id'); 	
            $xac_data = $('#search_me_man').val();
			$xac_data= myTrim($xac_data);
			console.log('---searchMeManTemFun4ButtnClik ');
			
			
			
			 $temp_glbl_var = whole_book;
			$elementCount  = $temp_glbl_var.length; 
			$tempString = "<div class='row padding_bot_top_10'>";
			$cout_i = 0;
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = $temp_glbl_var[ii];
				// console.log('---------------------------------------------------------------------');
				$im_g_g ='';
				if( op_response.section == $section_id ) {
					$zero = '0';
					$one = '1';
					 if($search_status == 1) {
							$zero = op_response.name;
							$one = $xac_data;
					 } else if ($search_status == 2)  {						 
							$zero = op_response.author;
							$one = $xac_data;
					 } else if ($search_status == 3)  {
						 
					 } else {
					 }
					if($xac_data.length < 1) {
						$zero = '1';
					$one = '1';
					}
					//console.log($search_status+'>'+$zero+'='+$one );
					if($zero == $one) {
						if( $cout_i == 6) {
							$tempString = $tempString+'</div><div class="row padding_bot_top_10">';
						}
						
						console.log(UrlExists(''+window.location.origin+'/tech_teach/library/images_/'+op_response.image));
						
						$tempString = $tempString+'<div class="col-md-2"> <div class="innr_dp" style=" background:url(';
						if(UrlExists(''+window.location.origin+'/tech_teach/library/images_/'+op_response.image)) {
							$tempString = $tempString+''+window.location.origin+'/tech_teach/library/images_/'+op_response.image;
							$im_g_g = ''+window.location.origin+'/tech_teach/library/images_/'+op_response.image;
						} else {
							$tempString = $tempString+'../assets/images/book.jpg';
							$im_g_g = '../assets/images/book.jpg';
						}
						$tempString = $tempString+'); background-size: 100% 200px; background-repeat: no-repeat; "><div class="innr_dp_in_01  innr_dp_hover" book_section_id="'+op_response.id+'" name = "'+op_response.name +'"  author = "'+op_response.author +'"  edition = "'+op_response.edition +'"  description = "'+op_response.description +'"  section = "'+op_response.section +'"  noc= "'+op_response.noc +'"  image = "'+$im_g_g+'"  ><h4> '+op_response.name+' </h4><h5> author : '+op_response.author+' </h5><h5> edition : '+op_response.edition+' </h5><textarea disabled  class="innr_dp_in_textarea"> '+op_response.description+' </textarea></div></div></div>';
						
						
						$cout_i ++;
					}else if($search_status == 3) {
						if ( (op_response.author.indexOf($xac_data) >= 0) || (op_response.name.indexOf($xac_data) >= 0)) {
							if( $cout_i == 6) {
								$tempString = $tempString+'</div><div class="row padding_bot_top_10">';
							}
							
							console.log(UrlExists(''+window.location.origin+'/tech_teach/library/images_/'+op_response.image));
							
							$tempString = $tempString+'<div class="col-md-2"> <div class="innr_dp" style=" background:url(';
							if(UrlExists(''+window.location.origin+'/tech_teach/library/images_/'+op_response.image)) {
								$tempString = $tempString+''+window.location.origin+'/tech_teach/library/images_/'+op_response.image;
								$im_g_g = ''+window.location.origin+'/tech_teach/library/images_/'+op_response.image;
							} else {
								$tempString = $tempString+'../assets/images/book.jpg';
								$im_g_g = '../assets/images/book.jpg';
							}
							$tempString = $tempString+'); background-size: 100% 200px; background-repeat: no-repeat; "><div class="innr_dp_in_01  innr_dp_hover" book_section_id="'+op_response.id+'" name = "'+op_response.name +'"  author = "'+op_response.author +'"  edition = "'+op_response.edition +'"  description = "'+op_response.description +'"  section = "'+op_response.section +'"  noc= "'+op_response.noc +'"  image = "'+$im_g_g+'"  ><h4> '+op_response.name+' </h4><h5> author : '+op_response.author+' </h5><h5> edition : '+op_response.edition+' </h5><textarea disabled  class="innr_dp_in_textarea"> '+op_response.description+' </textarea></div></div></div>';
							
							
							$cout_i ++;
						}
						
						}
					
				}
		
		
			}
			$tempString = $tempString+'</div>';
			
			$('#display_your_result').empty();
			$('#display_your_result').append($tempString);	
		}
		
		
		function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}

		
		
		
		$('#avilbl_book_idz').change(function(e) {
           
				$('#b_bname').html('');
				$('#b_bauthor').html('');
				$('#b_bedition').html('');
				$('#select_aCopy_buttn').html('COPY number <span class="caret"></span>');
				$('#b_bimg').attr('src','../assets/images/book.jpg');
				$('#get_save_book_delection').attr('book_id','0');
				
				$book_id = $('#avilbl_book_idz').val();
				$.post(ajax_url,{action:'get-a-book',book_id:$book_id},function(response){
							//console.log(response);
							response =$.parseJSON(response); 
							if(typeof response =='object'){
								$avilbl_book_idz_0 = response[0];
								
								$ll = $avilbl_book_idz_0.noc;
								$book_id_1 = $avilbl_book_idz_0.id ;
								$('#select_aCopy').empty();	
									
												
													$.post(ajax_url,{action:'get-a-selected-book',book_id:$book_id_1},function(responsev){
													 console.log('---------'+response);
													responsev =$.parseJSON(responsev);
														if(typeof responsev =='object'){
															
															for($ii =1 ;$ii <= $ll ;$ii++) {
												$tstus = true;
										
															
															
															 $elementCount  = responsev.length;  
															for( iii=0 ; iii<$elementCount ; iii++) { 
																 op_responsae = responsev[iii];
																console.log(op_responsae.copy_id);
																$ty0003 = op_responsae.copy_id;
																if( $ii == $ty0003) {
																	$tstus = false;	
																}
															
															}
																											
															
															if($tstus) {
													$('#select_aCopy').append( '<li><a href="#" My_value ="'+$ii+'">'+$ii+'</a></li>');
												}
												
											}
															
															
															
														}
														
													});
												
												
												
									
									
											
							
								
								
							}
							
				});
				/*
				
				if(!empty($avilbl_book_idz)) {
											$avilbl_book_idz_0 = $avilbl_book_idz[0];
											
											$ll = $avilbl_book_idz_0['noc'];
											$book_id  = $avilbl_book_idz_0['id'];
											
											$query = " SELECT * FROM `library_book`".
											" WHERE book_id = ".$avilbl_book_idz_0['id'];
												$E0000e = $a->display($query);
												
											for($ii =1 ;$ii <= $ll ;$ii++) {
												$tstus = true;
												
												foreach( $E0000e as $value) {
													if( $ii == $value['copy_id']) {
														$tstus = false;	
													}
												}
												
												if($tstus) {
													echo '<li><a href="#" My_value ="'.$ii.'">'.$ii.'</a></li>';
												}
												
											}
										
										}
				
				
				*/
        });
		
		
		
		
		$('#select_aTeachr_stud_booktak').change(function(e) {
            console.log($(this).val());
			$s_id = $(this).val();
			
			$('#get_save_book_delection').attr('user_id','0');
			
			$table = 'student';
			$elected = $(this).find('option:selected').text();
			$elected = $elected.trim();
			$elected = $elected.substring(0, 2);
			if($elected == 'te') {
				$table = 'teacher';
			}
			console.log($elected);
			
			$.post(ajax_url,{action:'get-a-user',table:$table, s_id:$s_id, sess:$elected},function(responsea){
						//	console.log(responsea);
							responsea =$.parseJSON(responsea);
									$('#s_simg').attr('src','../assets/images/defalut.jpg');	
							if(typeof responsea =='object'){
								 console.log(responsea);
								response = responsea.a1;
								if(typeof response =='object'){
								response = response[0];
								$('#s_sname').html(response.fname+' '+response.lname);	
									
								}					 
								response = responsea.a2;
								$('#s_saclass').html(response); 
								
								response = responsea.a3;
								if(typeof response =='object'){
								response = response[0];
								$('#s_sdepartment').html(response.name);
									
								}
								if(typeof response =='object'){
									
								response = responsea.a1;
								response = response[0];
								if(UrlExists(''+window.location.origin+'/tech_teach/'+$table+'/images_/'+response.image)) {
									$('#s_simg').attr('src',''+window.location.origin+'/tech_teach/'+$table+'/images_/'+response.image);	
								} else  {
								}
								}
								
								$('#get_save_book_delection').attr('user_id',$s_id);
							}
							
			});
			
			
			run_The_funCt_for_validate_all ($s_id);
        });
		
	function run_The_funCt_for_validate_all ($s_id) {
		$.post(ajax_url,{action:'get-check-a-user', s_id:$s_id },function(response){
							response =$.parseJSON(response);	
							//console.log(response);
							if(typeof response =='object'){
								 $elementCount  = response.length; 
								 if( $elementCount >0) {
									$('#show_mod_el').click();
								  Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: $elementCount +'books for return'
	});
								 }
								 if( $elementCount >1) {
									$('#get_save_book_delection').attr('user_id','0');
									
									$('#s_simg').attr('src','../assets/images/defalut.jpg');
									$('#s_sname').html('');	
									$('#s_saclass').html(''); 
									$('#s_sdepartment').html('');
								 }
								 response_a = response;
								  $app_for_Str = '';
								for( ioi=0 ; ioi<$elementCount ; ioi++) { 
									response = response_a[ioi];
									console.log(ioi+'----------------'+response);
									 $app_for_Str=  $app_for_Str+'<div class="col-md-8"> '+':'+(ioi+1)+'<div class=" "><label class="col-md-4">'+
									 'Book  ID'+'</label><div class="col-md-8 "><label class=""> '+
									   response.book_id +'</label></div></div></div>';
									   
									 $app_for_Str=  $app_for_Str+'<div class="col-md-8"> <div class=" "><label class="col-md-4">'+
									 'Book  copy'+'</label><div class="col-md-8 "><label class=""> '+
									   response.copy_id +'</label></div></div></div>';
									   $app_for_Str=  $app_for_Str+'<div class="col-md-8"> <div class=" "><label class="col-md-4">'+
									 'Book  copy'+'</label><div class="col-md-8 "><label class=""> '+
									   response.copy_id +'</label></div></div></div>';
									   $app_for_Str=  $app_for_Str+'<div class="col-md-8"> <div class=" "><label class="col-md-4">'+
									 'date'+'</label><div class="col-md-8 "><label class=""> '+
									   response.date +'</label></div></div></div>';
									   $app_for_Str=  $app_for_Str+'<div class="col-md-8"> <div class=" "><label class="col-md-4">'+
									 'dat TO'+'</label><div class="col-md-8 "><label class=""> '+
									   response.to_date +'</label></div></div></div>';
									    $app_for_Str=  $app_for_Str+'<div class="col-md-8"> <div class=" "><label class="col-md-4">'+
									 'dat TO'+'</label><div class="col-md-8 "><label class=""> '+
									   "<input type='checkbox' name='my-checkbox' checked bt_id='"+response.id+"' class='change_stAtus'>" +'</label></div></div></div>';
								}
								$('#mode_appe_nt').empty();
								$('#mode_appe_nt').append($app_for_Str);
								$('.change_stAtus').attr('name','my-checkbox' );
							} 
							
		});
	}
	
		$('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
		  console.log(this); // DOM element
		  console.log($(this).attr('bt_id')); // jQuery event
		  console.log(state); // true | false
		  $id = $(this).attr('bt_id');
		  $status = 1;
			if(state) {
				$status = 1;
			} else {
				//update code
				$status = 0;
			}
			console.log('----'+$status );
				$.post(ajax_url,{action:'update_book_return', id:$id, status:$status },function(response){
							response =$.parseJSON(response);	
							console.log(response);
							if(response ==1){
								if(response ==1) {
									Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'successfully submitted'
	});
									$("#select_aTeachr_stud_booktak:selected").removeAttr("selected");
								}
							}
				});
		});
		
		$(document).on("change", ".change_stAtus" ,function(e) {
			console.log('-------------------u------------------');
			$id = $(this).attr('bt_id');
			if($(this).is(":checked")) {
				$status = 1;
			} else {
				//update code
				$status = 0;
			}
			console.log('----'+$status );
				$.post(ajax_url,{action:'update_book_return', id:$id, status:$status },function(response){
							response =$.parseJSON(response);	
							console.log(response);
							if(response ==1){
								if(response ==1) {
									Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'successfully submitted'
	});
									$("#select_aTeachr_stud_booktak:selected").removeAttr("selected");
								}
							}
				});
		});
		
		
		$(document).on("click", "#select_aCopy li a", function(e) {
		     e.preventDefault();
 		 selText = $(this).text();
		 $unkid = $(this).attr('My_value');
		 if(!($unkid > 0)) {
			 return;
		 }
		 
		 $('#setDivisionText8').attr('ind_name',selText);
 		 $(this).parents('.dropdown').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		
		 console.log($('#avilbl_book_idz').val());
			$book_id = $('#avilbl_book_idz').val();
			$book_nam_e = $('#avilbl_book_idz').find('option:selected').text();
			$book_copy_id = $unkid;
			$.post(ajax_url,{action:'get-a-book',book_id:$book_id},function(response){
							//console.log(response);
							response =$.parseJSON(response);
								$('#get_save_book_delection').attr('book_id',$book_id);
								$('#get_save_book_delection').attr('book_nam_e',$book_nam_e);
								$('#get_save_book_delection').attr('book_copy_id',$book_copy_id);
							if(typeof response =='object'){
								//console.log(response);
								response = response[0];
								$('#b_bname').html(response.name);
								$('#b_bauthor').html(response.author);
								$('#b_bedition').html(response.edition);
								if(UrlExists(''+window.location.origin+'/tech_teach/library/images_/'+response.image)) {
									$('#b_bimg').attr('src',''+window.location.origin+'/tech_teach/library/images_/'+response.image);	
								} else {
									$('#b_bimg').attr('src','../assets/images/book.jpg');	
								}
								
							}
							
			});
		
		
		
		
		});
		
		////////////////////////////////////////////////////////////////////////////////////
		                /////////////////////////////////////////////////////////////////////////////////                          //////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		$(document).on("mousedown", ".hover_action_deta", function(e) {
			console.log($(this).attr('id'));
			//////////////////////////////////////////e.pageY
			$table = 'student';
			$s_id = $(this).attr('id');
			$elected = 'st';
			var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
			if (testEmail.test($s_id)) {
				$table = 'teacher';
				$elected = 'te';
			}
			$st008tr = "<div style='background-color:rgba(0,0,0,0.34); position: absolute; top:"+(e.pageY-300)+"px; left:"+(e.pageX-300)+"px;  padding:9px; width:250px; height:168px; overflow:hidden;' class='mouse_deta508376'><div  class='row_my'>";
			
			$.post(ajax_url,{action:'get-a-user',table:$table, s_id:$s_id, sess:$elected},function(responsea){
							console.log(responsea);
							responsea =$.parseJSON(responsea);
							if(typeof responsea =='object'){
								 console.log(responsea);
								response = responsea.a1;
								if(typeof response =='object'){
									
								response = response[0];
								$st008tr = $st008tr+'<div class="col-my-6" style=" position: absolute; top:5px; left:5px;"><img ';
								if(UrlExists(''+window.location.origin+'/tech_teach/teacher/images_/'+response.image)) {
									$st008tr = $st008tr+' src="'+''+window.location.origin+'/tech_teach/teacher/images_/'+response.image+'"';
								} else  {
									$st008tr = $st008tr+' src="'+'../assets/images/defalut.jpg'+'"';
								}
								$st008tr = $st008tr+' style="width:150px; height:150px;"></div>';
								
								response = responsea.a1;
								$st008tr = $st008tr+'<div class="col-my-6" style=" position: absolute; right:5px; color:white;">';
								if(typeof response =='object'){
								response = response[0];
								$st008tr = $st008tr+'<div style="font-size:14px; text-align:right; padding: 10px 1px 10px 0px; overflow:hidden;">  '+response.fname+' '+response.lname+'</div>';	
									
								}					 
								response = responsea.a2;
								
								$st008tr = $st008tr+'<div style="font-size:14px; text-align:right; padding: 10px 1px 10px 0px; overflow:hidden;"> '+response+'</div>';	
								
								response = responsea.a3;
								if(typeof response =='object'){
								response = response[0];
								$st008tr = $st008tr+'<div style="font-size:14px; text-align:right; padding: 10px 1px 10px 0px; overflow:hidden;">  '+response.name+'</div>';	
									
								}
								
								}
							}
						
			$st008tr = $st008tr+"</div></div></div>";
			$('.hover_action_deta').append($st008tr);
			console.log($st008tr);	
			});
			
			
			///////////////////////////////////////////
			
			
			
		});
		
		$(document).on("mouseout", ".hover_action_deta", function(e) {
			$('.mouse_deta508376').remove();
		});
		$(document).on("mouseup", ".hover_action_deta", function(e) {
			$('.mouse_deta508376').remove();
		});
		
		
                                                                              /////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                                              ///////////////////////////                                                                                                                                                                                                                                       	
	$('#get_save_book_delection').click(function(e) {
   //alertify.alert("Message");
   //alertify.success("Success notification");
   $book_id = $(this).attr('book_id');
   if(typeof $book_id === "undefined") {

	   		Lobibox.notify('warning', {
			size:'mini',
			showClass: 'tada',
			hideClass: 'hinge',
			msg: 'select a book'
	});

	   
		return;	
	} else if($book_id == 0){
			   		Lobibox.notify('warning', {
			size:'mini',
			showClass: 'tada',
			hideClass: 'hinge',
			msg: 'select book copy'
	});

		return;	
	}
   $ownr_id = $(this).attr('user_id');
    if(typeof $ownr_id === "undefined") {
	   		   		Lobibox.notify('warning', {
			size:'mini',
			showClass: 'tada',
			hideClass: 'hinge',
			msg: 'select a user'
	});
		return;	
	} else if($ownr_id == 0){
		
		Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 're select the user'
	});
		return;	
	}
	$copy_id = $(this).attr('book_copy_id');
	if(typeof $copy_id === "undefined") {

	     		   		Lobibox.notify('warning', {
			size:'mini',
			showClass: 'tada',
			hideClass: 'hinge',
			msg: 'select a book'
	});
		return;	
	}
   $st_date = $('#s_date_d').val();
   $to_date = $('#s_date_s').val();
   $name = $(this).attr('book_nam_e')
   console.log($st_date+$to_date);
   $.post(ajax_url,{action:'giv-abook-to-a-ownr',book_id:$book_id, ownr_id:$ownr_id, copy_id:$copy_id, name:$name, st_date:$st_date, to_date:$to_date},function(response){
							response =$.parseJSON(response);
							
							
							if(response.id >0){
								
								Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'successfully submitted'
	});
Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
		
								app_687534576_tehbookTaken($book_id, $copy_id, $name, $ownr_id, $st_date, response.id, $to_date );
								
								
												$('#b_bname').html('');
												$('#b_bauthor').html('');
												$('#b_bedition').html('');
												$('#select_aCopy_buttn').html('COPY number <span class="caret"></span>');
												$('#b_bimg').attr('src','../assets/images/book.jpg');
												$('#get_save_book_delection').attr('book_id','0');
												
												
												$('#get_save_book_delection').attr('user_id','0');
												$('#s_simg').attr('src','../assets/images/defalut.jpg');
												$('#s_sname').html('');	
												$('#s_saclass').html(''); 
												$('#s_sdepartment').html('');
												
								
							} else if(response.id ==-1){
								
								
Lobibox.alert('success', {
			msg: 'can not process :( '
	});
		
		
							}
   });
   
  });
  
  
  function app_687534576_tehbookTaken($book_id, $copy_id, $tenpName, $s_id, $date, $id, $to_date ) {
	  
	$daString = "<tr><td style='width:9%;'>"+$book_id+'-'+$copy_id+"</td><td style='width:20%; padding-left: 15px;'>"+
										$tenpName+
										"</td><td style='width:20%; padding-left: 15px;' id='"+$s_id+"' class='hover_action_deta'  data-toggle='tooltip' title='press and hold for view details'>"+
										$s_id+
										"</td><td  style='width:20%; padding-left: 15px;'>"+
										$date+
										"</td><td  style='width:20%; padding-left: 15px;'>"+
										$to_date+
										'</td><td><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-animate" style="width: 84px;"><div class="bootstrap-switch-container" style="width: 123px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 41px;">ON</span><span class="bootstrap-switch-label" style="width: 41px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 41px;">OFF</span><input type="checkbox" class="change_stAtus" bt_id="'+$id+'" name="my-checkbox" checked=""></div></div></td></tr>';  
										
 $('#mytbodyI_dt').prepend($daString);
  }
                                                                              /////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                                              ///////////////////////////                                                                                                            
	   
	    
	
		
	$('#cutThisScreen').click(function() {
    	jztAbvE();
		$('#te_cpass').val('');
		$('#inputPassword').val('');
		$('#te_repass').val('');
		$('#repassStat').text('');
    });
		
	function jztAbvE() {
		  window.location = 'index.php';
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
				
				$.post(ajax_url,{action:'update_li_teacher_password',cpassword:$cpassword, npassword:$npassword, rpassword:$rpassword},function(response){
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
		


$(document).on('click', '.edit_teacher_details', function(e) {
		$thisnew =$(this).parent().parent().parent('.bord');
		$thisnew = $thisnew.find('.getTheUsrtId');
		$user_name = $thisnew.find('label').attr('book_id');
		console.log($user_name);
		//getaTeacher
		$.post(ajax_url,{action:'getABook',user_name:$user_name},function(response){
				response =$.parseJSON(response);
				console.log(response);	
				if(response.length > 0) {
					response = response[0];
					$('#address9').val(response.description);
					$('#mnumber9').val(response.edition);
					$('#lname9').val(response.author);
					$('#fname9').val(response.name);
					$('#noc949693').val(response.noc);
					$('#submitthisclick').attr('user_name', response.id);
					$('#deleteAtecherForThis949693').attr('user_name', response.id);
				}
		});
	});
	
	$('#clear_me949693').click(function(e) {
        $('#address9').val('');
        $('#mnumber9').val('');
        $('#lname9').val('');
        $('#fname9').val('');
		$('#noc949693').val('');
		$('#submitthisclick').attr('user_name', '');
    });
	
	
	
		$('#checkTheUsrAddbook').validate({
		  	
		   rules: { 
				 mnumber9:{required: true,number: true},
				 uname9:{ required: true, email: true},
				 fname9:{required: true},
				 noc949693:{required: true,number: true}
			}, 
			submitHandler: function(form, event){
				$fname = $('#fname9').val();
				$lname = $('#lname9').val();
				$address = $('#address9').val();
				$mobile = $('#mnumber9').val();
				$user_name = $('#submitthisclick').attr('user_name');
				 $noc = $('#noc949693').val();
				if(typeof $user_name == "undefined") {	 
					 	Lobibox.alert('error', {
								msg: 'An Error occurred, please try again'
						});
					 	return;	
					 
				}
				
				
				
				$submit = $('#add_teacher input[type="submit"]');
				$submit.attr('disabled','disable');
				
				$.post(ajax_url,{action:'update-Book', user_name:$user_name, fname:$fname, lname:$lname, address:$address, mobile:$mobile, noc: $noc },function(response){
					console.log(response);
					response =$.parseJSON(response);
					$op = response.success;
					if( $op == 1){
						
						
						
						Lobibox.alert('success', {
								msg: 'successfully updated  '
						});
					$('#clear_me949693').click();
					$('#submitaddbutton').click();
					upadateTeacherval($user_name, $fname, $lname,  $address, $mobile, $noc);
					
					}
					else {
																	Lobibox.alert('error', {
			msg: 'An Error occurred, please refresh the page and try again'
	});

					 	
						
					}
					
					$submit.removeAttr('disabled');
				});
				
			
			}
			
			
		});
	
	
		
	function upadateTeacherval($user_name, $fname, $lname,  $address, $mobile, $noc) {
	
		$thismain = $(".getTheUsrtId ").find("[book_id='" + $user_name + "']").parent().parent().parent();
		
		console.log($thismain.html());
		
		$thismain.children(".fg_baserow:eq(0)").find('.col-md-12').find("label:eq(0)").html($fname);
		$thismain.children(".fg_baserow:eq(1)").find('.col-md-12').find("label:eq(0)").html($lname);
		//$thismain.children(".fg_baserow:eq(0)").find('.col-md-12').find("label:eq(1)").html($lname);
		
		
		$thismain.children(".fg_baserow:eq(3)").find('.col-md-12').children("label").html("edition "+$mobile);
		$thismain.children(".fg_baserow:eq(4)").find('.col-md-12').children("label").html("number of copies "+$mobile);
		
		$thismain.parent().find('.heift200').find('textarea').html($address);
	}
	
	
	
		
		
		
		
				
		
		
		
	
//////////////////////////////////
/////////////////////////////////////////
$('#select_new_fl').click(function(e) {
	$('#upad_any_item_1').click();
});
$('#upad_any_item_1').change(function(e) {
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
			$('#upld_a_item_here').empty();
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



// JavaScript Document