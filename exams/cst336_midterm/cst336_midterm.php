<?php
//change to cst336_midterm.php
include 'database.php';


function createMeme($line1, $line2, $memeType) {
    
    // construct the proper SQL INSERT statement
    $dbConn = getDatabaseConnection(); 
    $sql = "INSERT INTO q_quotes (`quote`, `author`, `num_likes`) VALUES ('$line1', '$line2', '$memeType');"; 
    echo $sql; 
    $statement = $dbConn->prepare($sql); 
    $result = $statement->execute(); 
    
    if (!$result) {
      return null; 
    }
    
    $last_id = $dbConn->lastInsertId();

    
    // fetch the newly created object from database
    $sql = "SELECT * from q_quotes WHERE quoteid = $last_id"; //displays last meme
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    $newMeme = $records[0]; //change to random quote
    
    return $newMeme; //change to random quote
    
}

function displayMemes() {
    $dbConn = getDatabaseConnection(); 
    
    $sql = "SELECT * from q_quotes WHERE 1";  
    
    
    
    if(isset($_POST['search']) && !empty($_POST['search'])) {
      // query the databse for any records that match this search
      //$sql = "SELECT * from all_memes WHERE line1 LIKE '%{$_POST['search']}%' OR line2 LIKE '%{$_POST['search']}%'";
      
      $sql .= " AND (line1 LIKE '%{$_POST['search']}%' OR line2 LIKE '%{$_POST['search']}%')"; 
     
    }
    
    if(isset($_POST['meme-type']) && !empty($_POST['meme-type'])) {
      $sql .= " AND meme_type = '{$_POST['meme-type']}'"; 
    }
    
    if(isset($_POST['order-by-date'])) {
      $sql .= " ORDER BY create_date"; 
      
      if ($_POST['order-by-date'] == 'newest-first') {
        $sql .= " DESC"; 
      }
    }

    
    //echo "sql: $sql <br/>"; //displays sql code that we are submitting

    $statement = $dbConn->prepare($sql); //important code to use SQL, sql SELECT statement is a search
    $statement->execute(); //important
    $records = $statement->fetchAll(); //interact with my SQL database, records stores all of our text, results of what is retrieved
    
    foreach ($records as $record) {
       $memeURL = $record['meme_url']; 
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; //display meme from database
       echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; //Iterates through all the records
       echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
       echo  '</div>'; 
    }
} 


if (isset($_POST['line1']) && isset($_POST['line2'])) {
  $memeObj = createMeme($_POST['line1'], $_POST['line2'], $_POST['meme-type']); 
}

if(isset($_POST['search'])) {
  // query the databse for any records that match this search
  
  $dbConn = getDatabaseConnection(); 
  $sql = "SELECT * from q_quotes WHERE line1 = '{$_POST['search']}'";
  
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
  $records = $statement->fetchAll(); 
}




?>

<!DOCTYPE html>
<html>
  <head>
    <title>A Meme</title>
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
  </head>
  <body>
    <?php if ($memeObj) {  ?>
      <h1>Your Quote</h1>
      <!--The image needs to be rendered for each new meme
      so set the div's background-image property inline -->
      <div class="meme-div" style="background-image:url(<?= $memeObj['meme_url']; ?>)">
        <h2 class="line1"> <?=  $memeObj['line1'] ?> </h2>
        <h2 class="line2"> <?=  $memeObj['line2'] ?> </h2>
      </div>
    <?php } ?>
    
    <!--<h1>All memes</h1>-->
    <!--<form method="post" action="meme.php">-->
    <!--    Search:  <input type="text" name="search"></input> -->
    <!--    Meme type: -->
    <!--    <select name="meme-type">-->
    <!--      <option value=""></option>-->
    <!--      <option value="college-grad">Happy College Grad</option>-->
    <!--      <option value="thinking-ape">Deep Thought Monkey</option>-->
    <!--      <option value="coding">Learning to Code</option>-->
    <!--      <option value="old-class">Old Classroom</option>-->
    <!--    </select>-->
    <!--    <br/>-->
        
    <!--    <br>-->
        <form method="post" action="create.php"> 
        <input type="submit" value="Create"></input>
        </form>
    </form>
    <div class="memes-container">
      <!--<?php displayMemes(); ?>-->
      <div style="clear:both"></div>
    </div>
    
  </body>
</html>