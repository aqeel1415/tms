<?php            


$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);


	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{

			$location="photos/" . $_FILES["image"]["name"];
			$toolid=$_POST['toolimage'];
            
            //remove the old one
            $result=mysqli_query($connection,"Select tool_image from tool WHERE tool_id='$toolid'");
            $row = mysqli_fetch_assoc($result);
            $old = $row['tool_image'];
			unlink($old);
			
            move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
            
			if(!$update=mysqli_query($connection,"UPDATE tool SET tool_image = '$location' WHERE tool_id='$toolid'")) {
			
            echo mysql_error();
				
				
			}
			else{
			
			echo '<script> location.replace("tools.php"); </script>';
			exit();
			}
			}
	}


?>