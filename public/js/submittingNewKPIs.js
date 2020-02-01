$(function () {
    $("form[id^='modalSubmit']").on("submit", function (e) {
        // console.lo("SUBMITTING A NEW KPI.");
        e.preventDefault();

        
        var modalId = $(this).attr("id");
        var slicedModalId = modalId.substring(11);
        var alertName = "KPIalert" + slicedModalId;

        $.ajax({
            url: "submittingKPI",
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
                    // $("#" + modalId)[0].reset();
                    html = data.success[0]
                    $("#modal" + slicedModalId).modal('toggle');
                    $("#alert" + slicedModalId).html(html);

                }
                //!getting the active quater.
                var activeQuater = data.success[6].substring(1);
                $("#" + alertName).html(html);
                var quaters = '';
                for (let index = 1; index <= 4; index++) {

                    if (index == activeQuater) {
                        quaters += ' <div class=" col-md-1"><input   value="" type = "number" step=".01"  name = "Quater' + index + data.success[1] + '" id = "Quater' + index + data.success[1] + '"class="form-control" /></div>';
                    } else {
                        quaters += ' <div class=" col-md-1"><input   value="" type = "number" step=".01"  name = "Quater' + index + data.success[1] + '" id = "Quater' + index + data.success[1] + '" readonly placeholder="Inactive" class="form-control" /></div>';
                    }
                }

                //! getting the name of the period of the kpi. 
                var Assesmentperiod = '';
                // console.log('PERIOD.   ' + data.success[5]);
                switch (data.success[5]) {
                    case '1':
                        Assesmentperiod += '<div class=" col-md-1" style="text-align:left"><p>Anually.</p></div>';
                        break;
                    case '2':
                        Assesmentperiod += '<div class=" col-md-1" style="text-align:left"><p>Semi-Anually.</p></div>';
                        break;
                    case '4':

                        Assesmentperiod += '<div class=" col-md-1" style="text-align:left"><p>Quaterly</p></div>';
                        break;

                    default:
                        Assesmentperiod += "Nothing To Do.";
                        break;
                }

                //!getting the kpi ID and hidden arithmetic structure.
                var arithmeticStructureAndHidden = '';
                arithmeticStructureAndHidden += '<input type="hidden" id="arithmeticStructure"' + data.success[1] + '" value = "' + data.success[3] + '"/><div class=" col-md-1"style="text-align:center"><p>' + data.success[1] + '</p></div>';

                //!getting the kpi name. 
                var kpinameForNewKPI = '';
                kpinameForNewKPI += '<div class=" col-md-3" style="text-align:left"><p>' + data.success[2] + '</p></div>';

                //!getting the score and target. 
                var scoreAndTarget = '';
                scoreAndTarget += '<div class=" col-md-1" style="text-align:center"><p>-</p></div><div class=" col-md-1"style="text-align:center"><p id = "target' + data.success[4] + '" class ="target' + data.success[4] + '" >' + data.success[4] + '</p></div>';

                //! adding the hidden inputs. 
                var hiddenInputs = '';
                hiddenInputs += '<input type="hidden" name = "nonConformityFlag' + data.success[1] + '" value= "2" id = "nonConformityFlag' + data.success[1] + '"><input type="hidden" name="period' + data.success[1] + '"  id="period' + data.success[1] + '" value="' + data.success[5] + '">';

                //! adding the target and value comment. 
                var valueAndTargetComment = '';
                valueAndTargetComment += '<div id="unmetTargetComment' + data.success[1] + '" class = "col-md-1 text-center unmetTargetComment">';
                var appendingNewKpi = '<div class="row" style="margin-bottom:0.5%;"> ' + arithmeticStructureAndHidden + kpinameForNewKPI + Assesmentperiod + scoreAndTarget + quaters + valueAndTargetComment + hiddenInputs + '</div>';

                $("#addingNewKPIInStrategicObjectiveID" + slicedModalId).append(appendingNewKpi);
            }
        });
    });
});
