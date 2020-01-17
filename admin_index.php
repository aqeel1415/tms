<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
$('.error-page').hide(0);

$('.login-button , .no-access').click(function(){
  $('.login').slideUp(500);
  $('.error-page').slideDown(1000);
});

$('.try-again').click(function(){
  $('.error-page').hide(0);
  $('.login').slideDown(1000);
});
</script>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
<link type="text/css" rel="stylesheet" href="css/login.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tools Tracking System</title>

    
<script type="text/javascript">
function validateForm()
{

var y=document.forms["login"]["user"].value;
var a=document.forms["login"]["password"].value;
if ((y==null || y==""))
  {
  alert("you must enter your username");
  return false;
  }
  if ((a==null || a==""))
  {
  alert("you must enter your password");
  return false;
  }
 

}
</script>
<link type="text/css" rel="stylesheet" href="css/main.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
</head>

<body>
    



    
<div class="login">
          <div class="login-header">
            <h1>Login</h1>
          </div>
        <div class="login-form">
            <form id="login" action="login.php" method="post">
                <p>
               <h3>Username:</h3>
             <input type="text"  name="user" id="user" value="" placeholder="Username" class="radius2" />
                </p>
                <p>
                <h3>Password:</h3>
                <input type="password"  name="password" id="password"  placeholder="Password" class="radius2" />
                </p>
                <p>
                <input  class="btn btn-default" data-toggle="modal" type="submit" value="login" />
                </p>
            </form>
        </div><!--loginform-->
    </div><!--loginboxinner-->
 <!--loginbox-->



   
</body>
</html>
