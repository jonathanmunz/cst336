<?php
$passwordsmatch = false;
if(isset($_POST) ){
  if(isset($_POST['password']) && isset($_POST['retypepassword'])){
    if($_POST['password'] == $_POST['retypepassword']){
      $passwordsmatch = true;
    }
  }
}


?>


<html>

<head>
   
   <title>Ajax Signup </title>
   
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

    <header>
      <div id="title">
      <h1>Ajax Signup</h1>
      </div>
    </header>


      <div id="main">
      <form method="post" action="ajaxsignup.php">

        Username:   <input type="text" name="username" id="username"> <br>
        <span style="color:red" id="usernameValidation"></span>  <br><br />


        Password:     <input type="password" name="password" id="password"> <br><br>
        
        Retype Password:     <input type="password" name="retypepassword" id="retypepassword"> <br><br>
        
        <?php
        if($passwordsmatch){
        echo "Passwords match!";
        echo "<br>"; 
        }
        elseif (!$passwordsmatch && isset($_POST['password']) && isset($_POST['retypepassword'])){
          echo "Please retype password"; 
          echo "<br>"; 
        }
        ?>
        State: <input type="text" name="state" id="state"> <br><br> 
        <div id="stateValidation"> </div>  
        
        Zip Code: <input type="text" name="zip" id="zip"> <br><br>
        <div id="zipValidation"> </div>  <br><br />
        
        County: <select id="county">
          <option value="">SELECT</option>
        </select> <br><br>
        <div id = "button">
        <input type="submit" value="Submit">
        </div>
      </form>
      </div>
       <br><br>




  <script> 
    $("#username").change(function(){
      $.ajax({
            type: "get",
            url: "usernameLookup.php",
            data: { "username": $(this).val()},
            success: function(data,status) {
               if (data == "Available") {
                     $("#usernameValidation").html("Available!"); 
                     $("#usernameValidation").css("color","green");
                 }
                else {
                        $("#usernameValidation").html("Username already taken!");         
                        $("#usernameValidation").css("color","red");
                 }           

            }
        });

    });
    
    $("#zip").change(function(){
      $.ajax({
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
        dataType: "json",
        data: { "zip": $(this).val()},
        success: function(data,status) {
          if (data == false) {
             $("#zipValidation").html("Zip code not found");
          }
          else{
            $("#zipValidation").html("City: " + data.city + "<br>  Latitude: " + data.latitude + "<br> Longitude: " + data.longitude + "<br>");
            console.log(data);
          }
        }
        
      })
      
    });
    
    $("#state").change(function(){
      $.ajax({
        type: "get",
        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
        dataType: "json",
        data: { "state": $(this).val()},
        success: function(data,status) {
          if (data == false) {
              $("#county").html("<option value=''>SELECT</option>");
             $("#stateValidation").html("State not found");
             
          }
          else{
            $("#county").html("<option value=''>SELECT</option>");
            for($i = 0; $i < data.length; $i++ ){
               $("#county").append("<option value=" + data[$i].county + ">" + data[$i].county + "</option>");
            }
            
           
            console.log(data);
          }
        }
        
      })
      
    });
      
      
  </script>

  </body>

  </html>