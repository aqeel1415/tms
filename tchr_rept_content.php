
<link type="text/css" rel="stylesheet" href="css/main.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

         <form action="tchr_rept_Maker.php" method="post">
         <input name="teacher_id" type="hidden" value= "<?php echo $_GET['id']; ?>">
         Check the contents you want to be in the report <br/> 
         <input type='checkbox' name='tchr_rpt_cont[]' value='loans'>Orders info<br>
         <input type='checkbox' name='tchr_rpt_cont[]' value='toolloans'>Tools ordered<br>
         <input type='checkbox' name='tchr_rpt_cont[]' value='units'>Units assigned<br>
         <input type='checkbox' name='tchr_rpt_cont[]' value='tools'>Tools assigned<br>
         <div class="modalbuttons">  
         <input  class="btn btn-default" data-toggle="modal" type="submit" value="Generate" />
         <input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" /> 
  		 </div>
         </form>  
	    
