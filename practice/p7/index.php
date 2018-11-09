<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT DISTINCT(category) FROM p1_quotes ORDER BY category";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    
    foreach ($records as $record) {
        echo "<option value='".$record['quoteId']."'>" . $record['category'] . "</option>";
    }
}
function getKey(){
    global $dbConn;
    
    $key = $_GET['keyword'];
    $sql = "SELECT * FROM `p1_quotes` WHERE quote LIKE '$key'";
     $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    
    foreach ($records as $record) {
        echo "<option value='".$record['quoteId']."'>" . $record['category'] . "</option>";
    }
    
    
}

/*function getOrder(){
    if(isset($_GET['option'])){
        if($_GET['option'] == 'A-Z'){
            global $dbConn;
              
              $sql = "SELECT * FROM p1_quotes ORDER BY quote";
            
              if($_GET['category'] == 'Life'){
                   $sql = "SELECT quote Life FROM p1_quotes ORDER BY quote";
              }
              if($_GET['category'] == 'Humor'){
                   $sql = "SELECT quote Humor FROM p1_quotes ORDER BY quote";
              }
              if($_GET['category'] == 'Motivation'){
                   $sql = "SELECT quote Motivation FROM p1_quotes ORDER BY quote";
              }
              if($_GET['category'] == 'Philosophy'){
                   $sql = "SELECT quote Philosophy FROM p1_quotes ORDER BY quote";
              }
              if($_GET['category'] == 'Reflection'){
                   $sql = "SELECT quote Reflection FROM p1_quotes ORDER BY quote";
              }
              
              $stmt = $dbConn->prepare($sql);
              $stmt->execute();
              $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    
              foreach ($records as $record) {
                    echo "<option value='".$record['quoteId']."'>" . $record['quote'] . "</option>";
                }
        }
        else{
            global $dbConn;
    
              $sql = "SELECT * FROM p1_quotes ORDER BY quote DESC";
              $stmt = $dbConn->prepare($sql);
              $stmt->execute();
              $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    
              foreach ($records as $record) {
                    echo "<option value='".$record['quoteId']."'>" . $record['quote'] . "</option>";
                }
        
        } 
       
        
    }
   
} */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Quote Finder</title>
        <h1>Famous Quote Finder</h1>
    </head>
    <body>
        <form method="GET">
            Enter Quote Keyword: <input type="text" name="keyword" size="10" value= '<?php echo $_GET["keyword"] ?>'><br/>
            <br>
            Category: 
            <select name="category">
               <option value=""> Select one </option>  
               <?=displayCategories()?>
            </select>
            <br><br>
            Order: <br>
             <input type="radio" name="option" value = "A-Z"<?php if($_GET["option"] == 'A-Z') {echo 'checked';}?>/><b>A-Z</b> <br>
            <input type="radio" name="option" value = "Z-A"<?php if($_GET["option"] == 'Z-A') {echo 'checked';}?>/><b>Z-A</b> <br>
            <br>
            <input type="submit" name="Display Quotes!"  value="submit" /><br><br>
        </form>
         <?php getKey(); ?>

    </body>
</html>