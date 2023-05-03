<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Word Scramble Game</title>
    <link rel="stylesheet" href="../css/word_scramble.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/words.js" defer></script>
    <script src="../js/script.js" defer></script>
  </head>
  <body>
    <div class="container">
        <h2 align="center"> LEVEL 2 </h2>
        <div class="content">
            <p class="word"></p>
            <div class="details">
                <p class="hint">Hint: <span></span></p>
                <p >Time Left: <div id="timer"></div></p>
            </div>
            <input type="text" spellcheck="false" placeholder="Enter a valid word">
            <div class="buttons">
			<form id="myForm"  method="POST">
			  <!-- form fields here -->
			  <input type="submit" value="Submit">
			</form>
			
                <button class="check-word">Check Word</button>
            </div>
        </div>
    </div>
  </body>
</html>
<script>
    // Set the countdown time to 3 minutes (in seconds)
var countDownTime = 120;

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
  xhttp.open("POST", "word_scramble_time.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("remaining_time=" + remainingTime);

  // Allow the form to submit normally
  return true;
});



</script>