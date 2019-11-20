$(document).ready(function() {
    $("form[id^='modalSubmit']").on("submit", function(e) {
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
            success: function(data) {
                var html = "";

                if (data.success) {
                    // html = "<div>"+data.success+"</div>";
                    $("#" + modalId)[0].reset();
                    html =
                        '<div role="alert" class="alert alert-warning" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>' +
                        data.success +
                        "</strong><br /></span></div>";
                }

                $("#" + alertName).html(html);
                // window.location.reload();
            }
        });
    });
});
