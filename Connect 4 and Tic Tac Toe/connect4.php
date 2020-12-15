<!DOCTYPE html>
<html lang="en">

<head>
  <title>Connect Four</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://www.cs.ryerson.ca/~c79liu/finalproject/header.css">
  <link rel="stylesheet" href="https://www.cs.ryerson.ca/~c79liu/finalproject/footer.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="c4.css" />
</head>

<!-- setup for the game  -->
<body style="text-align: center; background-color: grey;">

  <?php 
    include("header.php");
  ?>

  <!-- game container, houses the game board within it -->
  <div id="new_container">
    <h1>Connect 4</h1>
    <h4>(Click on any empty space to drop a gamepiece into a column!)
      <h2 id="tied">Player <span id="player" style="color:red;">1</span><span id="winner">'s turn:</span></h2>

      <div class="grid">
        <div id="1" class="block" onclick="occupy('1', 1)"></div>
        <div id="2" class="block" onclick="occupy('2', 2)"></div>
        <div id="3" class="block" onclick="occupy('3', 3)"></div>
        <div id="4" class="block" onclick="occupy('4', 4)"></div>
        <div id="5" class="block" onclick="occupy('5', 5)"></div>
        <div id="6" class="block" onclick="occupy('6', 6)"></div>
        <div id="7" class="block" onclick="occupy('7', 7)"></div>
        <div id="8" class="block" onclick="occupy('8', 8)"></div>
        <div id="9" class="block" onclick="occupy('9', 9)"></div>
        <div id="10" class="block" onclick="occupy('10', 10)"></div>
        <div id="11" class="block" onclick="occupy('11', 11)"></div>
        <div id="12" class="block" onclick="occupy('12', 12)"></div>
        <div id="13" class="block" onclick="occupy('13', 13)"></div>
        <div id="14" class="block" onclick="occupy('14', 14)"></div>
        <div id="15" class="block" onclick="occupy('15', 15)"></div>
        <div id="16" class="block" onclick="occupy('16', 16)"></div>
        <div id="17" class="block" onclick="occupy('17', 17)"></div>
        <div id="18" class="block" onclick="occupy('18', 18)"></div>
        <div id="19" class="block" onclick="occupy('19', 19)"></div>
        <div id="20" class="block" onclick="occupy('20', 20)"></div>
        <div id="21" class="block" onclick="occupy('21', 21)"></div>
        <div id="22" class="block" onclick="occupy('22', 22)"></div>
        <div id="23" class="block" onclick="occupy('23', 23)"></div>
        <div id="24" class="block" onclick="occupy('24', 24)"></div>
        <div id="25" class="block" onclick="occupy('25', 25)"></div>
        <div id="26" class="block" onclick="occupy('26', 26)"></div>
        <div id="27" class="block" onclick="occupy('27', 27)"></div>
        <div id="28" class="block" onclick="occupy('28', 28)"></div>
        <div id="29" class="block" onclick="occupy('29', 29)"></div>
        <div id="30" class="block" onclick="occupy('30', 30)"></div>
        <div id="31" class="block" onclick="occupy('31', 31)"></div>
        <div id="32" class="block" onclick="occupy('32', 32)"></div>
        <div id="33" class="block" onclick="occupy('33', 33)"></div>
        <div id="34" class="block" onclick="occupy('34', 34)"></div>
        <div id="35" class="block" onclick="occupy('35', 35)"></div>
        <div id="36" class="block" onclick="occupy('36', 36)"></div>
        <div id="37" class="block" onclick="occupy('37', 37)"></div>
        <div id="38" class="block" onclick="occupy('38', 38)"></div>
        <div id="39" class="block" onclick="occupy('39', 39)"></div>
        <div id="40" class="block" onclick="occupy('40', 40)"></div>
        <div id="41" class="block" onclick="occupy('41', 41)"></div>
        <div id="42" class="block" onclick="occupy('42', 42)"></div>
      </div><br>
      <button onclick="window.location.reload()">Restart game</button>
  </div>
  <?php 
    include("footer.php");
  ?>

  <!-- script that governs the game logic -->
  <script>
    // every single win condition
    var W1 = [1, 2, 3, 4];
    var W2 = [2, 3, 4, 5];
    var W3 = [3, 4, 5, 6];
    var W4 = [4, 5, 6, 7];
    var W5 = [8, 9, 10, 11];
    var W6 = [9, 10, 11, 12];
    var W7 = [10, 11, 12, 13];
    var W8 = [11, 12, 13, 14];
    var W9 = [15, 16, 17, 18];
    var W10 = [16, 17, 18, 19];
    var W11 = [17, 18, 19, 20];
    var W12 = [18, 19, 20, 21];
    var W13 = [22, 23, 24, 25];
    var W14 = [23, 24, 25, 26];
    var W15 = [24, 25, 26, 27];
    var W16 = [25, 26, 27, 28];
    var W17 = [29, 30, 31, 32];
    var W18 = [30, 31, 32, 33];
    var W19 = [31, 32, 33, 34];
    var W20 = [32, 33, 34, 35];
    var W21 = [36, 37, 38, 39];
    var W22 = [37, 38, 39, 40];
    var W23 = [38, 39, 40, 41];
    var W24 = [39, 40, 41, 42];

    var W25 = [1, 8, 15, 22];
    var W26 = [2, 9, 16, 23];
    var W27 = [3, 10, 17, 24];
    var W28 = [4, 11, 18, 25];
    var W29 = [5, 12, 19, 26];
    var W30 = [6, 13, 20, 27];
    var W31 = [7, 14, 21, 28];
    var W32 = [8, 15, 22, 29];
    var W33 = [9, 16, 23, 30];
    var W34 = [10, 17, 24, 31];
    var W35 = [11, 18, 25, 32];
    var W36 = [12, 19, 26, 33];
    var W37 = [13, 20, 27, 34];
    var W38 = [14, 21, 28, 35];
    var W39 = [15, 22, 29, 36];
    var W40 = [16, 23, 30, 37];
    var W41 = [17, 24, 31, 38];
    var W42 = [18, 25, 32, 39];
    var W43 = [19, 26, 33, 40];
    var W44 = [20, 27, 34, 41];
    var W45 = [21, 28, 35, 42];

    var W46 = [1, 9, 17, 25];
    var W47 = [2, 10, 18, 26];
    var W48 = [3, 11, 19, 27];
    var W49 = [4, 12, 20, 28];
    var W50 = [4, 10, 16, 22];
    var W51 = [5, 11, 17, 23];
    var W52 = [6, 12, 18, 24];
    var W53 = [7, 13, 19, 25];
    var W54 = [8, 16, 24, 32];
    var W55 = [9, 17, 25, 33];
    var W56 = [10, 18, 26, 34];
    var W57 = [11, 19, 27, 35];
    var W58 = [11, 17, 23, 29];
    var W59 = [12, 18, 24, 30];
    var W60 = [13, 19, 25, 31];
    var W61 = [14, 20, 26, 32];
    var W62 = [15, 23, 31, 39];
    var W63 = [16, 24, 32, 40];
    var W64 = [17, 25, 33, 41];
    var W65 = [18, 26, 34, 42];
    var W66 = [18, 24, 30, 36];
    var W67 = [19, 25, 31, 37];
    var W68 = [20, 26, 32, 38];
    var W69 = [21, 27, 33, 39];

    // user arrays for keeping track of user's moves
    var RED = [];
    var YELLOW = [];

    var WIN = false;
    var TIED = false;

    var TURN = 1;
    var WTURN = 2;

    // the function ''occupy'' is the main function of the game. it places 
    // the user's pieces, keeps track of turn, and checks for any wins after placement.
    function occupy(ID, block) {
      while (block < 36) {
        block += 7;
      }

      var sqr = document.getElementById(block);

      while (sqr.classList.contains('occupied')) {
        block -= 7;
        sqr = document.getElementById(block);
      }

      if (TURN == 1 && WIN == false) {
        sqr.style.color = "red";
        sqr.classList.add('occupied');
        sqr.innerHTML = "O";
        if (block > 0) { RED.push(block); }
        TURN = 2;
        WTURN = 1;
        RWON();
        if (WIN == false) {
          document.getElementById('player').innerHTML = "2";
          document.getElementById('player').style.color = "yellow";
        }
      }
      else if (TURN == 2 && WIN == false) {
        sqr.style.color = "yellow";
        sqr.classList.add('occupied');
        sqr.innerHTML = "O";
        if (block > 0) { YELLOW.push(block); }
        TURN = 1;
        WTURN = 2;
        YWON();
        if (WIN == false) {
          document.getElementById('player').innerHTML = "1";
          document.getElementById('player').style.color = "red";
        }
      }

      if (WIN) {
        document.getElementById('winner').innerHTML = " has won!!!";
      }
      TIECHECK();
    }


    // the following functions are to check for wins, or ties
    function RWON() {
      WINCHECK(RED, W1);
      WINCHECK(RED, W2);
      WINCHECK(RED, W3);
      WINCHECK(RED, W4);
      WINCHECK(RED, W5);
      WINCHECK(RED, W6);
      WINCHECK(RED, W7);
      WINCHECK(RED, W8);
      WINCHECK(RED, W9);
      WINCHECK(RED, W10);
      WINCHECK(RED, W11);
      WINCHECK(RED, W12);
      WINCHECK(RED, W13);
      WINCHECK(RED, W14);
      WINCHECK(RED, W15);
      WINCHECK(RED, W16);
      WINCHECK(RED, W17);
      WINCHECK(RED, W18);
      WINCHECK(RED, W19);
      WINCHECK(RED, W20);
      WINCHECK(RED, W21);
      WINCHECK(RED, W22);
      WINCHECK(RED, W23);
      WINCHECK(RED, W24);
      WINCHECK(RED, W25);
      WINCHECK(RED, W26);
      WINCHECK(RED, W27);
      WINCHECK(RED, W28);
      WINCHECK(RED, W29);
      WINCHECK(RED, W30);
      WINCHECK(RED, W31);
      WINCHECK(RED, W32);
      WINCHECK(RED, W33);
      WINCHECK(RED, W34);
      WINCHECK(RED, W35);
      WINCHECK(RED, W36);
      WINCHECK(RED, W37);
      WINCHECK(RED, W38);
      WINCHECK(RED, W39);
      WINCHECK(RED, W40);
      WINCHECK(RED, W41);
      WINCHECK(RED, W42);
      WINCHECK(RED, W43);
      WINCHECK(RED, W44);
      WINCHECK(RED, W45);
      WINCHECK(RED, W46);
      WINCHECK(RED, W47);
      WINCHECK(RED, W48);
      WINCHECK(RED, W49);
      WINCHECK(RED, W50);
      WINCHECK(RED, W51);
      WINCHECK(RED, W52);
      WINCHECK(RED, W53);
      WINCHECK(RED, W54);
      WINCHECK(RED, W55);
      WINCHECK(RED, W56);
      WINCHECK(RED, W57);
      WINCHECK(RED, W58);
      WINCHECK(RED, W59);
      WINCHECK(RED, W60);
      WINCHECK(RED, W61);
      WINCHECK(RED, W62);
      WINCHECK(RED, W63);
      WINCHECK(RED, W64);
      WINCHECK(RED, W65);
      WINCHECK(RED, W66);
      WINCHECK(RED, W67);
      WINCHECK(RED, W68);
      WINCHECK(RED, W69);
    }
    function YWON() {
      WINCHECK(YELLOW, W1);
      WINCHECK(YELLOW, W2);
      WINCHECK(YELLOW, W3);
      WINCHECK(YELLOW, W4);
      WINCHECK(YELLOW, W5);
      WINCHECK(YELLOW, W6);
      WINCHECK(YELLOW, W7);
      WINCHECK(YELLOW, W8);
      WINCHECK(YELLOW, W9);
      WINCHECK(YELLOW, W10);
      WINCHECK(YELLOW, W11);
      WINCHECK(YELLOW, W12);
      WINCHECK(YELLOW, W13);
      WINCHECK(YELLOW, W14);
      WINCHECK(YELLOW, W15);
      WINCHECK(YELLOW, W16);
      WINCHECK(YELLOW, W17);
      WINCHECK(YELLOW, W18);
      WINCHECK(YELLOW, W19);
      WINCHECK(YELLOW, W20);
      WINCHECK(YELLOW, W21);
      WINCHECK(YELLOW, W22);
      WINCHECK(YELLOW, W23);
      WINCHECK(YELLOW, W24);
      WINCHECK(YELLOW, W25);
      WINCHECK(YELLOW, W26);
      WINCHECK(YELLOW, W27);
      WINCHECK(YELLOW, W28);
      WINCHECK(YELLOW, W29);
      WINCHECK(YELLOW, W30);
      WINCHECK(YELLOW, W31);
      WINCHECK(YELLOW, W32);
      WINCHECK(YELLOW, W33);
      WINCHECK(YELLOW, W34);
      WINCHECK(YELLOW, W35);
      WINCHECK(YELLOW, W36);
      WINCHECK(YELLOW, W37);
      WINCHECK(YELLOW, W38);
      WINCHECK(YELLOW, W39);
      WINCHECK(YELLOW, W40);
      WINCHECK(YELLOW, W41);
      WINCHECK(YELLOW, W42);
      WINCHECK(YELLOW, W43);
      WINCHECK(YELLOW, W44);
      WINCHECK(YELLOW, W45);
      WINCHECK(YELLOW, W46);
      WINCHECK(YELLOW, W47);
      WINCHECK(YELLOW, W48);
      WINCHECK(YELLOW, W49);
      WINCHECK(YELLOW, W50);
      WINCHECK(YELLOW, W51);
      WINCHECK(YELLOW, W52);
      WINCHECK(YELLOW, W53);
      WINCHECK(YELLOW, W54);
      WINCHECK(YELLOW, W55);
      WINCHECK(YELLOW, W56);
      WINCHECK(YELLOW, W57);
      WINCHECK(YELLOW, W58);
      WINCHECK(YELLOW, W59);
      WINCHECK(YELLOW, W60);
      WINCHECK(YELLOW, W61);
      WINCHECK(YELLOW, W62);
      WINCHECK(YELLOW, W63);
      WINCHECK(YELLOW, W64);
      WINCHECK(YELLOW, W65);
      WINCHECK(YELLOW, W66);
      WINCHECK(YELLOW, W67);
      WINCHECK(YELLOW, W68);
      WINCHECK(YELLOW, W69);
    }
    function WINCHECK(arrayP, arrayW) {
      if (WIN == false) { WIN = arrayW.every(function (val) { return arrayP.indexOf(val) >= 0; }); }
    }
    function TIECHECK() {
      if (
        document.getElementById('1').classList.contains('occupied') &&
        document.getElementById('2').classList.contains('occupied') &&
        document.getElementById('3').classList.contains('occupied') &&
        document.getElementById('4').classList.contains('occupied') &&
        document.getElementById('5').classList.contains('occupied') &&
        document.getElementById('6').classList.contains('occupied') &&
        document.getElementById('7').classList.contains('occupied') &&
        document.getElementById('8').classList.contains('occupied') &&
        document.getElementById('9').classList.contains('occupied') &&
        document.getElementById('10').classList.contains('occupied') &&
        document.getElementById('11').classList.contains('occupied') &&
        document.getElementById('12').classList.contains('occupied') &&
        document.getElementById('13').classList.contains('occupied') &&
        document.getElementById('14').classList.contains('occupied') &&
        document.getElementById('15').classList.contains('occupied') &&
        document.getElementById('16').classList.contains('occupied') &&
        document.getElementById('17').classList.contains('occupied') &&
        document.getElementById('18').classList.contains('occupied') &&
        document.getElementById('19').classList.contains('occupied') &&
        document.getElementById('20').classList.contains('occupied') &&
        document.getElementById('21').classList.contains('occupied') &&
        document.getElementById('22').classList.contains('occupied') &&
        document.getElementById('23').classList.contains('occupied') &&
        document.getElementById('24').classList.contains('occupied') &&
        document.getElementById('25').classList.contains('occupied') &&
        document.getElementById('26').classList.contains('occupied') &&
        document.getElementById('27').classList.contains('occupied') &&
        document.getElementById('28').classList.contains('occupied') &&
        document.getElementById('29').classList.contains('occupied') &&
        document.getElementById('30').classList.contains('occupied') &&
        document.getElementById('31').classList.contains('occupied') &&
        document.getElementById('32').classList.contains('occupied') &&
        document.getElementById('33').classList.contains('occupied') &&
        document.getElementById('34').classList.contains('occupied') &&
        document.getElementById('35').classList.contains('occupied') &&
        document.getElementById('36').classList.contains('occupied') &&
        document.getElementById('37').classList.contains('occupied') &&
        document.getElementById('38').classList.contains('occupied') &&
        document.getElementById('39').classList.contains('occupied') &&
        document.getElementById('40').classList.contains('occupied') &&
        document.getElementById('41').classList.contains('occupied') &&
        document.getElementById('42').classList.contains('occupied') &&
        TIED == false
      ) {
        document.getElementById('player').innerHTML = "";
        document.getElementById('winner').innerHTML = "";
        document.getElementById('tied').innerHTML = "Tie game...";
        TIED = true;
      }
    }
  </script>
</body>

</html>