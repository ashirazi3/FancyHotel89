function deleteCard(){

    var elem = document.getElementById("deleteCard");
    elem.style.visibility = "visible";
    elem.style.marginTop = "100px";
    elem.style.marginBottom = "500px"
    $('html, body').animate({scrollTop:$('#blah').position().top}, 'slow');

};

function submit(){
    window.location.href = "makeReservation.html";
}