<?php
//This is already in index, need to call this function in index.php, and remove from here. This is doing nothing right now
function generateHand(){
    
    $arraySuits = array();
    $arraySuits = array("clubs","diamonds", "hearts", "spades");
    
    $arrayHand = array();
    
    while(count($arrayHand) < 5){
        $card = rand(1,13);
        if(!in_array($card, $arrayHand)){
            $arrayHand[] = $card;
        }
    }
    // display arrayhand
    foreach($arrayHand as $card){
        $suit = array_rand($arraySuits);
        $displaySuit = $arraySuits[$suit];
       echo "<img src='./img/cards/$displaySuit/$card.png'/>";
    }
    return $arrayHand;
}
function generateTotal($arrayHand){
    
    return array_sum($arrayHand);
}
?>