<?php
	using("connect.php");
	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM registered natural join user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row		
      if($count == 1) {
         session_register("username");
         $_SESSION['login_user'] = $username;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!doctype html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="images/igfavicon.png"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="container">
<header class="text-center"><img src="images/Imago Gratia.png" width="350" alt=""/></header>
<br><br><br><input style="width: 200px" name="useremail" type="textfield" id="textfield" placeholder="Username/E-Mail">
<br><br><input style="width: 200px" name="password" type="password" id="password" placeholder="Password">
<br><br><br>
<input type="button" name="login" id="login" value="Login">
<br>
<br>
<br><br>
<br><p class="text-center">Doesn't have an account yet? SIGN UP</p>
<br><p class="text-center">About Us | News | Customer Service</p>
</div>
</body>
</html>
