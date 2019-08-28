<?php
   /*Check for posted data and files*/
 if(isset($_POST['user']) && 
isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['pass1']) && isset($_FILES['image'])){
/*data available get the post data*/	

//user data
$usern=$_POST['user'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass=$_POST['pass1'];
	
//profile image
$img=$_FILES['image']['name'];//image name
$temp=$_FILES['image']['tmp_name'];//temporary name
$extension=end(explode('.',$img));// image extension
$currtime=round(time(true)*1000);//A random time
$newName="Profile/".$currtime.".".$extension;

//connect to database
require "constants.php";
if(!mysqli_select_db($con,"POSTS")){
	die(mysqli_error($con));
}

//Create Table Statement
$sql="CREATE TABLE IF NOT EXISTS Profile(Id INT (10) NOT NULL AUTO_INCREMENT PRIMARY KEY,name VARCHAR (8) NOT NULL, email VARCHAR(30) NOT NULL,phone VARCHAR (10) NOT NULL,password VARCHAR (16) NOT NULL,imageurl VARCHAR (50) NOT NULL,about VARCHAR (125) NOT NULL)";

//execute the query
$res=mysqli_query($con,$sql);

//Check for success
if(!$res){
	//an error occured
	die("Cannot create table ".mysqli_error($con));
	exit;
}
//table created successfully

//check user existence

$row=mysqli_num_rows(mysqli_query($con,"SELECT * FROM Profile WHERE email='$email'"));

$row1=mysqli_num_rows(mysqli_query($con,"SELECT * FROM Profile WHERE phone='$phone'"));

if($row>0 ||$row1>0){
	echo '<script>
	alert("This phone or email already exists");
	window.location.replace("Register.html");
	</script>';
exit;
}	


//default about text
$about="Hey this is me ".$usern;

//Insert data statement
$sql="INSERT INTO Profile(
name,email,phone,password,imageurl,about) VALUES('$usern','$email','$phone','$pass','$newName','$about')";
/*insert the data and check for success*/
if(!mysqli_query($con,$sql)){
	//error
	die("An error occured ".mysqli_error($con));
}
/*upload the image to the server*/
move_uploaded_file($temp,$newName);

//Everything ok go to login
header("location:login.php");
	
}
else
{/*One or more data not available redirect to register*/

header("location:Register.html");
	
}
?>