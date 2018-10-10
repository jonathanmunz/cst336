<?php 
    session_start();
    
    if(isset($_POST['destroy'])){
        session_destroy();
        session_start();
    }
    if(isset($_POST['name'])){
        for($i=0; $i<6; $i++){
            echo "hello";
        }
    }
    
    
    
    
    if(!isset($_SESSION['randomVal'])){
        $_SESSION['randomVal'] = str_split('abcdefghijklmnopqrstuvqwxyz'
                                            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                                            .'0123456789!@#$%^&*()');
        shuffle($_SESSION['randomVal']);
        $rand = '';
    }
    // if(!isset($_SESSION['hello'])){
    //     $_SESSION['1'] = str_split('abcdefghijklmnopqrstuvqwxyz'
    //                                         .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    //                                         .'0123456789!@#$%^&*()');
    //     shuffle($_SESSION['1']);
    //     $rand = '';
    //     echo "one";
    //     shuffle($_SESSION['2']);
    //     $rand = '';
    //     echo "two";
    //     shuffle($_SESSION['3']);
    //     $rand = '';
    //     echo "three";
    // }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HTML Forms Experimentation</title>
        <style>
            #issues {
                display: flex;
                margin: auto;
                text-align: center;
            }
            
        </style>
    </head>
    <body>
        <!--<form action="file.php" method="post">-->
        Random Number: <?php echo $_SESSION['randomVal'] ?>
        
        <form action="index.php" method="POST">
            <div>
                <!--'for' attribute is tied to 'id' of input, not 'name'-->
                <label for="name">How many passwords?:</label> 
                <input type="text" name="name" id="name" />
                <label for="name">(No more than 8)</label>
            </div>
            <br>
            <div>
                <label for="issues">Password Length</label>
                <div id="issues">
                    <div><input type="checkbox" name="issues[]" value="1" />6 Characters</div>
                    <div><input type="checkbox" name="issues[]" value="2" />8 Characters</div>
                    <div><input type="checkbox" name="issues[]" value="3" />10 Characters</div>
                </div>
            </div>
            <br>
            <div>
                <div><input type="checkbox" name="issues[]" value="3" />Include digits(up to 3 digits will be part of the password)</div>
                <div>
                    <!--<textarea name="comments" rows="3"></textarea>-->
                </div>
                <br>
            </div>
            <div>
                <input type="submit" value="Create Passwords!" /> <br>
            </div>
            <br>
            
            <div>
                <input type="submit" value="Display Password History" />
            </div>
        </form>
        
    </body>
</html>

<?php

//require('log.inc.php');

?>