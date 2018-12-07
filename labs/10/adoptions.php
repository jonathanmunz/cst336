<?php
// General database request. 
include 'database.php'; 

$dbConn = getDatabaseConnection(); 

$sql = "SELECT id, name, type FROM `pets` WHERE 1"; 
$statement = $dbConn->prepare($sql); 
$statement->execute();

$records = $statement->fetchAll(); 

// print_r($records); 
?>


<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    	  <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   -->
        <style>
            body {
                text-align: center;
            }
            a {
              cursor: pointer;
            }
        </style>
   
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">CSUMB Animal Shelter</a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="index.php">Home</a></li>
                  <li class="nav-item active"><a href="adoptions.php">Adoptions</a></li>
                  <li><a href="aboutus.php">About Us</a></li>
                </ul>
            </div>
        </nav>
	<!--Add main menu here -->
        
        <div class="jumbotron">
          <h1> CSUMB Animal Shelter</h1>
          <h2> The "official" animal adoption website of CSUMB </h2>
        </div>
        
        <?php
        foreach($records as $record) {
           
          echo "<div class='panel panel-default'>";
              echo "<div class='panel-body'>";
                echo "Name:  <a data-toggle='modal' data-target='#petModal' class='petModalActivate' id='" .$record["id"]. "'>" . $record["name"]. "</a> <br>";
                echo "Type: " . $record["type"];
                echo "<button> Adopt Me! </button>";
              echo "</div>";
          echo "</div>";
        }
        
        ?>
        
        <div id="petModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="mod-title"></h4>
              </div>
              <div class="modal-body" id="mod-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>
        
        
       
    </body>
    <script type="text/javascript" src="js/functions.js"></script>
        