<?php
/*
Author: Kelly Zhang
*/
$title = 'Home';
include("/layout/header.php"); ?>

<canvas id="homebg"></canvas>

<div class  = "jumbotron text-center">
	<h1 id  = "title">Pet Friends</h1>
	<h4 id = 'Tagline'>Tagline</h4>
	<a href="login.php" class="btn btn-primary showcase-seq" role="button" id = "login">Login</a>
	<a href="registration.php" class="btn btn-primary showcase-seq" role="button" id = "signup">Sign Up!</a>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bubbly-bg@0.2.3/dist/bubbly-bg.js"></script>
<script>
	bubbly({canvas: document.getElementById("homebg")});
  	bubbly({
	    colorStart: "#fff4e6",
	    colorStop: "#ffe9e4",
	    blur: 1,
	    compose: "source-over",
	    bubbleFunc: () => `hsla(${Math.random() * 50}, 100%, 50%, .3)`
	});

	$(document).ready(function(){
	    var logo = document.getElementById("title");
	    var tagline  = document.getElementById("tagline");
	    var one = document.getElementById("login");
	    var two = document.getElementById("signup");
	    TweenLite.to(logo, 1, {left:"632px"});
	    TweenLite.to(logo, 1, {left:"632px", delay = 1});
	    TweenMax.staggerTo([one, two], 1, {left:"632px", delay  = 3});
	}

</script>


<?php
	include("/layout/footer.php"); 
?> 
