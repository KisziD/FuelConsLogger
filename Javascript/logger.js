var litres;
var paid;
var ppl;
var odo;
var odoValidity = false;


function litresValidate(){
    var litresInput = document.getElementById("liter");
    litres = litresInput.value;

    if(litres!=0){
        litresInput.classList.remove("is-invalid");
        litresInput.classList.add("is-valid");
        return true;
    }else{
        litresInput.classList.remove("is-valid");
        litresInput.classList.add("is-invalid");
        return false;
    }
}

function pplValidate(){
    var pplInput = document.getElementById("ppl");
    ppl = pplInput.value;

    if(ppl!=0){
        pplInput.classList.remove("is-invalid");
        pplInput.classList.add("is-valid");
        return true;
    }else{
        pplInput.classList.remove("is-valid");
        pplInput.classList.add("is-invalid");
        return false;
    }


}

function paidValidate(){
    var paidInput = document.getElementById("paid");
    paid = paidInput.value;

    if(paid!=0){
        paidInput.classList.remove("is-invalid");
        paidInput.classList.add("is-valid");
        return true;
    }else{
        paidInput.classList.remove("is-valid");
        paidInput.classList.add("is-invalid");
        return false;
    }
}

function odoValidate(){
    var odoInput = document.getElementById("odo");
    odo = odoInput.value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {   
            if(parseInt(this.responseText)<odo){
                odoInput.classList.remove("is-invalid");
                odoInput.classList.add("is-valid");
                odoValidity= true;
            }else{
                odoInput.classList.remove("is-valid");
                odoInput.classList.add("is-invalid");
                odoValidity= false;
            }   
        }
    };

    var url = "/PHP/Validate.php?checkodo=" + document.getElementById("carnplate").innerHTML.trim();
    xhttp.open("GET", url, true);
    xhttp.send(null);
}

function addlog(){
    if (litresValidate()&&pplValidate()&&odoValidity&&paidValidate()) {
        var xhttp = new XMLHttpRequest();
        fill=0;
        if(document.getElementById("fill").checked){
            fill=1;
        }

        var url = "/PHP/Validate.php?newlog="+document.getElementById("carnplate").innerHTML.trim()+"&ftype="+document.getElementById("carfuel").innerHTML.trim()+"&litres="+litres+"&paid="+paid+"&ppl="+ppl+"&odo="+odo+"&fill="+fill;
        xhttp.open("GET", url, true);
        xhttp.send(null);
        loadcar(document.getElementById("carnplate").innerHTML.trim());//window.location.href = 'dashboard'; //todo call regraph();
    }
}