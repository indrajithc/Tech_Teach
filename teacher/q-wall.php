<?php

include( 'header.php'); 

?>
	<?php 
			$query = "SELECT * FROM `question` ORDER BY `question`.`date` DESC LIMIT 40";
			$result_all_qstns = $a->display($query);
			$query = "SELECT COUNT(*) AS total FROM `question` ";
			$counttotalqstns = $a->display($query);
			$counttotalqstns = $counttotalqstns[0];
			//$result = $result[0];	
		/*		$url = $_SERVER['REQUEST_URI']; 
				$parts = explode('/',$url);
				$dir = $_SERVER['SERVER_NAME'];
				for ($i = 0; $i < count($parts) - 1; $i++) {
				 $dir .= $parts[$i] . "/";
				}
				
				$_POST['photo_url']= 'http://'.$dir.'images_/';
				*/
				
				
			?>
                
			
                
<div class="row mycustclass80869191" id="q_wall80869191">
	  <div class="newriwhead80869191">
      	<div class="insideone80869191">
        
        </div>
      	<div class="insidetwo80869191">
        	<ul class="innermenu80869191">
            	<li>
                	<a href="index.php"> index </a>
                </li>
            	<li>
                	<a href="logout.php"> logout </a>
                </li>
                <li>
                	<div class="headtestsearch80869191_bk">
                    	<input type="text" class="headtestsearch80869191" placeholder="Search Q&A" />
                    </div>
                </li>
            </ul>
        </div>
      </div>
      <div class="headder80869191">
      	<div class="headdrun80869191_one">
        	<div class="logo">
					<a href="index.php">
						<img src="../assets/img/logo@2y.png" width="200" alt="">
					</a>
				</div>
        </div>
        <div class="divone80869191_two">
        
        	<input type="button" class="btn btn-warning" value="shoot your questions" data-toggle="modal" data-target="#myModal" />
        </div>
      </div>
      <div class="container">
      	<div class="container_hread_wie80869191">
        
        	<div class="newQuestions80869191" total_qstns = "<?php echo $counttotalqstns['total']; ?>" id="newQuestions80869191_id" >
        <?php  
		foreach ($result_all_qstns as $value) {
			$actpostImg='';
			if (!ctype_digit($value['admin'])) { 
				$query = "SELECT * FROM `teacher` where user_name='".$value['admin']."'";
				$theDetid = $a->display($query);
				if(!empty($theDetid)) {
										$theDetid = $theDetid[0];
					$actpostImg='<img src="../teacher/images_/'.$theDetid['image'].'" style="    width: 50px;height: 50px; margin: -15px 0px;float: right;" />';
					
					;

				}
			} else {
				$query = "SELECT * FROM `student` where user_name='".$value['admin']."'";
				$theDetid = $a->display($query);
				if(!empty($theDetid)) {
					$theDetid = $theDetid[0];
					$actpostImg='<img src="../student/images_/'.$theDetid['image'].'" style="    width: 50px;height: 50px; margin: -15px 0px;float: right;" />';
					
				}
						}
						
			
			echo '<div class="subquetn_80869191 connon_class_dorJqry_Rvnt" qstn_id="'.$value['id'].'"  admin="'.$value['admin'].'"  time = "'.$value['date'].'">
                	<i class="fa fa-question-circle"></i>'.$value['subject'].' '.$actpostImg.'
                </div>';
			
			
			
			
		?>
        
            	<!--
                <div class="subquetn_80869191">
                	 <i class="fa fa-question-circle"></i>sdfs
                </div>
                -->
            
            <?php }?>
            </div>
            
        </div>
        <div class="actualContent80869191">
        	<div class="mainqyestuion">
            	<h1 class="h1cls80869191" id="displaymainqstn80869191"  placeholder="select a question" style="min-height:40px;"> </h1>
            </div>
            <div class="row discription80869191">
            	<div class="col-md-8 myclassforcol80869191_one" id="mainRepalys_viewArea80869191">
                
                
                   <div class="each_comment80869191 replayTeextAr_9191">
                   <form id="addAreplayForthis" name="addAreplayForthis">
                            <div class="col-md-offset-1 col-md-11" id="replayTeextArea_80869191">
                                <textarea  class="form-control replayTeextArea_80869191_area" placeholder=" do you know the answer .."  id="replayTeextArea_80869191_replay" name="replayTeextArea_80869191_replay" admin = "<?php echo substr( $_SESSION['te'] ,3); ?>"></textarea>
                            </div>
                            <input type="submit" class="btn btn-success" id="postrepayy80869191" value="say it " style="width:100px;font-size:16px;position: absolute;top: 155px;right: 30px;">
                      </form>
                            

                    
                    </div>
                
                
 
                	<div class="each_comment80869191 commonclass_for_only_replays hidden">
                    	   <div class="col-md-1">
                                <div class="rate_me80869191">
                                    <div class="addone8086 custfotntfoclick">
                                        <i class="fa fa-chevron-up"></i>
                                    </div>
                                    <div class="actialopno">
                                        <h1 class="opthisnow">
                                            23
                                           </h1>
                                    </div>
                                    <div class="subtraone8086 custfotntfoclick">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="fiapading80869191">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="fiapading80869191" >
                                            <i class="fa fa-check tickfortruetop hidden"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <p class="para_dis80869191">
                                        sfsfsdfsdfsf sdf;sj dfjs;dfs;df s;ldfks;d flsjkf;slfkjs;ioue r;ef n,m d;fif;dgddfgdkj hdgjhdfgdgdgdgdgdgd gddfgdkldkljhdl;k gd; gd;gdg
                                        dfglkd;g dg
                                        gdlkg ;dlgk j;lgd
                                        fgdg d'lgj ;oi goigjdlm,d kf;sdlgjdsg
                                        dgdgljdgd
                                        dgdk fjg;lgj;dfgh;sfgsg dfg
                                         dgdfgh d ;g;g sfg;e ydjnbcxlks;oifmnl. jk;ete  .ke t;oiwer u iu sdfxbmcvbjkel i
                                         sfsld jshiuhflsns fluh;l
                                </p>
                            </div>
                            
                            <div class="detailsofwhoadd">
                            	<div class="col-md-3">
                                
                                <img width="50px" height="50px" src="#">
                                </div>
                                <div class="col-md-9">
                                	<h5> name of sh</h5>
                                    <h6> discrip </h6>
                                </div>
                            </div>

                    
                    </div>
                 
                    
                </div>
                <div class="col-md-4 myclassforcol80869191_two">
                	<div class="hearfourdivcom80869191 hearfourdivcom80869191_1" id="discriptog80869191">
                    	<h4 id="discriptog80869191_1"> </h4>
                        <h4 id="discriptog80869191_2"> </h4>
                        <h5 id="discriptog80869191_3"> </h5>
                    
                        <div class="forquestionFav hidden" >
                        	<i class="fa fa-star"></i>
                        </div>
                    </div>
                    
                    <div class="hearfourdivcom80869191 hearfourdivcom80869191_2" id="hdearfourdivcom80869191_2">
                    	<div class="oruhedd80869191">
                        	<h3> favourite questions </h3>
                        </div>
                        <?php 
							$query = "SELECT * FROM `favourite_question` WHERE admin = '".substr( $_SESSION['te'] ,3)."' ORDER BY `favourite_question`.`date` DESC ";
			$fvpost = $a->display($query);
			
				foreach($fvpost as $val8086) {
							$query = "SELECT * FROM `question` WHERE id = ".$val8086['question'];
							$forapostdet = $a->display($query);
							$forapostdet = $forapostdet[0];
							
							echo  '<div class="oruhedd80869191two connon_class_dorJqry_Rvnt orupaddingadd698" qstn_id="'.$val8086['question'].'"  admin="'.$forapostdet['admin'].'" time = "'.$forapostdet['date'].'" style="padding:9px;"> <i class="fa fa-question-circle"></i>'.$forapostdet['subject'].'</div>';	
				}
						?>
                        
                        
                    
                    </div>
                    
                    <div class="hearfourdivcom80869191 hearfourdivcom80869191_3">
                    <p class="clasparanouse">Get the <b>weekly newsletter!</b> In it, you'll get:</p>
                    <ul class="nousedothris_only" style="list-style-type: disc !important;">
                        <li>The week's top questions and answers</li>
                        <li>Important community announcements</li>
                        <li>Questions that need answers</li>
                    </ul>
                    <div class="addApostsubtest">
                    	<input type="button" class="btn btn-warning" value="shoot your questions"  data-toggle="modal" data-target="#myModal" />
                    </div>
                    </div>
                    
                    <div class="hearfourdivcom80869191 hearfourdivcom80869191_4">
                    <div class="myallposts80869191" id="aftermypostadd80869191" admin="<?php echo substr( $_SESSION['te'] ,3); ?>">
                        	<h3><i class="fa fa-question">  my questions </i></h3>
                        </div>
                        
                        <?php  
			$query = "SELECT * FROM `question` WHERE admin = '".substr( $_SESSION['te'] ,3)."' ORDER BY `question`.`date` DESC";
			$result_fomypost = $a->display($query);	
			if(!empty($result_fomypost)) {		
						foreach( $result_fomypost as $value) {
							echo '<div class="mypoststwo connon_class_dorJqry_Rvnt" qstn_id="'.$value['id'].'"  admin="'.$value['admin'].'" time = "'.$value['date'].'">
							<i class="fa fa-question" style="color:#018100; font-size:30px;"></i>'.$value['subject'].'</div>';
						}
			}
						?>
                        
                        <!--
                    	 <div class="mypoststwo">
                          fhslsdfj  sdkfjslf jsl;f s;flks;f sf;sf s;flksd fkjsh fliufscns,mdfg wefjgsdfsfsdflsifuslfjs,mfs sfd, jsfluf sfs,fdjslhf iusfsfshfs lfs fsfslfjs dflsfs fsghljfgs s sfhjgs lfsfds lisu lsfsf sfsjgfsbn zxam,shfsgkjdfyfs fsfj sg 
                        </div>
                    -->
                    </div>
                </div>
            </div>       
        
        </div>
      
      </div>
      
      <div style="width:100%; height:300px">
      </div>
</div>




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="writeqstion" id="writeqstion">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">shoot your question</h4>
      </div>
      <div class="modal-body">
         <div class="row">
                        	  <div class="col-md-12">      	
                               <div class="cust_class">
                                   
                                    <div class="col-md-12 ">
                                       <textarea class="form-control textareal80861919" name="sub_disc_qstn" id="my_qstnis" placeholder="write your own question " autofocus></textarea>
                                    </div>
                                </div>
                             </div>
              
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="submit" id="">
</form>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton" >Close</button>
      </div>
    </div>
  </div>
</div>






<?php include_once('footer.php'); ?>
