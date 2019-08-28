<?php
//check post data
if(isset($_POST['name'])&& isset($_POST['caption'])&& isset($_POST['prev'])&& 
isset($_POST['curr'])&&
isset($_FILES['fod'])){

require 'constants.php';

//start create database
$sql="CREATE DATABASE IF NOT EXISTS POSTS";

$query=mysqli_query($con,$sql);
if(!$query){
	die(mysqli_error($con));
}

echo "<br>Database created successfully";

//end create database

//select database
if(!mysqli_select_db($con,"POSTS")){
	die(mysqli_error($con));
}
//post data
$name=strip_tags(stripslashes(htmlspecialchars($_POST['name'])));

$caption=strip_tags(stripslashes(htmlspecialchars($_POST['caption'])));

$prev=strip_tags(stripslashes(htmlspecialchars($_POST['prev'])));

$curr=strip_tags(stripslashes(htmlspecialchars($_POST['curr'])));

//image data
$imge=$_FILES['fod']['name'];
$temponame=$_FILES['fod']['tmp_name'];

$new=round(time(true)*1000);
$extension=end(explode(".",$_FILES['fod']['name']));
$newName="posts/".$new.".".$extension;

//create table
$sql="CREATE TABLE IF NOT EXISTS Detail(Id INT (14) NOT NULL AUTO_INCREMENT PRIMARY KEY,Name TEXT (25) NOT NULL,Capt VARCHAR(1200) NOT NULL,Prev INT(10) NOT NULl,Curr INT (10) NOT NULL,ImageUrl VARCHAR (30)NOT NULL)";

if(!mysqli_query($con,$sql)){
	die(mysqli_error($con));
}

echo "<br>table detail created successfully";

//Insert data
$sql="INSERT INTO Detail(Name,Capt,Prev,Curr,ImageUrl) VALUES('$name','$caption','$prev','$curr','$newName')";

if(!mysqli_query($con,$sql)){
	die(mysqli_error($con));
}
echo "data inserted";

/*/upload image and check for errors*/
if(!move_uploaded_file($temponame,$newName)){
	die(mysqli_error($con));
}
print("file uploaded successfully");
//if(!$=ame: ".$n."<br> Password: ".

header("location:Index.php");
}else{
echo "One or more fields not submitted";
}
?>