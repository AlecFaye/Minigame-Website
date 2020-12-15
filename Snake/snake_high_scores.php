<!DOCTYPE html>

<html lang="en-US">

<head>
  <title>Snake High Scores</title>
  <meta charset="UTF-8"/>

  <link rel="icon" type="image/png" href="Asset 2@3x-8.png"/>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
    crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://www.cs.ryerson.ca/~c79liu/finalproject/header.css">
  <link rel="stylesheet" href="https://www.cs.ryerson.ca/~c79liu/finalproject/footer.css">
  <link rel="stylesheet" href="snake_styles.css">

<body>

  <!-- Header -->
  <div id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"> <img src="Asset 4@3x-8.png" alt="logo" style="margin-left: 40px; margin-top: 10px; margin-bottom: 10px; width: 200px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-right: 250px;">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Games</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="https://www2.cs.ryerson.ca/~t26lim/cps530/project/snake.html">Snake</a>
              <a class="dropdown-item" href="https://www2.scs.ryerson.ca/~abliache/connect4.php">Connect Four</a>
              <a class="dropdown-item" href="https://www2.cs.ryerson.ca/~bbnguyen/hangman.php">Hangman</a>
              <a class="dropdown-item" href="https://www.cs.ryerson.ca/~c79liu/finalproject/simonsays.php">Simons Says</a>
              <a class="dropdown-item" href="https://www2.scs.ryerson.ca/~abliache/tictactoe.php">Tic Tac Toe</a>
              <a class="dropdown-item" href="https://www2.cs.ryerson.ca/~bbnguyen/math.php">Quick Maths</a>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="https://www.cs.ryerson.ca/~c79liu/finalproject/gamespage.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.cs.ryerson.ca/~c79liu/finalproject/highscores.php">Highscores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.cs.ryerson.ca/~c79liu/finalproject/howto.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.cs.ryerson.ca/~c79liu/finalproject/aboutus.php">About Us</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <header style="padding-left:30px; padding-top:30px;">
    <a href="https://www2.cs.ryerson.ca/~t26lim/cps530/project/snake.html">
      <button class="button">Main Menu</button>
    </a>
  </header>

  <!-- High Score Page -->
  <header id="highScore">
    <div class="highScore">
      <h1>High Scores</h1>

      <?php
      $conn = mysqli_connect("localhost", "t26lim", "gigyagad", "t26lim");
      if(!$conn) {
        die(mysqli_connect_error());
      }

      $commandText = "SELECT name, score FROM snake_high_scores";
      $result = $conn->query($commandText);

      if ($result) {
        $high_scores = array();

        // Grabs the results from the database and appends them to high_scores array
        while ($row = $result->fetch_assoc()) {
          $player_score = array($row['name'], $row['score']);
          array_push($high_scores, $player_score);
        }

        // Sorts the high_scores in descending order based on score
        for ($index = 1; $index < count($high_scores); $index++) {
          $key = $high_scores[$index];
          $j = $index - 1;

          while ($j >= 0 && $high_scores[$j][1] < $key[1]) {
            $high_scores[$j + 1] = $high_scores[$j];
            $j = $j - 1;
          }

          $high_scores[$j + 1] = $key;
        }

        // Prints out the scores into a table
        printf("<table class='scoreTable'><tr>");
        printf("<th style='background-color:#006266'>Ranking</th>");
        printf("<th style='background-color:#006266'>Player Name</th>");
        printf("<th style='background-color:#006266'>High Score</th></tr>");
        $max = count($high_scores);
        if ($max > 30) $max = 30;
        for ($index = 0; $index < $max; $index++) {
          $rank = $index + 1;
          $name = $high_scores[$index][0];
          $score = $high_scores[$index][1];
          printf("<tr><th>%d</th>", $rank);
          printf("<td class='player'>%s</td>", $name);
          printf("<td class='score'>%s</td></tr>", $score);
        }
        printf("</table><br>");
      }
      else {
        print("No elements in here.");
      }
      ?>

    </div>
  </header>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <a href="https://www.cs.ryerson.ca/~c79liu/finalproject/gamespage.php"> <img src="Asset 4@3x-8.png" alt="logo" style="margin-top: 10px; margin-bottom: 10px; width: 200px;"></a>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            <li><a href="#">One-player Games</a></li>
            <li><a href="#">Two-Player Games</a></li>
            <li><a href="#">High Scores</a></li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">How-to</a></li>
            <li><a href="#">Coffee</a></li>
          </ul>
        </div>
      </div>
      <br>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by AABC Games.</p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
