<?php
session_start();
/*
Planning: 
- Create a form 
- Handle the form data
- generate a calendar 
- randomly show things on the calendar (depending on what the user selected on form )
- Show summary of the user's form selection at the top 


Step 1: 
- Generate a calendar every time the page loads [DONE]

Step 2: 
- Show the right number of dates depending what month they selected   [DONE]

Step 3:
- Show random images in the calendar (3 different images) [DONE]

Step 4:
- Show the specific number of random images based on the user's form selection [DONE]

Step 5: 
- Show different images based on the country that they select  [DONE]


Step 6: 
- Error checking

completed this with Josh and it works

*/
//if there is no session titled history , create an emtpy array titled history
if(!isset($_SESSION['history'])) {
    $_SESSION['history'] = array();
    
}

//print_r($_POST); Used for testing code
//Checks to see if month and number of days was selected, if so, push to session history array, include month num of days and country
if($_POST['month'] != 'Select' && isset($_POST['num-site-seeing-days'])) {
    array_push($_SESSION['history'], array($_POST['month'], $_POST['num-site-seeing-days'], $_POST['country']));
}

//print_r($_SESSION);
//Create months array which contains the months and number of days in each
$months = array(
    'January' => 31, 
    'February' => 28, 
    'November' => 30,
    'December' => 31
    );
//Create countires and images array which contains the countires, their cities, and images for each    
$countriesAndImages = array(
    'Mexico' => array('acapulco', 'cabos', 'cancun', 'chichenitza', 'huatulco'), 
    'USA' => array('chicago', 'hollywood', 'las_vegas', 'ny', 'washington_dc'), 
    'France' => array('bordeaux', 'le_havre', 'lyon', 'montepellier', 'paris')
    ); 
    
//Function to get destination for trip
function getDestinationForCountry($country) {
    global $countriesAndImages; //define global variable within function
    if(isset($_POST['order'])){ //checks to see if A-Z or Z-A button was checked
        if($_POST['order'] == "A-Z"){ //if it has been checked, check if A-Z was selected, if so, sort them
            rsort($countriesAndImages[$country]); // r sort = reverse sort
        }
        else{
            sort($countriesAndImages[$country]); //else if it's Z-A, then regular sort. Somehow this got messed up. Supposed to be A-Z = sort and Z-A = rsort
        }
    }
    else {
        shuffle($countriesAndImages[$country]); //if neither are selected then display in random order 
    }    
    $location = array_pop($countriesAndImages[$country]); //setting variable location = the country chosen
    
    $imgURL = "./img/$country/" . $location . ".png"; //connecting picture to location selected
    return array(
        "imgURL" => $imgURL, 
        "location" => $location
    ); 
}


//function which accepts the input ? not sure
function createRandomMappings($numDaysInMonth, $numSiteSeeingDays, $country) {
    
    
    $mappings = array(); //creates an array called mappings
    
    // initialize all the days to be false 
    for ($i = 0; $i < $numDaysInMonth; $i++) {
        array_push($mappings, false); 
    }
    //picks random days in the month
    $randDays = array();
    for($i = 0; $i < $numSiteSeeingDays; $i++) {
        $randNum = rand(1, $numDaysInMonth);
        while (in_array($randNum, $randDays)) {
            $randNum = rand(1, $numDaysInMonth);
        }
        array_push($randDays, $randNum);
    }
    //selects a random destination and puts in a random day
    // set the siteSeeingDays to have images
    for ($i = 0; $i < $numDaysInMonth; $i++) { //iterates through mappings
        if(in_array($i, $randDays)) { //is the day one that was randomly selected
            $mappings[$i] = array( 
                'destination' => getDestinationForCountry($country) 
            );
        }
         
    }
    
    return $mappings; 
    
    
    
}
//Displays the calender    
function generateCalendar() {
    global $months; //declares global variable
    
    $month = $_POST['month']; //renames to month for readability and ease of use
    $daysInMonth = $months[$month];  //declares variable which determines the number of days in the month
    
    //echo "DAYS = $daysInMonth !!!!!!!!!! <br/>"; 
    
    echo "<table>"; //creates a table
    
    
    $mappings = createRandomMappings($daysInMonth, $_POST['num-site-seeing-days'], $_POST['country']); //mappings variable will now contain the days in month, number of days, and country 
    
    
    // echo "MAPPINGS: >.............................. <br/>"; 
    // print_r($mappings); 
    // echo "<br/>"; 
    
    $date = 1; 
    //I think this is for the calender
    for ($week = 0; $week < 5; $week++) { //4 weeks per month
        echo "<tr>"; 
        for ($day = 0; $day < 7; $day++) { //7 days per week
            echo "<td>"; 
            echo "$date";
            
            if ($mappings[$date-1]) { //if this exists
                echo "<img src='" . $mappings[$date-1]['destination']['imgURL'] . "'>"; //selecting the imageurl by going into mappings > date > destination > imageurl
                echo "<div>". $mappings[$date-1]['destination']['location'] ."</div>";  //gets location
            }
            
            echo "</td>"; //for the table
            $date++; 
            
            if ($date > $daysInMonth) //dont display too many days in calender
                break; 
        }
        echo "</tr>"; 
        
        if ($date > $daysInMonth) //dont display too many days in calender
             break; 
    }
    echo "</table>"; //print calender
    
}


// grab the month info from the form
//error handeling
function getErrors() {
    $errors = array(); 
    //if uder doesn't select a month display the message
    if ($_POST['month'] == "Select") {
        array_push($errors, "Must select month"); 
    } 
    //display message if user doesn't select number of days
    if (!isset($_POST['num-site-seeing-days'])) {
        array_push($errors, "Must select number of day"); 
    } 
    
    return $errors; 
}
//after errors are collected, display them
function displayErrors($errors) {
    echo "<ul>"; 
    foreach ($errors as $error) {//loops through array
        echo "<li>$error</li>"; //displays the errors found
    }
    echo "</ul>"; //start and end the ul outside of the loop
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!--For Style -->
        <style>
            table td {
                padding: 30px;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1> Winter vacation Planner </h1>  <!--title -->
        <form method="post">  <!--Method used because we are sending data -->
            <select name="month">  <!--Month Selection-->
              <option value="Select">SELECT</option>
              <option value="November">November</option>
              <option value="December">December</option>
              <option value="January">January</option>
              <option value="February">February</option>
            </select>
             <!--Number of days selection -->
            <input type="radio" name="num-site-seeing-days" value="3"> 3
            <input type="radio" name="num-site-seeing-days" value="4"> 4
            <input type="radio" name="num-site-seeing-days" value="5"> 5
            <br/>
             <!--Country Selection -->
            <select name="country">
              <option value="USA">USA</option>
              <option value="France">France</option>
              <option value="Mexico">Mexico</option>
            </select>
             <!--Order selectino -->
            <input type="radio" name="order" value="A-Z"> A-Z
            <input type="radio" name="order" value="Z-A"> Z-A
             <!--Submit button -->
            <input type="submit" name="travel-info-submit-btn">
        </form>
        
        <h1> Itinerary </h1>  <!--Title -->
        <?php 
            // only call generateCalendar if the form is submitted properly
            if(isset($_POST['travel-info-submit-btn'])) {
                $errors = getErrors(); 
                 //if there are errors then display them
                if (count($errors) > 0) {
                    displayErrors($errors); 
                } else { //otherwise show calender
                    generateCalendar(); 
                }
            }
        ?>
        <!--<ol> -->
        <!--<lh><h3>History</h3></lh>-->
        <table>  <!--generate a table to show search history -->
            <th>Month</th>
            <th>Number of Days</th>
            <th>Destination Country</th>
        <?php
        //input data in table 
        foreach($_SESSION['history'] as $item){
            echo "<tr>";
            echo "<td>".$item[0]."</td>";
            echo "<td>".$item[1]."</td>";
            echo "<td>".$item[2]."</td>";
            echo "</tr>";
            
            // echo "<li> Month: ".$item[0]." Number of Days: ".$item[1]." Country: ".$item[2];
            
        }
        //echo $_SESSION['history'][0];
        ?>
        </table>
        <!--</ol>-->
        
         <!--Displays the first item in history -->
        
    </body>
</html>