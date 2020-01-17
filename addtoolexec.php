<?php 

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);


/*	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}
    else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

    }
    if ($image_size==FALSE) {
	echo "That's not an image!";
	}
    else{	*/	
    move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);		
    $tool_image="photos/" . $_FILES["image"]["name"];		
    $tool_name =$_POST['tool_name'];
    $tool_type =$_POST['tool_type'];
    $tool_loca =$_POST['tool_location'];
    $tool_unit =$_POST['tool_unit'];
    $tool_code_id =$_POST['tool_code_id'];
    $tool_sn =$_POST['tool_sn'];
    $tool_quantity =$_POST['tool_quantity'];
    $tool_remark =$_POST['tool_remark'];
    
   // }

    //add the tool to the tool table
    mysqli_query($connection,"INSERT INTO tool ( tool_name , code_id , tool_sn ,	tool_type 	,	tool_image ,	tool_quantity ,	tool_remark)
            VALUES ( '$tool_name', '$tool_code_id', '$tool_sn'   , '$tool_type'   , '$tool_image' , '$tool_quantity'  , '$tool_remark' )" );



    //add the tool to the specified unit & location
    mysqli_query($connection,"INSERT INTO locationtools ( unit_id  , location_id , tool_id , qty ) VALUES ($tool_unit , $tool_loca,(SELECT tool_id from tool where tool_name ='$tool_name' and  code_id ='$tool_code_id' and  tool_color='$tool_color' and tool_status='$tool_status'  and tool_type='$tool_type'  and tool_image='$tool_image' and tool_quantity='$tool_quantity'  and tool_remark='$tool_remark'),$tool_quantity)");


   include 'quantity_recalculator.php';
   include 'check_sufficiency.php';
   echo '<script> location.replace("tools.php"); </script>'; 
   exit();

?>
