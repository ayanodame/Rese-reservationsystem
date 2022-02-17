const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
});

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
    document.getElementById( "reserveCheckLength" ).innerHTML = $formObject.length;
}

function getValue() {
    var $formObject = document.getElementById( "reserveForm" );
    document.getElementById( "shopDate" ).innerHTML = $formObject.date.value;
    document.getElementById("shopTime").innerHTML = $formObject.time.value;
    document.getElementById( "shopNumber" ).innerHTML = $formObject.number.value;
}