$(function () {

    $("a[id^='customQuater']").on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr("id");
        // console.log(id);
        //! this is the strategicObjective Id.
        // var slicedId = id.substring(12);
        // // console.log(slicedId);
        // var classOfInputsToDeactivate = $(".strtegicObjective" + slicedId);
        // // console.log(classOfInputsToDeactivate.length);
        // classOfInputsToDeactivate.attr("readonly", "true");

        // var activeInputs = $(this).attr('class');

        // var classToActivate = "Quater" + activeInputs + slicedId;
        // $("." + classToActivate).removeAttr("readonly");
        // $("." + classToActivate).removeAttr("placeholder");
        // $("#activeQuater").val('Q'.activeInputs);

    });
});
