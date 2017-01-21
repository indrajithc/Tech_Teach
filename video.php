<?php try {
	require_once('includes/db.php');
	$a = new Database();
	
}catch (Exception $e){
	
}
 ?>


<?php 
    if(isset($_POST['key'])) {
    if(isset($_POST['user_name'])) {

        $user_name =  $_POST['user_name'];
        $user_id = $_POST['user_id'];
		$type = $_POST['type'];
		// echo  $type;
?>




<?php
	$query = "SELECT * FROM `teacher` WHERE  delete_status=0 AND user_name =  '".$user_name."'";
	$OUTTresult949693 = $a->display($query);
	$OUTTresult949693 = $OUTTresult949693[0];
?>
     
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <script src="https://simplewebrtc.com/latest-v2.js"></script>
        <style>
            html {
                height: 100%;
            }
            body{
                height: 100%;
                margin: 0;
                padding: 0;
                min-height: 100%;
                font-family: 'Varela Round', sans-serif;
            }
            #remoteVideos, #localVideocontainer {
                display: inline-block;
            }
            #localVideocontainer {
                position: absolute;
                top: 0;
                bottom: 36px;
                left: 0;
                z-index: 20;
                overflow: hidden;
                border-right: 1px solid #e6eaed;
            }
            #localVideocontainer .name {
                background: #E3F8FF;
                color: #00B0E9;
                padding: 20px 20px;
                text-align: center;
            }
            #localVideocontainer .name a {
                color: #00B0E9;
                font-family: 'Varela Round', sans-serif;
                text-decoration: none;
            }
            #localVideocontainer .inner {
                padding: 10px;
            }
            #remoteVideos {
                margin-left: 400px;
                margin-left: 270px;
                margin-top: 100px;
                text-align: center;
            }
            #remoteVideos video {
                height: 350px;
                display: inline-block;
                margin-left: 10px;
            }
            #localVideo {
                height: 150px;
                padding-top: 10px;
            }
            .options {
                margin: 5px;
                padding-bottom: 15px;
                border-bottom: 1px solid #efefef;
            }
            .message {
                background: #E3F8FF;
                padding: 5px;
                padding-left: 100px;
                color: #00b0e9;
                text-align: center;
                font-weight: normal;
            }
            .message a {
                text-decoration: none;
                font-weight: bold;
                color: #00B0E9;
            }
			            .volume_bar {
                position: absolute;
                width: 5px;
                height: 0px;
                right: 0px;
                bottom: 0px;
                background-color: #12acef;
            }

			
        </style>
    </head>
    <body style="width:99%"> 
 <div class="row" id="myad_fot_this" user_name= <?php echo $user_name; ?>  user_id= <?php echo $user_id; ?> key="<?php echo $_POST['key']; ?>">   
    
      <div id="localVideocontainer">
            <div class="name">
                <a href="index.php"><?php  echo $OUTTresult949693['lname'].' '. $OUTTresult949693['lname']; ?></a>
            </div>
            <div class="inner">
            
    <div id="localVolume" class="volume_bar"></div>
                <video id="localVideo"></video>
                <div class="options">
                    <a class="pure-button" href="#"><i class="fa fa-microphone"></i></i></a>
                    <a class="pure-button" href="#"><i class="fa fa-video-camera"></i></a>
                </div>
            </div>
        </div>

        <div class="message" id="medsageT0cnctthis"><p><samp style="padding:5px;"></samp></p>
           <!-- <p>You are now connected with  Anjana Mis </p>-->
        </div>

        <div id="remoteVideos"></div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
        <script type="text/javascript">
var room = $('#myad_fot_this').attr('key');

$user_details = {one:'one', 
				user_name:$('#myad_fot_this').attr('user_name')
				
				};


            var webrtc = new SimpleWebRTC({
                // the id/element dom element that will hold "our" video
                localVideoEl: 'localVideo',
                // the id/element dom element that will hold remote videos
                remoteVideosEl: 'remoteVideos',
                // immediately ask for camera access
				  autoRequestMedia: true,
                debug: false,
                detectSpeakingEvents: true,
                autoAdjustMic: false,
				nick:$user_details
            });

           // we have to wait until it's ready
            webrtc.on('readyToCall', function () {
                // you can name it anything
                webrtc.joinRoom(room);
            });
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			window.onbeforeunload = closingCode;
function closingCode(){
 $My_user_name = $('#myad_fot_this').attr('user_name');
   $.post('ajax.php',{action:'endTheVido_call',user_name:$My_user_name, key:room},function(response){
			console.log('rrrrrrrrrrrr'+response);
			
		});
		 webrtc.stop();
   return null;
}



/******************************* cust *****************************/

   webrtc.on('volumeChange', function (volume, treshold) {
                // console.log('own volume', volume);
                showVolume($('#localVolume'), volume);
            });
  webrtc.on('channelMessage', function (peer, label, data) {
                if (data.type == 'volume') {
                    showVolume($('#volume_' + peer.id), data.volume);
                }
            });
			
				
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
			
	   webrtc.on('videoAdded', function (video, peer) {
                console.log('video added', peer);
                var remotes = document.getElementById('medsageT0cnctthis');
					console.log('videoAdded', peer.nick);
                
				$op_data =  peer.nick;
                //user_name
				remotes.appendChild('<p> '+$op_data.user_name+'</p>');
					

				
				
            });		
			
			*/




	
	

        </script>

    
    
    
    
    
    
    
    </div>
    
    
    
    
    
    <!--
    <div class="maindivone">
        <video class="video_inoaincontent" id="localVideo"></video>
        </div>
        <div id="remoteVideos"></div>

-->


    
    
    
      <?php 
	  
	
	 
	if( $type == 1) {
		
	 ?>
     <script type="text/javascript">
  /*
	$(document).ready(function(e) {
	
	//$('#nake_a_newVido_call').click(function(e) {
		
		$My_user_name = $('#myad_fot_this').attr('user_name');
		console.log('rrrrrrrrrr'+$My_user_name);
		var $key = makeid();
		$('#myad_fot_this').attr('key', $key);
		$.post('ajax.php',{action:'nake_a_newVido_call',user_name:$My_user_name, to:' all', description:'', key:$key},function(response){
									console.log('rrrrrrrrrrrr'+response);
									response =$.parseJSON(response);
									if(response){
										
									}
								});
		
  //  });
	
	function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 15; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
	
	}); */
	
    </script>
    
    
	<?php
	}
	?>
    
    
			
    </body>
</html>


<?php
} else {
        echo 'Unble to cnct.!';
    }
    } else {
        echo 'Unble to cnct.!';
    }
?>

<?php //include_once('footer.php'); ?>

