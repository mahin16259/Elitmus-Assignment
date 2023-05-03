<?php
// start the session
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/dash.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body onload="startTimer()">
    <div id="modal" class="modal">
      <div class="content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Game Rules</h2>
        <p id="demo"></p>
      </div>	
    </div>
    <div class="container">
      <div class="header">
       
        <h1> Dashboard</h1>
        <a href="../login/logout.php">Logout</a>
      </div>
      <div class="row">
        <div class="card2">
            <br><h1>Choose your level:</h1>
			  <div class="level-select">
				<a href="../game_levels/basic.php"><img src="../img/flip.jpg" alt="Level 1"></a> 
				<a href="../game_levels/word_scramble.php"><img src="../img/scramble.jpg" alt="Level 2"></a>
				<a href="../game_levels/puzzle_game.php"><img src="../img/puzzle.jpg" alt="Level 3"></a>
			</div>
          </div>
        </div>
		 
		
	  </div>
    </div>
    
    
  </body>
</html>