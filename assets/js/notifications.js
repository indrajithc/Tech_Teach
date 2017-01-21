// JavaScript Document
$(document).ready(function(e) {
	
	var glob_for_shw_msg = true;
	window.setInterval(function(){
	//		console.log('------- -- - -');
	//if($('#update').is(':visible')) {
			//console.log('dd');
			checkFornewNotif();
	//}
			
			}, 5000);
	
	
	
	function checkFornewNotif() {
		//console.log('------- -- - -');
		if($('.noticationsMain').is(':visible')) {
			$('.alert_icon_this_inokClks949693').css('color','#212121');
			$('.alert_icon_this_inokClks949693SSSS').html('');
		}
					
		$total = $('.alert_icon_this_inokClks949693').attr('total');
		$.post(ajax_url,{action:'ckeckNotification', total:$total},function(response){
			if(response){
				 
				// console.log(response);
				response =$.parseJSON(response);
				if(response.success == 1) {
					$newData = response.data;
					 //console.log($newData);
					$('.alert_icon_this_inokClks949693').css('color','#D207FF');
					$('.alert_icon_this_inokClks949693SSSS').html('new');
					$('.alert_icon_this_inokClks949693').attr('total',response.total);
					if(glob_for_shw_msg) {
					 Lobibox.notify('info', {
												title:'new notification ',
												showClass: 'wobble',
												hideClass: 'bounceOut',
												msg: $newData.subject
												
												
											});
											glob_for_shw_msg = false;
					}
					if($('.noticationsMain').is(':visible')) {
						location.reload();
					}
				}
			}
			
		});
	}
	
});