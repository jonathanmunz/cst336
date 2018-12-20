<?php

include "database.php";

$dbConn = getDatabaseConnection();

// print_r($_POST);

// "code": $("#code").val(),
//             "fromDate": $("#fromDate").val(),
//             "toDate": $("#toDate").val(),
//             "typeId": typeId,
//             "statusId": $("#statusId").val(),
//             "title": $("#title").val(),
//             "action": $("#action").val(),
//             "slogan": $("#slogan").val(),
//             "description": $("#description").val(),

$whereSql = "INSERT INTO page(code, title, from_date, to_date, type_id) VALUES ('" + $_POST['code'] + "', '" + $_POST['title'] + "' , '" + $_POST['fromDate'] + "', '" + $_POST['toDate'] + "', '" + $_POST['typeId'] + "') ";

// The prepare caches the SQL statement for N number of parameters imploded above
$whereStmt = $dbConn->prepare($whereSql);

// Just have to pop in the associative array that comes from json_decode
$whereStmt->execute();



header("Content-Type: application/json");
echo json_encode($sqlQueryResultsAssocArray);
        




    
?>