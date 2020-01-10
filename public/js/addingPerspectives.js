$(function () {

    $('#primitive_perspective').hide();
    console.log('hiding the perspectives.');
    $('#custom_perspective').hide();
    var increment = 0;
    $('#customPerspectiveRadio').on('click', function () {
        var activePerspective = $("input[id^='perspectivePrimitive']");
        increment = 0;
        $('#addingPerspective').empty();
        $('#numberOfCustomPersectives').val(increment);
        activePerspective.each(function () {
            $(this).removeAttr('required')
        });
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
    });




    $('#addingPerspectiveButton').on('click', function () {
        increment++;
        $appendingData = '<div class="row"><div id="addingPerspective"><div class="col-md-6"><div class="row"><div class="col-md-6"><p>Perspective Name</p></div><div class="col-md-6"><input type="text" required name ="' + 'customname' + increment + '" /></div></div></div><div class="col-md-6"><div class="row"><div class="col-md-6"><p>Perspective Weight</p></div><div class="col-md-6"><input required type="number" name = "' + 'customweight' + increment + '"/></div></div></div></div></div>';
        $('#addingPerspective').append($appendingData);

        $('#numberOfCustomPersectives').val(increment);
    });

});
