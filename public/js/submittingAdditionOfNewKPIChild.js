$(function () {
    // $("form[class^='addingAnewChild']").on("submit", function (e) {
    //     e.preventDefault();        
    //     var kpiId = $(this).attr("data-kpiId");
    //     var holdingContainer = $("#kpiChilrenAlert"+kpiId);
    //     console.log("I have hit the js file to add a new child.");
    //     $.ajax({
    //         url: "/addingNewKPIChild/"+kpiId,
    //         method: "POST",
    //         data: new FormData(this),
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         dataType: "json",
    //         success: function (data) {
    //             var html = "";
    //             if (data.success) {
    //                 html = data.success
    //             }
    //             holdingContainer.empty();
    //             holdingContainer.append(html);
    //             // $("#" + submitButton).remove();
    //         }
    //     });

    //     $('#newKpiChild'+kpiId).modal('toggle');        
    //     location.reload(true);
    //     swal("Congratulations!", "You Have Added A New KPI Child.", "success"); 

    // });
    $("button[id^='closeButton'").on('click',function () {
        location.reload();
    });
});