<?php


function setup(){ 
    
    $arraySuit = array(); 
    $arraySuit = array("dice");
    
    $arrayHand = array();
//deals all players 5 cards    
    while(count($arrayHand) < 2){
        $card = rand(1,6); //selects random cards
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

function play($arrayHand){  
    
    return array_sum($arrayHand);
}

    static $totalHand = array();
    
    function playerfaces() { //shows my face
        $faces = array();
            array_push($faces, "<img src='img/player_faces/jonathan_munz.JPG'/>"); 
            array_push($faces, "<img src='img/player_faces/thejoker.jpg'/>"); 
        
        
        return $faces;
    }
    
    function total($hand) { 
        global $totalHand;
        $totalHand[] = $hand;
        
    }
    
    function fetchHand() { 
        global $totalHand;
        return $totalHand;
    }
    
    function score($totalHands) { 
        $max = abs(($totalHands[0] - 21));
        $loc = 0;
        
        if($totalHands[0]>$totalHands[1]){
            $loc = 0;
        }
        elseif($totalHands[0]<$totalHands[1])
        {
            $loc = 1;
        }
        else
        {
            $loc = 2; 
        }
            
           
        switch($loc) {
            case 0:
                return "Jonathan";
                break;
            case 1:
                return "Dealer";
                break;
            default:
                return "Tie!";
                break;
        }
    }
        
     
?>
<DOCTYPE! HTML>
<html>
<head>
<title>Dice</title>
<link href="css/styles.css" rel="stylesheet"> 
</head>
<body>
<div id="wrapper">
	<h1 id="title">Dice!</h1>

	<?php
        $picArray = playerfaces();
       
        for($i = 0; $i < 2; $i++) {
            echo $picArray[$i]; // display pictures
            $hand = setup(); // create players hand 
            $sum = play($hand); // get hand total
            total($sum); // add to the array hand of totals
            echo "<span>" . $sum . "</span><br/>"; // print total
        }
	?>

    <br/>
    <?= "<p id='winner'>Winner : " . score(fetchHand()) . "</p>"; ?> <! announce winner>
    <br/>
    <button type="button" onClick="window.location.reload()">Refresh</button> <! refresh button>
	<footer>
		
	</footer>
	
</div>
</body>
</html>