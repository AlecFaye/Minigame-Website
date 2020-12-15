<!DOCTYPE html>
<!-- alt shift f for auto indent -->
<html lang="en">

<head>
    <title>Math Game</title>
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

        <style>
            body, html {
  height: 100%;
}
#newBody{
    height:60%;
}
</style>

</head>

<body style="background-color: rgb(0, 153, 255);">
    <?php 
    include("header.php");
    ?>

<div id = "newBody">
    <!-- title of game -->
    <div style="font-size: 4em;text-align: center;">Quick Math</div>
<!-- start button to start timer -->
    <button style="width:5%; display:block; margin:auto; word-wrap: break-word;" class ="btn btn-secondary" onclick="startTimer();">start</button>

    <!-- print timer score and questions  -->
    <div style="text-align: center;">
        <div id="timer" style = "font-size:20px;">Timer: 0
        </div>
        <p id="score2" style = "font-size:20px;">score: 0 </p>
        <div style="width:20%; margin:auto;"  class ="btn btn-secondary">
            <span id="num1">hit the start</span>
            <span id="operator">button above to start </span>

            <span id="num2">playing</span>
        </div>
        <div>Hit enter or press the submit button to go to next question</div>
        <!-- get user input -->
        <input type="text" id="answer">
        <!-- check if answer correct -->
        <button id="check" onclick="checkAnswer()" tabindex="1">submit</button>
        <div id="last_game_score"></div>

    </div>
</div>

<!-- footer -->
<?php 
    include("footer.php");
    ?>
</body>


<script>

    // set the timer
    var count = 21;
    var stop_timer;
    // track score
    var score = 0;
    // different operator
    var different_operator = ["+", "-", "*"];

    // get object 
    var answer_object = document.getElementById("answer");
    var num1_object = document.getElementById("num1");
    var num2_object = document.getElementById("num2");
    var operator_object = document.getElementById("operator");
    var check_object = document.getElementById("check");
    var timer_object = document.getElementById("timer");

// disable input 
    answer_object.disabled = true;
    check_object.disabled = true;

    // everytime a use hit enter submit the answer 
    document.getElementById('answer').onkeypress = function (e) {
        if (e.keyCode == 13) {
            document.getElementById('check').click();
        }
    }
    // enable input and start timer
    function startTimer() {
        operator_object.innerHTML = different_operator[getRandomInt(3)];
        num1_object.innerHTML = getRandomInt(25);
        num2_object.innerHTML = getRandomInt(25);
        answer_object.value = "";
        answer_object.innerHTML = "";
        score = 0;

        stop_timer = setInterval(countdown, 1000);

    }

    // timer countdown if timer up disable input and calculate score and reset values 
    function countdown() {
        timer_object.innerText = "Timer: " + (--count) ;
        answer_object.disabled = false;
        check_object.disabled = false;
        ;
        if (count < 1) {
            answer_object.value = "";
            answer_object.innerHTML = "";
            clearInterval(stop_timer);
            answer_object.value = "";
            answer_object.innerHTML = "";
            answer_object.disabled = true;
            check_object.disabled = true;
            operator_object.innerHTML = "Hit start button to start";
            num1_object.innerHTML = "";
            num2_object.innerHTML = "";


            count = 21;
            document.getElementById("last_game_score").innerHTML = "Your last game score is " + score;
            document.getElementById("score2").innerHTML = "Score: " + 0;

        }
    }


    // random number for math questions
    function getRandomInt(number) {
        return Math.floor(Math.random() * number);
    }

// check if user answer was correct
    function checkAnswer() {
        // values 
        var answer = document.getElementById("answer").value;
        var num1 = parseInt(document.getElementById("num1").innerHTML);
        var num2 = parseInt(document.getElementById("num2").innerHTML);
        var operator = document.getElementById("operator").innerHTML;


        // clear values for next question 
        answer_object.value = "";

        // check which operator it is
        // if correct increaes score
        if (operator == "+") {
            if (answer == (num1 + num2)) {

                score += 1;
                document.getElementById("score2").innerHTML = "score: " + score;
            }
        }
        else if (operator == "-") {
            if (answer == (num1 - num2)) {

                score += 1;
                document.getElementById("score2").innerHTML = "score: " + score;
            }
        }
        else if (operator == "*") {
            if (answer == (num1 * num2)) {

                score += 1;
                document.getElementById("score2").innerHTML = "score: " + score;
            }
        }

        // update html value
        operator_object.innerHTML = different_operator[getRandomInt(3)];
        num1_object.innerHTML = getRandomInt(25);
        num2_object.innerHTML = getRandomInt(25);

    }



</script>

</html>