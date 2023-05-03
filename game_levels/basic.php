<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>responsive flip image</title>
    <link rel="stylesheet" href="../css/basic.css">
	<link rel="stylesheet" href="../css/mcq.css">
</head>

<body>
	<div>
		<h1 align="center"> LEVEL 1 </h1>
	</div>
    <div class="container">
        <div class="container1">
            <div class="front">
                <img src="../img/00.jpg">
                
            </div>
            <div class="back">
                <h2>Master Bedroom</h2>
                <p>The clue is not there.</p>
            </div>
        </div>
        <div class="container1">
            <div class="front">
                <img src="../img/01.jpg">
                
            </div>
            <div class="back">
                <h2>Secret Room</h2>
                <p>The clue which will take you to this room.
					<br>16259</p>
            </div>
        </div>
        <div class="container1">
            <div class="front">
                <img src="../img/10.jpg">
                
            </div>
            <div class="back">
                <h2>Balcony</h2>
                <p>Take left to go the secret room.</p>
            </div>
        </div>
        <div class="container1">
            <div class="front">
                <img src="../img/11.jpg">
                
            </div>
            <div class="back">
                <h2>Bedroom</h2>
                <p>There is no clue to find.</p>
            </div>
        </div>
    </div>
	<div class="quiz-container">
    <h1>Multiple Choice Quiz</h1>
    <hr>
    <form id="quiz-form">
      <div class="d-flex">
        <div class="question">
          <p>1. Where is the secret room in the picture?</p>
          <div class="answers">
            <label>
              <input type="radio" name="q1" value="a">
              Below the Master bath
            </label>
            <label>
              <input type="radio" name="q1" value="b">
              Behind the Master bath
            </label>
            <label>
              <input type="radio" name="q1" value="c">
              Above the Bedroom
            </label>
            <label>
              <input type="radio" name="q1" value="d">
              Beside the Master Bedroom
            </label>
          </div>
        </div>
        
        <div class="question">
          <p>2. What is the clue of the secret room?</p>
          <div class="answers">
            <label>
              <input type="radio" name="q2" value="a">
              16269
            </label>
            <label>
              <input type="radio" name="q2" value="b">
              16229
            </label>
            <label>
              <input type="radio" name="q2" value="c">
              16259
            </label>
            <label>
              <input type="radio" name="q2" value="d">
              16191
            </label>
          </div>
        </div>
      </div>
      <button type="submit" class="submit-btn">Submit</button>
    </form>
    
    <div class="result" id="result"></div>
  </div>
  <script>
    const quizForm = document.getElementById('quiz-form');
    const resultDiv = document.getElementById('result');
    const correctAnswers = ['a', 'c'];
    
    quizForm.addEventListener('submit', e => {
      e.preventDefault();
      
      let score = 0;
      const userAnswers = [quizForm.q1.value,quizForm.q2.value];
      userAnswers.forEach((answer, index) => {
        if (answer === correctAnswers[index]) {
          score += 1;
        }
      });
    
      resultDiv.innerHTML = `Your score is ${score}/${correctAnswers.length}`;
    });
</script>
  
</body>

</html>