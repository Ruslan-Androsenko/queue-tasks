"use strict";

$(function (){
    $("#order_form").submit(function (e){
        e.preventDefault();

        $.ajax({
            method: "post",
            url: "/order.php",
            dataType: "json",
            data: $(this).serialize()
        }).done(function (response) {
            if (response.success) {
                var message = response.message;
                var responseMessage = $(".response-message");

                responseMessage.html(message);
                responseMessage.fadeIn(600);

                setTimeout(function (){
                    responseMessage.fadeOut(600);
                }, 5000)
            }
        });
    });
});