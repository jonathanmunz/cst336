<?php

// connect to our mysql database server

function getDatabaseConnection() {
    $host = "localhost";
    $username = "jon";
    $password = "cst336"; // best practice: define this in a seperate file
    $dbname = "midterm1"; //change to midterm1 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

// temporary test code
//$dbConn = getDatabaseConnection(); 


?>
