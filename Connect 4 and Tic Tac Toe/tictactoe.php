<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Tic-Tac-Toe</title>
  <meta charset="UTF-8"/>

  <link rel="stylesheet" href="https://www.cs.ryerson.ca/~c79liu/finalproject/header.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="tttstyle.css" />
</head>

<!-- setup for the game  -->
<body style="text-align: center; background-color: grey;">
  <?php 
  include("header.php");
  ?>

  <!-- game container, houses the game board within it -->
  <h1></h1><br><h1>2-Player,<br> Tic-Tac-Toe!</h1>
  <div class="gamecontainer">
    <div class="grid">
      <div id="sq1" class="square" onclick="occupy('sq1',1)"></div>
      <div id="sq2" class="square" onclick="occupy('sq2',2)"></div>
      <div id="sq3" class="square" onclick="occupy('sq3',3)"></div>
      <div id="sq4" class="square" onclick="occupy('sq4',4)"></div>
      <div id="sq5" class="square" onclick="occupy('sq5',5)"></div>
      <div id="sq6" class="square" onclick="occupy('sq6',6)"></div>
      <div id="sq7" class="square" onclick="occupy('sq7',7)"></div>
      <div id="sq8" class="square" onclick="occupy('sq8',8)"></div>
      <div id="sq9" class="square" onclick="occupy('sq9',9)"></div>
    </div>
  </div>
  <div id="winner" class="winner"></div><br>
  <button id="reset" class="reset" onclick="RESET()">Restart game</button>
  <?php 
    include("footer.php");
  ?>


  <!-- script that governs the game logic -->
  <script>
    // every single win condition
    var W1 = [1,2,3];
    var W2 = [4,5,6];
    var W3 = [7,8,9];
    var W4 = [1,4,7];
    var W5 = [2,5,8];
    var W6 = [3,6,9];
    var W7 = [1,5,9];
    var W8 = [3,5,7];

    // user arrays for keeping track of user's moves
    var XMOVES = [];
    var OMOVES = [];

    var WIN = false;

    var turn = 1;
    var wturn = 2;

    // the function ''occupy'' is the main function of the game. it places 
    // the user's pieces, keeps track of turn, and checks for any wins after placement.
    function occupy(ID,sqrI) {
      var sqr = document.getElementById(ID);

      if (turn == 1 && !(sqr.innerHTML == "X" || sqr.innerHTML == "O") && WIN == false) {
        XMOVES.push(sqrI);
        sqr.innerHTML = "X";
	sqr.style.color = "red";
        sqr.classList.add('occupied');
        sqr.classList.remove('square');
	turn=2;
	wturn=1;
	XWON();
      } 
      else if (turn == 2 && !(sqr.innerHTML == "X" || sqr.innerHTML == "O") && WIN == false) {
	OMOVES.push(sqrI);
        sqr.innerHTML = "O";
	sqr.style.color = "blue";
        sqr.classList.add('occupied');
        sqr.classList.remove('square');
	turn=1;
	wturn=2;
	OWON();
      }

      if (WIN == true) {
	var W = document.getElementById('winner');
        if (wturn == 2) { W.style.color = "blue"; } else { W.style.color = "red"; }
	W.innerHTML = "Player " + wturn + " wins!!!";
	ALLOCCUPIED();
      }
    }

    // a function used to sort an array in smallest-to-largest order
    function SORT(array) {
      array.sort(function(a, b){return a-b});
    }

    // the following functions are to check for wins
    function XWON() {
      WINCHECK(XMOVES,W1);
      WINCHECK(XMOVES,W2);
      WINCHECK(XMOVES,W3);
      WINCHECK(XMOVES,W4);
      WINCHECK(XMOVES,W5);
      WINCHECK(XMOVES,W6);
      WINCHECK(XMOVES,W7);
      WINCHECK(XMOVES,W8);
    }
    function OWON() {
      WINCHECK(OMOVES,W1);
      WINCHECK(OMOVES,W2);
      WINCHECK(OMOVES,W3);
      WINCHECK(OMOVES,W4);
      WINCHECK(OMOVES,W5);
      WINCHECK(OMOVES,W6);
      WINCHECK(OMOVES,W7);
      WINCHECK(OMOVES,W8);
    }
    function WINCHECK(arrayP, arrayW) {
      if(WIN == false) { WIN = arrayW.every(function (val) { return arrayP.indexOf(val) >= 0; }); }
    }

    function ALLOCCUPIED() {
      document.getElementById("sq1").classList.add('occupied');
      document.getElementById("sq1").classList.remove('square');

      document.getElementById("sq2").classList.add('occupied');
      document.getElementById("sq2").classList.remove('square');

      document.getElementById("sq3").classList.add('occupied');
      document.getElementById("sq3").classList.remove('square');

      document.getElementById("sq4").classList.add('occupied');
      document.getElementById("sq4").classList.remove('square');

      document.getElementById("sq5").classList.add('occupied');
      document.getElementById("sq5").classList.remove('square');

      document.getElementById("sq6").classList.add('occupied');
      document.getElementById("sq6").classList.remove('square');

      document.getElementById("sq7").classList.add('occupied');
      document.getElementById("sq7").classList.remove('square');

      document.getElementById("sq8").classList.add('occupied');
      document.getElementById("sq8").classList.remove('square');

      document.getElementById("sq9").classList.add('occupied');
      document.getElementById("sq9").classList.remove('square');
    }

    function ALLUNOCCUPIED() {
      document.getElementById("sq1").classList.add('square');
      document.getElementById("sq1").classList.remove('occupied');

      document.getElementById("sq2").classList.add('square');
      document.getElementById("sq2").classList.remove('occupied');

      document.getElementById("sq3").classList.add('square');
      document.getElementById("sq3").classList.remove('occupied');

      document.getElementById("sq4").classList.add('square');
      document.getElementById("sq4").classList.remove('occupied');

      document.getElementById("sq5").classList.add('square');
      document.getElementById("sq5").classList.remove('occupied');

      document.getElementById("sq6").classList.add('square');
      document.getElementById("sq6").classList.remove('occupied');

      document.getElementById("sq7").classList.add('square');
      document.getElementById("sq7").classList.remove('occupied');

      document.getElementById("sq8").classList.add('square');
      document.getElementById("sq8").classList.remove('occupied');

      document.getElementById("sq9").classList.add('square');
      document.getElementById("sq9").classList.remove('occupied');
    }

    // function to reset the board
    function RESET() {
      XMOVES = [];
      OMOVES = [];
      WIN = false;
      turn = 1;
      wturn = 2;
      document.getElementById('winner').innerHTML = "";
      document.getElementById('sq1').innerHTML = "";
      document.getElementById('sq2').innerHTML = "";
      document.getElementById('sq3').innerHTML = "";
      document.getElementById('sq4').innerHTML = "";
      document.getElementById('sq5').innerHTML = "";
      document.getElementById('sq6').innerHTML = "";
      document.getElementById('sq7').innerHTML = "";
      document.getElementById('sq8').innerHTML = "";
      document.getElementById('sq9').innerHTML = "";
      ALLUNOCCUPIED();
    }
  </script>
</body>
</html>