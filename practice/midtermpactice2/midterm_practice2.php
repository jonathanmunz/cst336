<?php

// connect to our mysql database server
function getDatabaseConnection() {
    $host = "localhost";
    $username = "jon";
    $password = "cst336"; // best practice: define this in a seperate file
    $dbname = "midterm"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

// temporary test code
//$dbConn = getDatabaseConnection(); 

//This code is used to connect to the database and retrieve data |
//List all cities/towns that have a population between 50,000 and 80,000                                                               V
$dbConn = getDatabaseConnection(); 
$sql = "SELECT town_name, population FROM mp_town WHERE population < 80000 AND population > 50000;"; // search = select, insert, delete, make changes or access the database
$statement = $dbConn->prepare($sql); //important code tyo use SQL, sql SELECT statement is a search
$statement->execute(); //important
$table1 = $statement->fetchAll(); //interact with my SQL database, records stores all of our text, results of what is retrieved

//List all towns and population, ordered by population (from biggest to smallest)
$sql = "SELECT town_name, population FROM mp_town ORDER BY population DESC;"; // selecting a town and ordering by population
$statement = $dbConn->prepare($sql); //important code tyo use SQL, sql SELECT statement is a search
$statement->execute(); //important
$table2 = $statement->fetchAll(); //interact with my SQL database, records stores all of our text, results of what is retrieved

//List the three least populated towns
$sql = "SELECT town_name, population FROM mp_town ORDER BY population ASC LIMIT 3;"; // search = select, insert, delete, make changes or access the database
$statement = $dbConn->prepare($sql); //important code tyo use SQL, sql SELECT statement is a search
$statement->execute(); //important
$table3 = $statement->fetchAll(); //interact with my SQL database, records stores all of our text, results of what is retrieved

//List the counties that start with the letter "S"
$sql = "SELECT county_name FROM mp_county WHERE county_name LIKE 'S%';"; // search = select, insert, delete, make changes or access the database
$statement = $dbConn->prepare($sql); //important code to use SQL, sql SELECT statement is a search
$statement->execute(); //run the code?
$table4 = $statement->fetchAll(); //interact with my SQL database, records stores all of our text, results of what is retrieved, retrieves data
//print_r($records); used for testing

//All this below displays the data
echo "<h1> Cities/towns that have a population between 50,000 and 80,000 </h1>"; //Title
//Loops through the array
foreach($table1 as $line){
    echo $line['town_name'] . " - " . $line['population'] . '<br>';
    
}
echo "<br>"; //Break statement for space, Must use the echo command when running within PHP. Not required if not in php statement
//HTML = Display, php = functions
echo "<h1> All towns and population </h1>"; //Title
//Loops through each line in table 2 array, and echo's out the data
foreach($table2 as $line){
    echo $line['town_name'] . " - " . $line['population'] . '<br>' ; //town_name and population are the variable names in which the data is stored. Not being displayed
    
}

echo "<br>"; //Space

echo "<h1> The three least populated towns </h1>"; //title

foreach($table3 as $line){
    echo $line['town_name'] . " - " . $line['population'] . '<br>' ; //Name and population of table three, which lists the three least populated towns. 
    
}

echo "<br>"; // Space

echo "<h1> The counties that start with the letter 'S' </h1>"; //Title

foreach($table4 as $line){
    echo $line['county_name'] . '<br>' ; //Countries from table 4
    
}

echo "<br>"; // Space

?>

