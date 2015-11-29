function nextSelection(){

    var elem = document.getElementById("selectRoom");
    elem.style.visibility = "visible";
    elem.style.paddingTop = "100px";
    elem.style.paddingBottom = "100px"
    $('html, body').animate({scrollTop:$('#tableHead').position().top}, 'slow');

};

function addPayment(){
     window.location.href = "paymentInfo.html";
}

function confirm(){
    window.alert("Reservation ID: 54099");
}