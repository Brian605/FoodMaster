<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Food Chap Chap</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Food ordering system"/>
  <meta name="author" content="Return 0;" />

   <!-- css -->
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/Style.css" rel="stylesheet"/>

</head>
<body class="container-fluid" onload="initialize();">

<h2><marquee><span class="badge">The</span><span class="label label-success">Food Master</span><span class="badge">#1</span>
</marquee></h2>

<!--Shopping cart-->
<div class="cart" id="cart">
<span class="glyphicon glyphicon-shopping-cart">
<span id="items" onclick="redirect();" class="badge">2</span></span>
</div>

<!--Navigation bar-->
<nav class="navbar navbar-inverse" role="navigation">
 <div class="navbar-header"> <button type="buttoun" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
<span class="icon-bar"></span> 
<span class="icon-bar"></span>
</button> <a class="navbar-brand " href="File1.html"><h2 class="label label-warning">Food Master</h2></a> 
</div> 
<div class="collapse navbar-collapse" id="myNavbar"> 
<ul class="nav navbar-nav"> <li class="active">
<a href="Index.html">Home</a>
</li> 
<li><a href="#">Menus</a>
</li> 
<li><a href="admin.html">Admin Panel</a>
</li> 
<li><a href="#">Gallery</a>
</li> 
<li><a href="#">Contact Us</a>
</li> 
<li class="line-divider"> </li>
<li><a href="Register.html">
<span class="glyphicon glyphicon-user"></span> Sign Up</a>
</li> 
<li><a href="login.php">
<span class="glyphicon glyphicon-log-in"></span> Login</a>
</li> 
</ul> 
</div> 
</nav>

<!--Introductory text-->
<blockquote> This is the <i class="label label-success">Food Master</i> page where you will find various<i class="label label-warning">Dishes.</i>To choose from .Everyone likes food so should you.<i class="label label-primary"> Heads Up</i></blockquote>

<?php
/*
<!--Carousel-->
<div id="myCarousel"
class="carousel slide">
 <!-- Carousel indicators-->
 <ol class="carousel-indicators">
 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
 <li data-target="#myCarousel" data-slide-to="1"></li>
 <li data-target="#myCarousel" data-slide-to="2"></li>
 </ol> 
 <!-- Carousel items -->
 <div class="carousel-inner">
 <div class="item active">
 <img src="Image/image4.jpeg" alt="First slide">
 </div>
 <div class="item">
 <img src="Image/image3.jpeg" alt="Second slide">
 </div>
 <div class="item">
 <img src="Image/image2.jpeg" alt="Third slide">
 </div>
 </div>
 <!-- Carousel nav -->
 <a class="carousel-control left" href="#myCarousel"
 data-slide="prev">&lsaquo;</a>
 <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>*/
?>
<?php
require "constants.php";
if(!mysqli_select_db($con,"POSTS")){
	die(mysqli_error($con));
}
$sql="SELECT * FROM Detail";
$stmt=$con->prepare($sql);
$stmt->bind_result($Id,$name,$caption,$prev,$curr,$url);
$stmt->execute();

while($stmt->fetch()){

echo 
'<!--Food info-->
<div class="panel">
<div class="thumbnail">
	<img src="'.$url.'" alt="Image" title="Override Ideas" class="img-responsive" width="100%">
<div class="caption">
 <i class="label label-danger">'.$name.'</i>'.$caption.'<br>
 
<span class="label label-warning">Was &nbsp;&nbsp;<del> '.$prev.'/=</del></span> <br><br>
<span class="label label-success">Now &nbsp;&nbsp;'.$curr.'/=</span> <br>	
<br>
<button type="button" role="button" id="'.$name.'" value="'.$curr.'" class="btn btn-danger" onclick="buy(this.id);">
Order Now</button>
</div>
</div>
</div>';
}

?>

<!--pager and pagination-->
<section>
<div class=" ">
	<ul class="pager" >
	<li class="glyphicon glyphicon-hand-left"></li>
	<ul class="pagination">
	<li class="active"><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
</ul>
<li class="glyphicon glyphicon-hand-right"></li></ul>
</div>
</section>	

<div class="footer">
<span class="badge">&copy;
</span>
The Food master all rights reserved

<div class="row">
<div class="col-sm-3">
<ul>
<li><a href="#">FAQS</a></li>
<li><a href="#">FAQS</a></li>
<li><a href="#">FAQS</a></li>
</ul>
</div>

</div>
</div>

<!--custom js-->
<script src="js/Events.js"></script>
<!--Latest jquery-->
<!-- Latest compiled JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
  
  