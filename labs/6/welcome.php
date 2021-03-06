<?php

include "./database.php"; // connects to the database.php file
//function to display meme
function displaySingleMeme(){ 
     $dbConn = getDatabaseConnection(); 
     $sql = "SELECT * FROM `all_memes` ORDER BY RAND() LIMIT 1"; // Displays a random meme from the database
     $statement = $dbConn->prepare($sql); //important code tyo use SQL, sql SELECT statement is a search, use these three lines to connect to database
     $statement->execute(); //important
     $records = $statement->fetchAll(); //interact with my SQL database, records stores all of our text, results of what is retrieved
     $record = $records[0]; //The first record saved
     $memeURL = $record['meme_url'];
     echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; //display meme from database
     echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; //Iterates through all the records
     echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
     echo  '</div>'; 
}



?>

<!–– Style Below-->
<!DOCTYPE html> 
<html>
  <head>
    <style>
      .meme-div{
        width: 450px;
        height: 450px;
        background-size: cover;
        text-align: center;
        position: relative;
        font-size: 18px;
      }
      
      .memes-container .meme-div{
        width: 150px;
        height:150px;
        float: left;
        margin: 10px 20px;
      }
      
      .memes-container .meme-div h2 {
        font-size: 18px;
      }
      
      
      h2 {
        position: absolute;
        left: 0;
        right: 0;
        margin: 15px 0;
        padding: 0 5px;
        font-family: impact;
        color: white;
        text-shadow: 1px 1px black;
      }
      .line1 {
         top: 0;
       }
      .line2 {
         bottom: 0;
       }
    </style>
    
    <title>Welcome</title>
  </head>
  <body>
    <h1>Meme Generator</h1>
    <?php
    displaySingleMeme();
    ?>
    
    
    
    <h3>Welcome to my Meme Generator!</h3>
    
    <form method="post" action="meme.php"> <!––Transfers to meme.php when submit button is pressed-->
        Line 1: <input type="text" name="line1"></input> <br/>  <!–– First Line of input-->
        Line 2: <input type="text" name="line2"></input> <br/> <!––Second Line of input -->
        Meme Type:
        <select name="meme-type"> <!––Drop down with meme seclection choice -->
          <option value="college-grad">Happy College Grad</option><!––Meme Choices -->
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select>

        <input type="submit"></input> <!––Submit button -->
    </form>
    
    <a href="./meme.php">View all memes</a>
    
    
  </body>
</html>