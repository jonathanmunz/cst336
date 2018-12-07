<?php
// General database request. 
include '../database.php'; 

$dbConn = getDatabaseConnection(); 

$sql = "SELECT * FROM `pets` WHERE id = " . $_POST["id"]; 
$statement = $dbConn->prepare($sql); 
$statement->execute();

$records = $statement->fetchAll(); 

header('Content-Type: application/json');
echo json_encode($records);

?>
