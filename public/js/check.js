window.onload = function () {
    document.getElementById( "inputDate" ).onchange = function(){
        var $dategetValue = document.getElementById("inputDate").value;
    document.getElementById("outputDate").innerHTML = $dategetValue;
    };

    document.getElementById("inputTime").onchange = function () {
        var $timegetValue = document.getElementById( "inputTime" ).value;
    document.getElementById("outputTime").innerHTML = $timegetValue;
    };

    document.getElementById("inputNumber").onchange = function () {
        var $numbergetValue = document.getElementById("inputNumber").value;
    document.getElementById("outputNumber").innerHTML = $numbergetValue;
    }
}