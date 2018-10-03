<!DOCTYPE html>
<html>
    <head>
        <title>Aces vs Kings</title>
    </head>
    <body>
        
        <div>
            <a href="index.php">Go Back to Index</a>
        </div>
        
        <?php
        cardTable($_POST["numRows"],$_POST["numCols"]);
        ?>
        
    </body>
</html>

    <?php
    echo "hi";
    function cardTable($rows, $cols){
        echo "<tables>";
        for($i =$post; $i > 0; $i--){
            echo "<tr>";
            for($j = $cols; $j > 0; $j--){
                echo "<td>";
                cards();
                echo "</td>";
            }
            echo "</tr>";
        }
    }
    
    function cards(){ 
    
    $arraySuit = array(); 
    $arraySuit = array("clubs","diamonds", "hearts", "spades");
    
    $arrayHand = array();
//deals all players 5 cards    
    while(count($arrayHand) < 5){
        $card = rand(1,13); //selects random cards
        if(!in_array($card, $arrayHand)){
            $arrayHand[] = $card;
        }
    }
    // display Hand
    foreach($arrayHand as $card){
        $suit = array_rand($arraySuit);
        $displaySuit = $arraySuit[$suit];
       echo "<img src='./img/cards/$displaySuit/$card.png'/>";
    }
    return $arrayHand;
}
    
    ?>



