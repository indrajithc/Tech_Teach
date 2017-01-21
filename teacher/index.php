
            





<?php include( 'header.php'); 

$query = "SELECT * FROM `admin` WHERE user_name = '".$_SESSION['te']."'";
	$resultx = $a->display($query);
	if(!empty($resultx)){
		$resultx = $resultx[0];
		if($resultx['password'] === NULL) {
			
		}
		
		
		
		
	}
?>
<?php // echo $_SESSION['te'];
 ?>

<div class="row">
<div class="col-md-offset-1 col-md-3">
	 <input type="button" value="say to admin" class="btn"  data-toggle="modal" data-target="#satToadmin" /> 
</div>
<div class="col-md-3">
	 <a href="report.php" class="btn"  id="createReprtPage" />create reports </a>
</div>

<div class="col-md-2">
	 <a href="attendance.php" class="btn"  id="createReprtPage" />view  attendance </a>
</div>
</div>



<!-- Modal -->
<div id="satToadmin" class="modal fade" role="dialog">
  <div class="modal-dialog my-modal-dialog">

         	<form name="saAYtOaadmin" id="saAYtOaadmin">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">say someting</h4>
      </div>
      <div class="modal-body">
         <div class="row">
                        	<div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> to </label>
                                    <div class="col-md-8 " style="
    width: 120%;
">
                                       <input type="text" name="sub_namea" id="sub_name" value="the admin " disabled>
                                    </div>
                                </div>
                             </div>
                             
                             	<div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> Subject </label>
                                    <div class="col-md-8 " style="
    width: 120%;
">
                                       <input type="text" name="subjecta" id="subjecta" >
                                    </div>
                                </div>
                             </div>
                             
                             
                             
                             
                             <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4"> details </label>
                                    <div class="col-md-8 "style="
    width: 120%;
">
                                       <textarea class="" name="sub_adisc" id="sub_adisc" style="width:100%;max-width:100%;height:150px;"> </textarea>
                                    </div>
                                </div>
                             </div>
                <div class="col-md-8">      	
                               <div class="cust_class">
                                    <label class="col-md-4">  </label>
                                    <div class="col-md-8 "style="width: 120%;" >
                                 
                                    
                                    
                                    	<input type="button" id="select_new_fl" class="btn" style="float:right;max-width:200px;overflow:hidden;" value="select a file"/>
                                    </div>
                                </div> <div id="progress-div" class="hidden"><div id="progress-bar"></div></div>
              
                             </div>
                            
              
              
          </div>
      </div>
      <div class="modal-footer">
      
      <input type="submit" class="btn btn-primary" value="submit" id="">
</form>
		<button class="btn btn-primary" id="clear_me" ><i class="fa fa-eraser"> clear</i></button>
        <button class="btn btn-primary" data-dismiss="modal"  id="submitaddbutton" >Close</button>
      </div>
    </div>
  </div>
</div>


<form id="opad_attachmntopdate_"  action="../upload.php" method="post" class="hidden">
    <input type="file" name="upad_any_item_1" class="hidden  ulad_trgg_forall" id="upad_any_item_1_949693"  accept="image/* , application/pdf"/>
    <input type="submit" id="btnSubmit_this" value="Submit" class="hidden" />
</form>
<div id="upld_a_item_here_fothis" class="hidden"></div>



<?php include_once('footer.php'); ?>




<?php








?>




  <div class="temptopbk hidden" id="toppassrea">
                    <form id="passChnge">
                        <div class="temtop">
                        <div class="intoiconX">
                        	<i class="fa fa-times shadow" id="cutThisScreen"></i>
                        </div>
                        
                         			<div class="cust_class CustClssPlsMyCl testPasswrdLastHere" id="passw1">
                                        <label class="col-md-4"> current password </label>
                                        <div class="col-md-8 ">
                                          <input type="password" name="cpass" id="te_cpass" >
                                        </div>
                                    </div>
                                    <div class="cust_class CustClssPlsMyCl testPasswrdLastHere" id="te_cpass">
                                        <label class="col-md-4"> Password </label>
                                        <div class="col-md-8 ">
                                          <input type="password" name="pass" id="inputPassword" >
                        <div id="complexity" class="default myCust">Enter a random value</div>
                                        </div>
                                    </div>
                                    
                                    <div class="cust_class CustClssPlsMyCl testPasswrdLastHere" id="passw2">
                                        <label class="col-md-4">Re-enter Password </label>
                                        <div class="col-md-8 ">
                                          <input type="password"  name="repass" id="te_repass" >
                                          <div id="repassStat"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="cust_class CustClssPlsMyCl testPasswrdLastHere" id="passw1">
                                        <label class="col-md-4"></label>
                                        <div class="col-md-8 ">
                                          <input type="submit" class="btn btn-primary" value="submit" id="cpassr">
                                        </div>
                                    </div>
                        
                        </div>
                        
                        
                      </form>
                      

    
                    </div>
                   



