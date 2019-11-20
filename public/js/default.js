$(document).ready(function() {
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
    // console.log(value);
    // selectingQuaters.val(value);
    // console.log(gettingTheQuaterNumber);
});
