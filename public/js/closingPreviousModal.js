$(function () {
    //! this javascript file is used to close the previous modal that is under the one that has 
    //! been clicked.
    console.log("this is the section that will be used to close the previous modal.");
    $(".buttonsToClosePreviousModal").on('click',function() {
        console.log("close the previous modal.");
        var kpiModal = $(this).attr("data-kpiId");
        $("#editKpiModal"+kpiModal).modal("hide");
        
    });
});