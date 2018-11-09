<?php

//creates a function called setup
function setup(){ 
    
    $arraySuit = array(); //create an empty array called arraysuit
    $arraySuit = array("clubs","diamonds", "hearts", "spades"); //add suits to arraysuit
    
    $arrayHand = array(); //create empty array arrayhand
    
//deals all players 5 cards    
    while(count($arrayHand) < 5){
        $card = rand(1,13); //selects random cards
        if(!in_array($card, $arrayHand)){ //in_array is a true or false, checks to see if variable card within array arrayhand, checks to see if the card is not in the hand. Makes sure there is no duplicates
            $arrayHand[] = $card; //if it's not, put 5 random cards in hand
        }
    }
    // display Hand
    foreach($arrayHand as $card){ //loops through array, each index in the array is a card
        $suit = array_rand($arraySuit); //creates variable suite which is equal to a random index in array suit
        $displaySuit = $arraySuit[$suit]; //creates variable display suite which displays the random suite chosen.
       echo "<img src='./img/cards/$displaySuit/$card.png'/>"; //prints the card chosen
    }
    return $arrayHand; //returns hand
}
// creates function play which takes hand as a variable
function play($arrayHand){  
    
    return array_sum($arrayHand); //returns the sum of all the values in arrayHand
}

$randomPlayerPicture = array('batman', 'lexluthor', 'superman', 'thejoker');
shuffle($randomPlayerPicture);

	//include 'lab3/functions.php';
    static $totalHand = array(); //makes total hand accessable without calling the play function, permission thing 
    
    function playerfaces() { //shows the players faces
        $faces = array(); //creates an empty array called faces
        for($i = 0; $i < 4; $i++) { // loops through file and pushes random faces into faces array
        $name = array_pop($randomPlayerPicture);
            array_push($faces, "<img src='img/player_faces/$name.jpg'/>"); //$i.jpg Display random faces, currently only displaying batman
        }
        
        return $faces; //returns faces array
    }
    
    function total($hand) { //create function total which takes one input of hand
        global $totalHand; //calls global variable total hand
        $totalHand[] = $hand; //set array total hand equal to hand
        
    }
    
    function fetchHand() { //create function fetchhand
        global $totalHand; //calls global variable total hand
        return $totalHand; //return it
    }
    
    function score($totalHands) { //create function score which takes the number total hand
        $max = abs(($totalHands[0] - 42)); //sets the maximum to not exceed 42
        global $loc; //declare variable $loc and set it equal to zero
        $loc = 0;
        for($i = 0; $i < count($totalHands); $i++) { //loops through from zero to total
            if($max >= abs($totalHands[$i] - 42)) { //if 
                $max = abs($totalHands[$i] - 42);//set max equal to the absolute value of 
                $loc = $i; //set variable loc to i which keeps track of each players number
            }
        }
        
        switch($loc) { //switch statement to choose winner
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
        $picArray = playerfaces(); //declare variable pic array which is equal to the function playerfaces() which creates 4 random players
       
        for($i = 0; $i < 4; $i++) { //loops through 4 times, (plays game for each player)
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