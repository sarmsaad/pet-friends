<!DOCTYPE html>
<html>
<head>
<!---meta-->
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale = 1">

    <title>Mindfuk</title>

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
?>
  
  
    
<nav class="navbar navbar-light bg-faded">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Mindful</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href = "#">Home</a></li>
      <li><a href = "blogs.html">Blogs &amp; Videos </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class  = "row">
  <div class  = "col-md-2" id  = "righttbar">
    <img src = "foodCounter.png" id = "count">
    <button id="close-image" onclick='eatMode()'><img src="FeedButton.png"></button>
  </div>

  <div class = "col-md-4">
    <h1 >Welcome Back!</h1>
    <canvas id='canvas'></canvas><br />
    <!--<button onclick='moveLeft()'>Left</button>
    <button onclick='moveRight()'>Right</button>-->
  </div>



  <div class  = "col-md-6">
    <h1>My Journal</h1>
    <form id = 'journal'>
      <div class="form-group">
          <label for="date">Today's Date</label>
            <input type="datetime-local" class="form-control" name="date" onkeyup="formChanged()" onchange="formChanged()">
      </div>
      <div class="form-group">
          <label for="message-text" class="form-control-label">Your thoughts:</label>
          <textarea class="form-control" id="message-text" name = "writing" onkeyup="formChanged()" onchange="formChanged()"></textarea>
          </div>
          <label for="date">Signature (username)</label>
            <input type="text" class="form-control" name="user" onkeyup="formChanged()" onchange="formChanged()">
    </form>
    <div id  = "fromm">
      <button type="button" class="btn" id  = "formbtn">Finished!</button>
      <audio controls>
      <source src="Beautiful_and_Relaxing_Piano_Music.mp3" type="audio/mp3">
      </audio>
    </div>
  </div>
</div>






<script>
$('#journal').on('show.bs.modal', function (event) {
  function formChanged() {
    var name = document.getElementsByName("user")[0].value; // 
    var journal = document.getElementsByName("writing")[0].value;
    var date = document.getElementsByName("date")[0].value; // Extract info from data-* attributes
}

})

// Img Window
    var canvasWidth = 650; // dog size is 432
    var canvasHeight = 450;

    // Sprite Sheet Size
    var spriteWidth = 3456; 
    var spriteHeight = 864; 

    // Sprite Sheet rows v cols
    var rows = 2; 
    var cols = 8; 

    // Command row
    var trackRest = 0; 
    var trackEat = 1;

    // img size
    var width = spriteWidth/cols; 
    var height = spriteHeight/rows; 

    var curFrame = 0; 
    var frameCount = 8; 

    // position where the frame will be drawn on site
    var x=0;
    var y=0; 

    var srcX=0;
    var srcY=0; 

    var rest = true;
    var eat = false;

    // ate variable to end eating
    var ate = 0;

    var canvas = document.getElementById('canvas');

    canvas.width = canvasWidth;
    canvas.height = canvasHeight; 

    var ctx = canvas.getContext("2d");

    var character = new Image();
    character.src = "SpriteSheet.png";

    function updateFrame(){
      curFrame = ++curFrame % frameCount; 
      srcX = curFrame * width;
      srcY = trackRest * height;

      if(eat) {
        if(ate != 8) {
          srcY = trackEat * height;
          ate = ate + 1;
        }
        else {
          restMode();
          ate = 0;
        }
      }
      if(rest) {
        srcY = trackRest * height;
      }

      ctx.clearRect(x,y,width,height);
    }

    function draw(){
      updateFrame();
      ctx.drawImage(character,srcX,srcY,width,height,x,y,width,height);
    }

    function restMode() {
      eat = false;
      rest = true;
    }

    function eatMode() {
      eat = true;
      rest = false;
    }
  
    setInterval(draw,100);
</script>
</body>
</html>
