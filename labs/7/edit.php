<?php
session_start(); 
include 'functions.php';

checkLoggedIn(); 

$memeID = $_GET['id'];
$memeObj = fetchMemeFromDB($memeID); 

function generateOptions() {
    $memeTypes = array(
        "college-grad" => "Happy College Grad", 
        "thinking-ape" => "Deep Thought Monkey", 
        "coding" => "Learning to Code", 
        "old-class" => "Old Classroom"); 
    
    foreach ($memeTypes as $memeType => $description) {
        echo "<option value='$memeType'>$description</option>"; 
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php include 'navigation.php' ?>
    <h1>Edit Meme</h1>
    
    <?php displayMemes(array($memeObj)); ?>
    
    <form method="post">
        <input type="hidden" name="id" value=<?= $memeObj['id'] ?>>
        Line 1: <input type="text" name="line1" ></input> <br/>
        Line 2: <input type="text" name="line2"></input> <br/>
        Meme Type:
        <select name="meme-type">
          <?php generateOptions(); ?>
        </select>
        <br/>
        <input type="submit"></input>
    </form>

         
  </body>
</html>
