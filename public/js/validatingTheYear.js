$(function () {
    $("#submittingAsesingYear").on("submit", function (e) {

        e.preventDefault();
        var value = $("#year");
        value = value.val();
        console.log(value);
        if (value === null) {
            console.log("The value is null.");
            $(this).unbind('submit').submit();

        } else {
            if (value === " ") {
                console.log("The value is blank.");
                $(this).unbind('submit').submit();

            } 
                if (value == '') {
                    $(this).unbind('submit').submit();
                }
                else{
                var error = $("#errorThrowing");
                if (value.length !== 9) {
                    error.empty();
                    error.append(
                        '<div role="alert" class="alert alert-danger" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>' +
                        "Kindly Use the Format 'YYYY/YYYY' (e.g) 2019/2020, to specify the year</strong><br/></span></div>"
                    );
                    console.log("improper length.");
                } else {
                    error.empty();
                    var slicedYear = value.substring(4, 5);
                    if (slicedYear !== '/') {
                        error.append(
                            '<div role="alert" class="alert alert-danger" style="width:70%;text-align:center;margin-right:15%;margin-top:1%;margin-left:15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span class="text-capitalize"><strong>' +
                            "Kindly Use the Format 'YYYY/YYYY' (e.g) 2019/2020, to specify the year</strong><br/></span></div>"
                        );
                    } else {
                        $(this).unbind('submit').submit();
                    }
                }
            }
        }
    });
});
