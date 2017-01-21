<!DOCTYPE html>

<?php

	if(isset($_GET['user_name'])) {
		
		$usr_name = $_GET['user_name'];
		//echo $usr_name;
		if(substr( $usr_name ,0,2) == 'te') {
			
		
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Forgot password</title>
		
		<!-- Bootstrap core CSS -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Favicons -->
		<link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="../assets/img/favicon.ico">
		
        
        
        
        
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700">
		
		<link rel="stylesheet" href="../assets/css/custom.css">
		
        <link rel="stylesheet" href="../assets/lobibox/css/lobibox.css">  
        <link rel="stylesheet" href="../assets/lobibox/css/animate.css">    
	</head>
	<body>
		
		<!-- Navigation top
		================================================== -->
		<div class="navigation-top-bar">
			<nav class="navbar navbar-default">
			  <div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">Teach Teach</a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 text-right">
			     <ul class="nav navbar-nav">
			        <li class="active"><a href="index.php">log in</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</div>
			
			
		<!-- HEADER
		================================================== -->
		<section class="site-header login-wrapper" role="banner">
			<div class="container">
				<div class="row">
					<div class="main_b_c_ya">
                    	<div class="main_b_c_yinnr" >
                        
                        <div class="yid-challenge">
    <form action="" method="post" class="pure-form pure-form-_myd" id="submit_teUUsrname">
    <h2 class="muHeadClass">Let's get you into your&nbsp;account</h2>
        <div class="yid-label">
            <label for="username">What is your user&nbsp;name?</label>
        </div>
        <div class="pure-u-1 margin8">
            <input type="text" name="username" id="username" placeholder="Email&nbsp;address" value="<?php echo substr( $usr_name ,3)?>" autofocus data-rapid_p="3" class="inputdata949693 login-wrapper_input"  user_key='<?php echo substr( $usr_name ,0,2); ?>-'>
        </div>
        <div class="margin24">
            <button type="submit" class="btn  btn-primary myB-tnYC" name="verifyYid" value="Continue" 
            >
                Continue
            </button>
        </div>
        <div class="bavlClcik">
        <a href="../" class="inkwMyData">I  know my user&nbsp;name and password</a>
        </div>
        <div class="skip-challenge txt-align-center">
                        
                        
                        </div>
                        </form>
                        
                        
                        
    
    <form action="" method="post" class="pure-form pure-form-_myd hidden" id="submit_teUUpasswme">
        <div class="pure-u-1 margin8">
            <input type="text" name="username_no" id="username_no" placeholder="Email&nbsp;address" value="<?php echo substr( $usr_name ,3)?>" autofocus data-rapid_p="3" class="inputdata949693 login-wrapper_input"  user_key='' style=""> <label class="clcickBack"> not you ? </label>
        </div>
     <h2 class="muHeadClass" style="
    font-weight: 800;
">Do you have access to this phone?</h2>
      
        <div class="yid-label" style="
    text-align: center;
    
">
            <label id="username_phone_no" style="
            padding-bottom:25px;
    font-stretch: extra-expanded;
"></label>
        </div>
        <div style="padding: 10px 0px;" >
        <p style="
    font: 17.3333px Arial !important;
    text-align: center;
    color: black;
">We will send you a code to verify your phone number. </p>
        </div>
        <div class="margin24">
            <button type="submit" class="btn  btn-primary myB-tnYC" name="verifyYid" value="Continue" 
            >Yes, text me a code</button>
        </div>
        <div class="margin24">
            <button type="button" class="btn  btn-primary myB-tnYC" id="verifyYid_no_idea" value="Continue" 
            style="
    margin-top: 15px;
    background-color: transparent;
    color: #4CA9FF;
    font-weight: bold;
">I don't have access to this phone</button>
        </div>
        <div class="bavlClcik">
        <a href="../" class="inkwMyData">I  know my user&nbsp;name and password</a>
        </div>
        <div class="skip-challenge txt-align-center">
                        
                        
                        </div>
                        </form>
    
    
    
    
       <form action="" method="post" class="pure-form pure-form-_myd hidden" id="submit_tnumberHme">
        <div class="pure-u-1 margin8">
            <input type="text" name="username_no_nu" id="username_no_nu" placeholder="Email&nbsp;address" value="<?php echo substr( $usr_name ,3)?>" autofocus data-rapid_p="3" class="inputdata949693 login-wrapper_input"  user_key='' style=""> <label class="clcickBack"> not you ? </label>
        </div>
     <h2 class="muHeadClass" style="
    font-weight: 800;
">Verify your phone number</h2>
      
        <div class="yid-label" style="
    text-align: center;
    
">
            <label id="username_phone_no_me" style="
            padding-bottom:25px;
    font-stretch: extra-expanded;
"></label>
        </div>
        
         <div class="pure-u-1 margin8" style="
    text-align: center;
">
            <input type="number" name="number_clode" id="number_clode" autofocus  class="inputdata949693_input" maxlength="6"   placeholder="    ------  " > 
        </div>
        
        
        
        <div style="padding: 10px 0px;" >
        <p style="font: 10.3333px Arial !important;
    text-align: center;
    color: black;
    padding: 0px 66px;
">Your code may take a few moments to arrive.
Do not share this code with anyone.
Didn't receive a code?  <a class="resetntCodeAgain"> Re send</a></p> 
        </div>
        <div class="margin24">
            <button type="submit" class="btn  btn-primary myB-tnYC" name="verifyYid" value="Continue" 
            >Verify</button>
        </div>
        <div class="margin24">
            <button type="button" class="btn  btn-primary myB-tnYC" id="verifyYid_no_idea_a" value="Continue" 
            style="
    margin-top: 15px;
    background-color: transparent;
    color: #4CA9FF;
    font-weight: bold;
">I don't have access to this phone</button>
        </div>
        <div class="bavlClcik">
        <a href="../" class="inkwMyData">I  know my user&nbsp;name and password</a>
        </div>
        <div class="skip-challenge txt-align-center">
                        
                        
                        </div>
                        </form>
    
    
    
    
    
       <form action="" method="post" class="pure-form pure-form-_myd  hidden" id="spassNewWork_tnumberHme">
       
       
     <h2 class="muHeadClass" style="
    font-weight: 800;
">change password</h2>
      
        <div class="yid-label" style="
    text-align: center;
    
">

 <div class="pure-u-1 margin8">
            <input type="password" name="password_1" id="password_1" placeholder="password"   autofocus="true" class="inputdata949693 login-wrapper_input"  >
        </div>
        
         <div class="pure-u-1 margin8">
            <input type="password" name="password_12" id="password_12" placeholder="confirm password"  class="inputdata949693 login-wrapper_input" >
        </div>
        
            <label id="username_phone_no_me" style="
            padding-bottom:25px;
    font-stretch: extra-expanded;
"></label>
        </div>
      
      
        
        
    
        <div class="margin24">
            <button type="submit" class="btn  btn-primary myB-tnYC" name="verifyYid" value="Continue" 
            >cahnge password</button>
        </div>
       
        <div class="bavlClcik">
         
        </div>
        <div class="skip-challenge txt-align-center">
                        
                        
                        </div>
                        </form>
    
    
                    </div>
                    
				</div><!-- row -->
			</div><!-- container -->
		</section>
		
		<footer>
			
		</footer>
		
		<!-- Bootstrap core JavaScript
			Placed at the end of the document so the pages load faster
		================================================== -->
        
        
		<script src="../assets/js/jquery-1.11.3.min.js"></script>

		<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/jquery.validate.js"></script>
		<script src="../assets/js/main.js"></script>
        
    <script type="text/javascript" src="../assets/lobibox/js/lobibox.js"></script>
    <script type="text/javascript" src="../assets/lobibox/js/messageboxes.js"></script>
    <script type="text/javascript" src="../assets/lobibox/js/notifications.js"></script>
		
<script type="text/javascript" src="../assets/js/passwrJs/mocha.js"></script>
	</body>
</html>


<?php

} else if(substr( $usr_name ,0,2) == 'st') {
	echo '<html>
	<body>
	<div style="text-align:center; margin-top:200px;">
	<a href="../" > go back and cotact your class teacher</a>
	</div>
	</body>	
	</html>';
}

} else  {
		echo '<script type="text/javascript">location.href = "../";</script>';
	}
	
	?>