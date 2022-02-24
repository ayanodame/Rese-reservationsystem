window.onload = function () {
    getValue();
    var $formObject = document.getElementById( "reserveForm" );
    for( var $i = 0; $i < $formObject.length; $i++ ) {
        $formObject.elements[$i].onkeyup = function(){
            getValue();
        };
        $formObject.elements[$i].onchange = function(){
            getValue();
        };
    }
    
}

function getValue() {
    var $formObject = document.getElementById( "reserveForm" );
    document.getElementById( "shopDate" ).innerHTML = $formObject.use_date.value;
    document.getElementById("shopTime").innerHTML = $formObject.use_time.value;
    document.getElementById( "shopNumber" ).innerHTML = $formObject.people.value;
}