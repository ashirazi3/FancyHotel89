function nextSelection(){

    var elem = document.getElementById("selectRoom");
    elem.style.visibility = "visible";
    if ($("#cardDropDown").val() == "Add new card") {
        document.getElementById("addNewCard").style.visibility = "visible";
    }
    elem.style.paddingTop = "100px";
    elem.style.paddingBottom = "100px"
    $('html, body').animate({scrollTop:$('#selectRoom').position().top}, 'slow');

};

function addPayment(){
     window.location.href = "paymentInfo.php";
}

function confirm(){
    window.alert("Reservation ID: 54099");
}