<?php
session_start();
//check for post data
   if(isset($_POST['email'])
   && isset($_POST['pass'])){
 //get post data
 $usermail=$_POST['email'];
 $pass=$_POST['pass'];
 
 //connect to db
 require 'constants.php';
 if(!mysqli_select_db($con,"POSTS")){
	die(mysqli_error($con));
}
 //fetch statement
 $sql="SELECT * FROM Profile";

//prepare statement
$stmt=$con->prepare($sql);
//execute statement
$stmt->execute();
//bind results
$stmt->bind_result($Id,$usern,$email,$phone,$passw,$url,$about);
//loop the dynaset
while($stmt->fetch()){
	//check for login
	echo $usern;
if($passw==$pass && $email==$usermail){
	//login ok
	//create new session
//store session data
$_SESSION["user"]=$usern;
$_SESSION["email"]=$email;
$_SESSION["phone"]=$phone;
$_SESSION["img"]=$url;

$response="ok";
break;
}
}

if($response=="ok"){	
//go to homepage
header("location:Index.php");
}
else{
//destroy all sessions
session_destroy();

//Go back to login
echo'<script>
alert("The details are incorrect");
window.location.replace("login.php");
</script>'; 	}

   }
?>