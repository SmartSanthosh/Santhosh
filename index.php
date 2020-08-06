<!DOCTYPE html>
<html>
<head>
	<title>login and register page</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="login-box">
 	<img src="ad.png">
    <div class="row">

    
    	<div class="col-md-6 login-left">
    		<h2 > Login Here</h2>
    		<form action="validation.php" method="post">
    		<div class="form-group">
    			<label>Username</label><br>
    			<input type="text" name="user" class="form-control" required>
    		</div>

    		<div class="form-group">
    			<label>Password</label><br>
    			<input type="password" name="password" class="form-control" required>
    		</div><br>
    		<button type="submit" class="btn btn-primary">Login</button>
    	</form>
    	</div>


    		<div class="col-md-6 login-right">
    		<h2> Register Here</h2>
    		<form action="register.php" method="post">
    		<div class="form-group">
    			<label>Username</label><br>
    			<input type="text" name="user" class="form-control" required>
    		</div><br>

    		<div class="form-group">
    			<label>Password</label><br>
    			<input type="password" name="password" class="form-control" required>
    		</div><br>
    		<button type="submit" class="btn btn-primary">Register</button>
    	</form>
    	</div>




    </div>
</div>

</div>
</body>
</html>