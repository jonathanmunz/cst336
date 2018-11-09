<?php
//change to cst336_midterm.php
include 'database.php';
function displayQuotes() {
    $dbConn = getDatabaseConnection(); 
    $sql = "SELECT * FROM `q_quotes` ORDER BY RAND() LIMIT 1"; // Displays a random quote from the database
    $statement = $dbConn->prepare($sql); //important code to use SQL, sql SELECT statement is a search
    $statement->execute(); //important
    $records = $statement->fetchAll(); //interact with my SQL database, records stores all of our text, results of what is retrieved
    echo "<h1>" . $records[0][quote] . "</h1> <br>";
    echo "<h2> -" . $records[0][author] . "</h2> <br>"; 
} 

?>

<!DOCTYPE html>
<html>
  <head>
    <link href="css/style.css" rel="stylesheet" type="text/css" /> <!-- Connects to style sheet -->
    <title>A Quote</title>
    
  </head>
  <body>
    <?php
    displayQuotes();
    ?>
    
    <a href="create.php">Create</a> <!-- Hyperlink to create page -->
  </body>
</html>