<link type="text/css" rel="stylesheet" href="css/main.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>


         <form action="alltool_rept_Maker.php" method="post">
         <input name="tool_id" type="hidden" value= "<?php echo $_GET['id']; ?>">
         Check the contents you want to be in the report <br/> 
         <input type='checkbox' name='t_rpt_cont[]' value='locations'>Locations<br>
         <input type='checkbox' name='t_rpt_cont[]' value='chapters'>Assigned Chapters<br>
         <input type='checkbox' name='t_rpt_cont[]' value='loan'>Orders history<br>
         <input type='checkbox' name='t_rpt_cont[]' value='sufficiency'>Tool Sufficiency<br>
         <div><input name="yes" type="submit" value="Generate report" />
         <input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />   
        </div>
         </form>  
	    
