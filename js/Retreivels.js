function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

      return true;
}
function validateloanaddForm(){
var a=document.forms["createloan"]["tool_id"].value;
if (a==null || a=="")
  {
  alert("Please select a tool");
  return false;
  }
    
var b=document.forms["createloan"]["tool_quantity"].value;
if (b==null || b=="")
  {
  alert("Please enter the quantity");
  return false;
  }

var c=document.forms["createloan"]["tool_unit"].value;
if (c==null || c=="")
  {
  alert("Please select the unit");
  return false;
  }
var d=document.forms["createloan"]["teacher_id"].value;
if (d==null || d=="")
  {
  alert("Please select the teacher");
  return false;
  }
        
    
}
function validatetooladdForm(){
var a=document.forms["addtool"]["tool_name"].value;
if (a==null || a=="")
  {
  alert("Please enter the tool name");
  return false;
  }
    
var b=document.forms["addtool"]["tool_type"].value;
if (b==null || b=="")
  {
  alert("Please select the tool type");
  return false;
  }

var c=document.forms["addtool"]["tool_quantity"].value;
if (c==null || c=="")
  {
  alert("Please enter the quantity");
  return false;
  }
var d=document.forms["addtool"]["tool_unit"].value;
if (d==null || d=="")
  {
  alert("Please select the unit");
  return false;
  }

var e=document.forms["addtool"]["tool_location"].value;
if (e==null || e=="")
  {
  alert("Please select the location");
  return false;
  }    
    
    
    
}   
function validateTeacherForm()
{
    
var a=document.forms["addteacher"]["teacher_name"].value;
if (a==null || a=="")
  {
  alert("Please enter the teacher name");
  return false;
  }
    
var b=document.forms["addteacher"]["teacher_phone"].value;
if (b==null || b=="")
  {
  alert("Please enter the teacher phone");
  return false;
  }

var c=document.forms["addteacher"]["teacher_email"].value;
if (c==null || c=="")
  {
  alert("Please enter the teacher email");
  return false;
  }


}
function validateReturntoolsForm(){
var a=document.forms["returnedtools"]["unit_id"].value;
if (a==null || a=="")
  {
  alert("Please select a unit");
  return false;
  }
    
var b=document.forms["returnedtools"]["location_id"].value;
if (b==null || b=="")
  {
  alert("Please select a location");
  return false;
  }    
    
}


function validateStudentForm()
{
    
var a=document.forms["addstudent"]["student_name"].value;
if (a==null || a=="")
  {
  alert("Please enter the student name");
  return false;
  }
    
var b=document.forms["addstudent"]["student_phone"].value;
if (b==null || b=="")
  {
  alert("Please enter the student phone");
  return false;
  }

var c=document.forms["addstudent"]["student_email"].value;
if (c==null || c=="")
  {
  alert("Please enter the student email");
  return false;
  }
var d=document.forms["addstudent"]["student_level"].value;
if (d==null || d=="")
  {
  alert("Please select the level");
  return false;
  }

var e=document.forms["addstudent"]["chapter_id"].value;
if (e==null || e=="")
  {
  alert("Please select the chapter");
  return false;
  }

}
function validateunitForm()
{
 
var a=document.forms["addunit"]["unit_name"].value;
if (a==null || a=="")
  {
  alert("Please enter the unit name");
  return false;
  }
}
function validatelocForm()
{   
var a=document.forms["addlocation"]["location_name"].value;
if (a==null || a=="")
  {
  alert("Please enter the location name");
  return false;
  }
/*
var b=document.forms["addlocation"]["teacher_id"].value;
if (b==null || b=="")
  {
  alert("Please select a teacher");
  return false;
  }
*/
var c=document.forms["addlocation"]["unit_id"].value;
if (c==null || c=="")
  {
  alert("Please select a unit");
  return false;
  }
}

function validatelevelForm()
{   
var a=document.forms["addlevel"]["level_name"].value;
if (a==null || a=="")
  {
  alert("Please enter the level name");
  return false;
  }
}

function validatechptForm()
{   
var a=document.forms["addchapter"]["chapter_name"].value;
if (a==null || a=="")
  {
  alert("Please enter the chapter name");
  return false;
  }
}


function validatechapterForm()
{   
var a=document.forms["addchapter"]["chapter_name"].value;
if (a==null || a=="")
  {
  alert("Please enter the chapter name");
  return false;
  }   
var b=document.forms["addchapter"]["level_id"].value;
if (b==null || b=="")
  {
  alert("Please enter the level name");
  return false;
  }   
var c=document.forms["addchapter"]["chapter_duration"].value;
if (c==null || c=="")
  {
  alert("Please enter the chapterduration");
  return false;
  }
}

$(document).ready(function(){  

			$("#level_chosen").click(function(){
						var level = $(this).val();
						  
						if(!level == ""){
							$.post(
							"chaptersRetreival.php",
							{level:level}
							,function(data){
									  $("#chapters_has").html(data);
                                      //$("#chapters_has").html(data).selectpicker('refresh');
							})
									
							
						}
				});	
				
				$("#level_chosen0").click(function(){
						var level = $(this).val();
						  
						if(!level == ""){
							$.post(
							"chaptersRetreival.php",
							{level:level}
							,function(data){
									$("#chapters_has0").html(data);
							})
									
							
						}
				});	

					
				$("#level_chosen1").click(function(){
						var level = $(this).val();
						  
						if(!level == ""){
							$.post(
							"chaptersRetreival.php",
							{level:level}
							,function(data){
									$("#chapters_has1").html(data);
							})
									
							
						}
				});	
    
				$("#level_chosen2").click(function(){
						var level = $(this).val();
						  
						if(!level == ""){
							$.post(
							"chaptersRetreival.php",
							{level:level}
							,function(data){
									$("#chapters_has2").html(data);
							})
									
							
						}
				});					
                
    
                $("#level_chosen4").click(function(){
						var level = $(this).val();
						  
						if(!level == ""){
							$.post(
							"chaptersRetreival.php",
							{level:level}
							,function(data){
									$("#chapters_has4").html(data);
							})
									
							
						}
				});		
    
                $("#level_chosen5").click(function(){
						var level = $(this).val();
						  
						if(!level == ""){
							$.post(
							"chaptersRetreival.php",
							{level:level}
							,function(data){
									$("#chapters_has5").html(data);
							})
									
							
						}
				});	                
    
                $("#level_chosen6").click(function(){
						var level = $(this).val();
						  
						if(!level == ""){
							$.post(
							"chaptersRetreival.php",
							{level:level}
							,function(data){
									$("#chapters_has6").html(data);
							})
									
							
						}
				});	  
        
                $("#level_chosen7").click(function(){
						var level = $(this).val();
						  
						if(!level == ""){
							$.post(
							"chaptersRetreival.php",
							{level:level}
							,function(data){
									$("#chapters_has7").html(data);
							})
									
							
						}
				});	  
    
    
				$("#unit_chosen").click(function(){
						var location = $(this).val();
						  
						if(!location == ""){
							$.post(
							"loactionRetreival.php",
							{location:location}
							,function(data){
									$("#Locs_has").html(data);
							})
									
							
						}
				});	
				$("#unit_chosen1").click(function(){
						var location = $(this).val();
						  
						if(!location == ""){
							$.post(
							"loactionRetreival.php",
							{location:location}
							,function(data){
									$("#Locs_has1").html(data);
							})
									
							
						}
				});
    
    				$("#unit_chosen3").click(function(){
						var location = $(this).val();
						  
						if(!location == ""){
							$.post(
							"loactionRetreival.php",
							{location:location}
							,function(data){
									$("#Locs_has3").html(data);
							})
									
							
						}
				});
    				$("#unit_chosen4").click(function(){
						var location = $(this).val();
						  
						if(!location == ""){
							$.post(
							"loactionRetreival.php",
							{location:location}
							,function(data){
									$("#Locs_has4").html(data);
							})
									
							
						}
				});
    
        				$("#unit_chosen5").click(function(){
						var location = $(this).val();
						  
						if(!location == ""){
							$.post(
							"loactionRetreival.php",
							{location:location}
							,function(data){
									$("#Locs_has5").html(data);
							})
									
							
						}
				});
    
        				$("#unit_chosen6").click(function(){
						var location = $(this).val();
						  
						if(!location == ""){
							$.post(
							"loactionRetreival.php",
							{location:location}
							,function(data){
									$("#Locs_has6").html(data);
							})
									
							
						}
				});        				
                       
    
    


        

        
            
});