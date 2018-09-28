<?php


function setup(){ 
    
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
function play($arrayHand){  
    
    return array_sum($arrayHand);
}

	//include 'lab3/functions.php';
    static $totalHand = array();
    function playerfaces() { //shows the players faces
        $faces = array();
        for($i = 0; $i < 4; $i++) {
            array_push($faces, "<img src='img/player_faces/batman.jpg'/>"); //$i.jpg Display random faces
        }
        
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
        $max = abs(($totalHands[0] - 42));
        $loc = 0;
        for($i = 0; $i < count($totalHands); $i++) {
            if($max >= abs($totalHands[$i] - 42)) {
                $max = abs($totalHands[$i] - 42);
                $loc = $i;
            }
        }
        
        switch($loc) {
            case 0:
                return "Player 1";
                break;
            case 1:
                return "Player 2";
                break;
            case 2:
                return "Player 3";
                break;
            case 3:
                return "Player 4";
                break;
            default:
                echo "Tie!";
        }
    }
?>
<DOCTYPE! HTML>
<html>
<head>
<title>MarvelJack</title>
<link href="css/styles.css" rel="stylesheet"> 
</head>
<body>
<div id="wrapper">
	<h1 id="title">Marvel Jack!</h1>

	<?php
        $picArray = playerfaces();
       
        for($i = 0; $i < 4; $i++) {
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