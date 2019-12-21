$(document).ready(function () {
    $("form[id^='modalSubmit']").on("submit", function (e) {
        e.preventDefault();

        var modalId = $(this).attr("id");
        var slicedModalId = modalId.substring(11);
        var alertName = "KPIalert" + slicedModalId;

        $.ajax({
            url: "/submittingKPI",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                var html = "";

                if (data.success) {
                    // html = "<div>"+data.success+"</div>";
                    $("#" + modalId)[0].reset();
                    html =
                        data.success
                }

                $("#" + alertName).html(html);
                // window.location.reload();
            }
        });
    });
});
