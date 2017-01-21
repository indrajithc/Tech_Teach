
<?php include( 'header.php');  ?>

<?php //echo $_SESSION['li']; ?>






<div class="row">

	 <input type="button" value="say to admin" class="btn"  data-toggle="modal" data-target="#satToadmin" /> 



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
    <input type="file" name="upad_any_item_1" class="hidden  ulad_trgg_forall" id="upad_any_item_1"  accept="image/*"/>
    <input type="submit" id="btnSubmit_this" value="Submit" class="hidden" />
</form>
<div id="upld_a_item_here" class="hidden"></div>


<?php include_once('footer.php'); ?>


