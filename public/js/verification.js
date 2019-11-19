$(document).ready(function() {
    var quatersSelected = $("input[id*='Quater']");
    $("[id^='unmetTargetComment']").hide();
    quatersSelected.focusout(function() {
        var id = $(this).attr("id");
        var slicedId = id.substring(7);
        var getTargetIdName = "target" + slicedId;
        var targetValue = $("#" + getTargetIdName).text();
        var inputValue = $("#" + id).val();

        //!getting if the value is blank or if it has a value.
        if (inputValue === null) {
            console.log("The value is null.");
        } else {
            if (inputValue == "") {
                console.log("The value is blank.");
            } else {
                //! getting the arithmetic structure.
                var arithmeticStructure = $("#arithmeticStructure" + slicedId);
                var arithmeticStructureValue = arithmeticStructure.val();
                switch (arithmeticStructureValue) {
                    case "0":
                        if (inputValue > targetValue) {
                            console.log(
                                " 0 IT SHOULD BE SMALLER. target = " +
                                    targetValue +
                                    "input value = " +
                                    inputValue
                            );

                            $("#modal" + slicedId).modal("show");
                        } else {
                            console.log("0 IT GOOD.");
                        }
                        break;
                    case "1":
                        if (inputValue < targetValue) {
                            console.log("1 it should be larger");
                            var unmetTaargetId = "unmetTargetComment" + id;
                            $("#unmetTargetComment" + slicedId).show();
                            console.log(slicedId);
                            $("#modal" + slicedId).modal("show");
                        } else {
                            console.log("1 IT GOOD.");
                        }
                        break;
                    case "3":
                        break;
                    case "4":
                        break;
                    case "5":
                        break;
                    case "6":
                        break;
                    case "7":
                        break;
                    default:
                        console.log("in switch " + arithmeticStructureValue);
                        break;
                }
            }
        }
        // console.log("The target is " + targetValue);
        // console.log("The value in the input is " + inputValue);
        // var textAreaId = "reason" + slicedId;
        // var textAreaInput = $("#" + textAreaId);
        // console.log("The TextArea Has An Id of" + textAreaId);
        // //!getting the textarea for the particular kpi.
        // if (inputValue >= targetValue) {
        //     console.log("Larger");
        //     textAreaInput.val("N/A");
        //     textAreaInput.attr("readonly", "true");
        //     textAreaInput.css({ "background-color": "rgb(238,238,238)" });
        // } else {
        //     console.log("smaller");
        //     textAreaInput.removeAttr("readonly");
        //     textAreaInput.attr("required", "true");
        //     textAreaInput.val("");
        //     textAreaInput.focus();
        //     textAreaInput.css({ "background-color": "red" });
        // }
    });
});
