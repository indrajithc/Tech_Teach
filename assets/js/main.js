$(document).ready(function(e) {

	$("#login-form").validate({
		
		submitHandler: function(form, event){
			$('#forgotpass_wrd').addClass('hidden');
			var user_n = $('#name').attr('user_key')+$('#name').val();
			var pass_w = $('#password').val();	
			
			if( user_n == ''){
				$('#name').css('border','2px solid red');	
				$('#name').css('border-radius',' 4px');	
				return;
			}
			if( pass_w == ''){
				
				$('#password').css('border','2px solid red');	
				$('#password').css('border-radius',' 4px');	
				return;
			}
			
			$.post('ajax.php',{action:'user-login',username:user_n,password:pass_w},function(data){
				Zdata = 'In currect password';
				if(data.trim() == Zdata.trim()) {
					$('.error_sr').remove();
					$('#login-form').prepend('<div class="error_sr" id="errorshoe"><label style="color:red;">incorrect username or password   <span style="padding-left:15px;" class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> </label> </div>');
					$('#forgotpass_wrd').removeClass('hidden');
					$('#forgotpass_wrd').attr('href', 'Forgot_password/index.php?user_name='+user_n);
					
				} else {
					$('body').html(data);
				}
			});	
		}
			
	});
	
	$('#name').change(function(e) {
					$('.error_sr').remove();
    });
	$('#password').change(function(e) {
					$('.error_sr').remove();
    });
	
		
		$('#rese_ne_pa').validate({
		  	
		   rules: { 
				 
				 id_cls_ff:{ required: true, email: true}
			}, 
			submitHandler: function(form, event){
				
				
				$new_usr_name = $('#id_cls_ff').val();
				$new_usr_sta = $('#id_cls_ff').attr('user_key');
				if(typeof $new_usr_sta == "undefined") {
					Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'select your status'
	});
					return;
					
					}
				$new_usr_name = $new_usr_sta+$new_usr_name;	
			$.post('ajax.php',{action:'get_a_usr_j',new_user:$new_usr_name},function(data){
				console.log(data);
				response =$.parseJSON(data); 
				console.log(response);
				if (response == 1) {
						$('#rese_ne_pa').addClass('hidden');
						$('#rese_ne_pa_mob').removeClass('hidden');
					} else {
						//you are not authorized
						Lobibox.alert('error', {
				msg: 'you are not authorized'
		});
					}
				
			});	
						 
						 
				
				
			
			}
			
		});
		
	
	
		$('#rese_ne_pa_mob').validate({
		  	
		   rules: { 
				 
				 mob_id_cls_ff:{ required: true, number: true}
			}, 
			submitHandler: function(form, event){
				
				
				$('#mob_id_cls_ff_svr').val('');
					$('#resebtcodsw').addClass('hidden');
					
				$new_usr_name = $('#id_cls_ff').val();
				$new_usr_sta = $('#id_cls_ff').attr('user_key');
				if(typeof $new_usr_sta == "undefined") {
					Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'select your status'
	});
					return;
					
					}
				$new_usr_name = $new_usr_sta+$new_usr_name;	
				
				$mob = $('#mob_id_cls_ff').val();
						
					
			$.post('ajax.php',{action:'get_a_usr_k', mob:$mob, new_user:$new_usr_name},function(data){
				console.log(data);
				response =$.parseJSON(data); 
				console.log(response);
				if (response.success == 1) {
						$('#rese_ne_pa_mob').addClass('hidden');
						$('#rese_ne_pa_mob_verif').removeClass('hidden');
						$('#valmogula').html(response.data);
						$('#resebtcodsw').removeClass('hidden');
					} else {
						//you are not authorized
								Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'not your mobile number'
	});
					$('#mob_id_cls_ff').val('');
					}
			
			});	
						 
						 
				
				
			
			}
			
		});
		
	
	
	
	
		$('#rese_ne_pa_mob_verif').validate({
		  	
		   rules: { 
				 
				 mob_id_cls_ff_svr:{ required: true, number: true}
			}, 
			submitHandler: function(form, event){
				
				
				$new_usr_name = $('#id_cls_ff').val();
				$new_usr_sta = $('#id_cls_ff').attr('user_key');
				if(typeof $new_usr_sta == "undefined") {
					Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'select your status'
	});
					return;
					
					}
				$new_usr_name = $new_usr_sta+$new_usr_name;	
				
				$mob = $('#mob_id_cls_ff').val();
				$code = $('#mob_id_cls_ff_svr').val();
						
					
			$.post('ajax.php',{action:'get_a_usr_l', mob:$mob, new_user:$new_usr_name, code:$code},function(data){
				console.log(data);
				response =$.parseJSON(data); 
				console.log(response);
				if (response == 1) {
						$('#rese_ne_pa_mob_verif').addClass('hidden');
						$('#rese_final_la').removeClass('hidden');
					} else {
						//you are not authorized
								Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'Invalid Verification code'
	});
					$('#resebtcodsw').removeClass('hidden');
					}
			
			});	
						 
						 
				
				
			
			}
			
		});
		
		
		
		$('#resebtcodsw').click(function(e) {
            
					$('#resebtcodsw').addClass('hidden');
					
				$('#mob_id_cls_ff_svr').val('');
				
				$new_usr_name = $('#id_cls_ff').val();
				$new_usr_sta = $('#id_cls_ff').attr('user_key');
				if(typeof $new_usr_sta == "undefined") {
					Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'select your status'
	});
					return;
					
					}
				$new_usr_name = $new_usr_sta+$new_usr_name;	
				
				
				$mob = $('#mob_id_cls_ff').val();
						
					
			$.post('ajax.php',{action:'get_a_usr_k', mob:$mob, new_user:$new_usr_name},function(data){
				console.log(data);
				response =$.parseJSON(data); 
				console.log(response);
				if (response.success == 1) {
						$('#rese_ne_pa_mob').addClass('hidden');
						$('#rese_ne_pa_mob_verif').removeClass('hidden');
						$('#valmogula').html(response.data);
						Lobibox.notify('info', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'sent a text message to '+$mob+'  '
	});
					} else {
						//you are not authorized
								Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'not your mobile number'
	});
					$('#mob_id_cls_ff').val('');
					}
			
			});	
						 
						 
				
        });
	
	
	
	
			$('#rese_final_la').validate({
		  	
		   rules: { 
				 
				 inputPassword:{ required: true},
				 te_repass:{ required: true}
			}, 
			submitHandler: function(form, event){
				
				
				$new_usr_name = $('#id_cls_ff').val();
				
				$new_usr_sta = $('#id_cls_ff').attr('user_key');
				if(typeof $new_usr_sta == "undefined") {
					Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'select your status'
	});
					return;
					
					}
				$new_usr_name = $new_usr_sta+$new_usr_name;	
				
				
				$mob = $('#mob_id_cls_ff').val();
				$code = $('#mob_id_cls_ff_svr').val();
				$pass = $('#inputPassword').val();
				$rpass = $('#te_repass').val();
				
				if($pass != $rpass ) {
											Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'password mismatch'
	});
	return;
				}
						
					
			$.post('ajax.php',{action:'get_a_usr_z', mob:$mob, new_user:$new_usr_name, code:$code, pass:$pass},function(data){
				console.log(data);
				response =$.parseJSON(data); 
				console.log(response);
				
				if (response == 1) {
						Lobibox.notify('success', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'successfully submitted'
	});

Lobibox.alert('success', {
			msg: 'successfully submitted  '
	});
				
				window.location.replace(""+window.location.origin+"/tech_teach/index.php");
					} else {
						//you are not authorized
								Lobibox.notify('error', {
			size:'mini',
			showClass: 'zoomInLeft',
			hideClass: 'zoomOutRight',
			msg: 'invalid request'
	});
	
					}
			
			});	
						 
						 
				
				
			
			}
			
		});
		
		

$('#selectOneLogin li a').click(function(e) {
    $('#selectOneActionFo').html($(this).html());
	$('#name').attr('user_key', $(this).attr('value'));
});

$('#selectOneNewLogin li a').click(function(e) {
    $('#selectOneActionFo').html($(this).html());
	$('#id_cls_ff').attr('user_key', $(this).attr('value'));
});


	$("#submit_teUUsrname").validate({
		rules: {
				username:{ required: true}
			}, 
		submitHandler: function(form, event){
			$user_name_y = $('#username').val();
			$user_id_y = $('#username').attr('user_key');
				if(typeof $user_id_y == "undefined") {
					Lobibox.notify('error', {
						size:'mini',
						showClass: 'zoomInLeft',
						hideClass: 'zoomOutRight',
						msg: 'go back and select your status'
					});
					return;
				}
			$user_name_y = $user_id_y+$user_name_y;
			$.post('../ajax.php',{action:'get_a_usr_j_fqtpass',new_user:$user_name_y},function(data){
				console.log(data);
				if(data) {
					response_a =$.parseJSON(data); 
					response = response_a.success;
					if(response==1) {
						window.location.href = "../newLogin.php";
					} else if(response== -1) {
						Lobibox.notify('error', {
							size:'mini',
							showClass: 'zoomInLeft',
							hideClass: 'zoomOutRight',
							msg: 'We don`t recognise this user name'
						});
					} else if(response== 2) {
						$('#submit_teUUsrname').addClass('hidden');
						$('#submit_teUUpasswme').removeClass('hidden');
						$('#username_no').val($('#username').val());
						$('#username_no').attr('user_key', $('#username').attr('user_key'));
						$('#username_phone_no').html(response_a.data);
					}
				
				
					
				}
				
							
				
			});	
		}
			
	});
	
$('.clcickBack').click(function(e) {
    $('#submit_teUUsrname').removeClass('hidden');
	$('#submit_teUUpasswme').addClass('hidden');
	
	$('#username_no').attr('user_key', '');
	$('#username_phone_no').html('');
});
$('#verifyYid_no_idea').click(function(e) {
    $('body').html('<div style"text-align:center;"><p> contact admin for change your mobile number</p><hr/><a href"" id="clickBack_949693">back</a> ');
	$('#clickBack_949693').attr('href',''+'../index.php'+'');
});
$('#verifyYid_no_idea_a').click(function(e) {
      $('body').html('<div style"text-align:center;"><p> contact admin for change your mobile number</p><hr/><a href"" id="clickBack_949693">back</a> ');
	$('#clickBack_949693').attr('href',''+'../index.php'+'');
});



	$("#submit_teUUpasswme").validate({
		rules: {
				username_no:{ required: true}
			}, 
		submitHandler: function(form, event){
			$user_name_y = $('#username_no').val();
			$user_id_y = $('#username_no').attr('user_key');
				if(typeof $user_id_y == "undefined") {
					Lobibox.notify('error', {
						size:'mini',
						showClass: 'zoomInLeft',
						hideClass: 'zoomOutRight',
						msg: 'go back and select your status'
					});
					return;
				}
			$user_name_y = $user_id_y+$user_name_y;
			
			$.post('../ajax.php',{action:'get_a_code_mob_verf_fqtpass',new_user:$user_name_y},function(data){
				console.log(data);
				if(data) {
					response_a =$.parseJSON(data); 
					response = response_a.success;
					if(response==1) {
						$('#submit_teUUpasswme').addClass('hidden');
						$('#submit_tnumberHme').removeClass('hidden');
						$('#username_no_nu').val($('#username').val());
						$('#username_no_nu').attr('user_key', $('#username').attr('user_key'));
						$('#username_phone_no_me').html($('#username_phone_no').html());
						Lobibox.notify('success', {
							size:'mini',
							showClass: 'zoomInLeft',
							hideClass: 'zoomOutRight',
							msg: response_a.data
						});
						
					} else if(response== -1) {
						Lobibox.notify('error', {
							size:'mini',
							showClass: 'zoomInLeft',
							hideClass: 'zoomOutRight',
							msg: 'We don`t recognise this user name'
						});
					} else if(response== 2) {
						
						
					}
				
				
					
				}
				
							
				
			});	
		}
			
	});

$('.resetntCodeAgain').click(function(e) {
    $user_name_y = $('#username_no').val();
			$user_id_y = $('#username_no').attr('user_key');
				if(typeof $user_id_y == "undefined") {
					Lobibox.notify('error', {
						size:'mini',
						showClass: 'zoomInLeft',
						hideClass: 'zoomOutRight',
						msg: 'go back and select your status'
					});
					return;
				}
			$user_name_y = $user_id_y+$user_name_y;
			
			$.post('../ajax.php',{action:'resent_mob_verf_fqtpass',new_user:$user_name_y},function(data){
				console.log(data);
				response_a =$.parseJSON(data); 
				response = response_a.success;
					if(response==1) {
				
					Lobibox.notify('info', {
							size:'mini',
							showClass: 'zoomInLeft',
							hideClass: 'zoomOutRight',
							msg: response_a.data
						});
					}
				
			});
});


$("#submit_tnumberHme").validate({
		rules: {
				username_no_nu:{ required: true}
			}, 
		submitHandler: function(form, event){
			$user_key = $('#number_clode').val();
			
			$user_name_y_u = $('#username_no_nu').val();
				$user_id_y_u = $('#username_no_nu').attr('user_key');
				if(typeof $user_id_y_u == "undefined") {
					Lobibox.notify('error', {
						size:'mini',
						showClass: 'zoomInLeft',
						hideClass: 'zoomOutRight',
						msg: 'go back and select your status'
					});
					return;
				}
			$user_name_y_u = $user_id_y_u+$user_name_y_u;
			
			$.post('../ajax.php',{action:'get_a_code_verfy_verf_fqtpass',user_key:$user_key, new_user:$user_name_y_u},function(data){
				console.log(data);
				if(data) {
					response_a =$.parseJSON(data); 
					response = response_a.success;
					if(response==1) {
						$('#submit_tnumberHme').addClass('hidden');
						$('#spassNewWork_tnumberHme').removeClass('hidden');
						$('#password_12').attr('code', $user_key);
						
						
					} else if(response== -1) {
						Lobibox.notify('error', {
							size:'mini',
							showClass: 'zoomInLeft',
							hideClass: 'zoomOutRight',
							msg: 'We don`t recognise this user name'
						});
					} else if(response== 2) {
						
						Lobibox.notify('error', {
							size:'mini',
							showClass: 'zoomInLeft',
							hideClass: 'zoomOutRight',
							msg: 'verification failed'
						});
					}
				
				
					
				}
				
							
				
			});	
		}
			
	});


$("#spassNewWork_tnumberHme").validate({
		rules: {
				username_no_nu:{ required: true}
			}, 
		submitHandler: function(form, event){
			$user_key = $('#password_12').attr('code');
			
			$user_name_y_u = $('#username_no_nu').val();
				$user_id_y_u = $('#username_no_nu').attr('user_key');
				if(typeof $user_id_y_u == "undefined") {
					Lobibox.notify('error', {
						size:'mini',
						showClass: 'zoomInLeft',
						hideClass: 'zoomOutRight',
						msg: 'go back and select your status'
					});
					return;
				}
			$user_name_y_u = $user_id_y_u+$user_name_y_u;
			
			$password_1 = $('#password_1').val();
			$password_12 = $('#password_12').val();
			if($password_1 != $password_12) {
				Lobibox.notify('error', {
						size:'mini',
						showClass: 'zoomInLeft',
						hideClass: 'zoomOutRight',
						msg: 'password mismatch'
					});
					return;
			}
			
			$.post('../ajax.php',{action:'get_a_code_changeManf_fqtpass',user_key:$user_key, new_user:$user_name_y_u, password:$password_12},function(data){
				console.log(data);
				if(data) {
					response_a =$.parseJSON(data); 
					response = response_a.success;
					if(response==1) {
						//get_a_code_changeManf_fqtpass
						
						window.location.href = "../";
						
					} else if(response== -1) {
						Lobibox.notify('error', {
							size:'mini',
							showClass: 'zoomInLeft',
							hideClass: 'zoomOutRight',
							msg: 'We don`t recognise this user name'
						});
					} else if(response== 2) {
						
						Lobibox.notify('error', {
							size:'mini',
							showClass: 'zoomInLeft',
							hideClass: 'zoomOutRight',
							msg: 'verification failed'
						});
					}
				
				
					
				}
				
							
				
			});	
		}
			
	});


});

