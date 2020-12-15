<!doctype html>
<html>
  <head>
	<link rel="icon" type="image/png" href="./Asset 2@3x-8.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AABC GAMES - Simon Says</title>
    <link rel="stylesheet" href="./simonsays.css">
	<script src="./simonsays.js"></script>
	<link rel="stylesheet" href="./header.css">
	<link rel="stylesheet" href="./footer.css">
    <!-- Bootstrap -->
    <link href="./bootstrap-4.4.1.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
  </head>
<body>
	<?php 
    include("header.php");
	?>
	<div class="container">
	  <div id="gamebox">
		<h1> Press the red button to start the game </h1>
		  <br>
        <div id="board">
			<br>
            <div class="key" id="green"></div>
            <div class="key" id="red"></div>
            <div class="key" id="yellow"></div>
            <div class="key" id="blue"></div>
            
            <div id="innerCircle">
                <div id="start">
                    <p id="simon">Simon <br> Says</p>
                    <span id="score">0</span>
                    <span id="onOff" onclick="toggleGame()"></span>
                </div>
            </div>
        </div>
        <!--<button onclick="this.style.borderColor == 'green' ? this.style.borderColor = 'red' : this.style.borderColor = 'green'">
        </button>-->
		  </div>
		  </div>
	<?php
	include("footer.php");
	?>
</body>
</html>
