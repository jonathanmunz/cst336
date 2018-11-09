<?php
//change to create.php/ homepage
include "./database.php"; // connects to the database.php file

if(empty($_POST['line1']) && empty($_POST['line2'])) {
  echo "You must select an author and text!";
     
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
    
    <title>Create.php</title>
  </head>
  <body>
    <h1>Create a new quote:</h1>
    <?php
    ?>
    
    <form method="post" action="cst336_midterm.php"> 
        Text: <input type="text" name="line1"></input> <br/> <br>
        Author: <input type="text" name="line2"></input> <br/> <br>
        <input type="submit"></input> 
    </form>
    
  </body>
</html>