<!DOCTYPE html>
<!-- alt shift f for auto indent -->
<html lang="en">

<head>
    <title>Hangman</title>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.cs.ryerson.ca/~c79liu/finalproject/header.css">
        <link rel="stylesheet" href="https://www.cs.ryerson.ca/~c79liu/finalproject/footer.css">
        <link rel="icon" type="image/png" href="./Asset 2@3x-8.png"/>

</head>

<body style="text-align: center; background-color: grey;">
    <!-- header  -->
    <?php 
    include("header.php");
    ?>

    <!-- game name -->
    <h1>Hangman</h1>
    <p id="guess_left" style="font-size: 20px;"></p>

    <!-- image of hangman -->
    <div id="stages" style="margin: auto;content: url(start_hangman.png);">

    </div>
    <strong id = "text_guess" style="font-size:30px;">Guess word</strong>
    <br>
    <!-- print the _ _ r -->
    <div id="default_board"></div>

    <!-- alphabet buttons  -->
    <div id="char_button"></div>

    <!-- gameover showups -->
    <div style = "color:white;" id = "game_over"></div>

    <br>
    <!-- reset the game for user -->
    <button style="font-size:20px;"onclick="reset_game()">Reset Game</button>
    <!-- footer -->
    <?php 
    include("footer.php");
    ?>
</body>
<script>

    // word choices for game
    var word_list = ["Python", "Ruby", "Java", "Oracle", "Pokemon", "Naruto", "Disney","Apple","Window", "Microsoft","Tesla","Roblox,","Christmas"];

    // randomly selects a word
    var guess_word = word_list[Math.floor(Math.random() * word_list.length)].toLowerCase();

    // keep track of  _ _ A _ 
    var guess_char = [];

    // store the _ _ A code in here 
    var game_default = "";
    // log the guess word on console
    // this is use for debugging purpose (so we know which word is chosen)
    console.log(guess_word)

    // set gameboard so that it print the board with _ _ _ _
    for (var line = 0; line < guess_word.length; line++) {
        guess_char[line] = "_";
        game_default += "<span style = 'font-size:40px; margin:3px' >" + guess_char[line] + "</span>";
    }

    // number of guess left 
    var wrong_guess = 7;
    // use to store string of buttons
    var buttons = "";
    // all button combination 
    var letters = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
    // create the buttons 
    for (var char = 0; char < letters.length; char++) {
        // console.log(letters[char]);
        buttons += '<button class = "btn btn-dark" style="font-size:15px;"value = ' + letters[char] + ' id =' + letters[char] + ' onclick = "check(' + letters[char] + ')"> ' + letters[char] + '</button>';
    }

    // print default game setting 
    document.getElementById("char_button").innerHTML = buttons;
    document.getElementById("default_board").innerHTML = game_default;
    document.getElementById("guess_left").innerHTML = "Number of guess left " + wrong_guess;


    // function is use everytime a user guesses a letter (click on button)
    // alphabet is the actual id. so no need to do a = document.getElementbyID because you already have it 
    function check(alphabet) {
        // console.log(alphabet.value);

        // get button value and make it disappear
        alphabet.style.display = "none";
        letter = alphabet.value;

        // if letter is in word replace the _ with the letter at the correct position 
        for (var occurences = 0; occurences < guess_word.length; occurences++) {
            if (guess_word[occurences] === letter) {
                guess_char[occurences] = letter;
            }
        }

        // reset board
        game_default = "";
        // letter is not in word (wrong guess)
        if (guess_word.indexOf(letter) < 0) {
            wrong_guess -= 1;
        }

        // set new board 
        for (var line2 = 0; line2 < guess_word.length; line2++) {
            game_default += "<span style = 'font-size:40px; margin:5px;' >" + guess_char[line2] + "</span>";
        }
        
        var stages = document.getElementById("stages");
        // print stages 
        if (wrong_guess === 7) {
            stages.style.content = "url('start_hangman.png')";
        }
        else if (wrong_guess === 6) {
            stages.style.content = "url('one_wrong.png')";
        }
        else if (wrong_guess === 5) {
            stages.style.content = "url('two_wrong.png')";
        }
        else if (wrong_guess === 4) {
            stages.style.content = "url('three_wrong.png')";
        }
        else if (wrong_guess === 3) {
            stages.style.content = "url('four_wrong.png')";
        }
        else if (wrong_guess === 2) {
            stages.style.content = "url('five_wrong.png')";
        }
        else if (wrong_guess === 1) {
            stages.style.content = "url('six_wrong.png')";
        }
        else {
            stages.style.content = "url('seven_wrong.png')";
            wrong_guess = 0;
        }

        // draw new board
        document.getElementById("default_board").innerHTML = game_default;
        document.getElementById("guess_left").innerHTML = "Number of guess left " + wrong_guess;

        // end of game
        if(wrong_guess === 0){
            console.log(1);
            document.getElementById("default_board").style.display = "none";
            document.getElementById("char_button").style.display = "none";
            document.getElementById("text_guess").style.display = "none";
            document.getElementById("game_over").innerHTML = "You lose the word was: " + guess_word;

        }
        // letter is not in word (wrong guess)
        if (guess_char.indexOf("_") < 0) {
            document.getElementById("default_board").style.display = "none";
            document.getElementById("char_button").style.display = "none";
            document.getElementById("text_guess").style.display = "none";
            document.getElementById("game_over").innerHTML = "You won the word was " + guess_word + ". Your score is: " +wrong_guess*100;        }
    }

    // refresh page and reset the game 
    function reset_game() {
        window.location.reload();
    }

</script>

</html>