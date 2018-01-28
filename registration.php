<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<!--<?php
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = ($_REQUEST['username']); // removes backslashes
		$username = ($con,$username); //escapes special characters in a string
		$email = ($_REQUEST['email']);
		$email = ($con,$email);
		$password = ($_REQUEST['password']);
		$password = ($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = 
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>-->
<div class= "container-fluid" id = "logreg">
<div class = 'row' >

	<div class  = "col">
		<img src="dog.png" class="img-responsive" alt="dog" style = "float: left">
	</div>

	<div class  = "col">
		<div class="form" id = "reg">
		<h1 id = 'logo'>mi.</h1>
		<form name="registration" action="" method="post">
		<input type="text" name="username" placeholder="Username" required />
		<input type="email" name="email" placeholder="Email" required />
		<input type="password" name="password" placeholder="Password" required />
		<input type="submit" name="submit" value="Register" />
		</form>
		<p>Already a member? <a href='login.php'>Login Here</a>|<a href='index.html'>Home</a></p>
		</div>
	</div>

</div>
</div>
<?php } ?>
</body>
</html>
