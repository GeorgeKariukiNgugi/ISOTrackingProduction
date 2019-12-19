$(document).ready(function () {
    // console.log("this is a submitting scores model.");
    $("form[id^='form']").on("submit", function (e) {
        e.preventDefault();
        var idOfForm = $(this).attr("id");
        var objective = idOfForm.substring(4);
        var alertName = "alert" + objective;
        // console.log("THE ID OF THE FORM IS "+idOfForm);
        $.ajax({
            url: "/submitScores",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                var html = "";
                if (data.success) {
                    html =
                        '<div role="alert" class="alert alert-warning" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>' +
                        data.success +
                        "</strong><br /></span></div>";
                }

                $("#" + alertName).html(html);

            }
        });
    });
});
