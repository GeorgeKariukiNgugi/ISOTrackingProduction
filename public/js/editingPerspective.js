$(function () {

    $("form[class^='editingPerspective']").on("submit", function (e) {

        e.preventDefault();

        // console.log("prevented the default behaviour.");
        //! getting the class of the form. 
        var classOfForm = $(this).attr("class");
        var slicedId = classOfForm.substring(18);
        // console.log(slicedId);
        var editedInputs = $(".editingWeight" + slicedId);
        var number = 0;
        editedInputs.each(function () {
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
        var containigDiv = $("#containingDiv" + slicedId);
        if (number !== 100) {
            //! it has not gotten to 100. 
            console.log("Weights Not made to 100   " + number);

            containigDiv.empty();
            containigDiv.append(
                '<div role="alert" class="alert alert-success" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>' +
                "The Weights Donot Add Up To 100% kindly check  " + number + " given. </strong><br/></span></div>"
            );

        } else {
            // $("#submitButton" + slicedId).removeAttr('disabled');
            containigDiv.empty();
            console.log("Weights  made to 100   " + number);
            $("." + classOfForm).unbind('submit').submit();
        }
        // console.log(editedInputs.length);

    });

});
