$(function () {
    $("form[id^='unmetTargetModal']").on("submit", function (e) {
        e.preventDefault();
        var idOfForm = $(this).attr("id");
        var objective = idOfForm.substring(17);
        
        var closingModalForm = "modal-body-for-ncs".objective;
        var objectiveName = "strategicObjective" + objective;
        objectiveName = $("#" + objectiveName).val();
        var quater = $("#activeQuater" + objectiveName).val();
        var alertName = "NonConformitymodal" + objective+quater.substring(1);
        console.log(alertName);

        $.ajax({
            url: "/submitNonConformities/" + quater,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                var html = "";
                if (data.success) {
                    $("#" + idOfForm)[0].reset();
                    html =
                        data.success
                }

                $("#" + alertName).html(html);
                $("#" + idOfForm).remove();
                $("." + idOfForm).remove();
                console.log('CLOSING NCS.');
            }
        });
    });
});
