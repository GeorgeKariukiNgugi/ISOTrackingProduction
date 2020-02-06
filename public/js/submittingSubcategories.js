$(function () {    
    $("form[id^='kpiChildrenSubmissionForm']").on("submit", function (e) {        
        e.preventDefault();                
        var slicedId = $(this).attr("id").substring(25);        
        var subCategoriesIncrementalNumbers = parseFloat($("#incrementNumber"+slicedId).val());
        var taget = parseFloat($('#kpiSubCategorytarget'+slicedId).val());
        var alertName = "confirmationofKPIChildren"+slicedId;
        var finalValue = 0;
        for (let index = 1; index <= subCategoriesIncrementalNumbers; index++) {            
            finalValue += parseFloat($("#kpichild"+slicedId+index).val());                    
        }   
        
        //! this section of the code is used to compare and give the results.

        //! getting the activated quater. 
        var strategicObjective = parseFloat($("#kpiSubCategorystrategicObjective"+slicedId).val());
        
        var quater = $("#activeQuater" + strategicObjective).val().substring(1);
        quater = parseFloat(quater);
        var period = $("#kpiPeriod"+slicedId).val();  
        var unmetTargetId = "unmetTargetComment" + slicedId;
        var nonConformityFlag = "nonConformityFlag" + slicedId;
        
        if (period == 1 && quater == 4) {
            if (finalValue >= taget) {
                $("#" + nonConformityFlag + "").val(0);
                $("#" + unmetTargetId + "").empty();
                $("#" + unmetTargetId + "").append(
                    '<p style = "color:green;"> <i style = "font-size:20px;" class = "fa fa-check">   <b>YES</b> </i></p>'
                );
                $('#Quater4'+slicedId).val(finalValue);
                $('#Quater4'+slicedId).css('background-color', '#cfeda8');

            } else {
                
            }
        } else {
            if (finalValue >= taget) {
                $("#" + nonConformityFlag + "").val(0);
                $("#" + unmetTargetId + "").empty();
                $("#" + unmetTargetId + "").append(
                    '<p style = "color:green;"> <i style = "font-size:20px;" class = "fa fa-check">   <b>YES</b> </i></p>'
                );
                $('#Quater'+quater+slicedId).val(finalValue);
                $('#Quater'+quater+slicedId).css('background-color', '#cfeda8');
            } else {
                $("#" + nonConformityFlag + "").val(0);
                $("#" + unmetTargetId + "").empty();
                $("#" + unmetTargetId + "").append(
                    '<p style = "color:orange;"> <i style = "font-size:20px;" class = "fa fa-star-half-o"></i></p>'
                );
                $('#Quater'+quater+slicedId).val(finalValue);
                $('#Quater'+quater+slicedId).css('background-color', 'orange');
            }

            //! this section is used to store the data in the 
            $.ajax({
                url: "/postingKPISubcategories/",
                method: "POST",
                data: new FormData(this),
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
        
    });
});