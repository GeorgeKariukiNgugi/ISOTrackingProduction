$(function () {
    $(".tooltip").tooltip();
    //!this is getting which quaters are active and also which ones are n active and displaying them in the view.
    var activeQuater = $("#activeQuater").val();
    var gettingTheQuaterNumber = activeQuater.substr(1);
    var quaterPrefixId = "Quater" + gettingTheQuaterNumber;
    var gettingScoreValue = "scoreHidden" + gettingTheQuaterNumber;
    var value = $("#" + gettingScoreValue).val();

    var selectingQuaters = $("[id^=" + quaterPrefixId + "]");
    selectingQuaters.removeAttr("readonly");
    selectingQuaters.removeAttr("placeholder");
    selectingQuaters.attr("required", "true");
    selectingQuaters.css('border','3px solid #3C8DBC');
    quaterForLooping = parseFloat(gettingTheQuaterNumber, 10);

    console.log(quaterForLooping + typeof (quaterForLooping));

    //! this function is used to get the proper colouring

    for (let index = 1; index <= quaterForLooping; index++) {

        var quatersSelected = $("input[id*='Quater" + index + "']");
        
        quatersSelected.each(
            function () {
                
                //    console.log($(this).attr('id')); 
                //! the id of the input type is: 
                var id = $(this).attr('id');
                var slicedId = id.substring(7);
                var gettingQuater = $(this).attr('id').substring(6,7);
                gettingQuater = parseFloat(gettingQuater);
                console.log(gettingQuater+ "  This is the quater that is given."+ id +"This is the ID.");
                var getTargetIdName = "target" + slicedId;
                var targetValue = parseFloat($("." + getTargetIdName).text());
                var inputRawValue = $("#" + id).val();
                var inputValue = parseFloat($("#" + id).val());
                var period = $("#period" + slicedId).val();
                var arithmeticStructure = $("#arithmeticStructure" + slicedId);
                var arithmeticStructureValue = arithmeticStructure.val();
                var period = $("#period"+slicedId).val();
                period = parseFloat(period);
                var definigThis = $(this);
                switch (arithmeticStructureValue) {
                    case "-1":
                        function validationCase01() {
                            inputValue = 0;
                            var specificQuarter = id.substring(7,8);
                            // console.log("This is the new quater to llop through:   "+specificQuarter);
                            var looping = parseFloat(specificQuarter);
                            for (let index = 1; index <= gettingQuater; index++) {
                                // const element = array[index];
                                var value = $("#Quater"+index+slicedId).val();
                                if (value === null || value === NaN || value === '') {
                                    inputValue += 0;
                                } else {
                                    inputValue += parseFloat(value);
                                }
                                // console.log("This is the looping structure for getting the ideal coloring"+index+'  '+value);
                                
                            }

                            if (inputValue > targetValue) {
                                definigThis.css('background-color','#fba7a7');
                            } else if(inputValue <= targetValue){
                                definigThis.css('background-color','#cfeda8'); 
                            }
                            else{
                                definigThis.css('background-color','#FFFFFF');
                            }
                        }
                            
                        switch (period) {
                            case 1:
                                validationCase01();
                                break;
                            case 2:
                                validationCase01();
                                break;
                            case 4:
                                // validationCase1();
                                if (inputValue > targetValue) {
                                    definigThis.css('background-color','#fba7a7');
                                } else if(inputValue <= targetValue){
                                    definigThis.css('background-color','#cfeda8'); 
                                }
                                else{
                                    definigThis.css('background-color','#FFFFFF');
                                }
                                break;
                            default:
                                break;
                        }
                        break;
                    case "0":

                    function validationCase0() {
                        if (inputValue > targetValue) {
                            definigThis.css('background-color','#fba7a7');
                        } else if(inputValue <= targetValue){
                            definigThis.css('background-color','#cfeda8'); 
                        }
                        else{
                            definigThis.css('background-color','#FFFFFF');
                        }

                        return "something";
                    }

                    switch (period) {
                        case 1:
                            validationCase0();                          
                        case 2:
                            validationCase0();                            
                        case 4:
                            validationCase0();                            
                        default:
                            break;
                    }                                

                        break;
                    case "1":

                        console.log("THIS IS THE TARGET THAT IS USED TO GET THE COLORS OF THE FIELDS."+ getTargetIdName + "  THE VALUE OF THE ID IS : " + $("." + getTargetIdName).text());
                        function validationCase1() {
                            inputValue = 0;
                            var specificQuarter = id.substring(7,8);
                            console.log("This is the new quater to llop through:   "+specificQuarter);
                            var looping = parseFloat(specificQuarter);
                            for (let index = 1; index <= gettingQuater; index++) {
                                // const element = array[index];
                                var value = $("#Quater"+index+slicedId).val();
                                if (value === null || value === NaN || value === '') {
                                    inputValue += 0;
                                } else {
                                    inputValue += parseFloat(value);
                                }
                                console.log("This is the looping structure for getting the ideal coloring"+index+'  '+value);
                                
                            }

                            if (inputValue < targetValue) {
                                definigThis.css('background-color','orange');
                            } else if(inputValue >= targetValue){
                                definigThis.css('background-color','#cfeda8'); 
                            }
                            else if(inputValue >= 0 ){

                                console.log("THIS IS THE ERROR I WANT TO CATCH."+"The Input Value Is: "+inputValue+" The Target Value Is: "+ targetValue);
                                definigThis.css('background-color','green');
                            }                                                    
                        }
                            
                        switch (period) {
                            case 1:
                                validationCase1();
                                break;
                            case 2:
                                validationCase1();
                                break;
                            case 4:
                                // validationCase1();
                                if (inputValue < targetValue) {
                                    definigThis.css('background-color','#fba7a7');
                                } else if(inputValue >= targetValue){
                                    definigThis.css('background-color','#cfeda8'); 
                                }
                                else{
                                    definigThis.css('background-color','#FFFFFF');
                                }
                                break;
                            default:
                                break;
                        }
                        break;
                        case"3":
                        function validationCase2() {
                            if (inputValue > targetValue) {
                                definigThis.css('background-color','#fba7a7');
                            } else if(inputValue <= targetValue){
                                definigThis.css('background-color','#cfeda8'); 
                            }
                            else{
                                definigThis.css('background-color','#FFFFFF');
                            }
                        }
                        switch (period) {
                            case 1:
                                validationCase2();
                                break;
                            case 2:
                                validationCase2();
                                break;
                            case 4:
                                validationCase2();
                                break;
                            default:
                                break;
                        }
                        break;
                        case "4":
                            function validationCase3() {
                                if (inputValue < targetValue) {
                                    definigThis.css('background-color','#fba7a7');
                                } else if(inputValue >= targetValue){
                                    definigThis.css('background-color','#cfeda8'); 
                                } else{
                                    definigThis.css('background-color','#FFFFFF');
                                }
                            }
                            
                            switch (period) {
                                case 1:
                                    validationCase3();
                                    break;
                                case 2:
                                    validationCase3();
                                    break;
                                case 4:
                                    validationCase3();
                                    break;
                                default: 
                                break;
                            }
                        break;
                        case "5":
                            function validationCase4() {
                                if (inputValue > targetValue) {
                                    definigThis.css('background-color','#fba7a7');
                                } else if(inputValue >= targetValue){
                                    definigThis.css('background-color','#cfeda8'); 
                                } else{
                                    definigThis.css('background-color','#FFFFFF');
                                }
                            }
                            
                            switch (period) {
                                case 1:
                                    validationCase4();
                                    break;
                                case 2:
                                    validationCase4();
                                    break;
                                case 4:
                                    validationCase4();
                                    break;
                                default: 
                                break;
                            }
                        break;
                        case "6":

                            function validationCase5() {
                                if (inputValue > targetValue) {
                                    definigThis.css('background-color','#fba7a7');
                                } else if(inputValue <= targetValue){
                                    definigThis.css('background-color','#cfeda8'); 
                                } else{
                                    definigThis.css('background-color','#FFFFFF');
                                } 
                            }

                            switch (period) {
                                case 1:
                                    validationCase5();
                                    break;
                                case 2:
                                    validationCase5();
                                    break;
                                case 4:
                                    validationCase5();
                                    break;
                                default: 
                                break;
                            }
                        break;
                        case "7":

                        function validationCase6(params) {
                            if (inputValue > targetValue) {
                                definigThis.css('background-color','#fba7a7');
                            } else if(inputValue >= targetValue){
                                definigThis.css('background-color','#cfeda8'); 
                            } else{
                                definigThis.css('background-color','#FFFFFF');
                            }
                        }
                        switch (period) {
                            case 1:
                                validationCase6();
                                break;
                            case 2:
                                validationCase6();
                                break;
                            case 4:
                                validationCase6();
                                break;
                            default: 
                            break;
                        }
                        break;
                    default:
                        definigThis.css('background-color','black');
                        break;
                }

            }
        );
        // console.log(quatersSelected);

    }
    //!on loading the page successfully hide the two types of perspectives that will be used by the uer to bring the perspectives to li

    //! the next section isused to get the 

});
