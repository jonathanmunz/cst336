
            
            // Your JavaScript goes here
            var randomNumber = Math.floor(Math.random() * 99 + 1);
            var guesses = document.querySelector('#guesses');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
            
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            
            var guessCount = 1;
            var resetButton = document.querySelector('#reset');//might be just var resetButton; 
            guessField.focus(); //places cursor into the text field as soon as the page loads
            resetButton.style.display = 'none'; //Hides button
            
            console.log(randomNumber);
            document.getElementById("numberToGuess").innerHTML = randomNumber; 
            
            //Reusable code
            function checkGuess() {
                var userGuess = Number(guessField.value); //Number checks to see if the character entered is a number
                if (guessCount === 1){ //tests datatype as well?
                    guesses.innerHTML = 'Previous guesses: ';
                }
                guesses.innerHTML += userGuess + ' ';
                
                    if (userGuess === randomNumber) {
                        lastResult.innerHTML = 'Congratulations! You got it right!';
                        lastResult.style.backgroundColor = 'green';
                        lowOrHi.innerHTML = ''; 
                        setGameOver(); 
                    } else if (guessCount === 7) {
                        lastResult.innerHTML = 'Sorry, you lost!';
                        setGameOver(); 
                    } else {
                        lastResult.innerHTML = 'Wrong!';
                        lastResult.style.backgroundColor = 'red';
                        if(userGuess < randomNumber){
                            lowOrHi.innerHTML = 'Last guess was too low!';
                        } else if(userGuess > randomNumber) {
                            lowOrHi.innerHTML = 'Last guess was too high!';
                        }
                    }
                    
                    guessCount++; // adds one to guess count
                    guessField.value = ''; //empties the guess field
                    guessField.focus(); // adds focus? Clears everything?
            }
            
            guessSubmit.addEventListener('click', checkGuess); //When submit button is pressed, checks guess
            
            function setGameOver(){
                guessField.disabled = true; //disable guess field after game ends
                guessSubmit.disabled = true; //disable submit button after game ends 
                resetButton.style.display = 'inline'; //make button visable once more
                resetButton.addEventListener('click', resetGame); //adds event listener which calls function resetGame()
            }
            
            function resetGame() {
                guessCount = 1; //Puts the guessCount back down to 1
                
                var resetParas = document.querySelectorAll('.resultParas p'); //Clears all the information paragraphs
                for (var i = 0; i < resetParas.length; i++){
                    resetParas[i].textContent = '';
                }
                
                resetButton.style.display = 'none'; //Hides the reset button
                
                guessField.disabled = false; //enables the guess field
                guessSubmit.disabled = false; //enables the submit button
                guessField.value = ''; //resets guessField to blank
                guessField.focus(); // still not sure
                
                lastResult.style.backgroundColor = 'white'; //removes color from the lastResult paragraph
                
                randomNumber = Math.floor(Math.random() * 99) + 1; //generates a new random bumber
            }
        