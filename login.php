<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
?>
<!DOCTYPE html>
<html>
<head>
	<!---meta-->
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale = 1">

    <title>Login</title>

    <link rel="icon" href="./images/icon.png">
    <!--bootstrap-->

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel='stylesheet' type='text/css' href='style.css'/>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src  = "js/script.js"></script>
   
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
    $url = 'http://127.0.0.1:5000/signup?username=' . $username . '&password=' . $password;
    $json = @file_get_contents($url);
    $obj = json_decode($json);
    $bool = $obj->{'login'};

        if($bool == "successful"){
			$_SESSION['username'] = $username;
			header("Location: member.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
        ?>
            <div class= "container-fluid" id = "logreg">
				<div class = 'row' >

					<div class  = "col-4" id  = "dog">
						<img src="dog.png" class="img-responsive" alt="dog" style="float:left">
					</div>

					<div class  = "col-6">
						<div class="form-group" id = "reg">
						<h1 id  = 'logo'>mi.</h1>
						<form action="" method="post" name="login">
						<div class  = 'row'>
							<input type="text" name="username" placeholder="Username" required /></div>
						<div class  = 'row'>
							<input type="password" name="password" placeholder="Password" required />
						</div>
						<input class = 'btn btn-primary' name="submit" type="submit" value="Login" id="regg" />
						</form>
						<p>Not registered yet? <a href='registration.php'>Register Here</a> | <a href='index.html'>Home</a></p>
						</div>
					</div>

			</div>
			</div>
        <?php
     }
?>

</body>
</html>
