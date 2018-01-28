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
    
    <audio controls>
		<source src="Beautiful_and_Relaxing_Piano_Music.mp3" type="audio/mp3">
	Your browser does not support the audio element.
	</audio>
    
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

<div class  = "row">
  <div class  = "col-md-4">
    <button id="close-image" onclick='eatMode()'><img src="FeedButton.png"></button>
  </div>

  <div class = "col-md-4">
    <h1 >Welcome Back!</h1>
    <canvas id='canvas'></canvas><br />
    <!--<button onclick='moveLeft()'>Left</button>
    <button onclick='moveRight()'>Right</button>-->
  </div>



  <div class  = "col-md-4">
    <h1>My Journal</h1>
    <form id = 'journal'>
      <div class="form-group">
          <label for="date">Today's Date</label>
            <input type="datetime-local" class="form-control" name="date">
      </div>
      <div class="form-group">
          <label for="message-text" class="form-control-label">Your thoughts:</label>
          <textarea class="form-control" id="message-text"></textarea>
          </div>
    </form>
    <button type="button" class="btn btn-primary">Finished!</button>
  </div>
</div>






<script>
$('#journal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
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
