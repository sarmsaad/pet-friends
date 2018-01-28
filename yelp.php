<!DOCTYPE html>
<html>
<head>
<!---meta-->
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale = 1">

    <title>Pet Friends</title>

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
  $the_username = $_SESSION['username']
  $url = 'http://127.0.0.1:5000/show?username=' . $the_username;
  $json = @file_get_contents($url);
  echo $json
?>
    
  
    
<nav class="navbar navbar-light bg-faded">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">mi.</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href = "#">Home</a></li>
      <li><a href = "blogs.html">Blogs &amp; Videos </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

</body>
</html>
