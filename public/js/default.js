$(function () {
    $(".tooltip").tooltip();
    //!this is getting which quaters are active and also which ones are n active and displaying them in the view.
    var activeQuater = $("#activeQuater").val();
    var gettingTheQuaterNumber = activeQuater.substr(1);
    var quaterPrefixId = "Quater" + gettingTheQuaterNumber;
    var gettingScoreValue = "scoreHidden" + gettingTheQuaterNumber;
    var value = $("#" + gettingScoreValue).val();

    var selectingQuaters = $("[id^=" + quaterPrefixId + "]");
    selectingQuaters.removeAttr("readonly");
    selectingQuaters.removeAttr("placeholder");
    selectingQuaters.attr("required", "true");
    quaterForLooping = parseFloat(gettingTheQuaterNumber, 10);

    console.log(quaterForLooping + typeof (quaterForLooping));

    for (let index = 1; index <= quaterForLooping; index++) {

        var quatersSelected = $("input[id*='Quater" + index + "']");
        
        quatersSelected.each(
            function () {
                
                //    console.log($(this).attr('id')); 
                //! the id of the input type is: 
                var id = $(this).attr('id');
                var slicedId = id.substring(7);
                var getTargetIdName = "target" + slicedId;
                var targetValue = parseFloat($("#" + getTargetIdName).text());
                var inputRawValue = $("#" + id).val();
                var inputValue = parseFloat($("#" + id).val());
                var period = $("#period" + slicedId).val();
                var arithmeticStructure = $("#arithmeticStructure" + slicedId);
                var arithmeticStructureValue = arithmeticStructure.val();

                switch (arithmeticStructureValue) {
                    case "0":
                            
                                if (inputValue > targetValue) {
                                    $(this).css('background-color','#fba7a7');
                                } else if(inputValue <= targetValue){
                                    $(this).css('background-color','#cfeda8'); 
                                }
                                else{
                                    $(this).css('background-color','#FFFFFF');
                                }

                        break;
                    case "1":
                                if (inputValue < targetValue) {
                                    $(this).css('background-color','#fba7a7');
                                } else if(inputValue >= targetValue){
                                    $(this).css('background-color','#cfeda8'); 
                                }
                                else{
                                    $(this).css('background-color','#FFFFFF');
                                }
                        break;
                    default:
                        break;
                }

            }
        );
        // console.log(quatersSelected);

    }
    //!on loading the page successfully hide the two types of perspectives that will be used by the uer to bring the perspectives to li

    //! the next section isused to get the 

});
