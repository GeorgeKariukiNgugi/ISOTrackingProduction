$(function () {

    var links = $("[id^='customQuater']");
    console.log();
    links.on('click', function (e) {
        e.preventDefault();
        console.log("I'm preventing te default behaviour of the link.");
        var classOfLink = $(this).attr("class");
        console.log("This is the class of the Link." + classOfLink);

        //! this next section is used to deactivate all the strategic objectives in the strategic objective in contention. 
        var deactivateInputs = "strtegicObjective" + $(this).attr("id").substr(12);
        $("." + deactivateInputs).attr("readonly", "true");
        $("." + deactivateInputs).attr("placeholder", "Inactive");
        $("." + deactivateInputs).css('border', '1px solid');
        // $("." + deactivateInputs).css('cursor', 'none');

        //! this next section is going to activate the quater that has been selected by clicking on the link. 
        $("." + 'Quater' + classOfLink + $(this).attr("id").substr(12)).removeAttr('readonly');
        $("." + 'Quater' + classOfLink + $(this).attr("id").substr(12)).removeAttr('placeholder');
        $("." + 'Quater' + classOfLink + $(this).attr("id").substr(12)).css('border', '3px solid blue');
        console.log(deactivateInputs);

        //! this next section is used to change the value of the verification quater.
        // $("input[id = activeQuaterForVerification]").val('Q' + classOfLink);
        $("#activeQuater" + $(this).attr("id").substr(12)).val('Q' + classOfLink);
        // console.log("This is the class of the link.  " + $("#activeQuaterForVerification").val());


        // $("input[id = activeQuaterForSubmission]").val('Q' + classOfLink);


    });

    // console.log("This is the class value" + classOfLink);
});
