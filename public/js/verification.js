$(function () {
    var activeQuater = $("#activeQuater").val();
    var gettingTheQuaterNumber = activeQuater.substr(1);
    var quatersSelected = $("input[id*='Quater" + gettingTheQuaterNumber + "']");
    // $("[id^='unmetTargetComment']").hide();
    quatersSelected.focusout(function () {
        var id = $(this).attr("id");
        var slicedId = id.substring(7);
        var getTargetIdName = "target" + slicedId;
        var targetValue = $("#" + getTargetIdName).text();
        var inputValue = $("#" + id).val();
        var unmetTargetId = "unmetTargetComment" + slicedId;

        var period = $("#period" + slicedId).val();
        console.log(period + "  " + slicedId)
        var nonConFlagName = "nonConformityFlag" + slicedId;
        if (period == 2 && gettingTheQuaterNumber == 1) {
            $("#" + nonConFlagName).val(0);
        } else if (period == 2 && gettingTheQuaterNumber == 3) {
            $("#" + nonConFlagName).val(0);
        } else if (period == 1 && gettingTheQuaterNumber == 1) {
            $("#" + nonConFlagName).val(0);
        } else if (period == 1 && gettingTheQuaterNumber == 2) {
            $("#" + nonConFlagName).val(0);
        } else if (period == 1 && gettingTheQuaterNumber == 3) {
            $("#" + nonConFlagName).val(0);
        } else {
            if (inputValue === null) {
                console.log("The value is null.");
                $("#" + unmetTargetId + "").empty();
            } else {
                if (inputValue == "") {
                    console.log("The value is blank.");
                    $("#" + unmetTargetId + "").empty();
                } else {
                    inputValue = parseFloat(inputValue, 10);
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
                                console.log(typeof inputValue + "  This is the data type.");
                                // !setting the flag to a positive.
                                $("#" + nonConformityFlag + "").val(1);

                                console.log($("#" + nonConformityFlag + "").val());
                                $("#" + unmetTargetId + "").empty();

                                $("#" + unmetTargetId + "").append(
                                    '<a href = "#" style = "color:red;" data-toggle="modal" data-target= "#' +
                                    gettingModalName +
                                    '"> <i style = "font-size:20px;"class = "fa fa-times">   <b>NO</b> </i></a>'
                                );
                                // $(this).focus(); 
                                console.log("these are the low era"); 
                                $(this).css('background-color','#fba7a7');                      
                                $("#modal" + slicedId).modal("show");
                                    
                            } else {
                                // !setting the flag to a negative.
                                $("#" + nonConformityFlag + "").val(0);
                                console.log($("#" + nonConformityFlag + "").val());
                                console.log(typeof inputValue + "  This is the data type.");
                                console.log("0 IT GOOD.");
                                $("#" + unmetTargetId + "").empty();
                                $("#" + unmetTargetId + "").append(
                                    '<p style = "color:green;"> <i style = "font-size:20px;" class = "fa fa-check">   <b>YES</b> </i></p>'
                                );
                                $(this).css('background-color','#cfeda8'); 
                                
                                
                            }
                            break;
                        case "1":
                            var gettingModalName = "modal" + slicedId;
                            var unmetTargetId = "unmetTargetComment" + slicedId;
                            var nonConformityFlag = "nonConformityFlag" + slicedId;
                            if (inputValue < targetValue) {
                                console.log("1 it should be larger");
                                console.log(typeof inputValue + "  This is the data type.");
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
                                console.log("these are the low era"); 
                                $(this).css('background-color','#fba7a7');
                                $("#modal" + slicedId).modal("show");
                                
                                // $(this).focus();
                            } else {
                                console.log("1 IT GOOD.");
                                console.log(typeof inputValue + "  This is the data type.");
                                // !setting the flag to a negative.
                                $("#" + nonConformityFlag + "").val(0);
                                console.log($("#" + nonConformityFlag + "").val());

                                $("#" + unmetTargetId + "").empty();
                                $("#" + unmetTargetId + "").append(
                                    '<p style = "color:green;"> <i style = "font-size:20px;" class = "fa fa-check">   <b>YES</b> </i></p>'
                                );
                                $(this).css('background-color','#cfeda8'); 
                            }
                            break;
                        case "3":
                            var gettingModalName = "modal" + slicedId;
                            var unmetTargetId = "unmetTargetComment" + slicedId;
                            var nonConformityFlag = "nonConformityFlag" + slicedId;
                            if (inputValue > targetValue) {
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
                                // $(this).focus();
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
                        case "4":
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
                                console.log(id);
                                // $("#" + id).focus();
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
                        case "5":
                            var gettingModalName = "modal" + slicedId;
                            var unmetTargetId = "unmetTargetComment" + slicedId;
                            var nonConformityFlag = "nonConformityFlag" + slicedId;
                            if (inputValue > targetValue) {
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
                                // $(this).focus();
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
                        case "6":
                            var gettingModalName = "modal" + slicedId;
                            var unmetTargetId = "unmetTargetComment" + slicedId;
                            var nonConformityFlag = "nonConformityFlag" + slicedId;
                            if (inputValue > targetValue) {
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
                                // $(this).focus();
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
                        case "7":
                            var gettingModalName = "modal" + slicedId;
                            var unmetTargetId = "unmetTargetComment" + slicedId;
                            var nonConformityFlag = "nonConformityFlag" + slicedId;
                            if (inputValue > targetValue) {
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
                                // $(this).focus();
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
                        default:
                            console.log("in switch " + arithmeticStructureValue);
                            break;
                    }
                }
            }
        }

        //!getting the period of the out of focus kpi.

        //!getting if the value is blank or if it has a value.

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
