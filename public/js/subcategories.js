$(function () {
    console.log("This is the adding of the subcategories.");
    var quatersSelected = $("input[id ^='Quater']");
    quatersSelected.click(function () {
        
        var id = $(this).attr("id");
       
        var slicedId = id.substring(7);
        var strategicObjectiveId = $(this).closest('div').parent().attr('id');
        var gettingThevalue = $("#activeQuater" + strategicObjectiveId).val();
        var newIdToCheck = 'Quater' + gettingThevalue.substring(1) + slicedId;
        var gettingTheQuaterNumber = parseFloat(gettingThevalue.substring(1));

        if (id !== newIdToCheck) {

            console.log("This is no valid if I cklick, FOCUS.");
        }
        else{
            console.log("The focud in is th correct one.");
            var dataHaasChildren = $(this).attr("data-hasChildren");
            // console.log(dataHaasChildren);
            if (dataHaasChildren == 1) {
                $("#subcategories" + slicedId).modal("show");
                $("#modal" + slicedId+gettingThevalue.substring(1)).modal("hide");
            }
        }
    });
});