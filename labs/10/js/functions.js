$(".petModalActivate").click(function() {
    console.log("Js is being called");
    $.ajax({
        type: "post",
        url: "api/getPetInfo.php",
        data: {"id": $(this).attr("id")},
        datatype: "application/json",
        beforeSend: function() {
            //loading spinner
            console.log("before send code is running");
            $(".modal-title").html("Loading...");
        },
        success: function(data, status) {
            //load results to modal
            console.log(data);
        },
        fail: function(status) {
            console.log(status);
        }
    });
});













