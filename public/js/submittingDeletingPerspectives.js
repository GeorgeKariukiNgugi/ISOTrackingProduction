$(function () {
    // console.log("this is a submitting scores model.");
    // var closeButton = "closeButton" ;
    var closeButton = $("button[class*='closeButton']");
    $("form[class^='deletingProgramPerspectives']").on("submit", function (e) {
        e.preventDefault();
        console.log("submission prevented.");
        var idOfForm = $(this).attr("class");
        var perpective = idOfForm.substring(27);
        var holdingContainer = "holdingContainer" + perpective;
        var submitButton = "submitButton" + perpective;

        // console.log("THE ID OF THE FORM IS "+idOfForm);
        $.ajax({
            url: "/deletingPespectives",
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
                }
                $("#" + holdingContainer).empty();
                $("#" + holdingContainer).append(html);
                $("#" + submitButton).remove();
            }
        });
    });
});
