<!doctype html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="../images/igfavicon.png"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/styles.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #F1F2F2;
}
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div align="center" class="container">
	<header><a href="../index.php"><img src="../images/Imago%20Gratia.png" width="350" alt=""/></a></header>
	<div class="row">
		<div class="col-lg-12">
			<h2>Registration</h2>
		</div>
	</div>
    <br>
	<div class="row">
		<div class="col-lg-2"> </div>
		<div class="col-lg-8">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-sm-2">Full Name</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="first_name" placeholder="First Name">
					</div>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="last_name" placeholder="Last Name">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Username</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="username" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Password</label>
					<div class="col-sm-10">
						<input class="form-control" type="password" name="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2"></label> <!-- Pake angular -->
					<div class="col-sm-10">
						<input class="form-control" type="password" name="re-type" placeholder="Re-type Password">
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-2">Contacts</label>
					<div class="col-sm-5">
						<input class="form-control" type="email" name="email" placeholder="E-Mail">
					</div>
					<div class="col-sm-5">
						<input class="form-control" type="number" name="phone" placeholder="Phone Number">
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-offset-1 col-sm-11"><input type="checkbox"> I agree to the Terms and Conditions agreements <br></label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary col-sm-12 btn-lg">Register</button>
				</div>
				
			</form>
		</div>
		<div class="col-lg-2"> </div>
	</div>
</div>
<div class="panel-footer" style="padding-bottom:100px"></div>
</body>
</html>
