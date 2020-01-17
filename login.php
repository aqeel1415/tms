<?php
	//Start session
	session_start();
	
	//Connect to mysql server
	$link = mysqli_connect("localhost","root","","ats_db");
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysqli_select_db($link,"ats_db");
	if(!$db) {
		die("Unable to select database");
	}
        
        
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
        $link = mysqli_connect("localhost","root","","ats_db");
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($link,$str);
	}
		

	
	//Sanitize the POST values

	$login = clean($_POST['user']);
	$password = clean($_POST['password']);

	$login = $_POST['user'];
	$password = $_POST['password'];



	//Create query
	$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";
	$result=mysqli_query($link,$qry);



	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['user_id'];
                        $_SESSION['SESS_FIRST_NAME'] = "admin";
			session_write_close();
			echo '<script> location.replace("index.php"); </script>';
			exit();

		}
	}else {
		die("Query failed");
	}
?>