$(document).ready(function(e) {
		$('[data-toggle="tooltip"]').tooltip(); 
		 console.log( "window READY" );
		 
		     $("#view_table10").tablesorter(); 
		$("[name='my-checkbox']").bootstrapSwitch();
		 
		 $('.bootstrap-switch-container').css('width','160px');
		 
		 
		 
		var classIdForTeacherSelect=0;
		var errorStatus=true;
		var  global_department = 0;
		var  global_department_new = 0;
		var  global_teacher_new ="";
		var  global_department_attrib ;
		var  global_teacher_attrib ;
	
	/////////////////////////////////
	var arrayOfnotifc = [];  
	var arrayOfnotifc_name = [];  
	////////////
	
	
		////////////////////////////////////////////////////////////////////////
		
		
		
			
		$(function(){
		   $(window).scroll(function(){
			  
			  	$window = $(this);
				docViewTop = $window.scrollTop();
				if(docViewTop>179) {
					$('#tabHeadAddCl').addClass('custClassForTopPlez');
				} else {
					$('#tabHeadAddCl').removeClass('custClassForTopPlez');	
				}
				
			
		   });
		});
		
		
		
		///////////// ma jzt cust function try 
		
		
		$(document).on("dblclick", ".hover_edit_deta", function(e) {
			/////////e.pageY
			$('.cust_edit_sty_my_s').remove();
			console.log($(this).attr('val_id'));
			$table = 'student';
			$s_id = $(this).attr('val_id');
			$s_name = $(this).text();
			$div_new_edit = '<div style = "top:'+(e.pageY-300)+'px; left:'+(100)+'px; " class="cust_edit_sty_my_s gradientBoxesWithOuterShadows"><div class="col-md-9 "> <input type="text" id="hover_edit_deta_id" value="'+$s_name+'" prev_data = "'+$s_name+'" val_id = "'+$s_id+'"></div><div class="col-md-3 " style="margin-top: 3px;"><input  type="button" class="btn" value="update" id="hover_edit_deta_id_btn" ></div></div>';
			$(this).prepend($div_new_edit);
			$('#hover_edit_deta_id').focus();
		});
		
		
		$(document).on("blur", ".hover_edit_deta", function(e) {
			$g =$(e.target).attr('id');
			if( $g != 'hover_edit_deta_id') {
				$('.cust_edit_sty_my_s').remove();
			}
		});
		
		$(document).on("click", "#hover_edit_deta_id_btn", function(e) {
			 $table = 'teacher';
			$cont = $('#hover_edit_deta_id').val();
			$prev_data = $('#hover_edit_deta_id').attr('prev_data');
			$val_id = $('#hover_edit_deta_id').attr('val_id');
			console.log($cont +'---'+$prev_data+'--'+$val_id);
			
				$.post(ajax_url,{action:'global-updat-a-single-value', table:$table, zero:$prev_data, one:$cont, id:$val_id },function(response){
					console.log('--------'+response);
				response =$.parseJSON(response); 
				if(response == 1){	
				$This_thi = $('#hover_edit_deta_id_btn').parents().eq(2);
				$This_thi.html($cont);
				console.log($This_thi.attr('class'));
				
				Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'successfully submitted'
	});

				} else {
				
				
					
Lobibox.alert('error', {
			msg: 'error'
	});

				}
				});
			
			
			
		});
		
		/////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$('.inpu_b').click(function(e) {
			$dp_id = $(this).attr('dp_id'); 
			
			$('#moder_drg_p').attr('dp_id', $dp_id);
			
			dptablce =  $(this).parent().parent().find("[dp_id_tb='" + $dp_id + "']");
			
			$rowCount = dptablce.find('tbody').children('tr').length;
			
			
			
			if($rowCount >0) {
				
				$appntTxT = '';
			
			for( ii = 0 ; ii< $rowCount ; ii++ ) {
				$mainDom = dptablce.find('tbody').children('tr').eq(ii).find('td').eq(1);
				$vally = $mainDom.text();
				$idAtt = $mainDom.attr('clss_temp_id');
				$appntTxT =$appntTxT +
				"<div class='col-md-6 '> <div class='min_div_dtule_parent' >"+
				"<label>"+$vally+"</label> </div></div><div class='col-md-6 '><div class='min_div_dtule_parent andAusefulDivClass' id='"+$idAtt+"'  ondrop='drop(event)' ondragover='allowDrop(event)'></div></div>";
			}
			//console.log($appntTxT);
			
			$('#moder_drg_p div').empty();
			$('#moder_drg_p div').append($appntTxT);
			
			
			
			 var row = $(this).closest('table').find(' tbody tr:eq(0)').attr('id');
			
			$.post(ajax_url,{action:'get_classand',dp_id:$dp_id },function(response){
				//	console.log(response);
					response =$.parseJSON(response);
					if(response){
						
						
					$appntTxT = '';
			
			
			$elementCount  = response.length;  
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_responses = response[ii];
				 $appntTxT =$appntTxT +"<div class='min_div_dtule_parent newBgCol' id='"+op_responses.id+"_' ondrop='drop(event)' ondragover='allowDrop(event)'> <div class='chid_mov' draggable='true' id='"+op_responses.user_name+" '  ondragstart='drag(event)'  data-toggle='tooltip' title='"+op_responses.user_name+"'> "+op_responses.fname+" "+op_responses.lname+" </div> </div> ";
			}
			
			$('#moder_drg_c').empty();
			$('#moder_drg_c').append($appntTxT);  
            $('#selectedate').click();
			
			coubtdiviv  = $rowCount;
			
			$('#moder_drg_c').css('height',(coubtdiviv*52+20));
			
			
	    	arrangePresetted(response) ;	
			
					}
					else{
						
Lobibox.alert('warning', {
			msg: 'add a teacher first  '
	});
					}
			
			});
			
			
			}
        });
		
		
		
		///////////////// drag drop
		
		
		
		document.allowDrop = function(ev) {
			ev.preventDefault();
		}
		
		document.drag = function(ev) {
			ev.dataTransfer.setData("Text", ev.target.id);
		}
		
		document.drop = function(ev) {
			ev.preventDefault(); 
			var xcq = ev.target.id;
			console.log($('#'+xcq).attr('class')); 
				var data = ev.dataTransfer.getData("Text");
				undefin = typeof $('#'+xcq).attr('class');
				if (!(undefin === 'undefined')) {
			console.log($('#'+xcq).find('.chid_mov').length);
			if(($('#'+xcq).find('.chid_mov').length==0) && (!$('#'+xcq).hasClass( "chid_mov" ) )) {
				ev.target.appendChild(document.getElementById(data));
         }
				}
			
		soetoutrearr();
			
			
		}





/////////////////////////// end drg drp

////////////////////////// alrt by admin
	$('#model_o_1').click(function(e) {
         conForDisplyDprtmnt ('teacher');
    });
	
	$('#model_o_2').click(function(e) {
         conForDisplyDprtmnt ('student');
		 
    });


	$('#model_o_3').click(function(e) {
         conForDisplyDprtmnt ('parent');
		 
    });
	
	$('#model_o_4').click(function(e) {
         //conForDisplyDprtmnt ('parent');
		 
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
				 $tempString=$tempString+'<div class="inr_58475" id="'+op_response.did+'" ><h4 class="col-md-9 inr_58475_in">'+op_response.name+'</h4> <input class="inr_58475_in  paadle546465" type="checkbox" ></div>';
				 
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
	console.log($bool);
	
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
	console.log(prnt_di);
	
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
		console.log($(this).parent('div').attr('id'));
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
	console.log($bool);
	
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
			console.log($(this).attr('id'));
			$this = $(this).children('.paadle546465');
			if($this.prop('checked')) {
				arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
				actual_count++;
			} else {
				actual_countNve++;
			}
        });
		console.log(actual_count+'---------------'+varcount);
		if(actual_count === varcount ) {
			arrayOfnotifc = [];
			
					arrayOfnotifc_name = [];
			arrayOfnotifc[0]=9;
			arrayOfnotifc[1]=9;
			console.log('-----');
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
       console.log(arrayOfnotifc[i]);
}

		
		
		
		
		
	}
	
	
	
	if ($owner_status == "student" ) {
		if(typeof $dp_id == "undefined") {return;}
		
		varcount = $('#div_Scrool_in_002 > div').length;
		if(varcount >0) {
			varcount_ju = $('#div_Scrool_in_003 > div').length;
			console.log('varcount_ju'+varcount_ju);
			if( varcount_ju > 0) {
				
				actual_count = 0;
				actual_countNve = 0;
				$('#div_Scrool_in_003 > div').each(function(index, element) {
					console.log($(this).attr('id'));
					$this = $(this).children('.paadle546465');
					if($this.prop('checked')) {
						arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
						actual_count++;
					} else {
						actual_countNve++;
					}
				});
				console.log(actual_count+'---------------'+varcount);
				if(actual_count === varcount_ju ) {
					arrayOfnotifc = [];
					
					arrayOfnotifc_name = [];
					$_get_clss_id = $('#div_Scrool_in_003').attr('dp_id');
					arrayOfnotifc[0]= $_get_clss_id;
					arrayOfnotifc[1]= $_get_clss_id;
					console.log('-----');
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
					console.log($(this).attr('id'));
					$this = $(this).children('.paadle546465');
					if($this.prop('checked')) {
						arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
						actual_count++;
					} else {
						actual_countNve++;
					}
				});
				console.log(actual_count+'---------------'+varcount);
				if(actual_count === varcount ) {
					arrayOfnotifc = [];
					arrayOfnotifc_name = [];
					arrayOfnotifc[0]=7;
					arrayOfnotifc[1]=7;
					console.log('-----');
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
		
					console.log('----arraY -');
		for ( i = 0; i < arrayOfnotifc.length; i++) {
       
					console.log('--VALUE -['+i+']');
					console.log(arrayOfnotifc[i]);
					console.log(arrayOfnotifc_name[i]);
					
}

					console.log('--end ---');
		
		
		
		
		
	}
	
	if ($owner_status == "parent") {
		if(typeof $dp_id == "undefined") {return;}
		
		varcount = $('#div_Scrool_in_002 > div').length;
		if(varcount >0) {
			varcount_ju = $('#div_Scrool_in_003 > div').length;
			console.log('varcount_ju'+varcount_ju);
			if( varcount_ju > 0) {
				
				actual_count = 0;
				actual_countNve = 0;
				$('#div_Scrool_in_003 > div').each(function(index, element) {
					console.log($(this).attr('id'));
					$this = $(this).children('.paadle546465');
					if($this.prop('checked')) {
						arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
						actual_count++;
					} else {
						actual_countNve++;
					}
				});
				console.log(actual_count+'---------------'+varcount);
				if(actual_count === varcount_ju ) {
					arrayOfnotifc = [];
					arrayOfnotifc_name = [];
					$_get_clss_id = $('#div_Scrool_in_003').attr('dp_id');
					arrayOfnotifc[0]= $_get_clss_id;
					arrayOfnotifc[1]= $_get_clss_id;
					console.log('-----');
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
					console.log($(this).attr('id'));
					$this = $(this).children('.paadle546465');
					if($this.prop('checked')) {
						arrayOfnotifc[actual_count] = $(this).attr('id');
				arrayOfnotifc_name[actual_count] = $(this).children('h4').text();
						actual_count++;
					} else {
						actual_countNve++;
					}
				});
				console.log(actual_count+'---------------'+varcount);
				if(actual_count === varcount ) {
					arrayOfnotifc = [];
					
					arrayOfnotifc_name = [];
					arrayOfnotifc[0]=7;
					arrayOfnotifc[1]=7;
					console.log('-----');
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
		
					console.log('----arraY -');
		for ( i = 0; i < arrayOfnotifc.length; i++) {
       
					console.log('--VALUE -['+i+']');
					console.log(arrayOfnotifc[i]);
}

					console.log('--end ---');
		
		
		
		
		
	}
	
	
	for ( i = 0; i < arrayOfnotifc.length; i++) {
       
					console.log('--VALUE -['+i+']');
					console.log(arrayOfnotifc[i]);
					console.log(arrayOfnotifc_name[i]);
					
}
	
	
	//arrayOfnotifc
	$('#submitaddbutton_4ofr_alrt').click();
});

/////////////////
		////save somthng ///////////
		
	$('#saveAnAlrt').click(function(e) {
		
		
		
		////`to`, `subject`, `description`, `valid`, `status`, `date`
		$subject = $('#main_notf_sub').val();
		$description = $('#main_notf_des').val();
		$valid = $('#main_notf_date').val();
		$department = $('#tosele56859656f').attr('dp_id');
		$dp_id_name = $('#tosele56859656f').attr('dp_id_name');
		$sta = $('#tosele56859656f').attr('owner_status');
		
		
		if( $subject.length <1) {
			Lobibox.alert('warning', {
			msg: 'subject required  '
	});
	
			return;
		}
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
		
		
		
	
        if(!$valid.length > 0) {
			
			Lobibox.alert('warning', {
			msg: 'valid upto date required  '
			});
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
			case 'parent' :
				$type = 3;
			break;
		}
		
		
		 $.post(ajax_url,{action:'ad-a-alert', subject:$subject, description:$description, valid:$valid, tofor:arrayOfnotifc, department:$department, sta:$sta, type:$type},function(response){
			 console.log(response);
			response =$.parseJSON(response); 
			console.log(response);
			$has_data = response.data;
			response = response.success;
			if(response == 1) {

app_687534576_alert($dp_id_name, arrayOfnotifc, $subject, '', $description, '', $valid, $has_data );

Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'successfully submitted'
	});

Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
				
	
			$('#div_Scrool_in_003').empty();
	$('#div_Scrool_in_003').attr('dp_id','0');
			$('#div_Scrool_in_002').empty();
	
	
	$('#div_Scrool_in_001').find('.paadle546465').prop('checked', false);	
	$('#ist_check_bo_20').parent('div').addClass('hidden');
	$('#ist_check_bo_20').parent('div').addClass('hidden');
	arrayOfnotifc = [];
	
					arrayOfnotifc_name = [];
	$('#main_notf_sub').val('');
	$('#main_notf_des').val('');
	$('#main_notf_date').val('');
	$('#tosele56859656f').attr('dp_id','');
			} else if( response == -1) {
				
			
	Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'already exist'
	});
	Lobibox.alert('error', {
			msg: 'already exist'
	});

			} else {
				Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'error'
	});
	Lobibox.alert('error', {
			msg: 'processing error'
	});

			}
		 });
		
		
	});
			
		
	
	function highlighted($this) {
		
		
	$($this).addClass('highlighted');
    setTimeout(function(){
      $($this).removeClass('highlighted');}, 2000);	
	}
	
		
		
		
		
		
		/*888888888888888888888888888888888888888888888888888888*/
		
		
		function get_data_by_t_click586787($dp_id, $table) {
	$('#div_Scrool_in_003').empty();
	$('#div_Scrool_in_002').empty();
	
	$('#div_Scrool_in_003').attr('dp_id','0');
									//alertify.success($dp_id+"okay"+$table);
	 $.post(ajax_url,{action:'slect_class_table_ful_by_db', table:$table, dp_id:$dp_id},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length;
			//console.log(response); 
		
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				  $class_idd = op_response.class_id;
				  
				  console.log($class_idd);  
						  $.post(ajax_url,{action:'getAclassNameHr_all_one_val', class:op_response.class_id},function(repo_in1){
							  
								repo_in1 =$.parseJSON(repo_in1);
								repo_in = repo_in1.success;
				  console.log(repo_in1); 
								
								if( repo_in.length>0 ) {
									 $tempString='<div class="inr_58476" id="'+repo_in1.id+'" ><h4 class="col-md-9 inr_58475_in"  data-toggle="tooltip" title="'+repo_in+'">'+repo_in+'</h4> <input class="inr_58475_in  paadle546465" type="checkbox" ></div>';
								
			//console.log($tempString);  
								}
			$('#div_Scrool_in_002').append($tempString);
					
						  });
				 
				 
				
				 
			}
		});	
			
}
		
		
	function  actionClickClass( $this, $owner_status) {
		console.log($this.attr('id'));
		$cid = $this.attr('id');
		
	$('#div_Scrool_in_003').attr('dp_id',$cid);
		
		
		 $.post(ajax_url,{action:'get-data-c',table:'student', zero:'class', one:$cid},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length;
			//console.log(response); 
		
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				  $class_idd = op_response.user_name;
				  
				  console.log($class_idd);  
							
									 $tempString= $tempString+'<div class="inr_58476" id="'+op_response.user_name+'" ><h4 class="col-md-9 inr_58475_in"  data-toggle="tooltip" title="'+op_response.user_name+'">'+op_response.fname+''+op_response.lname+'</h4> <input class="inr_58475_in  paadle546465" type="checkbox" ></div>';
				
				 
			}
			
			$('#div_Scrool_in_003').append($tempString);
				 
		});	
		
	}
		
		
	function  actionClickClass_parent( $this, $owner_status) {
		console.log($this.attr('id'));
		$cid = $this.attr('id');
		
	$('#div_Scrool_in_003').attr('dp_id',$cid);
		
		
		 $.post(ajax_url,{action:'get-data-c-parent',table:'student', zero:'class', one:$cid},function(response){
			console.log(response); 
			response =$.parseJSON(response); 
			$elementCount  = response.length;
		
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				  $class_idd = op_response.user_name;
				  
				  console.log($class_idd);  
				  $co_lor  = '';
					  if(op_response.pname == null) {
						$co_lor  = 'style="color: red;"';					  
					  }
							
									 $tempString= $tempString+'<div class="inr_58476" id="'+op_response.sid+'" ><h4 class="col-md-9 inr_58475_in"  data-toggle="tooltip" title="'+op_response.suser_name+'" '+$co_lor+'>'+op_response.sname+'-('+op_response.pname+')</h4> <input class="inr_58475_in  paadle546465" type="checkbox" ></div>';
				
				 
			}
			
			$('#div_Scrool_in_003').append($tempString);
				 
		});	
		
	}
		
		$(document).on('click','triggrt-switch-container-update-val',function(){
			$(this).find('input[name="my-checkbox"]').trigger('click');alert();
		});
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
				$.post(ajax_url,{action:'update_notof_timeot', id:$id, status:$status },function(response){
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
									
								}
							}
				});
		});
		
		


		
		
		
		
		
		
//////////////////////////////////////////////////////	


function soetoutrearr() {
	$('#moder_drg_c > div').each(function () {
   	if($(this).find('.chid_mov').length==0 ) {
        	  $(this).parent().append(this);
		 }
		 
});
	
}


function arrangePresetted(response) {
	$elementCount  = response.length;  
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_responses = response[ii];
				 
				 if(op_responses.class_id) {
					 console.log(op_responses.user_name+'-'+op_responses.class_id);
					 
					$("#moder_drg_c").find("#"+op_responses.id + "_").children('div').appendTo ($("#moder_drg_p div").find("#"+op_responses.class_id ));
				 }
				 
				 
				 
				 
		soetoutrearr();
			}
}	
		
		
		
		
		
		
		
		$('#assign_classes').validate({
		  	
		   rules: { 
				 
			}, 
			submitHandler: function(form, event){
				
				$myDp_id = $('#moder_drg_p').attr('dp_id');
			
				$('#moder_drg_p > div').find('.andAusefulDivClass').each(function () {
					//console.log($(this).attr('id'));
					$h_id_ = $(this).attr('id');
					
					
					
					$class_id = $(this).attr('id');
					
					if($("#"+$h_id_+" .chid_mov").length > 0){
						//console.log($(this).attr('id')+'-'+$("#"+$h_id_+' div').attr('id'));
						$Teacher_id = $("#"+$h_id_+' div').attr('id');
						
					} else {
						$Teacher_id = null ;
					}
					
					//console.log($Teacher_id+'---'+$class_id);
					$.post(ajax_url,{action:'upadate_class_teac',class_id:$class_id,Teacher_id:$Teacher_id},function(response){
					console.log(response);
					response =$.parseJSON(response);
						
					if(response){
						console.log('success');
					} else {
						
						Lobibox.alert('error', {
			msg: 'failed to save  '
	});

					}
			
				});	
						
					
			
						 
				});
				
				
				//andAusefulDivClass
				$('#submitclosebutton').click();
				
				updateThisValues($myDp_id);
				
				
			
			}
			
		});
		
		
		
	function updateThisValues($myDp_id) {
		//$class_id, $Teacher_id
		
		$tTable = $('#view_add_teach_c ').find("[dp_id_tb='" + $myDp_id + "']");
		
		$tTable.find("tbody tr").each(function () {
        var cell = $(this).find("td.level").attr('clss_temp_id');
		$c_text = $('#moder_drg_p').find('div #'+ cell).children('.chid_mov').html();
		$c_tool_text =  $('#moder_drg_p').find('div #'+ cell).children('.chid_mov').attr('title');
		if(typeof $c_text == "undefined") {	
			$c_text = '';
			$c_tool_text = '';
		}
		
		//console.log('------------------'+$c_text);
		
		 $(this).find("td.fin_al").html($c_text);
		 $(this).find("td.fin_al").attr('data-original-title',$c_tool_text);
		
		 
    });
	}
		
		
		
///////////////////////////////////		
		
		$('#add-department').validate({
		  	
		   rules: { 
				 dname:{required: true},
				 noyears:{required: true,number: true},
				 nodivision:{required: true}//,
				 //email:{required:true,email:true}    
			}, 
			submitHandler: function(form, event){
				var department_n = $('#dname').val();
				var number_o_y = $('#noyears').val();	
				
				
			 Lobibox.confirm({
				title:'confirm',
    msg: "make sure that you enter correct values, this cannot be further editable",
    callback: function ($this, type, ev) {
        
		if(type == 'yes') {
			console.log('-------'+type);
			
				$.post(ajax_url,{action:'add-department',departmentname:department_n,numberofyears:number_o_y},function(response){
					console.log(response);
					response =$.parseJSON(response);
					if(response.success){
						
Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
						$('#dname').val('');
						$('#noyears').val('');
						appentViewDepartmentTable();
					}
					else{
						
Lobibox.alert('error', {
			msg: 'failed to save '
	});

					}
			
				});	
			
		}
    }
});
				
				/* */
			}
			
		});
		
		
		
		//$('#a_class').click(function(e)
		
		
		
			$('#add_class').validate({
		  	
		   rules: { 
				 aa1:{required: true},
				 aa2:{required: true,number: true}
			}, 
			submitHandler: function(form, event){
				var $b1 = $('#batcha').val();
				var $b2 = $('#batchz').text();
				if ( $b1.length != 4) {
					
					  
Lobibox.alert('warning', {
			msg: 'Enter full field '
	});

					return ;	
				}
				if ( $b2.length != 4) {
					return ;	
				}
			 
 Lobibox.confirm({
				title:'confirm',
    msg: "make sure that you enter correct values, this cannot be further editable",
    callback: function ($this, type, ev) {
        
		if(type == 'yes') {
			
				$no_of_div = $('#numberofdivision').val();
				departmentidq =$('#department_id').val();
				batchq = $('#batcha').val()+'-'+$('#batchz').text();
				$l = parseInt($no_of_div) ;	
				name_m = $('#department_id option:selected' ).text();
				divisionidq =$no_of_div;
				$.post(ajax_url,{action:'add-class',name:name_m,departmentid:departmentidq ,batch:batchq,divisionid:divisionidq},function(response){
				console.log(response);
				appentViewClassTable();
				$('#batcha').val('');
				$('#batchz').html('');
				response =$.parseJSON(response); 
				if(response.success){
					Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
			
				}
				else{
					Lobibox.alert('error', {
			msg: 'failed to save '
	});

				}	
		
				});
				
		}
	}
 });
			
			}
			
			
		});
		
		
		
		
		
		
		
		$('#department_id').change(function(){
			//var $select = $('#department_id option:selected' ).text();
			$select = $('#department_id').val();
			console.log( $select);
			keyup_function_for_all();
			$('#batchz').html('');
			$('#batcha').val('');
			
			
		});
		
		
		$('#batcha').keyup(function(){
	 		keyup_function_for_all();
		});
		
		
		function keyup_function_for_all() {
			var str = $('#batcha').val();console.log('aaa'+str);
			var currentYear = (new Date).getFullYear();
			
			if ( (str > (currentYear-10) ) && (str < (currentYear+1) ) ) {
			 var $w = ' did = '+$('#department_id').val();
				$valu = $('#department_id option:selected').data('value');
				$('#batchz').html( (parseInt(str)+parseInt($valu)) );
			} else {
				$('#batchz').html('');					
			}
			
		}
		
		
		
		
		
		
		
		
		
		
			$('#add_teacher').validate({
		  	
		   rules: { 
				 mnumber:{required: true,number: true},
				 uname:{ required: true, email: true},
				 fname:{required: true}
			}, 
			submitHandler: function(form, event){
				$user_name = $('#uname').val();
				$fname = $('#fname').val();
				$lname = $('#lname').val();
				$sex = $('input[type="radio"]:checked').attr('value');
				$address = $('#address').val();
				$mobile = $('#mnumber').val();
				$depart = global_department;
				$class =  classIdForTeacherSelect; 
				if($depart == 0) {
					
					Lobibox.alert('warning', {
			msg: 'department required '
	});
	
					
Lobibox.alert('warning', {
			msg: 'department required '
	});
					return;
					
				}
				
				
				if(typeof $class == "undefined") {	
					$class = null;
					cinfr = window.confirm("continue without add a class charge");
					if ( !cinfr) {
						return;	
					}
				}
				if($class == 0) {	
					$class = null;
					cinfr = window.confirm("continue without add a class charge");
					if ( !cinfr) {
						return;	
					}
				}
				
				
				
				
				$submit = $('#add_teacher input[type="submit"]');
				$submit.attr('disabled','disable');
				
				$.post(ajax_url,{action:'add-teacher', user_name:$user_name, fname:$fname, lname:$lname, sex:$sex, address:$address, mobile:$mobile, class:$class, department:$depart},function(response){
					//console.log(response);
					response =$.parseJSON(response);
					$op = response.success;
					if( $op == 1){
						
						setNewTeacherForView( $user_name, $fname, $lname, $sex, $address, $mobile, $class, $depart);
						
						Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
						$('#uname').val('');
						$('#fname').val('');
						$('#lname').val('');
						$('#address').val('');
						$('#mnumber').val('');
						classIdForTeacherSelect=0;
						global_department = 0;
						
						$('.inputError2Statuspart').remove();
						$('.inputError2Statuspar').remove();
						 $('#classstt').empty();
						 $('#setClassText').text('Batch');
						 $('#divisionntt').empty();
						 $('#setDivisionText').text('Division');
						 
						 $('#setDepartmentText').text('Department');
					}
					else if ( $op == -1){
						Lobibox.alert('warning', {
			msg: 'user name already exist'
	});


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
		
	/*	$('#departmentid').change(function(){
			change_function_department ();			
		});
		
		function change_function_department () {
			$departmentid = $('#departmentid').val();
			$.post(ajax_url,{action:'get-classid',department:$departmentid},function(response){
				
				console.log( response);
				$('#yearid').html(response);
			});	
		}
		
	*/	
		
		
		
		
		



		
		
		
		
		$('#add_admin').validate({
		  	
		   rules: { 
				
				uname:{ required: true, email: true},
				
			}, 
			submitHandler: function(form, event){
				
				$user_name = $('#add_acmin_name').val();
				
				$submit = $('#add_admin input[type="submit"]');
				$.post(ajax_url,{action:'add-admin', user_name:$user_name},function(response){
					//console.log(response);
					
					response =$.parseJSON(response);
					$op = response.success;
					$opx = $op.password;
					$opz= $op.user_name;
					if($opx >=100000 ) {
Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
		
						$('.tustableforonldyadthid tbody').append("<tr class='filterable-cell'><td  class='actual_useR_name'>"+$opz+"</td><td>"+$opx+"</td><td><span class='glyphicon glyphicon-trash clickfordltaadmin' aria-hidden='true'></span> </td></tr>");
						$('#add_acmin_name').val('');	
						checkPssibilityFoTrueTicShow( $('#usernamecheckdivforaddAdmin') , 9 );
					
					} 
					else if ( $opx == -1){
						Lobibox.alert('warning', {
			msg: 'user name already exist '
	});
	
						
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
		
		$('#uname').keyup(function(){
	 		
			$get_username = $('#uname').val().length;
			if( $get_username >0) {
				$user_name = $('#uname').val();
			$.post(ajax_url,{action:'getusernamecheck',user_name:$user_name},function(response){
				response =$.parseJSON(response);
				
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
	
	
			$('#add_acmin_name').keyup(function(){
	 		
			$get_adminname = $('#add_acmin_name').val().length;
			if( $get_adminname >0) {
				$admin_name = $('#add_acmin_name').val();
			$.post(ajax_url,{action:'getadminnamecheck',user_name:$admin_name},function(response){
				response =$.parseJSON(response);
				if( Object.keys(response).length>0 ) {	
				
					checkPssibilityFoTrueTicShow( $('#usernamecheckdivforaddAdmin') , 0 );
				
				} else {
					checkPssibilityFoTrueTicShow( $('#usernamecheckdivforaddAdmin') , 1 );
				}
				
				
			});
				
			} else {
				checkPssibilityFoTrueTicShow( $('#usernamecheckdivforaddAdmin') , 9 );
				
			}
		});
		
		
		
	
	
	

	$("#departmenttt li a").click(function(e){
		     e.preventDefault();
 		 selText = $(this).text();
		 $dpid = $(this).attr("value"); 
 		 $(this).parents('#btn-group1').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		 
		 $('#classstt').empty();
		 $('#setClassText').text('Batch');
		 $('#divisionntt').empty();
		 $('#setDivisionText').text('Division');
		 $('#classstt').parents('#btn-group2').find('.dropdown-toggle').append('<span class="caret"></span>');
		 $.post(ajax_url,{action:'view-department-values',depatrmrnt:$dpid},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length; 
			$tempString = "";
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				 $tempString=$tempString+'<li><a value="'+op_response.id+'" href="#">'+op_response.batch+'</a></li>';
			
			}
			$('#classstt').append($tempString).end().appendTo('#classstt');
		});	
		
		 
		// testThatTheClassWithOrWithoutAteacher($('#divisionntt li a').attr("value"));
		 global_department = $dpid;
	});
	
	
	$(document).on('click', '#classstt li a' ,function(e) {
    	 e.preventDefault();
 		 selText = $(this).text();
 		 $(this).parents('#btn-group2').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		 $('#divisionntt').empty();
		 $('#setDivisionText').text('Division');
		 $('#divisionntt').parents('#btn-group3').find('.dropdown-toggle').append('<span class="caret"></span>');
		 $divis = $(this).attr("value"); 
		 $.post(ajax_url,{action:'view-division-values',division:$divis},function(response){
			console.log(response);
			response =$.parseJSON(response); 
			$elementCount  = response.length; 
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
				 $('#divisionntt').append('<li><a value="'+op_response.class_id+'" href="#">'+op_response.division+'</a></li>');
		
			}
		});	
		testThatTheClassWithOrWithoutAteacher($('#divisionntt li a').attr("value"));
		
	});
	
	
	
	$(document).on('click', '#divisionntt li a' ,function(e) {
    	 e.preventDefault();
 		 selText = $(this).text();
 		 $(this).parents('#btn-group3').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		 $divis = $(this).attr("value"); 
		 
		 testThatTheClassWithOrWithoutAteacher($divis );
	});	
	
	
	function testThatTheClassWithOrWithoutAteacher($divist) {
		$('.inputError2Statuspart').remove();	
		classIdForTeacherSelect = $divist;
		if(typeof $divist !== "undefined") {	
			
				$.post(ajax_url,{action:'getclassidteachercheck',class_id:$divist},function(response){
				console.log(response);
				response =$.parseJSON(response);
				$('.inputError2Statuspar').remove();
				if( Object.keys(response).length>0 ) {	
					$('#addClassForTeacher001').append(' <span class="glyphicon glyphicon-remove form-control-feedback inputError2Statuspart" aria-hidden="true"></span>'+
					'<span class="sr-only inputError2Statuspart">(error)</span>');
			
				} else {
					
						 $('#addClassForTeacher001').append(' <span class="glyphicon glyphicon-ok form-control-feedback inputError2Statuspart" aria-hidden="true"></span>'+
    					'<span id="inputSuccess2Statust" class="sr-only inputError2Statuspar">(success)</span>');
						
				}
				
				
			});
				
			
		} else {
			$('#addClassForTeacher001').append(' <span class="glyphicon glyphicon-remove form-control-feedback inputError2Statuspart" aria-hidden="true"></span>'+
			'<span class="sr-only inputError2Statuspart">(error)</span>');
			
			
		}
				
		
	}
	
	
	
	$('#arrgeTe').keyup(function(e) {
	 inpy = $(this).val();
	 
	 $('#adddTe li').each(function(i)
		{
			$(this).removeClass('hidden');
		   tst1 = $(this).children('a').attr('value'); 
		   tst2 = $(this).children('a').text();
		   console.log(inpy+tst1+tst2);
			if (tst1.indexOf(inpy) >= 0) {
			}else if (tst2.indexOf(inpy) >= 0) {
			} else {
				$(this).addClass('hidden');
			}
		});
		
	});
	
	
	
	$('#add_hod').validate({
		  	
		   rules: { 
				
			}, 
			submitHandler: function(form, event){
		 		if((global_department_new !=0 ) && (global_teacher_new !="" )) {
				} else {
					
					Lobibox.alert('warning', {
			msg: 'select values'
	});
					return;	
					
				}
				 
				$submit = $('#add_admin input[type="submit"]');
				$.post(ajax_url,{action:'add-hod', dep:global_department_new, tea:global_teacher_new},function(response){
					console.log(response);
					
					response =$.parseJSON(response);
					$op = response.success;
					if ( $op == 1){
						$('#view_hod_table tbody').append("<tr class='filterable-cell'><td>"+
						$('#setDepartmentText').text()+
						"</td><td><label data-toggle='tooltip' title='"+global_teacher_new+
						"'>"+
						$('#setTeacherText').text()+
						"</label></td></tr>");
						global_department_new = 0;
						global_teacher_new = "";
						$('#setDepartmentText').text("department");
						$('#setTeacherText').text("teacher");
						global_department_attrib.addClass('hidden');
						global_teacher_attrib.addClass('hidden');
						Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
			
					} 
					else {
						Lobibox.alert('error', {
			msg: 'An Error occurred, please refresh the page and try again '
	});

					 	
						
					}
					
					$submit.removeAttr('disabled');
				});
				
			
			}
			
			
		});
		
	
	
	
	
		$("#addDP li a").click(function(e){
		     e.preventDefault();
 		 selText = $(this).text();
		 $dpid = $(this).attr("value"); 
 		 $(this).parents('#btn-group1').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		
		 global_department_new = $dpid;
		 global_teacher_new = "";
		 global_department_attrib = $(this).parent();
		 forRemoveDpdiffTh($dpid);
	});
	
	function forRemoveDpdiffTh($dpid) {
		//addedforremovediffdp
		$('#adddTe').find('li').addClass('hidden');
			$('#adddTe  > li').each(function(index, element) {
				//console.log($(this).attr('dp_id')+' == '+$dpid);
				if($(this).attr('dp_id') == $dpid) {
					$(this).removeClass('hidden');
				}
			});
	}
	$("#adddTe li a").click(function(e){
		     e.preventDefault();
 		 selText = $(this).text();
		 $dpid = $(this).attr("value"); 
 		 $(this).parents('#btn-group1').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
		 
		global_teacher_new = $dpid;
		global_teacher_attrib = $(this).parent() ;
	});
	
	
	
	
/*	
	$('#divisionn').change(function() {
		$departmentt = 
		$batchtt = 
		$divitiontt = 
		$.post(ajax_url,{action:'test-techr_id',depatrmrnt:$dpid},function(response){
			response =$.parseJSON(response); 
			$elementCount  = response.length; 
			for( ii=0 ; ii<$elementCount ; ii++) {
				 op_response = response[ii];
		$('#classs').append("<option  value='"+op_response.id+"'> "+op_response.batch+" </option>");	
		
			
			}
		});	
	
	});
	
	
	
	
	$('#uname').keyup(function(){
	 		
			$get_username = $('#uname').val().length;
			if( $get_username >0) {
				$user_name = $('#uname').val();
			$.post(ajax_url,{action:'getusernamecheck',user_name:$user_name},function(response){
				response =$.parseJSON(response);
				
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
	*/
	
	
	
	
		  
  function app_687534576_alert($dp, $to_to, $sub, $to, $description, $id, $valid, $has_data ) {
	  $has_data = $has_data[0];
	  
	  
	  	for ( i = 0; i < arrayOfnotifc.length; i++) {
       
					console.log('--VALUE -['+i+']');
					console.log(arrayOfnotifc[i]);
					console.log(arrayOfnotifc_name[i]);
					
}
	
	  
	  $t_to_main = '';
	  $t_to = '';
	  switch ($has_data.to) {
											 case 'te':
											 	$t_to_main = ' to all teachers';
											 break;
											 case 'cl':
											 	$t_to_main = ' classes in this department';
											 break;
											 case 'teacher':
											 	$t_to_main = 'teachers';
												for ( i = 0; i < arrayOfnotifc_name.length; i++) {
       
														$t_to = $t_to+'\n';
														
														$teus =arrayOfnotifc_name[i];
														
														
														
												$t_to = $t_to+$teus;
												}
												
											 break;
											 
											 
											 case 'student':
											 	$t_to_main = 'students';
													for ( i = 0; i < arrayOfnotifc_name.length; i++) {
       
														$t_to = $t_to+'\n';
														
														$teus =arrayOfnotifc_name[i];
														
														
														
												$t_to = $t_to+$teus;
												}
												
												
											 break;
											 
											 case 'parent':
											 	$t_to_main = 'parents ';
												for ( i = 0; i < arrayOfnotifc_name.length; i++) {
       
														$t_to = $t_to+'\n';
														
														$teus =arrayOfnotifc_name[i];
														
														
														
												$t_to = $t_to+$teus;
												}
												
												
												
											 break;
											 
											 default:
											  if($has_data.type == 2 && $has_data.to>0) {
												
												$t_to_main =function () {
																var tmp = null;
																$.ajax({
																	'async': false,
																	'type': "POST",
																	'global': false,
																	'dataType': 'JSON',
																	'url': ajax_url,
																	'data': { action:'getAclassNameHr', class:$has_data.to },
																	'success': function (data) {
																		tmp = data;
																	}
																});
																return tmp;
															}();   
												
												 
											 }
											 if($has_data.type == 3 && $has_data.to>0) {
												$t_to_main = function () {
																var tmp = null;
																$.ajax({
																	'async': false,
																	'type': "POST",
																	'global': false,
																	'dataType': 'JSON',
																	'url': ajax_url,
																	'data': { action:'getAclassNameHr', class:$has_data.to },
																	'success': function (data) {
																		tmp = data;
																	}
																});
																return tmp;
															}();   
												
											 }
											 $t_to_main = 'all students in '+$t_to_main.success;
											
										 }
										 
										 
///////////////////////////////////////////////////////////////////////////////////////	  
	  
	  
	$daString = "<tr><td style='width:9%;'>"+$dp+"</td><td style='width:20%; padding-left: 15px;'>"+
										$sub+
										"</td><td style='width:20%; padding-left: 15px;'  class='hover_action_deta'  data-toggle='tooltip' title='"+$t_to+"'>"+
										$t_to_main+
										"</td><td  style='width:20%; padding-left: 15px;'>"+
										$description+
										"</td><td  style='width:20%; padding-left: 15px;'>"+
										$valid+
										'</td><td><input type="checkbox" class="change_stAtus" bt_id="'+$id+'" name="my-checkbox" checked=""></td></tr>';  
										
 $('#mytbodyI_dt').prepend($daString);
 
		$("[name='my-checkbox']").bootstrapSwitch();
  }
       
	
	
	
	$(document).on('click', '.edit_teacher_details', function(e) {
		$thisnew =$(this).parent().parent().parent('.bord');
		$thisnew = $thisnew.find('.getTheUsrtId');
		$user_name = $thisnew.find('label').html().trim();
		//getaTeacher
		$.post(ajax_url,{action:'getaTeacher',user_name:$user_name},function(response){
				response =$.parseJSON(response);
				console.log(response);	
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
				
				$.post(ajax_url,{action:'update-teacher', user_name:$user_name, fname:$fname, lname:$lname, address:$address, mobile:$mobile },function(response){
					console.log(response);
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
		
		$.post(ajax_url,{action:'delete_aTeacher',user_name:$user_name},function(response){
				 console.log(response);
		response =$.parseJSON(response);
			if(response.success) {
				$('.getTheUsrtId:contains("'+$user_namea+'")').parent().parent().css('color', 'red');
			}
			
		});
});


$(document).on('click', '.clickfordltaadmin', function(e) {
	$usrPrnt = $(this).parent().parent();
	$usr_name = $usrPrnt.find('.actual_useR_name').text();
	$.post(ajax_url,{action:'delete_aAdmin',user_name:$usr_name},function(response){
				 console.log(response);
		response =$.parseJSON(response);
			if(response.success) {
				$usrPrnt.remove();
				
			}
			
		});
});
		

//

	$('#editHods').validate({
		  	
		   rules: { 
				
				
				
				
			}, 
			submitHandler: function(form, event){
				
				$('#edit_the_hods_s').find('select').each(function(index, element) {
				
					if($(this).attr('hod_c') != $(this).val()) {
						$dp = $(this).attr('dp_id');
						$teacher = $(this).val();
						$image = $(this).find('option:selected').attr('src_c');
						$tThis = $(this);
							//console.log($dp);
							//console.log($image);
							//window.location.origin+'/tech_teach/teacher/images_/'+response.image+''
								  
							$.post(ajax_url,{action:'update_hod', dp:$dp, teacher:$teacher, image:$image},function(response){
								 console.log(response);
								if(response) {
									response =$.parseJSON(response);
									if(response.success==1) {
											
										Lobibox.notify('success', {
											showClass: 'zoomInLeft',
											hideClass: 'zoomOutRight',
											msg: 'successfully updated',
											img: response.image
									});
								
												
									}
								}
							});
						$updateUt = $('#view_hod_table tbody tr td').find(" [data-original-title='" + $(this).attr('hod_c')  + "']");	
						//console.log($updateUt.html());
						$updateUt.html($tThis.find('option:selected').text());
					}
				});
		
		
			$('#submitaddbutton_k').click();
			}
			
			
		});


		
$('#clickforEdithods').click(function(e) {
    console.log('edit hods ');
	$('#edit_the_hods_s').empty();
	$.post(ajax_url,{action:'get_hodsAndTch'},function(response){
		//console.log(response);
		$golbalStringHroApp='';
		if(response) {
			response =$.parseJSON(response);
			
			$elementCount  = response.length;
				for( ii=0 ; ii<$elementCount ; ii++) {
					responsec = response[ii];
					$dp = responsec.dp;
					$teachers= responsec.teachers;
					
					$golbalStringHroApp=' <div class="col-md-8">    '+  	
                              ' <div class="cust_class">'+
                                    '<label class="col-md-4"> '+$dp.name+' </label>'+
                                   ' <div class="col-md-8 ">'+
                                      ' <select dp_id="'+$dp.did+'" hod_c = "'+$dp.hod+'"> ';
					
					if($teachers) {
						$elementInCount  = $teachers.length;
						for( jj=0 ; jj<$elementInCount ; jj++) {
							$teachersc = $teachers[jj];
							//$ght.find('img').attr('src',''+window.location.origin+'/tech_teach/library/images_/'+$data+'');
			
							if($dp.hod == $teachersc.user_name) {
								$golbalStringHroApp = $golbalStringHroApp+'<option value="'+$teachersc.user_name+'"  data-toggle="tooltip" title="'+$teachersc.user_name+'" selected src_c="'+$teachersc.image+'">'+
							$teachersc.fname+' '+$teachersc.lname
							+'</option>';
							
							} else {
								$golbalStringHroApp = $golbalStringHroApp+'<option value="'+$teachersc.user_name+'"  data-toggle="tooltip" title="'+$teachersc.user_name+'"  src_c="'+$teachersc.image+'">'+
							$teachersc.fname+' '+$teachersc.lname
							+'</option>';
							
							}
							
							//console.log($dp.name+'------------'+$teachersc.fname+'------------'+$dp.hod);
						}
					}
					$golbalStringHroApp = $golbalStringHroApp+ '  </select>'+
                                   ' </div>'+
                                '</div>'+
                             '</div>';
					$('#edit_the_hods_s').append($golbalStringHroApp);		 
				}
			
		}
		});
	
	
/*	$('#edit_the_hods_s').append(' <div class="col-md-8">    '+  	
                              ' <div class="cust_class">'+
                                    '<label class="col-md-4"> Description </label>'+
                                   ' <div class="col-md-8 ">'+
                                      ' <select> '+
                                       	'<option>sdsds</option>'+
                                       	'<option>sdsds</option>'+
                                       	'<option>sdsds</option>'+
                                     '  </select>'+
                                   ' </div>'+
                                '</div>'+
                             '</div>');
							 */
});		
		
$('#tosele56859656f').click(function(e) {
    $('.wid100').removeClass('hidden');
	
});		
		
		$('#clickForPtaDif').click(function(e) {
            $('#main_notf_sub').val(' PTA Meeting');
			$('#tosele56859656f').click();
			$('#model_o_1').addClass('hidden');
			$('#model_o_2').addClass('hidden');
			$('#model_o_3').click();
        });
		
		
		
		
	$('#generateApssFrorLibr').click(function(e) {
		
		$.post(ajax_url,{action:'new_paswrd_for_libra'},function(response){
				 console.log(response);
		response =$.parseJSON(response);
			if(1<response) {
				$('#showNePassHereThis').empty();
				$('#showNePassHereThis').append('<div class="col-md-offset-4 col-md-8"><input type="text" id="generateApssFrorLibr" value="'+response+'" /></div>');
				
			}
			
		});
		
	});
		
		//
		
		
		
		
	///////////////////////////////////////// drag //////////////////////////////////////////////////		
		
var x4,left4,down= false;
$lengThTh = $('#selectThisAs_innr_duiv').children('div').length;
$('.scroll_r_div').css('width', (400*$lengThTh+400));

$("#selectThisAs_innr_duiv").mousedown(function(e){
    e.preventDefault();
    down=true;
    x4=e.pageX;
    left4=$('#select_this_id_body').scrollLeft();
});

$("#select_this_id_body").mousemove(function(e){
    if(down){
         newX=e.pageX;
        
       // console.log((left4-newX+x4));
        
        //$("#select_this_id_body").scrollLeft(left4-newX+x4);   
 
		$("#select_this_id_body").animate({ scrollLeft: (left4-newX+x4) }, .09);
        
    }
});

$(".mouseup_this").mouseup(function(e){down=false;});	

$(document).on('click', '#selectThisDisplaythiattach', function(e) {
	$('#mainbosyGorAdkjturcvk').empty();
	$fileNName = $(this).attr('basevaleue');
	if(typeof $fileNName == "undefined") {
		$('#submitaddbutton').click();
		return;
		}
		$ST4String  ='';
		var_ext = $fileNName.split('.').pop();
		if(var_ext.toLowerCase() == 'pdf') {
			$ST4String  = '<div class="post-materials" style="width: 100%;"><div class="" style="text-align:center"><object style=" width:100%;height:500px;border: none;" src="'+$fileNName +'"><embed style=" width:100%;height:500px;border: none;"src="'+$fileNName +'"></embed></object></div></div>';
		} else {
		
		$ST4String = ' <div class="post-materials" style="width: 100%;">'+
                        '<div class="" style="text-align:center">'+
                            '<img src="'+$fileNName +'" style="max-width:100%; max-height:500px; width:auto; '+'height:auto;" id="imagAttached">'+
                       ' </div>'+
                    '</div>';
		}
	$('#mainbosyGorAdkjturcvk').append($ST4String );
	
	
}); 		
		
		
		
		
		
		
		
		
		
		
/////////////////////////////////// /////////////////////////////////	//////////////////////////////	
		
});///,





function appentViewClassTable() {
			$("#view_table tbody").empty();
			
			$user_name = true;
			$.post(ajax_url,{action:'view-class-table',user_name:$user_name},function(response){
					
				response =$.parseJSON(response);
				$elementCount  = response.length;
				for( ii=0 ; ii<$elementCount ; ii++) {
					 op_response = response[ii];
					$('#view_table tbody').append("<tr  class='filterable-cell'><td>"+op_response.name+"</td><td>"+op_response.batch+"</td><td>"+
					op_response.division+"</td> <td>"+op_response.teacher+"</td></tr>");
				}
			});	
		activaTab('view-class');	
		}
function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
}
	
function appentViewDepartmentTable() {
			$("#view_department_table tbody").empty();
			$user_name = true;
			$.post(ajax_url,{action:'view-department-table',user_name:$user_name},function(response){
					
				response =$.parseJSON(response);
				$elementCount  = response.length;
				for( ii=0 ; ii<$elementCount ; ii++) {
					 op_response = response[ii];
					$('#view_department_table tbody').append("<tr><td>"+op_response.name+"</td class='filterable-cell'><td>"+op_response.year+"</td></tr>");
				}
			});	
		activaTab('view-department');	
		}	
	
	
	function checkPssibilityFoTrueTicShow( class_c , value_c ) {
		errorStatus =true;
		$('.inputError2Statuspart').remove();
		
		if(value_c == 1) {	
					class_c.append(' <span class="glyphicon glyphicon-ok form-control-feedback inputError2Statuspart" aria-hidden="true"></span>'+
    					'<span id="inputSuccess2Statust" class="sr-only inputError2Statuspar">(success)</span>');
						errorStatus = false;
					
				}
		 if (value_c == 0 ) {
					class_c.append(' <span class="glyphicon glyphicon-remove form-control-feedback inputError2Statuspart" aria-hidden="true"></span>'+
					'<span class="sr-only inputError2Statuspart">(error)</span>');
					errorStatus =true;
				}
	}
	
	function setNewTeacherForView($user_name, $fname, $lname, $sex, $address, $mobile, $class, $depart) {
		
		classIDB =" no class in charge";
		$epDpabf =''+$('#setDepartmentText').html();
		
		$epDpabf = $epDpabf.substring(0, $epDpabf.indexOf('<')); 
		
		if($class >0) {
		$.post(ajax_url,{action:'getAclassNameHr',class:$class},function(response){
				console.log(response);
				response =$.parseJSON(response);
				if(response.success) {
					classIDB=response.success;
					
				}
				
		});
		}
		
		
		StringForAppB =" <div class='fg_base'><div class='row bord'><div class='col-md-3 img_cls'><img  width='200px' height='200px' src='../assets/images/defalut.jpg'/></div><div class='col-md-4 fg_base'><div class='row fg_baserow '><div class='col-md-12 getTheUsrtId'><label val_id ='"+$user_name+"' class='hover_edit_deta'>"+$fname +"</label>  <label val_id ='"+$user_name+"' class='hover_edit_deta'> "+$lname+"</label></div></div><div class='row fg_baserow'><div class='col-md-12'><label >"+$user_name+" </label></div></div><div class='row fg_baserow'><div  class='col-md-12'><label >"+$epDpabf+"</label></div></div><div class='row fg_baserow'><div class='col-md-12'><label >"+$mobile+"<i style='padding-left:10px;' class='fa fa-mobile'></i></label></div></div><div class='row fg_baserow'><div class='col-md-12'><label >"+classIDB+"</label></div></div></div><div class='col-md-4'><div class='heift200'><textarea  disabled placeholder='no address' >"+$address+"</textarea></div></div>"+
		 "<div class='col-md-1'><div class='heift200' style='padding-top:20px'><input type='button' value='edit' class='btn edit_teacher_details'  data-toggle='modal' data-target='#myModal'></div></div>"+
		"</div></div>";
	console.log(StringForAppB);
		$('#view_Teach').prepend(StringForAppB);
		activaTab('view-class');
			
		
	}
	
	
	function upadateTeacherval($user_name, $fname, $lname,  $address, $mobile) {
	
	
		$thismain = $('.getTheUsrtId:contains("'+$user_name+'")').parent().parent();
		$thismain.children(".fg_baserow:eq(0)").find('.col-md-12').find("label:eq(0)").html($fname);
		$thismain.children(".fg_baserow:eq(0)").find('.col-md-12').find("label:eq(1)").html($lname);
		
		
		$thismain.children(".fg_baserow:eq(3)").find('.col-md-12').children("label").html($mobile+'<i style="padding-left:10px;" class="fa fa-mobile"></i>');
		
		$thismain.parent().find('.heift200').find('textarea').html($address);
	}

