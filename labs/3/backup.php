<?php


function generateHand(){ //change to setup
    
    $arraySuits = array();
    $arraySuits = array("clubs","diamonds", "hearts", "spades");
    
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
        $suit = array_rand($arraySuits);
        $displaySuit = $arraySuits[$suit];
       echo "<img src='./img/cards/$displaySuit/$card.png'/>";
    }
    return $arrayHand;
}
function generateTotal($arrayHand){ //change to play
    
    return array_sum($arrayHand);
}

	//include 'lab3/functions.php';
    static $totalHand = array();
    function displayFaces() { //shows players faces, change to playerfaces
        $faces = array();
        for($i = 0; $i < 4; $i++) {
            array_push($faces, "<img src='img/player_faces/thejoker.jpg'/>"); //$i Display random faces
        }
        
        return $faces;
    }
    
    function addToHand($hand) { //change to 
        global $totalHand;
        $totalHand[] = $hand;
        
    }
    
    function getHand() { //change to
        global $totalHand;
        return $totalHand;
    }
    
    function findWinner($totalHands) { //change to score
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
        $faceArr = displayFaces();
       
        for($i = 0; $i < 4; $i++) {
            echo $faceArr[$i]; // display pictures
            $hand = generateHand(); // generate players hand // change to setup
            $sum = generateTotal($hand); // get the total of the hand
            addToHand($sum); // add to the array hand of totals
            echo "<span>" . $sum . "</span><br/>"; // print total
        }
	?>

    <br/>
    <?= "<p id='winner'>And the Winner Is : " . findWinner(getHand()) . "</p>"; ?> <! announce winner>
    <br/>
    <button type="button" onClick="window.location.reload()">Refresh</button> <! refresh button>
	<footer>
		
	</footer>
	
</div>
</body>
</html>