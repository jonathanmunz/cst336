<html>

    <head>
        <form method="post" action="login.html">
        <h1>Welcome User_1! <input type="submit" value="Logout"> </form> </h1>
        
      <title>Quiz</title>  
    Quiz <br> <br>
      
    </head>
    <body>
        <form>
       What Year was CSUMB founded? <input type="text" name="yearfounded" value="">
       <br> 
       <?php
       if(isset($_POST)){
  if(isset($_POST['yearfounded'])) {
    echo '<span style="color:green;">Correct! The answer is 1994! </span>'; 
    }
  else {
  echo '<span style="color:red;">Incorrect! The answer is 1994! </span>'; 
  }
}
echo "<br><br>";
?>
       
       What is the name of CSUMB's mascot? <br>
       <input type="radio" name="mascot" value="Otto"> Otto<br>
      <input type="radio" name="mascot" value="Albus"> Albus<br>
      <input type="radio" name="mascot" value="MonteRey"> Monte Rey<br><br>
           <?php


if(isset($_POST)){
  if(isset($_POST['MonteRey'])) {
    echo '<span style="color:green;">Correct! The answer is Monte Rey! </span>'; 
    }
  else {
  echo '<span style="color:red;">Incorrect! The answer is Monte Rey </span>';
  }
}
?>
      
      <figure>
        <img src="img/mascot.png" alt="Picture of Monte Rey" />
      </figure>
      
      <script>
          $(#document).ready(function(){
                 jquery$ question1#.value
      if (= 1994)
      else 
      
          });
      </script>
   
      <input type="submit" value="Submit"> <br>
 


</form>

    </body>
</html>