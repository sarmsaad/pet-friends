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
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){

		$username = stripslashes($_REQUEST['username']); // removes backslashes
		//$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		//$password = mysqli_real_escape_string($con,$password);

	//Checking is user existing in the database or not

    //send a request
    $url = 'http://127.0.0.1:5000/login?username=' . $username . '&password=' . $password;
    $json = @file_get_contents($url);
    $obj = json_decode($json);
    $bool = $obj->{'login'};

        if($bool == "successful"){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
        ?>
            <div class= "container-fluid" id = "logreg">
				<div class = 'row' >

					<div class  = "col-4">
					</div>

					<div class  = "col-6">
						<div class="form">
						<h1 id  = 'logo'>mi.</h1>
						<form action="" method="post" name="login">
						<input type="text" name="username" placeholder="Username" required />
						<input type="password" name="password" placeholder="Password" required />
						<input name="submit" type="submit" value="Login" />
						</form>
						<p>Not registered yet? <a href='registration.php'>Register Here</a>|<a href='index.html'>Home</a></p>
						</div>
					</div>

			</div>
			</div>
        <?php
     }
?>

</body>
</html>
