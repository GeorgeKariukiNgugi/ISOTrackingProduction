$(function () {    
    $("form[id^='kpiChildrenSubmissionForm']").on("submit", function (e) {        
        e.preventDefault();                
        var slicedId = $(this).attr("id").substring(25);        
        var subCategoriesIncrementalNumbers = parseFloat($("#incrementNumber"+slicedId).val());
        var taget = parseFloat($('#kpiSubCategorytarget'+slicedId).val());
        var units = $("#kpiUnits"+slicedId).val();
        var alertName = "confirmationofKPIChildren"+slicedId;
        var finalValue = 0;
        for (let index = 1; index <= subCategoriesIncrementalNumbers; index++) {  
            console.log("Counter . "+index);            
            if($("#kpichild"+slicedId+index).prop("checked") == true){

                console.log("Checkbox is checked.");
                $("#kpichild"+slicedId+index).val(1);
                finalValue = finalValue+1;
            }

            else if($("#kpichild"+slicedId+index).prop("checked") == false){

                console.log("Checkbox is unchecked.");
                $("#kpichild"+slicedId+index).val(0);
                // ++finalValue;

            }                               
        }   
        console.log(finalValue + "thsi is the final value.");
        var dataToBeSubmitted = new FormData(this);
        function submittingFunction() {
            
            //! this section is used to store the data in the 
            $.ajax({
                url: "/postingKPISubcategories/",
                method: "POST",
                data: dataToBeSubmitted,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    var html = "";
                    if (data.success) {
                        html = data.success  
                        // console.log(data);                     
                    }
    
                    $("#confirmationofKPIChildren"+slicedId).html(html);
                    // "confirmationofKPIChildren"+slicedId
                }
            });


            

        }


        //! getting the activated quater. 
        var strategicObjective = parseFloat($("#kpiSubCategorystrategicObjective"+slicedId).val());
        
        var quater = $("#activeQuater" + strategicObjective).val().substring(1);
        quater = parseFloat(quater);        
        var period = $("#kpiPeriod"+slicedId).val();  
        period = parseFloat(period);
        var unmetTargetId = "unmetTargetComment" + slicedId;
        var nonConformityFlag = "nonConformityFlag" + slicedId;
        var score = 0;
        if (units == '%') {
            score = ((finalValue/subCategoriesIncrementalNumbers)*100);
        } else {
            score = finalValue;
        }
        if (period === 1 && quater === 4) {
            if (score >= taget) {
                $("#" + nonConformityFlag + "").val(0);
                $("#" + unmetTargetId + "").empty();
                $("#" + unmetTargetId + "").append(
                    '<p style = "color:green;"> <i style = "font-size:20px;" class = "fa fa-check">   <b>YES</b> </i></p>'
                );
                $('#Quater4'+slicedId).val(score);
                $('#Quater4'+slicedId).css('background-color', '#cfeda8');
                submittingFunction();
                $('#subcategories'+slicedId).modal('hide');
            } else {
                console.log("This is the end of the program.");
                var gettingModalName = "modal" + slicedId;
                $("#" + nonConformityFlag + "").val(0);
                $("#" + unmetTargetId + "").empty();
                $("#" + unmetTargetId + "").append(
                    '<a href = "#" style = "color:red;" data-toggle="modal" data-target= "#' +
                    gettingModalName +quater+
                    '"> <i style = "font-size:20px;"class = "fa fa-times">   <b>NO</b> </i></a>'
                );
                $('#Quater4'+slicedId).val(score);
                $('#Quater4'+slicedId).css('background-color', '#fba7a7');
                submittingFunction();
                $('#subcategories'+slicedId).modal('hide');
                $("#"+gettingModalName +quater).modal("show");
            }
        } else {
            if (score >= taget) {
                $("#" + nonConformityFlag + "").val(0);
                $("#" + unmetTargetId + "").empty();
                $("#" + unmetTargetId + "").append(
                    '<p style = "color:green;"> <i style = "font-size:20px;" class = "fa fa-check">   <b>YES</b> </i></p>'
                );
                $('#Quater'+quater+slicedId).val(score);
                $('#Quater'+quater+slicedId).css('background-color', '#cfeda8');
                submittingFunction();
                $('#subcategories'+slicedId).modal('hide');
            } else {
                $("#" + nonConformityFlag + "").val(0);
                $("#" + unmetTargetId + "").empty();
                $("#" + unmetTargetId + "").append(
                    '<p style = "color:orange;"> <i style = "font-size:20px;" class = "fa fa-star-half-o"></i></p>'
                );
                $('#Quater'+quater+slicedId).val(score);
                $('#Quater'+quater+slicedId).css('background-color', 'orange');
                submittingFunction();
                $('#subcategories'+slicedId).modal('hide');
            }


        }

        //! this section of the code is used to close the modal and throw a 
        
    });
});