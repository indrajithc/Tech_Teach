$(document).ready(function(e) {

	$("#login-form").validate({
		
		submitHandler: function(form, event){
			var user_n = $('#name').val();
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
				$('.div_02').html(data);
				
		
			});	
		}
			
	});
		
		
});

