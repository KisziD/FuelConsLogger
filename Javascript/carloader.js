function loadcar(nplate){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {            
            arr=this.responseText.split("|");
            document.getElementById("carnplate").innerHTML="  "+arr[0];
            document.getElementById("cartype").innerHTML="  "+arr[1];
            document.getElementById("caryear").innerHTML="  "+arr[3];
            document.getElementById("carfuel").innerHTML="  "+arr[2];
            document.getElementById("carmot").innerHTML="  "+arr[4];
            document.getElementById("carodo").innerHTML="  "+arr[5];
            document.getElementById("avgconsumption").innerHTML="  "+"-.-";
            document.getElementById("avgtravel").innerHTML="  "+"-.-";
            document.getElementById("ftkm").innerHTML="  "+"-.-";
        }
    };

    var url = "/PHP/Validate.php?checkplate=" + nplate;
    xhttp.open("GET", url, true);
    xhttp.send(null);

}