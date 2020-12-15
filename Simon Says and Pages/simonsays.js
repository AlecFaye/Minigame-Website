// JavaScript Document
//<!-- Code sourced from: https://code.sololearn.com/W07CA52wuayc/#html -->
var running = false;
var pending = true;
var gameloop;
var showing;
var cooldown;
var score;
var pattern = [];
var keys    = [];
var clicked = [];

// initializing buttons when page first loads
onload = function() {
    var green = document.querySelector("#green");
    var red = document.querySelector("#red");
    var yellow = document.querySelector("#yellow");
    var blue = document.querySelector("#blue");
    
    keys = [green, red, yellow, blue];
    
    document.querySelector("button").style.borderColor = "red";
    
    green.onclick = function() {if(running || (!pending && showing != null)) {clicked.push(0);}}
    red.onclick = function() {if(running || (!pending && showing != null)) {clicked.push(1);}}
    yellow.onclick = function() {if(running || (!pending && showing != null)) {clicked.push(2);}}
    blue.onclick = function() {if(running || (!pending && showing != null)) {clicked.push(3);}}
	
}

// functions when a button is clicked, adding score and repeating pattern if correct otherwise ending game
onclick = function() {
    if(pending || showing || !running)
        return;
    // checking if user input is correct
    if(clicked[clicked.length - 1] == pattern[clicked.length - 1]) {
        if(clicked.length == pattern.length) {
            score++;
            document.querySelector("#score").innerHTML = score;
            clicked = [];
            pending = true;
        }
    }
    else {
        toggleGame();
        alert("game over")
    }
}

// function to start or stop game using onOff toggle button
function toggleGame() {
    if(showing != null)
        return;
    
    running  = !running;
    pending  = true;
    
    gameloop = null;
    showing  = null;
    
    cooldown = 10;
    score    = 0;
    
    pattern  = [];
    clicked  = [];
    
    var button = document.querySelector("#onOff");
    document.querySelector("#score").innerHTML = score;
    
    if(running) {
        gameloop = setInterval(playGame, 0);
        button.style.backgroundColor = "green";
    }
    else {
        clearInterval(showing);
        clearInterval(gameloop);
        button.style.backgroundColor = "red";
        
    }
}

// function to repeat pattern to user
function showPattern() {
    var index = 0;

    showing = setInterval(function() {
        var reset = setTimeout(function() {
			
            for(var i in keys)
               keys[i].setAttribute("class", "key");
        }, 450);
        
        if(index >= pattern.length) {
            clearInterval(showing);
            showing = null;
            return;
		
        }
		keys[pattern[index]].setAttribute("class", "key glow");
        index++;
    }, 500);
}

// called every time the user enters a new round to reset user input and call show pattern
function playGame() {
    if(running) {
        if(cooldown <= 0 && pending) {
            pattern.push(Math.floor(Math.random() * 4));
            cooldown = 100;
            pending  = false;
            showPattern();
            
        }
        else if(pending)
            cooldown--;
    }
}