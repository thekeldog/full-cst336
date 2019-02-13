$(document).ready(function() {

            var randomNumber = Math.floor(Math.random() * 99) + 1;
            console.log(randomNumber);
            var guesses = document.getElementById("guesses");
            var lastResult = document.getElementById("lastResult");
            var lowOrHi = document.getElementById("lowOrHi");

            var guessSubmit = document.getElementById("guessSubmit");


            var guessField = document.querySelector(".guessField");

            var guessCount = 1;

            var resetButton = document.getElementById("reset");
            resetButton.addEventListener("click", function() {
                resetGame();
            });

            // guessSubmit.addEventListener('click', checkGuess());
            guessSubmit.addEventListener('click', function() {
                console.log('clicked');
                checkGuess();
            });

            resetButton.style.display = "none";

            function legalGuess(guess) {
                return (Boolean( !isNaN(guess) && guess < 100 && guess >= 0));
            };

            function checkGuess() {
                $('lowOrHi').hide();
                console.log("Check guess clicked");
                var userGuess = Number(guessField.value);
                console.log(userGuess);
                if(!legalGuess(userGuess)){
                    console.log("seems too high");
                    $('#lowOrHi').css("backgroundColor","blue");
                    $('#lowOrHi').css("color","white");
                    $("#lowOrHi").html("Please select a number between 0 and 100");
                    $('#guesses').show();
                    $('#lastResult').show();
                    $("#lowOrHi").show();
                    return;
                }
                
                if (userGuess === randomNumber) {
                    lastResult.innerHTML = 'Congratulations! You got it right!';
                    lastResult.style.backgroundColor = 'green';
                    lowOrHi.innerHTML = '';
                    setGameOver();
                }
                else if (guessCount >= 7) {
                    lastResult.innerHTML = 'Sorry, you lost!';
                    setGameOver();
                }
                else {
                    lastResult.innerHTML = 'Wrong!';
                    lastResult.style.backgroundColor = 'red';
                    if (userGuess < randomNumber) {
                        lowOrHi.innerHTML = 'Last guess was too low!';
                    }
                    else if (userGuess > randomNumber) {
                        lowOrHi.innerHTML = 'Last guess was too high!';
                    }
                }
                guessCount++;
                guessField.value = '';
                guessField.focus();

                //

            }

            function setGameOver() {
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
            }

            function resetGame() {
                console.log("reset clicked");
                guessCount = 1;

                var resetParas = document.querySelectorAll('.resultParas p');
                for (var i = 0; i < resetParas.length; i++) {
                    resetParas[i].textContent = '';
                }

                resetButton.style.display = 'none';

                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();

                lastResult.style.backgroundColor = 'white';

                randomNumber = Math.floor(Math.random() * 99) + 1;
}
})