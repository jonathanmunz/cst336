<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My First PHP Doc</title>
        <?php
        
        //echo "Hello World from within the Head";
        
        ?>
    </head>
    <body>
        <h1>This is Heading 1 content. </h1>
          <?php
        
        /*echo "Hello World from within the Body";
        */
        
        $MyVar = "My First Var";
        $_MyNumVar= 2112; 
        
        
       // echo $myVar;
       // echo $_myNumVar;
       $Val1 = 40;
       $Val2 = 25; 
       $Val3 = 10; 
       $mystr1 = "Hello"; 
       $mystr2 = "World"; 
       
       
       $NewVar = $mystr1. " " .$mystr2; 
       
       $Cal = $Val1 /$Val2 -$Val3; 
       
       //echo $Cal;
       //echo $NewVar; 
       //echo strlen($mystr1);
       echo strpos($mystr1, "ello");
        
        
        ?>
    </body>
</html>