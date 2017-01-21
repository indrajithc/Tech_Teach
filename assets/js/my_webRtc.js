$(document).ready(function(e) {


	
	function getUsr() {
		var rRet;
		$.post('ajax.php',{action:'get_aUser_frm_db', user_name:$('#myad_fot_this').attr('user_name')},function(tyui){
						tyui =$.parseJSON(tyui);
						if(tyui.success ==1 ) {
							tyui_o = tyui.data;
							tyui_o = tyui_o[0];
							rRet = tyui_o;
						}
		});
		
	}
	
	
	$user_details = {one:'one', 
					two:$('#myad_fot_this').attr('user_name')
					
					};

             // grab the room from the URL
            var room = $('#myad_fot_this').attr('key');
			// $('#myad_fot_this').attr('user_name');
 
 // create our webrtc connection
            var webrtc = new SimpleWebRTC({
                // the id/element dom element that will hold "our" video
                localVideoEl: 'mainViewMe',
                // the id/element dom element that will hold remote videos
                remoteVideosEl: '',
                // immediately ask for camera access
                autoRequestMedia: true,
                debug: false,
                detectSpeakingEvents: true,
                autoAdjustMic: false,
				nick:$user_details
            });

            // when it's ready, join if we got a room from the URL
            webrtc.on('readyToCall', function () {
                // you can name it anything
                if (room) webrtc.joinRoom(room);
            }); 
            webrtc.on('channelMessage', function (peer, label, data) {
                if (data.type == 'volume') {
                    showVolume($('#volume_' + peer.id), data.volume);
                }
            });
            webrtc.on('videoAdded', function (video, peer) {
                console.log('video added', peer);
                var remotes = document.getElementById('remoteVideos');
                if (remotes) {
                    var d = document.createElement('div');
                    d.className = 'videoContainer new_persons';
                    d.id = 'container_' + webrtc.getDomId(peer);
                    d.appendChild(video);
                    var vol = document.createElement('div');
                    vol.id = 'volume_' + peer.id;
                    vol.className = 'volume_bar';
                    
                    d.appendChild(vol);
                    remotes.appendChild(d);
					
					console.log('videoAdded', peer.nick);

				
                }
            });
            webrtc.on('videoRemoved', function (video, peer) {
                console.log('video removed ', peer);
                var remotes = document.getElementById('remoteVideos');
                var el = document.getElementById('container_' + webrtc.getDomId(peer));
                if (remotes && el) {
                    remotes.removeChild(el);
                }
            });
            webrtc.on('volumeChange', function (volume, treshold) {
                // console.log('own volume', volume);
                showVolume($('#localVolume'), volume);
            });

            // Since we use this twice we put it here
            function setRoom(name) {
                $('form').remove();
                $('h1').text(name);
                $('#subTitle').text('Link to join: ' + location.href);
                $('body').addClass('active');
            }

            if (room) {
                setRoom(room);
            }
			
			
			
			 function showVolume(el, volume) {
                if (!el) return;
                if (volume < -45) { // vary between -45 and -20
                    el.css('height','0px');
                } else if (volume > -20) {
                     el.css('height','100%');
                } else {
                    el.css('height', '' + Math.floor((volume + 100) * 100 / 25 - 220) + '%');
                }
            }
						
			
			
			
			
			 

 /*
			
			$(document).on('click', 'video', function(e) {
				
			
				$T_his = $(this);
				console.log($(this).attr('src'));
				$srczero = $(this).attr('src');
				
				$srcone = $('#mainViewMe').attr('src');
				
				console.log($srcone);
				$('#mainViewMe').attr('src',$srczero);
				$T_his.attr('src',$srcone);
				
				$('#mainViewMe')[0].load();
			});
			
*/			
			$("#mainViewMe").hover(function() {
				if ($(this).attr('src').length <1) {
					$('#selectshow').removeClass('hidden');
					 
				}
				
				}, function() {
					$('#selectshow').addClass('hidden');
				});
			
			
			$(document).on('DOMNodeInserted' ,'#mainViewMe', function(e) {
				if ($(this).attr('src').length <1) {
					$('#selectshow').removeClass('hidden');
					 
				} else {
					
				}
			});
			
			$('#call_clcik_9086_1').click(function(e) {
                $this =$(this);
				if($this.attr('status') == 1) {
					webrtc.mute();
					$this.attr('status',0);
				} else {
					webrtc.unmute();
					$this.attr('status',1);	
				}
				statusChek($this);
            });
			$('#call_clcik_9086_2').click(function(e) {
                 $this =$(this);
				if($this.attr('status') == 1) {
					webrtc.pauseVideo();
					$this.attr('status',0);
				} else {
					webrtc.resumeVideo();
					$this.attr('status',1);	
				}
				statusChek($this);
            });
			$('#call_clcik_9086_3').click(function(e) {
                 $this =$(this);
				if($this.attr('status') == 1) {
					webrtc.pause();
					$this.attr('status',0);
				} else {
					webrtc.resume();
					$this.attr('status',1);	
				}
				statusChek($this);
            });
			
			function statusChek($this9) {
				if( $this9.attr('status') == 1) {
					$this9.find('.zero').addClass('hidden');
					$this9.find('.one').removeClass('hidden');
				} else {
					$this9.find('.one').addClass('hidden');
					$this9.find('.zero').removeClass('hidden');
					
				}
			}


    $(window).unload(function() {
	$My_user_name = $('#myad_fot_this').attr('user_name');
   $.post('ajax.php',{action:'endTheVido_call',user_name:$My_user_name, key:room},function(response){
			console.log('rrrrrrrrrrrr'+response);
			
		});
		 webrtc.stop();
});








	});
        