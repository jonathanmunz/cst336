<?php

// PLAN:
// 1. generate a random number done
// 2. Have a form where user can enter their guess
// 3. form validation logic, too high or low
// 4. store the history
// 5. clear the session (startover button) done
session_start(); 

$num = rand(1, 100);
// user has already clicked destroy

if(isset($_POST['destroy'])){
    
    session_destroy();
}
session_start(); 

if(!isset($_SESSION['randomVal'])) {
    $_SESSION['randomVal'] = rand(1, 100);
}

?>

<!DOCTYPE html>
<html>
    <title>Guess a number between 1-100</title>
    <head>Guess a number between 1-100 <br> </br></head>
    
    <body>
        <form action="save.php" method="POST">
            <div>
                <label for="name">Your guess:</label> 
                <input type="text" name="name" id="name" /> <br> </br>
                <label for="name">Previous guesses:</label> <br> </br>
                <label for="name">Number of attempts:</label> <br> </br>
                
            </div>
            
        Random number: <?php echo $_SESSION['randomVal'] ?>
        <?php 
        if (Your guess > Random number)
        {
        echo "Too High"; 
        }
        else if (Your guess = random number)
        echo "Winner!"
        else
        echo "Too Low";
        ?>
        <form method="post">
            <input type="submit" name="destroy" value="Start Over"> 
        </form>
        
        
    </body>
</html>




