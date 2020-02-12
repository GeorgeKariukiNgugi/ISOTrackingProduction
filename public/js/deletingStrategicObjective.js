$(function () {

    // var submitButtonClicked = $("form[id*='deletingStrategicObj']");

    // submitButtonClicked.on('submit',function (e) {
        
    //     e.preventDefault();
    //     // console.log("The button to submit the deletion of the strategic objectiove has been deleted.");
    //     var id = $(this).attr("id");
    //     var slicedId = id.substr(20);
    //     console.log("This is the id of the input element.  "+ id + "  The sliced Id Number is:  "+ slicedId);

    //     var numberOfStrategicObjectivesytoBeDeleted = $("#strategicObjectiveToBelDeleted"+slicedId).val();
    //     numberOfStrategicObjectivesytoBeDeleted = parseFloat(numberOfStrategicObjectivesytoBeDeleted);
    //     console.log("The number Of Strstegic Objectives That are To Be Deleted are:  "+ numberOfStrategicObjectivesytoBeDeleted);



    // });
    var strategicObjectiveToBeDeleted = $("input[class*='strategicObjectiveToBeDeleted']");
    // var inputFocudedOut = $("input[class*='strategicObjectiveToBeDeleted']");
   
    strategicObjectiveToBeDeleted.on('keyup',function(e) {
        console.log('This is on keyUp.');
        var strategicObjectiveId = $(this).attr("data-idOfStrategicObjective");
        console.log("This is the strategic objective id.  "+  strategicObjectiveId);
        var weight = $("#weightOfPerspectiive"+strategicObjectiveId).val(); 
        console.log("This is the weight of the perspective before changing it to a number "+ weight);
        weight = parseFloat(weight);
        console.log(weight+ "This is the weight of the perspective.");
        var number = 0;
        var counter = 0;

        var classToBeChecked = $(this).attr("class");
        console.log(classToBeChecked);
        classToBeChecked = $("."+classToBeChecked);

        classToBeChecked.each(function(){
            console.log(counter++ +"This is the counter.");
            var value = $(this).val();
            console.log("This is the value that is being collected."+ value);
            if (value === null) {
                console.log("The value is null.");
                $(this).css('background-color', '#fba7a7');
                $("#submitButton" + strategicObjectiveId).attr({
                    'disabled': 'disabled',
                })
            } else {
                if (value === " ") {
                    console.log("The value is blank.");
                    $(this).css('background-color', '#fba7a7');
                    $("#submitButton" + strategicObjectiveId).attr({
                        'disabled': 'disabled',
                    })
                } else {
                    value = parseFloat(value, 10);
                    number += value;
                    if (number !== weight) {
                        //! it has not gotten to 100. 
                        $("#submitButton" + strategicObjectiveId).attr({
                            'disabled': 'disabled',
                        })
                    } else {
                        $("#submitButton" + strategicObjectiveId).removeAttr('disabled');
                    }
                }
            }
        }
        );
        console.log();

    });
    
});