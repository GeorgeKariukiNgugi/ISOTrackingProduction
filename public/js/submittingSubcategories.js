$(function () {    
    $("form[id^='kpiChildrenSubmissionForm']").on("submit", function (e) {        
        e.preventDefault();                
        var slicedId = $(this).attr("id").substring(25);        
        var subCategoriesIncrementalNumbers = parseFloat($("#incrementNumber"+slicedId).val());
        var taget = parseFloat($('#kpiSubCategorytarget'+slicedId).val());
        var units = $("#kpiUnits"+slicedId).val();
        var alertName = "confirmationofKPIChildren"+slicedId;
        var finalValue = 0;
        var findingTheTypeOfInput = $('.type'+slicedId).attr('data-childType');
        console.log("The type of input to be added to the data is "+ findingTheTypeOfInput+ "its data type is "+ typeof(findingTheTypeOfInput));


        if(findingTheTypeOfInput === '3'){

            var target = parseFloat($('#target'+slicedId).val());
            var achievement = parseFloat($('#achievement'+slicedId).val());
            console.log("This is the data that is in the type 3"+ target + '  '+ achievement);
            finalValue = ((achievement/target)*100).toFixed(2);
        }

        for (let index = 1; index <= subCategoriesIncrementalNumbers; index++) {  
            console.log("Counter . "+index);    
            
            if (findingTheTypeOfInput === '2') {
                console.log("The input type here are numbers.");
                finalValue += parseFloat($("#kpichild"+slicedId+index).val());
            }             
            else {

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
        if (units == '%' && (findingTheTypeOfInput !== '3')) {
            score = ((finalValue/subCategoriesIncrementalNumbers)*100).toFixed(2);
        } else {
            score = finalValue;
        }

        function scoringData(){
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
                console.log("This is the end of the program.");
                var gettingModalName = "modal" + slicedId;
                $("#" + nonConformityFlag + "").val(0);
                $("#" + unmetTargetId + "").empty();
                $("#" + unmetTargetId + "").append(
                    '<a href = "#" style = "color:red;" data-toggle="modal" data-target= "#' +
                    gettingModalName +quater+
                    '"> <i style = "font-size:20px;"class = "fa fa-times">   <b>NO</b> </i></a>'
                );
                $('#Quater'+quater+slicedId).val(score);
                $('#Quater'+quater+slicedId).css('background-color', '#fba7a7');
                submittingFunction();
                $('#subcategories'+slicedId).modal('hide');
                $("#"+gettingModalName +quater).modal("show");
            }
        }
        if ((period === 1 && quater === 4)) {
            scoringData();
        } 
        else if((period === 2 && quater === 2)){
            scoringData();
        }
        else if((period === 2 && quater === 4)){
            scoringData();
        }
        else if((period === 4)){
            scoringData();
        }
        else {
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