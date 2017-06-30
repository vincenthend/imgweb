$(".job_type").on('click', function () {
    $.ajax(
        {
            type: "GET",
            url: "../include/priceCheck.php?type="+$(".job_type:checked").val(),
            dataType: "html",
            success: function(response){
                $("#level").html(response);
            },
            error: function(){
                alert("Failed to get price");
            }
        }
    )
});

$(document).ready(function(){
    $.ajax(
        {
            type: "GET",
            url: "../include/priceCheck.php?type="+$(".job_type:checked").val(),
            dataType: "html",
            success: function(response){
                $("#level").html(response);
            },
            error: function(){
                alert("Failed to get price");
            }
        }
    )
})