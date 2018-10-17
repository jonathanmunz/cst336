<?php
$maxDays = 0;
if($Month == January) {
  $maxDays = 31;
}
else if($Month == February) {
  $maxDays = 28;
}
else if($Month == November) {
  $maxDays = 30;
}
else if ($Month == December) {
  $maxDays = 31;
}



?>



<DOCTYPE! HTML>
<html>
<head>
<title>Winter Vacation Planner!</title> 

<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
  
<div id="title">  
Winter Vacation Planner! <br> <br>

</div>

<form action="midterm_practice1.php" method = "POST">
  Select Month:
    
    <select name="Months">
    <option value="November">November</option>
    <option value="December">December</option>
    <option value="January">January</option>
    <option value="February">February</option>
    </select>
    
    <br> <br>
    
    Number of Locations:
      
      <input type="radio" name="NumL" value="3"> Three
      <input type="radio" name="NumL" value="4"> Four
      <input type="radio" name="NumL" value="5"> Five
      
    <br> <br>
    
    Select Country: 
      <select name="Countries">
      <option value="USA">USA</option>
      <option value="Mexico">Mexico</option>
      <option value="France">France</option>
      </select>
    
    <br> <br> Visit Locations in Alphabetical order?
      
      <input type="radio" name="AZ" value="A-Z"> A-Z
      <input type="radio" name="ZA" value="Z-A"> Z-A<br><br>
      
      <input type="submit" value="Create Itinerary"> <br> <br>
     
     
     
     <?php  

      echo " ".$_POST['Months'] . " "  . "Itinerary" . "<br>" . "<br>"  ;
      echo "Visiting  ".$_POST['NumL'] . " " . "places in ";
      echo "".$_POST['Countries'] . "<br>" ;
      //echo "Display order: ".$_POST['AZ'];

      ?>
</form>

<table style="width:100%">
<?php

for($i = 0; $i < 4; $i++){
  echo "<tr>";
  for($j = 1; $j < 8; $j++){
    if($i*7+$j <$maxDays){
    echo "<th>" . ($i*7+$j) . "</th>";
    }
  }
  echo "</tr>";
}
?>
</table>

	<footer>
		
	</footer>
</body>
</html>