<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AABC GAMES</title>

    <!-- Bootstrap -->
    <link href="./bootstrap-4.4.1.css" rel="stylesheet">
	<link href="./gamespage.css" rel="stylesheet">
	<link rel="stylesheet" href="./header.css">
	<link rel="stylesheet" href="./footer.css">
<link rel="stylesheet" href="./highscores.css">
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

    <div class="jumbotron jumbotron-fluid text-center">
	
       <h1 class="display-4">Highscores</h1>

    </div>
    <div class="container">
		<!--
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3">Click outside the blue container to select this <strong>row</strong>. Columns are always contained within a row. <strong>Rows are indicated by a dashed grey line and rounded corners</strong>. </div>
       </div>-->
		<br>
		<br>
		<p>Snake</p>
		<img src="highscores.png" alt="logo" style="width: 100%;">
       <br>
       <hr>
       <br>
       <br/>
       <br/>
       <br>
       <hr>
		<?php
	include("footer.php");
	?>
  </body>
</html>
