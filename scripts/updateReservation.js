function selectDates(){

    var elem = document.getElementById("updateDates");
    elem.style.visibility = "visible";
    elem.style.marginTop = "250px";
    elem.style.marginBottom = "200px"
    $('html, body').animate({scrollTop:$('#tableA').position().top}, 'slow');

};

function checkAvail(){

    var elem = document.getElementById("confirmation");
    elem.style.visibility = "visible";
    elem.style.marginTop = "250px";
    elem.style.marginBottom = "500px"
    $('html, body').animate({scrollTop:$('#message').position().top}, 'slow');

};