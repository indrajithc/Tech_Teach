<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Project</title>
		
		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Favicons -->
		<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="assets/img/favicon.ico">
		
        
        
        
        
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700">
		
		<link rel="stylesheet" href="assets/css/custom.css">
		
        <link rel="stylesheet" href="assets/lobibox/css/lobibox.css">  
        <link rel="stylesheet" href="assets/lobibox/css/animate.css">    
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
					<div class="col-md-offset-2 col-md-8">
                    	<div class="innr_new_545">
                        <form id="rese_ne_pa">
                        <div class="oru_cl">
                        	<h3 id="headds"> Enter your user name </h3>
                        </div>
                        
                        
                        	<div class="col-md-offset-7 IP_sharp">
                               <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 46px;width: 71px;margin-top: -10px;margin-left: -6px;" id="selectOneActionFo">
          Teacher
        </button>
        <div class="dropdown-menu">
        <ul style="width: 250px; padding-left:0px;" id="selectOneNewLogin">
          <li style="padding: 6px;"><a class="dropdown-item" value=''>Admin</a> </li>
           <li style="padding: 6px;"><a class="dropdown-item"   value='te-'>Teacher</a> </li>
           <li style="padding: 6px;"><a class="dropdown-item"   value='st-'>Student</a> </li>
           <li style="padding: 6px;"><a class="dropdown-item"   value='li-'>Library</a> </li>
           
          </ul>
        </div>
      </div>
                        	<input type="text" class="main_e_idd"  style="
    border: none; background-color:transparent;    margin-top: 2px;" placeholder="user name" id="id_cls_ff" name="id_cls_ff" user_key='te-'>
    </div>
                           <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </div>
                           <div class="submit_sub_cl">
                            <input type="submit" class=" btn btn-primary">
                            </div>
                            
                            </form>
                            
                            
                               <form id="rese_ne_pa_mob" class="hidden">
                         <div class="oru_cl">
                        	<h3 > Enter your user mobile number </h3>
                        </div>
                        
                        	<div class="col-md-offset-7 IP_sharp">
                        	<input class="main_e_idd"  style="
    border: none; background-color:transparent;    margin-top: 2px;" placeholder="user mobile number" id="mob_id_cls_ff" name="mob_id_cls_ff"  type="number" pattern="\d{3}[\-]\d{3}[\-]\d{4}" maxlength="10" minlength="10">
                           <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> </div>
                           <div class="submit_sub_cl ">
                            <input type="submit" class=" btn btn-primary">
                            </div>
                            
                            </form>
                            
                            
                            
                            
                            <form id="rese_ne_pa_mob_verif" class="hidden">
                         <div class="oru_cl col-md-offset-3">
                        	<h3 id="valmogula"> </h3>
                        </div>
                        
                        	<div class="col-md-offset-11 IP_sharp" style="width:70%">
                        	<input class="main_e_idd"  style="
    border: none; background-color:transparent;        margin-top: -6px;
    width: 100%;
    font-size: 39px;
    height: 52px; placeholder="" id="mob_id_cls_ff_svr" name="mob_id_cls_ff_svr"  type="number"  maxlength="6" minlength="6">
                           <div class=" ">
                            <input type="submit" class=" btn btn-primary">
                            </div>
                            
                           </div>
                            </form>
                            <div class="c_re_cl">
                            <input type="button" value="Resend Verification Code " class="bbttvv hidden" id="resebtcodsw">
                            </div>
                            
                            
                              <form id="rese_final_la" class="hidden">
                              	<div class="col-md-offset-6 centr__dd">
                                
                                <div class="row" id="te_cpass">
                                        <label class="col-md-6"> Password </label>
                                        <div class="col-md-6 ">
                                          <input type="password" name="inputPassword" id="inputPassword" >
                        <div id="complexity" class="default myCust arno5634554">Enter a random value</div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="passw2">
                                        <label class="col-md-6">Re-enter Password </label>
                                        <div class="col-md-6 ">
                                          <input type="password"  name="te_repass" id="te_repass" >
                                          <div id="repassStat"></div>
                                        </div>
                                    </div>
                                <div class="row" id="passw2">
                                        <label class="col-md-6"> </label>
                                        <div class="col-md-6 ">
                                          <input type="submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                
                                
                                </div>
                        		
                            </form>
                            
                        </div>                    
                    </div>
                    
                    
				</div><!-- row -->
			</div><!-- container -->
		</section>
		
		<footer>
			
		</footer>
		
		<!-- Bootstrap core JavaScript
			Placed at the end of the document so the pages load faster
		================================================== -->
        
        
		<script src="assets/js/jquery-1.11.3.min.js"></script>

		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script src="assets/js/main.js"></script>
        
    <script type="text/javascript" src="assets/lobibox/js/lobibox.js"></script>
    <script type="text/javascript" src="assets/lobibox/js/messageboxes.js"></script>
    <script type="text/javascript" src="assets/lobibox/js/notifications.js"></script>
		
<script type="text/javascript" src="assets/js/passwrJs/mocha.js"></script>
	</body>
</html>
