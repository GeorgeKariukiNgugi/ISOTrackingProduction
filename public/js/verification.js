$(document).ready(function() {
    var quatersSelected = $("input[id*='Quater']");
    // $("[id^='unmetTargetComment']").hide();
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
                        var unmetTargetId = "unmetTargetComment" + slicedId;
                        var gettingModalName = "modal" + slicedId;
                        var nonConformityFlag = "nonConformityFlag" + slicedId;
                        if (inputValue > targetValue) {
                            console.log(
                                " 0 IT SHOULD BE SMALLER. target = " +
                                    targetValue +
                                    "input value = " +
                                    inputValue
                            );

                            // !setting the flag to a positive.
                            $("#" + nonConformityFlag + "").val(1);

                            console.log($("#" + nonConformityFlag + "").val());
                            $("#" + unmetTargetId + "").empty();

                            $("#" + unmetTargetId + "").append(
                                '<a href = "#" style = "color:red;" data-toggle="modal" data-target= "#' +
                                    gettingModalName +
                                    '"> <i style = "font-size:20px;"class = "fa fa-times">   <b>NO</b> </i></a>'
                            );
                            $("#modal" + slicedId).modal("show");
                        } else {
                            // !setting the flag to a negative.
                            $("#" + nonConformityFlag + "").val(0);
                            console.log($("#" + nonConformityFlag + "").val());

                            console.log("0 IT GOOD.");
                            $("#" + unmetTargetId + "").empty();
                            $("#" + unmetTargetId + "").append(
                                '<p style = "color:green;"> <i style = "font-size:20px;" class = "fa fa-check">   <b>YES</b> </i></p>'
                            );
                        }
                        break;
                    case "1":
                        var gettingModalName = "modal" + slicedId;
                        var unmetTargetId = "unmetTargetComment" + slicedId;
                        var nonConformityFlag = "nonConformityFlag" + slicedId;
                        if (inputValue < targetValue) {
                            console.log("1 it should be larger");
                            // !setting the flag to a positive.
                            $("#" + nonConformityFlag + "").val(1);
                            var flag = $("#" + nonConformityFlag + "").val();
                            console.log("The flag is:" + flag);

                            $("#" + unmetTargetId + "").empty();
                            $("#" + unmetTargetId + "").append(
                                '<a href = "#" style = "color:red;" data-toggle="modal" data-target= "#' +
                                    gettingModalName +
                                    '"> <i style = "font-size:20px;"class = "fa fa-times">   <b>NO</b> </i></a>'
                            );
                            $("#modal" + slicedId).modal("show");
                        } else {
                            console.log("1 IT GOOD.");
                            // !setting the flag to a negative.
                            $("#" + nonConformityFlag + "").val(0);
                            console.log($("#" + nonConformityFlag + "").val());

                            $("#" + unmetTargetId + "").empty();
                            $("#" + unmetTargetId + "").append(
                                '<p style = "color:green;"> <i style = "font-size:20px;" class = "fa fa-check">   <b>YES</b> </i></p>'
                            );
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
