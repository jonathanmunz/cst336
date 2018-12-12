<?php

    //include 'functions.php'; 
    
    checkLoggedIn(); 

    session_start(); 
    
    session_destroy(); 
    
    header("Location: index.php"); 
?>
