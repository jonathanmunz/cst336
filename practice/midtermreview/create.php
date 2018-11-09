<?php
//change to create.php/ homepage
include "./database.php"; // connects to the database.php file


if(isset($_POST['line1']) && isset($_POST['line2'])) {
 if(!($_POST['line1'] == '' || $_POST['line2'] == '')){
   $dbConn = getDatabaseConnection();
   $sql = "INSERT INTO `q_quotes` (`quote`, `author`) VALUES ('".$_POST['line1']."','". $_POST['line2']."');";  
   $statement = $dbConn->prepare($sql); 
   $result = $statement->execute(); 
 }
}

if($result){
  header("Location: midtermreview.php");
  end;
}

?>

<!–– Style Below-->
<!DOCTYPE html> 
<html>
  <head>
    <link href="css/style.css" rel="stylesheet" type="text/css" /> <!-- Connects to style sheet -->
    <title>Create.php</title>
  </head>
  <body>
    <h1>Create a new quote:</h1>
    <?php
    if(isset($_POST['line1']) && isset($_POST['line2'])) {
      echo "<ul>";
      if(($_POST['line2']) == '') {
        echo "<li> You must input an author! <br> ";
        }
      if(($_POST['line1']) == '') {
        echo "<li> You must input a quote! <br> ";
        }
      echo "</ul>";
    }
    ?>
    
    <form method="post" action="create.php"> 
        Text: <input type="text" name="line1"></input> <br/> <br>
        Author: <input type="text" name="line2"></input> <br/> <br>
        <input type="submit"></input> 
    </form>
    
  </body>
</html>