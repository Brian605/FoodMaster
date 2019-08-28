<?php
session_start();
if (isset($_SESSION['user'])){
/*go to main already logged*/	header("location:Index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
<title>Log In</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Food ordering system"/>
  <meta name="author" content="Return 0;" />
  
   <!-- css -->
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/Style.css" rel="stylesheet" />
   </head>
   <body class="container">
 <form class="container" method="POST" action="sign.php" name="sign">
 <h4 class="page-header" >
 Log In to your Account.</h4>
 <span id="status"></span>
 
 <!-- Input Fields-->
 <div class="form-group">
 <label for="email">User Email: </label>
 <input type="email" required class="form-control" placeholder="registered email" name="email">
 </div> 
 
  <div class="form-group">
 <label for="pass">PassWord: </label>
 <input type="password" name="pass" required class="form-control" placeholder="your password">
 </div>
 
 <div class="form-group">
 <button type="submit" role="button" class="btn btn-primary">Sign In</button>
 <br><br>
 <span class="divider">
 No account yet?</span>
 <button type="button" role="button" class ="btn btn-link" onclick="gotoRegister();">Register Here</button><br><br>
<span class="reset"><a href="#">Forgot Password?</a></span>
 
 </form> 
  
<script src="js/authfuncs.js" ></script>   
   </body>
</html>