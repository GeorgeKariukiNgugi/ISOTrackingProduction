$(function () {
    //! the new way of validation is just selecting all the inputs and puting them on the values to be validated. 
    var quatersSelected = $("input[id ^='Quater']");

    quatersSelected.on("focusout", function (e) {
    // focusout(function (e) {
       
        var id = $(this).attr("id");
       
        var slicedId = id.substring(7);
        var strategicObjectiveId = $(this).closest('div').parent().attr('id');
        var gettingThevalue = $("#activeQuater" + strategicObjectiveId).val();
        var newIdToCheck = 'Quater' + gettingThevalue.substring(1) + slicedId;
        var gettingTheQuaterNumber = parseFloat(gettingThevalue.substring(1));

        if (id !== newIdToCheck) {
            // console.log("The Id does Not Match.  " + id + '  ' + newIdToCheck);
        } else {
            var dataHaasChildren = parseFloat($(this).attr("data-hasChildren"));
            if (dataHaasChildren === 1) {
                e.preventDefault(); 
                console.log(dataHaasChildren + "tHIS IS THE HAS CHILDREN MODULE.");
            } else {
                console.log(dataHaasChildren + "not have CHILDREN MODULE.");
            }
            var getTargetIdName = "target" + slicedId;
            var targetValue = $("#" + getTargetIdName).text();
            var inputValue = $("#" + id).val();
            var unmetTargetId = "unmetTargetComment" + slicedId;

            var period = $("#period" + slicedId).val();
            // console.log(period + "  " + slicedId)
            var nonConFlagName = "nonConformityFlag" + slicedId;
            var inputText = $(this);

            function validationOfSpecial() {
                
                var arithmeticStructure = $("#arithmeticStructure" + slicedId);
                var arithmeticStructureValue = parseFloat(arithmeticStructure.val());

                inputValue = parseFloat(inputValue, 10);
                targetValue = parseFloat(targetValue, 10);

                $("#" + nonConFlagName).val(0);
                $("#" + unmetTargetId + "").empty();

                if (inputValue === null) {
                    console.log("The value is null.");
                    $("#" + unmetTargetId + "").empty();
                } else {
                    if (inputValue === "") {
                        console.log("The value is blank.");
                        $("#" + unmetTargetId + "").empty();
                    } else {

                        switch (arithmeticStructureValue) {
                            case -1:
                                var gettingModalName = "modal" + slicedId;
                                var unmetTargetId = "unmetTargetComment" + slicedId;
                                var nonConformityFlag = "nonConformityFlag" + slicedId;
                                if (inputValue > 0) {
                                    
                                    // $("#" + nonConformityFlag + "").val(1);
                                        console.log("This is Zero Tollerance.");
                                    console.log($("#" + nonConformityFlag + "").val());
                                    $("#" + unmetTargetId + "").empty();

                                    $("#" + unmetTargetId + "").append(
                                        '<i style = "font-size:20px;color:orange;"class = "fa fa-star-half-o">   <b></b> </i></a>'
                                    );
                                    inputText.css('background-color', 'orange');
                                    $("#" + nonConformityFlag + "").val(0);
                                } else {
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());
                                    console.log(typeof inputValue + "  This is the data type.");
                                    console.log("0 IT GOOD.");
                                    $("#" + unmetTargetId + "").empty();
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
                                    );
                                    inputText.css('background-color', '#cfeda8');

                                    $("#" + nonConformityFlag + "").val(0);
                                }
                                break;

                            case 0:
                                var gettingModalName = "modal" + slicedId;
                                var unmetTargetId = "unmetTargetComment" + slicedId;
                                var nonConformityFlag = "nonConformityFlag" + slicedId;
                                if (inputValue > targetValue) {
                                    
                                    // $("#" + nonConformityFlag + "").val(1);

                                    console.log($("#" + nonConformityFlag + "").val());
                                    $("#" + unmetTargetId + "").empty();

                                    $("#" + unmetTargetId + "").append(
                                        '<i style = "font-size:20px;color:orange;"class = "fa fa-star-half-o">   <b></b> </i></a>'
                                    );
                                    inputText.css('background-color', 'orange');
                                    $("#" + nonConformityFlag + "").val(0);
                                } else {
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());
                                    console.log(typeof inputValue + "  This is the data type.");
                                    console.log("0 IT GOOD.");
                                    $("#" + unmetTargetId + "").empty();
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
                                    );
                                    inputText.css('background-color', '#cfeda8');

                                    $("#" + nonConformityFlag + "").val(0);
                                }
                                break;
                                case 1:
                                var gettingModalName = "modal" + slicedId;
                                var unmetTargetId = "unmetTargetComment" + slicedId;
                                var nonConformityFlag = "nonConformityFlag" + slicedId;
                                if (inputValue < targetValue) {
                                    
                                    $("#" + nonConformityFlag + "").val(0);
                                    var flag = $("#" + nonConformityFlag + "").val();
                                    console.log("The flag is:" + flag);

                                    $("#" + unmetTargetId + "").empty();

                                    $("#" + unmetTargetId + "").append(
                                        '<i style = "font-size:20px;color:orange;"class = "fa fa-star-half-o">   <b></b> </i></a>'
                                    );
                                    inputText.css('background-color', 'orange');

                                    // $(this).focus();
                                } else {
                                    console.log("1 IT GOOD.");
                                    console.log(typeof inputValue + "  This is the data type.");
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());

                                    $("#" + unmetTargetId + "").empty();
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
                                    );
                                    inputText.css('background-color', '#cfeda8');
                                }
                                    break;
                        
                            default:
                                break;
                        }
                    }
                
            }
            }

            //! THIS FUNCTION WILL BE USED TO GET THE VALIDATION SECTION OF THE CODE RIGHT ON THE SECTION OF THE 
            //! ANUALLY AND SEMI ANUALLY.
// console.log("This is the information given.");
            function validatingSemiAnuallyAndAnually() {
                
                console.log("The input value is 01111  IN");
                console.log("This is the ID.  "+id);
                console.log(gettingTheQuaterNumber + "THIS IS THE ADDING");
                period = parseFloat(period);
                if (period === 2 && gettingTheQuaterNumber === 2) {
                    inputValue = 0;
                    //! this section of the code is to define the

                    //! this section is used to get the values of the previuous quaters. 
                    for (let index = 1; index <= 4; index++) {
                        var value = $("#Quater"+index+slicedId).val();
                        if (value === null || value === NaN || value === '') {
                            inputValue += 0;
                        } else {
                            inputValue += parseFloat(value);
                        }
                        
                        console.log("************************************************");
                        // console.log($("#Quarter"+index+slicedId));
                        console.log($("#Quater"+index+slicedId).val() +"thiss is the iTH trial in :"+index+ "index" +index+slicedId);
                         
                     }

                    console.log("This is the input value that is adding"+inputValue);
                } else if(period === 2 && gettingTheQuaterNumber === 4){
                    inputValue = 0;
                    for (let index = 1; index <= 4; index++) {
                        var value = $("#Quater"+index+slicedId).val();
                        if (value === null || value === NaN || value === '') {
                            inputValue += 0;
                        } else {
                            inputValue += parseFloat(value);
                        }
                        
                        console.log("************************************************");
                        // console.log($("#Quarter"+index+slicedId));
                        console.log($("#Quater"+index+slicedId).val() +"thiss is the iTH trial in :"+index+ "index" +index+slicedId);
                         
                     }
                     console.log("This is the input value that is adding"+inputValue);
                }
                else if(period === 1 && gettingTheQuaterNumber === 4){
                    inputValue = 0;

                    for (let index = 1; index <= 4; index++) {
                        var value = $("#Quater"+index+slicedId).val();
                        if (value === null || value === NaN || value === '') {
                            inputValue += 0;
                        } else {
                            inputValue += parseFloat(value);
                        }
                        
                        console.log("************************************************");
                        // console.log($("#Quarter"+index+slicedId));
                        console.log($("#Quater"+index+slicedId).val() +"thiss is the iTH trial in :"+index+ "index" +index+slicedId);
                         
                     }
                     console.log("This is the input value that is adding for annula KPIs:::::"+inputValue);
                }
                console.log("This is the input value that I have calculated."+inputValue);
                console.log("The input value is 01111  OUT");
            }

            if (period == 2 && gettingTheQuaterNumber == 1) {
                validationOfSpecial();
            } else if (period == 2 && gettingTheQuaterNumber == 3) {                
                validationOfSpecial();
            } else if (period == 1 && gettingTheQuaterNumber == 1) {
                validationOfSpecial();
            } else if (period == 1 && gettingTheQuaterNumber == 2) {
                validationOfSpecial();
            } else if (period == 1 && gettingTheQuaterNumber == 3) {
                validationOfSpecial();
            } else {
                if (inputValue === null) {
                    console.log("The value is null.");
                    $("#" + unmetTargetId + "").empty();
                } else {
                    if (inputValue == "") {
                        console.log("The value is blank.");
                        $("#" + unmetTargetId + "").empty();
                    } else {
                        //! this section of th code will be used to see whether, the data-hasChildren == 1 
                        //! so that we can hide the modal.
                        if($(this).attr("data-hasChildren") === "1"){

                            $("#modal" + slicedId+gettingThevalue.substring(1)).modal("hide");

                        }
                        else{
                        inputValue = parseFloat(inputValue, 10);
                        targetValue = parseFloat(targetValue, 10);
                        //! getting the arithmetic structure.
                        console.log("this is a trial on the data.");
                        validatingSemiAnuallyAndAnually();
                        console.log( "This is the input value that I have gotten from the validatingSemiAnuallyAndAnually()  "+ inputValue);
                        var arithmeticStructure = $("#arithmeticStructure" + slicedId);
                        var arithmeticStructureValue = arithmeticStructure.val();
                        switch (arithmeticStructureValue) { 
                            
                            case "-1":
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
                                        gettingModalName +gettingThevalue.substring(1)+
                                        '"> </a>'
                                    );
                                    // $(this).focus(); 
                                    console.log("these are the low era");
                                    $(this).css('background-color', '#fba7a7');
                                    $("#modal" + slicedId+gettingThevalue.substring(1)).modal("show");

                                } else {
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());
                                    console.log(typeof inputValue + "  This is the data type.");
                                    console.log("0 IT GOOD.");
                                    $("#" + unmetTargetId + "").empty();
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;">    <b>YES</b> </i></p>'
                                    );
                                    $(this).css('background-color', '#cfeda8');


                                }
                                break;
                            
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
                                        gettingModalName +gettingThevalue.substring(1)+
                                        '"> </a>'
                                    );
                                    // $(this).focus(); 
                                    console.log("these are the low era");
                                    $(this).css('background-color', '#fba7a7');
                                    $("#modal" + slicedId+gettingThevalue.substring(1)).modal("show");

                                } else {
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());
                                    console.log(typeof inputValue + "  This is the data type.");
                                    console.log("0 IT GOOD.");
                                    $("#" + unmetTargetId + "").empty();
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;">    <b>YES</b> </i></p>'
                                    );
                                    $(this).css('background-color', '#cfeda8');


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
                                        gettingModalName +gettingThevalue.substring(1)+
                                        '"> <i style = "font-size:20px;"class = "">   <b>NO</b> </i></a>'
                                    );
                                    console.log("these are the low era");
                                    $(this).css('background-color', '#fba7a7');
                                    $("#modal" + slicedId+gettingThevalue.substring(1)).modal("show");

                                    // $(this).focus();
                                } else {
                                    console.log("1 IT GOOD.");
                                    console.log(typeof inputValue + "  This is the data type.");
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());

                                    $("#" + unmetTargetId + "").empty();
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
                                    );
                                    $(this).css('background-color', '#cfeda8');
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
                                        gettingModalName +gettingThevalue.substring(1)+
                                        '"> <i style = "font-size:20px;"class = "">   <b>NO</b> </i></a>'
                                    );
                                    $(this).css('background-color', '#fba7a7');
                                    $("#modal" + slicedId+gettingThevalue.substring(1)).modal("show");
                                } else {
                                    console.log("1 IT GOOD.");
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());

                                    $("#" + unmetTargetId + "").empty();
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
                                    );
                                    $(this).css('background-color', '#cfeda8');
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
                                        gettingModalName +gettingThevalue.substring(1)+
                                        '"> <i style = "font-size:20px;"class = "">   <b>NO</b> </i></a>'
                                    );
                                    console.log(id);
                                    // $("#" + id).focus();
                                    $(this).css('background-color', '#fba7a7');
                                    $("#modal" + slicedId+gettingThevalue.substring(1)).modal("show");
                                } else {
                                    console.log("1 IT GOOD.");
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());

                                    $("#" + unmetTargetId + "").empty();
                                    $(this).css('background-color', '#cfeda8');
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
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
                                        gettingModalName +gettingThevalue.substring(1)+
                                        '"> <i style = "font-size:20px;"class = "">   <b>NO</b> </i></a>'
                                    );
                                    // $(this).focus();
                                    $(this).css('background-color', '#fba7a7');
                                    $("#modal" + slicedId+gettingThevalue.substring(1)).modal("show");
                                } else {
                                    console.log("1 IT GOOD.");
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());

                                    $("#" + unmetTargetId + "").empty();
                                    $(this).css('background-color', '#cfeda8');
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
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
                                        gettingModalName +gettingThevalue.substring(1)+
                                        '"> <i style = "font-size:20px;"class = "">   <b>NO</b> </i></a>'
                                    );
                                    // $(this).focus();
                                    $(this).css('background-color', '#fba7a7');
                                    $("#modal" + slicedId+gettingThevalue.substring(1)).modal("show");
                                } else {
                                    console.log("1 IT GOOD.");
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());

                                    $("#" + unmetTargetId + "").empty();
                                    $(this).css('background-color', '#cfeda8');
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
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
                                        gettingModalName +gettingThevalue.substring(1)+
                                        '"> <i style = "font-size:20px;"class = "">   <b>NO</b> </i></a>'
                                    );
                                    // $(this).focus();
                                    $(this).css('background-color', '#fba7a7');
                                    $("#modal" + slicedId+gettingThevalue.substring(1)).modal("show");
                                } else {
                                    console.log("1 IT GOOD.");
                                    // !setting the flag to a negative.
                                    $("#" + nonConformityFlag + "").val(0);
                                    console.log($("#" + nonConformityFlag + "").val());

                                    $("#" + unmetTargetId + "").empty();
                                    $(this).css('background-color', '#cfeda8');
                                    $("#" + unmetTargetId + "").append(
                                        '<p style = "color:green;"> <i style = "font-size:20px;" class = "">   <b>YES</b> </i></p>'
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
        }

    });


});
