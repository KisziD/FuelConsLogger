function calculate() {
    var literInput=document.getElementById("liter");
    var liter = literInput.value;
    var kmInput = document.getElementById("km");
    var km = kmInput.value;
    var resultInput = document.getElementById("result");

    resultInput.value   =(liter/km)*100+"L/100km";

}

function calculateRoad() {
    var avgInput=document.getElementById("avg");
    var avg = avgInput.value;
    var kmInput = document.getElementById("roadkm");
    var km = kmInput.value;
    var priceInput = document.getElementById("price");
    var price = priceInput.value;
    var resultInput = document.getElementById("roadresult");

    resultInput.value   =(avg/100)*km*price+" Ft";

}