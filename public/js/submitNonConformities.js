$(document).ready(function () {
    $("form[id^='unmetTargetModal']").on("submit", function (e) {
        e.preventDefault();
        var idOfForm = $(this).attr("id");
        var objective = idOfForm.substring(16);
        var alertName = "NonConformitymodal" + objective;
        var closingModalForm = "modal-body-for-ncs".objective
        // console.log("THE ID OF THE FORM IS "+idOfForm);
        $.ajax({
            url: "/submitNonConformities",
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
                $("#"+idOfForm).remove();
                console.log('CLOSING NCS.');
            }
        });
    });
});
