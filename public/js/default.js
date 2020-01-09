$(document).ready(function () {
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

    console.log(quaterForLooping + typeof(quaterForLooping));

    for (let index = 1; index <= quaterForLooping ; index++) {
        
        console.log(index);
        //! the next section is to 
        
    }
    //!on loading the page successfully hide the two types of perspectives that will be used by the uer to bring the perspectives to li

    //! the next section isused to get the 

});
