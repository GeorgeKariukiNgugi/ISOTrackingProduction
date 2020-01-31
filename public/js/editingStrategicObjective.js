$(function () {

    $("form[class^='editingStrategicObjectiveForm']").on("submit", function (e) {

        e.preventDefault();

        var substringOfTheStyrategicObjective = $(this).attr("class").substring(29);
        var perspectiveWeight = parseFloat($("#perspectiveWeight"+substringOfTheStyrategicObjective).val(),10);
        var sumOfStrategicObjective = 0;

        var numberOfStrategicObjectives = $("#numberOfStrategicObjectives"+substringOfTheStyrategicObjective).val();
        // console.log( typeof(numberOfStrategicObjectives));
        numberOfStrategicObjectives = parseFloat(numberOfStrategicObjectives, 10);

        for (let index = 1; index <= numberOfStrategicObjectives; index++) {
            // const element = array[index];
            var number = parseFloat($("#strategicObjectiveWeight"+substringOfTheStyrategicObjective+index).val(),10);
            sumOfStrategicObjective += number;
            console.log(index+"     "+$("#strategicObjectiveWeight"+substringOfTheStyrategicObjective+index).val() + typeof(number));
            
            
        }

        console.log( typeof(sumOfStrategicObjective));
        console.log( sumOfStrategicObjective);
        // console.log(typeof(perspectiveWeight));


        
        //! this next section is to check if the values match up to the perspective weight.
        var containigDiv = $("#containingDiv"+substringOfTheStyrategicObjective);
        if(sumOfStrategicObjective !== perspectiveWeight){

            containigDiv.empty();
            containigDiv.append(
                '<div role="alert" class="alert alert-danger" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>' +
                "The Weights Donot Add Up To   "+ perspectiveWeight +"    that is the weight Of The Perspective kindly check    " + sumOfStrategicObjective + "   given. </strong><br/></span></div>"
            );
        }
        else{
            containigDiv.empty();
            console.log("Weights  made to 100   " + number);
            $(this).unbind('submit').submit();
        }
    });


    //! this section of the code is used to handle the adding of a new strategic objective to a perspective. 
    $("form[class^='addingStrategicObjective']").on("submit", function (e) {

        e.preventDefault();

        console.log("I have clicked on the adding of a new perspective.");
        var substringOfTheStyrategicObjective = $(this).attr("class").substring(24);
        var perspectiveWeight = parseFloat($("#perspectiveWeightForHiddenAddition"+substringOfTheStyrategicObjective).val(),10);
        var sumOfStrategicObjective = 0;

        var numberOfStrategicObjectives = parseFloat($("#numberOfStrategicObjectivesForAddition"+substringOfTheStyrategicObjective).val(),10);
        // console.log( typeof(numberOfStrategicObjectives));
        numberOfStrategicObjectives = parseFloat(numberOfStrategicObjectives, 10);

        for (let index = 1; index <= numberOfStrategicObjectives; index++) {
            // const element = array[index];
            var number = $("#strategicObjectiveForAddition"+substringOfTheStyrategicObjective+index).val();
            number = parseFloat(number,10);
            sumOfStrategicObjective += number;
        }
        var newStrategicObjectiveValue = $("#newStrategicObjectiveValue"+substringOfTheStyrategicObjective).val();
        newStrategicObjectiveValue = parseFloat(newStrategicObjectiveValue,10);

        console.log(typeof(sumOfStrategicObjective) + "This is the sum of the strategicObjectives.");
        console.log(typeof(newStrategicObjectiveValue) + "This is the new strategic objevctive value.");
        var valueOfBoth = sumOfStrategicObjective+newStrategicObjectiveValue;
        var containingDiv = $("#containigDivUsedForAddingPerspectives"+substringOfTheStyrategicObjective);
        if ( valueOfBoth !== perspectiveWeight) {
            // console.log("NO" + sumOfStrategicObjective+newStrategicObjectiveValue  + "   "+ sumOfStrategicObjective);
            console.log(valueOfBoth);
            
            containingDiv.empty();
            containingDiv.append(
                '<div role="alert" class="alert alert-danger" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>' +
                "The Weights Donot Add Up To   "+ perspectiveWeight +"    that is the weight Of The Perspective kindly check    " + valueOfBoth + "   given. </strong><br/></span></div>"
            );

        } else {
            console.log("YES." + sumOfStrategicObjective+newStrategicObjectiveValue);
            containingDiv.empty();
            console.log("Weights  made to 100   " + number);
            $(this).unbind('submit').submit();
        }
   
    });
});