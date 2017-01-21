
<?php include( 'header.php'); 
	
?>

 <?php 
	$query = "SELECT * FROM `book_section`";
	$result = $a->display($query);


?>
            




<div class="">

    <div class="row">
      <div class="col-md-6">
<form name="add-book-section" id="add-book-section">
    <div class="form-group">
        <label class="col-xs-8 col-sm-3">Book Section</label>
         <div class="input-group col-md-8 " id="usernamecheckdivforaddText">
              <input type="text" class="form-control"  name="uname" id="add_section_name" aria-describedby="inputGroupSuccess3Status">
              <span class="inputError2Statuspart"></span>
             <!-- <span class="glyphicon glyphicon-ok form-control-feedback hide" aria-hidden="true" id="trues"></span>
              <span class="glyphicon glyphicon-remove form-control-feedback hide" aria-hidden="true"></span>   
          -->
          </div>
    </div>	
    
    <div class="form-group">
        <label class="col-md-3 "> Description </label>
        <div class="col-md-9 ">
           <textarea class="form-control" id="description"  ></textarea>
        </div>
    </div>
                            
    <div class="form-group">
        <label class="col-xs-8 col-sm-3"></label>
        <input type="submit" class="btn btn-primary" value="submit" id="a_book_section">
    </div>			
</form>	

      
      
      
      </div>
      <div class="col-md-6 class_for_padding"><br>
      	<form name="view-book-section" id="view-book-section">
     <!--       <div style="height:350px; overflow:auto;" >    -->                       
                <table class="table table-hover table-striped" id="view_section_table">
                <thead  class="header">
                    <tr class="success" >
                      <th ><font color="#0aa699">section</th>  
                       <th ><font color="#0aa699">description</th>  
                    </tr>
                    </thead>
                     <tbody>
					   <?php
                            foreach($result as $value) {
                                echo "<tr class='filterable-cell'><td>".$value['section']."</td><td><textarea disabled>".$value['description']."</textarea></td></tr>";
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
