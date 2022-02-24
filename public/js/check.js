window.onload = function () {
    document.getElementById( "inputDate" ).onchange = function(){
        getValue();
    };
    document.getElementById("inputTime").onchange = function () {
        getValue();
    };
    document.getElementById("inputNumber").onchange = function () {
        getValue();
    }
}

function getValue() {
    var $dategetValue = document.getElementById( "inputDate" ).value;
    document.getElementById("outputDate").innerHTML = $dategetValue;
    var $timegetValue = document.getElementById( "inputTime" ).value;
    document.getElementById("outputTime").innerHTML = $timegetValue;
    var $numbergetValue = document.getElementById("inputNumber").value;
    document.getElementById("outputNumber").innerHTML = $numbergetValue;
}