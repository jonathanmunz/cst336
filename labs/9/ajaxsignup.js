function getCountyList() {        
   var stateSelected = document.getElementById("state").value;
   var url = "https://www.showdeolabs.com/cors?url=http://hosting.csumb.edu/laramiguel/ajax/countyList.php?state=";

   var ajax;
    if (window.XMLHttpRequest) {
         ajax= new XMLHttpRequest();
     }

   ajax.open("GET", url + stateSelected, true);
   ajax.send();

     ajax.onreadystatechange=function() {
          if (ajax.readyState==4 && ajax.status==200) {
                alert(ajax.responseText);  //displays value retrieved from PHP program
           }
      }  

} //end Function

ajax.onreadystatechange=function() {
  if (ajax.readyState==4 && ajax.status==200) {
    //console.log(ajax.responseText);  //displays value retrieved from PHP program

    var data = JSON.parse(ajax.responseText);
    var countySelected = document.getElementById("county");
    countySelected.innerHTML="<option> Select One </option>";

    for (var i=0; i< data['counties'].length; i++) {
      countySelected.innerHTML += "<option>" + data["counties"][i].county + "</option>";
    }//endFor

  }//endIf
} 

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  
  function getCountyList_jQuery() {        
  $.ajax({
      type: "GET",
      url: "https://www.showdeolabs.com/cors?url=http://hosting.csumb.edu/laramiguel/ajax/countyList.php",
      dataType: "json",
      data: { "state": $("#state").val() },
      success: function(data,status) {
         console.log(data);
      },
      complete: function(data,status) { //optional, used for debugging purposes
          //alert(status);
      }
   });
}

function getCountyList_jQuery() {        
  $.ajax({
      type: "GET",
      url: "https://www.showdeolabs.com/cors?url=http://hosting.csumb.edu/laramiguel/ajax/countyList.php",
      dataType: "json",
      data: { "state": $("#state").val() },
      success: function(data,status) {
         $("#county").html("<option> Select One </option>");
         for (var i=0; i< data['counties'].length; i++){
             $("#county").append("<option>" + data["counties"][i].county + "</option>" );
        }
      },
      complete: function(data,status) {
        //optional, used for debugging purposes
        //console.log(status);
      }
   });
}

function getCountyList_jQuery() {        
  $.ajax({
      type: "POST",
      url: "https://www.showdeolabs.com/data/ajax/post",
      dataType: "json",
      contentType: "application/json",
      data: {
        "state": $("#state").val()
      },
      success: function(data, status) {
         console.log(data);
      },
      complete: function(data, status) {
        //optional, used for debugging purposes
        //console.log(status);
      }
   });
}