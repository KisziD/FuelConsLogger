var type;
var nplate;
var nplateValidity = false;
var fueltype;
var year;

function typeValidate() {
    var typeInput = document.getElementById("type");
    type = typeInput.value;

    if (type != "") {
        typeInput.classList.remove("is-invalid");
        typeInput.classList.add("is-valid");
        return true;
    } else {
        typeInput.classList.remove("is-valid");
        typeInput.classList.add("is-invalid");
        return false;
    }
}


function numplateValidate() {
    var nplateInput = document.getElementById("nplate");
    nplate = nplateInput.value;
    const re =  /[epvz]-[\d]{5}$|[a-zA-Z]{3}-[\d]{3}$|[a-zA-Z]{4}-[\d]{2}$|[a-zA-Z]{5}-[\d]{1}$|[mM][\d]{2} [\d]{4}$|(ck|dt|hc|cd|hx|ma|ot|rx|rr) [\d]{2}-[\d]{2}$|(c-x|x-a|x-b|x-c) [\d]{4}$/;
                
    
                // ideiglenes rendszámok:
                // [epvz]-[\d]{5}$
                // általános rendszám:
                // [a-zA-Z]{3}-[\d]{3}$
                // egyéni rendszám:
                // [a-zA-Z]{4}-[\d]{2}$
                // egyéni rendszám:
                // [a-zA-Z]{5}-[\d]{1}$
                // mezőgazdasági rendszám:
                // [mM][\d]{2} [\d]{4}$
                // hatósági rendszám
                // (ck|dt|hc|cd|hx|ma|ot|rx|rr) [\d]{2}-[\d]{2}$
                // bérelt autó
                // (c-x|x-a|x-b|x-c) [\d]{4}$



    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {            
            if (re.test(String(nplate).toLowerCase()) && this.responseText == "0") {
                nplateInput.classList.remove("is-invalid");
                nplateInput.classList.add("is-valid");
                nplateValidity = true;
            } else {
                nplateInput.classList.remove("is-valid");
                nplateInput.classList.add("is-invalid");
                nplateValidity= false;
            }
        }
    };

    var url = "/PHP/Validate.php?nplate=" + nplate;
    xhttp.open("GET", url, true);
    xhttp.send(null);   
}

function fuelValidate(){
    var ftypeInput= document.getElementById("ftype");
    ftype = ftypeInput.value;
    if(ftype.toLowerCase().trim()=="diesel"||ftype.toLowerCase().trim()=="petrol"||ftype.toLowerCase().trim()=="gas"){
        ftypeInput.classList.remove("is-invalid");
        ftypeInput.classList.add("is-valid");
        return true;
    }else{
        ftypeInput.classList.remove("is-valid");
        ftypeInput.classList.add("is-invalid");
        return false;
    }    
}

function yearValidate(){
    var yearInput  = document.getElementById("myear");
    year = yearInput.value;
    const re = /[0-9]{4}$/
    if(re.test(String(year).toLowerCase())){
        if(parseInt(year)>=1886 && parseInt(year)<=new Date().getFullYear()){
            yearInput.classList.remove("is-invalid");
            yearInput.classList.add("is-valid");
            return true;
        }else{
            yearInput.classList.remove("is-valid");
            yearInput.classList.add("is-invalid");
            return false;
        }
    }else{
        yearInput.classList.remove("is-valid");
        yearInput.classList.add("is-invalid");
        return false;
    }
}

function motValidate(){
    var motInput=document.getElementById("mot");
    mot=motInput.value;
    if(mot!=""){
        motInput.classList.remove("is-invalid");
        motInput.classList.add("is-valid");
        return true;
    }else{
        motInput.classList.remove("is-valid");
        motInput.classList.add("is-invalid");
        return false;
    }
}

function add(){
    if (typeValidate()&&fuelValidate()&&yearValidate()&&nplateValidity) {
        var xhttp = new XMLHttpRequest();
        
        var url = "/PHP/Addcar.php?type="+type+"&ftype="+ftype+"&nplate="+nplate+"&myear="+year+"&mot="+mot;
        console.log(url);
        xhttp.open("GET", url, true);
        xhttp.send(null);
        window.location.href = 'dashboard';
    }
}