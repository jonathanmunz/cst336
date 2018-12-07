$(".petModalActivate").click(function() {
    console.log("Js is being called");
    $.ajax({
        type: "post",
        url: "api/getPetInfo.php",
        data: {"id": $(this).attr("id")},
        datatype: "application/json",
        beforeSend: function() {
            //loading spinner
            $("#mod-body").html("<img src='img/loading.gif'/>");
            console.log("before send code is running");
            $(".modal-title").html("Loading...");
        },
        success: function(data, status) {
            //load results to modal
            $("#mod-title").html(data[0].name);
            $("#mod-body").html( "<img src= 'img/" + data[0].pictureURL + "'  />  <br>"
            + "Age: " + (2018 - data[0].yob ) + 
             "<br> Breed: " + data[0].breed + 
            "<br> " + data[0].description 
            );
            console.log(data);
        },
        fail: function(status) {
            console.log(status);
        }
    });
});













