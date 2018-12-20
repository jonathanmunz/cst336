<?php

include "database.php";

$dbConn = getDatabaseConnection();

// Build the select statement (assuming the posted data has a field called dataFromPost)
$whereSql = "
SELECT p.*, s.name AS 'status_name', t.name AS 'type_name'
FROM page p INNER JOIN
    status s ON p.status_id = s.id LEFT OUTER JOIN
    type t ON p.type_id = t.id
WHERE status_id <> 0
";

// The prepare caches the SQL statement for N number of parameters imploded above
$whereStmt = $dbConn->prepare($whereSql);

// Just have to pop in the associative array that comes from json_decode
// $postedAssocArray
$whereStmt->execute();

// Returns associative array instead of a cursor
$sqlQueryResultsAssocArray = $whereStmt->fetchAll();

header("Content-Type: application/json");
echo json_encode($sqlQueryResultsAssocArray);
        

// $whereSql = "INSERT INTO page(code, title, from_date, to_date, type_id) VALUES (:code, :title, :fromDate, :toDate, :typeId) ";
        
//         // The prepare caches the SQL statement for N number of parameters imploded above
//         $whereStmt = $dbConn->prepare($whereSql);
        
//         // Just have to pop in the associative array that comes from json_decode
//         $whereStmt->execute($postedJsonData);


    
?>