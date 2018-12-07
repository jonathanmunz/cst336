<?php
// connect to our mysql database server

function getDatabaseConnection() {
    $host = "localhost";
    $username = "jon";
    $password = "cst336";
    $dbname = "meme_labp"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

?>
