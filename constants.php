<?php
$server="localhost";
$user="root";
$password="";

$con=new mysqli($server,$user,$password);

if(!$con){
	die(mysqli_error($con));
}
?>