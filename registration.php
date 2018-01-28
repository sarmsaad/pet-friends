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

    <title>Registration</title>

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
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = ($_REQUEST['username']); // removes backslashes
		$email = ($_REQUEST['email']);
		$password = ($_REQUEST['password']);

		//send a request
        $url = 'http://127.0.0.1:5000/signup?username=' . $username . '&password=' . $password . '&location=' . $email;
        $json = @file_get_contents($url);
        $obj = json_decode($json);
        //$bool = $obj->{'signup'};

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";

        if($bool = "successful"){
            echo "<canvas id='homebg'> </canvas><div class='jumbotron' id = 'hero'><h1>You are registered successfully.</h1><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class= "container-fluid" id = "logreg">
<div class = 'row' >

	<div class  = "col-4" id  = "dog">
		<img src="dog1.png" class="img-responsive" alt="dog" style = "float: left">
	</div>

	<div class  = "col-6">
		<div class="form" id = "reg">
		<h1 id = 'logo'>mi.</h1>
		<form name="registration" action="" method="post">
        <div class  = "row">
		  <input type="text" name="username" placeholder="Username" required /></div>
        <div class  = "row">
		  <input type="email" name="email" placeholder="Email" required />
        </div>
        <div class = "row">
		<input type="password" name="password" placeholder="Password" required />
        </div>
        <div class = "row">
        <input type="Enter location" name="location" placeholder="location" required /> <p> or</p>

        <button class  = "btn btn-secondary" onclick="getLocation()">Get Location</button>

        <p id="demo"></p>
        </div>
		<input class = 'btn btn-primary' type="submit" name="submit" value="Register" id = "regg"/>
		</form>
		<p>Already a member? <a href='login.php'>Login Here</a>|<a href='index.html'>Home</a></p>
		</div>
	</div>

</div>
</div>
<?php } ?>
<script type="text/javascript">
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
            //if not supported give an input form
        }
    }

    function showPosition(position) {
        //x.innerHTML = "Latitude: " + position.coords.latitude + 
        //"<br>Longitude: " + position.coords.longitude;
        //post the latitudes and longitude
        //var position.coords.latitude
        //var position.coodrs.longitude
    }
</script>
</body>
</html>
