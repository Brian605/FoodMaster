<?php
session_start();
$name=stripslashes(htmlspecialchars($_POST['name']));

$quot=stripslashes(htmlspecialchars($_POST['quot']));

require "constants.php";

if(!mysqli_select_db($con,"POSTS")){
	die(mysqli_error());
}

$sql="CREATE TABLE IF NOT EXISTS Orders(Id INT (10) NOT NULL AUTO_INCREMENT PRIMARY KEY,email VARCHAR (30) NOT NULL,food VARCHAR (25) NOT NULL, price INT (10) NOT NULL)";

if(!mysqli_query($con,$sql)){
	die(mysqli_error($con));
}

//check cookie
if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];

	
	if(!mysqli_query($con,"INSERT INTO Orders(email,food,price) VALUES('$email','$name','$quot')")){
die(mysqli_error($con))		;
	}else{$response="Failed. connection error";}
	
	$response="success";
	
}else{
	$response="Please log in first";
	//header("location:login.php");
}

echo $response;

?> 