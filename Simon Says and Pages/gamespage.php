<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="icon" type="image/png" href="./Asset 2@3x-8.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AABC GAMES</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="./bootstrap-4.4.1.css" rel="stylesheet">
	<link href="./gamespage.css" rel="stylesheet">
	<link rel="stylesheet" href="./header.css">
	<link rel="stylesheet" href="./footer.css">
  </head>
  <body>
	  <?php 
    include("header.php");
	?>

    <div class="jumbotron jumbotron-fluid text-center">
	
       <!-- <h1 class="display-4">Some Catchy Title</h1>-->
		<img src="Asset 4@3x-8.png" alt="logo" style="margin: -50px 0px; width: 400px;">

    </div>
    <div class="container">
		<!--
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3">Click outside the blue container to select this <strong>row</strong>. Columns are always contained within a row. <strong>Rows are indicated by a dashed grey line and rounded corners</strong>. </div>
       </div>-->
       <br>
       <hr>
       <br>
       <div class="row">
          <div class="col-md-4">
			<div  id="mycard" class="card">
                <div class="card-body">
					<img src="./snakeicon.png" alt="placeholder" style="margin-left: 40px; margin-right: 40px; margin-top: 40px; margin-bottom: 40px; width: 200px;">
                   <h5 class="card-title">Snake</h5>
                   <span class="badge badge-primary">One Player</span>					
                   <!--<h6 class="card-subtitle mb-2 text-muted">One Player</h6>-->
                   <p class="card-text">Some description of the game. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					<a href="https://www2.cs.ryerson.ca/~t26lim/cps530/project/snake.html" class="btn btn-success">Play!</a>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card">
                <div class="card-body">
					<img src="./connect4icon.png" alt="placeholder" style="margin-left: 40px; margin-right: 40px; margin-top: 40px; margin-bottom: 40px; width: 200px;">
                   <h5 class="card-title">Connect 4</h5>
                   <span class="badge badge-info">Two Player</span>
                   <p class="card-text">Some description of the game. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					<a href="https://www2.scs.ryerson.ca/~abliache/connect4.php" class="btn btn-success">Play!</a>
                </div>
             </div>
             <br>
             <br/>
             
          </div>
          <div class="col-md-4">
             <div class="card">
                <div class="card-body">
					<img src="./hangmanicon.png" alt="placeholder" style="margin-left: 40px; margin-right: 40px; margin-top: 40px; margin-bottom: 40px; width: 200px;">
                   <h5 class="card-title">Hangman</h5>
                   <span class="badge badge-primary">One Player</span>
                   <p class="card-text">Some description of the game. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					<a href="https://www2.cs.ryerson.ca/~bbnguyen/hangman.php" class="btn btn-success">Play!</a>
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-4">
			<div class="card">
                <div class="card-body">
					<img src="./simonicon.png" alt="placeholder" style="margin-left: 40px; margin-right: 40px; margin-top: 40px; margin-bottom: 40px; width: 200px;">
                   <h5 class="card-title">Simons Says</h5>
                   <span class="badge badge-primary">One Player</span>
                   <p class="card-text">Some description of the game. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					<a href="https://www.cs.ryerson.ca/~c79liu/finalproject/simonsays.php" class="btn btn-success">Play!</a>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card">
                <div class="card-body">
					<img src="./tictactoeicon.png" alt="placeholder" style="margin-left: 40px; margin-right: 40px; margin-top: 40px; margin-bottom: 40px; width: 200px;">
                   <h5 class="card-title">Tic Tac Toe</h5>
                   <span class="badge badge-info">Two Player</span>
                   <p class="card-text">Some description of the game. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					<a href="https://www2.scs.ryerson.ca/~abliache/tictactoe.php" class="btn btn-success">Play!</a>
                </div>
             </div>
             <br>
             <br/>
          </div>
          <div class="col-md-4">
             <div class="card">
                <div class="card-body">
					<img src="./mathicon.png" alt="placeholder" style="margin-left: 40px; margin-right: 40px; margin-top: 40px; margin-bottom: 40px; width: 200px;">
                   <h5 class="card-title">Quick Maths</h5>
                   <span class="badge badge-primary">One Player</span>
                   <p class="card-text">Some description of the game. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					<a href="https://www2.cs.ryerson.ca/~bbnguyen/math.php" class="btn btn-success">Play!</a>
                </div>
             </div>
          </div>
       </div>
       <br/>
       <br/>
       <br>
       <hr>
		<?php
	include("footer.php");
	?>
  </body>
</html>
