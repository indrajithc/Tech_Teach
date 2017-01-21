
<?php include( 'header.php'); 
	defined('master') or die('You didnot have permissions to aacees this page.');
?>

 <?php 
	$query = "SELECT * FROM `admin` WHERE user_name != 'admin@techteach.com'";
	$result = $a->display($query);


?>
            




<div class="">

    <div class="row">
      <div class="col-md-6">
<form name="add-admin" id="add_admin">
    <div class="form-group">
        <label class="col-xs-8 col-sm-3">username</label>
         <div class="input-group col-md-8 " id="usernamecheckdivforaddAdmin">
              <span class="input-group-addon">ad-</span>
              <input type="text" class="form-control"  name="uname" id="add_acmin_name" aria-describedby="inputGroupSuccess3Status">
              <span class="inputError2Statuspart"></span>
             <!-- <span class="glyphicon glyphicon-ok form-control-feedback hide" aria-hidden="true" id="trues"></span>
              <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>   
          -->
          </div>
    </div>	
    <div class="form-group">
        <label class="col-xs-8 col-sm-3"></label>
        <input type="submit" class="btn btn-primary" value="submit" id="a_admin">
    </div>			
</form>	

      
      
      
      </div>
      <div class="col-md-6 "><br>
      	<form name="view-admin" id="view_admin">
     <!--       <div style="height:350px; overflow:auto;" >    -->                       
                <table class="table table-hover table-striped tustableforonldyadthid" id="view_table30">
                <thead  class="header">
                    <tr class="success" >
                      <th ><font color="#0aa699">user name</th>  
                       <th ><font color="#0aa699">password</th>  
                       <th ><font color="#0aa699">password</th>  
                    </tr>
                    </thead>
                     <tbody>
					   <?php
                            foreach($result as $value) {
                                echo "<tr class='filterable-cell'><td class='actual_useR_name'>".$value['user_name']."</td><td>".$value['password']."</td><td><span class='glyphicon glyphicon-trash clickfordltaadmin' aria-hidden='true'></span> </td></tr>";
                           }
                        ?>
                      </tbody>
                </table>                                    
      <!--     </div>		-->		    					    
        </form>
                       

	  </div>
    </div>
</div>





<?php include_once('footer.php'); ?>
