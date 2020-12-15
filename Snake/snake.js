/*
Used Basic Snake Game code from:
https://gist.github.com/straker/ff00b4b49669ad3dec890306d348adc4
*/

var canvas = document.getElementById('game');
var scoreboard = document.getElementById('score');

var gameScreen = document.getElementById('game');
var instructions = document.getElementById('howToPlay');
var mainMenu = document.getElementById('main');
var settings = document.getElementById('settings');
var gameOver = document.getElementById('gameOver');

var context = canvas.getContext('2d');
var animation;
var score = 0;

var colourblind = false;
var snakeColour = '#009432';
var appleColour = '#EA2027';

scoreboard.style.display = "none";
instructions.style.display = "none";
gameScreen.style.display = "none";
gameOver.style.display = "none";
settings.style.display = "none";

// Starts the game
function startGame() {
  animation = requestAnimationFrame(loop);
  gameScreen.style.display = "block";
  scoreboard.style.display = "block";
  mainMenu.style.display = "none";
  gameOver.style.display = "none";

  score = 0;
  scoreboard.textContent = "Score: " + score;

  snake.x = 160;
  snake.y = 160;
  snake.cells = [];
  snake.maxCells = 4;
  snake.dx = grid;
  snake.dy = 0;

  apple.x = getRandomInt(0, 25) * grid;
  apple.y = getRandomInt(0, 25) * grid;
}

// Loads the How to Play menu
function loadInstructions() {
  mainMenu.style.display = "none";
  instructions.style.display = "block";
}

// Loads the Settings menu
function loadSettings() {
  mainMenu.style.display = "none";
  settings.style.display = "block";
}

// Loads the Game Over screen
function loadGameOver() {
  gameOver.style.display = "block";
  canvas.style.display = "none";
  document.getElementById('submitHighScore').value = score;
}

// Loads the Main Menu
function loadMainMenu() {
  canvas.style.display = "none";
  scoreboard.style.display = "none";
  instructions.style.display = "none";
  settings.style.display = "none";
  gameOver.style.display = "none";
  mainMenu.style.display = "block";
}

// Toggles colourblind mode
function toggleColour() {
  if (colourblind) {
    snakeColour = '#009432';  // Green
    appleColour = '#EA2027';  // Red
    colourblind = false;
    document.getElementById('apple').textContent = "red";
    document.getElementById('apple').style.color = "red";
    document.getElementById('colourBlindButton').textContent = "OFF";
  }
  else {
    snakeColour = '#0652DD';  // Blue
    appleColour = '#F79F1F';  // Orange
    colourblind = true;
    document.getElementById('apple').textContent = "orange";
    document.getElementById('apple').style.color = "orange";
    document.getElementById('colourBlindButton').textContent = "ON";
  }
}

// Submits the player's score after checking
function submitPlayerScore() {
  var name = document.getElementById('PlayerName');
  var form = document.getElementById('playerSubmitForm');
  var letters = /^[A-Za-z]+$/;

  // Checks the validity of the player submission for their name
  if (!(letters.test(name.value))) {
    alert(name.value + " is invalid.");
    return false;
  }
  else {
    form.action = "https://webdev.scs.ryerson.ca/~t26lim/project/game_over.php";
    return true;
  }
}

var grid = 16;
var count = 0;

var snake = {
  x: 160,
  y: 160,

  dx: grid,
  dy: 0,

  cells: [],
  maxCells: 4
};

var apple = {
  x: 320,
  y: 320
};

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

// Loops the game
function loop() {
  animation = requestAnimationFrame(loop);

  // Slows the game to 15 fps
  if (++count < 4) {
    return;
  }

  count = 0;
  context.clearRect(0,0,canvas.width,canvas.height);

  // Move snake by it's velocity
  snake.x += snake.dx;
  snake.y += snake.dy;

  // Wraps the snake's body so it does not die when it hits the edge
  if (snake.x < 0) {
    snake.x = canvas.width - grid;
  }
  else if (snake.x >= canvas.width) {
    snake.x = 0;
  }

  if (snake.y < 0) {
    snake.y = canvas.height - grid;
  }
  else if (snake.y >= canvas.height) {
    snake.y = 0;
  }

  // Keeps track of the snake's cells
  snake.cells.unshift({x: snake.x, y: snake.y});

  // Takes out the cells whent he snake's head moves away
  if (snake.cells.length > snake.maxCells) {
    snake.cells.pop();
  }

  // Draws the apple
  context.fillStyle = appleColour;
  context.fillRect(apple.x, apple.y, grid-1, grid-1);

  // Draws the snake cell one at a time
  context.fillStyle = snakeColour;
  snake.cells.forEach(function(cell, index) {

    context.fillRect(cell.x, cell.y, grid-1, grid-1);

    // If the snake eats an apple
    if (cell.x === apple.x && cell.y === apple.y) {
      snake.maxCells++;
      score += 100;
      scoreboard.textContent = "Score: " + score;

      apple.x = getRandomInt(0, 25) * grid;
      apple.y = getRandomInt(0, 25) * grid;
    }

    // Checks collision with own body
    for (var i = index + 1; i < snake.cells.length; i++) {

      // If the snake hits own body, reset the game
      if (cell.x === snake.cells[i].x && cell.y === snake.cells[i].y) {
        cancelAnimationFrame(animation);
        loadGameOver();
      }
    }
  });
}

// Listen to keyboard strokes
document.addEventListener('keydown', function(e) {
  // Left arrow key
  if ((e.which === 37 || e.which === 65) && snake.dx === 0) {
    snake.dx = -grid;
    snake.dy = 0;
  }
  // Up arrow key
  else if ((e.which === 38 || e.which === 87) && snake.dy === 0) {
    snake.dy = -grid;
    snake.dx = 0;
  }
  // Right arrow key
  else if ((e.which === 39 || e.which === 68) && snake.dx === 0) {
    snake.dx = grid;
    snake.dy = 0;
  }
  // Down arrow key
  else if ((e.which === 40 || e.which === 83) && snake.dy === 0) {
    snake.dy = grid;
    snake.dx = 0;
  }
  // Die key
  else if ((e.which === 27)) {
    cancelAnimationFrame(animation);
    loadGameOver();
  }
});

// Disables the arrow keys from scrolling
window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);
