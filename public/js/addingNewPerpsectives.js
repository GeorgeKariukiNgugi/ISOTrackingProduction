$(function () {


    $("#addingNewPerpsectivesForm").on("submit", function (e) {
        e.preventDefault();
        // console.log("prevented the defaultBehavious.Adding a new perspectives.");
        var oldPerspectives = $('.addingNewPerspectives');

        var newPerspectiveWeight = $('#newPerspectiveWeight');
        var newPerspectiveWeight = parseFloat(newPerspectiveWeight.val(), 10);
        var number = 0;
        oldPerspectives.each(function () {
            var value = $(this).val();
            if (value === null) {
                console.log("The value is null.");
                $(this).css('background-color', '#fba7a7');

            } else {
                if (value === " ") {
                    console.log("The value is blank.");
                    $(this).css('background-color', '#fba7a7');

                } else {
                    value = parseFloat(value, 10);
                    number += value;
                }
            }
        });
        var sum = (newPerspectiveWeight + number);
        var containigDiv = $("#errorHandlingAddingPerspectives");
        console.log(sum);
        if (sum !== 100) {
            containigDiv.empty();
            containigDiv.append(
                '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>' +
                "The Weights Donot Add Up To 100% kindly check  " + sum + " given. </strong><br/></span></div>"
            );
        } else {
            containigDiv.empty();
            console.log("Weights  made to 100   " + number);
            $(this).unbind('submit').submit();
        }
    });

});
