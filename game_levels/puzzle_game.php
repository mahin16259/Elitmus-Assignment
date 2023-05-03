<!doctype html>
<html>
  <head>
    <title>Puzzle game</title>
    <link rel="stylesheet" type="text/css" href="../css/puzzle_game.css">
  </head>

  <body>
    <div class="game">
      <div class="grid">
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>4</button>
        <button>5</button>
        <button>6</button>
        <button>7</button>
        <button>8</button>
        <button>9</button>
        <button>10</button>
        <button>11</button>
        <button>12</button>
        <button>13</button>
        <button>14</button>
        <button>15</button>
        <button></button>
      </div>

      <div class="footer">
        <button>Play</button>
        <span id="move">Move: 100</span>
        <span id="time">Time: <div id="timer"></div></span>
		<form id="myForm"  method="POST">
			  <button type="submit" value="Submit">Submit </button>
			</form>
      </div>
    </div>
    <h1 class="message">You win!</h1>


    <script src="../js/puzzle_game.js"></script>
  </body>
</html>
<script>
    // Set the countdown time to 3 minutes (in seconds)
var countDownTime = 900;

// Update the countdown every 1 second
var x = setInterval(function() {

  // Reduce the countdown time by 1 second
  countDownTime -= 1;

  // Calculate minutes and seconds remaining
  var minutes = Math.floor(countDownTime / 60);
  var seconds = countDownTime % 60;

  // Add leading zeros if necessary
  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;

  // Output the result in an element with id="timer"
  document.getElementById("timer").innerHTML = minutes + ":" + seconds;

  // If the countdown is over, submit the form
  if (countDownTime < 1) {
    clearInterval(x);
    document.getElementById("myForm").submit();
  }
}, 1000);

// Submit the form when the user clicks the submit button
document.getElementById("myForm").addEventListener("submit", function(event) {
  // Get the remaining countdown time
  var remainingTime = countDownTime;

  // Create a new AJAX request
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };

  // Send the remaining countdown time to the PHP script
  xhttp.open("POST", "puzzle_game_time.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("remaining_time=" + remainingTime);

  // Allow the form to submit normally
  return true;
});

