$(function () {
    // console.log("this is a submitting scores model.");   
    var inputFocudedOut = $("input[class*='perspectiveWeight']");
    // console.log(inputFocudedOut.length);
    inputFocudedOut.focusout(function () {

        var idOfInput = $(this).attr("class");
        var slicedId = idOfInput.substring(17);
        // console.log(slicedId);
        // console.log(idOfInput);
        var classOfThePerspectiveWeights = $("." + idOfInput);

        // console.log(classOfThePerspectiveWeights);
        var number = 0;
        // console.log(classOfThePerspectiveWeights.length);
        classOfThePerspectiveWeights.each(function () {
            // console.log($(this).val());
            var value = $(this).val();
            if (value === null) {
                console.log("The value is null.");
                $(this).css('background-color', '#fba7a7');
                $("#submitButton" + slicedId).attr({
                    'disabled': 'disabled',
                })
            } else {
                if (value === " ") {
                    console.log("The value is blank.");
                    $(this).css('background-color', '#fba7a7');
                    $("#submitButton" + slicedId).attr({
                        'disabled': 'disabled',
                    })
                } else {
                    value = parseFloat(value, 10);
                    number += value;
                    if (number !== 100) {
                        //! it has not gotten to 100. 
                        $("#submitButton" + slicedId).attr({
                            'disabled': 'disabled',
                        })
                    } else {
                        $("#submitButton" + slicedId).removeAttr('disabled');
                    }
                }
            }
        });
        console.log(number);
    });
});
