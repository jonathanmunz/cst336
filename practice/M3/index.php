<!DOCTYPE html>
<html>
    <?php
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
       echo "<img src='cards/$displaySuit/$card.png'/>";
    }
    return $arrayHand;
}
    
    ?>
    <head>
        <title>Aces vs Kings</title>
    </head>
    <body>
        
        <form action="save.php" method="POST">
            <div>
             
            </div>
            <div>
                <label for="Aces vs Kings">Aces vs Kings:</label>
                <div id="Aces vs Kings">
                    </div>
                    <div>
                    <label for="numRows">Number of Rows: </label>
                    <input type="text" name="rows" id ="numRows"/>
                    </div>
                    <div>
                    <label for="numRows">Number of Columns: </label>
                    <input type="text" name="Columns" id ="numColumns"/>
                    </div>
                    
                    <div>
                    <div style="padding:20px; display:inline-block;">Suit to Omit</div>
                    <select name="types">
                        <option value="hearts">Hearts </option>
                        <option value="clubs">Clubs </option>
                        <option value="diamonds">Diamonds </option>
                        <option value="spades">Spades </option>
                    </select>
                    <input type="submit" value"Submit"/>
                </div>
            </div>
            <div>
               
                <div>
                  
                </div>
            </div>
            <div>
            </div>
        </form>
        
    </body>
</html>

