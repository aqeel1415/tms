<script src="js/Retreivels.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<form action="assign2locaex.php" method="post" enctype="multipart/form-data" name="assign2loca" >
<input name="teacher_id" type="hidden" value= "<?php echo $_GET['id']; ?>">
Unit : <br />
   <select class="selectadj" name="tool_unit" id="unit_chosen6"> 
    <option value="" >select</option> 
       <?php 
        $connection = mysqli_connect("localhost","root","","ats_db"); error_reporting(E_ALL ^ E_DEPRECATED);
        

         $dd_res=mysqli_query($connection,"Select * from unit");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }
        ?>     
</select><br />
Location : <br />   
   <select class="selectadj" name="tool_location" id="Locs_has6"> 
    <option value="" >select</option> 
   </select> <br/>

 <div  class="modalbuttons"> 
<input  class="btn btn-default" data-toggle="modal" type="submit" value="Assign"/>
<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" name="Cancel" data-dismiss="modal" value="Cancel" />
</div>   

</form>