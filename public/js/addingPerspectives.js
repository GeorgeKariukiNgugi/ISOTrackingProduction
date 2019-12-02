$(document).ready(function () {

    $('#primitive_perspective').hide();
    console.log('hiding the perspectives.');
    $('#custom_perspective').hide();
    $('#customPerspectiveRadio').on('click', function () {
        $('#custom_perspective').show();
        $('#primitive_perspective').hide();
    });

    $('#primitivePerspectiveRadio').on('click', function () {
        $('#primitive_perspective').show();
        $('#custom_perspective').hide();
        var activePerspective = $("input[id^='perspectivePrimitive']");
        activePerspective.each(function () {
            $(this).attr({
                'required': 'required',
            })
        });

        // console.log(activePerspective.length + '  ' + typeof activePerspective);

        // for (let index = 0; index < activePerspective.length; index++) {

        //     // console.log(activePerspective[index]);
        //     var perspective = activePerspective[index];
        //     perspective.attr(["required", "true"]);
        //     console.log(gettingId);

        // }
        // activePerspective.attr('required', 'required');
    });

    var increment = 1;


    $('#addingPerspectiveButton').on('click', function () {
        $("input[id^='perspectivePrimitive']").removeAttr('id');
        increment++;
        $appendingData = '<div class="row"><div id="addingPerspective"><div class="col-md-6"><div class="row"><div class="col-md-6"><p>Perspective Name</p></div><div class="col-md-6"><input type="text" /></div></div></div><div class="col-md-6"><div class="row"><div class="col-md-6"><p>Perspective Weight</p></div><div class="col-md-6"><input type="number" name = "' + +'"/></div></div></div></div></div>';
        $('#addingPerspective').append($appendingData);

        $('#numberOfCustomPersectives').val(increment);
    });

});
